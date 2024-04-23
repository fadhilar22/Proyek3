<?php
include "assets/database.php";
session_start();
$db = new database();
$data_profil = $db->get_data("SELECT * FROM admin WHERE username='" . $_SESSION['username'] . "'" . " AND nama='" . $_SESSION['nama'] . "'");
if (isset($_POST['sedekah'])) {
    $id_donatur = $_POST['id'];
    $jumlah = $_POST['jumlah'];
    $query = $db->query_data("INSERT INTO dana (id_donatur, dana_masuk)
                              VALUES ('" . $id_donatur . "', '" . $jumlah . "')");
    if ($query) {
        echo "<script> alert('Berhasil'); document.location='admin.php'; </script>";
    } else {
        echo "<script> alert('Gagal'); document.location='admin.php'</script>";
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
    <title>Admin</title>
</head>
<!-- bagian body -->

<body>
    <!-- navbar -->
    <nav class="navbar navbar-expand-md bg-navbar">
        <!-- agar navbar memiliki lebar 100% layar -->
        <div class="container mx-2" style="max-width: 100%!important;">
            <!-- logo home -->
            <a class="navbar-brand" href="admin.php">
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
                        <a class="nav-link text-white" href="kontak.php">Kontak</a>
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
                <img src="assets/img/admin.jpeg" class="img-fluid" style="width: 200px; border-radius: 50%;">
                <div class="mt-2"><b><?= $data_profil['nama'] ?></b></div>
            </div>
            <div class="col-auto"></div>
        </div>
    </div>
    <div class="row mt-5 m-3">
        <?php
        if (isset($_POST['user_selected'])) { ?>
            <div class="col-9 p-4" style="border: 1px solid black;">
                <div class="row">
                    <div class="col-auto">
                        <?php
                        if ($_POST['foto_profil'] != "null") {
                        ?>
                            <img src="./assets/img/userprofile/<?= $_POST['foto_profil'] ?>" style="width: 50px; border-radius: 50%;"><br />
                        <?php
                        } else {
                        ?>
                            <img src="./assets/img/logo-user.png" class="img-fluid" style="width: 50px; border-radius: 50%; background: orange;">
                        <?php
                        }
                        ?>
                    </div>
                    <div class="col-auto mt-3">
                        <?= $_POST['nama_user'] ?>
                    </div>
                </div>

                <div class="row mt-4">Alamat Lengkap</div>
                <div class="row mt-3">
                    <div class="card p-3 py-4 " style="background-color: rgb(211, 211, 211);">
                        <div style="border-bottom: 1px solid black"><?= $_POST['nohp_user'] ?> | <?= $_POST['nama_user'] ?><br /><?= $_POST['alamat_user'] ?></div>
                    </div>
                </div>
                <form method="POST" action="">
                    <div class="row mt-4">Input Jumlah Sedekah <?= $_POST['nama_user'] ?></div>
                    <div class="row mt-3">
                        <div class="card p-3 py-4 " style="background-color: rgb(211, 211, 211); width: 250px;">
                            <div style="border-bottom: 1px solid black">
                                <span>Rp. </span><input type="text" name="jumlah" style="background: none; border: none;" required>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-4">Sedekah <?= $_POST['nama_user'] ?> Bulan ini</div>
                    <?php
                    $data_sedekah = $db->get_data("SELECT sum(dana_masuk) as jml FROM `dana` WHERE id_donatur='" . $_POST['id'] . "' AND MONTH(tanggal)=MONTH(now()) AND YEAR(tanggal) = YEAR(now())");
                    ?>
                    <div class="row mt-3">
                        <div class="card p-3 py-4 " style="background-color: rgb(211, 211, 211); width: 250px;">
                            <div style="border-bottom: 1px solid black">
                                <span>Rp. </span><input type="text" style="background: none; border: none;" value="<?= $data_sedekah['jml'] ?>" disabled>
                            </div>
                        </div>
                    </div>
                    <input type="hidden" name="id" value="<?= $_POST['id'] ?>">
                    <input type="hidden" name="sedekah" value="">
                    <div class="row mt-3">
                        <div class="col-auto text-center" style="width: 250px;">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </div>
                </form>
            </div>
        <?php
        } else {
            $user_tampil = $db->get_data("SELECT * FROM donatur");
        ?>
            <div class="col-9 p-4" style="border: 1px solid black;">
                <div class="row">
                    <div class="col-auto">
                        <?php
                        if ($user_tampil['foto_profil'] != null) {
                        ?>
                            <img src="./assets/img/userprofile/<?= $user_tampil['foto_profil'] ?>" style="width: 50px; border-radius: 50%;"><br />
                        <?php
                        } else {
                        ?>
                            <img src="./assets/img/logo-user.png" class="img-fluid" style="width: 50px; border-radius: 50%; background: orange;">
                        <?php
                        }
                        ?>
                    </div>
                    <div class="col-auto mt-3">
                        <?= $user_tampil['nama'] ?>
                    </div>
                </div>

                <div class="row mt-4">Alamat Lengkap</div>
                <div class="row mt-3">
                    <div class="card p-3 py-4 " style="background-color: rgb(211, 211, 211);">
                        <div style="border-bottom: 1px solid black"><?= $user_tampil['nama'] ?> | <?= $user_tampil['no_hp'] ?> <br /> <?= $user_tampil['alamat'] ?></div>
                    </div>
                </div>
                <div class="row mt-4">Input Jumlah Sedekah <?= $user_tampil['nama'] ?></div>
                <div class="row mt-3">
                    <div class="card p-3 py-4 " style="background-color: rgb(211, 211, 211); width: 250px;">
                        <div style="border-bottom: 1px solid black">
                            <span>Rp. </span><input type="text" name="" style="background: none; border: none;" required>
                        </div>
                    </div>
                </div>
                <div class="row mt-4">Sedekah Fadhil A.R Bulan ini</div>
                <?php
                $data_sedekah = $db->get_data("SELECT sum(dana_masuk) as jml FROM `dana` WHERE id_donatur='" . $user_tampil['id'] . "' AND MONTH(tanggal)=MONTH(now()) AND YEAR(tanggal) = YEAR(now())");
                ?>
                <div class="row mt-3">
                    <div class="card p-3 py-4 " style="background-color: rgb(211, 211, 211); width: 250px;">
                        <div style="border-bottom: 1px solid black">
                            <span>Rp. </span><input type="text" name="" value="<?= $data_sedekah['jml'] ?>" style="background: none; border: none;" disabled>
                        </div>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-auto text-center" style="width: 250px;">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </div>
            </div>
        <?php }
        ?>
        <div class="col mx-3">
            <div class="container" style="border: 1px solid black;">
                <div class="row text-center bg-dark text-white py-2">
                    <div class="col fs-4">Daftar User</div>
                </div>
                <?php
                $list_user = $db->tampil_data("SELECT * FROM donatur");
                foreach ($list_user as $u) {
                ?>
                    <form method="POST" action="">
                        <input type="hidden" name="user_selected" value="true">
                        <input type="hidden" name="id" value="<?= $u['id'] ?>">
                        <input type="hidden" name="nama_user" value="<?= $u['nama'] ?>">
                        <input type="hidden" name="nohp_user" value="<?= $u['no_hp'] ?>">
                        <input type="hidden" name="alamat_user" value="<?= $u['alamat'] ?>">
                        <?php
                        if ($u['foto_profil'] != null) {
                        ?>
                            <input type="hidden" name="foto_profil" value="<?= $u['foto_profil'] ?>">
                        <?php
                        } else {
                        ?>
                            <input type="hidden" name="foto_profil" value="null">
                        <?php
                        }
                        ?>
                        <button type="submit" class="row p-3 highlight-user w-100 m-0" style="border:none; width: 100%;">
                            <div class="col-auto">
                                <?php
                                if ($u['foto_profil'] != null) {
                                ?>
                                    <img src="./assets/img/userprofile/<?= $u['foto_profil'] ?>" style="width: 50px; border-radius: 50%;"><br>
                                <?php
                                } else {
                                ?>
                                    <img src="./assets/img/logo-user.png" class="img-fluid" style="width: 50px; border-radius: 50%; background: orange;">
                                <?php
                                }
                                ?>
                            </div>
                            <div class="col pt-3">
                                <span><?= $u['nama'] ?></span>
                            </div>
                        </button>
                    </form>
                <?php
                }
                ?>
            </div>
            <div class="container mt-4" style="border: 1px solid black;">
                <div class="row p-3" style="background-color: #FFB164;">
                    <div class="col text-center">
                        jumlah user terdaftar
                    </div>
                    <?php
                    $jml_user = $db->get_data("SELECT COUNT(*) as jml FROM `donatur`");
                    ?>
                    <br />
                    <br />
                    <h1 style="text-align: center;"><?= $jml_user['jml'] ?></h1>
                    <br />
                    <br />
                    <br />
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-5 m-3">
        <div class="col-9 p-2" style="border: 1px solid black; background-color: rgb(211, 211, 211);">
            <div class="row">
                <div class="col fw-bold">
                    <canvas id="myChart" style="width:100%;max-width:700px"></canvas>
                </div>
            </div>
        </div>
        <div class="col mx-3">
            <div class="container mt-4">
                <div class="row p-3" style="background-color: #FFB164; border-radius: 10px;">
                    <div class="col text-center mb-4">
                        Atur pengalokasian dana untuk sedekah :
                    </div>
                    <div class="form-check mb-3">
                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                        <label class="form-check-label btn btn-light text-primary" for="flexRadioDefault1">
                            SEMARI
                        </label>
                    </div>
                    <div class="form-check mb-3">
                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" checked>
                        <label class="form-check-label btn btn-light text-primary" for="flexRadioDefault2">
                            BERBAGI TAKJIL
                        </label>
                    </div>
                    <div class="form-check mb-3">
                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault3" checked>
                        <label class="form-check-label btn btn-light text-primary" for="flexRadioDefault3">
                            PENGAJIAN HARI BESAR ISLAM
                        </label>
                    </div>
                </div>
            </div>
        </div>
    </div>




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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js">
    </script>
    <script>
        x = "<?=$jml_user['jml']?>";
        const labels = ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"];
        const data = {
            labels: labels,
            datasets: [{
                    label: 'Jumlah User Terdaftar',
                    data: [0,0,0,0,0,x,0,0,0,0,0,0],
                    borderColor: "#fca103",
                    backgroundColor: "#fca103"
                }
            ]
        };

        new Chart("myChart", {
            type: "bar",
            data: data,
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top',
                    },
                    title: {
                        display: true,
                        text: 'Chart.js Bar Chart'
                    }
                }
            }
        });
    </script>
    <script src="assets/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>