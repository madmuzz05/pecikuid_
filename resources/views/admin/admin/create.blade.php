@extends('layouts.admin.admin')
@section('title', 'Data Admin')
@section('content')
<!-- Content Wrapper START -->
<div class="main-content">
    <div class="page-header">
        <h2 class="header-title">Data Admin</h2>
        <div class="header-sub-title">
            <nav class="breadcrumb breadcrumb-dash">
                <span class="breadcrumb-item"><i class="anticon anticon-appstore m-r-5"></i>Master Data</span>
                <a href="{{route('admin.index')}}" class="breadcrumb-item">Data Admin</a>
                <span class="breadcrumb-item active">Tambah Data</span>
            </nav>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <h4>Tambah Data</h4>
            <div class="m-t-25 container-fluid">
                <form method="POST" action="{{ route('admin.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label control-label font-weight-semibold"
                            for="name">Nama</label>
                        <div class="col-md-7">
                            <input type="text" id="name" class="form-control @error('name') is-invalid @enderror"
                                name="name" value="{{old('name')}}" placeholder="Nama" required>
                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label control-label font-weight-semibold" for="telepon">No
                            Telepon</label>
                        <div class="col-md-7">
                            <input type="text" id="telepon" class="form-control @error('telepon') is-invalid @enderror"
                                name="telepon" value="{{old('telepon')}}" placeholder="No Telepon" required>
                            @error('telepon')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label control-label font-weight-semibold"
                            for="alamat">Alamat</label>
                        <div class="col-md-7">
                            <input type="text" id="alamat" class="form-control @error('alamat') is-invalid @enderror"
                                name="alamat" value="{{old('alamat')}}" placeholder="Alamat" required>
                            @error('alamat')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label control-label font-weight-semibold"
                            for="jenis_kelamin">Jenis Kelamin</label>
                        <div class="col-md-7">
                            <select class="select2  @error('jenis_kelamin') is-invalid @enderror" name="jenis_kelamin"
                                id="jenis_kelamin" autocomplete="jenis_kelamin" autofocus required>
                                <option value=""></option>
                                <option value="laki-laki">Laki-Laki</option>
                                <option value="perempuan">Perempuan</option>
                            </select>
                            @error('jenis_kelamin')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label control-label font-weight-semibold" for="brand">Asal
                            Brand</label>
                        <div class="col-md-7">
                        <input type="text" id="nama_brand" class="form-control @error('brand') is-invalid @enderror"
                                value="{{old('alamat')}}" placeholder="Brand" disabled>
                                <input type="hidden" name="brand" id="id_brand">
                            <!-- <select id="bodyData" name="brand" class="select2 @error('brand') is-invalid @enderror">
                                <option value=""></option>
                            </select> -->
                            @error('brand')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label control-label font-weight-semibold" for="isadmin">User
                            Level</label>
                        <div class="col-md-7">
                            <input type="text" id="isadmin" class="form-control @error('isadmin') is-invalid @enderror"
                                name="isadmin" value="Admin" disabled required>
                            @error('isadmin')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label control-label font-weight-semibold" for="is_admin">Foto
                            Profil</label>
                        <div class="col-md-7">
                            <div class="input-group mb-3">
                                <input type="file" class="form-control @error('foto') is-invalid @enderror" name="foto"
                                    id="inputGroupFile02">
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
                        <label class="col-sm-2 col-form-label control-label font-weight-semibold"
                            for="email">Email</label>
                        <div class="col-md-7">
                            <input type="email" id="email" class="form-control @error('email') is-invalid @enderror"
                                name="email" value="{{old('email')}}" placeholder="Email" required>
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-4">
                            <label class="font-weight-semibold" for="password">Password</label>
                            <input id="password" type="password"
                                class="form-control col-md-11 @error('password') is-invalid @enderror" name="password"
                                required autocomplete="new-password" placeholder="Password">
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="col-md-5">
                            <label class="font-weight-semibold" for="confirmPassword">Confirm
                                Password:</label>
                            <input id="confirmPassword" type="password" class="form-control col-md-9"
                                name="password_confirmation" required autocomplete="new-password"
                                placeholder="Confirm Password">
                        </div>
                    </div>
                    <div class="form-group">
                        <a href="{{route('admin.index')}}" class="btn btn-warning">Kembali</a>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
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
                        var bodyData= '';
                        $.each(response.data, function (key, item) {
                            document.getElementById('id_brand').value = item.id_brand;
                            document.getElementById('nama_brand').value = item.nama_brand;
                            bodyData+='<option value="'+item.id_brand+'">'+item.nama_brand+'</option>'
                        })
                        $("#bodyData").append(bodyData);
                    }
                });
            });

</script>


@endsection
