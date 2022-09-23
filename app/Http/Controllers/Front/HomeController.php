<?php

namespace App\Http\Controllers\Front;

use Hash;
use Auth;
use PDF;
use Stripe\Stripe;
use Stripe_Error;  
use App\Models\User;
use App\Models\State;
use App\Models\Plan;
use App\Models\Channel;
use App\Models\Message;
use App\Models\ChannelUser;
use App\Models\Transaction;
use App\Models\RevenueEngine;
use Illuminate\Http\Request;
use App\Models\ActivateChannel;
use App\Models\UsersChannelData;
use App\Models\SingleUserDashboard;
use App\Http\Controllers\Front\Controller;
use App\Http\Requests\Front\UpdateProfileRequest;

class HomeController extends Controller
{
    public function index()
    {
        if (auth()->check() && auth()->user()->user_type == 1) {

            $revenue = RevenueEngine::getSingleRevenueEngine(['wp1y_revenue_engine.user_id' => auth()->user()->id]);

            if(auth()->user()->expiry_date && auth()->user()->expiry_date > date("Y-m-d H:i:s") && $revenue && $revenue != ''){
                return redirect()->route('index');
            } else {
                return redirect()->route('master-onboarding');
            }

        } elseif (auth()->check() && auth()->user()->user_type == 2) {
            return redirect()->route('channel-dashboard');
        } elseif (auth()->check() && auth()->user()->user_type == 3) {
            return redirect()->route('distributor');
        } else {
            abort(404);
        }
    }

    public function htmlview()
    {
        return view('frontend.html.blank_page');
    }
    public function newHome(){
        return view('frontend.new-home');
    }
    public function channelsettings(){
        return view('frontend.new-channels-settings');
    }

    // New work starts from here...

    public function profile()
    {
        $users = User::find(auth()->user()->id);
        $states = State::get();
        return view('frontend.profile.index', compact('users', 'states'));
    }

    public function profileUpdate(UpdateProfileRequest $request)
    {       
        $data = $request->except([
            '_token',
            '_method',
            'email',
            'previous_image',
            'current_password',
            'password'
        ]);

        if ($request->hasFile('image')) {
            if ($request->previous_image && file_exists(uploadsDir('users') . $request->previous_image)) {
                unlink(public_path(uploadsDir('users') . $request->previous_image));
            }

            //move | upload file on server
            $file          = $request->file('image');
            $extension     = $file->getClientOriginalExtension(); // getting file extension
            $filename      = 'profile-'.time() . '.' . $extension;
            $file->move(uploadsDir('users'), $filename);
            $data['image'] = $filename;
        }

        if ($request->current_password && $request->password) {
            $user = User::find(auth()->user()->id);
            if (!Hash::check($request->current_password, $user->password)) {
                return redirect()
                    ->back()
                    ->with('error', 'Opps! current password is incorrect.');
            }

            $data['password'] = bcrypt($request->password);
        }

        User::where('id', auth()->user()->id)->update($data);

        return redirect()
            ->back()
            ->with('success', 'Profile has been updated successfully.');
    }

    public function distributorDashboard()
    {
        if (auth()->check() && auth()->user()->user_type == 1) {

            $revenue = RevenueEngine::getSingleRevenueEngine(['wp1y_revenue_engine.user_id' => auth()->user()->id]);

            if(auth()->user()->expiry_date && auth()->user()->expiry_date > date("Y-m-d H:i:s") && $revenue && $revenue != ''){
                return redirect()->route('index');
            } else {
                return redirect()->route('master-onboarding');
            }

        } elseif (auth()->check() && auth()->user()->user_type == 2) {
            return redirect()->route('channel-dashboard');
        }

        $channels = Channel::getAllChannelsWithUsers();

        return view('frontend.distributor', compact('channels'));
    }

    public function channelPartnerDashboard()
    {
        if (auth()->check() && auth()->user()->user_type != 2) {
            if (auth()->check() && auth()->user()->user_type == 1) {

            $revenue = RevenueEngine::getSingleRevenueEngine(['wp1y_revenue_engine.user_id' => auth()->user()->id]);

            if(auth()->user()->expiry_date && auth()->user()->expiry_date > date("Y-m-d H:i:s") && $revenue && $revenue != ''){
                return redirect()->route('index');
            } else {
                return redirect()->route('master-onboarding');
            }

            } elseif (auth()->check() && auth()->user()->user_type == 3) {
                return redirect()->route('distributor');
            }
        }

        $channelClients = Channel::getMyClients(['channel_partner_id' => auth()->user()->id]);

        if ($channelClients) {
            $channelClients['client_details'] = User::getChannelClients(
                [],
                explode(',', $channelClients->channel_clients_ids)
            );
        }
        
        $userRevenue = array();
        $revenue     = array();

        if (isset($channelClients) && !empty($channelClients)) {
            $usersRevenue = RevenueEngine::getAllRevenueEngine([], explode(',', $channelClients->channel_clients_ids));

            $revenue      = RevenueEngine::getEstimatedSavings([], explode(',', $channelClients->channel_clients_ids));
            foreach ($usersRevenue as $key => $value) {
                $userRevenue[$value['user_id']] = $value->toArray();
            }
        }

       return view('frontend.channel-partner-dashboard', compact('channelClients', 'revenue', 'userRevenue'));
    }

    public function singleUserDashboard()
    {
        $revenue = RevenueEngine::getSingleRevenueEngine(['wp1y_revenue_engine.user_id' => auth()->user()->id]);

        if (auth()->check() && auth()->user()->user_type != 1) {
            if (auth()->check() && auth()->user()->user_type == 2) {
                return redirect()->route('channel-dashboard');
            } elseif (auth()->check() && auth()->user()->user_type == 3) {
                return redirect()->route('distributor');
            }
        }
        if(auth()->user()->expiry_date && auth()->user()->expiry_date > date("Y-m-d H:i:s") && $revenue && $revenue != ''){  


            $currentUser   = (auth()->check()) ? auth()->user()->id : 0;

            $userData = User::where(['id' => $currentUser])->first();
            if($userData->hide_dashboard == 0){
                $channels      = Channel::getAllChannelsWithUsers();
                $dashboardData = SingleUserDashboard::where(['user_id' => $currentUser])->first();

                return view('frontend.index', compact('channels', 'dashboardData'));
            } else{
                return redirect()->route('profile');
            }

        } else {
            return redirect()->route('master-onboarding');
        }
    }

