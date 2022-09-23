@extends('frontend.layouts.website.master')
@section('page-title', 'Process Complete')
<!-- page content  -->
@section('content')

      <section class="processSec pad-50"> 
          <div class="container">
              <div class="row justify-content-center">
                  <div class="col-md-5">
                      <div class="processBox">
                          <a href="/"><img src="{!! asset('assets/frontend/website/assets/images/icons/close.svg') !!}" alt=""></a>
                          <div class="processContent">
                              <h3>Process Complete</h3>
                              <p>Now you can sit back and simple mobitor your revenue earned as your clients complete each channel</p>
                              <a href="/" class="btn-theme">Retun to Dashboard</a>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </section>

      @section('js')

@endsection

@endsection <!-- // page content end here -->