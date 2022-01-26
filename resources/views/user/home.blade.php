@extends('layouts.user.user')
@section('title', 'Home')
@section('loader')
<div class="loader">
        <div class="loader-inner">
            <div class="circle"></div>
        </div>
    </div>
@endsection
@section('content')
	<!-- hero area -->
	<div class="hero-area hero-bg">
        <div class="container">
			<div class="row">
				<div class="col-lg-8 offset-lg-2 text-center">
					<div class="hero-text">
						<div class="hero-text-tablecell">
							<p class="subtitle-1">Kini Hadir!</p>
                            <h1>Songkok Nasional</h1>
							<p class="subtitle-2">Tersedia dalam beberapa model</p>
							<div class="hero-btns">
								<a href="{{route('product.retail')}}" class="bordered-btn">Order Now</a>
							</div>
						</div>
					</div>
				</div>
			</div>
        </div>
	</div>
	<!-- end hero area -->

    	<!-- about section -->
	<div class="product-section pt-80 pb-50">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 offset-lg-2 text-center">
					<div class="section-title">	
						<h3>About <span class="orange-text">Us</span></h3>
						<p>PECIKUID adalah AGEN TOKO ONLINE PECI NASIONAL yang berdiri pada tahun 2021 bertempat dikota gresik jawatimur, kami selalu menawarkan produk terbaik untuk.</p>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end about section -->

	<!-- features list section -->
	<div class="list-section pt-80 pb-80">
		<div class="container">
			<div class="row">
				<div class="col-lg-4 col-md-6 mb-4 mb-lg-0">
					<div class="list-box d-flex align-items-center">
						<div class="list-icon">
							<i class="fas fa-shipping-fast"></i>
						</div>
						<div class="content">
							<h3>Free Shipping</h3>
							<p>When order over Rp.250.000</p>
						</div>
					</div>
				</div>
				<div class="col-lg-4 col-md-6 mb-4 mb-lg-0">
					<div class="list-box d-flex align-items-center">
						<div class="list-icon">
							<i class="fas fa-phone-volume"></i>
						</div>
						<div class="content">
							<h3>24/7 Support</h3>
							<p>Get support all day</p>
						</div>
					</div>
				</div>
				<div class="col-lg-4 col-md-6 mb-4 mb-lg-0">
					<div class="list-box d-flex align-items-center">
						<div class="list-icon">
							<i class="fas fa-sync"></i>
						</div>
						<div class="content">
							<h3>Refund</h3>
							<p>Get refund within 3 days!</p>
						</div>
					</div>
				</div>
			</div>

		</div>
	</div>
	<!-- end features list section -->

	<!-- product section -->
	<div class="product-section padding-product pt-80 pb-80">
		<div class="row">
            <div class="col-lg-8 offset-lg-2 text-center">
					<div class="section-title">	
						<h3><span class="orange-text">Featured</span> Products</h3>
					</div>
				</div>
                @foreach($produk as $p)
                    <div class="col-lg-3 col-md-5 offset-md-3 offset-lg-0 text-center">
                        <div class="single-product-item">
                            <div class="product-image">
                                <a href="/product_detail/{{$p->id_produk}}"><img src="{{ url('/images/'.$p->foto) }}" alt=""></a>
                            </div>
                            <h3>{{$p->nama_produk}}</h3>
                            <p class="product-price"><span>No: {{$p->nomor}} Tinggi: {{$p->tinggi}}</span> Rp {{$p->harga}}</p>
                            <a href="/product_detail/{{$p->id_produk}}" class="cart-btn">Click Detail</a>
                        </div>
                    </div>
                @endforeach
			</div>
		</div>
	</div>
	<!-- end product section -->
@endsection
