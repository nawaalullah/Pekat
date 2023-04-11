<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  <title>Pekat | Isi Pengaduan</title>
  <link rel="shortcut icon" href="../img/Kota Bandung.svg" type="image/x-icon">
  <link rel="stylesheet" href="../style.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
</head>

<body>

  <nav class="navbar navbar-expand-lg mb-5 py-0 " style="background-color: #d9d9d9;">
    <div class="container-fluid ">
      <a class="navbar-brand"><img src="../img/Kota Bandung.svg" alt="" width="70" class="img-fluid ms-5 me-3">Pekat |
        Pengaduan Masyarakat </a>
    
      <a href="../logout.php" class="btn text-secondary"><i class="fa-solid fa-right-from-bracket fs-4 mx-3"></i></a>
    </div>
  </nav>

  <div class="col-5 shadow rounded-3 p-3 pb-4 mx-auto" style="background-color: #efeff0;">
    <div class="row">
      <div class="col-2 mt-3">
        <img src="../img/Inbox cleanup-pana.svg" alt="" width="125%">
      </div>
      <div class="col-10 col-md-10">
        <h1 class="pt-5 pb-3  fw-semibold" style="opacity: 70%; font-size: 70px; border-bottom: 2px solid #14A1CC;">
          Isi Pengaduan </h1>
      </div>
    </div>
    <?php 
include '../functions.php';


    $query = mysqli_query($koneksi, "SELECT a.*, b.* FROM pengaduan a INNER JOIN tanggapan b ON a.id_pengaduan=b.id_pengaduan");
    $data=mysqli_fetch_array($query);

?>
    <div class="row">
        <div class="col-12" >
            
                    <form action="" method="POST">
                    <div class="row mb-3">
                      <label class="col-11 text-start text-secondary">Judul Pengaduan</label>
                      <div class="col-8">
                        <input type="text" name="judul_laporan" class="form-control"
                          value="<?= $data['judul_laporan'] ?>" readonly>
                      </div>
                    </div>
                    <div class="row mb-3">
                      <label class="col-11 text-start text-secondary">Rincian Pengaduan</label>
                      <div class="col-8">
                        <textarea name="isi_laporan" class="form-control"
                          readonly> <?= $data['isi_laporan'] ?> </textarea>
                      </div>
                      <div class="row mb-3">
                        <label class="col-11 text-start text-secondary">Tanggal Pengaduan</label>
                        <div class="col-8">
                          <input type="text" name="tgl_pengaduan" class="form-control"
                            value="<?= $data['tgl_pengaduan'] ?>" readonly>
                        </div>
                      </div>
                    <div class="row mb-3">
                      <label class="col-11 text-start text-secondary">Tanggapan Pengaduan</label>
                      <div class="col-8">
                        <textarea name="isi_laporan" class="form-control"
                          readonly> <?= $data['tanggapan'] ?> </textarea>
                      </div>
                    </div>
                    </div>
                        </div>
                        <div class="">
                            <a href="tanggapan.php" class="btn button1 py-1 px-3">Kembali</a>

                        </div>
                    </form>
                </div>

   

  
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
  </script>
</body>
</html>