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
         	<div class="col-lg-8">
         		<?= form_open_multipart('user/edit');?>
				 <input type="hidden" class="form-control" name="id" value="<?= $user['id'] ?>">
         			<div class="form-group row">
         				<label for="email" class="col-sm-2 col-form-label">Nip</label>
         				<div class="col-sm-10">
         					<input type="text" class="form-control" name="email" value="<?= $user['email']?>" readonly>
         				</div>
         			</div>

         			<div class="form-group row">
         				<label for="nama" class="col-sm-2 col-form-label">Nama</label>
         				<div class="col-sm-10">
         					<input type="text" class="form-control" name="nama" value="<?= $user['nama'] ?>">
         					<?= form_error('nama','<small class="text-danger pl-3">', '</small>'); ?>
         				</div>
         			</div>

         			<div class="form-group row">
         				<div class="col-sm-2">
         					Gambar
         				</div>
         				<div class="col-sm-10">
         					<div class="row">
         						<div class="col-sm-3">
         							<img src="<?= base_url('assets/img/profile/') . $user['image']?>" class="img-thumbnail">
         						</div>
         						<div class="col-sm-9">
         							<div class="custom-file">
         								<input type="file" class="custom-file-input" name="image">
         								<label class="custom-file-label" for="image">Custom File</label>
         							</div>
         						</div>
         					</div>
         				</div>
         			</div>

                <div class="form-group row justify-content-end">
                            <div class="col-sm-10">
                                <button type="Submit" class="btn btn-primary">Edit</button>
                            </div>
                         </div>
         		</form>
         	</div>
         </div>       
      </div>

       </div>       
      </div>  

      <!-- End of Main Content -->

</div>