    /*public function activateChannel(Request $request)
    {
        if (auth()->check() && auth()->user()->user_type != 1) {
            $data    = [];
            $error   = 1;
            $message = "Your user type not supported channel activation.";
        } else {
            $checkChannel = Channel::find($request->channel_id);

            if ($checkChannel && !empty($checkChannel)) {
                $checkActivation = ChannelUser::checkPreviousActivation([
                    'channel_id' => $request->channel_id,
                    'user_id'    => auth()->user()->id
                ]);

                if (!$checkActivation && empty($checkActivation)) {
                    ChannelUser::insert([
                        'channel_id' => $request->channel_id,
                        'user_id' => auth()->user()->id
                    ]);
                    $data    = [];
                    $error   = 0;
                    $message = "Channel has been activated successfully.";
                } else {
                    $data    = [];
                    $error   = 1;
                    $message = "Something went wrong, channel already activated.";
                }
            } else {
                $data    = [];
                $error   = 1;
                $message = "Something went wrong, channel does not exist.";
            }
        }

        return response()->json([
            'error'   => $error,
            'message' => $message,
            'data'    => $data,
        ]);
    }*/

    public function transactions()
    {
        if (auth()->check() && auth()->user()->user_type != 1) {
            abort(404);
        }

        $transactions = Transaction::getTransactions(['user_id' => auth()->user()->id]);

        return view('frontend.transactions', compact('transactions'));
    }

    public function activateChannel($channel_id = 0)
    {
        if (auth()->check() && auth()->user()->user_type != 1) {
            abort(404);
        }

        $userChannelDataExist = UsersChannelData::where([
            'channel_id' => $channel_id,
            'user_id'    => auth()->user()->id
        ])->first();

        if ($userChannelDataExist && !empty($userChannelDataExist)) {
            return redirect()
                ->route('index')
                ->with('error', 'This channel is already activated.');
        }

        $channel = Channel::find($channel_id);
        $page    = "";

        if ($channel && $channel->identifier != '') {
            $page = $channel->identifier;
        } else {
            abort(404);
        }

        if (!view()->exists('frontend.'. $page . '.index')) {
            abort(404);
        }

        return view('frontend.'. $page . '.index');
    }

