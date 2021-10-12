<!DOCTYPE html>
<html><head>
<title></title>
</head><body>

<style>
 h3{
  text-align : center;
 }
 th{
     margin-left: 35px !important;
     margin-right: 15px !important;
     margin-bottom: 5px !important;
 }

 td{
    margin-left: 25px !important;
}
</style>

<h3>Laporan Rekapan Arsip Surat Keluar <br> Keluarahan Rewarangga</h3><hr>
<table>
        <tr>
            <th>No</th>
            <th>No.Surat</th>
            <th>No.Klasifikasi</th>
            <th>Ringkasan</th>
            <th>Pengelolah</th>
            <th>Tgl Surat</th>
            <th>Kepada</th>
            <th>Keterangan</th>
        </tr>
        <?php $no = 1 ?>
        <?php foreach($tampil as $sm): ?>
    <tr>
    <td style="margin-left: 35px !important;"><?= $no ?></td>
    <td><?= $sm['nosurat'] ?></td>
    <td><?= $sm['noklasi'] ?></td>
    <td><?= $sm['ringkasan'] ?></td>
    <td><?= $sm['pengelolah'] ?></td>
    <td><?= $sm['tglsurat'] ?></td>
    <td><?= $sm['kepada'] ?></td>
    <td><?= $sm['keterangan'] ?></td>
    </tr>
<?php $no++ ?>
<?php endforeach ?>
</table>
</body></html>