<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

// Define our businesses

define('businesses', array('We hire employees','We pay workers comp. insurance','We offer health benefits','We own commercial property','We process payroll','We pay for solid waste removal','We pay for telephone services','Our data entry process is inefficient','We accept credit cards','We pay for medical waste removal','We ship small parcels','We pay for utilities'));

// Define our business steps
define('business_0',array( 5, 6, 7, 8, 9, 10 ));
define('business_1',array( 17, 18 ));
define('business_2',array( 19, 20, 21, 22 ));
define('business_3',array( 11, 12, 13, 14, 15, 16 ));
define('business_4',array( 23 ));
define('business_5',array( 37 ));
define('business_6',array( 27, 28, 29 ));
define('business_7',array( 24, 25, 26 ));
define('business_8',array( 30, 31 ));
define('business_9',array( 38, 39, 40 ));
define('business_10',array( 32, 33, 34, 35, 36 ));
define('business_11',array( 41, 42, 43, 44 ));
define('allbusiness',array(2,3,4));

// Define propert types
define('properties',array('Apartment','Office Building','Auto Dealer','Restaurant','Hotel','Retail Building','Industrial Warehouse','Storage Facility','Medical Facility','Other'));

// Define pickup schedule 
define('pickupSchedule',array('Weekly (52 Stops)','Every Two Weeks (26 Stops annually)','Monthly (12-13 Stops annually)','Every Two Months (6 Stops annually)','Every Three Months (4 Stops annually)','Every Four Months (3 Stops annually)','Every Six Months (2 Stops annually)','Once annually','One time pickup','On call'));

// Define businesses input fields
define('busnessFields',array('annual_revenue','annual_expenses','people_hired','business_exp','calender_business_experience','total_emp','payment_US','wages','supplies','contracts','cloud_computing','commercial_property','prop_type','property_cost','audit_time','property_value','recent_tax','company_premium','worker_premium','health_insurance','total_premium','health_plan','covered','current_emp','computer_tasks','hours_spent','hourly_wage','phone_lines','line_type','phone_expense','electronic_payment','discount','spent_in_shipping','fedex','parcel_per','residential','last_review','solid_waste','medical_waste','container','medical_expense','natural_gas','electricity','business_operating_state'));

// Define state for utilities
define('states',array('CA', 'MI', 'CT', 'MO', 'GA', 'NJ', 'IL', 'NY', 'IN', 'OH', 'KS', 'PA', 'MA', 'TX', 'MD', 'VA'));

// 42 : Electricity – CT, IL, MD, MI, NJ, NY, OH, PA, TX, VA 
// 43 : Natural Gas – CA, CT, GA, IL, IN, KS, MA, MD, MI, MO, NJ, NY, OH, PA, VA
define('question_agianst_states',array('CA'=>'43','MI'=>'42,43','CT'=>'42,43','MO'=>'43', 'GA'=>'43', 'NJ'=>'42,43', 'IL'=>'42,43', 'NY'=>'42,43', 'IN'=>'43', 'OH'=>'42,43', 'KS'=>'43', 'PA'=>'42,43', 'MA'=>'43', 'TX'=>'42', 'MD'=>'42,43', 'VA'=>'42,43'));

define('property_price', array(
	'1'  => 0.0465,
    '2'  => 0.0510,
	'3'  => 0.0485,
    '4'  => 0.0555,
	'5'  => 0.0600,
    '6'  => 0.0435,
	'7'  => 0.0418,
    '8'  => 0.0445,
	'9'  => 0.0650,
	'10' => 0.0510,
));
 ?>