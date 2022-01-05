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
                <div class="avatar avatar-image rounded" style="height: 100px; width: 100px">
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
                <input type="hidden" name="id" id="id_produk" value="{{$d->id_produk}}">
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
                <a class="nav-link active" id="basic" data-toggle="tab" href="#product-edit-basic">Basic Info</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#product-edit-description">Description</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="images" data-toggle="tab" href="#product-edit-images">Product Images</a>
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
                        <label class="font-weight-semibold">Brand</label>
                        <input type="text" class="form-control" id="productBrand" placeholder="Brand" disabled>
                    </div>
                    <div class="form-group">
                        <label class="font-weight-semibold" for="nomor">Nomor</label>
                        <input type="text" min="0" id="nomor" class="form-control" name="nomor" value="{{$d->nomor}}"
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
                    <div class="form-group">
                        <label class="font-weight-semibold" for="jenis_penjualan">Jenis Penjualan</label>
                        <select class="select2" name="jenis_penjualan" id="jenis_penjualan">
                            <option value="{{$d->jenis_penjualan}}">{{$d->jenis_penjualan}}</option>
                            <option value="Retail">Retail</option>
                            <option value="Grosir">Grosir</option>
                        </select>
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
        </form>
        <div class="tab-pane fade" id="product-edit-images">
            <div class="card load">
                <div class="card-body">
                    <div class="row justify-content-end mr-3">
                        <button class="btn btn-tone btn-secondary" data-toggle="modal" data-target="#add">
                            <i class="anticon anticon-plus"></i>
                            Tambah Gambar
                        </button>
                    </div>
                    <div class="row mt-3" id="img">

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endforeach
@foreach($data2 as $d2)
<!-- delete data -->
<div class="modal fade" id="delete{{$d2->id_image}}">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Peringatan</h5>
                <button type="button" class="close" data-dismiss="modal">
                    <i class="anticon anticon-close"></i>
                </button>
            </div>
            <div class="modal-body">
                Apakah anda yakin ingin menghapus?
            </div>
            <div class="modal-footer">
                <button type="button" data-id="{{$d2->id_image}}" id="delete_image" class="btn btn-primary"
                    data-dismiss="modal">Ya</button>
                <button type="button" class="btn btn-warning" data-dismiss="modal">Tidak</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!--delete data end -->
<!-- add other data -->
<div class="modal fade" id="add">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Foto Produk</h5>
                <button type="button" class="close" data-dismiss="modal">
                    <i class="anticon anticon-close"></i>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group row">
                    <div class="col-md-10">
                        <form method="post" id="upload_form" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="produk_id" id="id_produk_2" value="{{$d2->id_produk}}">
                            <div class="input-group">
                                <input type="file" class="form-control foto_lain" name="foto_lain[]"
                                    id="inputGroupFile03" multiple>
                                <label class="input-group-text" for="inputGroupFile03">Browse</label>
                            </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button id="add_image" type="submit" class="btn btn-primary reload">Ya</button>
                </form>
                <button type="button" class="btn btn-warning" data-dismiss="modal">Tidak</button>
            </div>
        </div>
    </div>
</div>
<!--add other data end -->
@endforeach
@endsection
@section('js')
<script type="text/javascript">
    var id_produk = document.getElementById('id_produk').value
    console.log(id_produk);
    $(document).ready(function () {
        $.ajax({
            type: "GET",
            url: "/getBrand",
            dataType: 'json',
            success: function (response) {
                var bodyData = '';
                $.each(response.data, function (key, item) {
                    console.log(item.nama_brand);
                    document.getElementById('productBrand').value = item.nama_brand;
                    bodyData += '<option value="' + item.id_brand + '">' + item
                        .nama_brand +
                        '</option>'
                })
                $("#bodyData").append(bodyData);
            }
        });
    });

    $(document).ready(function () {

        getImg()

        function getImg() {
            $.ajax({
                type: "GET",
                url: "/produk/edit/" + id_produk,
                dataType: 'json',
                success: function (response) {
                    console.log(response.data2);
                    $('#img').html("");
                    var img = '';
                    $.each(response.data2, function (key, item) {
                        if (item.id_image != null) {
                            var data = "{{ url('/images') }}" + "/" + item.foto
                            img += '<div class="col-md-3 mr-3">'
                            img +=
                                '<div class="form-group row justify-content-center align-align-items-center">'
                            img += '<img width="100%" src="' + data + '" alt="">'
                            img += '<div class=" row justify-content-center">'
                            img += '<div class="col-lg-12">'
                            img +=
                                '<meta name="csrf-token" content="{{ csrf_token() }}">'
                            img +=
                                '<button type="button" data-toggle="modal" data-target="#delete' +
                                item.id_image +
                                '" class="btn btn-tone btn-danger btn-sm mt-3">'
                            img +=
                                '<i class="anticon anticon-delete"></i><span>Hapus</span>'
                            img += '</button>'
                            img += '</div>'
                            img += '</div>'
                            img += '</div>'
                            img += '</div>'
                        }
                    })
                    $("#img").append(img);
                }
            });
        }

        $('#upload_form').on('submit', function (e) {
            e.preventDefault();
            var img = document.getElementsByClassName('foto_lain')[0].files
            var data = []
            for (var i = 0; i < img.length; i++) {
                data.splice(i, 0, img[i].name)
            }


            var token = $("meta[name='csrf-token']").attr("content")
            var idProduk = document.getElementById('id_produk').value

            


            $.ajax({
                async:true,
                type: "POST",
                contentType: false,
                url: "/produk_image/store",
                data: new FormData(this),
                dataType: 'JSON',
                processData: false,
                success: function (res) {
                    console.log(res);
                    $('#add').modal('hide')
                    active()
                    location.reload();
                }
            })
        })


        $(document).on('click', '#delete_image', function (e) {
            e.preventDefault();
            var id = $(this).data("id");
            // var id = $(this).attr('data-id');
            var token = $("meta[name='csrf-token']").attr("content");
            var url = e.target;

            $.ajax({
                url: "/produk_image/delete/" + id,
                type: 'DELETE',
                data: {
                    _token: token,
                    id: id
                },
                success: function (response) {
                    if (response.status == 200) {
                        getImg()
                        console.log("Y");
                    }
                }
            });
        });

    });

    function active() {
   var element = document.getElementById("images");
   element.classList.add("active");
   var element2 = document.getElementById("basic");
   element2.classList.remove("active");
}
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
