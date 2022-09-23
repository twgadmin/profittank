
<div class="container">
    <div class="login-wrapper">
        <a class="login-logo" href="{!! route('login') !!}">
            <?php /* <img src="{!! asset('assets/frontend/images/logo.png') !!}" alt="Logo" class="img-fluid">*/ ?>
        </a>
        <div class="login-form-wrapper">
            <form method="POST" action="{{ route('password.request') }}" class="form-horizontal" role="form">
                @csrf
                @method('POST')
                <input type="hidden" name="token" value="{{ $token }}">
                <div class="form-header">
                    <div class="mv-title-style-13">
                      <div class="text-main">Reset Password</div>
                    </div>
                </div>
                <div class="form-body">
                    <div class="form-group">
                        <label class="form-label" for="name">Email</label>
                        <input type="text" name="email" value="{!! old('email') !!}" class="form-control" id="name" aria-describedby="email" required>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="name">Password</label>
                        <input type="password" name="password" class="form-control" aria-describedby="password" required>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="name">Confirm Password</label>
                        <input type="password" name="password_confirmation" class="form-control" aria-describedby="password" required>
                    </div>
                    <button type="submit" class="btn btn-black btn-login">Reset</button>
                </div>
                <!-- .form-body-->
            </form>
        </div>
    </div>
</div>
