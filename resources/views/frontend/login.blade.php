@extends('frontend.layout')

@section('content')
<!-- breadcrumb start -->
<div class="breadcrumb-section">
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <div class="page-title">
                    <h2>customer's login</h2>
                </div>
            </div>
            <div class="col-sm-6">
                <nav aria-label="breadcrumb" class="theme-breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                        <li class="breadcrumb-item active">login</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
<!-- breadcrumb End -->

<!-- section start -->
<section class="login-page section-b-space">
    <div class="container">
        @if (session('success'))
        <div class="alert alert-success alert-no-border-radious">
            {{ session('success') }}
        </div>
        @endif 
        @if (session('error'))
        <div class="alert alert-danger alert-no-border-radious">
            {{ session('error') }}
        </div>
        @endif 
        <div class="row">
            <div class="col-lg-6">
                <h3>Login</h3>
                <div class="theme-card">
                    <form class="theme-form" method="post" action="{{ url('do-login') }}" id="userLogin">
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" placeholder="Email" name="email" autocomplete="off" value="{{ old('email') }}">
                            @if($errors->has('email'))
                            <label class="error">{{ $errors->first('email') }}</label>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="review">Password</label>
                            <input type="password" class="form-control" id="password" placeholder="Enter your password" name="password">
                        </div>
                        @csrf
                        <input type="submit" name="submit" value="Login" class="btn btn-solid">
                    </form>
                </div>
            </div>
            <div class="col-lg-6 right-login">
                <h3>New Customer</h3>
                <div class="theme-card authentication-right">
                    <h6 class="title-font">Create A Account</h6>
                    <p>Sign up for a free account at our store. Registration is quick and easy. It allows you to be
                        able to order from our shop. To start shopping click register.</p><a href="{{ url('register') }}" class="btn btn-solid">Create an Account</a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Section ends -->
@endsection