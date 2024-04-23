<?php
include "assets/database.php";
session_start();
$db = new database();
if (isset($_SESSION['role'])) {
    $data_profil = $db->get_data("SELECT * FROM donatur WHERE username='" . $_SESSION['username'] . "'" . " AND nama='" . $_SESSION['nama'] . "'");
    if (isset($_POST['nama'])) {
        $id = $_POST['id'];
        $nama = $_POST['nama'];
        $nohp = $_POST['nohp'];
        $alamat = $_POST['alamat'];
        $query = $db->query_data("UPDATE donatur SET
                                        nama='" . $nama . "',
                                        no_hp='" . $nohp . "',
                                        alamat='" . $alamat . "'
                                        WHERE
                                        id='" . $id . "'");
        if ($query) {
            $_SESSION['nama'] = $nama;
            echo "<script> alert('Berhasil Update Data'); document.location='user.php'</script>";
        } else {
            echo "<script> alert('Gagal'); </script>";
        }
    }
    if (isset($_POST['foto'])) {
        $gambar_nama = $_FILES['foto_profil']['name'];
        $gambar_temp = $_FILES['foto_profil']['tmp_name'];
        $gambar_size = $_FILES['foto_profil']['size'];
        $gambar_type = $_FILES['foto_profil']['type'];

        if (
            $gambar_type != 'image/jpeg'
            & $gambar_type != 'image/pjpeg'
            & $gambar_type != 'image/gif'
            & $gambar_type != 'image/png'
        ) {
            echo "<script> alert('" . $gambar_type . " Gambar tidak di kenali'); </script>";
        } else {
            $query = $db->query_data("UPDATE donatur SET
                                foto_profil='" . $gambar_nama . "'
                                WHERE
                                id='" . $_POST['id'] . "'");
            if ($query) {
                //hapus gambar sebelumnya
                unlink("assets/img/userprofile/" . $_POST['gambar_lama']);
                //upload gambar baru
                move_uploaded_file($gambar_temp, "./assets/img/userprofile/" . $gambar_nama);
                echo "<script> alert('Berhasil'); </script>";
            } else {
                echo "<script> alert('Gagal'); </script>";
            }
        }
    }
?>
    <!DOCTYPE html>
    <html lang="en">
    <!-- bagian head -->

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/css/style.css">
        <title>User</title>
    </head>
    <!-- bagian body -->

    <body>
        <!-- navbar -->
        <nav class="navbar navbar-expand-md bg-navbar">
            <!-- agar navbar memiliki lebar 100% layar -->
            <div class="container mx-2" style="max-width: 100%!important;">
                <!-- logo home -->
                <a class="navbar-brand" href="index.php">
                    <img src="assets/img/logo-home.png" class="img-logo">
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
                            <a class="nav-link text-white" href="tentang.php">Kontak</a>
                        </li>
                    </ul>
                    <!-- bagian isi navbar sebelah kanan (masuk) -->
                    <ul class="navbar-nav mb-2 mb-lg-0 justify-content-end">
                        <li class="nav-item">
                            <a class="nav-link text-white me-5 mt-1" href="logout.php">Logout</a>
                        </li>
                        <li class="nav-item">
                            <a class="navbar-brand" href="#">
                                <img src="assets/img/logo.png" class="img-logo">
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- konten dibawah navbar dengan background oranye-->
        <div class="bg-orange px-3 py-3 pb-5">
            <div class="row mt-3">
                <div class="col-2 ms-2 text-center">
                    <?php
                    if ($data_profil['foto_profil'] != null) {
                    ?>
                        <img src="./assets/img/userprofile/<?= $data_profil['foto_profil'] ?>" class="img-fluid" style="width: 200px; border-radius: 50%;">
                    <?php
                    } else {
                    ?>
                        <img src="./assets/img/logo-user.png" class="img-fluid" style="width: 200px; border-radius: 50%;">
                    <?php
                    }
                    ?>

                    <div class="mt-2"><b><?= $data_profil['nama'] ?></b></div>
                </div>
                <div class="col-auto">
                    <div class="row">
                        <div class="card p-3">Jumlah Keseluruhan Sedekah Anda</div>
                    </div>
                    <?php
                    $data_sedekah = $db->get_data("SELECT sum(dana_masuk) as jml FROM `dana` WHERE id_donatur='" . $_SESSION['id'] . "' AND MONTH(tanggal)=MONTH(now()) AND YEAR(tanggal) = YEAR(now())");
                    $data_sedekah_total = $db->get_data("SELECT sum(dana_masuk) as jml FROM `dana` WHERE id_donatur='" . $_SESSION['id'] . "'");
                    ?>
                    <div class="row mt-3">
                        <div class="card p-3 py-4">
                            <div style="border-bottom: 1px solid black">
                                Rp. <?= $data_sedekah['jml'] ?>;
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-2 ms-2"></div>
            <div class="col-auto ps-4">
                <div class="row">
                    <div class="card p-3">Jumlah Sedekah Anda Bulan Ini</div>
                </div>
                <div class="row mt-3">
                    <div class="card p-3 py-4">
                        <div style="border-bottom: 1px solid black">
                            Rp. <?= $data_sedekah_total['jml'] ?>;
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <form method="POST" action="">
            <div class="row text-center fs-3 mt-5">
                <div class="col">Tambahkan Alamat Rumah</div>
            </div>
            <div class="row fs-4">
                <div class="col-auto" style="margin: 0px auto;">
                    <label for="inputNama">Kontak</label>
                    <br />
                    <input name="nama" class="fs-5 p-2" type="text" placeholder="Nama" style="width: 700px; background-color: rgb(211, 211, 211);" value="<?= $data_profil['nama'] ?>" required>
                </div>
            </div>
            <div class="row fs-4 mt-3">
                <div class="col-auto" style="margin: 0px auto;">
                    <input name="nohp" class="fs-5 p-2" type="number" placeholder="No. Telepon" style="width: 700px; background-color: rgb(211, 211, 211);" value="<?= $data_profil['no_hp'] ?>" required>
                </div>
            </div>
            <div class="row fs-4 mt-3">
                <div class="col-auto" style="margin: 0px auto;">
                    <label for="inputNama">Alamat Lengkap</label>
                    <br />
                    <textarea name="alamat" rows="5" class="fs-5 p-2" type="number" style="width: 700px; background-color: rgb(211, 211, 211);" required><?= $data_profil['alamat'] ?></textarea>
                </div>
            </div>
            <input type="hidden" name="id" value="<?= $data_profil['id'] ?>">
            <div class="row fs-4 mt-3">
                <div class="col-auto" style="margin: 0px auto;">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </div>
        </form>

        <form method="POST" action="" enctype="multipart/form-data">
            <div class="row text-center fs-3 mt-5">
                <div class="col">Tambahkan Foto Profil</div>
            </div>
            <div class="row fs-4 mt-3">
                <div class="col-auto" style="margin: 0px auto;">
                    <label>Gambar: </label>
                    <?php
                    if ($data_profil['foto_profil'] != null) {
                    ?>
                        <img src="./assets/img/userprofile/<?= $data_profil['foto_profil'] ?>" class="img-responsive" style="width:80px;"><br>
                    <?php
                    }
                    ?>
                    <input type="file" name="foto_profil" class="form-control">
                </div>
            </div>
            <input type="hidden" name="foto" value="<?= $data_profil['id'] ?>">
            <input type="hidden" name="gambar_lama" value="<?= $data_profil['foto_profil'] ?>">
            <input type="hidden" name="id" value="<?= $data_profil['id'] ?>">
            <div class="row fs-4 mt-3">
                <div class="col-auto" style="margin: 0px auto;">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </div>
        </form>


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
                        <br />
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
<?php
} else {
    echo "<script> alert('Silahkan Login!'); document.location='index.php'</script>";
}
?>