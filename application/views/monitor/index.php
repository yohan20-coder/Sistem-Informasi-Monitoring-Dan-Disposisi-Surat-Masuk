<?php
    include "tgl.php";
?>
    
        <!-- Begin Page Content -->
        <div class="container-fluid">
          <!-- Page Heading -->
         <!--  <h1 class="h3 mb-4 text-gray-800"></h1> -->

          <div class="row">
            <div class="col-lg-12">

               <!-- Basic Card Example -->
              <div class="card shadow">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary"><?= $judul;?></h6>
                </div>
                <div class="card-body col-lg-12">

                  <!-- pesan error -->
        <?= form_error('menu', '<div class="alert alert-danger" role="alert">', '</div>'); ?>

        <!-- pesan berhasil tambah data -->
        <?= $this->session->flashdata('message');?>

        <style>
           td {
                text-align: center !important;
            }
            th {
              background-color: rgb(167, 207, 243)!important;
              text-align: center !important;
            }
        </style>

          <!-- <a href="<?= base_url('arsip/tambah'); ?>" class="btn btn-primary btn-sm mb-3">Tambah Data</a>
          <a href="<?= base_url('arsip/pdfm');?>" class="btn btn-success btn-sm mb-3">Print Pdf</a>-->
          <!-- <a href="<?= base_url('arsip/cetak');?>" class="btn btn-warning btn-sm mb-3">Print</a>  -->

          <table class="table table-striped table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">No Surat</th>
                            <th scope="col">Track 1</th>
                            <th scope="col">Track 2</th>
                            <th scope="col">Track 3</th>
                            <th scope="col">Track 4</th>
                            <!-- <th scope="col">Action</th> -->
                        </tr>
                    </thead>
                    <tbody>
                    <?php $no = 1 ?>
                    <?php foreach($tampil as $sm): ?>
                      <tr>
                          <td scope="row"><?= $no ?></td>
                          <td><?= $sm['nosurat'] ?></td>
                          <td><?= $sm['track1'] ?></td>
                          <td><?= $sm['track2'] ?></td>
                          <td><?= $sm['track3'] ?></td>
                          <td><?= $sm['track4'] ?></td>
                          <!-- <td>
                              <a href="<?= base_url();?>agenda/edit/<?= $sm['id'] ?>" class="btn btn-success btn-sm">Edit</a>
                              <a href="<?= base_url();?>agenda/hapus/<?= $sm['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin mau menghapus');">Hapus</a>
                          </td> -->
                      </tr>
                  <?php $no++ ?>
                  <?php endforeach ?>

                    </tbody>
                </table>
               
                </div>
              </div>

            </div>

        
            </div>
          </div>

</div>