@include('frontend.calculator.common_profit')
<section class="ten revenue_slides row align-items-center">
    <div class="col-12 mx-auto">
        <div class="tenth slide-10 mx-auto">
            <h3 class="mb-5">Estimate your spend last year for product,<br> process, or software development.</h3>
            <div class="business">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group mb-4">
                            <div class="form__field">
                                <span class="next-slide-button {{session()->get('wages') !='' ? 'active' : '' }}" id="revenueNext"><img
                                        src="{!! asset('/assets/images/front/left1.png') !!}"></span>
                                <input type="text" autocomplete="off" class="form-control numberWithCurrency"
                                    id="exampleInputEmail1" aria-describedby="emailHelp" name="wages"
                                    placeholder="$ payroll" value="{{session()->get('wages')}}"
                                    data-message='Please enter a whole number between "0" and "10,000,000".'
                                    data-validation="custom required length" data-validation-length="0-10000000" />

                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form__field">
                                <span
                                    class="next-slide-button {{session()->get('supplies') !='' ? 'active' : '' }}" id="revenueNext"><img
                                        src="{!! asset('/assets/images/front/left1.png') !!}"></span>
                                <input type="text" autocomplete="off" class="form-control numberWithCurrency"
                                    id="exampleInputEmail2" aria-describedby="emailHelp" name="supplies"
                                    placeholder="$ raw materials / supplies" value="{{session()->get('supplies')}}"
                                    data-message='Please enter a whole number between "0" and "10,000,000".'
                                    data-validation="custom required length" data-validation-length="0-10000000" step="1"/>

                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group mb-4">
                            <div class="form__field">
                                <span
                                    class="next-slide-button {{session()->get('contracts') !='' ? 'active' : '' }}" id="revenueNext"><img
                                        src="{!! asset('/assets/images/front/left1.png') !!}"></span>
                                <input type="text" autocomplete="off" class="form-control numberWithCurrency"
                                    id="exampleInputEmail3" aria-describedby="emailHelp" name="contracts"
                                    placeholder="$ subcontractors" value="{{session()->get('contracts')}}"
                                    data-message='Please enter a whole number between "0" and "50,000,000".'
                                    data-validation="custom required length" data-validation-length="0-50000000" />
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form__field">
                                <span
                                    class="next-slide-button {{session()->get('cloud_computing') !='' ? 'active' : '' }}" id="revenueNext"><img
                                        src="{!! asset('/assets/images/front/left1.png') !!}"></span>
                                <input type="text" autocomplete="off" class="form-control numberWithCurrency"
                                    id="exampleInputEmail4" aria-describedby="emailHelp" name="cloud_computing"
                                    placeholder="$ computer costs" value="{{session()->get('cloud_computing')}}"
                                    data-message='Please enter a whole number between "0" and "10,000,000".'
                                    data-validation="custom required length" data-validation-length="0-10000000" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <input type="hidden" name="page_id" value="11">
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
