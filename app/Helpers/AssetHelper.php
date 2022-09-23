<?php

/**
 * AssetHelper
 *
 */

/**
 * Return's admin assets directory
 *
 * CALLING PROCEDURE
 *
 * In controller call it like this:
 * $adminAssetsDirectory = adminAssetsDir() . $site_settings->site_logo;
 *
 * In View call it like this:
 * {{ asset(adminAssetsDir() . $site_settings->site_logo) }}
 *
 * @param string $role
 *
 * @return bool
 */
function uploadsDir($path = '')
{
    return $path != '' ? 'uploads/' . $path . '/' : 'uploads/';
}

function uploadsUrl($file = '')
{
    return $file != '' && file_exists(uploadsDir('users') . $file) ? uploadsDir('users') . $file : 'avatar.jpg';
}

function adminHasAssets($image)
{
    if (!empty($image) && file_exists(uploadsDir() . $image)) {
        return true;
    } else {
        return false;
    }
}

function matchChecked($param1, $param2)
{
    return $param1 == $param2 ? ' checked="checked" ' : '';
}

function matchSelected($param1, $param2)
{
    return $param1 == $param2 ? ' selected="selected" ' : '';
}

function generateRandomString($length = 10)
{
    $characters       = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString     = '';

    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }

    return $randomString;
}

function getGender($id = null)
{
    $values = [
        '1' => 'Male',
        '2' => 'Female',
    ];

    return isset($id) && $id <= 2 && $id >= 1 ? $values[$id] : $values;
}

function underContract($id = null)
{
    $values = [
        '1' => 'Yes',
        '2' => 'No',
        '3' => 'Unknown',
    ];

    return isset($id) && $id <= 3 && $id >= 1 ? $values[$id] : $values;
}

function getStatus($id = null)
{
    $values = [
        '0' => 'Inactive',
        '1' => 'Active',
    ];

    return isset($id) && $id <= 2 && $id >= 1 ? $values[$id] : $values;
}

function getUserType($id = null)
{
    $values = [
        '1' => 'Single User',
        '2' => 'Channel Partner',
        '3' => 'Distributor',
    ];

    return isset($id) && $id <= 3 && $id >= 1 ? $values[$id] : $values;
}

if (!function_exists('revenue_price_format')) {
    function revenue_price_format( $value ) {
        return "$" . number_format( $value, 2 );
    }
}

if (!function_exists('round_price_format')) {
    function round_price_format( $value ) {
        if ( $value ) {
            return "$" . number_format( round( $value ) );
        } else {
            return number_format( round( $value ) );
        }
    }
}

if (!function_exists('round_price_format_for_count')) {
    function round_price_format_for_count( $value ) {
        if ( $value ) {
            return "$<span class=\"count\">" . number_format( round( $value ) ) . "</span>";
        } else {
            return "<span class=\"count\">" . number_format( round( $value ) ) . "</span>";
        }
    }
}

if (!function_exists('number_format_for_count')) {
    function number_format_for_count( $value ) {
        return "<span class=\"count\">" . number_format( $value ) . "</span>";
    }
}

if (!function_exists('round_price_format_with_percent')) {
    function round_price_format_with_percent( $value ) {
        if ( $value ) {
            return "<span class=\"count\">" . round( $value ). "</span>%";
        } else {
            return "<span class=\"count\">" . round( $value ). "</span>%";
        }
    }
}

/*function getUserChannelValues($identifier = null)
{
    if ($identifier == 'abc') {
        // code...
    }
}*/


