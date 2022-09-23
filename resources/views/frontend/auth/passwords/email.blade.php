@extends('frontend.layouts.frontend')
@section('page-title', 'Forgot Password')

<!-- page content  -->
@section('page')
<section class="login-sec">
    <div class="formBox">
        <a class="login-logo" href="{!! route('register') !!}">
            <figure>
                <?php /* <img src="{!! asset('assets/frontend/logo.png') !!}" alt="">*/ ?>
            </figure>
        </a>
        <h3>Never leave money on the table</h3>
        @if (Session::get('status'))
          <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
                {!! Session::get('status') !!}
            </div>
        @endif      
    <!-- Form Starts -->
    <form method="POST" action="{!! route('password.email') !!}" class="form-horizontal" role="form">
    @csrf
    @method('POST')
       <h4>Forgot Password</h4>
            <div class="fld-input">
                <input type="email" name="email" value="{!! old('email') !!}" placeholder="Username">
            </div>
            @if($errors->any())
                    <span class="error text-danger">{{ implode('', $errors->all(':message')) }}</span>
                @endif
            <div class="fld-btn">
                <input type="submit" name="" value="Reset">
            </div>
            <br>
            <h3 class="heading-with-separator"><span> OR </span></h3>
            <div class="fld-accept text-center mt-3">
                <label>
                    <span>Don't have an account <a href="{{ url('login') }}">Back to Login</a></span>
                </label>
            </div>

        </form>
    </div>
</section>
@endsection <!-- // page content end here -->