    public function postActivateChannel(Request $request)
    {
        if (auth()->check() && auth()->user()->user_type != 1) {
            abort(404);
        }

        $data = $request->except(['_token', '_method','Business_Name','Business_EIN_No','Carrier','User_Name','Password','Upload_Parcel_Carrier_Contracts','Signs_Agreement1','Engineering_Plans1']);

        $userChannelDataExist = UsersChannelData::where([
            'channel_id' => $request->channel_id,
            'user_id'    => auth()->user()->id
        ])->first();

        if ($userChannelDataExist && !empty($userChannelDataExist)) {
            return redirect()
                ->route('index')
                ->with('error', 'This channel is already activated.');
        }

        if ($request->hasfile('Signs_Letter_Of_Authority')) {
            @mkdir(uploadsDir('documents'), 0755, true);
            //move | upload file on server
            $file           = $request->file('Signs_Letter_Of_Authority');
            $extension      = $file->getClientOriginalExtension(); // getting file extension
            $filename       = 'Signs_Letter_Of_Authority-'.time() . '.' . $extension;
            $file->move(uploadsDir('documents'), $filename);
            $data['Signs_Letter_Of_Authority'] = $filename;
        }

        if ($request->hasfile('Signs_Agreement1')) {
            @mkdir(uploadsDir('documents'), 0755, true);
            //move | upload file on server
            $file           = $request->file('Signs_Agreement1');
            $extension      = $file->getClientOriginalExtension(); // getting file extension
            $filename       = 'Signs_Agreement-'.time() . '.' . $extension;
            $file->move(uploadsDir('documents'), $filename);
            $data['Signs_Agreement'] = $filename;
        }
        if ($request->hasfile('Signs_NDA')) {
            @mkdir(uploadsDir('documents'), 0755, true);
            //move | upload file on server
            $file           = $request->file('Signs_NDA');
            $extension      = $file->getClientOriginalExtension(); // getting file extension
            $filename       = 'Signs_NDA-'.time() . '.' . $extension;
            $file->move(uploadsDir('documents'), $filename);
            $data['Signs_NDA'] = $filename;
        }
        if ($request->hasfile('Signs_Agreement')) {
            @mkdir(uploadsDir('documents'), 0755, true);
            //move | upload file on server
            $file           = $request->file('Signs_Agreement');
            $extension      = $file->getClientOriginalExtension(); // getting file extension
            $filename       = 'Signs_Agreement-'.time() . '.' . $extension;
            $file->move(uploadsDir('documents'), $filename);
            $data['Signs_Agreement'] = $filename;
        }
        if ($request->hasfile('Upload_Medical_Census')) {
            @mkdir(uploadsDir('documents'), 0755, true);
            //move | upload file on server
            $file           = $request->file('Upload_Medical_Census');
            $extension      = $file->getClientOriginalExtension(); // getting file extension
            $filename       = 'Upload_Medical_Census-'.time() . '.' . $extension;
            $file->move(uploadsDir('documents'), $filename);
            $data['Upload_Medical_Census'] = $filename;
        } 
        if ($request->hasfile('Upload_Group_Health_Questionnaire')) {
            @mkdir(uploadsDir('documents'), 0755, true);
            //move | upload file on server
            $file           = $request->file('Upload_Group_Health_Questionnaire');
            $extension      = $file->getClientOriginalExtension(); // getting file extension
            $filename       = 'Upload_Group_Health_Questionnaire-'.time() . '.' . $extension;
            $file->move(uploadsDir('documents'), $filename);
            $data['Upload_Group_Health_Questionnaire'] = $filename;
        } 
        if ($request->hasfile('Upload_Merchant_Processing_Statements(3_months)')) {
            @mkdir(uploadsDir('documents'), 0755, true);
            //move | upload file on server
            $file           = $request->file('Upload_Merchant_Processing_Statements(3_months)');
            $extension      = $file->getClientOriginalExtension(); // getting file extension
            $filename       = 'Upload_Merchant_Processing_Statements(3_months)-'.time() . '.' . $extension;
            $file->move(uploadsDir('documents'), $filename);
            $data['Upload_Merchant_Processing_Statements(3_months)'] = $filename;
        } 
        if ($request->hasfile('Upload_Payroll_Summary_Report')) {
            @mkdir(uploadsDir('documents'), 0755, true);
            //move | upload file on server
            $file           = $request->file('Upload_Payroll_Summary_Report');
            $extension      = $file->getClientOriginalExtension(); // getting file extension
            $filename       = 'Upload_Payroll_Summary_Report-'.time() . '.' . $extension;
            $file->move(uploadsDir('documents'), $filename);
            $data['Upload_Payroll_Summary_Report'] = $filename;
        } 
        if ($request->hasfile('Upload_Workers_Comp_Loss_Runs(3_years)')) {
            @mkdir(uploadsDir('documents'), 0755, true);
            //move | upload file on server
            $file           = $request->file('Upload_Workers_Comp_Loss_Runs(3_years)');
            $extension      = $file->getClientOriginalExtension(); // getting file extension
            $filename       = 'Upload_Workers_Comp_Loss_Runs(3_years)-'.time() . '.' . $extension;
            $file->move(uploadsDir('documents'), $filename);
            $data['Upload_Workers_Comp_Loss_Runs(3_years)'] = $filename;
        } 
        if ($request->hasfile('Upload_Workers_Comp_Declaration_Page')) {
            @mkdir(uploadsDir('documents'), 0755, true);
            //move | upload file on server
            $file           = $request->file('Upload_Workers_Comp_Declaration_Page');
            $extension      = $file->getClientOriginalExtension(); // getting file extension
            $filename       = 'Upload_Workers_Comp_Declaration_Page-'.time() . '.' . $extension;
            $file->move(uploadsDir('documents'), $filename);
            $data['Upload_Workers_Comp_Declaration_Page'] = $filename;
        } 
        if ($request->hasfile('Upload_Real_Estate_Operating_Statement')) {
            @mkdir(uploadsDir('documents'), 0755, true);
            //move | upload file on server
            $file           = $request->file('Upload_Real_Estate_Operating_Statement');
            $extension      = $file->getClientOriginalExtension(); // getting file extension
            $filename       = 'Upload_Real_Estate_Operating_Statement-'.time() . '.' . $extension;
            $file->move(uploadsDir('documents'), $filename);
            $data['Upload_Real_Estate_Operating_Statement'] = $filename;
        } 
        if ($request->hasfile('Upload_Rent_Rolls(if_property_is_leased)')) {
            @mkdir(uploadsDir('documents'), 0755, true);
            //move | upload file on server
            $file           = $request->file('Upload_Rent_Rolls(if_property_is_leased)');
            $extension      = $file->getClientOriginalExtension(); // getting file extension
            $filename       = 'Upload_Rent_Rolls(if_property_is_leased)-'.time() . '.' . $extension;
            $file->move(uploadsDir('documents'), $filename);
            $data['Upload_Rent_Rolls(if_property_is_leased)'] = $filename;
        } 
        if ($request->hasfile('Upload_Recent_Tax_Returns')) {
            @mkdir(uploadsDir('documents'), 0755, true);
            //move | upload file on server
            $file           = $request->file('Upload_Recent_Tax_Returns');
            $extension      = $file->getClientOriginalExtension(); // getting file extension
            $filename       = 'Upload_Recent_Tax_Returns-'.time() . '.' . $extension;
            $file->move(uploadsDir('documents'), $filename);
            $data['Upload_Recent_Tax_Returns'] = $filename;
        } 
        if ($request->hasfile('Upload_Employee_Wage_Information')) {
            @mkdir(uploadsDir('documents'), 0755, true);
            //move | upload file on server
            $file           = $request->file('Upload_Employee_Wage_Information');
            $extension      = $file->getClientOriginalExtension(); // getting file extension
            $filename       = 'Upload_Employee_Wage_Information-'.time() . '.' . $extension;
            $file->move(uploadsDir('documents'), $filename);
            $data['Upload_Employee_Wage_Information'] = $filename;
        } 
        if ($request->hasfile('Upload_Trial_Balance')) {
            @mkdir(uploadsDir('documents'), 0755, true);
            //move | upload file on server
            $file           = $request->file('Upload_Trial_Balance');
            $extension      = $file->getClientOriginalExtension(); // getting file extension
            $filename       = 'Upload_Trial_Balance-'.time() . '.' . $extension;
            $file->move(uploadsDir('documents'), $filename);
            $data['Upload_Trial_Balance'] = $filename;
        } 
        if ($request->hasfile('Upload_Organizational_Chart')) {
            @mkdir(uploadsDir('documents'), 0755, true);
            //move | upload file on server
            $file           = $request->file('Upload_Organizational_Chart');
            $extension      = $file->getClientOriginalExtension(); // getting file extension
            $filename       = 'Upload_Organizational_Chart-'.time() . '.' . $extension;
            $file->move(uploadsDir('documents'), $filename);
            $data['Upload_Organizational_Chart'] = $filename;
        } 
        if ($request->hasfile('Upload_Sample_Contracts')) {
            @mkdir(uploadsDir('documents'), 0755, true);
            //move | upload file on server
            $file           = $request->file('Upload_Sample_Contracts');
            $extension      = $file->getClientOriginalExtension(); // getting file extension
            $filename       = 'Upload_Sample_Contracts-'.time() . '.' . $extension;
            $file->move(uploadsDir('documents'), $filename);
            $data['Upload_Sample_Contracts'] = $filename;
        } 
        if ($request->hasfile('Upload_Utility_bills(2_months)')) {
            @mkdir(uploadsDir('documents'), 0755, true);
            //move | upload file on server
            $file           = $request->file('Upload_Utility_bills(2_months)');
            $extension      = $file->getClientOriginalExtension(); // getting file extension
            $filename       = 'Upload_Utility_bills(2_months)-'.time() . '.' . $extension;
            $file->move(uploadsDir('documents'), $filename);
            $data['Upload_Utility_bills(2_months)'] = $filename;
        } 
        if ($request->hasfile('Upload_Provider/Supplier_Contract_Agreement')) {
            @mkdir(uploadsDir('documents'), 0755, true);
            //move | upload file on server
            $file           = $request->file('Upload_Provider/Supplier_Contract_Agreement');
            $extension      = $file->getClientOriginalExtension(); // getting file extension
            $filename       = 'Upload_Provider/Supplier_Contract_Agreement-'.time() . '.' . $extension;
            $file->move(uploadsDir('documents'), $filename);
            $data['Upload_Provider/Supplier_Contract_Agreement'] = $filename;
        } 
        if ($request->hasfile('Upload_Workers_Comp_Audits_(past_3_years)')) {
            @mkdir(uploadsDir('documents'), 0755, true);
            //move | upload file on server
            $file           = $request->file('Upload_Workers_Comp_Audits_(past_3_years)');
            $extension      = $file->getClientOriginalExtension(); // getting file extension
            $filename       = 'Upload_Workers_Comp_Audits_(past_3_years)-'.time() . '.' . $extension;
            $file->move(uploadsDir('documents'), $filename);
            $data['Upload_Workers_Comp_Audits_(past_3_years)'] = $filename;
        } 
        if ($request->hasfile('Upload_Audit_worksheets_(past_3_years)')) {
            @mkdir(uploadsDir('documents'), 0755, true);
            //move | upload file on server
            $file           = $request->file('Upload_Audit_worksheets_(past_3_years)');
            $extension      = $file->getClientOriginalExtension(); // getting file extension
            $filename       = 'Upload_Audit_worksheets_(past_3_years)-'.time() . '.' . $extension;
            $file->move(uploadsDir('documents'), $filename);
            $data['Upload_Audit_worksheets_(past_3_years)'] = $filename;
        } 
        if ($request->hasfile('Upload_Loss_runs_for_(past_3_years)')) {
            @mkdir(uploadsDir('documents'), 0755, true);
            //move | upload file on server
            $file           = $request->file('Upload_Loss_runs_for_(past_3_years)');
            $extension      = $file->getClientOriginalExtension(); // getting file extension
            $filename       = 'Upload_Loss_runs_for_(past_3_years)-'.time() . '.' . $extension;
            $file->move(uploadsDir('documents'), $filename);
            $data['Upload_Loss_runs_for_(past_3_years)'] = $filename;
        } 
        if ($request->hasfile('Rent_Rolls')) {
            @mkdir(uploadsDir('documents'), 0755, true);
            //move | upload file on server
            $file           = $request->file('Rent_Rolls');
            $extension      = $file->getClientOriginalExtension(); // getting file extension
            $filename       = 'Rent_Rolls-'.time() . '.' . $extension;
            $file->move(uploadsDir('documents'), $filename);
            $data['Rent_Rolls'] = $filename;
        } 
        if ($request->hasfile('Appraisals')) {
            @mkdir(uploadsDir('documents'), 0755, true);
            //move | upload file on server
            $file           = $request->file('Appraisals');
            $extension      = $file->getClientOriginalExtension(); // getting file extension
            $filename       = 'Appraisals-'.time() . '.' . $extension;
            $file->move(uploadsDir('documents'), $filename);
            $data['Appraisals'] = $filename;
        } 
        if ($request->hasfile('Depreciation_Schedule')) {
            @mkdir(uploadsDir('documents'), 0755, true);
            //move | upload file on server
            $file           = $request->file('Depreciation_Schedule');
            $extension      = $file->getClientOriginalExtension(); // getting file extension
            $filename       = 'Depreciation_Schedule-'.time() . '.' . $extension;
            $file->move(uploadsDir('documents'), $filename);
            $data['Depreciation_Schedule'] = $filename;
        } 
        if ($request->hasfile('Purchase_Agreement')) {
            @mkdir(uploadsDir('documents'), 0755, true);
            //move | upload file on server
            $file           = $request->file('Purchase_Agreement');
            $extension      = $file->getClientOriginalExtension(); // getting file extension
            $filename       = 'Purchase_Agreement-'.time() . '.' . $extension;
            $file->move(uploadsDir('documents'), $filename);
            $data['Purchase_Agreement'] = $filename;
        }

        if ($request->hasfile('Engineering_Plans1')) {
            @mkdir(uploadsDir('documents'), 0755, true);
            //move | upload file on server
            $file           = $request->file('Engineering_Plans1');
            $extension      = $file->getClientOriginalExtension(); // getting file extension
            $filename       = 'Engineering_Plans-'.time() . '.' . $extension;
            $file->move(uploadsDir('documents'), $filename);
            $data['Engineering_Plans'] = $filename;
        } 
        if ($request->hasfile('Engineering_Plans')) {
            @mkdir(uploadsDir('documents'), 0755, true);
            //move | upload file on server
            $file           = $request->file('Engineering_Plans');
            $extension      = $file->getClientOriginalExtension(); // getting file extension
            $filename       = 'Engineering_Plans-'.time() . '.' . $extension;
            $file->move(uploadsDir('documents'), $filename);
            $data['Engineering_Plans'] = $filename;
        } 
        if ($request->hasfile('Construction_Cost_Ledger')) {
            @mkdir(uploadsDir('documents'), 0755, true);
            //move | upload file on server
            $file           = $request->file('Construction_Cost_Ledger');
            $extension      = $file->getClientOriginalExtension(); // getting file extension
            $filename       = 'Construction_Cost_Ledger-'.time() . '.' . $extension;
            $file->move(uploadsDir('documents'), $filename);
            $data['Construction_Cost_Ledger'] = $filename;
        }
        if ($request->hasfile('Upload_Current_Medical_Waste_Contract')) {
            @mkdir(uploadsDir('documents'), 0755, true);
            //move | upload file on server
            $file           = $request->file('Upload_Current_Medical_Waste_Contract');
            $extension      = $file->getClientOriginalExtension(); // getting file extension
            $filename       = 'Upload_Current_Medical_Waste_Contract-'.time() . '.' . $extension;
            $file->move(uploadsDir('documents'), $filename);
            $data['Upload_Current_Medical_Waste_Contract'] = $filename;
        }

        if ($request->hasfile('User_Docs')) {
            @mkdir(uploadsDir('documents'), 0755, true);
            //move | upload file on server
            $file           = $request->file('User_Docs');
            $extension      = $file->getClientOriginalExtension(); // getting file extension
            $filename       = 'User_Docs-'.time() . '.' . $extension;
            $file->move(uploadsDir('documents'), $filename);
            $data['User_Docs'] = $filename;
        }

        if(isset($request->Business_Name)){
            foreach ($request->Business_Name as $index => $val) {
                if ($val != '') {
                    $data['Business_Name_' . ($index + 1)] = $val;
                }
            }
        }

        if(isset($request->Business_EIN_No)){
            foreach ($request->Business_EIN_No as $index => $val) {
                if ($val != '') {
                    $data['Business_EIN_No_' . ($index + 1)] = $val;
                }
            }
        }


        if(isset($request->Carrier)){
            foreach ($request->Carrier as $index => $val) {
                if ($val != '') {
                    $data['Carrier' . ($index + 1)] = $val;
                }
            }
        }

        if(isset($request->User_Name)){
            foreach ($request->User_Name as $index => $val) {
                if ($val != '') {
                    $data['User_Name' . ($index + 1)] = $val;
                }
            }
        }  

        if(isset($request->Password)){
            foreach ($request->Password as $index => $val) {
                if ($val != '') {
                    $data['Password' . ($index + 1)] = $val;
                }
            }
        }
         if ($request->hasfile('Upload_Parcel_Carrier_Contracts')) {
            @mkdir(uploadsDir('documents'), 0755, true);
            foreach ($request->file('Upload_Parcel_Carrier_Contracts') as $index => $val) {
                //move | upload file on server
                $file           = $val;
                $extension      = $file->getClientOriginalExtension(); // getting file extension
                $filename       = 'Upload_Parcel_Carrier_Contracts-'.($index + 1).'-'.time() . '.' . $extension;
                $file->move(uploadsDir('documents'), $filename);
                $data['Upload_Parcel_Carrier_Contracts'. ($index + 1)] = $filename;
            }
        } 
        if ($request->hasfile('Upload_Waste_Invoices_Statements_(3_months)')) {
            @mkdir(uploadsDir('documents'), 0755, true);
            //move | upload file on server
            $file           = $request->file('Upload_Waste_Invoices_Statements_(3_months)');
            $extension      = $file->getClientOriginalExtension(); // getting file extension
            $filename       = 'Upload_Waste_Invoices_Statements_(3_months)-'.time() . '.' . $extension;
            $file->move(uploadsDir('documents'), $filename);
            $data['Upload_Waste_Invoices_Statements_(3_months)'] = $filename;
        } 
        
        foreach ($data as $key => $value) {
            UsersChannelData::create([
                'user_id'     => auth()->user()->id,
                'field_name'  => $key,
                'field_value' => $value,
                'channel_id'  => $data['channel_id']
            ]);
        }

        return redirect()
            ->route('index')
            ->with('success', 'Channel has been Activated successfully.');
    }

