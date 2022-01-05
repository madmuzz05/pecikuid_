@extends('layouts.admin.admin')
@section('title', 'Data Produk')
@section('content')
<!-- Content Wrapper START -->
@foreach($data as $d)
<input type="hidden" value="{{$d->id_produk}}" id="id_produk">
<div class="main-content">
    <div class="page-header no-gutters has-tab">
        <h2 class="header-title">Data Produk</h2>
        <div class="header-sub-title">
            <nav class="breadcrumb breadcrumb-dash">
                <span class="breadcrumb-item"><i class="anticon anticon-appstore m-r-5"></i>Master Data</span>
                <a href="{{route('produk.index')}}" class="breadcrumb-item">Data Produk</a>
                <span class="breadcrumb-item active">{{$d->nama_produk}}</span>
            </nav>
        </div>
        <div class="d-md-flex m-b-15 m-t-25 align-items-center justify-content-between">
            <div class="media align-items-center m-b-15">
                <div class="avatar avatar-image rounded" style="height: 70px; width: 70px">
                    <img src="{{ url('/images/'.$d->foto) }}" alt="">
                </div>
                <div class="m-l-15">
                    <h4 class="m-b-0">{{$d->nama_produk}}</h4>
                    <p class="text-muted m-b-0">Kode Produk: {{$d->kode_produk}}</p>
                </div>
            </div>
            <div class="m-b-15">
                <a href="{{route('produk.index')}}" class="btn btn-warning">
                    <i class="anticon anticon-left"></i>
                    <span>Kembali</span>
                </a>
            </div>
        </div>
        <ul class="nav nav-tabs">
            <li class="nav-item">
                <a class="nav-link active" data-toggle="tab" href="#product-overview">Overview</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#product-images">Product Images</a>
            </li>
        </ul>
    </div>
    <div class="container-fluid">
        <div class="tab-content m-t-15">
            <div class="tab-pane fade show active" id="product-overview">
                <div class="row">
                    <div class="col-md-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="media align-items-center">
                                    <i class="font-size-40 text-success anticon anticon-smile"></i>
                                    <div class="m-l-15">
                                        <p class="m-b-0 text-muted">10 rating</p>
                                        <div class="star-rating m-t-5">
                                            <input type="radio" id="star3-5" name="rating-3" value="5" checked
                                                disabled /><label for="star3-5" title="5 star"></label>
                                            <input type="radio" id="star3-4" name="rating-3" value="4" disabled /><label
                                                for="star3-4" title="4 star"></label>
                                            <input type="radio" id="star3-3" name="rating-3" value="3" disabled /><label
                                                for="star3-3" title="3 star"></label>
                                            <input type="radio" id="star3-2" name="rating-3" value="2" disabled /><label
                                                for="star3-2" title="2 star"></label>
                                            <input type="radio" id="star3-1" name="rating-3" value="1" disabled /><label
                                                for="star3-1" title="1 star"></label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="media align-items-center">
                                    <i class="font-size-40 text-primary anticon anticon-shopping-cart"></i>
                                    <div class="m-l-15">
                                        <p class="m-b-0 text-muted">Terjual</p>
                                        <h3 class="m-b-0 ls-1">1,521</h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="media align-items-center">
                                    <i class="font-size-40 text-primary anticon anticon-message"></i>
                                    <div class="m-l-15">
                                        <p class="m-b-0 text-muted">Review</p>
                                        <h3 class="m-b-0 ls-1">27</h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="media align-items-center">
                                    <i class="font-size-40 text-primary anticon anticon-stock"></i>
                                    <div class="m-l-15">
                                        <p class="m-b-0 text-muted">Stok Tersedia</p>
                                        <h3 class="m-b-0 ls-1">{{$d->unit}}</h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Basic Info</h4>
                        <div class="table-responsive">
                            <table class="product-info-table m-t-20">
                                <tbody>
                                    <tr>
                                        <td>Harga:</td>
                                        <td class="text-dark font-weight-semibold"> {{$d->harga}}</td>
                                    </tr>
                                    <tr>
                                        <td>Kategori:</td>
                                        <td>Peci {{$d->jenis_produk}}</td>
                                    </tr>
                                    <tr>
                                        <td>Brand:</td>
                                        <td> {{$d->nama_brand}}</td>
                                    </tr>
                                    <tr>
                                        <td>Nomor:</td>
                                        <td>{{$d->nomor}}</td>
                                    </tr>
                                    <!-- <tr>
                                        <td>Colors:</td>
                                        <td class="d-flex">
                                            <span class="d-flex align-items-center m-r-20">
                                                <span class="badge badge-dot product-color m-r-5"
                                                    style="background-color: #4c4e69"></span>
                                                <span>Dark Blue</span>
                                            </span>
                                            <span class="d-flex align-items-center m-r-20">
                                                <span class="badge badge-dot product-color m-r-5"
                                                    style="background-color: #868686"></span>
                                                <span>Gray</span>
                                            </span>
                                            <span class="d-flex align-items-center m-r-20">
                                                <span class="badge badge-dot product-color m-r-5"
                                                    style="background-color: #8498c7"></span>
                                                <span>Gray Blue</span>
                                            </span>
                                        </td>
                                    </tr> -->
                                    <tr>
                                        <td>Tinggi Peci:</td>
                                        <td>{{$d->tinggi}}</td>
                                    </tr>
                                    <tr id="stok">
                                        <td>Status:</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Product Description</h4>
                    </div>
                    <div class="card-body" id="deskripsi">
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="product-images">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            @foreach($data2 as $d2)
                            <div class="col-md-3 mr-3">
                                <img width="85%" src="{{ url('/images/'.$d2->foto) }}" alt="">
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endforeach
<!-- Content Wrapper END -->
@endsection
@section('js')
<script type="text/javascript">
    $(document).ready(function () {
        $.ajax({
            type: "GET",
            url: "/getBrand",
            dataType: 'json',
            success: function (response) {
                console.log(response.data);
                var bodyData = '';
                $.each(response.data, function (key, item) {
                    document.getElementById('id_brand').value = item.id_brand;
                    document.getElementById('nama_brand').value = item.nama_brand;
                    bodyData += '<option value="' + item.id_brand + '">' + item.nama_brand +
                        '</option>'
                })
                $("#bodyData").append(bodyData);
            }
        });
    });

    var id_produk = document.getElementById('id_produk').value
    
    $(document).ready(function () {
        $.ajax({
            type: "GET",
            url: "/produk/detail/" + id_produk,
            success: function (response) {
                console.log(response.data);
                var deskripsi = '';
                var stok = '';
                $.each(response.data, function (key, item) {
                    if (item.deskripsi != null) {
                        deskripsi += item.deskripsi
                    }
                    if (item.unit != 0) {
                        stok +=
                            '<td><span class="badge badge-pill badge-cyan">In Stock</span></td>'
                    } else {
                        stok +=
                            '<td><span class="badge badge-pill badge-red">Out of Stock</span></td>'
                    }
                })
                $("#deskripsi").append(deskripsi);
                $("#stok").append(stok);
            }
        });
    });

    function thisFileUpload() {
        document.getElementById("file").click();
    };

    var loadFile = function (event) {
        var output = document.getElementById('output');
        output.src = URL.createObjectURL(event.target.files[0]);
        output.onload = function () {
            URL.revokeObjectURL(output.src) // free memory
        }
    };

</script>
@endsection
