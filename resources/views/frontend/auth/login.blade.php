@extends('frontend.layouts.frontend')
@section('page-title', 'template page')


<!-- page content  -->
@section('page')
        <section class="login-sec">
            <div class="formBox">
                <?php /* <img class="login-logo" src="{!! asset('assets/frontend/logo-new.png') !!}" alt="Profit Tank"> */ ?>
                <div class="tagline-area">
                    <span></span>
                    <h3 class="tagline">Never leave money on the table...</h3>
                    <span></span>
                </div>

                <ul class="login-signup-links">
                    <li><a href="{{ url('login') }}">Login</a></li>
                    <li><a href="{{ url('register') }}">Signup</a></li>
                </ul>
                
                <form method="POST" action="{!! route('login') !!}" class="form-horizontal" role="form">
                    @csrf
                    <div class="fld-input">
                        <input type="email" name="email" required="" placeholder="Username">
                        @error('email')
                            <span class="error text-danger mb-3">{{ $message }}</span>
                        @enderror
                    </div>
                   

                    <div class="fld-input">
                        <input type="password" name="password" required="" placeholder="Password">
                        @error('password')
                        <span class="error text-danger mb-3">{{ $message }}</span>
                        @enderror
                    </div>
                   
                    <div class="fld-btn">
                        <input type="submit" name="" value="Login">
                    </div>

                     <div class="fld-accept text-center">
                        <label>
                            <span><a href="{{ url('password/reset') }}">Forgot Password</a></span>
                        </label>
                    </div>

                    <p class="login-footer">This site is protected by reCAPTCHA and the Google <br> <a href="javascript:void(0);">Privacy Policy</a> and <a href="javascript:void(0);">Terms of Service</a> apply.</p>

                </form>
            </div>
        </section>
        @endsection <!-- // page content end here -->