    public function singleUserDashboardIframe()
    {
        if (auth()->check() && auth()->user()->user_type != 1) {
            abort(404);
        }

        $currentUser = (auth()->check()) ? auth()->user()->id:0;
        $dashboardData = SingleUserDashboard::where(['user_id' => $currentUser])->first();

        return view('frontend.dashboard', compact('dashboardData'));
    }

    public function mapChart()
    {
        if (auth()->check() && auth()->user()->user_type != 2) {
            abort(404);
        }
        return view('frontend.layouts.website.includes.mapChart');
    }

    public function monthChart()
    {
        if (auth()->check() && auth()->user()->user_type != 2) {
            abort(404);
        }
        return view('frontend.layouts.website.includes.monthChart');
    }

    public function savingChart()
    {
        if (auth()->check() && auth()->user()->user_type != 2) {
            abort(404);
        }
        return view('frontend.layouts.website.includes.savingChart');
    }

    public function masterOnboarding()
    {
        return view('frontend.master-onboarding');
    }

    public function subscriptions()
    {
        $subscriptions = Plan::getPlans(['is_active' => 1]);

        $data = User::getTransactions(['users.id' => auth()->user()->id]);
        $planId = (isset($data->latest_transaction_id) && $data->latest_transaction_id != '') ? Transaction::getPlanIdByTransactionId(['id' => $data->latest_transaction_id]) : [];
        $data['plan_id'] = (isset($planId[0]) && $planId[0] != '') ? $planId[0] : '';

        foreach ($subscriptions as $key => $subscription) {

            $subscription['short_description'] = strip_tags($subscription->short_description);
            $subscription['short_description'] = preg_split("/\r\n|\n|\r/", $subscription->short_description);

            $monthly_price = $subscription->monthly_price;
            $monthly_price_whole = intval($monthly_price);
            $decimal1 = $monthly_price - $monthly_price_whole; 
            $decimal2 = round($decimal1, 2); 
            $monthly_price_decimal = substr($decimal2, 2); 

            $subscription['monthly_price_whole'] = $monthly_price_whole;
            $subscription['monthly_price_decimal'] = $monthly_price_decimal;

        }

        return view('frontend.subscription', compact('subscriptions','data'));
    }


