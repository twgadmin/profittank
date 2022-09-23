<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWp1yRevenueEngineTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    /*public function up()
    {
        Schema::create('wp1y_revenue_engine', function (Blueprint $table) {
            $table->increments('re_id');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->text('re_business_type', 255)->nullable();
            $table->unsignedInteger('re_annual_revenue')->nullable();
            $table->unsignedInteger('re_annual_expenses')->nullable();
            $table->unsignedInteger('re_people_hired_annually')->nullable();
            $table->string('re_business_experience', 255)->nullable();
            $table->string('re_calender_year_business_experience', 255)->nullable();
            $table->unsignedInteger('re_total_employees')->nullable();
            $table->string('re_payment_US', 255)->nullable();
            $table->unsignedInteger('re_wages')->nullable();
            $table->unsignedInteger('re_supplies')->nullable();
            $table->unsignedInteger('re_contracts')->nullable();
            $table->unsignedInteger('re_cloud_computing')->nullable();
            $table->string('re_commercial_property_750k', 255)->nullable();
            $table->text('re_property_type', 255)->nullable();
            $table->unsignedInteger('re_total_property_cost')->nullable();
            $table->string('re_last_audit', 255)->nullable();
            $table->unsignedInteger('re_real_property_value')->nullable();
            $table->unsignedInteger('re_recent_property_tax')->nullable();
            $table->string('re_premium_over_25k', 255)->nullable();
            $table->unsignedInteger('re_annual_workers_premium')->nullable();
            $table->string('re_insurance_over_1M', 255)->nullable();
            $table->unsignedInteger('re_monthly_insurance_premium')->nullable();
            $table->string('re_insurance_plan_type', 255)->nullable();
            $table->unsignedInteger('re_people_insured')->nullable();
            $table->unsignedInteger('re_current_employees')->nullable();
            $table->string('re_repeatable_tasks', 255)->nullable();
            $table->unsignedInteger('re_total_hours_spent')->nullable();
            $table->unsignedInteger('re_emp_avg_wage')->nullable();
            $table->unsignedInteger('re_dedicated_lines')->nullable();
            $table->string('re_line_type', 255)->nullable();
            $table->unsignedInteger('re_phone_expenses')->nullable();
            $table->unsignedInteger('re_electronic_payment')->nullable();
            $table->string('re_discount_offered', 255)->nullable();
            $table->string('re_shipping_50000', 255)->nullable();
            $table->unsignedInteger('re_fedex_dhl')->nullable();
            $table->unsignedInteger('re_domestic_delivery')->nullable();
            $table->unsignedInteger('re_international_delivery')->nullable();
            $table->unsignedInteger('re_resedential_delivery')->nullable();
            $table->unsignedInteger('re_commercial_delivery')->nullable();
            $table->string('re_last_review_fedex', 255)->nullable();
            $table->unsignedInteger('re_solid_waste_expense')->nullable();
            $table->string('re_medical_waste_pickup', 255)->nullable();
            $table->unsignedInteger('re_medical_containers')->nullable();
            $table->unsignedInteger('re_medical_waste_expense')->nullable();
            $table->unsignedInteger('re_ertc_benefit')->nullable();
            $table->unsignedInteger('re_rd_tax_credit')->nullable();
            $table->unsignedInteger('re_electricity')->nullable();
            $table->unsignedInteger('re_natural_gas')->nullable();
            $table->string('re_bussiness_operating_state', 255)->nullable();
            $table->float('re_wotc', 11, 4)->nullable();
            $table->float('re_workers_Comp', 11, 4)->nullable();
            $table->float('re_commercial_tax', 11, 4)->nullable();
            $table->float('re_PEO', 11, 4)->nullable();
            $table->float('re_process_automation', 11, 4)->nullable();
            $table->float('re_electronic_benefit', 11, 4)->nullable();
            $table->float('re_solid_waste_benefit', 11, 4)->nullable();
            $table->float('re_medical_waste_benefit', 11, 4)->nullable();
            $table->float('re_property_tax_benefit', 11, 4)->nullable();
            $table->float('re_health_insurance_benefit', 11, 4)->nullable();
            $table->float('re_business_phone_benefit', 11, 4)->nullable();
            $table->float('re_net_profit', 11, 4)->nullable();
            $table->float('re_net_profit_margin', 11, 4)->nullable();
            $table->float('re_new_net_profit_margin', 11, 4)->nullable();
            $table->float('re_revenue_equivalent', 11, 4)->nullable();
            $table->float('re_life_time_value', 11, 4)->nullable();
            $table->float('re_cash_benefit', 11, 4)->nullable();
            $table->float('re_utility_value', 11, 4)->nullable();
            $table->float('re_tax_credit_benefit', 11, 4)->nullable();
            $table->float('re_year_1', 11, 4)->nullable();
            $table->float('re_year_2', 11, 4)->nullable();
            $table->float('re_year_3', 11, 4)->nullable();
            $table->bigInt('user_id', 20)->default(0);
            $table->timestamps();
        });

        \DB::statement('ALTER TABLE wp1y_revenue_engine MODIFY re_wotc FLOAT (11, 4) NULL');
        \DB::statement('ALTER TABLE wp1y_revenue_engine MODIFY re_workers_Comp FLOAT (11, 4) NULL');
        \DB::statement('ALTER TABLE wp1y_revenue_engine MODIFY re_commercial_tax FLOAT (11, 4) NULL');
        \DB::statement('ALTER TABLE wp1y_revenue_engine MODIFY re_PEO FLOAT (11, 4) NULL');
        \DB::statement('ALTER TABLE wp1y_revenue_engine MODIFY re_process_automation FLOAT (11, 4) NULL');
        \DB::statement('ALTER TABLE wp1y_revenue_engine MODIFY re_electronic_benefit FLOAT (11, 4) NULL');
        \DB::statement('ALTER TABLE wp1y_revenue_engine MODIFY re_solid_waste_benefit FLOAT (11, 4) NULL');
        \DB::statement('ALTER TABLE wp1y_revenue_engine MODIFY re_medical_waste_benefit FLOAT (11, 4) NULL');
        \DB::statement('ALTER TABLE wp1y_revenue_engine MODIFY re_property_tax_benefit FLOAT (11, 4) NULL');
        \DB::statement('ALTER TABLE wp1y_revenue_engine MODIFY re_health_insurance_benefit FLOAT (11, 4) NULL');
        \DB::statement('ALTER TABLE wp1y_revenue_engine MODIFY re_business_phone_benefit FLOAT (11, 4) NULL');
        \DB::statement('ALTER TABLE wp1y_revenue_engine MODIFY re_net_profit FLOAT (11, 4) NULL');
        \DB::statement('ALTER TABLE wp1y_revenue_engine MODIFY re_net_profit_margin FLOAT (11, 4) NULL');
        \DB::statement('ALTER TABLE wp1y_revenue_engine MODIFY re_new_net_profit_margin FLOAT (11, 4) NULL');
        \DB::statement('ALTER TABLE wp1y_revenue_engine MODIFY re_revenue_equivalent FLOAT (11, 4) NULL');
        \DB::statement('ALTER TABLE wp1y_revenue_engine MODIFY re_life_time_value FLOAT (11, 4) NULL');
        \DB::statement('ALTER TABLE wp1y_revenue_engine MODIFY re_cash_benefit FLOAT (11, 4) NULL');
        \DB::statement('ALTER TABLE wp1y_revenue_engine MODIFY re_utility_value FLOAT (11, 4) NULL');
        \DB::statement('ALTER TABLE wp1y_revenue_engine MODIFY re_tax_credit_benefit FLOAT (11, 4) NULL');
        \DB::statement('ALTER TABLE wp1y_revenue_engine MODIFY re_year_1 FLOAT (11, 4) NULL');
        \DB::statement('ALTER TABLE wp1y_revenue_engine MODIFY re_year_2 FLOAT (11, 4) NULL');
        \DB::statement('ALTER TABLE wp1y_revenue_engine MODIFY re_year_3 FLOAT (11, 4) NULL');
    }*/

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    /*public function down()
    {
        Schema::dropIfExists('wp1y_revenue_engine');
    }*/
}
