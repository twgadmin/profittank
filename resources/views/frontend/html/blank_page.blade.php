@extends('frontend.layouts.template')
@section('page-title', 'template page')
<!-- page content  -->
@section('page')

<div id="render">

  <div class="banner d-none">
    <div class="row">
      <div class="col-lg-10 mx-auto py-5 text-center">
        <h2>While results may vary, the following estimations are controlled by<br> Federal and State statutes,
        regulations, and industry data. Without <br> compromise, the security of your data is protected by
        <br> robust security encryption & privacy protocols.</h2>
        <div class="sucuri">
          <a href="#">
            <img src="{!! asset('assets/frontend/calculator/images/sucuri.png') !!}">
          </a>
        </div>
      </div>
    </div>
  </div>

  <div class="category-selection d-none">
    <div class="row">
      <div class="col-12 col-md-8 mx-auto">
        <div class="row">
          <div class="col-12 col-md-6 mb-2">
            <label class="category-checkbox" for="business_1">
              <input type="checkbox" name="business_1" id="business_1">
              <div class="box-inner">
                <div class="box-front">
                  <img src="{!! asset('assets/frontend/calculator/images/icons/checkbox/we-hire-employees.png') !!}" alt="We Hire Employees">
                </div>
                <div class="box-back">
                  <p>We Hire Employees</p>
                </div>
              </div>
            </label>
          </div>
          <div class="col-12 col-md-6 mb-2">
            <label class="category-checkbox" for="business_2">
              <input type="checkbox" name="business_2" id="business_2">
              <div class="box-inner">
                <div class="box-front">
                  <img src="{!! asset('assets/frontend/calculator/images/icons/checkbox/worker-compensation.png') !!}" alt="We Pay Workers Comp. Insurance">
                </div>
                <div class="box-back">
                  <p>We Pay Workers Comp. Insurance</p>
                </div>
              </div>
            </label>
          </div>
          <div class="col-12 col-md-6 mb-2">
            <label class="category-checkbox" for="business_3">
              <input type="checkbox" name="business_3" id="business_3">
              <div class="box-inner">
                <div class="box-front">
                  <img src="{!! asset('assets/frontend/calculator/images/icons/checkbox/health-benefits.png') !!}" alt="We Offer Health Benefits">
                </div>
                <div class="box-back">
                  <p>We Offer Health Benefits</p>
                </div>
              </div>
            </label>
          </div>
          <div class="col-12 col-md-6 mb-2">
            <label class="category-checkbox" for="business_4">
              <input type="checkbox" name="business_4" id="business_4">
              <div class="box-inner">
                <div class="box-front">
                  <img src="{!! asset('assets/frontend/calculator/images/icons/checkbox/commercial-property.png') !!}" alt="We Own Commercial Property">
                </div>
                <div class="box-back">
                  <p>We Own Commercial Property</p>
                </div>
              </div>
            </label>
          </div>
          <div class="col-12 col-md-6 mb-2">
            <label class="category-checkbox" for="business_5">
              <input type="checkbox" name="business_5" id="business_5">
              <div class="box-inner">
                <div class="box-front">
                  <img src="{!! asset('assets/frontend/calculator/images/icons/checkbox/process-payroll.png') !!}" alt="We Process Payroll">
                </div>
                <div class="box-back">
                  <p>We Process Payroll</p>
                </div>
              </div>
            </label>
          </div>
          <div class="col-12 col-md-6 mb-2">
            <label class="category-checkbox" for="business_6">
              <input type="checkbox" name="business_6" id="business_6">
              <div class="box-inner">
                <div class="box-front">
                  <img src="{!! asset('assets/frontend/calculator/images/icons/checkbox/solid-waste-removal.png') !!}" alt="We Pay For Solid Waste Removal">
                </div>
                <div class="box-back">
                  <p>We Pay For Solid Waste Removal</p>
                </div>
              </div>
            </label>
          </div>
          <div class="col-12 col-md-6 mb-2">
            <label class="category-checkbox" for="business_7">
              <input type="checkbox" name="business_7" id="business_7">
              <div class="box-inner">
                <div class="box-front">
                  <img src="{!! asset('assets/frontend/calculator/images/icons/checkbox/telephone-service.png') !!}" alt="We Pay For Telephone Services">
                </div>
                <div class="box-back">
                  <p>We Pay For Telephone Services</p>
                </div>
              </div>
            </label>
          </div>
          <div class="col-12 col-md-6 mb-2">
            <label class="category-checkbox" for="business_8">
              <input type="checkbox" name="business_8" id="business_8">
              <div class="box-inner">
                <div class="box-front">
                  <img src="{!! asset('assets/frontend/calculator/images/icons/checkbox/improve-processes.png') !!}" alt="We Improve Our Processes">
                </div>
                <div class="box-back">
                  <p>We Improve Our Processes</p>
                </div>
              </div>
            </label>
          </div>
          <div class="col-12 col-md-6 mb-2">
            <label class="category-checkbox" for="business_9">
              <input type="checkbox" name="business_9" id="business_9">
              <div class="box-inner">
                <div class="box-front">
                  <img src="{!! asset('assets/frontend/calculator/images/icons/checkbox/accept-cc.png') !!}" alt="We Accept Credit Cards">
                </div>
                <div class="box-back">
                  <p>We Accept Credit Cards</p>
                </div>
              </div>
            </label>
          </div>
          <div class="col-12 col-md-6 mb-2">
            <label class="category-checkbox" for="business_10">
              <input type="checkbox" name="business_10" id="business_10">
              <div class="box-inner">
                <div class="box-front">
                  <img src="{!! asset('assets/frontend/calculator/images/icons/checkbox/medical-waste-removal.png') !!}" alt="We Pay For Medical Waste Removal">
                </div>
                <div class="box-back">
                  <p>We Pay For Medical Waste Removal</p>
                </div>
              </div>
            </label>
          </div>
          <div class="col-12 col-md-6 mb-2">
            <label class="category-checkbox" for="business_11">
              <input type="checkbox" name="business_11" id="business_11">
              <div class="box-inner">
                <div class="box-front">
                  <img src="{!! asset('assets/frontend/calculator/images/icons/checkbox/ship-small-parcels.png') !!}" alt="We Ship Small Parcels">
                </div>
                <div class="box-back">
                  <p>We Ship Small Parcels</p>
                </div>
              </div>
            </label>
          </div>
          <div class="col-12 col-md-6 mb-2">
            <label class="category-checkbox" for="business_12">
              <input type="checkbox" name="business_12" id="business_12">
              <div class="box-inner">
                <div class="box-front">
                  <img src="{!! asset('assets/frontend/calculator/images/icons/checkbox/pay-utilties.png') !!}" alt="We Pay For Utilities">
                </div>
                <div class="box-back">
                  <p>We Pay For Utilities</p>
                </div>
              </div>
            </label>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="slide d-none">
    <h3 class="text-center mt-5 mb-5">Estimate your total annual business revenue.</h3>
    <div class="row">
      <div class="col-12 col-md-6 col-lg-3 mx-auto">
        <div class="c-field">
          <input 
            type="text"
            autocomplete="off"
            class="form-control numberWithCurrency"
            placeholder="$ annual revenue"
            value=""
            data-message="Please enter a whole number between 100 and 99,999,999."
            data-validation="custom required length"
            data-validation-length="100-99999999"
          />
          <span class="next-slide-button"></span>
        </div>
      </div>
    </div>
  </div>

  <div class="slide d-none">
    <h3 class="text-center mt-5 mb-5">Estimate your total annual business expenses.</h3>
    <div class="row">
      <div class="col-12 col-md-6 col-lg-3 mx-auto">
        <div class="c-field">
          <input 
            type="text"
            autocomplete="off"
            class="form-control numberWithCurrency"
            placeholder="$ annual expenses"
            value=""
            data-message="Please enter a whole number between 100 and 99,999,999."
            data-validation="custom required length"
            data-validation-length="100-99999999"
          />
          <span class="next-slide-button"></span>
        </div>
      </div>
    </div>
  </div>
  
  <div class="slide d-none">
    <h3 class="text-center mt-5 mb-5">Estimate how many people you hire annually.</h3>
    <div class="row">
      <div class="col-12 col-md-6 col-lg-3 mx-auto">
        <div class="c-field">
          <input 
            type="text"
            autocomplete="off"
            class="form-control numberonly"
            placeholder="# new hires"
            value=""
            data-message='Please enter a whole number between "1" and "100,000".'
            data-validation="custom required length"
            data-validation-length="1-100000"
          />
          <span class="next-slide-button"></span>
        </div>
      </div>
    </div>
  </div>
  
  <div class="slide d-none">
    <h3 class="text-center mt-5 mb-5">Did your business experience a full or partial suspension<br> due to a government order and related to COVID-19?</h3>
    <div class="row">
      <div class="col-12 col-md-8 col-lg-6 mx-auto">
        <div class="c-checks">
          <label for="yes" class="check check-button">
            <input type="radio" name="business_exp" id="yes">
            <span>Yes</span>
          </label>

          <label for="no" class="check check-button">
            <input type="radio" name="business_exp" id="no">
            <span>No</span>
          </label>

          <label for="unknown" class="check check-button">
            <input type="radio" name="business_exp" id="unknown">
            <span>Unknown</span>
          </label>
        </div>
      </div>
    </div>
  </div>
  
  <div class="slide d-none">
    <h3 class="text-center mt-5 mb-5">In calendar years 2020 or 2021, did your business <br> experience a decline in gross receipts?</h3>
    <div class="row">
      <div class="col-12 col-md-8 col-lg-6 mx-auto">
        <div class="c-checks">
          <label for="cbe_yes" class="check check-button">
            <input type="radio" name="calender_business_experience" id="cbe_yes">
            <span>Yes</span>
          </label>

          <label for="cbe_no" class="check check-button">
            <input type="radio" name="calender_business_experience" id="cbe_no">
            <span>No</span>
          </label>

          <label for="cbe_unknown" class="check check-button">
            <input type="radio" name="calender_business_experience" id="cbe_unknown">
            <span>Unknown</span>
          </label>
        </div>
      </div>
    </div>
  </div>

  <div class="slide d-none">
    <h3 class="text-center mt-5 mb-5">Enter your business’ total number of<br> F/T & P/T employees.</h3>
    <div class="row">
      <div class="col-12 col-md-6 col-lg-3 mx-auto">
        <div class="c-field">
          <input 
            type="text"
            autocomplete="off"
            class="form-control numberonly"
            placeholder="# of employees"
            value=""
            data-message="Please enter a whole number between 1 and 2,200,000"
            data-validation="custom required length"
            data-validation-length="1-2200000"
          />
          <span class="next-slide-button"></span>
        </div>
      </div>
    </div>
  </div>

  <div class="slide d-none">
    <h3 class="text-center mt-5 mb-5">Do you pay engineers, natural scientists, or<br> software developers in the US?</h3>
    <div class="row">
      <div class="col-12 col-md-8 col-lg-6 mx-auto">
        <div class="c-checks">
          <label for="payment_yes" class="check check-button">
            <input type="radio" name="payment_US" id="payment_yes">
            <span>Yes</span>
          </label>

          <label for="payment_no" class="check check-button">
            <input type="radio" name="payment_US" id="payment_no">
            <span>No</span>
          </label>

          <label for="payment_unknown" class="check check-button">
            <input type="radio" name="payment_US" id="payment_unknown">
            <span>Unknown</span>
          </label>
        </div>
      </div>
    </div>
  </div>

  <div class="slide d-none">
    <h3 class="text-center mt-5 mb-5">Estimate your spend last year for product,<br> process, or software development.</h3>
    <div class="row">
      <div class="col-12 col-md-8 col-lg-6 mx-auto">
        <div class="row">
          <div class="col-6 mb-3">
            <div class="c-field">
              <input 
                type="text"
                autocomplete="off"
                class="form-control numberWithCurrency"
                placeholder="$ R&D Salaries"
                value=""
                data-message='Please enter a whole number between "100" and "10,000,000".'
                data-validation="custom required length"
                data-validation-length="100-10000000"
              /> 
              <span class="next-slide-button"></span>
            </div>
          </div>

          <div class="col-6 mb-3">
            <div class="c-field">
              <input 
                type="text"
                autocomplete="off"
                class="form-control numberWithCurrency"
                placeholder="$ 3rd party contracts"
                value=""
                data-message='Please enter a whole number between "100" and "10,000,000".'
                data-validation="custom required length"
                data-validation-length="100-10000000"
              /> 
              <span class="next-slide-button"></span>
            </div>
          </div>

          <div class="col-6">
            <div class="c-field">
              <input 
                type="text"
                autocomplete="off"
                class="form-control numberWithCurrency"
                placeholder="$ R&D Supplier"
                value=""
                data-message='Please enter a whole number between "100" and "50,000,000".'
                data-validation="custom required length"
                data-validation-length="100-50000000"
              /> 
              <span class="next-slide-button"></span>
            </div>
          </div>

          <div class="col-6">
            <div class="c-field">
              <input 
                type="text"
                autocomplete="off"
                class="form-control numberWithCurrency"
                placeholder="$ cloud computing"
                value=""
                data-message='Please enter a whole number between "100" and "10,000,000".'
                data-validation="custom required length"
                data-validation-length="100-10000000"
              /> 
              <span class="next-slide-button"></span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  
  <div class="slide d-none">
    <h3 class="text-center mt-5 mb-5">Do you own commercial property of $750K or more?</h3>
    <div class="row">
      <div class="col-12 col-md-8 col-lg-6 mx-auto">
        <div class="c-checks">
          <label for="rpt_yes" class="check check-button">
            <input type="radio" name="commercial_property" id="rpt_yes">
            <span>Yes</span>
          </label>

          <label for="rpt_no" class="check check-button">
            <input type="radio" name="commercial_property" id="rpt_no">
            <span>No</span>
          </label>

          <label for="rpt_unknown" class="check check-button">
            <input type="radio" name="commercial_property" id="rpt_unknown">
            <span>Unknown</span>
          </label>
        </div>
      </div>
    </div>
  </div>
  
  <div class="slide d-none">
    <h3 class="text-center mt-5 mb-5">Select your property type/s</h3>
    <div class="row">
      <div class="col-12 col-md-8 col-lg-6 mx-auto">
        <div class="row c-checks">
          <div class="col-6 mb-2">
            <label for="property-type-1" class="check w-100">
              <input type="checkbox" name="property_type" id="property-type-1">
              <span>Apartment</span>
            </label>
          </div>
          <div class="col-6 mb-2">
            <label for="property-type-2" class="check w-100">
              <input type="checkbox" name="property_type" id="property-type-2">
              <span>Office Building</span>
            </label>
          </div>
          <div class="col-6 mb-2">
            <label for="property-type-3" class="check w-100">
              <input type="checkbox" name="property_type" id="property-type-3">
              <span>Auto Dealer</span>
            </label>
          </div>
          <div class="col-6 mb-2">
            <label for="property-type-4" class="check w-100">
              <input type="checkbox" name="property_type" id="property-type-4">
              <span>Restaurant</span>
            </label>
          </div>
          <div class="col-6 mb-2">
            <label for="property-type-5" class="check w-100">
              <input type="checkbox" name="property_type" id="property-type-5">
              <span>Hotel</span>
            </label>
          </div>
          <div class="col-6 mb-2">
            <label for="property-type-6" class="check w-100">
              <input type="checkbox" name="property_type" id="property-type-6">
              <span>Retail Building</span>
            </label>
          </div>
          <div class="col-6 mb-2">
            <label for="property-type-7" class="check w-100">
              <input type="checkbox" name="property_type" id="property-type-7">
              <span>Industrial Warehouse</span>
            </label>
          </div>
          <div class="col-6 mb-2">
            <label for="property-type-8" class="check w-100">
              <input type="checkbox" name="property_type" id="property-type-8">
              <span>Storage Facility</span>
            </label>
          </div>
          <div class="col-6 mb-2">
            <label for="property-type-9" class="check w-100">
              <input type="checkbox" name="property_type" id="property-type-9">
              <span>Medical Facility</span>
            </label>
          </div>
          <div class="col-6 mb-2">
            <label for="property-type-10" class="check w-100">
              <input type="checkbox" name="property_type" id="property-type-10">
              <span>Other</span>
            </label>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="slide d-none">
    <h3 class="text-center mt-5 mb-5">What was your total commercial property<br> cost, including improvements for all your properties?</h3>
    <div class="row">
      <div class="col-12 col-md-4 mx-auto">
        <div class="c-field">
          <input 
            type="text"
            autocomplete="off"
            class="form-control numberWithCurrency"
            placeholder="$ building price & renovation costs"
            value=""
            data-message='Please enter a whole number between "750,000" and "325,000,000,000".'
            data-validation="custom required length"
            data-validation-length="750000-325000000000"
          />
          <span class="next-slide-button"></span>
        </div>
      </div>
    </div>
  </div>

  <div class="slide d-none">
    <h3 class="text-center mt-5 mb-5">Estimate the last time you audited your<br> commercial property taxes.</h3>
    <div class="row">
      <div class="col-12 col-md-8 col-lg-6 mx-auto">
        <div class="row c-checks">
          <div class="col-6 mb-2">
            <label for="years-1" class="check w-100">
              <input type="radio" name="audit_time" id="years-1">
              <span>Less than 1 year</span>
            </label>
          </div>
          <div class="col-6 mb-2">
            <label for="sure-1" class="check w-100">
              <input type="radio" name="audit_time" id="sure-1">
              <span>3-5 years</span>
            </label>
          </div>
          <div class="col-6 mb-2">
            <label for="years-2" class="check w-100">
              <input type="radio" name="audit_time" id="years-2">
              <span>1-2 years</span>
            </label>
          </div>
          <div class="col-6 mb-2">
            <label for="sure-2" class="check w-100">
              <input type="radio" name="audit_time" id="sure-2">
              <span>Not sure</span>
            </label>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="slide d-none">
    <h3 class="text-center mt-5 mb-5">Estimate the real property value of your<br> commercial real estate holdings.</h3>
    <div class="row">
      <div class="col-12 col-md-6 col-lg-3 mx-auto">
        <div class="c-field">
          <input 
            type="text"
            autocomplete="off"
            class="form-control numberWithCurrency"
            placeholder="$ real property value"
            value=""
            data-message='Please enter a whole number between "750,000" and "100,000,000".'
            data-validation="custom required length"
            data-validation-length="750000-100000000"
          />
          <span class="next-slide-button"></span>
        </div>
      </div>
    </div>
  </div>
  
  <div class="slide d-none">
    <h3 class="text-center mt-5 mb-5">Estimate what you paid most recently <br> in commercial property taxes.</h3>
    <div class="row">
      <div class="col-12 col-md-6 col-lg-3 mx-auto">
        <div class="c-field">
          <input 
            type="text"
            autocomplete="off"
            class="form-control numberWithCurrency"
            placeholder="$ real estate taxes"
            value=""
            data-message='Please enter a whole number between "5,000" and "10,000,000".'
            data-validation="custom required length"
            data-validation-length="5000-10000000"
          />
          <span class="next-slide-button"></span>
        </div>
      </div>
    </div>
  </div>

  <div class="slide d-none">
    <h3 class="text-center mt-5 mb-5">Are you workers comp. premiums over $25K per year?</h3>
    <div class="row">
      <div class="col-6 mx-auto">
        <div class="c-checks">
          <label for="workers-1" class="check check-button">
            <input type="radio" name="company_premium" id="workers-1">
            <span>Yes</span>
          </label>

          <label for="workers-2" class="check check-button">
            <input type="radio" name="company_premium" id="workers-2">
            <span>No</span>
          </label>

          <label for="workers-3" class="check check-button">
            <input type="radio" name="company_premium" id="workers-3">
            <span>Unknown</span>
          </label>
        </div>
      </div>
    </div>
  </div>

  <div class="slide d-none">
    <h3 class="text-center mt-5 mb-5">Enter the amount of your annual<br> workers comp. premiums.</h3>
    <div class="row">
      <div class="col-12 col-md-6 col-lg-3 mx-auto">
        <div class="c-field">
          <input 
            type="text"
            autocomplete="off"
            class="form-control numberWithCurrency"
            placeholder="$ workers comp."
            value=""
            data-message='Please enter a whole number between "25,000" and "75,000,000".'
            data-validation="custom required length"
            data-validation-length="25000-75000000"
          />
          <span class="next-slide-button"></span>
        </div>
      </div>
    </div>
  </div>

  <div class="slide d-none">
    <h3 class="text-center mt-5 mb-5">As an employer, do you spend at least $60,000 <br/>annually ($5K / mo.) on health insurance?</h3>
    <div class="row">
      <div class="col-4 mx-auto">
        <div class="c-checks">
          <label for="health_insurance_yes" class="check check-button">
            <input type="radio" name="health_insurance" id="health_insurance_yes">
            <span>Yes</span>
          </label>

          <label for="health_insurance_no" class="check check-button">
            <input type="radio" name="health_insurance" id="health_insurance_no">
            <span>No</span>
          </label>
        </div>
      </div>
    </div>
  </div>

  <div class="slide d-none">
    <h3 class="text-center mt-5 mb-5">Estimate your total monthly health insurance premium.</h3>
    <div class="row">
      <div class="col-12 col-md-6 col-lg-3 mx-auto">
        <div class="c-field">
          <input 
            type="text"
            autocomplete="off"
            class="form-control numberWithCurrency"
            placeholder="$ health insurance"
            value=""
            data-message='Please enter a whole number between "5,000" and "100,000,000".'
            data-validation="custom required length"
            data-validation-length="5000-100000000"/>
          <span class="next-slide-button"></span>
        </div>
      </div>
    </div>
  </div>

  <div class="slide d-none">
    <h3 class="text-center mt-5 mb-5">Select your current health insurance plan type.</h3>
    <div class="row">
      <div class="col-12 col-md-8 col-lg-6 mx-auto">
        <div class="row c-checks">
          <div class="col-6 mb-2">
            <label for="health_plan_fully" class="check w-100">
              <input type="checkbox" name="health_plan" id="health_plan_fully">
              <span>Fully-Funded</span>
            </label>
          </div>
          <div class="col-6 mb-2">
            <label for="health_plan_self" class="check w-100">
              <input type="checkbox" name="health_plan" id="health_plan_self">
              <span>Self-Insured</span>
            </label>
          </div>
          <div class="col-6 mb-2">
            <label for="health_plan_level" class="check w-100">
              <input type="checkbox" name="health_plan" id="health_plan_level">
              <span>Level-Funded</span>
            </label>
          </div>
          <div class="col-6 mb-2">
            <label for="health_plan_directly_contracted" class="check w-100">
              <input type="checkbox" name="health_plan" id="health_plan_directly_contracted">
              <span>Directly Contracted</span>
            </label>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="slide d-none">
    <h3 class="text-center mt-5 mb-5">How many people (employees & family members)<br> are covered under your plan?</h3>
    <div class="row">
      <div class="col-12 col-md-6 col-lg-3 mx-auto">
        <div class="c-field">
          <input 
            type="text"
            autocomplete="off"
            class="form-control numberonly"
            placeholder="$ health insurance"
            value=""
            data-message='Please enter a whole number between "1" and "5,000,000".'
            data-validation="custom required length" 
            data-validation-length="1-5000000"
          />
          <span class="next-slide-button"></span>
        </div>
      </div>
    </div>
  </div>

  <div class="slide d-none">
    <h3 class="text-center mt-5 mb-5">How many employees do you have on payroll?</h3>
    <div class="row">
      <div class="col-12 col-md-6 col-lg-3 mx-auto">
        <div class="c-field">
          <input 
            type="text"
            autocomplete="off"
            class="form-control numberonly"
            placeholder="# of employees"
            value=""
            data-message='Please enter a whole number between "1" and "2,200,000".'
            data-validation="custom required length" 
            data-validation-length="1-2200000"
          />
          <span class="next-slide-button"></span>
        </div>
      </div>
    </div>
  </div>

  <div class="slide d-none">
    <h3 class="text-center mt-5 mb-5">Test Do your employees perform repeatable computer tasks<br> such as data-entry, copying & pasting info., filling<br> out forms, or merging data?</h3>
    <div class="row">
      <div class="col-12 col-md-8 col-lg-6 mx-auto">
        <div class="c-checks">
          <label for="employees-1" class="check check-button">
            <input type="radio" name="computer_tasks" id="employees-1">
            <span>Yes</span>
          </label>
        
          <label for="employees-2" class="check check-button">
            <input type="radio" name="computer_tasks" id="employees-2">
            <span>No</span>
          </label>
        
          <label for="employees-3" class="check check-button">
            <input type="radio" name="computer_tasks" id="employees-3">
            <span>Unknown</span>
          </label>
        </div>
      </div>
    </div>
  </div>

  <div class="slide d-none">
    <h3 class="text-center mt-5 mb-5">Now, estimate how many total hours that all employees<br> spend daily on those repeatable tasks<br> (admin, compliance, etc.)?</h3>
    <div class="row">
      <div class="col-12 col-md-6 col-lg-3 mx-auto">
        <div class="c-field">
          <input 
            type="text"
            autocomplete="off"
            class="form-control numberonly"
            placeholder="# hours (daily)"
            value=""
            data-message='Please enter a whole number between "1" and "60".'
            data-validation="custom required length" 
            data-validation-length="1-60"
          />
          <span class="next-slide-button"></span>
        </div>
      </div>
    </div>
  </div>
  
  <div class="slide d-none">
    <h3 class="text-center mt-5 mb-5">Estimate the average wage per employee performing<br> these repeatable computer tasks.</h3>
    <div class="row">
      <div class="col-12 col-md-6 col-lg-3 mx-auto">
        <div class="c-field">
          <input 
            type="text"
            autocomplete="off"
            class="form-control numberWithCurrency"
            placeholder="$ avg. hourly wage"
            value=""
            data-message='Please enter a whole number between "6" and "300".'
            data-validation="custom required length" 
            data-validation-length="6-300"
          />
          <span class="next-slide-button"></span>
        </div>
      </div>
    </div>
  </div>

  <div class="slide d-none">
    <h3 class="text-center mt-5 mb-5">How many dedicated phone lines does your business<br> have; including fax and alarm lines?</h3>
    <div class="row">
      <div class="col-12 col-md-6 col-lg-3 mx-auto">
        <div class="c-field">
          <input 
            type="text"
            autocomplete="off"
            class="form-control numberonly"
            placeholder="# of users / seats"
            value=""
            data-message='Please enter a whole number between "1" and "10,000".'
            data-validation="custom required length" 
            data-validation-length="1-10000"
          />
          <span class="next-slide-button"></span>
        </div>
      </div>
    </div>
  </div>

  <div class="slide d-none">
    <h3 class="text-center mt-5 mb-5">Do you use regular landlines or hosted VoIP?</h3>
    <div class="row">
      <div class="col-12 col-4 mx-auto">
        <div class="c-checks">
          <label for="regular-1" class="check check-button">
            <input type="radio" name="line_type" id="regular-1">
            <span>Landlines</span>
          </label>

          <label for="regular-2" class="check check-button">
            <input type="radio" name="line_type" id="regular-2">
            <span>VoIP</span>
          </label>
        </div>
      </div>
    </div>
  </div>

  <div class="slide d-none">
    <h3 class="text-center mt-5 mb-5">What are your monthly phone expenses?</h3>
    <div class="row">
      <div class="col-12 col-md-6 col-lg-3 mx-auto">
        <div class="c-field">
          <input 
            type="text"
            autocomplete="off"
            class="form-control numberonly"
            placeholder="$ phone expenses"
            value=""
            data-message='Please enter a whole number between "15" and "80,000".'
            data-validation="custom required length" 
            data-validation-length="15-80000"
          />
          <span class="next-slide-button"></span>
        </div>
      </div>
    </div>
  </div>
  
  <div class="slide d-none">
    <h3 class="text-center mt-5 mb-5">Estimate your total annual amount of electronic payment<br> processing (credit cards, debit).</h3>
    <div class="row">
      <div class="col-12 col-md-6 col-lg-3 mx-auto">
        <div class="c-field">
          <input 
            type="text"
            autocomplete="off"
            class="form-control numberWithCurrency"
            placeholder="$ payment processing"
            value=""
            data-message='Please enter a whole number between "500" and "100,000,000".'
            data-validation="custom required length"
            data-validation-length="500-100000000"
          />
          <span class="next-slide-button"></span>
        </div>
      </div>
    </div>
  </div>

  <div class="slide d-none">
    <h3 class="text-center mt-5 mb-5">Do you offer customers a cash discount program<br> when accepting electronic payments?</h3>
    <div class="row">
      <div class="col-12 col-md-8 col-lg-6 mx-auto">
        <div class="c-checks">
          <label for="when-1" class="check check-button">
            <input type="radio" name="discount" id="when-1">
            <span>Yes</span>
          </label>

          <label for="when-2" class="check check-button">
            <input type="radio" name="discount" id="when-2">
            <span>No</span>
          </label>
          
          <label for="when-3" class="check check-button">
            <input type="radio" name="discount" id="when-3">
            <span>Unknown</span>
          </label>
        </div>
      </div>
    </div>
  </div>
  
  <div class="slide d-none">
    <h3 class="text-center mt-5 mb-5">Do you spend at least $50,000 annually in small parcel<br> shipping (packages, boxes, envelopes)?</h3>
    <div class="row">
      <div class="col-12 col-md-8 col-lg-6 mx-auto">
        <div class="c-checks">
          <label for="boxes-1" class="check check-button">
            <input type="radio" name="spent_in_shipping" id="boxes-1">
            <span>Yes</span>
          </label>

          <label for="boxes-2" class="check check-button">
            <input type="radio" name="spent_in_shipping" id="boxes-2">
            <span>No</span>
          </label>
          
          <label for="boxes-3" class="check check-button">
            <input type="radio" name="spent_in_shipping" id="boxes-3">
            <span>Unknown</span>
          </label>
        </div>
      </div>
    </div>
  </div>

  <div class="slide d-none">
    <h3 class="text-center mt-5 mb-5">Enter the estimated amount you spend annually<br> with FedEx, UPS, and DHL, or others.</h3>
    <div class="row">
      <div class="col-12 col-md-6 col-lg-3 mx-auto">
        <div class="c-field">
          <input 
            type="text"
            autocomplete="off"
            class="form-control numberWithCurrency"
            placeholder="$ parcel shipping (ann.)"
            value=""
            data-message='Please enter a whole number between "50,000" and "20,000,000".'
            data-validation="custom required length" 
            data-validation-length="50000-20000000"
          />
          <span class="next-slide-button"></span>
        </div>
      </div>
    </div>
  </div>

  <div class="slide d-none">
    <h3 class="text-center mt-5 mb-5">What percent of your total small parcel shipments<br> are domestic delivery?</h3>
    <div class="row">
      <div class="col-12 col-md-6 col-lg-3 mx-auto">
        <div class="c-field">
          <input 
            type="text"
            autocomplete="off"
            name="parcel_per"
            class="form-control numberWithPercentage"
            placeholder="% domestic"
            value=""
            data-message='Please enter a whole number between "1" and "100".'
            data-validation="custom required length" 
            data-validation-length="1-100"
          />
          <span class="next-slide-button"></span>
        </div>
      </div>
    </div>
  </div>

  <div class="slide d-none">
    <h3 class="text-center mt-5 mb-5">What percent of your total small parcel shipments<br> are residential delivery?</h3>
    <div class="row">
      <div class="col-12 col-md-6 col-lg-3 mx-auto">
        <div class="c-field">
          <input 
            type="text"
            autocomplete="off"
            name="residential"
            class="form-control numberWithPercentage"
            placeholder="% residential"
            value=""
            data-message='Please enter a whole number between "1" and "100".'
            data-validation="custom required length" 
            data-validation-length="1-100"
          />
          <span class="next-slide-button"></span>
        </div>
      </div>
    </div>
  </div>

  <div class="slide d-none">
    <h3 class="text-center mt-5 mb-5">Estimate the last time you completed a rate<br> review with FedEx, UPS, or DHL.</h3>
    <div class="row">
      <div class="col-12 col-md-8 col-lg-6 mx-auto">
        <div class="row c-checks">
          <div class="col-6 mb-2">
            <label for="recently-1" class="check w-100">
              <input type="radio" name="last_review" id="recently-1">
              <span>Recently</span>
            </label>
          </div>
          <div class="col-6 mb-2">
            <label for="aelf-1" class="check w-100">
              <input type="radio" name="last_review" id="aelf-1">
              <span>1 Year</span>
            </label>
          </div>
          <div class="col-6 mb-2">
            <label for="recently-2" class="check w-100">
              <input type="radio" name="last_review" id="recently-2">
              <span>2 Years</span>
            </label>
          </div>
          <div class="col-6 mb-2">
            <label for="aelf-2" class="check w-100">
              <input type="radio" name="last_review" id="aelf-2">
              <span>3 Years</span>
            </label>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="slide d-none">
    <h3 class="text-center mt-5 mb-5">For solid waste and recycling, enter<br> your monthly expense.</h3>
    <div class="row">
      <div class="col-12 col-md-6 col-lg-3 mx-auto">
        <div class="c-field">
          <input 
            type="text"
            autocomplete="off"
            name="solid_waste"
            class="form-control numberWithCurrency"
            placeholder="$ solid waste expense"
            value=""
            data-message='Please enter a whole number between "25" and "100,000".'
            data-validation="custom required length" 
            data-validation-length="25-100000"
          />
          <span class="next-slide-button"></span>
        </div>
      </div>
    </div>
  </div>

  <div class="slide d-none">
    <h3 class="text-center mt-5 mb-5">For your medical waste, describe your<br> current pickup schedule.</h3>
    <div class="row">
      <div class="col-12 col-md-8 col-lg-5 mx-auto">
        <div class="c-select">
          <select
            id="medical_select"
            class="form-select form-select-sm"
            name="medical_waste"
            data-validation="custom required"
            data-message="Please select one."
          >
            <option value="">Choose your schedule</option>
            <option value="1">Weekly (52 Stops)</option>
            <option value="2">Every Two Weeks (26 Stops annually)</option>
            <option value="3">Monthly (12-13 Stops annually)</option>
            <option value="4">Every Two Months (6 Stops annually)</option>
            <option value="5">Every Three Months (4 Stops annually)</option>
            <option value="6">Every Four Months (3 Stops annually)</option>
            <option value="7">Every Six Months (2 Stops annually)</option>
            <option value="8">Once annually</option>
            <option value="9">One time pickup</option>
            <option value="10">On call</option>
          </select>
        </div>
      </div>
    </div>
  </div>

  <div class="slide d-none">
    <h3 class="text-center mt-5 mb-5">Estimate your number of medical waste<br> containers per pickup.</h3>
    <div class="row">
      <div class="col-12 col-md-6 col-lg-3 mx-auto">
        <div class="c-field">
          <input 
            type="text"
            autocomplete="off"
            name="container"
            class="form-control numberonly"
            placeholder="# of containers"
            value=""
            data-message='Please enter a whole number between "1" and "10000".'
            data-validation="custom required length" 
            data-validation-length="1-10000"
          />
          <span class="next-slide-button"></span>
        </div>
      </div>
    </div>
  </div>
  
  <div class="slide d-none">
    <h3 class="text-center mt-5 mb-5">For your medical waste, enter your<br> total monthly expense.</h3>
    <div class="row">
      <div class="col-12 col-md-6 col-lg-3 mx-auto">
        <div class="c-field">
          <input 
            type="text"
            autocomplete="off"
            name="medical_expense"
            class="form-control numberWithCurrency"
            placeholder="$ medical waste expense"
            value=""
            data-message='Please enter a whole number between "5" and "1,000,000".'
            data-validation="custom required length" 
            data-validation-length="5-1000000"
          />
          <span class="next-slide-button"></span>
        </div>
      </div>
    </div>
  </div>
  
  <div class="slide d-none">
    <h3 class="text-center mt-5 mb-5">Estimate what you spend monthly on utilities.</h3>
    <div class="row">
      <div class="col-12 col-md-10 col-lg-7 mx-auto">
        <div class="row">
          <div class="col-12 col-md-6">
            <div class="c-field">
              <input 
                type="text"
                autocomplete="off"
                name="natural_gas"
                class="form-control numberWithCurrency" 
                value=""
                placeholder="$ Natural Gas Expenses"
                data-message='Please enter a whole number.'
                data-validation="custom length one-of-input-required"
                data-one-of-input-required="natural_gas_electricity"
                data-validation-length="1-1000000"
              />
              <span class="next-slide-button"></span>
            </div>
          </div>
          <div class="col-12 col-md-6">
            <div class="c-field">
              <input 
                type="text"
                autocomplete="off"
                name="electricity"
                class="form-control numberWithCurrency"
                value=""
                placeholder="$ Electricity Expenses"
                data-message='Please enter a whole number.'
                data-validation="custom length one-of-input-required"
                data-one-of-input-required="natural_gas_electricity"
                data-validation-length="1-1000000"
                data-one-of-input="natural_gas_electricity"
              />
              <span class="next-slide-button"></span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="slide d-none">
    <h3 class="text-center mt-5 mb-5">Does your business operate in a <br/> Deregulated Energy State?</h3>
    <div class="row">
      <div class="col-12 col-md-6 col-lg-3 mx-auto">
        <div class="c-checks">
          <label for="work-1" class="check check-button">
            <input type="radio" name="business_operating_state" id="work-1">
            <span>Yes</span>
          </label>

          <label for="work-2" class="check check-button">
            <input type="radio" name="business_operating_state" id="work-2">
            <span>No</span>
          </label>
        </div>
      </div>
    </div>
  </div> 
</div>

@section('style') 
<style type="text/css">
  /*add custom style here*/
</style>
@endsection


@section('js')
<script type="text/javascript">
  // alert('test');
</script>
@endsection

@endsection <!-- // page content end here -->