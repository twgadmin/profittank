@include('frontend.calculator.common_profit')
<section class="ninten revenue_slides row align-items-center">
    <div class="col-12 col-lg-8 mx-auto">
        <div class="threechexk">
            <h3 class="mb-5">As an employer, do you spend $60,000<br> or more annually ($5K / mo.) on health insurance?
            </h3>
            <div class="custom-choose mb-5 mt-5">
                <input type="radio" class='radio_next' id="work-1" value="Yes" name="health_insurance"
                    {{session()->get('health_insurance') == 'Yes' ? 'checked' : ''}}>
                <label for="work-1">
                    Yes
                </label>
                <input type="radio" class='radio_next' id="work-2" value="No" name="health_insurance"
                    {{session()->get('health_insurance') == 'No' ? 'checked' : ''}}>
                <label for="work-2">
                    No
                </label>
            </div>
            <div class="form__field form__field_select_choose">
                <input type="hidden" name="business_experience" id="option_value"
                    value="{{session()->get('health_insurance')}}" data-validation="custom required"
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
        <!-- <div class="progress">
            <div id="dynamic" progress-to="{{$progress}}" class="progress-bar progress-bar-striped active"
                role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 0%;">
                0%</div>
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