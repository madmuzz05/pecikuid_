@extends('layouts.user.user')
@section('title', 'Produk Detail - PECIKUID')
@section('content')
<!-- breadcrumb-section -->
@foreach($data as $d)
<div class="breadcrumb-section breadcrumb-bg">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 offset-lg-2 text-center">
                <div class="breadcrumb-text">
                    <p>See more Details</p>
                    <h1>{{$d->nama_produk}}</h1>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end breadcrumb section -->

<!-- single product -->
<div class="single-product mt-150 mb-150">
    <div class="container">
        <div class="row product_data" id="product_data">
            <div class="col-md-5">
                <div id="carouselExampleControls" class="carousel slide" data-interval="10000" data-ride="carousel">
                    <div class="carousel-inner" id="img">
                        <div class="single-product-img carousel-item active">
                            <img src="{{ url('/images/'.$d->foto) }}" alt="">
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>

            </div>
            <div class="col-md-7">
                <div class="single-product-content">
                <meta name="csrf-token" content="{{ csrf_token() }}">
                    <input type="hidden" id="id_produk" value="{{$d->id_produk}}">
                    <input type="hidden" id="jenis_produk" value="{{$d->jenis_produk}}">
                    <h3>{{$d->nama_produk}}</h3>
                    <p class="single-product-pricing"><span>No: {{$d->nomor}} Tinggi: {{$d->tinggi}}</span> Rp
                        {{$d->harga}}</p>
                    <p id="desk"></p>
                    <div class="single-product-form">
                        <input type="number" id="myNumber" name="unit" value="" min="1" placeholder="0">
                        <a class="cart-btn" id="add-to-cart-btn"><i class="fas fa-shopping-cart"></i> Add to Cart</a>
                        <p><strong>Categories: </strong>{{$d->jenis_produk}}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end single product -->
@endforeach

<!-- more products -->
<div class="more-products mb-150">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 offset-lg-2 text-center">
                <div class="section-title">
                    <h3><span class="orange-text">Related</span> Products</h3>
                </div>
            </div>
        </div>
        <div class="row" id="test">
        </div>
    </div>
</div>
<!-- end more products -->

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
@section('js')
<script type="text/javascript">
    var id_produk = document.getElementById('id_produk').value
    var jenis_produk = document.getElementById('jenis_produk').value
    console.log(jenis_produk);
    $(document).ready(function () {
        $.ajax({
            type: "GET",
            url: "/product_detail/" + id_produk,
            dataType: 'json',
            success: function (res) {
                var img = ''
                $.each(res.data2, function (key, item) {
                    var data = "{{ url('/images') }}" + "/" + item.foto
                    img += '<div class="single-product-img carousel-item">'
                    img += ' <img src="' + data + '" alt="">'
                    img += ' </div>'
                })
                $("#img").append(img)

                var desk = ''
                $.each(res.data, function (key, item) {
                    desk = item.deskripsi
                })
                $("#desk").append(desk)
            }
        });
    });
    $(document).ready(function () {
        $.ajax({
            type: "GET",
            url: "/more_product/" + jenis_produk,
            dataType: 'json',
            success: function (res2) {
                console.log(res2.data);
                var rproduk = ''
                $.each(res2.data, function (key, item) {
                    var rimg = "{{ url('/images') }}" + "/" + item.foto
                    rproduk += '<div class="col-lg-4 col-md-6 text-center">'
                    rproduk += '<div class="single-product-item">'
                    rproduk += '<div class="product-image">'
                    rproduk += '<a href="/product_detail/' + item.id_produk +
                        '"><img src="' + rimg + '" alt=""></a>'
                    rproduk += '</div>'
                    rproduk += '<h3>' + item.nama_produk + '</h3>'
                    rproduk += '<p class="product-price"><span>No : ' + item.nomor +
                        ' Tinggi : ' + item.tinggi + '</span> Rp ' + item.harga + '</p>'
                    rproduk += '<a href="/product_detail/' + item.id_produk +
                        '" class="cart-btn">Click Detail</a>'
                    rproduk += '</div>'
                    rproduk += '</div>'
                })
                $("#test").append(rproduk)
            }
        })
    });

    $(document).ready(function () {
        $('#add-to-cart-btn').click(function (e) {
            // e.preventDefault()
            // console.log('test');
            var token = $("meta[name='csrf-token']").attr("content")
            var x = document.getElementById("myNumber").value;
            $.ajax({
                url: "/cart/add/"+id_produk,
                method: "POST",
                data: {
                    _token: token,
                    unit : x
                },
                dataType: 'json',
                success: function (res) {
                    console.log(x);
                    console.log(res.status);
                    window.location.reload();
                }
            })
        })
    })

</script>
@endsection
