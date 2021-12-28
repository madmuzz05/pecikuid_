<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from www.themenate.net/enlink-bs/dist/sign-up-2.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 05 Dec 2021 04:51:55 GMT -->

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>PECIKUID. - Register</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('assets/images/logo/favicon.png') }}">

    <!-- page css -->
    @include('layouts.admin.css')

    <!-- Core css -->
    <link href="{{ asset('assets/css/app.min.css') }}" rel="stylesheet">

</head>

<body>
    <div class="app">
        <div class="container-fluid">
            <div class="d-flex full-height p-v-20 flex-column justify-content-between">
                <div class="d-none d-md-flex p-h-40">
                    <img src="{{ asset('assets/images/logo/logo.png') }}" alt="">
                </div>
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-md-6 d-none d-md-block">
                            <img class="img-fluid" src="{{ asset('assets/images/others/sign-up-2.png') }}" alt="">
                        </div>
                        <div class="m-l-auto col-md-5">
                            <div class="card">
                                <div class="card-body">
                                    <h2 class="m-t-20">Sign Up</h2>
                                    <p class="m-b-30">Create your brand accout for credential to get access</p>
                                    <form method="POST" action="{{ route('brand.store') }}">
                                        @csrf
                                        <div class="form-group">
                                            <label class="font-weight-semibold" for="Brand">Nama Brand:</label>
                                            <input type="text" class="form-control @error('brand') is-invalid @enderror"
                                                name="brand" value="{{ old('brand') }}" required autocomplete="brand"
                                                autofocus id="Brand" placeholder="Nama Brand">
                                            @error('brand')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label class="font-weight-semibold" for="Name">Nama Owner:</label>
                                            <input type="text" class="form-control @error('name') is-invalid @enderror"
                                                name="name" value="{{ old('name') }}" required autocomplete="name"
                                                autofocus id="Name" placeholder="Nama Owner">
                                            @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label class="font-weight-semibold" for="Alamat">Alamat:</label>
                                            <input type="text"
                                                class="form-control @error('alamat') is-invalid @enderror" name="alamat"
                                                value="{{ old('alamat') }}" required autocomplete="alamat" autofocus
                                                id="Alamat" placeholder="Alamat">
                                            @error('alamat')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label class="font-weight-semibold" for="Telepon">No Telepon:</label>
                                            <input type="text"
                                                class="form-control @error('telepon') is-invalid @enderror"
                                                name="telepon" value="{{ old('telepon') }}" required
                                                autocomplete="telepon" autofocus id="Telepon" placeholder="Telepon">
                                            @error('telepon')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label class="font-weight-semibold" for="Kelamin">Jenis Kelamin:</label>
                                            <select class="select2  @error('jenis_kelamin') is-invalid @enderror"
                                                name="jenis_kelamin" id="Kelamin" autocomplete="jenis_kelamin" autofocus
                                                required>
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
                                        <div class="form-group">
                                            <label class="font-weight-semibold" for="email">Email:</label>
                                            <input id="email" type="email"
                                                class="form-control @error('email') is-invalid @enderror" name="email"
                                                value="{{ old('email') }}" required autocomplete="email"
                                                placeholder="Email">
                                            @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <div class="form-group">
                                                    <label class="font-weight-semibold" for="password">Password:</label>
                                                    <input id="password" type="password"
                                                        class="form-control @error('password') is-invalid @enderror"
                                                        name="password" required autocomplete="new-password"
                                                        placeholder="Password">
                                                    @error('password')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-group">
                                                    <label class="font-weight-semibold" for="confirmPassword">Confirm
                                                        Password:</label>
                                                    <input id="confirmPassword" type="password" class="form-control"
                                                        name="password_confirmation" required
                                                        autocomplete="new-password" placeholder="Confirm Password">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="d-flex align-items-center justify-content-between">
                                                <span class="font-size-13 text-muted">
                                                    Have an account?
                                                    <a class="small" href="{{ route('login') }}"> Signin</a>
                                                </span>
                                                <button type="submit" class="btn btn-primary">Sign Up</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="d-none d-md-flex  p-h-40 justify-content-between">
                    <span class="">© 2021 PECIKUID.</span>
                </div>
            </div>
        </div>
    </div>


    <!-- Core Vendors JS -->
    <script src="{{ asset('assets/js/vendors.min.js') }}"></script>

    <!-- page js -->
    @include('layouts.admin.js')
    <!-- Core JS -->
    <script src="{{ asset('assets/js/app.min.js') }}"></script>

</body>


<!-- Mirrored from www.themenate.net/enlink-bs/dist/sign-up-2.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 05 Dec 2021 04:51:57 GMT -->

</html>
