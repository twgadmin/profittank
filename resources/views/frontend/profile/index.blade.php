@extends('frontend.layouts.website.master')
@section('page-title', 'My Profile')
<!-- page content  -->
@section('content')
        <section class="profilePage pad-50">
            <div class="container">
                @include('frontend/partials/errors')
                <form id="configform" method="POST" action="{!! route('profile-update') !!}" enctype="multipart/form-data">  
                  @csrf
                  @method('POST')
                    <div class="row mb-3 pb-3 border-bottom align-items-center">
                        <div class="col-md-6">
                            <h2>My Profile</h2>
                        </div>
                        <div class="col-md-6 text-right">
                            <div class="btn-grp">
                                <button type="button" id="configreset">Cancel</button>
                                <button type="submit">Save</button>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <div class="profileBox">
                                <label for="profileImg">
                                    <input type="file" name="image" id="profileImg" accept="image/*">
                                    <input type="hidden" name="previous_image" value="{!! $users->image !!}" class="form-control" />
                                    <figure>
                                        <img src="{!! isset($users->image) && file_exists(uploadsDir('users') . $users->image)  ? asset(uploadsDir('users').$users->image)  : ''  !!} "  alt="" id="blah" >    
                                    </figure>
                                    <span>Upload Profile</span>
                                </label>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="form-row">
                                <div class="form-group  col-md-6">
                                <input name="company_name" type="text" value="{!! $users->company_name !!}" class="form-control border" placeholder="Company Name">
                                </div>
                                <div class="col-md-6">
                                    <div class="form-row">
                                        <div class="form-group  col-md-6">
                                            <input name="first_name" type="text" value="{!! $users->first_name !!}" class="form-control border" placeholder="First Name">
                                        </div>
                                        <div class="form-group  col-md-6">
                                            <input name="last_name" type="text" value="{!! $users->last_name !!}" class="form-control border" placeholder="Last Name">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group  col-md-6">
                                <input name="email" type="email" value="{!! $users->email !!}" class="form-control border" placeholder="Work Email Address" readonly>
                                </div> 
                                <div class="form-group  col-md-6">
                                <input name="phone_num" type="number" value="{!! $users->phone_num !!}" class="form-control border" placeholder="Office Phone Number">
                                </div>
                            </div>
                            <div class="form-group ">
                                <input name="address_1" type="text" value="{!! $users->address_1 !!}" class="form-control border" placeholder="Address Line 1">
                            </div>
                            <div class="form-group ">
                                <input name="address_2" type="text" value="{!! $users->address_2 !!}" class="form-control border"  placeholder="Address Line 2">
                            </div>
                            <div class="form-row">
                                <div class="form-group  col-md-6">
                                    <input name="city" type="text" value="{!! $users->city !!}" class="form-control border" placeholder="City">
                                </div>
                                <div class="form-group  col-md-4">
                                <select name="state" class="form-control border">
                                    <option selected disabled value="">Choose State</option>
                                     @foreach ($states as $key => $state)
                                    <option value="{!! $state->short_code !!}" {!! ($users->state == $state->short_code) ? 'selected' : '' !!}>{!! $state->name !!}</option>
                                    @endforeach
                                </select>
                                </div>
                                <div class="form-group  col-md-2">
                                    <input name="zip_code" type="text" value="{!! $users->zip_code !!}" class="form-control border" placeholder="Zip Code">
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group  col-md-6">
                                    <input name="current_password" type="password" class="form-control border" placeholder="Current Password">
                                </div>
                                <div class="form-group  col-md-6">
                                    <input name="password" type="password" class="form-control border" placeholder="New Password">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group  col-md-12">
                                    <textarea name="summary" placeholder="Summary" class="form-control border" cols="30" rows="3">{!! $users->summary !!}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </section>
        
        @section('js')

        @endsection

@endsection <!-- // page content end here -->