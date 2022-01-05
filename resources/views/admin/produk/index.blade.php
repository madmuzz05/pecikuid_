@extends('layouts.admin.admin')
@section('title', 'Data Produk')
@section('content')
<!-- Content Wrapper START -->
<div class="main-content">
    <div class="page-header">
        <h2 class="header-title">Data Produk</h2>
        <div class="header-sub-title">
            <nav class="breadcrumb breadcrumb-dash">
                <span class="breadcrumb-item"><i class="anticon anticon-appstore m-r-5"></i>Master Data</span>
                <span class="breadcrumb-item active">Data Produk</span>
            </nav>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <div class="container-fluid">
                <h4>Data Produk</h4>
                <div class="row justify-content-end">
                    <button type="button" data-toggle="modal" data-target="#add"
                        class="btn btn-secondary btn-sm btn-tone m-r-5">Tambah Data</button>
                </div>
            </div>
            <div class="m-t-25 table-responsive-lg">
                <table id="data-table2" class="table table-hover text-center overflow-auto">
                    <thead>
                        <tr>
                            <th>No</th>
                            <!-- <th>Foto</th> -->
                            <th>Nama Produk</th>
                            <th>Kode Produk</th>
                            <!-- <th>Jenis Produk</th> -->
                            <th>Nomor</th>
                            <th>Tinggi</th>
                            <th>Unit</th>
                            <th>Harga</th>
                            <th>Jenis Penjualan</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>No</th>
                            <!-- <th>Foto</th> -->
                            <th>Nama Produk</th>
                            <th>Kode Produk</th>
                            <!-- <th>Jenis Produk</th> -->
                            <th>Nomor</th>
                            <th>Tinggi</th>
                            <th>Unit</th>
                            <th>Harga</th>
                            <th>Jenis Penujualan</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- Content Wrapper END -->
<!-- Modal -->
@foreach($data as $d)
<!-- delete data -->
<div class="modal fade" id="delete{{$d->id_produk}}">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Peringatan</h5>
                <button type="button" class="close" data-dismiss="modal">
                    <i class="anticon anticon-close"></i>
                </button>
            </div>
            <div class="modal-body">
                Apakah anda yakin ingin menghapus {{$d->nama_produk}}?
            </div>
            <div class="modal-footer">
                <form action="/produk/delete/{{$d->id_produk}}" method="post">
                    @csrf
                    <button type="submit" class="btn btn-primary">Ya</button>
                    <button type="button" class="btn btn-warning" data-dismiss="modal">Tidak</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!--delete data end -->
