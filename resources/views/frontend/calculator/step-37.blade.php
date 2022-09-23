@include('frontend.calculator.common_profit')
<section class="tertinesevan revenue_slides row align-items-center">
    <div class="col-12 col-lg-8 mx-auto">
        <div class="hedingthr">
            <h3 class="text-center  mb-5">For solid waste and recycling, enter </br> your monthly expense.
            </h3>
            <div class="government m-auto" style="max-width: 270px;">
                <div class="form-group">
                    <div class="form__field">
                        <span class="next-slide-button {{session()->get('solid_waste') == 'Yes' ? 'checked' : ''}}" id="revenueNext"><img
                                src="{!! asset('/assets/images/front/left1.png') !!}"></span>
                        <input type="text" autocomplete="off" class="form-control numberWithCurrency" name="solid_waste"
                            id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="$ solid waste expense"
                            value="{{session()->get('solid_waste')}}"
                            data-message='Please enter a whole number between "25" and "100,000".'
                            data-validation="custom required length" data-validation-length="25-100000" />
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