    public function subscribePlan($id = 0)
    {
        $plan = Plan::getPlans(['id' => $id])->first();

        if (!$plan) {
            abort(404);
        }
        
        return view('frontend.subscribe-plan', compact('plan'));
    }


    public function subscribe(Request $request, $id = 0)
    {
        if ($request->cardselect == 2) { // add-new
            try {
                Stripe::setApiKey(config('app.stripe_secret_key'));

                $customer = \Stripe\Customer::create([
                    'email'  => auth()->user()->email,
                    "source" => $request->stripeToken
                ]);

                $plan = Plan::find($id);

                $description = 'Plan Subscription Fee $'.$plan->monthly_price;
                $params = [
                    'currency'    => 'USD',
                    'amount'      => $plan->monthly_price * 100,
                    'description' => $description,
                    'customer'    => $customer->id,
                    "card"        => $request->stripeCard
                ];

                $charge = \Stripe\Charge::create($params);

                if (isset($charge) && isset($charge->id) && $charge->id != '') {

                    // Add transaction on successful stripe charging
                    $transaction = [
                        'user_id'                => auth()->user()->id,
                        'plan_id'                => $plan->id,
                        'stripe_charge_id'       => $charge->id,
                        'charged_amount'         => $plan->monthly_price,
                        'description'            => $description,
                        'created_at'             => date('Y-m-d H:i:s'),
                        'updated_at'             => date('Y-m-d H:i:s')
                    ];

                    Transaction::create($transaction);
                }

                if(strtotime(auth()->user()->expiry_date) > strtotime(date("Y-m-d H:i:s")))
                {
                    $days = date("Y-m-d H:i:s", strtotime(auth()->user()->expiry_date . "+30 days"));
                }else{
                    $days = date("Y-m-d H:i:s", strtotime( "+30 days"));
                }

                $data['stripe_customer_id'] = $customer->id;
                $data['stripe_token_id']    = $request->stripeToken;
                $data['stripe_card_id']     = $request->stripeCard;
                $data['expiry_date']        = $days;

                User::where('id', auth()->user()->id)->update($data);

                } catch (\Stripe\Exception\ApiConnectionException $e) {
                    return redirect()
                        ->back()
                        ->with('error', $e->getMessage());
                } catch(\Stripe\Exception\ApiErrorException $e) {
                    return redirect()
                        ->back()
                        ->with('error', $e->getMessage());
                } catch (\Stripe\Exception\AuthenticationException $e) {
                    return redirect()
                        ->back()
                        ->with('error', $e->getMessage());
                } catch (\Stripe\Exception\BadMethodCallException $e) {
                    return redirect()
                        ->back()
                        ->with('error', $e->getMessage());
                } catch (\Stripe\Exception\CardException $e) {
                    return redirect()
                        ->back()
                        ->with('error', $e->getMessage());
                } catch (\Stripe\Exception\ExceptionInterface $e) {
                    return redirect()
                        ->back()
                        ->with('error', $e->getMessage());
                } catch (\Stripe\Exception\IdempotencyException $e) {
                    return redirect()
                        ->back()
                        ->with('error', $e->getMessage());
                } catch (\Stripe\Exception\InvalidArgumentException $e) {
                    return redirect()
                        ->back()
                        ->with('error', $e->getMessage());
                } catch (\Stripe\Exception\InvalidRequestException $e) {
                    return redirect()
                        ->back()
                        ->with('error', $e->getMessage());
                } catch (\Stripe\Exception\PermissionException $e) {
                    return redirect()
                        ->back()
                        ->with('error', $e->getMessage());
                } catch (\Stripe\Exception\RateLimitException $e) {
                    return redirect()
                        ->back()
                        ->with('error', $e->getMessage());
                } catch (\Stripe\Exception\SignatureVerificationException $e) {
                    return redirect()
                        ->back()
                        ->with('error', $e->getMessage());
                } catch (\Stripe\Exception\UnexpectedValueException $e) {
                    return redirect()
                        ->back()
                        ->with('error', $e->getMessage());
                } catch (\Stripe\Exception\UnknownApiErrorException $e) {
                    return redirect()
                        ->back()
                        ->with('error', $e->getMessage());
                } catch (\Stripe\Exception\OAuth\ExceptionInterface $e) {
                    return redirect()
                        ->back()
                        ->with('error', $e->getMessage());
                } catch (\Stripe\Exception\OAuth\InvalidClientException $e) {
                    return redirect()
                        ->back()
                        ->with('error', $e->getMessage());
                } catch (\Stripe\Exception\OAuth\InvalidGrantException $e) {
                    return redirect()
                        ->back()
                        ->with('error', $e->getMessage());
                } catch (\Stripe\Exception\OAuth\InvalidRequestException $e) {
                    return redirect()
                        ->back()
                        ->with('error', $e->getMessage());
                } catch (\Stripe\Exception\OAuth\InvalidScopeException $e) {
                    return redirect()
                        ->back()
                        ->with('error', $e->getMessage());
                } catch (\Stripe\Exception\OAuth\OAuthErrorException $e) {
                    return redirect()
                        ->back()
                        ->with('error', $e->getMessage());
                } catch (\Stripe\Exception\OAuth\UnknownOAuthErrorException $e) {
                    return redirect()
                        ->back()
                        ->with('error', $e->getMessage());
                } catch (\Stripe\Exception\OAuth\UnsupportedGrantTypeException $e) {
                    return redirect()
                        ->back()
                        ->with('error', $e->getMessage());
                } catch (\Stripe\Exception\OAuth\UnsupportedResponseTypeException $e) {
                    return redirect()
                        ->back()
                        ->with('error', $e->getMessage());
                }
            } else if ($request->cardselect == 1) { 
                 try {
                Stripe::setApiKey(config('app.stripe_secret_key'));

                $customer = \Stripe\Customer::create([
                    'email'  => auth()->user()->email,
                    "source" => auth()->user()->stripeToken
                ]);
                $plan = Plan::find($id);

                $description = 'Plan Subscription Fee $'.$plan->monthly_price;
                $params = [
                    'currency'    => 'USD',
                    'amount'      => $plan->monthly_price * 100,
                    'description' => $description,
                    'customer'    => auth()->user()->stripe_customer_id,
                    "card"        => auth()->user()->stripeCard
                ];

                $charge = \Stripe\Charge::create($params);

                if (isset($charge) && isset($charge->id) && $charge->id != '') {

                    // Add transaction on successful stripe charging
                    $transaction = [
                        'user_id'                => auth()->user()->id,
                        'plan_id'                => $plan->id,
                        'stripe_charge_id'       => $charge->id,
                        'charged_amount'         => $plan->monthly_price,
                        'description'            => $description,
                        'created_at'             => date('Y-m-d H:i:s'),
                        'updated_at'             => date('Y-m-d H:i:s')
                    ];

                    Transaction::create($transaction);
                }

                if(strtotime(auth()->user()->expiry_date) > strtotime(date("Y-m-d H:i:s")))
                {
                    $days = date("Y-m-d H:i:s", strtotime(auth()->user()->expiry_date . "+30 days"));
                }else{
                    $days = date("Y-m-d H:i:s", strtotime( "+30 days"));
                }

                $data['stripe_customer_id'] = auth()->user()->stripe_customer_id;
                $data['stripe_token_id']    = auth()->user()->stripeToken;
                $data['stripe_card_id']     = auth()->user()->stripeCard;
                $data['expiry_date']        = $days;

                User::where('id', auth()->user()->id)->update($data);

                } catch (\Stripe\Exception\ApiConnectionException $e) {
                    return redirect()
                        ->back()
                        ->with('error', $e->getMessage());
                } catch(\Stripe\Exception\ApiErrorException $e) {
                    return redirect()
                        ->back()
                        ->with('error', $e->getMessage());
                } catch (\Stripe\Exception\AuthenticationException $e) {
                    return redirect()
                        ->back()
                        ->with('error', $e->getMessage());
                } catch (\Stripe\Exception\BadMethodCallException $e) {
                    return redirect()
                        ->back()
                        ->with('error', $e->getMessage());
                } catch (\Stripe\Exception\CardException $e) {
                    return redirect()
                        ->back()
                        ->with('error', $e->getMessage());
                } catch (\Stripe\Exception\ExceptionInterface $e) {
                    return redirect()
                        ->back()
                        ->with('error', $e->getMessage());
                } catch (\Stripe\Exception\IdempotencyException $e) {
                    return redirect()
                        ->back()
                        ->with('error', $e->getMessage());
                } catch (\Stripe\Exception\InvalidArgumentException $e) {
                    return redirect()
                        ->back()
                        ->with('error', $e->getMessage());
                } catch (\Stripe\Exception\InvalidRequestException $e) {
                    return redirect()
                        ->back()
                        ->with('error', $e->getMessage());
                } catch (\Stripe\Exception\PermissionException $e) {
                    return redirect()
                        ->back()
                        ->with('error', $e->getMessage());
                } catch (\Stripe\Exception\RateLimitException $e) {
                    return redirect()
                        ->back()
                        ->with('error', $e->getMessage());
                } catch (\Stripe\Exception\SignatureVerificationException $e) {
                    return redirect()
                        ->back()
                        ->with('error', $e->getMessage());
                } catch (\Stripe\Exception\UnexpectedValueException $e) {
                    return redirect()
                        ->back()
                        ->with('error', $e->getMessage());
                } catch (\Stripe\Exception\UnknownApiErrorException $e) {
                    return redirect()
                        ->back()
                        ->with('error', $e->getMessage());
                } catch (\Stripe\Exception\OAuth\ExceptionInterface $e) {
                    return redirect()
                        ->back()
                        ->with('error', $e->getMessage());
                } catch (\Stripe\Exception\OAuth\InvalidClientException $e) {
                    return redirect()
                        ->back()
                        ->with('error', $e->getMessage());
                } catch (\Stripe\Exception\OAuth\InvalidGrantException $e) {
                    return redirect()
                        ->back()
                        ->with('error', $e->getMessage());
                } catch (\Stripe\Exception\OAuth\InvalidRequestException $e) {
                    return redirect()
                        ->back()
                        ->with('error', $e->getMessage());
                } catch (\Stripe\Exception\OAuth\InvalidScopeException $e) {
                    return redirect()
                        ->back()
                        ->with('error', $e->getMessage());
                } catch (\Stripe\Exception\OAuth\OAuthErrorException $e) {
                    return redirect()
                        ->back()
                        ->with('error', $e->getMessage());
                } catch (\Stripe\Exception\OAuth\UnknownOAuthErrorException $e) {
                    return redirect()
                        ->back()
                        ->with('error', $e->getMessage());
                } catch (\Stripe\Exception\OAuth\UnsupportedGrantTypeException $e) {
                    return redirect()
                        ->back()
                        ->with('error', $e->getMessage());
                } catch (\Stripe\Exception\OAuth\UnsupportedResponseTypeException $e) {
                    return redirect()
                        ->back()
                        ->with('error', $e->getMessage());
                }
            } else {
                return redirect()
                    ->back()
                    ->with('error', 'Your card information is not correct.');
            }

        return redirect()
            ->route('index')
            ->with('success', 'Plan has been Subscribed successfully.');

    }