<!--add data -->
<div class="modal fade" id="add">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title h4">Tambah Produk</h5>
                <button type="button" class="close" data-dismiss="modal">
                    <i class="anticon anticon-close"></i>
                </button>
            </div>
            <div class="modal-body">
                <div class="m-t-20 container-fluid">
                    <form method="POST" action="{{ route('produk.store') }}" enctype="multipart/form-data">
                    {{ csrf_field() }}
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label control-label font-weight-semibold" for="brand">Nama
                                Brand</label>
                            <div class="col-md-10">
                                <input type="text" name="namaBrand" id="nama_brand" class="form-control"
                                    placeholder="Brand" disabled>
                                <input type="hidden" name="brand" id="id_brand">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label control-label font-weight-semibold" for="nama">Nama
                                Produk</label>
                            <div class="col-md-10">
                                <input type="text" id="nama"
                                    class="form-control @error('nama_produk') is-invalid @enderror" name="nama_produk"
                                    value="{{old('nama_produk')}}" placeholder="Nama Produk">
                                @error('nama_produk')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label control-label font-weight-semibold" for="jenis">Jenis
                                Produk</label>
                            <div class="col-md-10">
                                <select class="select2  @error('jenis_produk') is-invalid @enderror" name="jenis_produk"
                                    id="jenis">
                                    <option value=""></option>
                                    <option value="Polos">Polos</option>
                                    <option value="Bordir">Bordir</option>
                                    <option value="Soga">Soga</option>
                                </select>
                                @error('jenis_produk')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label control-label font-weight-semibold"
                                for="nomor">Nomor</label>
                            <div class="col-md-10">
                                <input type="number" min="0" id="nomor"
                                    class="form-control @error('nomor') is-invalid @enderror" name="nomor"
                                    value="{{old('nomor')}}" placeholder="Nomor">
                                @error('nomor')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label control-label font-weight-semibold"
                                for="tinggi">Tinggi</label>
                            <div class="col-md-10">
                                <input type="number" min="0" id="tinggi"
                                    class="form-control @error('tinggi') is-invalid @enderror" name="tinggi"
                                    value="{{old('tinggi')}}" placeholder="Tinggi">
                                @error('tinggi')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label control-label font-weight-semibold"
                                for="unit">Unit</label>
                            <div class="col-md-10">
                                <input type="number" min="0" id="unit"
                                    class="form-control @error('unit') is-invalid @enderror" name="unit"
                                    value="{{old('unit')}}" placeholder="Unit">
                                @error('unit')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label control-label font-weight-semibold" for="harga">Harga
                                Satuan</label>
                            <div class="col-md-10">
                                <input type="text" id="harga" class="form-control @error('harga') is-invalid @enderror"
                                    name="harga" value="{{old('harga')}}" placeholder="Harga">
                                @error('harga')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label control-label font-weight-semibold" for="foto">Foto Produk</label>
                            <div class="col-md-10">
                                <div class="input-group">
                                    <input type="file" class="form-control @error('foto') is-invalid @enderror"
                                        name="foto" id="inputGroupFile02">
                                    <label class="input-group-text" for="inputGroupFile02">Browse</label>
                                </div>
                                @error('foto')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label control-label font-weight-semibold" for="foto_lain">Foto lain  <p class="text-muted">(Opsional)</p></label>
                            <div class="col-md-10">
                                <div class="input-group">
                                    <input type="file" class="form-control"
                                        name="foto_lain[]" id="inputGroupFile03" multiple>
                                    <label class="input-group-text" for="inputGroupFile03">Browse</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label control-label font-weight-semibold"
                                for="deskripsi">Deskripsi</label>
                            <div class="col-md-10">
                                <textarea class="form-control" name="deskripsi" id="editor" rows="30"></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label control-label font-weight-semibold" for="jenis_penjualan">Jenis
                                Penjualan</label>
                            <div class="col-md-10">
                                <select class="select2  @error('jenis_penjualan') is-invalid @enderror" name="jenis_penjualan"
                                    id="jenis_penjualan">
                                    <option value=""></option>
                                    <option value="Retail">Retail</option>
                                    <option value="Grosir">Grosir</option>
                                </select>
                                @error('jenis_produk')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
            </form>
        </div>
    </div>
</div>
<!--add data end -->

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

    $(document).ready(function () {
        var t = $('#data-table2').dataTable({
            processing: true,
            serverSide: true,
            responsive: true,
            ajax: "{{route('produk.index')}}",
            columns: [
                // {
                //     data: null,
                //     render: function (data, type, row, meta) {
                //         return meta.row + meta.settings._iDisplayStart + 1;
                //     }
                // },
                {
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex',
                    className: 'text-center'
                },
                {
                    data: 'nama_produk',
                    name: 'nama_produk',
                    className: 'text-center'
                },
                {
                    data: 'kode_produk',
                    name: 'kode_produk',
                    className: 'text-center'
                },
                {
                    data: 'nomor',
                    name: 'nomor',
                    className: 'text-center'
                },
                {
                    data: 'tinggi',
                    name: 'tinggi',
                    className: 'text-center'
                },
                {
                    data: 'unit',
                    name: 'unit',
                    className: 'text-center'
                },
                {
                    data: 'harga',
                    name: 'harga',
                    className: 'text-center'
                },
                {
                    data: 'jenis_penjualan',
                    name: 'jenis_penjualan',
                    className: 'text-center'
                },
                {
                    data: 'id_produk',
                    name: 'id_produk',
                    className: 'text-center'
                },
            ],
            columnDefs: [{
                "targets": -1,
                "render": function (data, type, row, meta) {
                    return '<a href="/produk/detail/'+row.id_produk+'" class="btn btn-xs btn-tone btn-info mr-2" data-toggle="tooltip" data-placement="top" title="Detail"><i class="anticon anticon-profile"></i> Detail</a> <a href="/produk/edit/'+row.id_produk+'"class="btn btn-xs btn-tone btn-success mr-2" data-toggle="tooltip" data-placement="top" title="Edit"><i class="anticon anticon-edit"></i> Edit</a> <button type="button" class="btn btn-xs btn-tone btn-danger mr-2" data-toggle="modal" data-target="#delete'+row.id_produk+'"><i data-toggle="tooltip" data-placement="top" title="Hapus" class="anticon anticon-delete"></i> Delete</button>'
                }
            }]
        });
    });

    ClassicEditor
        .create(document.querySelector('#editor'))
        .catch(error => {
            console.error(error);
        });

</script>
@endsection
