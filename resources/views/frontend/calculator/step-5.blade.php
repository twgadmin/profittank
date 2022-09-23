@include('frontend.calculator.common_profit')
<div class="five revenue_slides row align-items-center">
    <div class="col-12 col-lg-8 mx-auto">
        <div class="hedingthr">
            <h3 class="text-center  mb-5">Estimate how many people you hire annually.</h3>
            <div class="government m-auto">
                <div class="form-group">
                    <div class="form__field">
                        <span class="next-slide-button {{session()->get('people_hired') !='' ? 'active' : '' }}" id="revenueNext"><img
                                src="{!! asset('/assets/images/front/left1.png') !!}"></span>
                        <input type="text" autocomplete="off" value="{{session()->get('people_hired')}}"
                            name="people_hired" class="form-control numberonly" id="option_value"
                            aria-describedby="emailHelp" placeholder="# new hires" data-message='Please enter a whole number
    between "1" and "100,000".' data-validation="custom required length" data-validation-length="1-100000" />
                    </div>
                </div>
            </div>
        </div>
        <input type="hidden" name="page_id" value="6">
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