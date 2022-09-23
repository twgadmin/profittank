@include('frontend.calculator.common_profit')
<section class="forteen thertysix revenue_slides row align-items-center">
    <div class="col-12 col-lg-6 mx-auto">
        <div class="threechexk">
            <h3>Estimate the last time you completed a rate review</br> with FedEx, UPS, or DHL. </h3>
            <div class="slide-36">
                <div class="row mt-5 mb-5">
                    <div class="col-lg-6 col-sm-12 text-right">
                        <div>
                            <input type="radio" class='radio_next' id="recently-1" value="Recently" name="last_review"
                                {{session()->get('last_review') == 'Recently' ? 'checked' : ''}}>
                            <label for="recently-1">
                                Recently
                            </label>
                        </div>
                        <div>
                            <input type="radio" class='radio_next' id="recently-2" value="2 Years" name="last_review"
                                {{session()->get('last_review') == '2 Years' ? 'checked' : ''}}>
                            <label for="recently-2">
                                2 Years

                            </label>
                        </div>
                    </div>
                    <div class="col-lg-6 col-sm-12 text-left">
                        <div>
                            <input type="radio" class='radio_next' id="aelf-1" value="1 Year" name="last_review"
                                {{session()->get('last_review') == '1 Year' ? 'checked' : ''}}>
                            <label for="aelf-1">
                                1 Year

                            </label>
                        </div>
                        <div>
                            <input type="radio" class='radio_next' id="aelf-2" value="3 Years" name="last_review"
                                {{session()->get('last_review') == '3 Years' ? 'checked' : ''}}>
                            <label for="aelf-2">
                                3 Years

                            </label>
                        </div>
                    </div>
                </div>
                <div class="form__field form__field_select_choose">
                    <input type="hidden" id="option_value"
                        value="{{session()->get('last_review')}}" data-validation="custom required"
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