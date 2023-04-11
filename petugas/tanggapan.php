<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  <title>Pekat | Tanggapan</title>
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
    </div>
    <a href="../logout.php" class="btn text-secondary"><i class="fa-solid fa-right-from-bracket fs-4 mx-3"></i></a>
    </div>
  </nav>

  <div class="col-11 shadow rounded-3 p-3 pb-5  mx-auto" style="background-color: #efeff0;">
    <div class="row">
      <div class="col-2 ">
        <img src="../img/Verified-amico.svg" alt="">
      </div>
      <div class="col-10 col-md-10">
        <h1 class="pt-5 pb-3 mt-5  fw-semibold"
          style="opacity: 70%; font-size: 70px; border-bottom: 2px solid #14A1CC;">
          Tanggapan & Riwayat Pengaduan </h1>
      </div>
    </div>

    <table class="table table-secondary table-striped text-center mt-4">
      <tr>
        <th class="col-1">No</th>
        <th class="col-1">NIK</th>
        <th class="col-2">Nama</th>
        <th class="col-2">Judul Pengaduan</th>
        <th class="col-1">Tanggal </th>
        <th class="col-2">Status</th>
        <th class="col-4">Opsi</th>
      </tr>

      <?php 
 require '../functions.php';
  
  session_start();
//SELECT a.*, b.* FROM pengaduan a INNER JOIN masyarakat b ON a.nik=b.nik  ORDER BY id_pengaduan DESC
//SELECT a.*, b.*, c.* FROM tanggapan a INNER JOIN pengaduan b ON a.id_pengaduan=b.id_pengaduan INNER JOIN masyarakat c ON a.nik=c.nik
//SELECT * FROM  tanggapan, pengaduan, masyarakat WHERE tanggapan.id_pengaduan=pengaduan.id_pengaduan AND pengaduan.nik=masyarakat.nik
  $no = 1;
  $query = mysqli_query($koneksi, "SELECT a.*, b.* FROM pengaduan a INNER JOIN masyarakat b ON a.nik=b.nik  ORDER BY id_pengaduan DESC");
  while ($data = mysqli_fetch_array($query)) { ?>


      <tr>
        <td><?= $no++; ?></td>
        <td><?= $data['nik'] ?></td>
        <td><?= $data['nama'] ?></td>
        <td><?= $data['judul_laporan'] ?></td>
        <td><?= $data['tgl_pengaduan'] ?></td>
        <td>
          <?php
                        
                        if($data['status']=='proses'){
                          echo "<span class='text-warning fs-6 '>Proses</span>";
                      }else if ($data['status'] == 'selesai') {
                       echo "<a href='isipengaduan.php' class='btn btn-success px-3 py-1 fs-6 '>Isi Pengaduan</span>";     
                        }else {
                            echo "<span class=' text-danger fs-6 '>Menunggu</span>";
                        }

                      ?>
        </td>
        <td>
          <?php 
                     if ($data['status'] == '0') {?>
          <a href="" class="btn btn-secondary py-1 px-3" data-bs-toggle="modal"
            data-bs-target="#tanggapi<?php echo $data['id_pengaduan'] ?>">Isi Pengaduan</a>
          <!-- Modal tanggapi-->
          <div class="modal fade" id="tanggapi<?php echo $data['id_pengaduan'] ?>" tabindex="-1"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
              <div class="modal-content">
                <div class="modal-header">
                 
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <form action="" method="POST">
                  <input type="hidden" name="id_pengaduan" class="form-control "
                    value="<?= $data['id_pengaduan'] ?>">
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
                    </div>
                    <div class="row mb-3">
                      <label class="col-11 text-start text-secondary">Foto</label>
                      <div class="col-8">
                        <img src="../fotopengaduan/<?= $data['foto'] ?>" width="100%">
                      </div>
                    </div>
                </div>
              </div>
              </form>

            </div>
          </div>
  </div>
  <?php } ?>


  <!--  -->
  <?php
                    if ($data['status'] != 'selesai') { ?>
  <a href="" class="btn button1 py-1 px-3" data-bs-toggle="modal"
    data-bs-target="#verifikasi<?= $data['id_pengaduan'] ?>">Verifikasi</a>
  <!-- Modal Verifikasi-->
  <div class="modal fade" id="verifikasi<?php echo $data['id_pengaduan'] ?>" tabindex="-1"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog  modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Verifikasi :
            <?php echo $data['judul_laporan'] ?></h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="" method="POST">
            <input type="hidden" name="id_pengaduan" class="form-control" value="<?php echo $data['id_pengaduan'] ?>">
            <div class="row mb-3">
              <div class="col-8 mx-auto">
                <label for="" class="text-start text-secondary col-12">Status</label>
                <select class="form-select" name="status" aria-label="Default select example">
                  <option value="proses">Proses</option>
                  <option value="0">Tolak</option>
                </select>
              </div>
            </div>
        </div>

        <div class="modal-footer">
          <button type="submit" name="kirim" class="btn button1 py-1 px-3">Verifikasi</button>
        </div>
        </form>

        <?php
      if (isset($_POST['kirim'])) {
        $id_pengaduan = $_POST['id_pengaduan'];
        $status = $_POST['status'];

        $query = mysqli_query($koneksi, "UPDATE pengaduan SET status='$status' WHERE id_pengaduan='$id_pengaduan'");
        echo " <script>
                alert('Data berhasil Di Verifikasi !');
                window.location='tanggapan.php';
                </script>
                ";
      }  

      ?>

      </div>
    </div>
  </div>
  <?php } ?>
  <?php 
                     if ($data['status'] == 'proses') {?>
  <a href="" class="btn btn-secondary py-1 px-3" data-bs-toggle="modal"
    data-bs-target="#tanggapi<?php echo $data['id_pengaduan'] ?>">Tanggapi</a>
  <!-- Modal tanggapi-->
  <div class="modal fade" id="tanggapi<?php echo $data['id_pengaduan'] ?>" tabindex="-1"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Tanggapi :
            <?= $data['judul_laporan'] ?></h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="" method="POST">
            <input type="hidden" name="id_pengaduan" class="form-control " value="<?= $data['id_pengaduan'] ?>">
            <div class="row mb-3">
              <label class="col-11 text-start text-secondary">Judul Pengaduan</label>
              <div class="col-8">
                <input type="text" name="judul_laporan" class="form-control" value="<?= $data['judul_laporan'] ?>"
                  readonly>
              </div>
            </div>
            <div class="row mb-3">
              <label class="col-11 text-start text-secondary">Rincian Pengaduan</label>
              <div class="col-8">
                <textarea name="isi_laporan" class="form-control" readonly> <?= $data['isi_laporan'] ?> </textarea>
              </div>
              <div class="row mb-3">
                <label class="col-11 text-start text-secondary">Tanggal Pengaduan</label>
                <div class="col-8">
                  <input type="text" name="tgl_pengaduan" class="form-control" value="<?= $data['tgl_pengaduan'] ?>"
                    readonly>
                </div>
              </div>
            </div>
            <div class="row mb-3">
              <label class="col-11 text-start text-secondary">Foto</label>
              <div class="col-8">
                <img src="../fotopengaduan/<?= $data['foto'] ?>" width="100%">
              </div>
            </div>
        </div>
        <div class="row mb-3">
          <label class="col-11 text-start text-secondary ms-2">&nbsp;&nbsp;Tanggapi Pengaduan</label>
          <div class="col-8 ms-3">
            <textarea name="tanggapan" class="form-control" required></textarea>
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" name="kirim_tanggapan" class="btn button1 py-1 px-3">Kirim Tanggapan</button>
        </div>
        </form>

        <?php
      if (isset($_POST['kirim_tanggapan'])) {
        $id_pengaduan = $_POST['id_pengaduan'];
        $id_petugas = $_SESSION['id_pengaduan'];
        $tanggal = date("Y-m-d");
        $tanggapan = $_POST['tanggapan'];

        $query_tanggapan = mysqli_query($koneksi, "INSERT INTO tanggapan VALUES ('','$id_pengaduan','$tanggal','$tanggapan','$id_petugas') ");
        if ($tanggapan != NULL) {
            $update = mysqli_query($koneksi,"UPDATE pengaduan SET status='selesai' WHERE id_pengaduan='$id_pengaduan'");
        }
        echo " <script>
                alert('Data berhasil di Tanggapi !');
                window.location='tanggapan.php';
                </script>
                ";
      }  

      ?>

      </div>
    </div>
  </div>
  <?php } ?>
  <a href="" class="btn btn-danger py-1 px-3" data-bs-toggle="modal"
    data-bs-target="#hapus<?= $data['id_pengaduan'] ?>">Hapus</a>
  <!-- Modal hapus-->
  <div class="modal fade" id="hapus<?php echo $data['id_pengaduan'] ?>" tabindex="-1"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal_body">
          <form action="hapus_data.php" method="POST">
            <input type="hidden" name="id_pengaduan" class="form-control" value="<?php echo $data['id_pengaduan'] ?>">
            <p>&nbsp;&nbsp;Apakah yakin akan menghapus pengaduan <br> <?php echo $data['judul_laporan'] ?>
            </p>
        </div>
        <div class="pb-3">
          <button type="submit" name="hapus_pengaduan" class="btn btn-danger float-end me-3" >Hapus</button>
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

  </div>







  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
  </script>
</body>

</html>