function getChannelQuestions($key = null)
{
    $values = [
        'what_type_of_building_do_you_have' => 'What type of building do you have:',
        'list_the_building_address'         => 'List the building address:',
        'acquisition_or_new_construction'   => 'Acquisition or New Construction?',
        'purchase_price'                    => 'Purchase Price',
        'date_of_purchase'                  => 'Date of Purchase:',
        '1030_exchange'                     => '1030 Exchange?',
        'any_plans_to_renovate_or_modify_a_significant_portion_of_the_building' => 'Any plans to renovate or modify a significant portion of the building?',
        'will_you_be_uploading_a_detailed_depreciation_schedule' => 'Will you be uploading a detailed depreciation schedule?',
        'total_construction_cost'                                => 'Total Construction Cost:',
        'placed_in_service_date'                                 => 'Placed in Service Date:',
        'How_many_full_time_employees_did_you_have_in_2019'      => 'How many full-time employees did you have in 2019?',
        'Do_you_have_any_related_management_agreements'                    => 'Do you have any related management agreements in place with another firm for work to be performed on your Employee Retention Tax Credit?',
        'q1'                       => 'Understanding your Gross Receipt amounts is crucial to accuracy.Please confirm your gross receipt amounts by Quarter',
        'q2'                       => 'Understanding your Gross Receipt amounts is crucial to accuracy.Please confirm your gross receipt amounts by Quarter',
        'q3'                       => 'Understanding your Gross Receipt amounts is crucial to accuracy.Please confirm your gross receipt amounts by Quarter',
        'q4'                       => 'Understanding your Gross Receipt amounts is crucial to accuracy.Please confirm your gross receipt amounts by Quarter',
        'Who_is_your_current_employer_healthcare_provider'             => 'Who is your current employer healthcare provider?',
        'When_is_your_medical_plan_renewal'                            => 'When is your medical plan renewal?',
        'How_many_lives_do_you_have_on_your_medical_plan'              => 'How many lives do you have on your medical plan?',
        'How_many_containers_per_pickup'                               => 'How many containers per pickup?',
        'Pickup_schedule'                                              => 'Pickup schedule?',
        'What_zip_codes_do_you_need_pickups_to_occur'                  => 'What zip codes do you need pickups to occur?',
        'How_many_locations_do_you_have'                               => 'How many locations do you have?',
        'What_type_of_merchant_processing_softwares_do_you_use'        => 'What type of merchant processing software(s) do you use?',
        'Are_you_under_contract'                                       => 'Are you under contract?',
        'When_does_your_contract_end'                                  => 'When does your contract end?',
        'Which_PEO_do_you_currently_partner_with'                                   => 'Which PEO do you currently partner with?',
        'When_is_your_medical_renewal'                                 => 'When is your medical renewal?',
        'Business_Name'                                                => 'Enter Business Name',
        'Business_EIN_No'                                              => 'Enter Business EIN #',
        'Do_you_have_a_current_property_tax_provider'                  => 'Do you have a current property tax provider?',
        'If_yes_above_with_whom_do_you_work'                           => 'If yes above, with whom do you work?',
        'Has_the_property_been_appealed_over_the_last_3_years'         => 'Has the property been appealed over the last 3 years?',
        'Briefly_describe_what_type_of_activities_are_your_company_is_involved_in'                              => 'Briefly describe what type of R&D activities are your company is involved in?',
        'How_long_have_you_been_in_business'                           => 'How long have you been in business?',
        'What_would_you_estimate_is_your_revenue_for_the_current_year' => 'What would you estimate is your revenue for the current year?',
        'Carrier'                                => 'Carrier',
        'User_Name'                              => 'User Name',
        'Password'                               => 'Password',
        'Company_Name'                           => 'Company Name:',
        'Contact_Name'                           => 'Contact Name:',
        'Title'                                  => 'Title: ',
        'Email'                                  => 'Email: ',
        'Phone'                                  => 'Phone: ',
        'Company_Website'                        => 'Company Website:',
        'Physical_Address'                       => 'Physical Address:',
        'Number_of_Seats/Users'                  => 'Number of Seats / Users:',
        'Number_of_Employees'                    => 'Number of Employees:',
        'Do_you_know_what_model_phones_you_use'  => 'Do you know what model phones you use?',
        'Who_do_you_purchase_your_energy_from'   => 'Who do you purchase your energy from',
        'How_do_you_primarily_use_energy'        => 'How do you primarily use energy?',
        'Name'                                   => 'Name:',
        'Email'                                  => 'Email:',
        'Phone'                                  => 'Phone:',
        'Main_Corporate_Legal_Entity_Name'       => 'Main Corporate Legal Entity Name:',
        'Main_Corporate_FEIN'                    => 'Main Corporate FEIN:',
        'Main_Corporate_Address'                 => 'Main Corporate Address:',
        'Street_Address'                         => 'Street Address:',
        'City'                                   => 'City:',
        'State/Region/Province'                  => 'State/Region/Province:',
        'Postal/Zip_Code'                        => 'Postal / Zip Code:',
        'channel_id'                             => 'Channel ID',
        'Upload_Payroll_Summary_Report'          => 'Upload Payroll Summary Report',
        'Upload_Workers_Comp_Loss_Runs(3_years)' => 'Upload Workers Comp. Loss Runs (3 years) :',
        'Upload_Workers_Comp_Declaration_Page'   => 'Upload Workers Comp. Declaration Page :',
        'Signs_Agreement1'                       => 'Upload Signs Agreement:',
        'Rent_Rolls'                             => 'Upload Rent Rolls :',
        'Appraisals'                             => 'Upload Appraisals:',
        'Depreciation_Schedule'                  => 'Upload Depreciation Schedule',
        'Purchase_Agreement'                     => 'Upload Purchase Agreement',
        'Engineering_Plans1'                     => 'Upload Engineering Plans',
        'Signs_Agreement'                        => 'Upload Signs Agrement',
        'Construction_Cost_Ledger'               => 'Upload Construction Cost Ledger',
        'Engineering_Plans'                      => 'Upload Engineering Plans',
        'Signs_Agreement'                        => 'Upload Signs Agreement',
        'User_Docs'                              => 'Upload Docs',
        'Upload_Medical_Census'                  => 'Upload Medical Census',
        'Upload_Group_Health_Questionnaire'      => 'Upload Group Health Questionnaire',
        'Upload_Current_Medical_Waste_Contract'  => 'Upload Current Medical Waste Contract',
        'Upload_Merchant_Processing_Statements(3_months)' => 'Upload Merchant Processing Statements (3 months)',
        'Upload Payroll Summary Report'               => 'Upload Payroll Summary Report',
        'Upload_Workers_Comp_Loss_Runs(3_years)'      => 'Upload Workers Comp. Loss Runs (3 years)',
        'Upload_Workers_Comp_Declaration_Page'        => 'Upload Workers Comp. Declaration Page ',
        'Signs_Agreement'                             => 'Upload Signs Agreement',
        'Signs_Letter_Of_Authority'                   => 'Upload Signs Letter Of Authority',
        'Upload_Real_Estate_Operating_Statement'      => 'Upload Real Estate Operating Statement',
        'Upload_Rent_Rolls(if_property_is_leased)'    => 'Upload Rent Rolls (if property is leased)',
        'Signs_Agreement'                             => 'Upload Signs Agreement',
        'Signs_NDA'                                   => 'Upload Signs NDA',
        'Upload_Recent_Tax_Returns'                   => 'Upload Recent Tax Returns',
        'Upload_Employee_Wage_Information'            => 'Upload Employee Wage Information',
        'Upload_Trial_Balance'                        => 'Upload Trial Balance ',
        'Upload_Organizational_Chart'                 => 'Upload Organizational Chart',
        'Upload_Sample_Contracts'                     => 'Upload Sample Contracts',
        'Signs_Agreement'                             => 'Upload Signs Agreement',
        'Upload_Parcel_Carrier_Contracts'             => 'Upload Parcel Carrier Contracts',
        'Signs_Letter_Of_Authority'                   => 'Upload Signs Letter Of Authority',
        'Upload_Waste_Invoices_Statements_(3_months)' => 'Upload Waste Invoices / Statements (3 months)',
        'Upload_Utility_bills(2_months)'              => 'Upload Utility bills (2 months) ',
        'Upload_Provider/Supplier_Contract_Agreement' => 'Upload Provider / Supplier Contract Agreement',
        'Signs_Letter_Of_Authority'                   => 'Upload Signs Letter Of Authority',
        'Upload_Workers_Comp_Audits_(past_3_years)'   => 'Upload Workers Comp Audits (past 3 years)',
        'Upload_Audit_worksheets_(past_3_years)'      => 'Upload  Audit worksheets (past 3 years',
        'Upload_Loss_runs_for_(past_3_years)'         => 'Upload Loss runs for (past 3 years)',
    ];

    return isset($key) ? $values[$key] : $values;
}

