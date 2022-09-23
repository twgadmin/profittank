<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Front\Controller;
use Illuminate\Http\Request;
use Session;
use App\Models\Revenue;
use DateTime;
use Arr;
use DatePeriod;
use DateInterval;

class CalculatorController extends Controller
{

    // Add multiple business id into session
    public function addBusinessID(Request $request){
        $id = $request->business_id;
        $business = session()->get('business');
        $class = '';
        if (empty($business)) {
            $businessArray = array();
            array_push($businessArray, $id);
            $business =  $businessArray;
            $class = 'active';
        }else{
            $businessArray = $business;
            if (in_array($id, $businessArray)){
                unset($businessArray[array_search($id, $businessArray)]);
                $class = '';
            }
            else{
                array_push($businessArray, $id);
                $class = 'active';
            }

            $business =  $businessArray;
        }
        session()->put('business', $business);
        return response()->json(['status' => '200', 'class' => $class]);
    }

    // Get first step
    public function getCalculator(){
        $business = session()->get('business');
        session()->put('netProfit',0);
        session()->put('salesEquivalent',0);
        session()->put('oldProfitMergin',0);
        session()->put('newProfitMergin',0);
        session()->put('lifeTimeValue',0);
        if (!empty($business)) {
           Session::forget('business');
           Session::forget('currentStep');
           Session::forget('completedSteps');
           Session::forget('prevStep');
           Session::forget('lastId');
           Session::forget('stepCompleted');
           $inputFields = busnessFields;
            foreach($inputFields as $field){
                Session::forget($field);
            }
           
        }
        return view('frontend.revenue');
    }