    public function updateCard()
    {
        /*************************
        * Get Card Details
        **************************/

        $stripeToken = auth()->user()->stripe_token_id;
        $token = false;

        if ($stripeToken != '') {
            try {
                \Stripe\Stripe::setApiKey(config('app.stripe_secret_key'));

                $token = \Stripe\Token::retrieve($stripeToken);
            } catch (\Stripe\Exception\AuthenticationException $e) {
                return redirect()
                    ->route('index')
                    ->with('error', $e->getMessage());
            }
        }

        $data['token'] = $token;

        return view('frontend.update-card', compact('data'));
    }

    public function updateCardDetails(Request $request)
    {
        /*************************
        *
        * Update Card Details
        * 
        **************************/
        Stripe::setApiKey(config('app.stripe_secret_key'));

        try{
        $customer = \Stripe\Customer::create([
            'email'  => auth()->user()->email,
            "source" => $request->stripeToken
        ]);

        $data['stripe_customer_id'] = $customer->id;
        $data['stripe_token_id']    = $request->stripeToken;
        $data['stripe_card_id']     = $request->stripeCard;

        User::where('id', auth()->user()->id)->update($data);

            } catch (\Stripe\Exception\ApiConnectionException $e) {
                return redirect()
                    ->back()
                    ->with('error', $e->getMessage());
            } catch(\Stripe\Exception\ApiErrorException $e) {
                return redirect()
                    ->back()
                    ->with('error', $e->getMessage());
            } catch (\Stripe\Exception\AuthenticationException $e) {
                return redirect()
                    ->back()
                    ->with('error', $e->getMessage());
            } catch (\Stripe\Exception\BadMethodCallException $e) {
                return redirect()
                    ->back()
                    ->with('error', $e->getMessage());
            } catch (\Stripe\Exception\CardException $e) {
                return redirect()
                    ->back()
                    ->with('error', $e->getMessage());
            } catch (\Stripe\Exception\ExceptionInterface $e) {
                return redirect()
                    ->back()
                    ->with('error', $e->getMessage());
            } catch (\Stripe\Exception\IdempotencyException $e) {
                return redirect()
                    ->back()
                    ->with('error', $e->getMessage());
            } catch (\Stripe\Exception\InvalidArgumentException $e) {
                return redirect()
                    ->back()
                    ->with('error', $e->getMessage());
            } catch (\Stripe\Exception\InvalidRequestException $e) {
                return redirect()
                    ->back()
                    ->with('error', $e->getMessage());
            } catch (\Stripe\Exception\PermissionException $e) {
                return redirect()
                    ->back()
                    ->with('error', $e->getMessage());
            } catch (\Stripe\Exception\RateLimitException $e) {
                return redirect()
                    ->back()
                    ->with('error', $e->getMessage());
            } catch (\Stripe\Exception\SignatureVerificationException $e) {
                return redirect()
                    ->back()
                    ->with('error', $e->getMessage());
            } catch (\Stripe\Exception\UnexpectedValueException $e) {
                return redirect()
                    ->back()
                    ->with('error', $e->getMessage());
            } catch (\Stripe\Exception\UnknownApiErrorException $e) {
                return redirect()
                    ->back()
                    ->with('error', $e->getMessage());
            } catch (\Stripe\Exception\OAuth\ExceptionInterface $e) {
                return redirect()
                    ->back()
                    ->with('error', $e->getMessage());
            } catch (\Stripe\Exception\OAuth\InvalidClientException $e) {
                return redirect()
                    ->back()
                    ->with('error', $e->getMessage());
            } catch (\Stripe\Exception\OAuth\InvalidGrantException $e) {
                return redirect()
                    ->back()
                    ->with('error', $e->getMessage());
            } catch (\Stripe\Exception\OAuth\InvalidRequestException $e) {
                return redirect()
                    ->back()
                    ->with('error', $e->getMessage());
            } catch (\Stripe\Exception\OAuth\InvalidScopeException $e) {
                return redirect()
                    ->back()
                    ->with('error', $e->getMessage());
            } catch (\Stripe\Exception\OAuth\OAuthErrorException $e) {
                return redirect()
                    ->back()
                    ->with('error', $e->getMessage());
            } catch (\Stripe\Exception\OAuth\UnknownOAuthErrorException $e) {
                return redirect()
                    ->back()
                    ->with('error', $e->getMessage());
            } catch (\Stripe\Exception\OAuth\UnsupportedGrantTypeException $e) {
                return redirect()
                    ->back()
                    ->with('error', $e->getMessage());
            } catch (\Stripe\Exception\OAuth\UnsupportedResponseTypeException $e) {
                return redirect()
                    ->back()
                    ->with('error', $e->getMessage());
            }

        return redirect()
            ->route('update-card')
            ->with('success', 'Your card have been updated.');
    }

