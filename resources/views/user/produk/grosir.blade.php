@extends('layouts.user.user')
@section('title', 'Produk - PECIKUID')
@section('content')
<!-- breadcrumb-section -->
<div class="breadcrumb-section breadcrumb-bg">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 offset-lg-2 text-center">
                <div class="breadcrumb-text">
                    <p>Shop</p>
                    <h1>Product Grosir</h1>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end breadcrumb section -->

<!-- products -->
<div class="product-section mt-150 mb-150">
    <div class="container">

        <div class="row">
            <div class="col-md-12">
                <div class="product-filters">
                    <ul>
                        <li class="active" data-filter="*">All</li>
                        <li data-filter=".strawberry">Polos</li>
                        <li data-filter=".berry">Soga</li>
                        <li data-filter=".lemon">Bordir</li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="row product-lists">
            @foreach($data2 as $p)
            <div class="col-lg-4 col-md-6 text-center strawberry">
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

        <div class="row">
            <div class="col-lg-12 text-center">
                {{ $data2->links("pagination::bootstrap-4") }}
            </div>
        </div>
    </div>
</div>
<!-- end products -->

<!-- logo carousel -->
<div class="logo-carousel-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="logo-carousel-inner">
                    <div class="single-logo-item">
                        <img src="{{url('user/assets/img/company-logos/1.png')}}" alt="">
                    </div>
                    <div class="single-logo-item">
                        <img src="{{url('user/assets/img/company-logos/2.png')}}" alt="">
                    </div>
                    <div class="single-logo-item">
                        <img src="{{url('user/assets/img/company-logos/3.png')}}" alt="">
                    </div>
                    <div class="single-logo-item">
                        <img src="{{url('user/assets/img/company-logos/4.png')}}" alt="">
                    </div>
                    <div class="single-logo-item">
                        <img src="{{url('user/assets/img/company-logos/5.png')}}" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end logo carousel -->
@endsection
