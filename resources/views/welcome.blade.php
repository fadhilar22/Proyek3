<!DOCTYPE html>
<html lang="en">
    <!-- bagian header -->
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/css/style.css">
        <title>Forasmile</title>
    </head>
    <!-- bagian body -->
    <body>
        <!-- bagian navbar -->
        <nav class="navbar navbar-expand-md bg-navbar">
            <!-- agar navbar memiliki lebar 100% layar -->
            <div class="container mx-2" style="max-width: 100%!important;">
                <!-- logo semari pada navbar -->
                <a class="navbar-brand" href="#">
                    <img src="assets/img/logo.png" class="img-logo">
                </a>
                <!-- tombol toggle pada navbar -->
                <button class="navbar-toggler navbar-dark" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample07" aria-controls="navbarsExample07" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <!-- isi navbar -->
                <div class="collapse navbar-collapse" id="navbarsExample07">
                    <!-- link yang terdapat pada navbar -->
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <!-- link untuk mengarah ke halaman tentang -->
                        <li class="nav-item">
                            <a class="nav-link text-white" aria-current="page" href="tentang.php">Tentang</a>
                        </li>
                        <!-- link untuk mengarah ke halaman kontak kami -->
                        <li class="nav-item">
                            <a class="nav-link text-white" href="kontak.php">Kontak</a>
                        </li>
                    </ul>
                    <!-- bagian isi navbar sebelah kanan (masuk) -->
                    <ul class="navbar-nav mb-2 mb-lg-0 justify-content-end">
                        <li class="nav-item">
                            <!-- teks masuk dan icon masuk -->
                            <a class="nav-link text-white" href="masuk.php">Masuk
                                <img src="assets/img/logo-user.png" style="width: 35px; margin-left: 10px;">
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- konten gambar utama (dibawah navbar) -->
        <div>
            <img class="img-fluid w-100" src="assets/img/forasmile1.png">
        </div>
        <!-- judul konten -->
        <div class="container mt-5">
            <h2>Penyaluran Dana Sedekah</h2>
        </div>
        <!-- isi konten berupa tampilan 3 buah gambar beserta keterangan -->
        <div class="container mt-4 mb-5 pb-5">
            <div class="row">
                <!-- kolom pertama  -->
                <div class="col mx-2">
                    <!-- gambar di kolom pertama -->
                    <img src="assets/img/content1.png" class="img-fluid rounded img-content">
                    <!-- keterangan untuk kolom pertama -->
                    <h5>Berbagi Makanan</h5>
                </div>
                <!-- kolom kedua -->
                <div class="col mx-2">
                    <!-- gambar di kolom kedua -->
                    <img src="assets/img/content2.png" class="img-fluid rounded img-content">
                    <!-- keterangan untuk kolom kedua -->
                    <h5>Santunan Anak Yatim/Piatu</h5>
                </div>
                <!-- kolom ketiga -->
                <div class="col mx-2">
                    <!-- gambar di kolom ketiga -->
                    <img src="assets/img/content3.png" class="img-fluid rounded img-content">
                    <!-- keterangan untuk kolom ketiga -->
                    <h5>Bazaar Gratis</h5>
                </div>
            </div>
        </div>
        <!-- bagian foter -->
        <div class="row bg-navbar w-100 mx-0 mt-5">
            <div class="col pt-2">
                <!-- logo semari -->
                <img src="assets/img/logo.png" style="width:80px">
                <div class="row my-4 ms-1">
                    <div class="col-auto">
                        <!-- logo email -->
                        <img src="assets/img/logo-mail.png" style="width:45px">
                    </div>
                    <div class="col text-white text-left py-1">
                        <!-- email semari -->
                        <span>Forasmile@gmail.com</span>
                    </div>
                </div>
                <div class="row my-4 ms-1">
                    <div class="col-auto">
                        <!-- logo instagram -->
                        <img src="assets/img/logo-ig.png" style="width:45px">
                    </div>
                    <div class="col text-white text-left py-2">
                        <!-- instagram semari -->
                        <span>@for_a_smile__</span>
                    </div>
                </div>
                <div class="row my-4 ms-1">
                    <div class="col-auto">
                        <!-- logo whatsapp -->
                        <img src="assets/img/logo-wa.png" style="width:45px">
                    </div>
                    <div class="col text-white text-left">
                        <!-- whatsapp semari -->
                        <span>Laelatul Khosi</span>
                        <br/>
                        <span>0896-3665-8471</span>
                    </div>
                </div>
            </div>
            <div class="col text-center text-white position-relative">
                <!-- teks kontak kami -->
                <h2 class="position-absolute top-0 w-100 mt-3">Kontak Kami</h2>
                <div class="position-absolute bottom-0 mb-2 w-100">
                    <!-- teks copyright -->
                    <span>Copyright @2023 Forasmile</span>
                </div>
            </div>
            <div class="col mt-5">
                <div class="row pt-4 ps-4">
                    <div class="col text-white">
                        <!-- teks powered by -->
                        <p class="text-center">Powered By :
                        </p>
                        <!-- logo semari -->
                        <p class="text-center">
                            <img src="assets/img/logo2.png" class="img-fluid" style="max-height:80px;">
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <script src="assets/bootstrap/js/bootstrap.bundle.min.js"></script>
    </body>
</html>
