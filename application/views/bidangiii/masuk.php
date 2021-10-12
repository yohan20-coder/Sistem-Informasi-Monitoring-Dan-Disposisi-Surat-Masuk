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
          <table class="table table-striped" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th scope="col" class="bg-info text-white text-center">#</th>
                            <th scope="col" class="bg-info text-white text-center">Notifikasi Surat Masuk</th>
                            <th scope="col" class="bg-info text-white text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php $no = 1 ?>
                    <?php foreach($tampil as $sm): ?>
                      <tr>
                          <td scope="row" class="text-center"><i class="fas fa-fw fa-folder"></i></td>
                          <?php if($sm['status']==0) { ?>
                          <td style ="background-color : #fcfc7583; color:black">
                          <b>Disposisi Dari : Sekertaris Bappeda</b><br> 
                          <b>No. Surat :</b> <?= $sm['nosurat'] ?><br>
                           <b>Perihal Surat :</b> <?= $sm['perihal'] ?><br>
                           <b>Asal Surat:</b> <?= $sm['instansi'] ?><br>
                           <p class="text-danger">Status : Belum DiBaca</p><hr>
                           <b>Tanggal : <?= tgl_indo($sm['tglteri']) ?></b>
                          </td>
                          <?php } else { ?>
                          <td style ="background-color : #88a3ee66; color:black">
                          <b>Disposisi Dari : Sekertaris Bappeda</b> <br>
                           <b>No. Surat :</b> <?= $sm['nosurat'] ?><br>
                           <b>Perihal Surat :</b> <?= $sm['perihal'] ?><br>
                           <b>Asal Surat:</b> <?= $sm['instansi'] ?><br>
                           <p class="text-primary">Status : Sudah DiBaca</p><hr>
                           <b>Tanggal: <?= tgl_indo($sm['tglteri']) ?></b>
                          </td>
                          <?php }?>
                          <td class="text-center">
                              <a href="<?= base_url();?>bidangiii/detail/<?= $sm['id'] ?>" class="btn btn-success btn-sm">Baca</a>
                          </td>
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