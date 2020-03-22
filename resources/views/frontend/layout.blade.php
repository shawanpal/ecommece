<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <meta name="description" content="multikart">
        <meta name="keywords" content="multikart">
        <meta name="author" content="multikart">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="icon" href="{{ url('public/assets/images/favicon/'.getSiteData('favicon')) }}" type="image/x-icon">
        <link rel="shortcut icon" href="{{ url('public/assets/images/favicon/'.getSiteData('favicon')) }}" type="image/x-icon">
        <title>{{ getSiteData('title') }} - {{ getSiteData('tagline') }}</title>

        <!--Google font-->
        <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900" rel="stylesheet">
        <!-- Icons -->
        <link rel="stylesheet" type="text/css" href="{{ url('public/assets/css/fontawesome.css') }}">
        <!--Slick slider css-->
        <link rel="stylesheet" type="text/css" href="{{ url('public/assets/css/slick.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ url('public/assets/css/slick-theme.css') }}">
        <!-- Animate icon -->
        <link rel="stylesheet" type="text/css" href="{{ url('public/assets/css/animate.css') }}">
        <!-- Themify icon -->
        <link rel="stylesheet" type="text/css" href="{{ url('public/assets/css/themify-icons.css') }}">
        <!-- Bootstrap css -->
        <link rel="stylesheet" type="text/css" href="{{ url('public/assets/css/bootstrap.css') }}">
        <!-- Theme css -->
        <link rel="stylesheet" type="text/css" href="{{ url('public/assets/css/color1.css') }}" media="screen" id="color">
    </head>

    <body>
        <!-- loader start -->
        <div class="loader_skeleton">
            <div class="top-header">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="header-contact">
                                <ul>
                                    <li>{{ getSiteData('welcome_note') }}</li>
                                    <li><i class="fa fa-phone" aria-hidden="true"></i>Call Us: {{ getSiteData('contct_no') }}</li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-6 text-right">
                            <ul class="header-dropdown">
                                <li class="mobile-wishlist"><a href="{{ url('/wishlist') }}"><i class="fa fa-heart" aria-hidden="true"></i></a>
                                </li>
                                @guest
                                <li class="onhover-dropdown mobile-account"> <i class="fa fa-user" aria-hidden="true"></i> My Account
                                </li>
                                @endguest
                                @auth
                                <li class="onhover-dropdown mobile-account"> <i class="fa fa-user" aria-hidden="true"></i> Welcome, {{ Auth::User()->first_name }}
                                </li>
                                @endauth
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <header>
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="main-menu">
                                <div class="menu-left">
                                    <div class="navbar">
                                        <a href="javascript:void(0)">
                                            <div class="bar-style"><i class="fa fa-bars sidebar-bar" aria-hidden="true"></i>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="brand-logo">
                                        <a href="{{ url('/') }}"><img src="{{ url('public/assets/images/icon/'.getSiteData('logo')) }}" class="img-fluid blur-up lazyload" alt="Logo"></a>
                                    </div>
                                </div>
                                <div class="menu-right pull-right">
                                    <div>
                                        <nav>
                                            <div class="toggle-nav"><i class="fa fa-bars sidebar-bar"></i></div>
                                            <ul class="sm pixelstrap sm-horizontal">
                                                <li>
                                                    <div class="mobile-back text-right">Back<i class="fa fa-angle-right pl-2" aria-hidden="true"></i></div>
                                                </li>
                                                <li>
                                                    <a href="#">Home</a>
                                                </li>
                                                <li>
                                                    <a href="#">shop</a>
                                                </li>
                                                <li>
                                                    <a href="#">product</a>
                                                </li>
                                                <li class="mega"><a href="#">features
                                                        <div class="lable-nav">new</div>
                                                    </a>
                                                </li>
                                                <li><a href="#">pages</a>
                                                </li>
                                                <li>
                                                    <a href="#">blog</a>
                                                </li>
                                            </ul>
                                        </nav>
                                    </div>
                                    <div>
                                        <div class="icon-nav d-none d-sm-block">
                                            <ul>
                                                <li class="onhover-div mobile-search">
                                                    <div><img src="{{ url('public/assets/images/icon/search.png') }}" onclick="openSearch()" class="img-fluid blur-up lazyload" alt=""> <i class="ti-search" onclick="openSearch()"></i></div>
                                                </li>
                                                <li class="onhover-div mobile-cart">
                                                    <div><img src="{{ url('public/assets/images/icon/cart.png') }}" class="img-fluid blur-up lazyload" alt=""> <i class="ti-shopping-cart"></i></div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            <div class="home-slider">
                <div class="home"></div>
            </div>
            <section class="collection-banner">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="ldr-bg">
                                <div class="contain-banner">
                                    <div>
                                        <h4></h4>
                                        <h2></h2>
                                        <h6></h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="ldr-bg">
                                <div class="contain-banner">
                                    <div>
                                        <h4></h4>
                                        <h2></h2>
                                        <h6></h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <div class="container section-b-space">
                <div class="row section-t-space">
                    <div class="col-lg-6 offset-lg-3">
                        <div class="product-para">
                            <p class="first"></p>
                            <p class="second"></p>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="no-slider row">
                            <div class="product-box">
                                <div class="img-wrapper"></div>
                                <div class="product-detail">
                                    <h4></h4>
                                    <h5></h5>
                                    <h5 class="second"></h5>
                                    <h6></h6>
                                </div>
                            </div>
                            <div class="product-box">
                                <div class="img-wrapper"></div>
                                <div class="product-detail">
                                    <h4></h4>
                                    <h5></h5>
                                    <h5 class="second"></h5>
                                    <h6></h6>
                                </div>
                            </div>
                            <div class="product-box">
                                <div class="img-wrapper"></div>
                                <div class="product-detail">
                                    <h4></h4>
                                    <h5></h5>
                                    <h5 class="second"></h5>
                                    <h6></h6>
                                </div>
                            </div>
                            <div class="product-box">
                                <div class="img-wrapper"></div>
                                <div class="product-detail">
                                    <h4></h4>
                                    <h5></h5>
                                    <h5 class="second"></h5>
                                    <h6></h6>
                                </div>
                            </div>
                            <div class="product-box">
                                <div class="img-wrapper"></div>
                                <div class="product-detail">
                                    <h4></h4>
                                    <h5></h5>
                                    <h5 class="second"></h5>
                                    <h6></h6>
                                </div>
                            </div>
                            <div class="product-box">
                                <div class="img-wrapper"></div>
                                <div class="product-detail">
                                    <h4></h4>
                                    <h5></h5>
                                    <h5 class="second"></h5>
                                    <h6></h6>
                                </div>
                            </div>
                            <div class="product-box">
                                <div class="img-wrapper"></div>
                                <div class="product-detail">
                                    <h4></h4>
                                    <h5></h5>
                                    <h5 class="second"></h5>
                                    <h6></h6>
                                </div>
                            </div>
                            <div class="product-box">
                                <div class="img-wrapper"></div>
                                <div class="product-detail">
                                    <h4></h4>
                                    <h5></h5>
                                    <h5 class="second"></h5>
                                    <h6></h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- loader end -->

        <!-- header start -->
        @include('frontend.header')
        <!-- header end -->

        @yield('content')

        <!-- footer -->
        @include('frontend.footer')
        <!-- footer end -->

        <!-- Quick-view modal popup start-->
        <div class="modal fade bd-example-modal-lg theme-modal" id="quick-view" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                <div class="modal-content quick-view-modal">
                    <div class="modal-body">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <div class="row">
                            <div class="col-lg-6 col-xs-12">
                                <div class="quick-view-img"><img src="{{ url('public/assets/images/pro3/1.jpg') }}" alt="" class="img-fluid blur-up lazyload"></div>
                            </div>
                            <div class="col-lg-6 rtl-text">
                                <div class="product-right">
                                    <h2>Women Pink Shirt</h2>
                                    <h3>$32.96</h3>
                                    <ul class="color-variant">
                                        <li class="bg-light0"></li>
                                        <li class="bg-light1"></li>
                                        <li class="bg-light2"></li>
                                    </ul>
                                    <div class="border-product">
                                        <h6 class="product-title">product details</h6>
                                        <p>Sed ut perspiciatis, unde omnis iste natus error sit voluptatem accusantium doloremque laudantium</p>
                                    </div>
                                    <div class="product-description border-product">
                                        <div class="size-box">
                                            <ul>
                                                <li class="active"><a href="#">s</a></li>
                                                <li><a href="#">m</a></li>
                                                <li><a href="#">l</a></li>
                                                <li><a href="#">xl</a></li>
                                            </ul>
                                        </div>
                                        <h6 class="product-title">quantity</h6>
                                        <div class="qty-box">
                                            <div class="input-group"><span class="input-group-prepend"><button type="button"
                                                                                                               class="btn quantity-left-minus" data-type="minus" data-field=""><i
                                                            class="ti-angle-left"></i></button> </span>
                                                <input type="text" name="quantity" class="form-control input-number" value="1"> <span class="input-group-prepend"><button type="button"
                                                                                                                                                                          class="btn quantity-right-plus" data-type="plus" data-field=""><i
                                                            class="ti-angle-right"></i></button></span></div>
                                        </div>
                                    </div>
                                    <div class="product-buttons"><a href="#" class="btn btn-solid">add to cart</a> <a href="#" class="btn btn-solid">view detail</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Quick-view modal popup end-->

        <!-- tap to top -->
        <div class="tap-top top-cls">
            <div>
                <i class="fa fa-angle-double-up"></i>
            </div>
        </div>
        <!-- tap to top end -->

        <!-- latest jquery-->
        <script src="{{ url('public/assets/js/jquery-3.3.1.min.js') }}"></script>
        <!-- fly cart ui jquery-->
        <script src="{{ url('public/assets/js/jquery-ui.min.js') }}"></script>
        <!-- exitintent jquery-->
        <script src="{{ url('public/assets/js/jquery.exitintent.js') }}"></script>
        <script src="{{ url('public/assets/js/exit.js') }}"></script>
        <!-- popper js-->
        <script src="{{ url('public/assets/js/popper.min.js') }}"></script>
        <!-- slick js-->
        <script src="{{ url('public/assets/js/slick.js') }}"></script>
        <!-- menu js-->
        <script src="{{ url('public/assets/js/menu.js') }}"></script>
        <!-- lazyload js-->
        <script src="{{ url('public/assets/js/lazysizes.min.js') }}"></script>
        <!-- Bootstrap js-->
        <script src="{{ url('public/assets/js/bootstrap.js') }}"></script>
        <!-- Bootstrap Notification js-->
        <script src="{{ url('public/assets/js/bootstrap-notify.min.js') }}"></script>
        <!-- Fly cart js-->
        <script src="{{ url('public/assets/js/fly-cart.js') }}"></script>
        <!-- Jquery validate js-->
        <script src="{{ url('public/assets/js/jquery.validate.min.js') }}"></script>
        <!-- Theme js-->
        <script src="{{ url('public/assets/js/script.js') }}"></script>
        <script>
            $(window).on('load', function () {
                setTimeout(function () {
                    $('#exampleModal').modal('show');
                }, 2500);
            });

            function openSearch() {
                document.getElementById("search-overlay").style.display = "block";
            }

            function closeSearch() {
                document.getElementById("search-overlay").style.display = "none";
            }
        </script>
    </body>

</html>