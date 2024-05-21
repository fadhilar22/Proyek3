<!DOCTYPE html>
<html lang="en">
<!-- bagian header -->

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Masuk</title>
</head>
<!-- bagian body -->

<body>
    <!-- bagian navbar -->
    <nav class="navbar navbar-expand-md bg-navbar">
        <div class="container mx-2" style="max-width: 100%!important;">
            <div class="collapse navbar-collapse text-center" id="navbarsExample07">
                <ul class="navbar-nav mb-lg-0 w-100">
                    <li class="nav-item text-white w-100">
                        <h4 class="">Masuk</h4>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- konten gambar utama (dibawah navbar) -->
    <div style="background-image: url('./assets/img/bg-login-signup.png'); padding: 50px;">
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif
        <form name="form" method="POST" action="{{ route('login') }}">
            @csrf
            <div class="card card-form py-3">
                <div class="row">
                    <div class="col text-center">
                        <img src="assets/img/logo.png" style="width: 100px;">
                    </div>
                </div>
                <div class="row">
                    <div class="col text-center fw-bold fs-4 pt-1">
                        Selamat Datang di For a smile
                    </div>
                </div>
                <div class="row">
                    <div class="col text-center">
                        Untuk Sebuah Senyuman
                    </div>
                </div>
                <div class="row mt-5">
                    <div class="col ms-5">
                        Masuk untuk mulai berpartisipasi
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col ms-5 fw-bold">
                        Login Sebagai
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col ms-5 fw-bold">
                        <select class="form-select" name="role" style="width: 90%;">
                            <option value="user">User</option>
                            <option value="admin">Admin</option>
                        </select>
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col ms-5 fw-bold">
                        Email atau Username
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col ms-5 fw-bold">
                        <input type="text" name="username"
                            style="width: 90%; border: none; border-bottom: 2px solid black; background: none;">
                    </div>
                </div>
                <div class="row mt-5">
                    <div class="col ms-5 fw-bold">
                        Password
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col ms-5 fw-bold">
                        <input type="password" name="password"
                            style="width: 90%; border: none; border-bottom: 2px solid black; background: none;">
                    </div>
                </div>
                <div class="row mt-2 justify-content-between w-100">
                    <div class="col ms-5">
                        <input type="checkbox" id="remind">
                        <label for="remind">Remind me</label><br>
                    </div>
                    <div class="col text-end me-3">
                        <a href="#">Lupa password?</a>
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col mx-5 fw-bold">
                        <button type="submit" class="btn btn-primary w-100"
                            style="background-color: #1EAAD6; border-radius: 20px;">Sign in</button>
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col mx-5 text-center">
                        <div>Belum punya akun <b>Forasmile?</b> <a href="/daftar">Daftar</a></div>
                    </div>
                </div>

            </div>
        </form>
    </div>
    <script src="assets/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>
