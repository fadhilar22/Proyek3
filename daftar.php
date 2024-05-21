<?php
include "assets/database.php";
error_reporting(1);
if (isset($_POST['username'])) {
    $db = new database();
    $email = $_POST['email'];
    $nama = $_POST['nama'];
    $nohp = $_POST['nohp'];
    $alamat = $_POST['alamat'];
    $username = $_POST['username'];
    $password = $db->escape_string(md5($_POST['password']));
    $password_confirm = $db->escape_string(md5($_POST['password_confirm']));
    $cekKode = $db->get_data("SELECT COUNT(username) AS jml FROM donatur WHERE email='" . $email . "'");
    if ($password != $password_confirm) {
        echo "<script> alert('Konfirmasi password tidak cocok'); history.back();</script>";
    }
    else {
        if ($cekKode['jml'] >= 1) {
            echo "<script> alert('User dengan email tersebut sudah terdaftar'); history.back();</script>";
        } else {
            $query = true;
            $query = $db->query_data("INSERT INTO donatur (nama, username, password, no_hp, email, alamat)
                            VALUES ('" . $nama . "','" . $username . "','" . $password . "','" . $nohp . "','" . $email . "','" . $alamat . "')");
            if ($query == true) {
                echo "<script> alert('Akun baru berhasil dibuat!,  Silahkan Login..'); document.location='masuk.php';</script>";
            } else {
                echo "<script> alert('Gagal membuat akun baru!'); document.location='daftar.php';</script>";
            }
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<!-- bagian header -->

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Daftar</title>
</head>
<!-- bagian body -->

<body>
    <!-- bagian navbar -->
    <nav class="navbar navbar-expand-md bg-navbar">
        <div class="container mx-2" style="max-width: 100%!important;">
            <div class="collapse navbar-collapse text-center" id="navbarsExample07">
                <ul class="navbar-nav mb-lg-0 w-100">
                    <li class="nav-item text-white w-100">
                        <h4 class="">Daftar</h4>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- konten gambar utama (dibawah navbar) -->
    <div style="background-image: url('./assets/img/bg-login-signup.jpeg'); padding: 50px;">
        <form name="form" method="POST" action="">
            <div class="card card-form py-3">
                <div class="row">
                    <div class="col text-center">
                        <img src="assets/img/logo.png" style="width: 100px;">
                    </div>
                </div>
                <div class="row">
                    <div class="col text-center fw-bold fs-4 pt-1">
                        Daftar Akun Baru
                    </div>
                </div>
                <div class="row">
                    <div class="col text-center">
                        Sudah punya akun <b>Forasmile? </b><a href="masuk.php">Masuk</a>
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col ms-5">
                        Isi Data Di Bawah Ini Dengan Benar
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col ms-5 fw-bold">
                        Email
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col ms-5 fw-bold">
                        <input type="email" name="email" style="width: 90%; border: none; border-bottom: 2px solid black; background: none;" required>
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col ms-5 fw-bold">
                        Nama
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col ms-5 fw-bold">
                        <input type="text" name="nama" style="width: 90%; border: none; border-bottom: 2px solid black; background: none;" required>
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col ms-5 fw-bold">
                        Nomor HP
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col ms-5 fw-bold">
                        <input type="text" name="nohp" style="width: 90%; border: none; border-bottom: 2px solid black; background: none;" required>
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col ms-5 fw-bold">
                        Alamat
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col ms-5 fw-bold">
                        <textarea name="alamat" rows="4" style="width: 90%; " required></textarea>
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col ms-5 fw-bold">
                        Username
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col ms-5 fw-bold">
                        <input type="text" name="username" style="width: 90%; border: none; border-bottom: 2px solid black; background: none;" required>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col ms-5 fw-bold">
                        Password
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col ms-5 fw-bold">
                        <input type="password" name="password" style="width: 90%; border: none; border-bottom: 2px solid black; background: none;" required>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col ms-5 fw-bold">
                        Konfirmasi Password
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col ms-5 fw-bold">
                        <input type="password" name="password_confirm" style="width: 90%; border: none; border-bottom: 2px solid black; background: none;" required>
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col mx-5 fw-bold">
                        <button type="submit" class="btn btn-primary w-100" style="background-color: #1EAAD6; border-radius: 20px;">Daftar</button>
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col mx-5 text-center fs-6">
                        <div>Dengan mendaftar, kamu setuju dengan <a href="#" class="text-dark">syarat dan ketentuan</a> Semari.com</div>
                    </div>
                </div>

            </div>
        </form>
    </div>
    <script src="assets/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>