    //Get Slider to next step
    public function moveNextStep(Request $request){
        $business = session()->get('business');
        $currentStep = session()->get('currentStep');
        $completedSteps = session()->get('completedSteps');
        $wages = session()->get('wages');
        $filledStepArray = session()->get('stepCompleted');
        $prev = session()->get('prevStep');
        $skipArray = array(0);
        if(empty($filledSteps)){
            $filledSteps = 0;
        }
        
        if(empty($lastStep)){
            $lastStep = 0;
        }
        if (empty($business) || $request->page_id == 1) {
            session()->put('currentStep', 2);
            $progress = 0;
            $completedSteps = array(1);
            session()->put('completedSteps', $completedSteps);
            $filledStepArray = array(1);
            session()->put('stepCompleted',$filledStepArray);
            $result = array(
                'ertc'                  => 0,
                'r_d_taxt_credit'       => 0,
                'wotc'                  => 0,
                'worker_comp'           => 0,
                'commercial_property'   => 0,
                'peo'                   => 0,
                'process_automation'    => 0,
                'electronic_payment'    => 0,
                'solid_waste'           => 0,
                'medical_waste'         => 0,
                'property_tax'          => 0,
                'shipping_result'       => 0,
                'health_insurance'      => 0,
                'business_telephone'    => 0,
                'net_profit'            => 0,
                'net_profit_margin'     => 0,
                'new_net_profit_margin' => 0,
                'revenue_equivalent'    => 0,
                'getUtility'            => 0,
                'life_time_value'       => 0,
                'cash_benefit'          => 0,
                'tax_credit_benefit'    => 0,
                'year_1'                => 0,
                'year_2'                => 0,
                'year_3'                => 0,
            );
            $prevNext = '';
            return view('frontend.calculator.step-2', compact('business','progress','result','prevNext'));
        }
        else{
            $arrayList = allbusiness;
            $TotalarrayList = allbusiness;
            $listOfSteps = allbusiness;
            foreach($business as $id){
               foreach(constant($id) as $step){
                   array_push($arrayList, $step);
                   array_push($TotalarrayList, $step);
                   array_push($listOfSteps, $step);
               }
               array_push($TotalarrayList, 0);
            }

            $inputFields = busnessFields;
            foreach($inputFields as $field){
                if(isset($request->$field)){
                    session()->put($field, $request->$field);
                }
            }

            // Business-1 unset steps when it is not applicable
            if($request->business_exp == 'Yes' || session()->get('business_exp') == 'Yes'){
                $unsetValue = array_search(7, $arrayList);
                // uset elements from business array
                unset($arrayList[$unsetValue]);

                $unsetStepCompleted = array_search(7, $completedSteps);
                // uset elements from business array
                if($unsetStepCompleted){
                    unset($completedSteps[$unsetStepCompleted]);
                }
                //Session::forget('calender_business_experience');
               
            }

            // Business-1 unset steps when it is not applicable
            if($request->calender_business_experience == 'No' || $request->calender_business_experience == 'Unknown' || session()->get('calender_business_experience') == 'No' || session()->get('calender_business_experience') == 'Unknown'){
                $unsetArray = array(8);
                // uset elements from business array
                foreach($unsetArray as $unset){
                    $unsetValue = array_search($unset, $arrayList);
                    unset($arrayList[$unsetValue]);
                    $unsetStepCompleted = array_search($unset, $completedSteps);
                    // uset elements from business array
                    if($unsetStepCompleted){
                        unset($completedSteps[$unsetStepCompleted]);
                    }
                }
                
                //Session::forget('total_emp');
                //Session::forget('payment_US');
                //Session::forget('wages');
                //Session::forget('supplies');
                
            }

            // Business-1 unset steps when it is not applicable
            if($request->payment_US == 'No' || $request->payment_US == 'Unknown' || session()->get('payment_US') == 'No' || session()->get('payment_US') == 'Unknown'){
                $unsetValue = array_search(10, $arrayList);
                // uset elements from business array
                unset($arrayList[$unsetValue]);
                $unsetStepCompleted = array_search(10, $completedSteps);
                // uset elements from business array
                if($unsetStepCompleted){
                    unset($completedSteps[$unsetStepCompleted]);
                }
                //Session::forget('wages');
                //Session::forget('supplies');
            }

           
           
            // Business-2 unset steps when it is not applicable
            if($request->company_premium == 'No' || $request->company_premium == 'Unknown' || session()->get('company_premium') == 'No' || session()->get('company_premium') == 'Unknown'){
                $unsetValue = array_search(18, $arrayList);
                // uset elements from business array
                unset($arrayList[$unsetValue]);
                $unsetStepCompleted = array_search(18, $completedSteps);
                // uset elements from business array
                if($unsetStepCompleted){
                    unset($completedSteps[$unsetStepCompleted]);
                }
                //Session::forget('worker_premium');
                
            }


            // Business-4 unset steps when it is not applicable
            if($request->commercial_property == 'No' || $request->commercial_property == 'Unknown' || session()->get('commercial_property') == 'No' || session()->get('commercial_property') == 'Unknown'){
                $unsetArray = array(12, 13);
                // uset elements from business array
                foreach($unsetArray as $unset){
                    $unsetValue = array_search($unset, $arrayList);
                    unset($arrayList[$unsetValue]);
                    $unsetStepCompleted = array_search($unset, $completedSteps);
                    // uset elements from business array
                    if($unsetStepCompleted){
                        unset($completedSteps[$unsetStepCompleted]);
                    }
                }
                //Session::forget('prop_type');
                //Session::forget('property_cost');
                //Session::forget('audit_time');
                //Session::forget('property_value');
                //Session::forget('recent_tax');
                
            }

            // Business-4 unset steps when it is not applicable
            if($request->audit_time == 'Less than 1 year' || session()->get('audit_time') == 'Less than 1 year'){
                $unsetArray = array(15, 16);
                // uset elements from business array
                foreach($unsetArray as $unset){
                    $unsetValue = array_search($unset, $arrayList);
                    unset($arrayList[$unsetValue]);
                    $unsetStepCompleted = array_search($unset, $completedSteps);
                    // uset elements from business array
                    if($unsetStepCompleted){
                        unset($completedSteps[$unsetStepCompleted]);
                    }
                }
                //Session::forget('property_value');
                //Session::forget('recent_tax');
               
            }

            // Business-6 unset steps when it is not applicable
            if($request->health_insurance == 'No' || session()->get('health_insurance') == 'No'){
                $unsetArray = array(20, 21, 22);
                // uset elements from business array
                foreach($unsetArray as $unset){
                    $unsetValue = array_search($unset, $arrayList);
                    unset($arrayList[$unsetValue]);
                    $unsetStepCompleted = array_search($unset, $completedSteps);
                    // uset elements from business array
                    if($unsetStepCompleted){
                        unset($completedSteps[$unsetStepCompleted]);
                    }
                }
            }

             // Business-8 unset steps when it is not applicable
             if($request->computer_tasks == 'No' || $request->computer_tasks == 'Unknown' || session()->get('computer_tasks') == 'No' || session()->get('computer_tasks') == 'Unknown'){
                $unsetArray = array(25, 26);
                // uset elements from business array
                foreach($unsetArray as $unset){
                    $unsetValue = array_search($unset, $arrayList);
                    unset($arrayList[$unsetValue]);
                    $unsetStepCompleted = array_search($unset, $completedSteps);
                    // uset elements from business array
                    if($unsetStepCompleted){
                        unset($completedSteps[$unsetStepCompleted]);
                    }
                }
                //Session::forget('hours_spent');
                //Session::forget('hourly_wage');
                
            }
            
             // Business-11 unset steps when it is not applicable
             if($request->spent_in_shipping == 'No' || $request->spent_in_shipping == 'Unknown' || session()->get('spent_in_shipping') == 'No' || session()->get('spent_in_shipping') == 'Unknown'){
                $unsetArray = array(33, 34, 35, 36);
                // uset elements from business array
                foreach($unsetArray as $unset){
                    $unsetValue = array_search($unset, $arrayList);
                    unset($arrayList[$unsetValue]);
                    $unsetStepCompleted = array_search($unset, $completedSteps);
                    // uset elements from business array
                    if($unsetStepCompleted){
                        unset($completedSteps[$unsetStepCompleted]);
                    }
                }
                //Session::forget('fedex');
                //Session::forget('parcel_per');
                //Session::forget('residential');
                //Session::forget('last_review');
                
            }

           if($request->state != ''){
               session()->put('state', $request->state);
           }
		   
           if($request->pages != ''){
               session()->put('pages', $request->pages);
           }
           
		   
            sort($arrayList);
            $nextStep = 'final';
            $countFillArray = count($filledStepArray);
            sort($filledStepArray);
            if(!empty($prev)){
                foreach($filledStepArray as $value){

                    if ($prev<=$value){
                        $unsetValue = array_search($value, $filledStepArray);
                        unset($filledStepArray[$unsetValue]);
                    }
                }
            }

            if(!empty($currentStep)){
                $current_array_val = array_search($currentStep, $arrayList);
                //so I want to run a code to get the next value in the array and
                if (array_key_exists($current_array_val+1,$arrayList)){
                    $nextStep = $arrayList[$current_array_val+1];
                    if (!in_array($currentStep, $completedSteps)){
                        array_push($completedSteps, $currentStep);
                        //session()->put('completedSteps', $completedSteps);
                    }
                   
                }
               
            }
            else{
                $nextStep = current($arrayList);
                array_push($filledStepArray, $nextStep);
            }
            session()->put('currentStep', ((($request->page_id=='42')||($request->page_id=='43')||($request->page_id=='44')) ?  $request->page_id : $nextStep));
            if($nextStep == 'final'){
                if (!in_array($currentStep, $completedSteps)){
                    array_push($completedSteps, $currentStep);
                    //session()->put('completedSteps', $completedSteps);
                }
            }
            session()->put('completedSteps', $completedSteps);
            foreach($listOfSteps as $fSteps){
                if($nextStep == 'final'){
                    if($currentStep > $fSteps){
                        array_push($skipArray, $fSteps);
                        $skipArray = $this->addAdditionalFilledArray($skipArray, $fSteps);
                    }
                }
                else{
                    if($nextStep > $fSteps){
                        array_push($skipArray, $fSteps);
                        $skipArray = $this->addAdditionalFilledArray($skipArray, $fSteps);
                    }
                }
            }
            
            $totalSteps = count($TotalarrayList) + 2;
            //$progress =  round((100 * $filledSteps) / count($TotalarrayList)+3);
            $filledSteps = count($skipArray);
            $progress =  round((100 *  $filledSteps ) / $totalSteps);
            //$progress = $totalSteps;

            session()->put('progress', $progress);
            Session::forget('prevStep');
            //$progress = $totalInput;
            //sort($completedSteps);
            //print_r($completedSteps);
            // Business inser our DB

            $result = $this->insertAndUpateRevenueTable($nextStep);
            $prevNext = '';

            if ($nextStep == 'final') {
                session()->put('result', $result);
            }
            $nextStep = (($request->page_id=='42')||($request->page_id=='43')||($request->page_id=='44')) ?  $request->page_id : $nextStep; 
            return view('frontend.calculator.step-'.$nextStep, compact('business','progress','result','totalSteps','filledSteps','prevNext'));
        }
    }

