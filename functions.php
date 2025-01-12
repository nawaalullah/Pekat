<?php
$koneksi = mysqli_connect("localhost:3307","root","","pekat"); 


function registrasi(){
    global $koneksi;

   $nik = $_POST['nik'];
   $nama = $_POST['nama'];
   $username = mysqli_escape_string($koneksi, $_POST['username']);
   $password = mysqli_escape_String($koneksi, $_POST['password']);
   $telp = $_POST['telp'];

    $result = mysqli_query($koneksi, "SELECT username FROM masyarakat WHERE username = '$username'");
    if(mysqli_fetch_assoc($result)){
        echo "
        <script> 
        alert ('Username Sudah Terdaftar !');
        </script>";

        return false;
    }

    $password = md5($password);

    mysqli_query($koneksi, "INSERT INTO masyarakat VALUES('$nik','$nama','$username','$password','$telp')");
    return mysqli_affected_rows($koneksi);

}


function login(){
    global $koneksi;
    $username = mysqli_escape_string($koneksi, $_POST['username']);
    $password = mysqli_escape_String($koneksi, $_POST['password']);
    $password = md5($password);

  
    $query = "SELECT * FROM masyarakat WHERE username='$username' AND password='$password'";
    $result = mysqli_query($koneksi, $query);
    if(mysqli_num_rows($result) > 0) {
      $data = mysqli_fetch_array($result);
      session_start();
      $_SESSION['role'] = 'masyarakat';
      $_SESSION['username'] = $data['username'];
      $_SESSION['nik'] = $data['nik'];
      header("location: masyarakat/laporan.php");
    }else { 
    $query = "SELECT * FROM petugas WHERE username='$username' AND password='$password'";
    $result = mysqli_query($koneksi, $query);
    if(mysqli_num_rows($result) > 0) {
      $data = mysqli_fetch_array($result);
      session_start();
      $_SESSION['id_petugas'] = $data['id_petugas'];
      $_SESSION['nama_petugas'] = $data['nama_petugas'];
      $_SESSION['level'] = $data['level'];
      if($data['level'] ==  'admin') {
        header("location: admin/tanggapan_admin.php");
      } elseif($data['level'] == 'petugas') {
        header("location: petugas/tanggapan.php");
      }
}
    }
   
}

function pengaduan(){
    global $koneksi;

    if($_POST>0){
        $tanggal = date("Y-m-d");
        $nik = $_SESSION['data']['nik'];
        $isi_laporan = htmlspecialchars($_POST['isi_laporan']);
        $status = 0;
        $foto = $_FILES['foto']['name'];
        $tmp = $_FILES['foto']['tmp_name'];
        $lokasi = '../img/';
      
        move_uploaded_file($tmp, $lokasi . $foto);
        $query = mysqli_query($koneksi, "INSERT INTO pengaduan VALUES ('','$tanggal','$nik','$isi_laporan','$foto','$status')");

        if($query){
            echo "<script>alert('Pengaduan Akan Segera Ditanggapi')</script>";
        }

    }    
}
?>

