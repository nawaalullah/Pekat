<?php
require '../functions.php';

if (isset($_POST['hapus_pengaduan'])){
    $id_pengaduan= $_POST['id_pengaduan'];
    $query = mysqli_query($koneksi, "SELECT * FROM pengaduan WHERE id_pengaduan='$id_pengaduan'");
    $data = mysqli_fetch_array($query);
    if (is_file("../fotopengaduan/".$data['foto'])) {
        unlink("../fotopengaduan/".$data['foto']);
        mysqli_query($koneksi, "DELETE FROM pengaduan WHERE id_pengaduan='$id_pengaduan'");
        echo "<script type='text/javascript'>document.location.href = 'tanggapan.php';</script>";
}else{
 echo 'hapus data gagal'; 
}
    }



?>
