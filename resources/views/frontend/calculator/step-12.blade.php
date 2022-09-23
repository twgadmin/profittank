@include('frontend.calculator.common_profit')
<section class="tuvel revenue_slides row align-items-center">
    <div class="col-12 mx-auto">
        <div class="threechexk slide-12">
            <h3>Select your property type/s </h3>
            <div>
                @php
                    $propertyArray = array();
                    $property = session()->get('prop_type');
                    if(!empty($property)){
                        $propertyArray = explode(',', $property);
                    }
                @endphp
                <div class="row mt-5">
                    @foreach (properties as $key => $propertyName)
                    <div class="col-lg-6 col-sm-12 text-right">
                        <input class="propertyNames" id="apartment-{{$key+1}}" type="checkbox" value="{{$key+1}}"
                            name="property" {{ in_array($key+1, $propertyArray) ? 'checked' : ''}}>
                        <label for="apartment-{{$key+1}}">{{$propertyName}}</label>
                    </div>
                    @endforeach
                </div>
                <div class="form__field form__field_select_choose">
                    <input type="hidden" name="prop_type" id="option_value" value="{{session()->get('prop_type')}}" data-validation="custom required" data-message="select at least one." />
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