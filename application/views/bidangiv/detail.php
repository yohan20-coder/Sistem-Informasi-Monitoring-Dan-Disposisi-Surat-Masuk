<?php
    include "tgl.php";
?>
 <!-- Begin Page Content -->
 <div class="container-fluid">
 <!-- Basic Card Example -->
              <div class="card shadow border-left-primary border-bottom-primary">
                <div class="card-header bg-primary py-3">
                  <h6 class="m-0 font-weight-bold text-white text-center"><?= $judul;?></h6>
                </div>
                <div class="card-body ">

            <!-- konfirmasi -->
          <div class="row">
            <div class="col-md-12">
              <?= $this->session->flashdata('message'); ?>
            </div>
          </div>

                <!-- <div class="row">
                    <div class="col-md-12"> -->
                    <form action="" method="post">
                        <input type="hidden" name="id" value="<?= $detail['id'];?>">
                        <div class="row">
                            <div class="col-lg-6">
                        <!-- Default Card Example -->
                        <div class="card mb-4">
                            <div class="card-header bg-info text-white">
                            Detail Surat
                            </div>
                            <div class="card-body">
                            <table class="table"  width="100%" cellspacing="0">

                                <tr>
                                    <td>No. Surat</td>
                                    <td>: <?= $detail['nosurat'] ?></td>
                                </tr>

                                <tr>
                                    <td>Tanggal Surat</td>
                                    <td>: <?= tgl_indo($detail['tglsurat']) ?></td>
                                </tr>

                                <tr>
                                    <td>Tanggal Di Terimah</td>
                                    <td>: <?= tgl_indo($detail['tglteri']) ?></td>
                                </tr>

                                <tr>
                                    <td>Perihal</td>
                                    <td>: <?= $detail['perihal'] ?></td>
                                </tr>
                                <tr>
                                    <td>Ringkasan</td>
                                    <td>: <?= $detail['isi'] ?></td>
                                </tr>
                                <tr>
                                    <td>Asal Instansi</td>
                                    <td>: <?= $detail['instansi'] ?></td>
                                </tr>
                            </table>

                         </div>      
                        </div>
                        <div class="card shadow">
                                <div class="card-header bg-info text-white">
                                  Isi Disposisi
                                </div>
                                <div class="card-body">

                            <table class="table"  width="100%" cellspacing="0">

                                    <tr>
                                        <td>Perintah Dari</td>
                                        <td>: Sekertaris Bappeda</td>
                                    </tr>

                                    <tr>
                                        <td>Catatan</td>
                                        <td>: <?= $detail['catatan'] ?></td>
                                    </tr>
                            </table>

                        <div class="form-group row justify-content-start">
                            <div class="col-sm-10">
                            <a href="<?= base_url('bidangiv/masuk') ?>" class="btn btn-primary btn-sm">Kembali</a>
                            </div>
                         </div>
                                        
                                 </div>
                                 
                            </div>
                    </div>
                   
                        <!-- penutup 1 -->

                    <div class="col-lg-6">
                        <!-- Default Card Example -->
                        <div class="card mb-2">
                        <div class="card-header bg-info text-white">
                            Tampilan Surat
                            </div>
                            <div class="card-body">                
                        <?= form_error('durasi','<small class="text-danger pl-3">', '</small>'); ?>

                        <iframe src="<?= base_url('assets/surma/'.$detail['file_surat'])?>" height="750px" width="100%"></iframe>

                    </div>

                       

                            </div>
                        </div>
                        </div>
                        </div>
                      
                        </form>
                    <!-- </div>
                </div>
                 -->
      </div>
    </div>
</div>

