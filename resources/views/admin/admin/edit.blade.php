@extends('layouts.admin.admin')
@section('title', 'Data Admin')
@section('content')
<!-- Content Wrapper START -->
<div class="main-content">
    @foreach($data as $d)
    <div class="page-header">
        <h2 class="header-title">Data Admin</h2>
        <div class="header-sub-title">
            <nav class="breadcrumb breadcrumb-dash">
                <span class="breadcrumb-item"><i class="anticon anticon-appstore m-r-5"></i>Master Data</span>
                <a href="{{route('admin.index')}}" class="breadcrumb-item">Data Admin</a>
                <span class="breadcrumb-item active">Edit {{$d->name}}</span>
            </nav>
        </div>
    </div>
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Edit Infomation</h4>
            </div>
            <div class="table-responsive overflow-auto">
                <div class="card-body">
                    <div class="form-group col-md-4">
                        <a href="{{ URL::previous() }}" class="btn btn-warning btn-tone btn-sm"><i class="anticon anticon-left"></i>
                            Kembali</a>
                    </div>
                    <hr class="m-v-25">
                    <div class="media align-items-center m-t-40">
                            <div class="avatar avatar-image  m-h-10 m-r-15" style="height: 80px; width: 80px">
                                <img id="output" src="{{ url('/images/'.$d->foto) }}" alt="">
                            </div>
                            <div class="m-l-20 m-r-20">
                                <h5 class="m-b-5 font-size-18">{{$d->name}}</h5>
                                <p class="opacity-07 font-size-13 m-b-0">
                                    {{$d->is_admin}}
                                </p>
                                <br>
                            </div>
                            <div>
                                <button class="btn btn-tone btn-secondary btn-sm"
                                onclick="thisFileUpload();">Upload</button>
                            </div>
                        </div>
                        <form method="POST" action="{{ route('admin.update') }}" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="id" value="{{$d->id}}">
                            <input type="hidden" name="is_admin" value="{{$d->is_admin}}">
                            <input type="file" accept="image/*" id="file" name="foto"
                            onchange="loadFile(event)" style="display:none;" />
                        <hr class="m-v-25">
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label class="font-weight-semibold" for="userName">Nama:</label>
                                <input type="text" class="form-control" id="userName" name="name" placeholder="Nama"
                                    value="{{$d->name}}">
                            </div>
                            <div class="form-group col-md-4">
                                <label class="font-weight-semibold" for="email">Email:</label>
                                <input type="email" class="form-control" id="email" name="email" placeholder="email"
                                    value="{{$d->email}}">
                            </div>
                            <div class="form-group col-md-4">
                                <label class="font-weight-semibold" for="language">Brand:</label>
                                <input type="text" id="nama_brand" class="form-control @error('brand') is-invalid @enderror"
                                value="{{old('alamat')}}" placeholder="Brand" disabled>
                                <input type="hidden" name="brand" id="id_brand">
                                <!-- <select id="bodyData" name="brand" class="select2">
                                    <option value="{{$d->id_brand}}">{{$d->nama_brand}}</option>
                                </select> -->
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label class="font-weight-semibold" for="phoneNumber">Telepon:</label>
                                <input type="text" class="form-control" id="phoneNumber" name="telepon"
                                    value="{{$d->telepon}}" placeholder="Telepon">
                            </div>
                            <div class="form-group col-md-4">
                                <label class="font-weight-semibold" for="dob">Alamat:</label>
                                <input type="text" class="form-control" id="dob" name="alamat" value="{{$d->alamat}}"
                                    placeholder="Alamat">
                            </div>
                            <div class="form-group col-md-4">
                                <label class="font-weight-semibold" for="language">Jenis Kelamin:</label>
                                <select id="language" name="jenis_kelamin" class="select2">
                                    <option value="{{$d->jenis_kelamin}}">{{$d->jenis_kelamin}}</option>
                                    <option value="laki-laki">Laki-Laki</option>
                                    <option value="perempuan">Perempuan</option>
                                </select>
                            </div>
                            <div class="form-group col-md-4">
                                <button type="submit" class="btn btn-primary m-t-30">Simpan</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Change Password</h4>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('admin.password') }}">
                    @csrf
                    <input type="hidden" name="id" value="{{$d->id}}">
                    <input type="hidden" name="password" value="{{$d->password}}">
                    <div class="form-row">
                        <div class="form-group col-md-3">
                            <label class="font-weight-semibold" for="oldPassword">Old Password:</label>
                            <input type="password" class="form-control" id="oldPassword" name="old_password" placeholder="Old Password" autocomplete="old_password">
                        </div>
                        <div class="form-group col-md-3">
                            <label class="font-weight-semibold" for="newPassword">New Password:</label>
                            <input type="password" class="form-control" id="newPassword" name="new_password" placeholder="New Password" autocomplete="old_password">
                        </div>
                        <div class="form-group col-md-3">
                            <label class="font-weight-semibold" for="confirmPassword">Confirm Password:</label>
                            <input type="password" class="form-control" name="confirm_password" id="confirmPassword"
                                placeholder="Confirm Password" autocomplete="old_password">
                        </div>
                        <div class="form-group col-md-3">
                            <button type="submit" class="btn btn-primary m-t-30">Simpan</button>
                        </div>
                    </div>
                </form>
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
