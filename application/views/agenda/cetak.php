<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cetak Laporan</title>
    <link href="<?= base_url('assets/');?>css/sb-admin-2.min.css" rel="stylesheet">
</head>
<body>
<div class="ml-3 mr-3 mt-5">
    <h5 class="text-center">Laporan Rekapan Arsip Surat Masuk <br> Bappeda Kabupaten Ende</h5>
<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">No.Surat</th>
                            <th scope="col">Tgl Surat</th>
                            <th scope="col">Tgl Diterima</th>
                            <th scope="col">Perihal</th>
                            <th scope="col">Isi Ringkas</th>
                            <th scope="col">Asal Instansi</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php $no = 1 ?>
                    <?php foreach($tampil as $sm): ?>
                      <tr>
                          <td scope="row"><?= $no ?></td>
                          <td><?= $sm['nosurat'] ?></td>
                          <td><?= $sm['tglsurat'] ?></td>
                          <td><?= $sm['tglteri'] ?></td>
                          <td><?= $sm['perihal'] ?></td>
                          <td><?= $sm['isi'] ?></td>
                          <td><?= $sm['instansi'] ?></td>
                      </tr>
                  <?php $no++ ?>
                  <?php endforeach ?>

                    </tbody>
                </table>
                </div>

    <script>
        window.print();
    </script>
    <!-- Bootstrap core JavaScript-->
<script src="<?= base_url('assets/');?>vendor/jquery/jquery.min.js"></script>
  <script src="<?= base_url('assets/');?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>