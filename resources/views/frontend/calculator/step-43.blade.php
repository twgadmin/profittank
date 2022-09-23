@include('frontend.calculator.common_profit')
<section class="forteen revenue_slides row align-items-center">
    <div class="col-12 col-lg-6 mx-auto">
        <div class="hedingthr">
            <h3 class="text-center mb-5">Estimate what your business spends monthly on natural gas:</h3>
            <div class="government m-auto slide-41">
                <div class=" row form-group justify-content-center">
                    <div class="col-12 col-lg-6">
                        <div class="form__field">
                            <span class="next-slide-button {{session()->get('natural_gas') != '' ? 'active' : ''}}"id="revenueNext">
                                <img src="{!! asset('/assets/images/front/left1.png') !!}">
                            </span>
                            <input
                                type="text"
                                autocomplete="off"
                                class="form-control numberWithCurrency"
                                name="natural_gas"
                                aria-describedby="emailHelp"
                                placeholder="$ natural gas"
                                value="{{session()->get('natural_gas')}}"
                                data-message='Please enter a whole number between "0" and "35,000".'
                                data-validation="custom length one-of-input-required"
                                data-one-of-input-required="natural_gas_electricity"
                                data-validation-length="0-35000"
                            />
                        </div>
                    </div>
                </div>
                <div class="form__field one-of-input-required-error"
                    style="max-width: 300px; margin: 25px auto 0 auto;display: none;"></div>
                    <input type="hidden" name="page_id" value="44">
            </div>
        </div>
    </div>
</section>
<div class="absoluteed row">
    <div class="col-3">
        <div class="preve-class">
            <div class="button" id="revenuePrev"> Back</div>
        </div>
    </div>
    <div class="col-6 mx-auto align-self-center">
        <div class="p-progress-bar">
            <div class="p-progress-bar-dot" style="left: {{$progress}}%;"></div>
            <div class="p-progress-bar-text" style="left: {{$progress}}%;">{{$progress}}%</div>
        </div>
    </div>
    <div class="col-3">
        <div class="next-class">
            <div class="button" id="revenueNext">Next</div>
        </div>
    </div>
</div>
<script>
setTimeout(
    function() {
        let progress = $('#dynamic').attr('progress-to');
        $("#dynamic")
            .css("width", progress + "%")
            .attr("aria-valuenow", progress)
            .text(progress + "%");
    }, 800);
</script>
