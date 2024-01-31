<!DOCTYPE html>
<html lang="en">

  <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Login Admin</title>
      
      
      
      <link rel="shortcut icon" href="{{asset('asset/admin/compiled/svg/favicon.svg')}}" type="image/x-icon">
      <link rel="stylesheet" href="{{asset('asset/admin/compiled/css/app.css')}}">
      <link rel="stylesheet" href="{{asset('asset/admin/compiled/css/app-dark.css')}}">
      <link rel="stylesheet" href="{{asset('asset/admin/compiled/css/auth.css')}}">
  </head>

  <body>
      <script src="{{asset('asset/admin/static/js/initTheme.js')}}"></script>

      <div id="auth">
          
        <div class="row h-100">
            <div class="col-lg-5 col-12">
                <div id="auth-left">
                    <div class="auth-logo">
                        <a href="index.html"><h1>INI LOGO UKK</h1></a>
                    </div>
                    <h1 class="auth-title">Log in admin.</h1>
                    <p class="auth-subtitle mb-3">Log in with your data that you entered during registration.</p>

                    <form action="{{route('login.proses.admin')}}" method="post">
                      @csrf
                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="text" name="username" class="form-control form-control-xl" placeholder="Username">
                            <div class="form-control-icon">
                                <i class="bi bi-person"></i>
                            </div>
                        </div>
                        <div class="form-group position-relative has-icon-left">
                            <input type="password" name="password" class="form-control form-control-xl" placeholder="Password">
                            <div class="form-control-icon">
                                <i class="bi bi-shield-lock"></i>
                            </div>
                        </div>
                        <button class="btn btn-primary btn-block btn-lg shadow-lg mt-2">Log in</button>
                    </form>
                </div>
            </div>
            <div class="col-lg-7 d-none d-lg-block">
              <div id="auth-right">

              </div>
            </div>
        </div>
      </div>
  </body>

</html>