@extends('layouts.admin')
@section('title', 'Data Admin')
@section('content')
<!-- Content Wrapper START -->
<div class="main-content">
    <div class="page-header">
        <h2 class="header-title">Data Admin</h2>
        <div class="header-sub-title">
            <nav class="breadcrumb breadcrumb-dash">
                <span class="breadcrumb-item"><i class="anticon anticon-appstore m-r-5"></i>Master Data</span>
                <span class="breadcrumb-item active">Data Admin</span>
            </nav>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <div class="container-fluid">
                <h4>Data Admin</h4>
                <div class="row justify-content-end">
                    <a href="/admin/create" class="btn btn-secondary btn-sm btn-tone m-r-5">Tambah Data</a>
                </div>
            </div>
            <div class="m-t-25">
                <table id="data-table" class="table table-hover table-responsive-lg text-center overflow-auto">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Foto</th>
                            <th>Nama</th>
                            <th>Jenis Kelamin</th>
                            <th>Email</th>
                            <th>Brand</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data as $d)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td><img width="150px" src="{{ url('/images/'.$d->foto) }}"></td>
                            <td>{{$d->name}}</td>
                            <td>{{$d->jenis_kelamin}}</td>
                            <td>{{$d->email}}</td>
                            <td>{{$d->nama_brand}}</td>
                            <td>{{$d->is_admin}}</td>
                            <td>
                                <a href="/admin/detail/{{$d->id}}" class="btn btn-sm btn-icon btn-tone btn-info"
                                    data-toggle="tooltip" data-placement="top" title="Detail"><i
                                        class="anticon anticon-profile"></i></a>
                                <a href="/admin/edit/{{$d->id}}" class="btn btn-sm btn-icon btn-tone btn-success"
                                    data-toggle="tooltip" data-placement="top" title="Edit"><i
                                        class="anticon anticon-edit"></i></a>
                                <button type="button" class="btn btn-sm btn-icon btn-tone btn-danger"
                                    data-toggle="modal" data-target="#delete{{$d->id}}"><i data-toggle="tooltip"
                                        data-placement="top" title="Hapus" class="anticon anticon-delete"></i></button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>No</th>
                            <th>Foto</th>
                            <th>Nama</th>
                            <th>Jenis Kelamin</th>
                            <th>Email</th>
                            <th>Brand</th>
                            <th>Status</th>
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
<div class="modal fade" id="delete{{$d->id}}">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Peringatan</h5>
                <button type="button" class="close" data-dismiss="modal">
                    <i class="anticon anticon-close"></i>
                </button>
            </div>
            <div class="modal-body">
                Apakah anda yakin ingin menghapus {{$d->name}}?
            </div>
            <div class="modal-footer">
                <form action="/admin/delete/{{$d->id}}" method="post">
                    @csrf
                <button type="submit" class="btn btn-primary">Ya</button>
                <button type="button" class="btn btn-warning" data-dismiss="modal">Tidak</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endforeach
@endsection
