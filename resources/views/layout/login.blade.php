<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Log in</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome-free/css/all.min.css') }}">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="{{ asset('assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('assets/dist/css/adminlte.min.css') }}">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <img src="{{ asset('assets/images/favicon/company.png') }}" style="opacity: .7" width="200px">
    <br>
    <a href="#"><b>Admin</b>LTE</a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Sign in to start your session</p>

      <form action="{{ url ('/login') }}" method="post">
        @csrf
        <div class="input-group mb-3">
          <input name="username" type="text" class="form-control @error('username') is-invalid @enderror" placeholder="Username">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user" style="color: #1e3050;"></span>
            </div>
          </div>

          @error('username')
            <span class="error invalid-feedback" role="alert">{{ $message }}</span>
          @enderror
        </div>

        <div class="input-group mb-3">
          <input name="password" type="password" class="form-control @error('password') is-invalid @enderror required" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock" style="color: #1e3050;"></span>
            </div>
          </div>

          @error('password')
              <span class="error invalid-feedback" role="alert">{{ $message }}</span>
          @enderror
        </div>

        <div class="form-group">
          <button class="btn btn-primary btn-block">Login</button>
        </div>
      </form>

        <a href="{{ url('/register') }}" class="text-center">Register a new membership</a>
    </div>
  </div>
</div>

<!-- jQuery -->
<script src="{{ asset('assets/plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('assets/dist/js/adminlte.min.js') }}"></script>
</body>
</html>
