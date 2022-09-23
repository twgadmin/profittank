@include('frontend.calculator.common_profit')
<section class="forteen revenue_slides row align-items-center">
    <div class="col-12">
        <h3>Estimate the last time you audited your </br> commercial property taxes. </h3>
        <div class="slide-14">
            <div class="threechexk">
                <div>
                    <div class="row mt-5 mb-5">
                        <div class="col-sm-6 text-right">
                            <div>
                                <input type="radio" class='radio_next' id="years-1" value="Less than 1 year"
                                    name="audit_time"
                                    {{session()->get('audit_time') == 'Less than 1 year' ? 'checked' : ''}}>
                                <label for="years-1" class="mb-3">
                                    Less than 1 year
                                </label>
                            </div>
                            <div>
                                <input type="radio" class='radio_next' id="years-2" value="1-2 years" name="audit_time"
                                    {{session()->get('audit_time') == '1-2 years' ? 'checked' : ''}}>
                                <label for="years-2" class="mb-3">
                                    1-2 years
                                </label>
                            </div>
                        </div>
                        <div class="col-sm-6 text-left">
                            <div>
                                <input type="radio" class='radio_next' id="sure-1" value="3-5 years" name="audit_time"
                                    {{session()->get('audit_time') == '3-5 years' ? 'checked' : ''}}>
                                <label for="sure-1" class="mb-3">
                                    3-5 years
                                </label>
                            </div>
                            <div>
                                <input type="radio" class='radio_next' id="sure-2" value="Not sure" name="audit_time"
                                    {{session()->get('audit_time') == 'Not sure' ? 'checked' : ''}}>
                                <label for="sure-2" class="mb-3">
                                    Not sure
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="form__field form__field_select_choose">
                        <input type="hidden" id="option_value"
                            value="{{session()->get('audit_time')}}" data-validation="custom required"
                            data-message="Please select one." />
                    </div>
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