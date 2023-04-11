<?php
include '../koneksi.php';

if (isset($_POST['hapus_pengaduan'])){
    $id_pengaduan= $_POST['id_pengaduan'];
    $query = mysqli_query($koneksi, "SELECT * FROM pengaduan WHERE id_pengaduan='$id_pengaduan'");
    $data = mysqli_fetch_array($query);
    if (is_file("../fotopengaduan/".$data['foto'])) {
        unlink("../fotopengaduan/".$data['foto']);
        mysqli_query($koneksi, "DELETE FROM pengaduan WHERE id_pengaduan='$id_pengaduan'");
        echo "<script type='text/javascript'>document.location.href = 'tanggapan_admin.php';</script>";
    }else{
     echo 'hapus data gagal'; 
    }
    }


if (isset($_POST['hapus_petugas'])){
    $id_petugas= $_POST['id_petugas'];
    $query = mysqli_query($koneksi, "DELETE FROM petugas WHERE id_petugas='$id_petugas'");
    if ($query) {
        echo "<script>
        window.location='pengguna.php';
        </script>";
    } 
    
}

if (isset($_POST['hapus_masyarakat'])){
    $nik= $_POST['nik'];
    $query = mysqli_query($koneksi, "DELETE FROM masyarakat WHERE nik='$nik'");
    if ($query) {
        echo "<script>
        window.location='masyarakat.php';
        </script>";
    } 
    
} 


?>
