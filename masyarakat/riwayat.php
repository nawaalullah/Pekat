<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <title>Pekat | Riwayat</title>
    <link rel="shortcut icon" href="../img/Kota Bandung.svg" type="image/x-icon">
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
</head>

<body>

    <nav class="navbar navbar-expand-lg mb-5 py-0 " style="background-color: #d9d9d9;">
        <div class="container-fluid ">
            <a class="navbar-brand"><img src="../img/Kota Bandung.svg" alt="" width="70"
                    class="img-fluid ms-5 me-3">Pekat |
                Pengaduan Masyarakat </a>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="col-sm-4 col-lg-3" style="margin-left: 25%;">
                    <div class="navbar-nav fw-semibold text-center ">
                        <a class="nav-link navnaw2 text-dark col-lg-6 " href="laporan.php" aria-current="page">Laporan
                            Pengaduan</a>
                        <a class="nav-link active navnaw lebar text-dark col-lg-6" href="riwayat.php">Riwayat
                            Pengaduan</a>
                    </div>
                </div>
            </div>
            <a href="../logout.php" class="btn text-secondary"><i
                    class="fa-solid fa-right-from-bracket fs-4 mx-3"></i></a>
        </div>
    </nav>

    <div class="container shadow rounded-3 p-3 pb-5" style="background-color: #efeff0;">
        <div class="row">
            <div class="col-2 ">
                <img src="../img/Spreadsheets-rafiki.svg" alt="">
            </div>
            <div class="col-10 col-md-10">
                <h1 class="pt-5 pb-3  fw-semibold"
                    style="opacity: 70%; font-size: 70px; border-bottom: 2px solid #14A1CC;">
                    Riwayat Pengaduan </h1>
            </div>
        </div>

        <div>
            <table class=" table table-secondary table-striped text-center">
                <tr>
                    <th class="col-1">No</th>
                    <th class="col-2">Judul Pengaduan</th>
                    <th class="col-2">Tanggal Pengaduan</th>
                    <th class="col-2">Status</th>
                </tr>
                <?php 
                include '../koneksi.php';
                session_start();

                $no=1;
                $nik = $_SESSION['nik'];
                $query = mysqli_query($koneksi, "SELECT * FROM pengaduan WHERE nik='$nik' ORDER BY id_pengaduan DESC");
                while ($data = mysqli_fetch_array($query)){ ?>

                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $data['judul_laporan']; ?></td>
                    <td><?= $data['tgl_pengaduan']; ?></td>
                    <td>
                        <?php
                        
                        if($data['status']=='proses'){
                            echo "<span class='text-warning fs-6 '>Proses</span>";
                        }else if ($data['status'] == 'selesai') {
                            echo "<a href='isipengaduan.php' class='btn btn-success py-1 px-3 fs-6 '>Isi Pengaduan</span>";     
                        }else {
                            echo "<span class=' text-danger fs-6 '>Menunggu</span>";
                            
                        }

                      ?>
                   
                </tr>

                <?php  }   ?>


                </tr>
            </table>
        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
    </script>
</body>

</html>