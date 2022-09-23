@extends('frontend.layouts.app')
@section('content')
<div class="firstscreen">
    <div class="container">
        <div id="revenue_main_wrapper">
            <div class="banner">
                <form action="" method="POST" id="revenue_form" onsubmit="return false;">
                    @csrf
                    <section class="before-result" style="display:none;">
                        <div class="before-result-sec">
                            <div class="before-result-title-1">You have completed your assessment.</div>
                            <div class="before-result-title-2">Calculating...</div>
                            <div class="col-8 mx-auto pt-5 shape-circle-list">
                                <div class="shape-circle-gradient">
                                    <div class="shape-circle-gradient-sub"></div>
                                </div>
                                <div class="shape-circle-gradient">
                                    <div class="shape-circle-gradient-sub"></div>
                                </div>
                                <div class="shape-circle-gradient">
                                    <div class="shape-circle-gradient-sub"></div>
                                </div>
                                <div class="shape-circle-gradient">
                                    <div class="shape-circle-gradient-sub"></div>
                                </div>
                                <div class="shape-circle-gradient">
                                    <div class="shape-circle-gradient-sub"></div>
                                </div>
                                <div class="shape-circle-gradient">
                                    <div class="shape-circle-gradient-sub"></div>
                                </div>
                            </div>
                        </div>
                        <div class="absoluteed">
                            <div class="col-12 col-lg-8 mx-auto">
                                <div class="row ">
                                    <div class="col-3">
                                        <div class="preve-class">
                                            <div class="button" id="revenuePrev"> Back</div>
                                        </div>
                                    </div>
                                    <div class="col-6 mx-auto">
                                        <div class="p-progress-bar">
                                            <div class="p-progress-bar-dot" style="left: 100%;"></div>
                                            <div class="p-progress-bar-text" style="left: 100%;">
                                                100%</div>
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <!-- <div class="next-class">
                                            <div class="button" id="revenueNext">Next</div>
                                        </div> -->
                                    </div>
                                </div>

                            </div>
                        </div>
                    </section>
                    <div id="businessSteps">
                        @include('frontend.calculator.step-1')
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection