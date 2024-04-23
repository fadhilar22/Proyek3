<!DOCTYPE html>
<html lang="en">
    <!-- bagian head -->
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/css/style.css">
        <title>Kontak</title>
    </head>
    <!-- bagian body -->
    <body>
        <!-- navbar -->
        <nav class="navbar navbar-expand-md bg-navbar">
            <div class="container mx-2" style="max-width: 100%!important;">
                <!-- logo home -->
                <a class="navbar-brand" href="index.php">
                    <img src="assets/img/logo-home.png" class="img-logo">
                </a>
                <!-- tombol toggle pada navbar -->
                <button class="navbar-toggler navbar-dark" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample07" aria-controls="navbarsExample07" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <!-- teks tentang semari -->
                <div class="collapse navbar-collapse text-center" id="navbarsExample07">
                    <ul class="navbar-nav mb-2 mb-lg-0 w-100">
                        <li class="nav-item text-white w-100">
                            <h4 class="">Kontak Kami</h4>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- konten dibawah navbar dengan background oranye-->
        <div class="bg-orange px-3 py-3 pb-5">
            <!-- logo semari -->
            <img src="assets/img/logo.png" style="width: 90px;">
            <!-- teks dibawah logo semari -->
            <div class="text-form text-white">
                Donasi sekarang?
                <br/>
                isi form di bawah ini
            </div>
        </div>
        <div>
            <!-- bagian form -->
            <!DOCTYPE html>
<html>
<head>
    <title>Web Sedekah Online</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0px;
        }

        h1 {
            text-align: center;
        }

        form {
            max-width: 400px;
            margin: 0 auto;
        }

        label {
            display: block;
            margin-bottom: 10px;
        }

        input, select, textarea {
            width: 100%;
            padding: 5px;
            margin-bottom: 10px;
        }

        textarea {
            height: 100px;
        }

        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
            padding: 10px 20px;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <h1> Donasi</h1>

    <form action="proses.php" method="POST">
        <label for="nama">Nama:</label>
        <input type="text" id="nama" name="nama" required>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>

        <label for="jumlah_donasi">Jumlah Donasi:</label>
        <input type="number" id="jumlah_donasi" name="jumlah_donasi" required>

        <label for="metode_pembayaran">Metode Pembayaran:</label>
        <select id="metode" name="metode_pembayaran" required>
            <option value="transfer">Transfer Bank</option>
            <option value="aplikasi">aplikasi</option>
            <option value="tunai">Tunai</option>
        </select>

        <label for="pesan">Pesan:</label>
        <textarea id="pesan" name="pesan"></textarea>

        
    </form>
                <!-- bagian tombol kirim -->
                <div class="row">
                    <div class="col">
                        <div class="text-center mt-4">
                            <button type="button" class="btn btn-primary p-2 px-4">Kirim</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- bagian untuk mengisi ruang kosong antara konten dan footer -->
        <div class="filler"></div>
        <!-- bagian footer -->
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