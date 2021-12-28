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
                <span class="breadcrumb-item active">Detail {{$d->name}}</span>
            </nav>
        </div>
    </div>
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Detail Infomation</h4>
            </div>
            <div class="table-responsive overflow-auto">
                <div class="card-body">
                    <div class="form-group col-md-4">
                        <a href="{{ URL::previous() }}" class="btn btn-warning btn-tone btn-sm"><i class="anticon anticon-left"></i>
                            Kembali</a>
                    </div>
                    <hr class="m-v-25">
                    <div class="media align-items-center m-t-40">
                            <div class="avatar avatar-image  m-h-10 m-r-15" style="width: 150px; height:150px">
                                <img id="output" src="{{ url('/images/'.$d->foto) }}" alt="">
                            </div>
                            <div class="m-l-20 m-r-20">
                                <h2 class="m-b-5">{{$d->name}}</h2>
                                <p class="text-opacity font-size-15">{{$d->is_admin}}</p>
                                <br>
                            </div>
                        </div>
                        <form>
                        <hr class="m-v-25">
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label class="font-weight-semibold" for="userName">Nama:</label>
                                <input type="text" class="form-control" id="userName" name="name" placeholder="Nama"
                                    value="{{$d->name}}" disabled>
                            </div>
                            <div class="form-group col-md-4">
                                <label class="font-weight-semibold" for="email">Email:</label>
                                <input type="email" class="form-control" id="email" name="email" placeholder="email"
                                    value="{{$d->email}}" disabled>
                            </div>
                            <div class="form-group col-md-4">
                                <label class="font-weight-semibold" for="language">Brand:</label>
                                <input type="text" id="nama_brand" class="form-control @error('brand') is-invalid @enderror"
                                value="{{old('alamat')}}" placeholder="Brand" disabled>
                                <input type="hidden" name="brand" id="id_brand">
                                <!-- <select id="bodyData" name="brand" class="select2" disabled>
                                    <option value="{{$d->id_brand}}">{{$d->nama_brand}}</option>
                                </select> -->
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label class="font-weight-semibold" for="phoneNumber">Telepon:</label>
                                <input type="text" class="form-control" id="phoneNumber" name="telepon"
                                    value="{{$d->telepon}}" placeholder="Telepon" disabled>
                            </div>
                            <div class="form-group col-md-4">
                                <label class="font-weight-semibold" for="dob">Alamat:</label>
                                <input type="text" class="form-control" id="dob" name="alamat" value="{{$d->alamat}}"
                                    placeholder="Alamat" disabled>
                            </div>
                            <div class="form-group col-md-4">
                                <label class="font-weight-semibold" for="language">Jenis Kelamin:</label>
                                <select id="language" name="jenis_kelamin" class="select2" disabled>
                                    <option value="{{$d->jenis_kelamin}}">{{$d->jenis_kelamin}}</option>
                                    <option value="laki-laki">Laki-Laki</option>
                                    <option value="perempuan">Perempuan</option>
                                </select>
                            </div>
                        </div>
                    </form>
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
