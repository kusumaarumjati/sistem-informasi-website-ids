<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset ('assets')}}/plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="{{asset ('assets')}}/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset ('assets')}}/dist/css/adminlte.min.css">
</head>
<body class="hold-transition login-page">
    <div class="login-box">
        <div class="card">
    <div class="card-body login-card-body">
    <div class="login-form">
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="text-center">
                <a href="" aria-label="Space">
                   <!--  <img class="mb-3 logo-image" src="{{URL::to('assets/images/logo_log.png')}}" alt="Logo" width="60" height="60"> -->
                </a>
            </div>
            <div class="text-center mb-4">
                <h1 class="h3 mb-0">Please sign in</h1>
                <p>Signin to manage your account.</p>
            </div>
            @if(session()->has('error'))
                <div class="alert alert-danger">
                    {{ session()->get('error') }}
                </div>
            @endif
    
            
            <div class="js-form-message mb-3">
                <div class="js-focus-state input-group form">
                <div class="input-group-prepend form__prepend">
                    <span class="input-group-text form__text">
                    <i class="fa fa-envelope form__text-inner"></i>
                    </span>
                </div>
                <input type="email" class="form-control form__input @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}"  placeholder="Email" autocomplete="email">
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                </div>
            </div>
        <div class="form-group">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">
                            <i class="fa fa-lock"></i>
                        </span>
                    </div>
                    <input type="password" class="form-control @error('password') is-invalid @enderror" name="password"  placeholder="Password" autocomplete="new-password">
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-6">
                  <!-- Checkbox -->
                  <div class="custom-control custom-checkbox d-flex align-items-center text-muted">
                    <input class="custom-control-input"type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                    <label class="custom-control-label" for="remember">
                      Remember Me
                    </label>
                  </div>
                  <!-- End Checkbox -->
                </div>
            </div>
         
            <div class="form-group mb-3">
                <button type="submit" class="btn btn-primary login-btn btn-block">Signup</button>
            </div>
            <div class="text-center mb-3">
                <p class="text-muted">Have an account? <a href="{{route('register')}}">Signin</a></p>
            </div><center>
                 <div class="or-seperator"><i>OR</i></div>
            </center>
            <div class="row mx-gutters-2 mb-4">
                <div class="col-sm-12">
                    <a href="{{ route('login.google') }}">
                        <button type="button" class="btn btn-danger btn-block btn-google">
                            <!-- <i class="fa fa-google mr-2"></i> -->Google
                        </button>
                    </a>
                </div>
            </div>
            <p class="small text-center text-muted mb-0"></p>
        </form>
    </div>
</div>
</div>
</div>
<!-- jQuery -->
<script src="{{asset ('assets')}}/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="{{asset ('assets')}}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="{{asset ('assets')}}/dist/js/adminlte.min.js"></script>
</body>
</html>