function getNumberOnly( $number ) {
    if(!empty($number)){
    $number = str_replace( ',', '', $number );
    $number = str_replace( '$', '', $number );
    $number = str_replace( '%', '', $number );
    return $number;
    }
    return 0;
}

function getRDTaxCreditCalculationValue( $wages, $supplies, $contracts, $cloud ) {

    if(!empty($wages) && !empty($supplies) && !empty($contracts) && !empty($cloud)){
        $wages = getNumberOnly( $wages );
    

    $supplies = getNumberOnly( $supplies );
    
    $contracts = getNumberOnly( $contracts );
    
    $cloud = getNumberOnly( $cloud );
    

    $annual_expenses = $wages + $supplies + $contracts + $cloud;

    return ('$' . ($annual_expenses * 0.052));
    }
    else{
        return 0;
    }
}

function getCommercialPropertyTax( $property_type, $cost ) {
    if(!empty($property_type) && !empty($cost)){
        $property_price = property_price;
        $propertyArray  = explode( ',', $property_type );
        $total_cost     = getNumberOnly( $cost );
        $propertyVal = 0;
        foreach ( $propertyArray as $value ) {
            $value       = trim( $value );
            $value       = trim( $value , '"');
            $multiplier  = $property_price[ $value ];
            $propertyVal += $total_cost * $multiplier;
        }
    
        return $propertyVal;
    }

    return 0;
}

