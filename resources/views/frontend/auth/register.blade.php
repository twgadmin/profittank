@extends('frontend.layouts.frontend')
@section('page-title', 'template page')


<!-- page content  -->
@section('page')
        <section class="register-sec">
            <div class="formBox">
            <?php /* <img class="login-logo" src="{!! asset('assets/frontend/logo-new.png') !!}" alt="Profit Tank">*/ ?>
                <div class="tagline-area">
                    <span></span>
                    <h3 class="tagline">Never leave money on the table...</h3>
                    <span></span>
                </div>

                <ul class="login-signup-links">
                    <li><a href="{{ url('login') }}">Login</a></li>
                    <li><a href="{{ url('register') }}">Signup</a></li>
                </ul>
            
                 <form method="POST" action="{!! route('register') !!}" class="form-horizontal" role="form" enctype="multipart/form-data">
                @csrf
                @method('POST')
                    <div class="fld-input">
                        <select name="user_type">
                            <option value="Registration Type" disabled selected>Registration Type</option>
                            @foreach (getUserType() as $id => $text)
                                <option value="{!! $id !!}">{!! $text !!}</option>
                            @endforeach
                        </select>
                         @error('email')
                         <span class="error text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="fld-input">
                        <input type="text" name="company_name" value="{!! old('company_name') !!}"  placeholder="Company Name">
                      @error('company_name')
                    <span class="error text-danger">{{ $message }}</span>
                     @enderror
                    </div>
                   
                    <div class="fld-input border-0 d-flex">
                        <div class="fld-input fld-half mr-3">
                            <input type="text" name="first_name"  placeholder="First Name" value="{!! old('first_name') !!}">
                             @error('first_name')
                            <span class="error text-danger">{{ $message }}</span>
                             @enderror
                        </div>
                        <div class="fld-input fld-half">
                            <input type="text" name="last_name"  placeholder="Last Name" value="{!! old('last_name') !!}">
                            @error('last_name')
                            <span class="error text-danger">{{ $message }}</span>
                           @enderror
                        </div>
                    </div>
                    <div class="fld-input">
                        <input type="email" name="email"  placeholder="Company Email" value="{!! old('email') !!}">
                         @error('email')
                         <span class="error text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="fld-input border-0 d-flex">
                        <div class="fld-input fld-half mr-3">
                         <input type="number" name="phone_num"  placeholder="Company Phone" value="{!! old('phone_num') !!}">
                          @error('phone_num')
                            <span class="error text-danger">{{ $message }}</span>
                          @enderror
                        </div>
                        <div class="fld-input fld-half">
                          <input type="number" name="mobile_num"  placeholder="Mobile Phone" value="{!! old('mobile_num') !!}">
                            @error('mobile_num')
                             <span class="error text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="fld-input border-0 d-flex">
                        <div class="fld-input fld-half mr-3">
                            <input type="password" name="password"  placeholder="Password">
                             @error('password')
                                <span class="error text-danger">{{ $message }}</span>
                             @enderror
                        </div>
                         
                        <div class="fld-input fld-half">
                            <input type="password" name="password_confirmation"  placeholder="Confirm Password">
                            @error('password_confirmation')
                          <span class="error text-danger">{{ $message }}</span>
                          @enderror
                        </div>
                          
                    </div>

                    <div class="fld-accept">
                        <label>
                            <input type="checkbox" name="termsofservices" value="1">
                            <span>Please confirm that you agree to our <a href="#">Terms of Services</a> and <a href="#">Privacy Policy</a></span>
                        </label>
                          @error('termsofservices')
                          <span class="error text-danger">{{ $message }}</span>
                          @enderror
                    </div>

                    <div class="fld-btn">
                        <input type="submit" value="Register">
                    </div>
                </form>
            </div>
        </section>
        @endsection <!-- // page content end here -->