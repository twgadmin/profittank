
<div class="container">
    <div class="login-wrapper">
        <a class="login-logo" href="{!! route('login') !!}">
            <?php /* <img src="{!! asset('assets/frontend/images/logo.png') !!}" alt="Logo" class="img-fluid">*/ ?>
        </a>

        <div class="login-form-wrapper">
        @if (Session::get('status'))
            <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
                {!! Session::get('status') !!}
            </div>
        @endif
        <h4>Forgot Password</h4>
        <!-- Form Starts -->
        <form method="POST" action="{!! route('password.email') !!}" class="form-horizontal" role="form">
            @csrf
            @method('POST')
            <div id="contact_form">
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="form-label" for="name">Email *</label>
                                <input type="text" name="email" value="{!! old('email') !!}" class="form-control" id="name" aria-describedby="email" required>
                            </div>
                        </div>
                        @if($errors->any())
                            <span class="error text-danger">{{ implode('', $errors->all(':message')) }}</span>
                        @endif
                    </div>
                    <button type="submit" class="btn btn-black btn-login">Reset</button>

                    <h3 class="heading-with-separator"><span> OR </span></h3>
                    
                    <div class="text-center"><a href="{!! route('login') !!}" class="cancle-btn">Back to Login</a></div>
                </div>
                <!-- /form-group-->
                <!-- Contact results -->
                <div id="contact_results"></div>
            </div>
        </form>
        </div>
    </div>
</div>         
                
