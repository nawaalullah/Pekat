<?php 
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=Data Pengaduan dan Tanggapan.xls");

?>

<center>
    <h3>LAPORAN PENGADUAN DAN TANGGAPAN </h3>
</center>

<table class="table table-striped">
    <thead>
        <tr>
        <th class="col-1">No</th>
        <th class="col-1">NIK</th>
        <th class="col-2">Nama</th>
        <th class="col-1">Tanggal</th>
        <th class="col-2">Judul </th>
        <th class="col-2">Rincian</th>
        <th class="col-2">Tanggapan</th>
        </tr>
    </thead>
    <tbody>
        <?php
        include "../koneksi.php";
        $no = 1;
        $query = mysqli_query($koneksi, "SELECT * FROM  tanggapan, pengaduan, masyarakat WHERE tanggapan.id_pengaduan=pengaduan.id_pengaduan AND pengaduan.nik=masyarakat.nik ");
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
    </tbody>
</table>