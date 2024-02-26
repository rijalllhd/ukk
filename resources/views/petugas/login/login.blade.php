<!DOCTYPE html>
<html lang="en">

  <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Login Petugas</title>
      
      
      
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

                    @if(Session::get('success'))
                        <div class="alert alert-info alert-dismissible show fade">
                            {{Session::get('success')}}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    @if(Session::get('error'))
                        <div class="alert alert-danger alert-dismissible show fade">
                            {{Session::get('error')}}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    <h1 class="auth-title">Log in petugas.</h1>
                    <form action="{{route('login.proses.petugas')}}" method="post">
                      @csrf
                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="email" name="email" class="form-control form-control-xl" placeholder="email">
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

      <script src="{{asset('asset/admin/static/js/components/dark.js')}}"></script>
      <script src="{{asset('asset/admin/extensions/perfect-scrollbar/perfect-scrollbar.min.js')}}"></script>
      <script src="{{asset('asset/admin/compiled/js/app.js')}}"></script>
  </body>

</html>