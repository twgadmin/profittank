@include('frontend.calculator.common_profit')
<section class="forteen tevanteone revenue_slides row align-items-center">
    <div class="col-12 col-lg-6 mx-auto">
        <div class="threechexk">
            <h3>Select your current health insurance plan type. </h3>
            
            <div class="slide-21">
                <div class="row mt-5">
                    <div class="col-md-6">
                        <div class="form-group hover-popover" data-bs-trigger="hover" data-bs-toggle="popover" data-bs-placement="top" data-bs-content="An employer-sponsored health plan where your company pays a premium to the insurance  carrier. These premium rates are fixed for a year and dependent on how many of your employees are  enrolled in the plan each month." rel="popover">
                            <input type="radio" class='radio_next' id="Fully-1" value="Fully-Funded"
                                name="health_plan"
                                {{session()->get('health_plan') == 'Fully-Funded' ? 'checked' : ''}}>
                            <label for="Fully-1">
                                Fully-Funded
                            </label>
                        </div>
                        <div class="form-group hover-popover" data-bs-trigger="hover" data-bs-toggle="popover" data-bs-placement="top" data-bs-content="A type of self-insurance that includes monthly cash flow stabilization. That means you pay for  the health insurance you use (like all self-insurance plans) but with a cap on costs.">
                            <input type="radio" class='radio_next' id="Fully-2" value="Level-Funded"
                                name="health_plan"
                                {{session()->get('health_plan') == 'Level-Funded' ? 'checked' : ''}}>
                            <label for="Fully-2">
                                Level-Funded
                            </label>

                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group hover-popover" data-bs-trigger="hover" data-bs-toggle="popover" data-bs-placement="top" data-bs-content="A plan in which an employer takes on most or all of the cost of benefit claims. The insurance  company manages the payments, but the employer is the one who pays the claims.">
                            <input type="radio" class='radio_next' id="Self-1" value="Self-Insured"
                                name="health_plan" {{session()->get('health_plan') == 'Self-Insured' ? 'checked' : ''}} />
                            <label for="Self-1">
                                Self-Insured
                            </label>
                        </div>
                        <div class="form-group hover-popover" data-bs-trigger="hover" data-bs-toggle="popover" data-bs-placement="top" data-bs-content="A plan where employers purchase health care services directly from a facility, group of  physicians, and/or integrated health care system on behalf of their covered population.">
                            <input type="radio" class='radio_next' id="Self-2" value="Directly Contracted"
                                name="health_plan"
                                {{session()->get('health_plan') == 'Directly Contracted' ? 'checked' : ''}}>
                            <label for="Self-2">
                                Directly Contracted

                            </label>

                        </div>
                    </div>
                </div>
                <div class="form__field form__field_select_choose">
                    <input type="hidden" id="option_value"
                        value="{{session()->get('health_plan')}}" data-validation="custom required"
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
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
<script>
setTimeout(
    function() {
        let progress = $('#dynamic').attr('progress-to');
        $("#dynamic")
            .css("width", progress + "%")
            .attr("aria-valuenow", progress)
            .text(progress + "%");
    }, 800);

    var popoverTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="popover"]'))
    var popoverList = popoverTriggerList.map(function (popoverTriggerEl) {
    return new bootstrap.Popover(popoverTriggerEl)
    })
</script>