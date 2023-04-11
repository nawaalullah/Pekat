<?php 
  session_start();
	 include '../koneksi.php';

	 if(isset($_POST['kirimlaporan'])){
	 	$nik = $_SESSION['nik'];
	 	$tgl = date('Y-m-d');
    $judul_laporan = htmlspecialchars($_POST['judul_laporan']);
    $isi_laporan = htmlspecialchars($_POST['isi_laporan']);


	 	$foto = $_FILES['foto']['name'];
	 	$source = $_FILES['foto']['tmp_name'];
	 	$folder = './../fotopengaduan/';
	 	$listeks = array('jpg','png','jpeg');
    $status = 0;
	 	$pecah = explode('.', $foto);
	 	$eks = $pecah['1'];
	 	$size = $_FILES['foto']['size'];

		if($foto !=""){
		 	if(in_array($eks, $listeks)){
	
					move_uploaded_file($source, $folder.$foto);
					$query = mysqli_query($koneksi,"INSERT INTO pengaduan VALUES ('','$tgl','$nik','$judul_laporan','$isi_laporan','$foto','$status')");
			 			echo "<script>alert('Pengaduan Akan Segera di Tanggapi !');</script>";
          }
        }
      }
    
	

 ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  <title>Pekat | Laporan</title>
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
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="col-sm-4 col-lg-3 " style="margin-left: 23%;">
          <div class="navbar-nav fw-semibold text-center ">
            <a class="nav-link active navnaw lebar text-dark col-lg-6 col-xl-7" href="laporan.php"
              aria-current="page">Laporan Pengaduan</a>
            <a class="nav-link navnaw2 text-dark col-lg-6 col-xl-7" href="riwayat.php">Riwayat Pengaduan</a>
          </div>
        </div>
      </div>
      <a href="../logout.php" class="btn text-secondary"><i class="fa-solid fa-right-from-bracket fs-4 mx-3"></i></a>
      
    </div>
  </nav>

  <div class="container shadow rounded-3 p-3 pb-5 mb-4" style="background-color: #efeff0;">
    <div class="row">
      <div class="col-2 ">
        <img src="../img/Ambassador-pana.svg" alt="">
      </div>
      <div class="col-10 col-md-10">
        <h1 class="pt-5 pb-3  fw-semibold" style="opacity: 70%; font-size: 70px; border-bottom: 2px solid #14A1CC;">
          Laporan Pengaduan </h1>
      </div>
    </div>

    <form action="" method="post" enctype="multipart/form-data">
      <div class="px-3 py-3 mt-3">
         <!--  -->
         <div class="col-6">
         <div class="mb-3">
        <label for="judul" class="form-label text-secondary">Judul Pengaduan</label>
        <input type="text" class="form-control" name="judul_laporan" id="judul_laporan" placeholder="Ketik Judul Laporan" required>
        </div>

        </div>
        <!--  -->
        <div class="col-6">
          <label for="pengaduan" class="form-label text-secondary">Rincian Pengaduan </label>
          <textarea class="form-control" id="isi_laporan" name="isi_laporan"
            placeholder="Ketik laporan pengaduan secara detail dan spesifik termasuk letak posisi yang di keluhkan"
            rows="10" required></textarea>
        </div>
        <!--  -->
        <div class="col-6 mt-3">
          <label for="unggah" class="form-label text-secondary">Foto Pengaduan </label>
          <div class="input-group mb-3">
            <input type="file" class="form-control" id="foto" name="foto" required>
          </div>
        </div>
        <!--  -->
        <button type="submit" name="kirimlaporan" id="kirimlaporan" class="btn button1 py-1 px-4 float-end rounded-3 ">Kirim</button>
      </div>
  </div>
  </form>






  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
  </script>
</body>

</html>