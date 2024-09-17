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
    <link rel="stylesheet" href="{{asset('login_design/css/bootstrap.min.css')}}">

    <!-- Style -->
    <link rel="stylesheet" href="{{asset('login_design/css/style.css')}}">

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
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-md-6 order-md-2">
                    <img src="{{url('login_design/images/undraw_file_sync_ot38.svg')}}" alt="Image" class="img-fluid">
                </div>
                <div class="col-md-6 contents">
                    <div class="row justify-content-center">
                        <div class="col-md-8">
                            <div class="mb-4">
                                <h4>Welcome to <strong>{{env('APP_NAME', 'Laravel')}}</strong></h4>
                                {{-- <p class="mb-4">Lorem ipsum dolor sit amet elit. Sapiente sit aut eos consectetur
                                    adipisicing.</p> --}}
                            </div>
                            @include('components.error')
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

                                {{-- <span class="d-block text-left my-4 text-muted"> or sign in with</span>

                                <div class="social-login">
                                    <a href="#" class="facebook">
                                        <span class="icon-facebook mr-3"></span>
                                    </a>
                                    <a href="#" class="twitter">
                                        <span class="icon-twitter mr-3"></span>
                                    </a>
                                    <a href="#" class="google">
                                        <span class="icon-google mr-3"></span>
                                    </a>
                                </div> --}}
                            </form>
                        </div>
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
    <script src="{{url('login_design/js/jquery-3.3.1.min.js')}}"></script>
    <script src="{{url('login_design/js/popper.min.js')}}"></script>
    <script src="{{url('login_design/js/bootstrap.min.js')}}"></script>
    <script src="{{url('login_design/js/main.js')}}"></script>
</body>

</html>