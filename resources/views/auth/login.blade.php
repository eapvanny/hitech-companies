
<!DOCTYPE html>
<html lang="KH">
  <head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Login | Hi-Tech</title>

    <meta content="width=device-width, initial-scale=1.0, shrink-to-fit=no" name="viewport" />
    {{-- <meta name="csrf-token" content="{{ csrf_token() }}"> --}}
    <link rel="icon" href="{{ asset('backends/assets/img/logo/hitech-icon.png') }}" type="image/x-icon" />
    <script src="{{ asset('backends/assets/js/plugin/webfont/webfont.min.js') }}"></script>


    <!-- Fonts and icons -->
    <script src="{{ asset('backends/assets/js/plugin/webfont/webfont.min.js') }}"></script>
    <script>
      WebFont.load({
        google: { families: ["Public Sans:300,400,500,600,700"] },
        custom: {
          families: [
            "Font Awesome 5 Solid",
            "Font Awesome 5 Regular",
            "Font Awesome 5 Brands",
            "simple-line-icons",
          ],
          urls: ["../assets/css/fonts.min.css"],
        },
        active: function () {
          sessionStorage.fonts = true;
        },
      });
    </script>

    <!-- CSS Files -->
    <link rel="stylesheet" href="{{ asset('backends/assets/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('backends/assets/css/plugins.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('backends/assets/css/kaiadmin.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('backends/assets/css/fonts.min.css')}}">

    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link rel="stylesheet" href="{{ asset('backends/assets/css/demo.css') }}" />
    <link rel="stylesheet" href="{{ asset('backends/assets/ui-css/semantic.css') }}" />
    <link rel="stylesheet" href="{{ asset('backends/assets/js/sweetalert/sweetalert2.min.css') }}">

    {{-- text editor  --}}
    {{-- <link rel="stylesheet" href="{{ asset('backends/assets/css/ckeditor/ckeditor5.css') }}"> --}}
    <link rel="stylesheet" href="{{ asset('backends/assets/text-editor/summernote.min.css')}}">
    <link rel="stylesheet" href="{{ asset('backends/assets/text-editor/summernote-lite.min.css')}}">

    {{-- @yield('title') --}}
    <link rel="stylesheet" href="{{ asset('backends/assets/css/my-css/my-css.css')}}" />

    {{-- @yield('css') --}}
    <style>
        body{
            background: #f7f7f7;
        }
        #bg-login{
            width: 100%;
            height: 100%;
            position: fixed;
            background-image: url("{{ asset('uploads/images/logins/Hi-Tech-AE-Prepare-Same-Res-but-15MB.gif') }}");
            background-position: 0;
            background-size: 62%;
            background-repeat: repeat-x;
            top: 0;
            left: 0;
            display: flex;
            align-items: center;
            justify-content: center;  
            /* padding: 50px; */
        }
        #bg-login .bg-cover{
            background: #4d4c4c27;
            width: 100%;
            height:100%;
            position: absolute;
            top: 0;
            left: 0;
            
        }
        #bg-login .bg-form{
          /* position: absolute; */
          /* top: 50%;
          left: 50%; */
          /* transform: translate(-50%, -50%); */
          background: rgb(255, 255, 255);
          padding: 40px 25px;
          box-shadow: 1px 2px 5px gray;
        }
        .img{
          width: 80% !important;
          /* height: 80px; */
          /* background: red; */
        }
        .img img{
          width: 100%;
          height: 100%;
        }
    </style>
  </head>

  <body>
        <div id="bg-login">
            <div class="bg-cover">
              {{-- <form action="" class="ui form bg-form">
                <label for="username" class="fw-bold">Username</label>
                <div class="ui left icon input d-block w-100">
                  <input type="text" placeholder="Search users..." class="w-100">
                  <i class="user icon"></i>
                </div>

                <label for="username" class="fw-bold">Username</label>
                <div class="ui left icon input d-block w-100">
                  <input type="text" placeholder="Search users..." class="w-100">
                  <i class="user icon"></i>
                </div>  
              </form> --}}

              
            </div>
            <form class="ui form bg-form col-9 col-md-3" method="post" autocomplete="off" id="login"  action="{{ route('login.save') }}">
              @csrf
              <div class="img mx-auto mb-4">
                {{-- @php
                    $logo = DB::table('company_informations')->select('logo')->get()->first();
                @endphp
                @if ($logo->logo != '')
                  <img src="{{ asset($logo->logo) }}" alt="logo">
                @else
                  
                @endif --}}
                <img src="{{ asset('uploads/images/logos/tK3sf8NmyaDEKcEsidTMLUzBftNQerANNR55XECW.png') }}" alt="logo">
              </div>
                @if (session('invalid'))
                  <div class="ui negative message">
                    <i class="close icon"></i>
                    <div class="header">
                      Note!
                    </div>
                    <p>Invalid username or password.</p>
                  </div>
                @endif

              <div class="ui error message"></div>

              <div class="field">
                <label for="username">Username</label>
                <div class="ui left icon input d-block w-100">
                  <input type="text" placeholder="Username..." name="email" id="username" class="w-100" value="{{ old('email') }}">
                  <i class="user icon"></i>
                </div>
                {{-- <div id="emailHelp" class="form-text">share your email with anyone else.</div> --}}
              </div>

              <div class="field">
                <label for="password">Password</label>
                <div class="ui left icon input d-block w-100">
                  <input type="password" placeholder="Password..." name="password" id="password" class="w-100">
                  <i class="key icon"></i>
                </div>
                {{-- <input name="password" id="password" type="text" placeholder="Password.."> --}}
              </div>


              {{-- <div class="form-check">
                <input type="checkbox" class="form-check-input" id="passwordCheck">
                <label class="form-check-label" for="passwordCheck">Show password.</label>
              </div> --}}


              <div class="inline field">
                <div class="ui checkbox">
                  <input type="checkbox" id="passwordCheck">
                  <label for="passwordCheck">Show password</label>
                </div>
              </div>



              {{-- <button type="submit" class="btn btn-primary w-100">Login</button> --}}
              <button class="ui linkedin button w-100 mt-4">
                <i class="sign in alternate icon"></i>
                Login
              </button>
            </form>

        </div>
    

    {{-- SCRIPT  --}}
        <!--   Core JS Files   -->
        <script src="{{ asset('backends/assets/js/core/jquery-3.7.1.min.js') }}"></script>
        <script src="{{ asset('backends/assets/js/core/popper.min.js') }}"></script>
        <script src="{{ asset('backends/assets/js/core/bootstrap.min.js') }}"></script>

        <!-- jQuery Scrollbar -->
        <script src="{{ asset('backends/assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js') }}"></script>
        <!-- Datatables -->
        <script src="{{ asset('backends/assets/js/plugin/datatables/datatables.min.js') }}"></script>
        <!-- Kaiadmin JS -->
        <script src="{{ asset('backends/assets/js/kaiadmin.min.js') }}"></script>
        <!-- Kaiadmin DEMO methods, don't include it in your project! -->
        <script src="{{ asset('backends/assets/js/setting-demo2.js') }}"></script>

        <!-- Chart JS -->
        <script src="{{ asset('backends/assets/js/plugin/chart.js/chart.min.js') }}"></script>

        <!-- jQuery Sparkline -->
        <script src="{{ asset('backends/assets/js/plugin/jquery.sparkline/jquery.sparkline.min.js') }}"></script>

        <!-- Chart Circle -->
        <script src="{{ asset('backends/assets/js/plugin/chart-circle/circles.min.js') }}"></script>


        <!-- Bootstrap Notify -->
        <script src="{{ asset('backends/assets/js/plugin/bootstrap-notify/bootstrap-notify.min.js') }}"></script>

        <!-- jQuery Vector Maps -->
        <script src="{{ asset('backends/assets/js/plugin/jsvectormap/jsvectormap.min.js') }}"></script>
        <script src="{{ asset('backends/assets/js/plugin/jsvectormap/world.js') }}"></script>

        <!-- Sweet Alert -->
        <script src="{{ asset('backends/assets/js/plugin/sweetalert/sweetalert.min.js') }}"></script>

        <!-- Kaiadmin JS -->
        <script src="{{ asset('backends/assets/js/kaiadmin.min.js') }}"></script>

        <!-- Kaiadmin DEMO methods, don't include it in your project! -->
        <script src="{{ asset('backends/assets/js/setting-demo.js') }}"></script>
        <script src="{{ asset('backends/assets/js/demo.js') }}"></script>
        <script src="{{ asset('backends/assets/ui-css/semantic.js') }}"></script>
        <script src="{{ asset('backends/assets/js/sweetalert/sweetalert2.all.min.js') }}"></script>

        {{-- text editor --}}
        <script src="{{ asset('backends/assets/text-editor/summernote.min.js')}}"></script>
        <script src="{{ asset('backends/assets/text-editor/summernote-lite.min.js')}}"></script>
        {{-- <script src="{{ asset('backends/assets/css/ckeditor/ckeditor.js') }}"></script> --}}
        <script src="{{ asset('backends/assets/js/my-js/my-js.js') }}"></script>
        <script>
            const togglePassword = document.getElementById('passwordCheck');
            const passwordInput = document.getElementById('password');
            // const eye = document.getElementById('eyeIcon');


            togglePassword.addEventListener('click', function () {
                // Toggle the type attribute
                const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
                passwordInput.setAttribute('type', type);
            });

            $('#login')
            .form({
              fields: {
                username: {
                  identifier: 'username',
                  rules: [
                    {
                      type   : 'empty',
                      prompt : 'Please enter your username'
                    }
                  ]
                },
                password: {
                  identifier: 'password',
                  rules: [
                    {
                      type   : 'empty',
                      prompt : 'Please enter your password'
                    }
                  ]
                },
              }
            });
        </script>
    {{-- SCRIPT  --}}

  </body>
</html>