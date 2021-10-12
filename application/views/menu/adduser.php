   <!-- Begin Page Content -->
   <div class="container-fluid">
 <!-- Basic Card Example -->
              <div class="card shadow">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary"><?= $judul;?></h6>
                </div>
                <div class="card-body col-lg-12">

            <!-- konfirmasi -->
          <div class="row">
            <div class="col-md-12">
              <?= $this->session->flashdata('message'); ?>
            </div>
          </div>

                <div class="row">
                    <div class="col-lg-12">
                        <form action="<?= base_url('menu/tambahuser') ?>" method="post">

                        <div class="form-group">
                            <label for="nama">Nama Pengguna</label>
                            <input type="text" class="form-control" name="nama">
                            <?= form_error('nama','<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="email">NIP</label>
                            <input type="text" class="form-control" name="email">
                            <?= form_error('email','<small class="text-danger pl-3">', '</small>'); ?>
                        </div>

                    <div class="form-group">
                        <select name="user" id="menu_id" class="form-control">
                            <option value="">Pilih level</option>
                            <?php foreach($role as $m): ?>
                                <option value="<?= $m['id'] ?>"><?= $m['role'] ?></option>
                            <?php endforeach; ?>
                        </select>
                        <?= form_error('user','<small class="text-danger pl-3">', '</small>'); ?>
                    </div>

                        <div class="form-group">
                            <label for="new_password1">Password</label>
                            <input type="text" class="form-control" name="pass">
                            <?= form_error('pass','<small class="text-danger pl-3">', '</small>'); ?>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                        </form>
                    </div>
                </div>
                
        

            </div>
      <!-- End of Main Content -->
      </div>
    </div>
</div>