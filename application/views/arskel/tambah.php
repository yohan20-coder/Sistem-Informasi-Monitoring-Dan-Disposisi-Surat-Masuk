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

              <?php echo form_open_multipart('arsip/add') ?>

              <div class="form-group row">
                <label for="menu" class="col-sm-2 col-form-label">No.Surat</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="nosurat">
                  <?= form_error('nosurat','<small class="text-danger pl-3">', '</small>'); ?>
                </div>
              </div>

               <div class="form-group row">
                        <label for="ringkas" class="col-sm-2 col-form-label">Isi Ringkasan Surat</label>
                        <div class="col-sm-10">
                        <textarea class="form-control" name="ringkas" rows="4"></textarea>
                        <?= form_error('ringkas','<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                    </div>


                

            <div class="form-group row">
         				<label for="menu" class="col-sm-2 col-form-label">Pengelolah</label>
         				<div class="col-sm-10">
                   <input type="text" class="form-control" name="pengelolah">
                   <?= form_error('pengelolah','<small class="text-danger pl-3">', '</small>'); ?>
         				</div>
         			</div>

               

         	    <div class="form-group row">
         				<label for="menu" class="col-sm-2 col-form-label">Tanggal Surat</label>
         				<div class="col-sm-10">
                   <input type="date" class="form-control" name="tglmasuk">
                   <?= form_error('tglmasuk','<small class="text-danger pl-3">', '</small>'); ?>
         				</div>
         			</div>

                   

              <div class="form-group row">
         				<label for="menu" class="col-sm-2 col-form-label">Kepada</label>
         				<div class="col-sm-10">
                   <input type="text" class="form-control" name="kepada">
                   <?= form_error('kepada','<small class="text-danger pl-3">', '</small>'); ?>
         				</div>
         			</div>

               <div class="form-group row">
                        <label for="ringkas" class="col-sm-2 col-form-label">Keterangan</label>
                        <div class="col-sm-10">
                        <textarea class="form-control" name="keterangan" rows="4"></textarea>
                        <?= form_error('keterangan','<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                    </div>


              <div class="form-group row">
         				<label for="menu" class="col-sm-2 col-form-label">Upload Surat</label>
         				<div class="col-sm-10">
         					<input type="file" class="form-control" name="surat">
                   <p class="text-danger">Peringatan : File Upload Adalah File PDF</p>
         				</div>
         			</div>

                     <!-- <div class="form-group row">
         				<label for="menu" class="col-sm-2 col-form-label">Lampiran 1</label>
         				<div class="col-sm-10">
         					<input type="file" class="form-control" name="lamp1">
         				</div>
         			</div>

                     <div class="form-group row">
         				<label for="menu" class="col-sm-2 col-form-label">Lampiran 2</label>
         				<div class="col-sm-10">
         					<input type="file" class="form-control" name="lamp2">
         				</div>
         			</div>

                     <div class="form-group row">
         				<label for="menu" class="col-sm-2 col-form-label">Lampiran 3</label>
         				<div class="col-sm-10">
         					<input type="file" class="form-control" name="lamp3">
         				</div>
         			</div> -->

                <div class="form-group row justify-content-end">
                            <div class="col-sm-10">
                                <button type="Submit" class="btn btn-primary">Tambah Data</button>
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