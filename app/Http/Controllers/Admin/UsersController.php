<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Channel;
use App\Models\State;
use App\Http\Requests\Admin\StoreUserRequest;
use App\Http\Requests\Admin\UpdateUserRequest;

class UsersController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
        parent::__construct();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {   
        $user_type = isset($request->user_type) && $request->user_type != '' ? $request->user_type : '';
        $users = User::getUsers(['users.user_type' => $user_type]);

        return view('admin.users.index', compact('users','user_type'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $distributors = User::getUsers(['users.user_type' => 3]);
        $states = State::get();
        $channels = Channel::getReadyToAssignChannels(['channel_partner_id' => 0]);

        return view('admin.users.create',compact('distributors','channels', 'states'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserRequest $request)
    {
        $data = $request->except([
            '_token',
            '_method',
            'confirm_password',
            'channel'
        ]);
        if ($request->hasfile('image')) {
        @mkdir(uploadsDir('users'), 0755, true);

        //move | upload file on server
        $file = $request->file('image');
        $extension     = $file->getClientOriginalExtension(); // getting file extension
        $filename      = 'users-'.time() . '.' . $extension;
        $file->move(uploadsDir('users'), $filename);
        $data['image'] = $filename;
        }

        $data['termsofservices'] = 1;
        $data['password'] = bcrypt($data['password']);
        $data['parent_id'] = isset($request->parent_id) && $request->parent_id != '' ? $request->parent_id : 0;

        User::create($data);

        $user = User::getRecentUser();

        $channel_id = isset($request->channel) && $request->channel != '' ? $request->channel : 0;
        Channel::where('id', $channel_id)->update(['channel_partner_id' => $user->id]);

        return redirect()
            ->route('admin.users.index',['user_type' => $request->user_type])
            ->with('success', 'User has been created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = User::getUsers(['users.id' => $id])->first();
        
        $count = User::getUsersCount(['users.parent_id' => $data->id]);

        return view('admin.users.show', compact('data','count'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = User::getUsers(['users.id' => $id])->first();
        $states = State::get();
        $distributors = User::getUsers(['users.user_type' => 3]);
        $channels = Channel::getReadyToAssignChannels(['channel_partner_id' => 0]);

        return view('admin.users.edit', compact('data','distributors','channels', 'states'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserRequest $request, $id)
    {
        $data = $request->except([
            '_token',
            '_method',
            'password',
            'confirm_password',
            'previous_image',
            'channel'
        ]);

        if ($request->hasfile('image')) {
            if (!empty($request->previous_image)) {
                if (!empty($request->previous_image) && file_exists(uploadsDir('users') . $request->previous_image)) {
                    unlink(uploadsDir('users') . $request->previous_image);
                }
            }


        @mkdir(uploadsDir('users'), 0755, true);

        //move | upload file on server
        $file = $request->file('image');
        $extension     = $file->getClientOriginalExtension(); // getting file extension
        $filename      = 'users-'.time() . '.' . $extension;
        $file->move(uploadsDir('users'), $filename);
        $data['image'] = $filename;
        }

        $data['termsofservices'] = 1;
        if (isset($request->password) && $request->password !='') {
            $data['password'] = bcrypt($request->password);
        }
        $data['parent_id'] = isset($request->parent_id) && $request->parent_id != '' ? $request->parent_id : 0;


        User::where('id', $id)->update($data);

        $channel_id = isset($request->channel) && $request->channel != '' ? $request->channel : 0;


        $channel = Channel::getReadyToAssignChannels(['channel_partner_id' => $id])->first();

        if (isset($channel->id) != $channel_id) {
            Channel::where('id', isset($channel->id))->update(['channel_partner_id' => 0]);
            Channel::where('id', $channel_id)->update(['channel_partner_id' => $id]);
        } 


        return redirect()
            ->route('admin.users.index',['user_type' => $request->user_type])
            ->with('success', 'User has been updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        User::where('id', $id)->delete();

        $error   = 0;
        $data    = [];
        $message = "User has been removed successfully.";

        return response()->json([
            'error'   => $error,
            'message' => $message,
            'data'    => $data
        ]);
    }

    public function HideDashboard(Request $request)
    {
        $hide_dashboard = isset($request->hide_dashboard) && $request->hide_dashboard != '' ?$request->hide_dashboard : 0;
        $id = isset($request->id) && $request->id != '' ?$request->id : 0;

        User::where('id', $id)->update(['hide_dashboard' => $hide_dashboard]);

        $error   = 0;
        $data    = [];
        $message = "User has been hide from dashboard successfully.";

        return response()->json([
            'error'   => $error,
            'message' => $message,
            'data'    => $data
        ]);
    }

}