    public function FinalResult(){
        $result = session()->get('result');
        if(!isset($result) || empty($result)){
            return redirect()->route('profit-generator');
        }
        return view('frontend.calculator.final-result', compact('result'));
    }

    // Add some additional fill step into the session
    private function addAdditionalFilledArray($filledStepArray, $currentStep){
        
        if (in_array(10, $filledStepArray)){
            if (!in_array(43, $filledStepArray)){
                array_push($filledStepArray, 43);
            }
        }
        if (in_array(18, $filledStepArray)){
            if (!in_array(44, $filledStepArray)){
                array_push($filledStepArray, 44);
            }
        }
        if (in_array(22, $filledStepArray)){
            if (!in_array(45, $filledStepArray)){
                array_push($filledStepArray, 45);
            }
        }
        if (in_array(16, $filledStepArray)){
            if (!in_array(46, $filledStepArray)){
                array_push($filledStepArray, 46);
            }
        }
        if (in_array(23, $filledStepArray)){
            if (!in_array(47, $filledStepArray)){
                array_push($filledStepArray, 47);
            }
        }
        if (in_array(37, $filledStepArray)){
            if (!in_array(48, $filledStepArray)){
                array_push($filledStepArray, 48);
            }
        }
        if (in_array(29, $filledStepArray)){
            if (!in_array(49, $filledStepArray)){
                array_push($filledStepArray, 49);
            }
        }
        if (in_array(26, $filledStepArray)){
            if (!in_array(50, $filledStepArray)){
                array_push($filledStepArray, 50);
            }
        }
        if (in_array(31, $filledStepArray)){
            if (!in_array(51, $filledStepArray)){
                array_push($filledStepArray, 51);
            }
        }
        if (in_array(36, $filledStepArray)){
            if (!in_array(52, $filledStepArray)){
                array_push($filledStepArray, 52);
            }
        }
        if (in_array(40, $filledStepArray)){
            if (!in_array(53, $filledStepArray)){
                array_push($filledStepArray, 53);
            }
        }
        if (in_array(42, $filledStepArray)){
            if (!in_array(54, $filledStepArray)){
                array_push($filledStepArray, 54);
            }
        }

        return $filledStepArray;
    }

    //Get Slide to prev step
    public function movePrevStep(Request $request){
        $completedSteps = session()->get('completedSteps');
        $progress = session()->get('progress');
        $business = session()->get('business');
        $currentStep = session()->get('prevStep');
        $filledSteps = session()->get('totalFilled');
        $skipArray = array(0);
        $arrayList = allbusiness;
        $TotalarrayList = allbusiness;
        $listOfSteps = allbusiness;
        if(isset($business)&&count($business)>0){
            foreach($business as $id){
                foreach(constant($id) as $step){
                    array_push($arrayList, $step);
                    array_push($TotalarrayList, $step);
                    array_push($listOfSteps, $step);                
                }
                array_push($TotalarrayList, 0);
            }            
        }

        $inputFields = busnessFields;
        if(isset($inputFields)&&count($inputFields)>0){
            foreach($inputFields as $field){
                if(isset($request->$field)){
                    session()->put($field, $request->$field);
                }
            }
        }
        sort($completedSteps);
        //print_r($completedSteps);
        krsort($completedSteps);
        if(empty($currentStep)){

            $currentStep = session()->get('currentStep');
            //$prevStep = current($completedSteps);
            $current_array_val = array_search($currentStep, $completedSteps);
            //so I want to run a code to get the next value in the array and
            if (array_key_exists($current_array_val-1,$completedSteps)){
                $prevStep = $completedSteps[$current_array_val-1];
                session()->put('prevStep', $prevStep);
                session()->put('currentStep', $prevStep);
            }
            else{
                $prevSteps = Arr::where($completedSteps, function ($value, $key) use($currentStep) {
                    return $value <= $currentStep;
                });
                if (!empty($prevSteps)) {
                    $prevStep = current($prevSteps);
                }
                else {
                    $prevStep = current($completedSteps);
                }
                session()->put('prevStep', $prevStep);
                session()->put('currentStep', $prevStep);
            }
        }
        else{
            if($currentStep == 1){
                Session::forget('prevStep');
            }
            else{
                $current_array_val = array_search($currentStep, $completedSteps);
                //so I want to run a code to get the next value in the array and
                if (array_key_exists($current_array_val-1,$completedSteps)){
                    $prevStep = $completedSteps[$current_array_val-1];
                    session()->put('prevStep', $prevStep);
                    session()->put('currentStep', $prevStep);
                }

            }
        }

        $prevStep = ((isset($prevStep)&&$prevStep>0) ? $prevStep : (($request->page_id=='3')? '1' : ""));
        $result = $this->insertAndUpateRevenueTable($prevStep);
        $prevNext = 1;
        if(isset($listOfSteps)&&count($listOfSteps)){
            foreach($listOfSteps as $fSteps){
                if($prevStep > $fSteps){
                    array_push($skipArray, $fSteps);
                    $skipArray = $this->addAdditionalFilledArray($skipArray, $fSteps);
                } 
            }
        }
        if($prevStep == 2){
            $progress =  0;
        }
        else{
            $totalSteps = count($TotalarrayList) + 2;
            $filledSteps = count($skipArray);
            $progress =  round((100 *  $filledSteps ) / $totalSteps);
        }
        
        return view('frontend.calculator.step-'.$prevStep, compact('business','progress','result','prevNext'));
       
    }
    
