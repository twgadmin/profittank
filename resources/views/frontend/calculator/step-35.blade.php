@include('frontend.calculator.common_profit')
<section class="tertinefive revenue_slides row align-items-center">
    <div class="col-12 col-lg-8 mx-auto">
        <div class="hedingthr">
            <h3 class="text-center  mb-5">What percent of your total small parcel shipments </br> are residential delivery?
            </h3>
            <div class="government m-auto">
                <div class="form-group">
                    <div class="form__field">
                        <input
                            type="text"
                            autocomplete="off"
                            class="form-control numberWithPercentage"
                            name="residential"
                            id="exampleInputEmail1"
                            aria-describedby="emailHelp"
                            placeholder="% residential"
                            value="{{session()->get('residential')}}"
                            data-message='Please enter a whole number between "0" and "100".'
                            data-validation="custom required length"
                            data-validation-length="0-100"
                            maxlength="3"
                        />
                        <span class="numberWithPercentage_sign">%</span>
                        <span class="next-slide-button {{session()->get('residential') == 'Yes' ? 'checked' : ''}}" id="revenueNext">
                            <img src="{!! asset('/assets/images/front/left1.png') !!}">
                        </span>
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
        },
    800);
    function addRemoveDollarSign() {
        if(percentInput.value.length > 0) {
            var charWidth = percentInput.value.length;
            var newCharWidth = (charWidth * 5) + 15;
            percentInputSign.classList.add('active');
            percentInputSign.style.setProperty('right', 'calc(50% - '+ newCharWidth +'px)');
        }
        else {
            percentInputSign.classList.remove('active');
        }
    }
    var percentInputSign = document.querySelector('.numberWithPercentage_sign');
    var percentInput = document.querySelector('.numberWithPercentage');
    percentInput.addEventListener('keyup', addRemoveDollarSign)
    $(document).ready(addRemoveDollarSign)
</script>