    public function sendMessage(Request $request)
    {

        if (($request->message != '' || $request->hasfile('file') != '') && $request->to != '') {
            $filename="";
            $messageData = Message::create([
                'to_id'        => $request->to,
                'from_id'      => auth()->user()->id, 
                'message'      => $request->message,
                'message_type' => 1,
                'is_read'      => 0
            ]);

            if ($request->hasfile('file')) {
                //move | upload file on server
                $file           = $request->file('file');
                $extension      = $file->getClientOriginalExtension(); // getting file extension
                $filename       = 'message-'.time() . '.' . $extension;
                $file->move(uploadsDir('messages'), $filename);
                Message::where(['id'=>$messageData->id])->update(['media'=>$filename]);

                $filesize = fileSize((uploadsDir('messages').$filename));
                $filesize = round($filesize /1000000, 2);
            } 

            $data['updated_at_Format'] = $messageData['updated_at']->diffForHumans();
            $data['message']           = $request->message;
            $data['media']             = $filename;      
            $data['size']              = (isset($filesize) && $filesize != '') ? $filesize:'';
            $data['created_at']        = $messageData['created_at']->diffForHumans();
            $error                     = 0;
            $message                   = "message has been posted successfully.";
        }

        return response()->json([
            'error'   => $error,
            'data'    => $data,
            'message' => $message
        ]);
    }


