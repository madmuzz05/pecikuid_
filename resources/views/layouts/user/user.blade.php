<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from technext.github.io/fruitkha/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 28 Dec 2021 13:44:39 GMT -->
<!-- Added by HTTrack -->
<meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description"
        content="Responsive Bootstrap4 Shop Template, Created by Imran Hossain from https://imransdesign.com/">

    <!-- title -->
    <title>PECIKUID - @yield('title')</title>

    <!-- favicon -->
    <link rel="shortcut icon" type="image/png" href="{{asset('user/assets/img/favicon.png')}}">
    @include('layouts.user.css')

</head>

<body>

    <!--PreLoader-->
    @yield('loader')
    <!--PreLoader Ends-->

    <!-- header -->
    <div class="top-header-area" id="sticker">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-sm-12 text-center">
                    <div class="main-menu-wrap">
                        <!-- logo -->
                        <div class="site-logo">
                            <a href="{{route('user.index')}}">
                                <img src="{{url('user/assets/img/logo.png')}}" alt="">
                            </a>
                        </div>
                        <!-- logo -->

                        <!-- menu start -->
                        <nav class="main-menu">
                            <ul>
                                <li class="{{ (request()->is('index')) ? 'current-list-item' : '' }}"><a
                                        href="{{route('user.index')}}">Home</a></li>
                                <li class="{{ (request()->is('about')) ? 'current-list-item' : '' }}"><a
                                        href="about.html">About</a></li>
                                <li class="{{ (request()->is('product*')) ? 'current-list-item' : '' }}"><a
                                        href="#">Shop</a>
                                    <ul class="sub-menu">
                                        <li><a href="{{route('product.retail')}}">Retail</a></li>
                                        <li><a href="{{route('product.grosir')}}">Grosir</a></li>
                                    </ul>
                                </li>
                                <li class="{{ (request()->is('contact')) ? 'current-list-item' : '' }}"><a
                                        href="contact.html">Contact</a></li>
                                <!-- <li><a href="shop.html">Shop</a>
									<ul class="sub-menu">
										<li><a href="shop.html">Shop</a></li>
										<li><a href="checkout.html">Check Out</a></li>
										<li><a href="single-product.html">Single Product</a></li>
										<li><a href="cart.html">Cart</a></li>
									</ul>
								</li> -->
                                <li>
                                    <div class="header-icons">
                                        <a class="shopping-cart" href="#">
                                            <i class="fas fa-shopping-cart"></i> <span
                                                class="badge badge-pill badge-danger">{{ count((array) session('cart')) }}</span>
                                        </a>
                                    </div>
                                    <ul class="sub-menu-2">
                                        <div class="row">
                                            <div class="col-lg-4">
                                                <i class="fas fa-shopping-cart"></i> <span
                                                    class="badge badge-pill badge-danger">{{ count((array) session('cart')) }}</span>
                                            </div>
                                            @php $total = 0 @endphp
                                            @foreach((array) session('cart') as $id => $details)
                                            @php $total += $details['harga'] * $details['quantity'] @endphp
                                            @endforeach
                                            <div class="col-lg-8 col-sm-8 col-8 text-right">
                                                <p>Total: <span class="text-info">Rp {{ $total }}</span></p>
                                            </div>
                                            <hr class="col-lg-10">
                                            @if(session('cart'))
                                            @foreach(session('cart') as $id => $details)
                                            <div class="row cart-detail">
                                                <div class="col-lg-4">
                                                    <img style=" width: 100;height: 100%;"
                                                        src="{{ url('/images/'.$details['foto']) }}" />
                                                </div>
                                                <div class="col-lg-8 col-sm-8 col-8">
                                                    <p>{{ $details['nama'] }}</p>
                                                    <span class="price text-info"> Rp {{ $details['harga'] }}</span>
                                                    <span class="count"> Quantity:{{ $details['quantity'] }}</span>
                                                </div>
                                            </div>
                                            @endforeach
                                            @endif
                                            <hr class="col-lg-10">
                                            <div class="col-lg-12 col-sm-12 col-12 text-center">
                                                <a href="{{route('cart.index')}}" class="cart-btn">View
                                                    all</a>
                                            </div>
                                        </div>
                                    </ul>
                                </li>
                            </ul>
                        </nav>
                        <div class="mobile-menu"></div>
                        <!-- menu end -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end header -->

    @yield('content')

    <!-- logo carousel -->
    <!-- <div class="logo-carousel-section">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="logo-carousel-inner">
						<div class="single-logo-item">
							<img src="assets/img/company-logos/1.png" alt="">
						</div>
						<div class="single-logo-item">
							<img src="assets/img/company-logos/2.png" alt="">
						</div>
						<div class="single-logo-item">
							<img src="assets/img/company-logos/3.png" alt="">
						</div>
						<div class="single-logo-item">
							<img src="assets/img/company-logos/4.png" alt="">
						</div>
						<div class="single-logo-item">
							<img src="assets/img/company-logos/5.png" alt="">
						</div>
					</div>
				</div>
			</div>
		</div>
	</div> -->
    <!-- end logo carousel -->


    <!-- copyright -->
    <div class="copyright">
        <div class="container">
            <div class="row justify-content-center">
                <div class="text-center">
                    <p>Copyrights &copy; 2021 PECIKUID.
                    </p>
                </div>
            </div>
        </div>
    </div>
    <!-- end copyright -->
    <script src="{{asset('user/assets/js/jquery-1.11.3.min.js')}}"></script>
    @include('layouts.user.js')
    @yield('js')

</body>

<!-- Mirrored from technext.github.io/fruitkha/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 28 Dec 2021 13:44:51 GMT -->

</html>
