@include('frontend.calculator.common_profit')
<section class="nine revenue_slides row align-items-center">
<div class="col-12 col-lg-8 mx-auto">
    <div class="threechexk">
        <h3 class="mb-4">The Research & Development (R&D) tax credit may be claimed by tax paying <br/> businesses that develop, design, or improve products, formulas, or software. <br/> Let’s see if you might qualify. Does your company do any of the following:</h3>
        <ul class="heading-list">
            <li>Develops or designs new products or processes</li>
            <li>Enhances existing products of processes</li>
            <li>Improves upon existing prototypes and software</li>
        </ul>
        <div class="custom-choose mb-5 mt-5">
            <input type="radio" class='radio_next' id="gpt-1" name="payment_US" value="Yes"
                {{session()->get('payment_US') == 'Yes' ? 'checked' : ''}}>
            <label for="gpt-1">
                Yes
            </label>
            <input type="radio" class='radio_next' id="gpt-2" name="payment_US" value="No"
                {{session()->get('payment_US') == 'No' ? 'checked' : ''}}>
            <label for="gpt-2">
                No
            </label>
            <!-- <input type="radio" class='radio_next' id="gpt-3" name="payment_US" value="Unknown"
                {{session()->get('payment_US') == 'Unknown' ? 'checked' : ''}}>
            <label for="gpt-3">
                Unknown
            </label> -->
        </div>
        <div class="form__field form__field_select_choose">
            <input type="hidden" id="option_value"
                value="{{session()->get('payment_US')}}" data-validation="custom required"
                data-message="Please select one." />
            <input type="hidden" name="page_id" value="10">
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
