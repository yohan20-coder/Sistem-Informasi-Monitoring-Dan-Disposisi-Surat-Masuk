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
         		<?= form_open_multipart('Arsip/img1/'.$edit['id']);?>

                 <input type="hidden" name="id" value="<?= $edit['id'];?>">

                 <!-- <div class="form-group row">
         				<label for="menu" class="col-sm-2 col-form-label">Lampiran 1</label>
         				<div class="col-sm-10">
                         <img src="<?= base_url('assets/surma/').$edit['lamp1']?>" width="120">
         					<input type="file" class="form-control" name="lamp1">
         				</div>
         			</div> -->

               <?php echo form_open_multipart('upload/do_upload');?>

               <div class="col-sm-10">
                         <img src="<?= base_url('assets/surma/').$edit['lamp1']?>" width="120">
         					<input type="file" class="form-control" name="lamp1">
         				</div>
              <input type="file" name="userfile" size="20" />

              <br /><br />

              <input type="submit" value="upload" />

              </form>
                     
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