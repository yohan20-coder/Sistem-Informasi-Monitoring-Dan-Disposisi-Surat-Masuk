<!-- Begin Page Content -->
<div class="container-fluid">
              <!-- Basic Card Example -->
              <div class="card shadow">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary"><?= $judul;?></h6>
                </div>
                <div class="card-body col-lg-12">

          <!-- Page Heading -->
         <!--  <h1 class="h3 mb-4 text-gray-800"><?= $judul;?></h1> -->

         <div class="row">
         	<div class="col-lg-12">

                <!-- pesan error -->
            <?= form_error('menu', '<div class="alert alert-danger" role="alert">', '</div>'); ?>

            <!-- pesan berhasil tambah data -->
            <?= $this->session->flashdata('message');?>
         		 <!-- <form action="" method="post"> -->

              <?php echo form_open_multipart('agenda/add') ?>
              
              <input type="hidden" name="id" value="<?= $detail['id'];?>">

              <div class="form-group row">
                <label for="menu" class="col-sm-2 col-form-label">No.Surat</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="nosurat" value="<?= $detail['nosurat'];?>" readonly>
                  <?= form_error('nosurat','<small class="text-danger pl-3">', '</small>'); ?>
                </div>
              </div>

            

         	    <div class="form-group row">
         				<label for="menu" class="col-sm-2 col-form-label">Tanggal Surat</label>
         				<div class="col-sm-10">
                   <input type="date" class="form-control" name="tglmasuk" value="<?= $detail['tglsurat'];?>" readonly>
                   <?= form_error('tglmasuk','<small class="text-danger pl-3">', '</small>'); ?>
         				</div>
         			</div>

                <div class="form-group row">
         				<label for="menu" class="col-sm-2 col-form-label">Tanggal diterimah</label>
         				<div class="col-sm-10">
                   <input type="date" class="form-control" name="tgltrima" value="<?= $detail['tglteri'];?>" readonly>
                   <?= form_error('tgltrima','<small class="text-danger pl-3">', '</small>'); ?>
         				</div>
         			</div>

                     <div class="form-group row">
         				<label for="menu" class="col-sm-2 col-form-label">Perihal</label>
         				<div class="col-sm-10">
                   <input type="text" class="form-control" name="perihal" value="<?= $detail['perihal'];?>" readonly>
                   <?= form_error('perihal','<small class="text-danger pl-3">', '</small>'); ?>
         				</div>
         			</div>

                     <div class="form-group row">
                        <label for="ringkas" class="col-sm-2 col-form-label">Isi Ringkasan Surat</label>
                        <div class="col-sm-10">
                        <textarea class="form-control" name="ringkas" rows="6" readonly><?= $detail['isi'];?></textarea>
                        <?= form_error('ringkas','<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                    </div>


              <div class="form-group row">
         				<label for="menu" class="col-sm-2 col-form-label">Asal Instansi</label>
         				<div class="col-sm-10">
                   <input type="text" class="form-control" name="instansi" value="<?= $detail['instansi'];?>" readonly>
                   <?= form_error('instansi','<small class="text-danger pl-3">', '</small>'); ?>
         				</div>
         			</div>

            <iframe src="<?= base_url('assets/surma/'.$detail['file_surat'])?>" height="600px" width="100%"></iframe>

              <!-- <div class="form-group row">
         				<label for="menu" class="col-sm-2 col-form-label">Upload Surat</label>
         				<div class="col-sm-10">
         					<input type="file" class="form-control" name="surat">
         				</div>
         			</div> -->
       	</div>
         </div>       
      </div>

       </div><br>     
      

      <div class="card shadow">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Form Disposisi</h6>
                </div>
                <div class="card-body col-lg-12">
         <div class="row">
         	<div class="col-lg-12">

             <div class="form-group row">
                    <label for="nip" class="col-sm-2 col-form-label">Ditujukan Kepada</label>
                    <div class="col-sm-10">
                        <select name="jk" id="dis" class="form-control">
                            <option value="">Pilih</option>
                                <option value="Kapala Bappeda">Kapala Bappeda</option>
                                <option value="Kapala Bidang PP I">Kapala Bidang PP I</option>
                                <option value="Kapala Bidang PP II">Kapala Bidang PP II</option>
                                <option value="Kapala Bidang PP III">Kapala Bidang PP III</option>
                                <option value="Kapala Bidang PP IV">Kapala Bidang PP IV</option>
                        </select>
                    </div>
             </div>

             <div class="form-group row">
                        <label for="ringkas" class="col-sm-2 col-form-label">Catatan</label>
                        <div class="col-sm-10">
                        <textarea class="form-control" name="ringkas" rows="6"></textarea>
                        <?= form_error('ringkas','<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
            </div>

             <div class="form-group row justify-content-end">
                            <div class="col-sm-10">
                                <button type="Submit" class="btn btn-primary">Kirim Data</button>
                            </div>
                         </div>

            
              <?php echo form_close() ?>

             </div>
        </div>
    </div> 

      <!-- End of Main Content -->
      </div>  
    </div>  
</div>