    // insert and update database whenever changed steps.
    private function insertAndUpateRevenueTable($nextStep){
        $updateId = session()->get('lastId');
        $business = session()->get('business');
        if(empty($updateId)){
            $insertArray = array(
                're_business_type' => json_encode($business),
                'user_id' => auth()->user()->id,
            );

            $revenueCheck = Revenue::Where(['user_id' => auth()->user()->id])->first();

            if($revenueCheck && $revenueCheck !='' && $revenueCheck->user_id == auth()->user()->id){
                Revenue::Where(['re_id' => $revenueCheck->re_id])->delete();
                $revenue = Revenue::create($insertArray);
            } else {
                $revenue = Revenue::create($insertArray);
            }

            session()->put('lastId', $revenue->id);
            $result = array(
                'ertc'                  => 0,
                'r_d_taxt_credit'       => 0,
                'wotc'                  => 0,
                'worker_comp'           => 0,
                'commercial_property'   => 0,
                'peo'                   => 0,
                'process_automation'    => 0,
                'electronic_payment'    => 0,
                'solid_waste'           => 0,
                'medical_waste'         => 0,
                'property_tax'          => 0,
                'shipping_result'       => 0,
                'health_insurance'      => 0,
                'business_telephone'    => 0,
                'net_profit'            => 0,
                'net_profit_margin'     => 0,
                'new_net_profit_margin' => 0,
                'revenue_equivalent'    => 0,
                'getUtility'            => 0,
                'life_time_value'       => 0,
                'cash_benefit'          => 0,
                'tax_credit_benefit'    => 0,
                'year_1'                => 0,
                'year_2'                => 0,
                'year_3'                => 0,
            );

            return $result;
        }
        else{

            $international_par = 0;
            $commercial = 0;
            if ( session()->get('parcel_per') != '') {
                $domesticInt   = $this->getNumberOnly( session()->get('parcel_per') );
                $international_par = 100 - $domesticInt;
            }
            if ( session()->get('residential') != '') {
                $residentialInt =  $this->getNumberOnly( session()->get('residential') );
                $commercial = 100 - $residentialInt;
            }

            $revenue = Revenue::Where(['re_id' => $updateId]);
            if($revenue){
                $updateArray = array(
                    're_business_type' => json_encode($business),
                    're_annual_revenue' => $this->getNumberOnly(session()->get('annual_revenue')),
                    're_annual_expenses' => $this->getNumberOnly(session()->get('annual_expenses')),
                    're_people_hired_annually' => session()->get('people_hired'),
                    're_business_experience' => session()->get('business_exp'),
                    're_calender_year_business_experience' => session()->get('calender_business_experience'),
                    're_total_employees' => session()->get('total_emp'),
                    're_payment_US' => session()->get('payment_US'),
                    're_wages' => $this->getNumberOnly(session()->get('wages')),
                    're_supplies' => $this->getNumberOnly(session()->get('supplies')),
                    're_contracts' => $this->getNumberOnly(session()->get('contracts')),
                    're_cloud_computing' => $this->getNumberOnly(session()->get('cloud_computing')),
                    're_commercial_property_750k' => session()->get('commercial_property'),
                    're_property_type' => json_encode(session()->get('prop_type')),
                    're_total_property_cost' => $this->getNumberOnly(session()->get('property_cost')),
                    're_last_audit' => session()->get('audit_time'),
                    're_real_property_value' => $this->getNumberOnly(session()->get('property_value')),
                    're_recent_property_tax' => $this->getNumberOnly(session()->get('recent_tax')),
                    're_premium_over_25k' => session()->get('company_premium'),
                    're_annual_workers_premium' => $this->getNumberOnly(session()->get('worker_premium')),
                    're_insurance_over_1M' => session()->get('health_insurance'),
                    're_monthly_insurance_premium' => $this->getNumberOnly(session()->get('total_premium')),
                    're_insurance_plan_type' => session()->get('health_plan'),
                    're_people_insured' => session()->get('covered'),
                    're_current_employees' => session()->get('current_emp'),
                    're_repeatable_tasks' => session()->get('computer_tasks'),
                    're_total_hours_spent' => session()->get('hours_spent'),
                    're_emp_avg_wage' => $this->getNumberOnly(session()->get('hourly_wage')),
                    're_dedicated_lines' => session()->get('phone_lines'),
                    're_line_type' => session()->get('line_type'),
                    're_phone_expenses' => $this->getNumberOnly(session()->get('phone_expense')),
                    're_electronic_payment' => $this->getNumberOnly(session()->get('electronic_payment')),
                    're_discount_offered' => session()->get('discount'),
                    're_shipping_50000' => session()->get('spent_in_shipping'),
                    're_fedex_dhl' => $this->getNumberOnly(session()->get('fedex')),
                    're_domestic_delivery' => $this->getNumberOnly(session()->get('parcel_per')),
                    're_international_delivery' => $international_par,
                    're_resedential_delivery' => $this->getNumberOnly(session()->get('residential')),
                    're_commercial_delivery' => $commercial,
                    're_last_review_fedex' => session()->get('last_review'),
                    're_solid_waste_expense' => $this->getNumberOnly(session()->get('solid_waste')),
                    're_medical_waste_pickup' => session()->get('medical_waste'),
                    're_medical_containers' => session()->get('container'),
                    're_medical_waste_expense' => $this->getNumberOnly(session()->get('medical_expense')),
                    're_electricity' => $this->getNumberOnly(session()->get('electricity')),
                    're_natural_gas' => $this->getNumberOnly(session()->get('natural_gas')),
                    're_bussiness_operating_state' => session()->get('business_operating_state')
                );

                $revenue->update($updateArray);
        


                $ertc_benefit = $this->getERTCBenefitCalculationValue(session()->get('total_emp'));

                $rdTaxCredit = $this->getRDTaxCreditCalculationValue( session()->get('wages'), session()->get('supplies'), session()->get('contracts'), session()->get('cloud_computing') );

                $wotc = $this->getWOTCreditCalculationValue( session()->get('people_hired') );

                $workers_Comp = $this->getWorkersCompCalculationValue( session()->get('worker_premium') );

                $property_tax = $this->getPropertyTaxCalculationValue( session()->get('recent_tax') );

                $professional_employer_organisation = $this->getPEO( session()->get('current_emp') );

                $process_automation = $this->getProcessAutomationOptimisation(session()->get('hours_spent'), session()->get('hourly_wage'));

                $electronic_payment = $this->getElecronicPaymentProcessing( session()->get('electronic_payment') );

                $solid_waste = $this->getSolidWasteValue( session()->get('solid_waste') );

                $medical_waste = $this->getMedicalWasteValue(session()->get('medical_expense') );

                $property_tax_benefit = $this->getCommercialPropertyTax( session()->get('prop_type'), session()->get('property_cost') );

                $getHealthValueArray = $this->getEmployerHealthValueArray( session()->get('health_plan'), session()->get('total_premium'), session()->get('health_insurance') );

                $health_insurance_benefit =  $getHealthValueArray[0];

                $business_phone_benefit = $this->getBusinessTelephones( session()->get('line_type'), session()->get('phone_expense'), session()->get('phone_lines') );

                $getCurrentNetProfitMargin = $this->getCurrentNetProfitMargin( session()->get('annual_revenue'), session()->get('annual_expenses') );

                $getShippingValue = $this->getShippingValue( session()->get('last_review') );

                $getUtility = $this->getUtility( session()->get('natural_gas'), session()->get('electricity') );

                $netProfitIncrease = $this->getNetProfitIncrease( array(
                    'ertc_benefit'                       => $ertc_benefit,
                    'rdTaxCredit'                        => $rdTaxCredit,
                    'wotc'                               => $wotc,
                    'workers_Comp'                       => $workers_Comp,
                    'property_tax'                       => $property_tax,
                    'professional_employer_organisation' => $professional_employer_organisation,
                    'process_automation'                 => $process_automation,
                    'electronic_payment'                 => $electronic_payment,
                    'solid_waste'                        => $solid_waste,
                    'medical_waste'                      => $medical_waste,
                    'property_tax_benefit'               => $property_tax_benefit,
                    'health_insurance_benefit'           => $health_insurance_benefit,
                    'business_phone_benefit'             => $business_phone_benefit,
                    'shipping_result'                    => $getShippingValue,
                    'getUtility'                    => $getUtility,
                ) );

                $getCashBenefit = $this->getCashBenefit( array(
                    'workers_Comp'                       => $workers_Comp,
                    'professional_employer_organisation' => $professional_employer_organisation,
                    'process_automation'                 => $process_automation,
                    'electronic_payment'                 => $electronic_payment,
                    'solid_waste'                        => $solid_waste,
                    'medical_waste'                      => $medical_waste,
                    'property_tax'              		 => $property_tax,
                    'health_insurance_benefit'           => $health_insurance_benefit,
                    'business_phone_benefit'             => $business_phone_benefit,
                    'shipping_result'                    => $getShippingValue,
                ) );
            
            
                $getTaxCreditBenefit = $this->getTaxCreditBenefit( array(
                    'wotc'         => $wotc,
                    'ertc_benefit' => $ertc_benefit,
                    'property_tax_benefit' => $property_tax_benefit,
                    'rdTaxCredit'  => $rdTaxCredit,
                ) );


                $getNewNetProfitMargin = $this->getNewNetProfitMargin( session()->get('annual_revenue'), session()->get('annual_expenses'), $netProfitIncrease );

                $getLifeTimeValue = $this->getLifeTimeValue( $netProfitIncrease, $getHealthValueArray, $ertc_benefit, $property_tax, $workers_Comp, $rdTaxCredit, $property_tax_benefit, $getShippingValue,$wotc,$professional_employer_organisation,$process_automation,$business_phone_benefit,$electronic_payment,$solid_waste,$medical_waste ,$getUtility );

                $year_2 = $this->year_2( $netProfitIncrease,$getHealthValueArray, $ertc_benefit, $property_tax, $property_tax_benefit, $workers_Comp, $rdTaxCredit,$getShippingValue );

                $year_3 = $this->year_3( $netProfitIncrease,$getHealthValueArray, $ertc_benefit, $property_tax, $property_tax_benefit, $workers_Comp, $rdTaxCredit, $getShippingValue );

                $getrevenueEquivalent = $this->getrevenueEquivalent( $netProfitIncrease, $getCurrentNetProfitMargin );

                $final_result = array(
                    'ertc'                  => $ertc_benefit,
                    'r_d_taxt_credit'       => $rdTaxCredit,
                    'wotc'                  => $wotc,
                    'worker_comp'           => $workers_Comp,
                    'commercial_property'   => $property_tax_benefit,
                    'peo'                   => $professional_employer_organisation,
                    'process_automation'    => $process_automation,
                    'electronic_payment'    => $electronic_payment,
                    'solid_waste'           => $solid_waste,
                    'medical_waste'         => $medical_waste,
                    'property_tax'          => $property_tax,
                    'shipping_result'       => $getShippingValue,
                    'health_insurance'      => $getHealthValueArray,
                    'business_telephone'    => $business_phone_benefit,
                    'net_profit'            => $netProfitIncrease,
                    'net_profit_margin'     => $getCurrentNetProfitMargin,
                    'new_net_profit_margin' => $getNewNetProfitMargin,
                    'revenue_equivalent'    => $getrevenueEquivalent,
                    'getUtility'            => $getUtility,
                    'life_time_value'       => $getLifeTimeValue,
                    'cash_benefit'          => $getCashBenefit,
                    'tax_credit_benefit'    => $getTaxCreditBenefit,
                    'year_1'                => $netProfitIncrease,
                    'year_2'                => $year_2,
                    'year_3'                => $year_3,
                );

                if($nextStep == 'final'){
                    //print_r($final_result);
                    $finalUpdate = array(
                        're_wotc' => $wotc,
                        're_workers_Comp' => $workers_Comp,
                        're_commercial_tax' => $property_tax,
                        're_PEO' => $professional_employer_organisation,
                        're_process_automation' => $process_automation,
                        're_electronic_benefit' => $electronic_payment,
                        're_solid_waste_benefit' => $solid_waste,
                        're_medical_waste_benefit' => $medical_waste,
                        're_property_tax_benefit' => $property_tax_benefit,
                        're_health_insurance_benefit' => $health_insurance_benefit,
                        're_business_phone_benefit' => $business_phone_benefit,
                        're_net_profit' => $netProfitIncrease,
                        're_net_profit_margin' => $getCurrentNetProfitMargin,
                        're_new_net_profit_margin' => $getNewNetProfitMargin,
                        're_revenue_equivalent' => $getrevenueEquivalent,
                        're_life_time_value' => $getLifeTimeValue,
                        're_utility_value' => $getUtility,
                        're_cash_benefit' => $getCashBenefit,
                        're_tax_credit_benefit' => $getTaxCreditBenefit,
                        're_year_1' => $netProfitIncrease,
                        're_year_2' => $year_2,
                        're_year_3' => $year_3
                    );

                    $revenue->update($finalUpdate);
                }

                return $final_result;
                
            }
            
        }
    }

