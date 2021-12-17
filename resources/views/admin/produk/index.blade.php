@extends('layouts.admin')
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
            <div class="m-t-25">
                <table id="data-table" class="table table-hover table-responsive-lg overflow-auto">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Foto</th>
                            <th>Nama Produk</th>
                            <th>Kode Produk</th>
                            <th>Jenis Produk</th>
                            <th>Nomor</th>
                            <th>Tinggi</th>
                            <th>Unit</th>
                            <th>Harga</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data as $d)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td><img width="80px" src="{{ url('/images/'.$d->foto) }}"></td>
                            <td>{{$d->nama_produk}}</td>
                            <td>{{$d->kode_produk}}</td>
                            <td>{{$d->jenis_produk}}</td>
                            <td>{{$d->nomor}}</td>
                            <td>{{$d->tinggi}}</td>
                            <td>{{$d->unit}}</td>
                            <td>{{$d->harga}}</td>
                            <td>
                                <a href="/produk/detail/{{$d->id_produk}}" class="btn btn-sm btn-icon btn-tone btn-info"
                                    data-toggle="tooltip" data-placement="top" title="Detail"><i
                                        class="anticon anticon-profile"></i></a>
                                <a href="/produk/edit/{{$d->id_produk}}"
                                    class="btn btn-sm btn-icon btn-tone btn-success" data-toggle="tooltip"
                                    data-placement="top" title="Edit"><i class="anticon anticon-edit"></i></a>
                                <button type="button" class="btn btn-sm btn-icon btn-tone btn-danger"
                                    data-toggle="modal" data-target="#delete{{$d->id_produk}}"><i data-toggle="tooltip"
                                        data-placement="top" title="Hapus" class="anticon anticon-delete"></i></button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>No</th>
                            <th>Foto</th>
                            <th>Nama Produk</th>
                            <th>Kode Produk</th>
                            <th>Jenis Produk</th>
                            <th>Nomor</th>
                            <th>Tinggi</th>
                            <th>Unit</th>
                            <th>Harga</th>
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
                    <form action="">
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
                                    <option value="laki-laki">Polos</option>
                                    <option value="perempuan">Bordir</option>
                                    <option value="perempuan">Soga</option>
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
                            <label class="col-sm-2 col-form-label control-label font-weight-semibold" for="foto">Upload
                                Foto</label>
                            <div class="col-md-10">
                                <div class="input-group mb-3">
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
                            <label class="col-sm-2 col-form-label control-label font-weight-semibold" for="deskripsi">Deskripsi</label>
                            <div class="col-md-10">
                                <div id="editor">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>
</div>
<!--add data end -->

@endforeach
@endsection
