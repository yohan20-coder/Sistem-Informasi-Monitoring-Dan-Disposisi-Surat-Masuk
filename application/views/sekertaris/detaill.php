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
                    <form action="<?= base_url();?>sekertaris/detail/<?= $detail['id'] ?>" method="post">
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
                                    <input type="hidden" name="nosurat" value="<?= $detail['nosurat'];?>">
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
                                   Disposisi
                                </div>
                                <div class="card-body">

                                    <!-- <div class="form-group row">
                                        <label for="nip">Ditujukan Kepada</label>
                                            <select name="dis" id="dis" class="form-control">
                                                <option value="">Pilih</option>
                                                    <option value="Kapala Bappeda">Kapala Bappeda</option>
                                                    <option value="Kapala Bidang PP I">Kapala Bidang PP I</option>
                                                    <option value="Kapala Bidang PP II">Kapala Bidang PP II</option>
                                                    <option value="Kapala Bidang PP III">Kapala Bidang PP III</option>
                                                    <option value="Kapala Bidang PP IV">Kapala Bidang PP IV</option>
                                            </select>
                                         
                                </div> -->
                                <div class="form-group row">
                                    <label for=""> <strong>Ditujukan Kepada :</strong></label>
                                </div>

                                <div class="form-check row ml-2">
                                            <input class="form-check-input" type="checkbox" name="dis1" value="Kapala Bappeda">
                                            <label for="nip">Kapala Bappeda</label>
                                </div>
                                <div class="form-check row  ml-2">
                                            <input class="form-check-input" type="checkbox" name="dis2" value="Kapala Bidang PP I">
                                            <label for="nip">Kapala Bidang PP I</label>
                                </div>
                                <div class="form-check row  ml-2">
                                            <input class="form-check-input" type="checkbox" name="dis3" value="Kapala Bidang PP II">
                                            <label for="nip">Kapala Bidang PP II</label>
                                </div>
                                <div class="form-check row  ml-2">
                                            <input class="form-check-input" type="checkbox" name="dis4" value="Kapala Bidang PP III">
                                            <label for="nip">Kapala Bidang PP III</label>
                                </div>
                                <div class="form-check row  ml-2">
                                            <input class="form-check-input" type="checkbox" name="dis5" value="Kapala Bidang PP IV">
                                            <label for="nip">Kapala Bidang PP IV</label>
                                </div>

                                <div class="form-group row">
                                            <label for="ringkas"><strong>Catatan</strong></label>
                                            <textarea class="form-control" name="ringkas" rows="6"></textarea>
                                            <?= form_error('ringkas','<small class="text-danger pl-3">', '</small>'); ?>
                                </div>

                                <div class="form-group row justify-content-start">
                                                    <button type="Submit" class="btn btn-sm btn-primary">Kirim Data</button>
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

                        <!-- <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-block">Simpan Data</button>
                        </div> -->

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

