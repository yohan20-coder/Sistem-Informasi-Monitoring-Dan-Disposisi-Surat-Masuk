

       <!-- Begin Page Content -->
        <div class="container-fluid">
          <!-- Page Heading -->
         <!--  <h1 class="h3 mb-4 text-gray-800"></h1> -->

          <div class="row">
            <div class="col-lg-12">

               <!-- Basic Card Example -->
              <div class="card shadow">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary"><?= $judul;?></h6>
                </div>
                <div class="card-body col-lg-12">

        <a href="<?= base_url('admin/role')?>" class="btn btn-sm btn-info mb-3">Kembali</a>
        <!-- pesan berhasil tambah data -->
        <?= $this->session->flashdata('message');?>

        <h5 class="mb-3 text-warning"><strong>Role : <?= $role['role'] ?></strong></h5>
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama Menu</th>
                            <th scope="col">Menu Controller</th>
                            <th scope="col">Access</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php $no = 1 ?>
                    <?php foreach($menu as $sm): ?>
                      <tr>
                          <td scope="row"><?= $no ?></td>
                          <td><?= $sm['name'] ?></td>
                          <td><?= $sm['menu'] ?></td>
                          <td>
                             <div class="form-check">
                                <input class="form-check-input cek" name="cek" type="checkbox" <?= check_acess($role['id'], $sm['id']);?> data-role ="<?= $role['id'];?>" data-menu ="<?= $sm['id'];?>">
                             </div>
                          </td>
                      </tr>
                  <?php $no++ ?>
                  <?php endforeach ?>

                    </tbody>
                </table>
            </div>
              </div>

            </div>

        
            </div>
          </div>

</div>


