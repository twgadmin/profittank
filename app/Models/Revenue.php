<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Revenue extends Model
{
    use HasFactory;

    protected $table = 'wp1y_revenue_engine';

    public $fillable = ['re_business_type','re_annual_revenue', 're_people_hired_annually','re_annual_expenses', 're_business_experience','re_calender_year_business_experience','re_total_employees','re_payment_US','re_wages','re_supplies',
    're_contracts','re_cloud_computing','re_commercial_property_750k','re_property_type','re_total_property_cost','re_last_audit','re_real_property_value','re_recent_property_tax','re_premium_over_25k','re_annual_workers_premium','re_insurance_over_1M','re_monthly_insurance_premium','re_insurance_plan_type','re_people_insured','re_current_employees','re_repeatable_tasks','re_total_hours_spent','re_emp_avg_wage','re_dedicated_lines','re_line_type','re_phone_expenses','re_electronic_payment','re_discount_offered','re_shipping_50000','re_fedex_dhl','re_domestic_delivery','re_international_delivery','re_resedential_delivery','re_commercial_delivery','re_last_review_fedex','re_solid_waste_expense','re_medical_waste_pickup','re_medical_containers','re_medical_waste_expense','re_ertc_benefit','re_rd_tax_credit','re_electricity','re_natural_gas','re_bussiness_operating_state','re_wotc','re_workers_Comp','re_commercial_tax','re_PEO','re_process_automation','re_electronic_benefit','re_solid_waste_benefit','re_medical_waste_benefit','re_property_tax_benefit','re_health_insurance_benefit','re_business_phone_benefit','re_net_profit','re_net_profit_margin','re_new_net_profit_margin','re_revenue_equivalent','re_life_time_value','re_cash_benefit','re_utility_value','re_tax_credit_benefit','re_year_1','re_year_2','re_year_3','user_id','created_at','updated_at'];
}
