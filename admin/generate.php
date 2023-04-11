<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <title>Pekat | Generate</title>
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
</style>

<body>
    <div class="d-flex" id="wrapper">
        <!-- Sidebar-->
        <div class="border-end bg-white col-2" id="sidebar-wrapper">
            <div class="p-4 fs-2 fw-semibold border-bottom bg-white" style="color: #3a3a3a;">
                <img src="../img/Kota Bandung.svg" alt="" width="80px" class="me-2">
                Pekat</div>
            <div class="list-group list-group-flush">
                <a class="list-group-item list-group-item-action list-group-item-light p-3  " href="tanggapan_admin.php"><i class="fa-solid fa-comments me-3 ms-2"></i>Tanggapan & Riwayat Pengaduan</a>
                <a class="list-group-item list-group-item-action list-group-item-light p-3" href="masyarakat.php"><i class="fa-solid fa-passport me-3 ms-2"></i>Masyarakat</a>
                <a class="list-group-item list-group-item-action list-group-item-light p-3" href="pengguna.php"><i class="fa-solid fa-user me-3 ms-2"></i>Petugas</a>
                <a class="list-group-item list-group-item-action navnaw3 p-3" href="generate.php"><i class="fa-solid fa-print me-3 ms-2"></i>Generate Laporan</a>
                <a class="list-group-item list-group-item-action list-group-item-light p-3 border-bottom"
                    href="../logout.php"><i class="fa-solid fa-right-from-bracket me-3 ms-2"></i>Keluar</a>

            </div>
        </div>
       

        <div class="container-fluid">
            <div class="col-11 shadow rounded-3 p-3 pb-5  mx-auto mt-5" style="background-color: #efeff0;">
    <div class="row">
      <div class="col-2 ">
        <img src="../img/Printing invoices-amico.svg" alt="">
      </div>
      <div class="col-10 col-md-10">
        <h1 class="pt-5 pb-3 mt-3 fw-semibold"
          style="opacity: 70%; font-size: 70px; border-bottom: 2px solid #14A1CC;">
          Generate Laporan </h1>
      </div>
    </div>

    <div class="col-12">
        <a href="ekspor.php" class="btn button1 py-1 px-3 float-end mb-2"><i class="fa-solid fa-print me-2"></i>Ekspor Excel </a>
        <a href="eksporpdf.php" class="btn button1 py-1 px-3 float-end mb-2 me-3"><i class="fa-solid fa-print me-2"></i>Ekspor PDF </a>
    </div>

    <table class="table table-secondary table-striped text-center mt-4">
      <tr>
        <th class="col-1">No</th>
        <th class="col-1">NIK</th>
        <th class="col-2">Nama</th>
        <th class="col-1">Tanggal</th>
        <th class="col-2">Judul </th>
        <th class="col-2">Rincian</th>
        <th class="col-2">Tanggapan</th>
      </tr>

      <?php 
 require '../koneksi.php';
  
//SELECT a.*, b.* FROM pengaduan a INNER JOIN masyarakat b ON a.nik=b.nik  ORDER BY id_pengaduan DESC
//SELECT a.*, b.*, c.* FROM tanggapan a INNER JOIN pengaduan b ON a.id_pengaduan=b.id_pengaduan INNER JOIN masyarakat c ON a.nik=c.nik
//SELECT * FROM  tanggapan, pengaduan, masyarakat WHERE tanggapan.id_pengaduan=pengaduan.id_pengaduan AND pengaduan.nik=masyarakat.nik
  $no = 1;
  $query = mysqli_query($koneksi, "SELECT * FROM  tanggapan, pengaduan, masyarakat WHERE tanggapan.id_pengaduan=pengaduan.id_pengaduan AND pengaduan.nik=masyarakat.nik");
  while ($data = mysqli_fetch_array($query)) { ?>


      <tr>
        <td><?= $no++; ?></td>
        <td><?= $data['nik'] ?></td>
        <td><?= $data['nama'] ?></td>
        <td><?= $data['tgl_pengaduan'] ?></td>
        <td><?= $data['judul_laporan'] ?></td>
        <td><?= $data['isi_laporan'] ?></td>
        <td><?= $data['tanggapan'] ?></td>
        

       
  </tr>
  <?php } ?>


  </div>

  </table>






    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
    </script>
</body>

</html>