    public function messages($user_id = 0, $user_name = '')
    {
        $currentUser         = (auth()->check() && auth()->user()->id) ? auth()->user()->id : 0;
        $usersWithLastMesage = Message::getUsers($currentUser);
        $user                = 0;

        if (isset($usersWithLastMesage[array_key_first($usersWithLastMesage)]->checking)) {
            $user = $usersWithLastMesage[array_key_first($usersWithLastMesage)]->checking;
        } elseif (base64_decode($user_id) > 0) {
            $user = base64_decode($user_id);
        } else {
            $user = 0;
        }

        if ($user > 0){
            $userChat            = Message::getAllMessages(
            ['messages.to_id' => $currentUser, 'messages.from_id' => $user],
            ['messages.to_id' => $user, 'messages.from_id' => $currentUser]
        );

            foreach ($userChat as $key => $message){
                if ($message->media != '' || $message->media != null && file_exists(uploadsDir('messages') . $message->media)){
                    $filesize = fileSize((uploadsDir('messages').$message->media));
                    $filesize = round($filesize /1000000, 2) ;
                    $userChat[$key]['media_size'] =  $filesize;

                }
            }

            $userDetails = User::find($user);
        }

        else{
            $userChat    = '';
            $userDetails = '';
        }

        return view('frontend.message', compact('usersWithLastMesage', 'userChat', 'userDetails'));
    }

    public function userMessagesAjax($user_id = 0, $user_name = '')
    {
        $currentUser         = (auth()->check() && auth()->user()->id) ? auth()->user()->id : 0;
        $usersWithLastMesage = Message::getUsers($currentUser);
        $user                = ($user_id || $user_id != 0) ? $user_id :$usersWithLastMesage[array_key_first($usersWithLastMesage)]->checking;
        $userChat            = Message::getAllMessages(
            ['messages.to_id' => $currentUser, 'messages.from_id' => $user],
            ['messages.to_id' => $user, 'messages.from_id' => $currentUser]
        );

        foreach ($userChat as $key => $message){
            if ($message->media != '' || $message->media != null && file_exists(uploadsDir('messages') . $message->media)){
                $filesize = fileSize((uploadsDir('messages') . $message->media));
                $filesize = round($filesize /1000000, 2);
                $userChat[$key]['media_size'] =  $filesize;
            }
        }
    
        $error = 0;
        $message = "Messages load List.";
        return response()->json([
            'error'   => $error,
            'data'    => $userChat,
            'message' => $message
        ]);
    }

    public function downloadCustomerChannelQuestion($id)
    {
        if (auth()->check() && auth()->user()->user_type != 2) {
            abort(404);
        }

        $channelClients = Channel::getMyClients(['channel_partner_id' => auth()->user()->id]);

        if (!in_array($id, explode(',', $channelClients->channel_clients_ids))) {
            return redirect()
                    ->back()
                    ->with('error', 'Opps! not your client.');
        }

        $usersChannelData = UsersChannelData::getUsersChannelData(['users_channel_data.user_id' => $id]);

        if(!$usersChannelData && empty($usersChannelData)){
            return redirect()
                    ->back()
                    ->with('error', 'Opps! no data found.');
        }

        foreach($usersChannelData AS $key => $value) {
            $exceptFile[$key] =  explode('.', $value['field_value']);
            if(
                !in_array('csv', $exceptFile[$key]) && 
                !in_array('docx', $exceptFile[$key]) && 
                !in_array('pdf', $exceptFile[$key]) && 
                !in_array('xlsx', $exceptFile[$key]) && 
                !in_array('xls', $exceptFile[$key]) && 
                !in_array('txt', $exceptFile[$key]) && 
                $value['field_name'] != 'channel_id'
            )
            {
                $userChannelsdata[$value['field_name']] = $value['field_value'];
            }
        }

        $User_Name                = 0;
        $Carrier                  = 0;
        $Password                 = 0;
        $business_no              = 0;
        $business_ein_no          = 0;
        $s_no                     = 0;
        $channelClients           = User::getUsers(['users.id' => $id])->first();
        $data['userChannelsdata'] = $userChannelsdata;
        $data['channelClients']   = $channelClients;
        $data['s_no']             = $s_no;
        $data['business_no']      = $business_no;
        $data['business_ein_no']  = $business_ein_no;
        $data['Password']         = $Password;
        $data['Carrier']          = $Carrier;
        $data['User_Name']        = $User_Name;

       /* return view('frontend.download-user-channel-data', compact('userChannelsdata', 'channelClients', 's_no','business_no', 'Password', 'business_ein_no', 'Carrier', 'User_Name'));*/
        $pdf = PDF::loadView('frontend.download-user-channel-data', $data);
        return $pdf->download('Customer-QAs.pdf');

    }

    public function downloadCustomerChannelDocuments($id)
    {
        if (auth()->check() && auth()->user()->user_type != 2) {
            abort(404);
        }

        $channelClients = Channel::getMyClients(['channel_partner_id' => auth()->user()->id]);

        if (!in_array($id, explode(',', $channelClients->channel_clients_ids))) {
            return redirect()
                    ->back()
                    ->with('error', 'Opps! not your client.');
        }

        $file_path = '';
        $usersChannelData = UsersChannelData::getUsersChannelData(['users_channel_data.user_id' => $id]);

        if(!$usersChannelData && empty($usersChannelData)){
            return redirect()
                    ->back()
                    ->with('error', 'Opps! no data found.');
        }

        foreach($usersChannelData AS $key => $value) {
            $exceptFile[$key] =  explode('.', $value['field_value']);
            if('Signs_Agreement' == $value['field_name'])
            {
                if(file_exists(uploadsDir('documents') . $value['field_value'])){
                    $file_path =  public_path(uploadsDir('documents').$value['field_value']);
                    return response()->download($file_path);
                }
            }
        }
    }

}