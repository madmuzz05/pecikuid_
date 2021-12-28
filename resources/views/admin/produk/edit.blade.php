@extends('layouts.admin.admin')
@section('title', 'Data Produk')
@section('content')
@foreach($data as $d)
<div class="main-content">
    <div class="page-header no-gutters has-tab">
        <h2 class="header-title">Data Produk</h2>
        <div class="header-sub-title">
            <nav class="breadcrumb breadcrumb-dash">
                <span class="breadcrumb-item"><i class="anticon anticon-appstore m-r-5"></i>Master Data</span>
                <a href="{{route('produk.index')}}" class="breadcrumb-item">Data Produk</a>
                <span class="breadcrumb-item active">Edit Produk</span>
            </nav>
        </div>
        <div class="d-md-flex m-b-15 m-t-25 align-items-center justify-content-between">
            <div class="media align-items-center m-b-15">
                <div class="avatar avatar-image rounded"  style="height: 100px; width: 100px">
                    <img id="output" src="{{ url('/images/'.$d->foto) }}" alt="">
                </div>
                <div class="m-l-15">
                    <h4 class="m-b-0">{{$d->nama_produk}}</h4>
                    <p class="text-muted m-b-0">Kode Produk : {{$d->kode_produk}}</p>
                    <button class="btn btn-tone btn-secondary btn-xs" onclick="thisFileUpload();">Upload</button>
                </div>
            </div>
            <form method="POST" action="{{ route('produk.update') }}" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="id" value="{{$d->id_produk}}">
            <input type="hidden" name="jenis" value="{{$d->jenis_produk}}">
                <input type="file" accept="image/*" id="file" name="foto" onchange="loadFile(event)"
                    style="display:none;" />
                <div class="m-b-15">
                    <a href="{{route('produk.index')}}" class="btn btn-warning">
                        <i class="anticon anticon-left"></i>
                        <span>Kembali</span>
                    </a>
                    <button type="submit" class="btn btn-primary">
                        <i class="anticon anticon-save"></i>
                        <span>Simpan</span>
                    </button>
                </div>
        </div>
        <ul class="nav nav-tabs">
            <li class="nav-item">
                <a class="nav-link active" data-toggle="tab" href="#product-edit-basic">Basic Info</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#product-edit-description">Description</a>
            </li>
        </ul>
    </div>
    <div class="tab-content m-t-15">
        <div class="tab-pane fade show active" id="product-edit-basic">
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <label class="font-weight-semibold" for="nama_produk">Nama Produk</label>
                        <input type="text" class="form-control" name="nama_produk" id="nama_produk"
                            placeholder="Nama Produk" value="{{$d->nama_produk}}">
                    </div>
                    <div class="form-group">
                        <label class="font-weight-semibold" for="kode_produk">Kode Produk</label>
                        <input type="text" class="form-control" name="kode_produk" id="kode_produk"
                            placeholder="Kode Produk" value="{{$d->kode_produk}}" disabled>
                    </div>
                    <div class="form-group">
                        <label class="font-weight-semibold" for="jenis_produk">Jenis Produk</label>
                        <select class="select2" name="jenis_produk" id="jenis_produk">
                            <option value="{{$d->jenis_produk}}">{{$d->jenis_produk}}</option>
                            <option value="Polos">Polos</option>
                            <option value="Bordir">Bordir</option>
                            <option value="Soga">Soga</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="font-weight-semibold" for="productBrand">Brand</label>
                        <input type="text" class="form-control" id="productBrand" placeholder="Brand"
                            value="{{$d->nama_brand}}" disabled>
                    </div>
                    <div class="form-group">
                        <label class="font-weight-semibold" for="nomor">Nomor</label>
                        <input type="number" min="0" id="nomor" class="form-control" name="nomor" value="{{$d->nomor}}"
                            placeholder="Nomor">
                    </div>
                    <div class="form-group">
                        <label class="font-weight-semibold" for="tinggi">Tinggi</label>
                        <input type="number" min="0" id="tinggi" class="form-control" name="tinggi"
                            value="{{$d->tinggi}}" placeholder="Tinggi">
                    </div>
                    <div class="form-group">
                        <label class="font-weight-semibold" for="unit">Unit</label>
                        <input type="number" min="0" id="unit" class="form-control" name="unit" value="{{$d->unit}}"
                            placeholder="Unit">
                    </div>
                    <div class="form-group">
                        <label class="font-weight-semibold" for="harga">Harga Satuan</label>
                        <input type="text" class="form-control" name="harga" id="harga" placeholder="Harga Satuan"
                            value="{{$d->harga}}">
                    </div>
                </div>
            </div>
        </div>
        <div class="tab-pane fade" id="product-edit-description">
            <div class="card">
                <div class="card-body">
                    <div id="productDescription">
                        <textarea class="form-control" name="deskripsi" id="editor"
                            rows="30">{{$d->deskripsi}}</textarea>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </form>
</div>
@endforeach
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

    ClassicEditor
        .create(document.querySelector('#editor'))
        .catch(error => {
            console.error(error);
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
