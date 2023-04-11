<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <title>Pekat | Masyarakat</title>
    <link rel="shortcut icon" href="../img/Kota Bandung.svg" type="image/x-icon">
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
</head>
<style>
    #sidebar-wrapper {
        min-height: 100vh;
    }

    #page-content-wrapper {
        min-width: 100vw;
    }

    #page-content-wrapper {
        min-width: 0;
        width: 100%;
    }

    .navnaw3 {
        color: white;
        background-color: #14A1CC;
    }

    .navnaw3:hover {
        background-color: #1697be;
        color: white;
    }

    /* Chrome, Safari, Edge, Opera */
    input::-webkit-outer-spin-button,
    input::-webkit-inner-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }

    /* Firefox */
    input[type=number] {
        -moz-appearance: textfield;
    }
</style>

<body>
    <div class="d-flex" id="wrapper">
        <!-- Sidebar-->
        <div class="border-end bg-white col-2" id="sidebar-wrapper">
            <div class="p-4 fs-2 fw-semibold border-bottom bg-white" style="color: #3a3a3a;">
                <img src="../img/Kota Bandung.svg" alt="" width="80px" class="me-2">
                Pekat</div>
            <div class="list-group list-group-flush">
                <a class="list-group-item list-group-item-action list-group-item-light p-3  "
                    href="tanggapan_admin.php"><i class="fa-solid fa-comments me-3 ms-2"></i>Tanggapan & Riwayat
                    Pengaduan</a>
                <a class="list-group-item list-group-item-action navnaw3 p-3" href="masyarakat.php"><i
                        class="fa-solid fa-passport me-3 ms-2"></i>Masyarakat</a>
                <a class="list-group-item list-group-item-action list-group-item-light p-3" href="pengguna.php"><i
                        class="fa-solid fa-user me-3 ms-2"></i>Petugas</a>
                <a class="list-group-item list-group-item-action list-group-item-light p-3" href="generate.php"><i
                        class="fa-solid fa-print me-3 ms-2"></i>Generate Laporan</a>
                <a class="list-group-item list-group-item-action list-group-item-light p-3 border-bottom"
                    href="../logout.php"><i class="fa-solid fa-right-from-bracket me-3 ms-2"></i>Keluar</a>

            </div>
        </div>
        <div class="container-fluid">
            <div class="col-10 mt-5 shadow rounded-3 p-3 pb-5  mx-auto" style="background-color: #efeff0;">
                <div class="row">
                    <div class="col-2 ">
                        <img src="../img/Account-amico.svg" alt="">
                    </div>
                    <div class="col-10 col-md-10">
                        <h1 class="pt-5 pb-3 mt-2  fw-semibold"
                            style="opacity: 70%; font-size: 70px; border-bottom: 2px solid #14A1CC;">
                            Akun Masyarakat </h1>
                    </div>
                </div>

                <table class="table table-secondary table-striped text-center mt-4">
                    <tr>
                        <th class="col-1">No</th>
                        <th class="col-1">NIK</th>
                        <th class="col-2">Nama</th>
                        <th class="col-2">Nama Pengguna</th>
                        <th class="col-2">No Telp </th>
                        <th class="col-2">Opsi</th>
                    </tr>



                    <button href="" class="btn button1 py-1 px-3 float-end mb-2" data-bs-toggle="modal"
                        data-bs-target="#tambahData"><i class="fa-solid fa-plus me-2"></i>Tambah
                        Akun</button>


                    <div class="modal fade" id="tambahData" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Akun Masyarakat</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="" method="POST">
                                        <div class="form-floating mb-3">
                                            <input type="number" name="nik" class="form-control"
                                                placeholder="Masukkan nik" id="nik" required>
                                            <label for="nik">Nomor Induk Kependudukan</label>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input type="text" name="nama" class="form-control"
                                                placeholder="Masukkan nama" id="nama" required>
                                            <label for="nama">Nama Lengkap</label>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input type="text" name="username" class="form-control"
                                                placeholder="Masukkan Username" id="username" required>
                                            <label for="username">Nama Pengguna</label>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input type="password" name="password" class="form-control"
                                                placeholder="Masukkan password" id="password" required>
                                            <label for="password">Kata Sandi</label>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input type="text" name="telp" class="form-control"
                                                placeholder="Masukkan telp" id="telp" required>
                                            <label for="telp">No Telp</label>
                                        </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" name="kirim" class="btn button1 py-1 px-3">Tambah Akun
                                    </button>
                                </div>
                                </form>
                                
    <?php
    include '../koneksi.php';
      if (isset($_POST['kirim'])) {
        $nik = $_POST['nik'];
        $nama = $_POST['nama'];
        $username = $_POST['username'];
        $password = md5($_POST['password']);
        $telp = $_POST['telp'];
    
        $query = mysqli_query($koneksi, "INSERT INTO masyarakat VALUES ('$nik','$nama','$username','$password','$telp')");
    
        if ($query) {
            echo "<script>
            alert('Akun Berhasil Dibuat !')
            document.location.href = 'masyarakat.php';
            </script>";
        }
      }

      ?>



                            </div>
                        </div>
                    </div>


                    <?php
                                include '../koneksi.php';
                                $no = 1;
                                $query = mysqli_query($koneksi, "SELECT * FROM masyarakat");
                                while ($data = mysqli_fetch_array($query)) { ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $data['nik'] ?></td>
                        <td><?= $data['nama'] ?></td>
                        <td><?= $data['username'] ?></td>
                        <td><?= $data['telp'] ?></td>
                        <td>
                            <a href="" class="btn btn-danger py-1 px-3" data-bs-toggle="modal"
                                data-bs-target="#hapus<?= $data['nik'] ?>">Hapus</a>
                            <!-- Modal hapus-->
                            <div class="modal fade" id="hapus<?php echo $data['nik'] ?>" tabindex="-1"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Hapus Data Masyarakat
                                            </h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="hapus_data.php" method="POST">
                                                <input type="hidden" name="nik" class="form-control"
                                                    value="<?php echo $data['nik'] ?>">
                                                <p>&nbsp;&nbsp;Apakah yakin akan menghapus data <br>
                                                    <?= $data['nama'] ?>
                                                </p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" name="hapus_masyarakat"
                                                class="btn btn-danger py-1 px-3">Hapus</button>
                                        </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </td>

                    </tr>
                    <?php } ?>


            </div>

            </table>


            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
                integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3"
                crossorigin="anonymous">
            </script>
</body>

</html>