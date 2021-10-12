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
         		 <form action="" method="post">
                    <input type="hidden" name="id" value="<?= $ubah['id'];?>">

              <div class="form-group row">
                <label for="menu" class="col-sm-2 col-form-label">Nama Menu</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="nama" value="<?= $ubah['name'] ?>">
                  <?= form_error('nama','<small class="text-danger pl-3">', '</small>'); ?>
                </div>
              </div>

         			<div class="form-group row">
         				<label for="menu" class="col-sm-2 col-form-label">Menu Control</label>
         				<div class="col-sm-10">
         					<input type="text" class="form-control" name="menu" value="<?= $ubah['menu'] ?>" readonly>
                  <?= form_error('menu','<small class="text-danger pl-3">', '</small>'); ?>
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