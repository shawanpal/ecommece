@extends('frontend.layout')

@section('content')
<!-- breadcrumb start -->
<div class="breadcrumb-section">
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <div class="page-title">
                    <h2>create account</h2>
                </div>
            </div>
            <div class="col-sm-6">
                <nav aria-label="breadcrumb" class="theme-breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">create account</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
<!-- breadcrumb End -->

<!-- section start -->
<section class="register-page section-b-space">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h3>create account</h3>
                <div class="theme-card">
                    <form class="theme-form" method="post" action="{{ url('/do-register') }}">
                        <div class="form-row">
                            <div class="col-md-6">
                                <label for="email">First Name</label>
                                <input type="text" class="form-control" id="fname" placeholder="First Name" name="first_name">
                            </div>
                            <div class="col-md-6">
                                <label for="review">Last Name</label>
                                <input type="password" class="form-control" id="lname" placeholder="Last Name" name="lase_name">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-6">
                                <label for="email">email</label>
                                <input type="email" class="form-control" id="email" placeholder="Email" name="email">
                            </div>
                            <div class="col-md-6">
                                <label for="review">Password</label>
                                <input type="password" class="form-control" id="review" placeholder="Enter your password" name="password">
                            </div>
                            @csrf
                            <input type="submit" name="submit" value="Create Account" class="btn btn-solid">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Section ends -->
@endsection