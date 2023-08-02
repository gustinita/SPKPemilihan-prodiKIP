<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="{{asset ('/template/frontend/images/logo.png')}}" type="image/x-icon">
    <title>Sistem Informasi Tugas Akhir</title>
    <link rel="stylesheet" href="{{asset ('/template/frontend/libraries/bootstrap/css/bootstrap.css')}}">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{asset ('/template/frontend/styles/main.css')}}">

</head>

<body>
    <!-- Login -->
    <section class="gate">
        <div class="row justify-content-center">
            <div class="col-lg-5 showcase">
                <img src="{{asset ('/template/frontend/images/banner-login.png')}}" class="banner">
            </div>
            <div class="col-lg-7 col-10 pb-5">
                <div class="row">
                    <div class="col-lg-6 offset-lg-2 col-12">
                        <div class="content">
                            <a href="#">
                                <img src="{{asset ('/template/frontend/images/logo-umbjm.svg')}}" class="logo mb-5">
                            </a>
                            <h1 class="header-primary mb-5">
                                Silahkan Daftar
                            </h1>
                            <div class="form-group">
                                <form action="{{route('simpanregistrasi')}}" method="post">
                                    {{csrf_field()}}
                                    <div class="mb-3">
                                        <label for="name" class="form-label">Nama</label>
                                        <input type="text" name="name" class="form-control" id="name">
                                    </div>
                                    <div class="mb-3">
                                        <label for="name" class="form-label">Email</label>
                                        <input type="text" name="email" class="form-control" id="email">
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleInputPassword1" class="form-label">Password</label>
                                        <input name="password" type="password" class="form-control" id="exampleInputPassword1">
                                    </div>

                                    <div class="divider"></div>
                                    <button type="submit" href="#" class="mt-4 btn-primary btn-lg">Daftar Sekarang</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="{{asset ('/template/frontend/libraries/jquery/jquery-3.6.0.js')}}"></script>
    <script src="{{asset ('/template/frontend/libraries/bootstrap/js/bootstrap.js')}}"></script>

</body>

</html>