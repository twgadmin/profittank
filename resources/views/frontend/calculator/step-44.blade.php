@include('frontend.calculator.common_profit')
<section class="ninten revenue_slides row align-items-center">
    <div class="col-12 col-lg-8 mx-auto">
        <div class="threechexk">
            <h3 class="mb-5">Does your business operate in a <br>deregulated energy state?
            </h3>
            <div class="custom-choose mt-5">
                <input type="radio" class='radio_next' id="work-1" value="Yes" name="business_operating_state"
                    {{session()->get('business_operating_state') == 'Yes' ? 'checked' : ''}}>
                <label for="work-1">
                    Yes
                </label>
                <input type="radio" class='radio_next' id="work-2" value="No" name="business_operating_state"
                    {{session()->get('business_operating_state') == 'No' ? 'checked' : ''}}>
                <label for="work-2" class="mr-0">
                    No
                </label>
            </div>
            <div class="form__field form__field_select_choose">
                <input type="hidden" id="option_value"
                    value="{{session()->get('business_operating_state')}}" data-validation="custom required"
                    data-message="Please select one." />
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