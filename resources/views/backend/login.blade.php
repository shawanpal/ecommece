<!DOCTYPE html>
<html lang="en">
    <head>

        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Multikart admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
        <meta name="keywords" content="admin template, Multikart admin template, dashboard template, flat admin template, responsive admin template, web app">
        <meta name="author" content="pixelstrap">
        <link rel="icon" href="../assets/images/dashboard/favicon.png" type="image/x-icon">
        <link rel="shortcut icon" href="../assets/images/dashboard/favicon.png" type="image/x-icon">
        <title>Multikart - Premium Admin Template</title>

        <!-- Google font-->
        <link href="https://fonts.googleapis.com/css?family=Work+Sans:100,200,300,400,500,600,700,800,900" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
        <!-- Font Awesome-->
        <link rel="stylesheet" type="text/css" href="{{ url('public/assets/css/fontawesome.css') }}">
        <!-- Flag icon-->
        <link rel="stylesheet" type="text/css" href="{{ url('public/assets/css/themify.css') }}">
        <!-- Bootstrap css-->
        <link rel="stylesheet" type="text/css" href="{{ url('public/assets/css/bootstrap.css') }}">
        <!-- App css-->
        <link rel="stylesheet" type="text/css" href="{{ url('public/assets/css/admin.css') }}">

    </head>
    <body>
        <!-- page-wrapper Start-->
        <div class="page-wrapper">
            <div class="authentication-box">
                <div class="container">
                    <div class="row">
                        <div class="col-md-7 p-0 card-center">
                            <div class="card tab2-card">
                                <div class="card-body">
                                    <ul class="nav nav-tabs nav-material" id="top-tab" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" id="top-profile-tab" data-toggle="tab" href="#top-profile" role="tab" aria-controls="top-profile" aria-selected="true"><span class="icon-user mr-2"></span>Login</a>
                                        </li>
                                    </ul>
                                    <div class="tab-content" id="top-tabContent">
                                        <div class="tab-pane fade show active" id="top-profile" role="tabpanel" aria-labelledby="top-profile-tab">
                                            @if (session('error'))
                                            <div class="alert alert-danger alert-no-border-radious">
                                                {{ session('error') }}
                                            </div>
                                            @endif 
                                            <form class="form-horizontal auth-form" id="admin-auth-form" method="post" action="{{ url('/site-admin/admin-login') }}">
                                                <div class="form-group">
                                                    <input name="email" type="email" class="form-control" placeholder="Email Address" value="{{ old('email') }}" autocomplete="off" >
                                                    @if($errors->has('email'))
                                                    <label class="error">{{ $errors->first('email') }}</label>
                                                    @endif
                                                </div>
                                                <div class="form-group">
                                                    <input name="password" type="password" class="form-control" placeholder="Password">
                                                </div>
                                                <div class="form-terms">
                                                    <div class="custom-control custom-checkbox mr-sm-2">
                                                        <input type="checkbox" name="remember_me" class="custom-control-input" id="customControlAutosizing" value="1">
                                                        <label class="custom-control-label" for="customControlAutosizing">Remember me</label>
                                                    </div>
                                                </div>
                                                <div class="form-button text-center">
                                                    @csrf
                                                    <input class="btn btn-primary" type="submit" value="Login">
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- latest jquery-->
        <script src="{{ url('public/assets/js/jquery-3.3.1.min.js') }}"></script>
        <!-- Bootstrap js-->
        <script src="{{ url('public/assets/js/popper.min.js') }}"></script>
        <script src="{{ url('public/assets/js/bootstrap.js') }}"></script>
        <!-- Jquery validate js-->
        <script src="{{ url('public/assets/js/jquery.validate.min.js') }}"></script>
        <!--script admin-->
        <script src="{{ url('public/assets/js/admin-script.js') }}"></script>

    </body>
</html>
