@include('frontend.calculator.common_profit')
<div class="row align-items-center revenue_slides">
    <div class="col-12 mx-auto">
        <div class="m-auto">
            <h2>Describe Your Business</h2>
            <p>Click below, all that apply to your business</p>
        </div>
        <div class="form__field desc_business form__field_select_choose"></div>
        <div class="business-type">
            @foreach (businesses as $key => $left_busines)
            <div class="hoverclass">
                    <div class="hovereffect">
                        <a href="javascript:void(0)" class="wehire">
                            <img src="{!! asset('/assets/images/front/business_'.($key+1)) !!}.png" />
                        </a>
                        @if($business)
                        <div class="overlay {{ in_array('business_'.$key,$business) ? 'active' : '' }}">
                            @else
                            <div class="overlay">
                                @endif
                                <a href="javaScript:void(0);" class="businessList" data-id="business_{{$key}}">{{ $left_busines}}</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <input type="hidden" name="page_id" value="3">
        </div>
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
            <div class="button disabled" id="revenueNext">Next</div>
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
        },
    800);
</script>