    // Remove additional sign from amount
    private function getNumberOnly( $number ) {
        if(!empty($number)){
        $number = str_replace( ',', '', $number );
        $number = str_replace( '$', '', $number );
        $number = str_replace( '%', '', $number );
        return $number;
        }
        return 0;
    }

    // calculate ERTC Benefit
    private function getERTCBenefitCalculationValue( $noOfEmployee ) {
        if(!empty($noOfEmployee)){
            $number_of_emp = $this->getNumberOnly( $noOfEmployee );
            return $ertc_benefit = $number_of_emp * 7000;
        }
        else{
            return 0;
        }
    }

    // calcualte RDTax Credit
    private function getRDTaxCreditCalculationValue( $wages, $supplies, $contracts, $cloud ) {

        if(!empty($wages) && !empty($supplies) && !empty($contracts) && !empty($cloud)){
            $wages = $this->getNumberOnly( $wages );
        

        $supplies = $this->getNumberOnly( $supplies );
        
        $contracts = $this->getNumberOnly( $contracts );
        
        $cloud = $this->getNumberOnly( $cloud );
        

        $annual_expenses = $wages + $supplies + $contracts + $cloud;
    
        return $annual_expenses * 0.052;
        }
        else{
            return 0;
        }
    }

    // calculate WOT Creadit
    private function getWOTCreditCalculationValue( $noOfNewHires ) {
        if(!empty($noOfNewHires)){
            $wotc = $this->getNumberOnly($noOfNewHires) * 0.146 * 879;
        
            return $wotc;
        }

        return 0;
    }

