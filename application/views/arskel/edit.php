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
         		 <!-- <form action="" method="post"> -->

              <?php echo form_open_multipart('arsip/editkelproses') ?>

              <input type="hidden" name="id" value="<?= $edit['id'];?>">

              <div class="form-group row">
                <label for="menu" class="col-sm-2 col-form-label">No.Surat</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="nosurat" value="<?= $edit['nosurat'];?>" required>
                  <?= form_error('nosurat','<small class="text-danger pl-3">', '</small>'); ?>
                </div>
              </div>

              <!-- <div class="form-group row">
                <label for="menu" class="col-sm-2 col-form-label">No.Klasifikasi</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="klasi" value="<?= $edit['noklasi'];?>" required>
                  <?= form_error('klasi','<small class="text-danger pl-3">', '</small>'); ?>
                </div>
              </div> -->


               <div class="form-group row">
                        <label for="ringkas" class="col-sm-2 col-form-label">Isi Ringkasan Surat</label>
                        <div class="col-sm-10">
                        <textarea class="form-control" name="ringkasan" rows="4" required><?= $edit['ringkasan'];?></textarea>
                        <?= form_error('ringkas','<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                    </div>


                

            <div class="form-group row">
         				<label for="menu" class="col-sm-2 col-form-label">Pengelolah</label>
         				<div class="col-sm-10">
                   <input type="text" class="form-control" name="pengelolah" value="<?= $edit['pengelolah'];?>" required>
                   <?= form_error('pengelolah','<small class="text-danger pl-3">', '</small>'); ?>
         				</div>
         			</div>

               

         	    <div class="form-group row">
         				<label for="menu" class="col-sm-2 col-form-label">Tanggal Surat</label>
         				<div class="col-sm-10">
                   <input type="date" class="form-control" name="tglmasuk" value="<?= $edit['tglsurat'];?>" required>
                   <?= form_error('tglmasuk','<small class="text-danger pl-3">', '</small>'); ?>
         				</div>
         			</div>

                   

              <div class="form-group row">
         				<label for="menu" class="col-sm-2 col-form-label">Kepada</label>
         				<div class="col-sm-10">
                   <input type="text" class="form-control" name="kepada" value="<?= $edit['kepada'];?>" required>
                   <?= form_error('kepada','<small class="text-danger pl-3">', '</small>'); ?>
         				</div>
         			</div>

               <div class="form-group row">
                        <label for="ringkas" class="col-sm-2 col-form-label">Keterangan</label>
                        <div class="col-sm-10">
                        <textarea class="form-control" name="keterangan" rows="4" required><?= $edit['keterangan'];?></textarea>
                        <?= form_error('keterangan','<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                    </div>


                    <div class="form-group row">
         				<label for="menu" class="col-sm-2 col-form-label">Upload Surat</label>
         				<div class="col-sm-10">
                 <iframe src="<?= base_url('assets/surkel/'.$edit['surat'])?>" height="470px" width="60%"></iframe>
                         <!-- <img src="<?= base_url('assets/surkel/').$edit['surat']?>" width="120"> -->
                         <input type="file" class="form-control" name="surat">
         				</div>
               
</div>

                <div class="form-group row justify-content-end">
                            <div class="col-sm-10">
                                <button type="Submit" class="btn btn-primary">Edit Data</button>
                            </div>
                         </div>
         		
             <?php echo form_close() ?>
             
         	</div>
         </div>       
      </div>

       </div>       
      </div>  

      <!-- End of Main Content -->

</div>