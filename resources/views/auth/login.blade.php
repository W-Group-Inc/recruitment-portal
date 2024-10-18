<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{url('login_design/fonts/icomoon/style.css')}}">

    <link rel="stylesheet" href="{{url('login_design/css/owl.carousel.min.css')}}">

    <!-- Bootstrap CSS -->
    {{-- <link rel="stylesheet" href="{{asset('login_design/css/bootstrap.min.css')}}"> --}}

    <!-- Style -->
    {{-- <link rel="stylesheet" href="{{asset('login_design/css/style.css')}}"> --}}

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('login_design_v2/css/bootstrap.min.css')}}">
    
    <!-- Style -->
    <link rel="stylesheet" href="{{asset('login_design_v2/css/style.css')}}">

    <title>Login</title>
</head>
<style>
    .loader {
        position: fixed;
        left: 0px;
        top: 0px;
        width: 100%;
        height: 100%;
        z-index: 9999;
        background: url("{{ asset('img/3.gif') }}") 50% 50% no-repeat white;
        opacity: .8;
        background-size: 120px 120px;
    }
</style>

<body>
    <div class="loader" id="loader" style="display: none;"></div>
    {{-- <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-md-6 order-md-2">
                    <img src="{{url('login_design/images/undraw_file_sync_ot38.svg')}}" alt="Image" class="img-fluid">
                </div>
                <div class="col-md-6 contents">
                    <div class="row justify-content-center">
                        <div class="col-md-8">
                            <div class="mb-4">
                                <h4>Welcome to <strong>{{env('APP_NAME', 'Wee Recruit')}}</strong></h4>
                            </div>
                            @if($errors->any())
                            <div class="alert alert-danger alert-dismissible bg-danger text-white border-0 fade show">
                                <strong>{{$errors->first()}}</strong>
                            </div>
                            @endif

                            <form action="{{url('login')}}" method="post" onsubmit="show()">
                                @csrf

                                <div class="form-group first">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" name="email" id="email" required>
                                </div>

                                <div class="form-group last mb-4">
                                    <label for="password">Password</label>
                                    <input type="password" class="form-control" name="password" id="password" required>
                                </div>

                                <div class="d-flex mb-5 align-items-center">
                                    <label class="control control--checkbox mb-0"><span class="caption">Remember
                                            me</span>
                                        <input type="checkbox" checked="checked" />
                                        <div class="control__indicator"></div>
                                    </label>
                                    <span class="ml-auto"><a href="#" class="forgot-pass">Forgot Password</a></span>
                                </div>

                                <input type="submit" value="Log In" class="btn text-white btn-block btn-primary">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}

    <div class="d-lg-flex half">
        <div class="bg order-1 order-md-2" style="background-image: url('img/keane.jpg');"></div>
        <div class="contents order-2 order-md-1">

            <div class="container">
                <div class="row align-items-center justify-content-center">
                    <div class="col-md-7">
                        @if($errors->any())
                        <div class="alert alert-danger alert-dismissible bg-danger text-white border-0 fade show">
                            <strong>{{$errors->first()}}</strong>
                        </div>
                        @endif
                        <div class="mb-4">
                            <h3>Welcome to Wee-Recruit</h3>
                            <p class="mb-4">Grow With Us, Connect. Elevate. Disappear.</p>
                        </div>
                        <form action="{{url('login')}}" method="post" onsubmit="show()">
                            @csrf
                            
                            <div class="form-group first">
                                <label for="email">Email</label>
                                <input type="text" class="form-control" id="email" name="email" required>

                            </div>
                            <div class="form-group last mb-3">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" id="password" name="password" required>

                            </div>

                            <div class="d-flex mb-5 align-items-center">
                                <label class="control control--checkbox mb-0"><span class="caption">Remember me</span>
                                    <input type="checkbox" checked="checked" />
                                    <div class="control__indicator"></div>
                                </label>
                                <span class="ml-auto"><a href="#" class="forgot-pass">Forgot Password</a></span>
                            </div>

                            <input type="submit" value="Log In" class="btn btn-block btn-success">

                            {{-- <span class="d-block text-center my-4 text-muted">&mdash; or &mdash;</span>

                            <div class="social-login">
                                <a href="#" class="facebook btn d-flex justify-content-center align-items-center">
                                    <span class="icon-facebook mr-3"></span> Login with Facebook
                                </a>
                                <a href="#" class="twitter btn d-flex justify-content-center align-items-center">
                                    <span class="icon-twitter mr-3"></span> Login with Twitter
                                </a>
                                <a href="#" class="google btn d-flex justify-content-center align-items-center">
                                    <span class="icon-google mr-3"></span> Login with Google
                                </a>
                            </div> --}}
                        </form>
                    </div>
                </div>
            </div>
        </div>


    </div>

    <script>
        function show()
        {
            document.getElementById('loader').style.display = 'block';
        }
    </script>
    <script src="{{asset('login_design_v2/js/jquery-3.3.1.min.js')}}"></script>
    <script src="{{asset('login_design_v2/js/popper.min.js')}}"></script>
    <script src="{{asset('login_design_v2/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('login_design_v2/js/main.js')}}"></script>
    {{-- <script src="{{url('login_design/js/jquery-3.3.1.min.js')}}"></script>
    <script src="{{url('login_design/js/popper.min.js')}}"></script>
    <script src="{{url('login_design/js/bootstrap.min.js')}}"></script>
    <script src="{{url('login_design/js/main.js')}}"></script> --}}
</body>

</html>