    // calculate Workers premimum 
    private function getWorkersCompCalculationValue( $workerPremium ) {
        if(!empty($workerPremium)){
            $premium = $this->getNumberOnly( $workerPremium );
            if ( $premium < 25000 ) {
                return 0;
            } else {
                return $workersComp = $premium * 0.1438;
            }
        }

        return 0;
    }

    // calculate Property Tax 
    private function getPropertyTaxCalculationValue( $prop_tax ) {

        if(!empty($prop_tax)){
            $tax = $this->getNumberOnly( $prop_tax );
        
            $property_tax = $tax * 0.167;
        
            if ( $property_tax >= 12000 ) {
                return $property_tax;
            } else {
                return 0;
            }
        }

        return 0;
    }

    // Calculate PEO
    private function getPEO( $current_employees ) {

        if(!empty($current_employees)){
            if ( $current_employees <= 10 ) {
                $peo_benefit = $current_employees * 523;
            } else if ( $current_employees >= 11 && $current_employees <= 29 ) {
                $peo_benefit = $current_employees * 467;
            } else if ( $current_employees >= 30 && $current_employees <= 39 ) {
                $peo_benefit = $current_employees * 349;
            } else if ( $current_employees >= 40 && $current_employees <= 49 ) {
                $peo_benefit = $current_employees * 272;
            } else {
                $peo_benefit = $current_employees * 198;
            }
        
            return $peo_benefit;
        }
        else{
            return 0;
        }
    }

    // Calculate Process Automation 
    private function getProcessAutomationOptimisation( $hours, $wage ) {
        if(!empty($wage) && !empty($hours)){
            $salary = $this->getNumberOnly( $wage );
            $pao_benefit = $hours * $salary * 261 * 0.63;
            if ( $pao_benefit < 10000 ) {
                return 0;
            } else {
                return $pao_benefit;
            }
        }
    
        return 0;
    }

    // Calculate Elecronic Payment
    private function getElecronicPaymentProcessing( $amount ) {
        if(!empty($amount)){
            $payment = $this->getNumberOnly( $amount );
            $ElecronicPaymentBenifit = $payment * 0.0067;
            if ( $payment < 20000 ) {
                return 0;
            } else {
                return $ElecronicPaymentBenifit;
            }
        }

        return 0;
    }

    // Calculate Solid Waste
    private function getSolidWasteValue( $expenses ) {
        if(!empty($expenses)){
            $expenditure = $this->getNumberOnly( $expenses );
            $SolidWasteBenefit = $expenditure * 0.177 * 12;
            if ( $SolidWasteBenefit < 300 ) {
                return 0;
            } else {
                return $SolidWasteBenefit;
            }
        }
        
        return 0;
    }

    // Calculate Medical Waste
    private function getMedicalWasteValue( $expenses ) {
        if(!empty($expenses)){
            $expenditure = $this->getNumberOnly( $expenses );
            $MedicalWasteBenefit = $expenditure * 0.31 * 12;
            if ( $expenditure < 35 ) {
                return 0;
            } else {
                return $MedicalWasteBenefit;
            }
        }

        return 0;
    }

    // Calculate Commercial Property Tax
    private function getCommercialPropertyTax( $property_type, $cost ) {
        if(!empty($property_type) && !empty($cost)){
            $property_price = property_price;
            $propertyArray  = explode( ',', $property_type );
            $total_cost     = $this->getNumberOnly( $cost );
            $propertyVal = 0;
            foreach ( $propertyArray as $value ) {
                $value       = trim( $value );
                $multiplier  = $property_price[ $value ];
                $propertyVal += $total_cost * $multiplier;
            }
        
            return $propertyVal;
        }

        return 0;
    }

    // Calculate Employer Health Value
    private function getEmployerHealthValueArray( $plan_type, $cost, $string ) {

        $year1 = 0;
        $year2 = 0;
        $year3 = 0;
        $year4 = 0;
        $year5 = 0;
        if(!empty($cost)){
            $insurance_value = $this->getNumberOnly( $cost );
                    
            if($insurance_value >= 5000){
                $year1 = $insurance_value * 0.600;
                $year2 = $insurance_value * 1.128;
                $year3 = $insurance_value * 1.755;
                $year4 = $insurance_value * 2.498;
                $year5 = $insurance_value * 3.372;
            }
        }
    
        return array( $year1, $year2, $year3, $year4, $year5 );
    }

