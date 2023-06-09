<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Register</title>

    <!-- Custom fonts for this template-->
    <link href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{ asset('css/sb-admin-2.min.css') }}" rel="stylesheet">

    <!-- Favicon  -->
    <link rel="icon" href="{{ asset('img/logo_only.svg') }}">

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-block bg-register-image"
                        style="background-image: url('{{ asset('img/bg_register.jpeg') }}') "></div>
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
                            </div>
                            <form action="{{ route('register.simpan') }}" method="POST" class="user">
                                @csrf

                                <div class="form-group">
                                    <input name="nama" type="text"
                                        class="form-control form-control-user @error('nama')is-invalid @enderror"
                                        id="exampleInputName" placeholder="Nama Lengkap" value="{{ old('nama') }}">
                                    @error('nama')
                                        <span class="invalid-feedback">Nama Lengkap wajib diisi</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <input name="telepon" type="number"
                                        class="form-control form-control-user @error('telepon')is-invalid @enderror"
                                        id="exampleInputTelepon" placeholder="Nomor Whatsapp"
                                        value="{{ old('telepon') }}">
                                    @error('telepon')
                                        <span class="invalid-feedback">
                                            @if ($message == 'validation.unique')
                                                Nomor Whatsapp telah terdaftar
                                                @elseif ($message == 'validation.min.string')
                                                Nomor Whatsapp minimal terdiri atas 10 digit
                                            @else
                                                Nomor Whatsapp wajib diisi
                                            @endif
                                            {{-- {{ $message }} --}}
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input name="password" type="password"
                                            class="form-control form-control-user @error('password')is-invalid @enderror"
                                            id="exampleInputPassword" placeholder="Password">
                                        @error('password')
                                            <span class="invalid-feedback">
                                                @if ($message == 'validation.min.string')
                                                    Password minimal 8 karakter
                                                @elseif ($message == 'validation.confirmed')
                                                    Konfirmasi password salah
                                                @else
                                                    Password wajib diisi
                                                @endif
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-sm-6">
                                        <input name="password_confirmation" type="password"
                                            class="form-control form-control-user @error('password_confirmation')is-invalid @enderror"
                                            id="exampleRepeatPassword" placeholder="Konfirmasi Password">
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary btn-user btn-block">Register
                                    Account</button>
                            </form>
                            <br>
                            <div class="text-center">
                                <p>Sudah punya akun? <a href="{{ route('login') }}">Masuk disini!</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{ asset('vendor/jquery-easing/jquery.easing.min.js') }}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{ asset('js/sb-admin-2.min.js') }}"></script>

</body>

</html>
