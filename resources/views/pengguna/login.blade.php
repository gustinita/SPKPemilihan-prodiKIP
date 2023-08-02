<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SPK PEMILIHAN PRODI | Log in</title>

    <!-- Custom fonts for this template-->
    <link href="{{ asset('SB2/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{ asset('SB2/css/sb-admin-2.min.css') }}" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">
            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-5">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <img src="{{ asset('/template/frontend/images/umbjm.jpg') }}" class="col-lg-7" alt="image"
                            height="430" width="30" alt="image"></i>
                        <div class="col-lg-5">
                            <div class="p-3">
                                <div class="text-center">
                                    <a class="h4 text-blue-1800 mb-4"><b>SPK</b><br>Pemilihan Program Studi Calon
                                        Mahasiswa KIP Fakultas Teknik</a><br><br>
                                    <h1 class="h3 text-gray-900 mb-4">Silahkan Login</h1>
                                </div>
                                <form action="{{ route('postlogin') }}" method="post">
                                    {{ csrf_field() }}
                                    <div class="form-group">
                                        <input type="email" class="form-control" name="email" placeholder="Email">
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control" name="password"
                                            placeholder="Password">
                                    </div>
                                    <div class="form-group">
                                        <div class="custom-control custom-checkbox small">
                                            <input type="checkbox" class="custom-control-input" id="customCheck">
                                            <label class="custom-control-label" for="customCheck">Remember
                                                Me</label>
                                        </div>
                                    </div>
                                    <input type="submit" name="submit" value="Login"
                                        class="btn btn-primary btn-block">
                                </form><br>
                                <hr>
                                <div class="text-center">
                                    <a class="medium" href="/registrasi">Buat Akun Baru</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('SB2/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('SB2/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{ asset('SB2/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{ asset('SB2/js/sb-admin-2.min.js') }}"></script>

</body>

</html>
