@include('frontend.calculator.common_profit')
<section class="thertin revenue_slides row align-items-center">
    <div class="col-12 col-lg-8 mx-auto">
        <div class="hedingthr">
            <h3 class="text-center  mb-5">What was your total commercial property<br>
                cost, including improvements for all your properties?</h3>
            <div class="government m-auto" style="max-width: 375px;">
                <div class="form-group">
                    <div class="form__field">
                        <input
                            type="text"
                            autocomplete="off"
                            class="form-control numberWithCurrency mw-100"
                            name="property_cost"
                            id="option_value"
                            aria-describedby="emailHelp"
                            placeholder="$ building price & renovation costs"
                            value="{{session()->get('property_cost')}}"
                            data-message='Please enter a whole number between "750,000" and "325,000,000,000".'
                            data-validation="custom required length"
                            data-validation-length="750000-325000000000"
                        />
                        <span class="next-slide-button {{session()->get('property_cost') !='' ? 'active' : '' }}" id="revenueNext">
                            <img src="{!! asset('/assets/images/front/left1.png') !!}">
                        </span>
                    </div>
                </div>
            </div>
        </div>
        <input type="hidden" name="page_id" value="14">
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
        <!-- <div class="progress">
            <div id="dynamic" progress-to="{{$progress}}" class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 0%;">0%</div>
        </div> -->
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