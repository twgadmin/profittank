@include('frontend.calculator.common_profit')
<section class="forteen revenue_slides row align-items-center">
    <div class="col-12 mx-auto">
        <div class="threechexk">
        <h3>From the list below, select each state in which your business pays for utilities</h3>
        <div class="form-group">
            <div class="form__field state-multiselect-wrap">
                <select id="state" class="state-multiselect form-select form-select-sm" name="state[]"
                    aria-label=".form-select-sm example" data-validation="custom required"
                    data-message="Please select multiple." multiple="multiple">
                    @foreach (states as $key => $stateName)
                    <option <?php echo ((session()->get('state')!='')&&in_array(trim($stateName),session()->get('state')) ? 'selected' : ''); ?> value="{{ $stateName }}" step-data="{{ question_agianst_states[$stateName] }}">
                        {{ $stateName }}</option>
                    @endforeach
                </select>
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
    $(document).ready(function() {
        $('.state-multiselect').select2({
            placeholder: "Choose your state",
            allowClear: true
        });
    });
</script>
