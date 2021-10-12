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
         		 <!-- <form action="<?= base_url('agenda/editproses')?>" method="post"> -->

             <?= form_open_multipart('agenda/editproses') ?> 

              <input type="hidden" name="id" value="<?= $edit['id'];?>">

              <div class="form-group row">
                <label for="menu" class="col-sm-2 col-form-label">No.Surat</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="nosurat" value="<?= $edit['nosurat'];?>" required>
                  <?= form_error('nosurat','<small class="text-danger pl-3">', '</small>'); ?>
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
         				<label for="menu" class="col-sm-2 col-form-label">Tanggal diterimah</label>
         				<div class="col-sm-10">
                   <input type="date" class="form-control" name="tgltrima" value="<?= $edit['tglteri'];?>" required>
                   <?= form_error('tgltrima','<small class="text-danger pl-3">', '</small>'); ?>
         				</div>
         			</div>

                     <div class="form-group row">
         				<label for="menu" class="col-sm-2 col-form-label">Perihal</label>
         				<div class="col-sm-10">
                   <input type="text" class="form-control" name="perihal" value="<?= $edit['perihal'];?>" required>
                   <?= form_error('perihal','<small class="text-danger pl-3">', '</small>'); ?>
         				</div>
         			</div>

                     <div class="form-group row">
                        <label for="ringkas" class="col-sm-2 col-form-label">Isi Ringkasan Surat</label>
                        <div class="col-sm-10">
                        <textarea class="form-control" name="ringkas" rows="4"><?= $edit['isi'];?></textarea>
                        <?= form_error('ringkas','<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                    </div>


              <div class="form-group row">
         				<label for="menu" class="col-sm-2 col-form-label">Asal Instansi</label>
         				<div class="col-sm-10">
                   <input type="text" class="form-control" name="instansi" value="<?= $edit['instansi'];?>" required>
                   <?= form_error('instansi','<small class="text-danger pl-3">', '</small>'); ?>
         				</div>
         			</div>

              <div class="form-group row">
         				<label for="menu" class="col-sm-2 col-form-label">Edit Surat</label>
         				<div class="col-sm-10">
                         <iframe src="<?= base_url('assets/surma/'.$edit['file_surat'])?>" height="470px" width="60%"></iframe>
                         <input type="file" class="form-control" name="surat">
         				</div>
               
         			</div>

                 

                <div class="form-group row justify-content-end">
                            <div class="col-sm-10">
                                <button type="Submit" class="btn btn-primary">Edit Data</button>
                            </div>
                         </div>
         		
             <?php echo form_close() ?>
             <!-- </form> -->
         	</div>
         </div>       
      </div>

       </div>       
      </div>  

      <!-- End of Main Content -->

</div>