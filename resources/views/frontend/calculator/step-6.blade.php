@include('frontend.calculator.common_profit')
<div class="six revenue_slides row align-items-center">
    <div class="col-12 col-lg-8 mx-auto">
        <div class="threechexk">
            <h3>Did your business experience a full or partial suspension </br> due to a government order and related to
                COVID-19?</h3>
            <div class="custom-choose mb-5 mt-5">
                <input type="radio" class='radio_next' id="opt-1" value="Yes" name="business_exp"
                    {{session()->get('business_exp') == 'Yes' ? 'checked' : ''}}>
                <label for="opt-1">
                    Yes
                </label>
                <input type="radio" class='radio_next' id="opt-2" value="No" name="business_exp"
                    {{session()->get('business_exp') == 'No' ? 'checked' : ''}}>
                <label for="opt-2">
                    No
                </label>
                <input type="radio" class='radio_next' id="opt-3" value="Unknown" name="business_exp"
                    {{session()->get('business_exp') == 'Unknown' ? 'checked' : ''}}>
                <label for="opt-3">
                    Unknown
                </label>
            </div>
            <div class="form__field form__field_select_choose">
                <input type="hidden" id="option_value"
                    value="{{session()->get('business_exp')}}" data-validation="custom required"
                    data-message="Please select one." />
                    <input type="hidden" name="page_id" value="7">
            </div>
        </div>
    </div>
</div>
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