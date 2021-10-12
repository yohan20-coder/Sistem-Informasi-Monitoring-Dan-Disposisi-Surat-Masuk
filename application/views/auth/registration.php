<div class="container">

<div class="card o-hidden border-0 shadow-lg my-5 col-lg-7 mx-auto">
  <div class="card-body p-0">
    <!-- Nested Row within Card Body -->
    <div class="row">
      
      <div class="col-lg">
        <div class="p-5">
          <div class="text-center">
            <h1 class="h4 text-gray-900 mb-4">Daftar Account!</h1>
          </div>
          <form class="user" method="post" action="<?= base_url();?>auth/registration">
          <div class="form-group">
              <input type="text" class="form-control form-control-user" name="nama" id="nama" value="<?= set_value('nama') ?>" placeholder="Nama Anda...">
              <?= form_error('nama','<small class="text-danger pl-3">', '</small>'); ?>
            </div>

            <div class="form-group">
              <input type="text" class="form-control form-control-user" name="email" id="email" value="<?= set_value('email') ?>" placeholder="Email Address">
              <?= form_error('email','<small class="text-danger pl-3">', '</small>'); ?>
            </div>
            <div class="form-group row">
              <div class="col-sm-6 mb-3 mb-sm-0">
                <input type="password" class="form-control form-control-user" name="password1" id="password1" placeholder="Password Anda">
                <?= form_error('password1','<small class="text-danger pl-3">', '</small>'); ?>
              </div>
              <div class="col-sm-6">
                <input type="password" class="form-control form-control-user" name="password2" id="password2" placeholder="Ulangi Password">
               
              </div>
            </div>
            <button type="submit" class="btn btn-primary btn-user btn-block">Daftar</button>
            
            
          </form>
         <hr>
          <div class="text-center">
            <a class="small" href="forgot-password.html">Lupa Password?</a>
          </div>
          <div class="text-center">
            <a class="small" href="<?= base_url();?>auth">Sudah Mempunyai Account ? Login!</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

</div>