    // Calculate Business Telephones
    private function getBusinessTelephones( $type, $cost, $phone_lines ) {
        if(!empty($type) && !empty($cost) && !empty($phone_lines)){
            $expenses = $this->getNumberOnly( $cost );
            switch ( $type ) {
                case "Landlines":
                    if ( $phone_lines >= 3 && $phone_lines <= 8 ) {
                        $phone_benefit = $expenses * 0.48 * 12;
                    } else if ( $phone_lines >= 9 && $phone_lines <= 15 ) {
                        $phone_benefit = $expenses * 0.40 * 12;
                    } else if ( $phone_lines >= 16 && $phone_lines <= 25 ) {
                        $phone_benefit = $expenses * 0.36 * 12;
                    } else if ( $phone_lines >= 26 && $phone_lines <= 49 ) {
                        $phone_benefit = $expenses * 0.33 * 12;
                    } else {
                        $phone_benefit = $expenses * 0.31 * 12;
                    }
                    break;
        
                case "VoIP":
                    if ( $phone_lines >= 3 && $phone_lines <= 8 ) {
                        $phone_benefit = $expenses * 0.33 * 12;
                    } else if ( $phone_lines >= 9 && $phone_lines <= 15 ) {
                        $phone_benefit = $expenses * 0.30 * 12;
                    } else if ( $phone_lines >= 16 && $phone_lines <= 25 ) {
                        $phone_benefit = $expenses * 0.27 * 12;
                    } else if ( $phone_lines >= 26 && $phone_lines <= 49 ) {
                        $phone_benefit = $expenses * 0.25 * 12;
                    } else {
                        $phone_benefit = $expenses * 0.21 * 12;
                    }
                    break;
            }
        
            return $phone_benefit;
        }

        return 0;
    }

    // Calculate Current Net Profit Margin
    private function getCurrentNetProfitMargin( $revenue, $expenses ) {
      
        if(!empty($revenue) && !empty($expenses)){
            $revenue  = $this->getNumberOnly( $revenue );
            $expenses = $this->getNumberOnly( $expenses );
            $result   = ( $revenue - $expenses ) / $revenue;
            if($revenue == 0 || $expenses == 0){
                return  0 ;
            }
            return $result * 100;
        }
        return 0;
    }

    // Claculate Shiping Value
    private function getShippingValue( $recent_review ) {
        $R2 = 0;
        $R1  = $this->getShippingCharges( session()->get('spent_in_shipping'), session()->get('fedex'), session()->get('parcel_per'), session()->get('residential') );
        if ( $recent_review == 'Recently' ) {
            $R2 = $R1 - ( $R1 * 0.153 );
        } else if ( $recent_review == '1 Year' ) {
            $R2 = $R1 - ( $R1 * 0.097 );
        } else if ( $recent_review == '2 Years' ) {
            $R2 = $R1 - ( $R1 * 0.034 );
        } else if ( $recent_review == '3 Years' ) {
            $R2 = $R1 + ( $R1 * 0.087 );
        }
    
        return $R2;
    
    }

    // Calculate Shipping Charges
    private function getShippingCharges( $string, $cost, $per1, $per2 ) {
            if ( $string == "Yes" ) {
               $fedex_expenditure = 0;
                if(!empty($cost)){
                    $fedex_expenditure = $this->getNumberOnly( $cost );
                }
                $parcel_per = 0;
                if(!empty($per1)){
                    $parcel_per = $this->getNumberOnly( $per1 );
                }
                $per1 = $parcel_per;
                $residential = 0;
                if(!empty($per2)){
                    $residential =  $this->getNumberOnly( $per2 );
                }
                $per2 = $residential;
                $domestic_percent = $per1;
                $international_percent = ( 100 - $per1 ) / 100;
                $residential_percent = $per2;
                $commercial_percent = ( 100 - $per2 ) / 100;
                $R1 = ( $fedex_expenditure * ( $domestic_percent / 100 ) * 0.105 ) + ( $fedex_expenditure * ( ( 100 - $domestic_percent ) / 100 ) * 0.18 ) + ( $fedex_expenditure * ( $residential_percent / 100 ) * 0.07 ) + ( $fedex_expenditure * ( ( 100 - $residential_percent ) / 100 ) * 0.12 );
        
                return $R1;
            } else {
                return 0;
            }
       
    }

    // Calculate Utility Value
    private function getUtility( $natural_gas, $electricity ) {
       
            $natural_gas = $this->getNumberOnly( $natural_gas );
            $electricity = $this->getNumberOnly( $electricity );
        
            $total_utility = (( $natural_gas * 0.083 ) + ( $electricity * 0.118 ))*12;
            if ( $total_utility < 2500 ) {
                return 0;
            }
        
            return $total_utility;
    

       
    }

    // Calculate Net Profit Increase
    private function getNetProfitIncrease( $attr ) {
        return $attr['ertc_benefit'] +
               $attr['rdTaxCredit'] +
               $attr['wotc'] +
               $attr['workers_Comp'] +
               $attr['property_tax'] +
               $attr['professional_employer_organisation'] +
               $attr['process_automation'] +
               $attr['electronic_payment'] +
               $attr['solid_waste'] +
               $attr['property_tax_benefit'] +
               $attr['health_insurance_benefit'] +
               $attr['business_phone_benefit'] +
               $attr['shipping_result'] +
               $attr['medical_waste']+
               $attr['getUtility'];
    }

    // Calculate Cash Benefit
    private function getCashBenefit( $attr ) {
        return $attr['workers_Comp'] +
               $attr['professional_employer_organisation'] +
               $attr['process_automation'] +
               $attr['electronic_payment'] +
               $attr['solid_waste'] +
               $attr['property_tax'] +
               $attr['health_insurance_benefit'] +
               $attr['business_phone_benefit'] +
               $attr['shipping_result'] +
               $attr['medical_waste'];
    }

    // Calculate Tax Credit Benefit
    private function getTaxCreditBenefit( $attr ) {
        return $attr['wotc'] +
               $attr['ertc_benefit'] +
               $attr['property_tax_benefit'] +
               $attr['rdTaxCredit'];
    }

