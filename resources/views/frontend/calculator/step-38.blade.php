@include('frontend.calculator.common_profit')
<section class="tertineeight revenue_slides row align-items-center">
    <div class="col-12 col-lg-8 mx-auto">
        <div class="hedingthr">
            <h3 class="text-center mb-5">For your medical waste, describe your<br>current pickup schedule.</h3>
            <div class="row">
                <div class="col-12 col-md-6 mx-auto">
                    <div class="government m-auto slide-38">
                        <div class="form-group">
                            <div class="form__field has-drop-down">
                                <select id="medical_select" class="form-select form-select-sm" name="medical_waste"
                                    aria-label=".form-select-sm example" data-validation="custom required"
                                    data-message="Please select one.">
                                    <option value="">Choose your schedule</option>
                                    @foreach (pickupSchedule as $key => $value)
                                    <option {{session()->get('medical_waste') == $value ? 'selected' : ''}} value="{{$value}}">
                                        {{$value}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
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