function getWorkersCompCalculationValue( $workerPremium ) {
    if(!empty($workerPremium)){
        $premium = getNumberOnly( $workerPremium );
        if ( $premium < 25000 ) {
            return 0;
        } else {
            return ($workersComp = $premium * 0.1438);
        }
    }

    return 0;
}

function getEmployerHealthValueArray( $plan_type, $cost, $string ) {

    $year1 = 0;
    $year2 = 0;
    $year3 = 0;
    $year4 = 0;
    $year5 = 0;
    if(!empty($cost)){
        $insurance_value = getNumberOnly( $cost );
                
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

function getPEO( $current_employees ) {

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

function getProcessAutomationOptimisation( $hours, $wage ) {
    if(!empty($wage) && !empty($hours)){
        $salary = getNumberOnly( $wage );
        $pao_benefit = $hours * $salary * 261 * 0.63;
        if ( $pao_benefit < 10000 ) {
            return 0;
        } else {
            return $pao_benefit;
        }
    }

    return 0;
}

function getBusinessTelephones( $type, $cost, $phone_lines ) {
    if(!empty($type) && !empty($cost) && !empty($phone_lines)){
        $expenses = getNumberOnly( $cost );
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

function getElecronicPaymentProcessing( $amount ) {
    if(!empty($amount)){
        $payment = getNumberOnly( $amount );
        $ElecronicPaymentBenifit = $payment * 0.0067;
        if ( $payment < 20000 ) {
            return 0;
        } else {
            return $ElecronicPaymentBenifit;
        }
    }

    return 0;
}

function getShippingValue( $recent_review ,$string, $cost, $per1, $per2) {
    $R2 = 0;
    $R1  = getShippingCharges($string, $cost, $per1, $per2 );
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

function getShippingCharges( $string, $cost, $per1, $per2 ) {
        if ( $string == "Yes" ) {
           $fedex_expenditure = 0;
            if(!empty($cost)){
                $fedex_expenditure = getNumberOnly( $cost );
            }
            $parcel_per = 0;
            if(!empty($per1)){
                $parcel_per = getNumberOnly( $per1 );
            }
            $per1 = $parcel_per;
            $residential = 0;
            if(!empty($per2)){
                $residential =  getNumberOnly( $per2 );
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

function getSolidWasteValue( $expenses ) {
    if(!empty($expenses)){
        $expenditure = getNumberOnly( $expenses );
        $SolidWasteBenefit = $expenditure * 0.177 * 12;
        if ( $SolidWasteBenefit < 300 ) {
            return 0;
        } else {
            return $SolidWasteBenefit;
        }
    }
    
    return 0;
}

function getMedicalWasteValue( $expenses ) {
    if(!empty($expenses)){
        $expenditure = getNumberOnly( $expenses );
        $MedicalWasteBenefit = $expenditure * 0.31 * 12;
        if ( $expenditure < 35 ) {
            return 0;
        } else {
            return $MedicalWasteBenefit;
        }
    }

    return 0;
}

function getUtility( $natural_gas, $electricity ) {
    $natural_gas = getNumberOnly( $natural_gas );
    $electricity = getNumberOnly( $electricity );

    $total_utility = (( $natural_gas * 0.083 ) + ( $electricity * 0.118 ))*12;
    if ( $total_utility < 2500 ) {
        return 0;
    }

    return $total_utility;
}

// Calculate Net Profit Increase
function getNetProfitIncrease( $attr ) {
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

// calculate ERTC Benefit
function getERTCBenefitCalculationValue( $noOfEmployee ) {
    if(!empty($noOfEmployee)){
        $number_of_emp = getNumberOnly( $noOfEmployee );
        return $ertc_benefit = $number_of_emp * 7000;
    }
    else{
        return 0;
    }
}

// calculate WOT Creadit
function getWOTCreditCalculationValue( $noOfNewHires ) {
    if(!empty($noOfNewHires)){
        $wotc = getNumberOnly($noOfNewHires) * 0.146 * 879;
    
        return $wotc;
    }

    return 0;
}

// calculate Property Tax 
function getPropertyTaxCalculationValue( $prop_tax ) {

    if(!empty($prop_tax)){
        $tax = getNumberOnly( $prop_tax );
    
        $property_tax = $tax * 0.167;
    
        if ( $property_tax >= 12000 ) {
            return $property_tax;
        } else {
            return 0;
        }
    }

    return 0;
}

// Calculate Revenue Equivalent value
function getrevenueEquivalent( $netProfit, $currentNetProfitMargin ) {
    if(!empty($netProfit) && !empty($currentNetProfitMargin)){
         $currentNetProfitMargin = round( $currentNetProfitMargin );
        return ($netProfit / $currentNetProfitMargin)*100;
    }
    return 0;
}

// Calculate Current Net Profit Margin
function getCurrentNetProfitMargin( $revenue, $expenses ) {
  
    if(!empty($revenue) && !empty($expenses)){
        $revenue  = getNumberOnly( $revenue );
        $expenses = getNumberOnly( $expenses );
        $result   = ( $revenue - $expenses ) / $revenue;
        if($revenue == 0 || $expenses == 0){
            return  0 ;
        }
        return $result * 100;
    }
    return 0;
}

// Calculate Life Time Value
function getLifeTimeValue( $net_profit, $health = array(), $ertc_benefit, $property_tax, $workers_Comp, $rdTaxCredit, $property_tax_benefit, $getShippingValue,$wotc,$professional_employer_organisation,$process_automation,$business_phone_benefit,$electronic_payment,$solid_waste,$medical_waste ,$getUtility ) {

   return (((int)$wotc * 10) + ((int)$ertc_benefit) + ((int)$rdTaxCredit*4) + ((int)$property_tax_benefit) + ((int)$property_tax * 6) + ((int)$workers_Comp* 3) + ((int)$health[0] * 43.7) + ((int)$professional_employer_organisation * 7) + ((int)$process_automation * 10) + ((int)$business_phone_benefit * 10) + ((int)$electronic_payment* 7) + ((int)$getShippingValue * 3) + ((int)$solid_waste* 5) + ((int)$medical_waste* 8) + ((int)$getUtility*7));
}

function year_2( $netProfit,$health = array(), $ertc_benefit, $property_tax, $property_tax_benefit, $workers_Comp, $rdTaxCredit,$shipping_value ) {
    
    return(($netProfit+$health[0])-(($ertc_benefit)+($property_tax_benefit* 0.70)+($workers_Comp)+($shipping_value*0.10)));
}
    
function year_3( $netProfit,$health = array(), $ertc, $property_tax, $property_tax_benefit, $workers_Comp, $rdTaxCredit, $shipping_value ) {

    return((($netProfit)+($health[0]*2))-(($ertc)+($property_tax_benefit*0.85)+($workers_Comp)+($shipping_value*0.25)));
}

// Calculate Cash Benefit
function getCashBenefit( $attr ) {
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
function getTaxCreditBenefit( $attr ) {
    return $attr['wotc'] +
           $attr['ertc_benefit'] +
           $attr['property_tax_benefit'] +
           $attr['rdTaxCredit'];
}