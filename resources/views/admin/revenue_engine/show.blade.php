@extends('admin.layouts.default')

@section('title', 'Revenue Engine Details')

@section('content')
<ol class="breadcrumb float-xl-right">
	<li class="breadcrumb-item"><a href="javascript:;">Home</a></li>
	<li class="breadcrumb-item"><a href="{!! route('admin.revenue-engine.index') !!}">Revenue Engine</a></li>
	<li class="breadcrumb-item active">Details </li>
</ol>
<h1 class="page-header"><small>Revenue Engine Details</small></h1>
<div class="invoice">
			<!-- begin invoice-company -->
			<div class="invoice-company">
				<span class="pull-right hidden-print">
					<a href="javascript:;" class="btn btn-sm btn-white m-b-10"><i class="fa fa-file-pdf t-plus-1 text-danger fa-fw fa-lg"></i> Export as PDF</a>
					<a href="javascript:;" onclick="window.print()" class="btn btn-sm btn-white m-b-10"><i class="fa fa-print t-plus-1 fa-fw fa-lg"></i> Print</a>
				</span>
				Details
			</div>

			<div class="row">
				<div class="col-md-12">
					<div class="invoice-header">
						<div class="invoice-from">
							<span class="m-t-5 m-b-5">
								<strong class="text-inverse">User Name:</strong><br />
								{!! $data->first_name !!} {!! $data->last_name !!}<br />
							</span>
						</div>
						<div class="invoice-from">
							<span class="m-t-5 m-b-5">
								<strong class="text-inverse">Business Type:</strong><br />
								{!! $data->re_business_type !!}<br />
							</span>
						</div>
					</div>
				</div>
				<div class="col-md-12">
					<div class="invoice-header">
						<div class="invoice-from">
							<span class="m-t-5 m-b-5">
								<strong class="text-inverse">Annual Revenue :</strong><br />
								{!! $data->re_annual_revenue !!}<br />
							</span>
						</div>
						<div class="invoice-from">
							<span class="m-t-5 m-b-5">
								<strong class="text-inverse">Annual Expenses:</strong><br />
								{!! $data->re_annual_expenses !!}<br />
							</span>
						</div>
					</div>
				</div>
				<div class="col-md-12">
					<div class="invoice-header">
						<div class="invoice-from">
							<span class="m-t-5 m-b-5">
								<strong class="text-inverse">People Hired Annually:</strong><br />
								{!! $data->re_people_hired_annually !!}<br />
							</span>
						</div>
						<div class="invoice-from">
							<span class="m-t-5 m-b-5">
								<strong class="text-inverse">Business Experience:</strong><br />
								{!! $data->re_business_experience !!}<br />
							</span>
						</div>
					</div>
				</div>				<div class="col-md-12">
					<div class="invoice-header">
						<div class="invoice-from">
							<span class="m-t-5 m-b-5">
								<strong class="text-inverse">Calender Year Business Experience:</strong><br />
								{!! $data->re_calender_year_business_experience !!}<br />
							</span>
						</div>
						<div class="invoice-from">
							<span class="m-t-5 m-b-5">
								<strong class="text-inverse">Total Employees:</strong><br />
								{!! $data->re_total_employees !!}<br />
							</span>
						</div>
					</div>
				</div>
				<div class="col-md-12">
					<div class="invoice-header">
						<div class="invoice-from">
							<span class="m-t-5 m-b-5">
								<strong class="text-inverse">Payment US :</strong><br />
								{!! $data->re_payment_US !!}<br />
							</span>
						</div>
						<div class="invoice-from">
							<span class="m-t-5 m-b-5">
								<strong class="text-inverse">Wages:</strong><br />
								{!! $data->re_wages !!}<br />
							</span>
						</div>
					</div>
				</div>
				<div class="col-md-12">
					<div class="invoice-header">
						<div class="invoice-from">
							<span class="m-t-5 m-b-5">
								<strong class="text-inverse">Supplies:</strong><br />
								{!! $data->re_supplies !!}<br />
							</span>
						</div>
						<div class="invoice-from">
							<span class="m-t-5 m-b-5">
								<strong class="text-inverse">Contracts:</strong><br />
								{!! $data->re_contracts !!}<br />
							</span>
						</div>
					</div>
				</div>
				<div class="col-md-12">
					<div class="invoice-header">
						<div class="invoice-from">
							<span class="m-t-5 m-b-5">
								<strong class="text-inverse">Cloud Computing :</strong><br />
								{!! $data->re_cloud_computing !!}<br />
							</span>
						</div>
						<div class="invoice-from">
							<span class="m-t-5 m-b-5">
								<strong class="text-inverse">Commercial Property 750k :</strong><br />
								{!! $data->re_commercial_property_750k !!}<br />
							</span>
						</div>
					</div>
				</div>
				<div class="col-md-12">
					<div class="invoice-header">
						<div class="invoice-from">
							<span class="m-t-5 m-b-5">
								<strong class="text-inverse">Property Type :</strong><br />
								{!! $data->re_property_type !!}<br />
							</span>
						</div>
						<div class="invoice-from">
							<span class="m-t-5 m-b-5">
								<strong class="text-inverse">Total Property Cost :</strong><br />
								{!! $data->re_total_property_cost !!}<br />
							</span>
						</div>
					</div>
				</div>
				<div class="col-md-12">
					<div class="invoice-header">
						<div class="invoice-from">
							<span class="m-t-5 m-b-5">
								<strong class="text-inverse">Last Audit :</strong><br />
								{!! $data->re_last_audit !!}<br />
							</span>
						</div>
						<div class="invoice-from">
							<span class="m-t-5 m-b-5">
								<strong class="text-inverse">Real Property Value :</strong><br />
								{!! $data->re_real_property_value !!}<br />
							</span>
						</div>
					</div>
				</div>
				<div class="col-md-12">
					<div class="invoice-header">
						<div class="invoice-from">
							<span class="m-t-5 m-b-5">
								<strong class="text-inverse">Recent Property Tax :</strong><br />
								{!! $data->re_recent_property_tax !!}<br />
							</span>
						</div>
						<div class="invoice-from">
							<span class="m-t-5 m-b-5">
								<strong class="text-inverse">Premium Over 25k :</strong><br />
								{!! $data->re_premium_over_25k !!}<br />
							</span>
						</div>
					</div>
				</div>
				<div class="col-md-12">
					<div class="invoice-header">
						<div class="invoice-from">
							<span class="m-t-5 m-b-5">
								<strong class="text-inverse">Annual Workers Premium :</strong><br />
								{!! $data->re_annual_workers_premium !!}<br />
							</span>
						</div>
						<div class="invoice-from">
							<span class="m-t-5 m-b-5">
								<strong class="text-inverse">Insurance Over 1M</strong><br />
								{!! $data->re_insurance_over_1M !!}<br />
							</span>
						</div>
					</div>
				</div>
				<div class="col-md-12">
					<div class="invoice-header">
						<div class="invoice-from">
							<span class="m-t-5 m-b-5">
								<strong class="text-inverse">Monthly Insurance Premium :</strong><br />
								{!! $data->re_monthly_insurance_premium !!}<br />
							</span>
						</div>
						<div class="invoice-from">
							<span class="m-t-5 m-b-5">
								<strong class="text-inverse">Insurance Plan Type :</strong><br />
								{!! $data->re_insurance_plan_type !!}<br />
							</span>
						</div>
					</div>
				</div>
				<div class="col-md-12">
					<div class="invoice-header">
						<div class="invoice-from">
							<span class="m-t-5 m-b-5">
								<strong class="text-inverse">People Insured :</strong><br />
								{!! $data->re_people_insured !!}<br />
							</span>
						</div>
						<div class="invoice-from">
							<span class="m-t-5 m-b-5">
								<strong class="text-inverse">Current Employees :</strong><br />
								{!! $data->re_current_employees !!}<br />
							</span>
						</div>
					</div>
				</div>
				<div class="col-md-12">
					<div class="invoice-header">
						<div class="invoice-from">
							<span class="m-t-5 m-b-5">
								<strong class="text-inverse">Repeatable Tasks :</strong><br />
								{!! $data->re_repeatable_tasks !!}<br />
							</span>
						</div>
						<div class="invoice-from">
							<span class="m-t-5 m-b-5">
								<strong class="text-inverse">Total Hours Spent:</strong><br />
								{!! $data->re_total_hours_spent !!}<br />
							</span>
						</div>
					</div>
				</div>
				<div class="col-md-12">
					<div class="invoice-header">
						<div class="invoice-from">
							<span class="m-t-5 m-b-5">
								<strong class="text-inverse">Emp Avg Wage :</strong><br />
								{!! $data->re_emp_avg_wage !!}<br />
							</span>
						</div>
						<div class="invoice-from">
							<span class="m-t-5 m-b-5">
								<strong class="text-inverse">Dedicated Lines:</strong><br />
								{!! $data->re_dedicated_lines !!}<br />
							</span>
						</div>
					</div>
				</div>
				<div class="col-md-12">
					<div class="invoice-header">
						<div class="invoice-from">
							<span class="m-t-5 m-b-5">
								<strong class="text-inverse">Line Type:</strong><br />
								{!! $data->re_line_type !!}<br />
							</span>
						</div>
						<div class="invoice-from">
							<span class="m-t-5 m-b-5">
								<strong class="text-inverse">Phone Expenses:</strong><br />
								{!! $data->re_phone_expenses !!}<br />
							</span>
						</div>
					</div>
				</div>
				<div class="col-md-12">
					<div class="invoice-header">
						<div class="invoice-from">
							<span class="m-t-5 m-b-5">
								<strong class="text-inverse">Electronic Payment :</strong><br />
								{!! $data->re_electronic_payment !!}<br />
							</span>
						</div>
						<div class="invoice-from">
							<span class="m-t-5 m-b-5">
								<strong class="text-inverse">Discount Offered :</strong><br />
								{!! $data->re_discount_offered !!}<br />
							</span>
						</div>
					</div>
				</div>
				<div class="col-md-12">
					<div class="invoice-header">
						<div class="invoice-from">
							<span class="m-t-5 m-b-5">
								<strong class="text-inverse">Shipping 50000 :</strong><br />
								{!! $data->re_shipping_50000 !!}<br />
							</span>
						</div>
						<div class="invoice-from">
							<span class="m-t-5 m-b-5">
								<strong class="text-inverse">Fedex DHL :</strong><br />
								{!! $data->re_fedex_dhl !!}<br />
							</span>
						</div>
					</div>
				</div>
				<div class="col-md-12">
					<div class="invoice-header">
						<div class="invoice-from">
							<span class="m-t-5 m-b-5">
								<strong class="text-inverse">Domestic Delivery :</strong><br />
								{!! $data->re_domestic_delivery !!}<br />
							</span>
						</div>
						<div class="invoice-from">
							<span class="m-t-5 m-b-5">
								<strong class="text-inverse">International Delivery :</strong><br />
								{!! $data->re_international_delivery !!}<br />
							</span>
						</div>
					</div>
				</div>
				<div class="col-md-12">
					<div class="invoice-header">
						<div class="invoice-from">
							<span class="m-t-5 m-b-5">
								<strong class="text-inverse">Resedential Delivery :</strong><br />
								{!! $data->re_resedential_delivery !!}<br />
							</span>
						</div>
						<div class="invoice-from">
							<span class="m-t-5 m-b-5">
								<strong class="text-inverse">Commercial Delivery</strong><br />
								{!! $data->re_commercial_delivery !!}<br />
							</span>
						</div>
					</div>
				</div>
				<div class="col-md-12">
					<div class="invoice-header">
						<div class="invoice-from">
							<span class="m-t-5 m-b-5">
								<strong class="text-inverse">Last Review Fedex :</strong><br />
								{!! $data->re_last_review_fedex !!}<br />
							</span>
						</div>
						<div class="invoice-from">
							<span class="m-t-5 m-b-5">
								<strong class="text-inverse">Solid Waste Expense :</strong><br />
								{!! $data->re_solid_waste_expense !!}<br />
							</span>
						</div>
					</div>
				</div>
				<div class="col-md-12">
					<div class="invoice-header">
						<div class="invoice-from">
							<span class="m-t-5 m-b-5">
								<strong class="text-inverse">Medical Waste Pickup :</strong><br />
								{!! $data->re_medical_waste_pickup !!}<br />
							</span>
						</div>
						<div class="invoice-from">
							<span class="m-t-5 m-b-5">
								<strong class="text-inverse">Medical Containers :</strong><br />
								{!! $data->re_medical_containers !!}<br />
							</span>
						</div>
					</div>
				</div>
				<div class="col-md-12">
					<div class="invoice-header">
						<div class="invoice-from">
							<span class="m-t-5 m-b-5">
								<strong class="text-inverse">ERTC Benefit :</strong><br />
								{!! $data->re_ertc_benefit !!}<br />
							</span>
						</div>
						<div class="invoice-from">
							<span class="m-t-5 m-b-5">
								<strong class="text-inverse">RD Tax Credit:</strong><br />
								{!! $data->re_rd_tax_credit !!}<br />
							</span>
						</div>
					</div>
				</div>
				<div class="col-md-12">
					<div class="invoice-header">
						<div class="invoice-from">
							<span class="m-t-5 m-b-5">
								<strong class="text-inverse">Electricity :</strong><br />
								{!! $data->re_electricity !!}<br />
							</span>
						</div>
						<div class="invoice-from">
							<span class="m-t-5 m-b-5">
								<strong class="text-inverse">Natural Gas:</strong><br />
								{!! $data->re_natural_gas !!}<br />
							</span>
						</div>
					</div>
				</div>
				<div class="col-md-12">
					<div class="invoice-header">
						<div class="invoice-from">
							<span class="m-t-5 m-b-5">
								<strong class="text-inverse">Bussiness Operating State:</strong><br />
								{!! $data->re_bussiness_operating_state !!}<br />
							</span>
						</div>
						<div class="invoice-from">
							<span class="m-t-5 m-b-5">
								<strong class="text-inverse">WOTC:</strong><br />
								{!! $data->re_wotc !!}<br />
							</span>
						</div>
					</div>
				</div>
				<div class="col-md-12">
					<div class="invoice-header">
						<div class="invoice-from">
							<span class="m-t-5 m-b-5">
								<strong class="text-inverse">Workers Comp :</strong><br />
								{!! $data->re_workers_Comp !!}<br />
							</span>
						</div>
						<div class="invoice-from">
							<span class="m-t-5 m-b-5">
								<strong class="text-inverse">Commercial Tax :</strong><br />
								{!! $data->re_commercial_tax !!}<br />
							</span>
						</div>
					</div>
				</div>
				<div class="col-md-12">
					<div class="invoice-header">
						<div class="invoice-from">
							<span class="m-t-5 m-b-5">
								<strong class="text-inverse">PEO :</strong><br />
								{!! $data->re_PEO !!}<br />
							</span>
						</div>
						<div class="invoice-from">
							<span class="m-t-5 m-b-5">
								<strong class="text-inverse">Process Automation :</strong><br />
								{!! $data->re_process_automation !!}<br />
							</span>
						</div>
					</div>
				</div>
				<div class="col-md-12">
					<div class="invoice-header">
						<div class="invoice-from">
							<span class="m-t-5 m-b-5">
								<strong class="text-inverse">Electronic Benefit :</strong><br />
								{!! $data->re_electronic_benefit !!}<br />
							</span>
						</div>
						<div class="invoice-from">
							<span class="m-t-5 m-b-5">
								<strong class="text-inverse">Solid Waste Benefit :</strong><br />
								{!! $data->re_solid_waste_benefit !!}<br />
							</span>
						</div>
					</div>
				</div>
				<div class="col-md-12">
					<div class="invoice-header">
						<div class="invoice-from">
							<span class="m-t-5 m-b-5">
								<strong class="text-inverse">Medical Waste Benefit :</strong><br />
								{!! $data->re_medical_waste_benefit !!}<br />
							</span>
						</div>
						<div class="invoice-from">
							<span class="m-t-5 m-b-5">
								<strong class="text-inverse">Property TaxBenefit</strong><br />
								{!! $data->re_property_tax_benefit !!}<br />
							</span>
						</div>
					</div>
				</div>
				<div class="col-md-12">
					<div class="invoice-header">
						<div class="invoice-from">
							<span class="m-t-5 m-b-5">
								<strong class="text-inverse">Health Insurance Benefit :</strong><br />
								{!! $data->re_health_insurance_benefit !!}<br />
							</span>
						</div>
						<div class="invoice-from">
							<span class="m-t-5 m-b-5">
								<strong class="text-inverse">Business Phone Benefit :</strong><br />
								{!! $data->re_business_phone_benefit !!}<br />
							</span>
						</div>
					</div>
				</div>
				<div class="col-md-12">
					<div class="invoice-header">
						<div class="invoice-from">
							<span class="m-t-5 m-b-5">
								<strong class="text-inverse">Net Profit :</strong><br />
								{!! $data->re_net_profit !!}<br />
							</span>
						</div>
						<div class="invoice-from">
							<span class="m-t-5 m-b-5">
								<strong class="text-inverse">Net Profit Margin :</strong><br />
								{!! $data->re_net_profit_margin !!}<br />
							</span>
						</div>
					</div>
				</div>
				<div class="col-md-12">
					<div class="invoice-header">
						<div class="invoice-from">
							<span class="m-t-5 m-b-5">
								<strong class="text-inverse">New Net Profit Margin :</strong><br />
								{!! $data->re_new_net_profit_margin !!}<br />
							</span>
						</div>
						<div class="invoice-from">
							<span class="m-t-5 m-b-5">
								<strong class="text-inverse">Revenue Equivalent :</strong><br />
								{!! $data->re_revenue_equivalent !!}<br />
							</span>
						</div>
					</div>
				</div>
				<div class="col-md-12">
					<div class="invoice-header">
						<div class="invoice-from">
							<span class="m-t-5 m-b-5">
								<strong class="text-inverse">Life Time Value :</strong><br />
								{!! $data->re_life_time_value !!}<br />
							</span>
						</div>
						<div class="invoice-from">
							<span class="m-t-5 m-b-5">
								<strong class="text-inverse">Cash Benefit :</strong><br />
								{!! $data->re_cash_benefit !!}<br />
							</span>
						</div>
					</div>
				</div>
				<div class="col-md-12">
					<div class="invoice-header">
						<div class="invoice-from">
							<span class="m-t-5 m-b-5">
								<strong class="text-inverse">Utility Value :</strong><br />
								{!! $data->re_utility_value !!}<br />
							</span>
						</div>
						<div class="invoice-from">
							<span class="m-t-5 m-b-5">
								<strong class="text-inverse">Tax Credit Benefit :</strong><br />
								{!! $data->re_tax_credit_benefit !!}<br />
							</span>
						</div>
					</div>
				</div>
				<div class="col-md-12">
					<div class="invoice-header">
						<div class="invoice-from">
							<span class="m-t-5 m-b-5">
								<strong class="text-inverse">Year 1 :</strong><br />
								{!! $data->re_year_1 !!}<br />
							</span>
						</div>
						<div class="invoice-from">
							<span class="m-t-5 m-b-5">
								<strong class="text-inverse">Year 2</strong><br />
								{!! $data->re_year_2 !!}<br />
							</span>
						</div>
					</div>
				</div>
				<div class="col-md-12">
					<div class="invoice-header">
						<div class="invoice-from">
							<span class="m-t-5 m-b-5">
								<strong class="text-inverse">Year 3 :</strong><br />
								{!! $data->re_year_3 !!}<br />
							</span>
						</div>
						
					</div>
				</div>
			</div>
			<div class="invoice-note">
				<a href="{!! route('admin.revenue-engine.index') !!}" class="btn btn-md btn-inverse">Back</a>
			</div>
		</div>
@endsection