    // Calculate New Net Profit Margin 
    private function getNewNetProfitMargin( $revenue, $expenses, $netProfitIncrease ) {
        if(!empty($revenue) && !empty($revenue)){
            $revenue  = $this->getNumberOnly( $revenue );
            $expenses = $this->getNumberOnly( $expenses );
        
            $dividend = $revenue + $netProfitIncrease - $expenses;
            $devisor  = $revenue + $netProfitIncrease;
            $result   = $dividend / $devisor;
            //var_dump($result);
            if($revenue == 0 || $expenses == 0 || $netProfitIncrease == 0){
                return  0 ;
            }
            return $result * 100;
        }

        return 0;
    }

    // Calculate Life Time Value
    private function getLifeTimeValue( $net_profit, $health = array(), $ertc_benefit, $property_tax, $workers_Comp, $rdTaxCredit, $property_tax_benefit, $getShippingValue,$wotc,$professional_employer_organisation,$process_automation,$business_phone_benefit,$electronic_payment,$solid_waste,$medical_waste ,$getUtility ) {
	
        return (($wotc * 10) + ($ertc_benefit) + ($rdTaxCredit*4) + ($property_tax_benefit) + ($property_tax * 6) + ($workers_Comp* 3) + ($health[0] * 43.7) + ($professional_employer_organisation * 7) 
        + ($process_automation * 10) + ($business_phone_benefit * 10) + ($electronic_payment* 7) + ($getShippingValue * 3) + ($solid_waste* 5) + ($medical_waste* 8) + ($getUtility*7));
    }
    
    private function year_2( $netProfit,$health = array(), $ertc_benefit, $property_tax, $property_tax_benefit, $workers_Comp, $rdTaxCredit,$shipping_value ) {
    
        return(($netProfit+$health[0])-(($ertc_benefit)+($property_tax_benefit* 0.70)+($workers_Comp)+($shipping_value*0.10)));
    }
    
    private function year_3( $netProfit,$health = array(), $ertc, $property_tax, $property_tax_benefit, $workers_Comp, $rdTaxCredit, $shipping_value ) {
    
        return((($netProfit)+($health[0]*2))-(($ertc)+($property_tax_benefit*0.85)+($workers_Comp)+($shipping_value*0.25)));
    }
    
    // Calculate Revenue Equivalent value
    private function getrevenueEquivalent( $netProfit, $currentNetProfitMargin ) {
        if(!empty($netProfit) && !empty($currentNetProfitMargin)){
			 $currentNetProfitMargin=round( $currentNetProfitMargin );
            return ($netProfit / $currentNetProfitMargin)*100;
        }
        return 0;
    }


    // Get last(Final) step for calculations
    public function getNextFinalStep(Request $request){
        $business = session()->get('business');
        if(!empty($business)){
            $currentStep = session()->get('currentStep');
            $arrayList = allbusiness;
            foreach($business as $id){
               foreach(constant($id) as $step){
                   array_push($arrayList, $step);
               }

            }
            // Business-1 unset steps when it is not applicable
            if($request->business_exp == 'Yes'){
                $unsetValue = array_search(7, $arrayList);
                // uset elements from business array
                unset($arrayList[$unsetValue]);

            }

            // Business-1 unset steps when it is not applicable
            if($request->calender_business_experience == 'No' || $request->calender_business_experience == 'Unknown'){
                $unsetArray = array(8);
                // uset elements from business array
                foreach($unsetArray as $unset){
                    $unsetValue = array_search($unset, $arrayList);
                    unset($arrayList[$unsetValue]);
                }
                
            }

            // Business-1 unset steps when it is not applicable
            if($request->payment_US == 'No' || $request->payment_US == 'Unknown'){
                $unsetValue = array_search(10, $arrayList);
                // uset elements from business array
                unset($arrayList[$unsetValue]);
            }
           
            // Business-2 unset steps when it is not applicable
            if($request->company_premium == 'No' || $request->company_premium == 'Unknown'){
                $unsetValue = array_search(18, $arrayList);
                // uset elements from business array
                unset($arrayList[$unsetValue]);
            }

            // Business-4 unset steps when it is not applicable
            if($request->commercial_property == 'No' || $request->commercial_property == 'Unknown'){
                $unsetArray = array(12, 13);
                // uset elements from business array
                foreach($unsetArray as $unset){
                    $unsetValue = array_search($unset, $arrayList);
                    unset($arrayList[$unsetValue]);
                }
            }

            // Business-6 unset steps when it is not applicable
            if($request->health_insurance == 'No'){
                $unsetArray = array(20, 21, 22);
                // uset elements from business array
                foreach($unsetArray as $unset){
                    $unsetValue = array_search($unset, $arrayList);
                    unset($arrayList[$unsetValue]);
                }
            }

            // Business-4 unset steps when it is not applicable
            if($request->audit_time == 'Less than 1 year'){ 
                $unsetArray = array(15, 16);
                // uset elements from business array
                foreach($unsetArray as $unset){
                    $unsetValue = array_search($unset, $arrayList);
                    unset($arrayList[$unsetValue]);
                }
            }

             // Business-8 unset steps when it is not applicable
             if($request->computer_tasks == 'No' || $request->computer_tasks == 'Unknown'){
                $unsetArray = array(25, 26);
                // uset elements from business array
                foreach($unsetArray as $unset){
                    $unsetValue = array_search($unset, $arrayList);
                    unset($arrayList[$unsetValue]);
                }
            }

             // Business-11 unset steps when it is not applicable
             if($request->spent_in_shipping == 'No' || $request->spent_in_shipping == 'Unknown'){
                $unsetArray = array(33, 34, 35, 36);
                // uset elements from business array
                foreach($unsetArray as $unset){
                    $unsetValue = array_search($unset, $arrayList);
                    unset($arrayList[$unsetValue]);
                }
            }

            sort($arrayList);
            $nextStep = 'final';
            if(!empty($currentStep)){
                $current_array_val = array_search($currentStep, $arrayList);
                //so I want to run a code to get the next value in the array and
                if (array_key_exists($current_array_val+1,$arrayList)){
                    $nextStep = $arrayList[$current_array_val+1];
                }
               
            }
            else{
                $nextStep = current($arrayList);
            }

            return response()->json(['status' => 200, 'message' => $nextStep]);
        }
        return response()->json(['status' => 200, 'message' => 1]);
    }
   
    
}
