
        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <!-- <h1 class="h3 mb-4 text-gray-800"><?= $judul;?></h1> -->
          <h6 class="text-center text-warning"><strong>Selamat Datang Di Dashboard Sistem Status Anda <br> Adalah : Kapala Bidang PP I</strong></h6><br>


   <!-- Content Row -->
   <div class="row">

<!-- Earnings (Monthly) Card Example -->
<div class="col-xl-3 col-md-6 mb-4">
  <div class="card border-left-danger shadow h-100 py-2">
    <div class="card-body">
      <div class="row no-gutters align-items-center">
        <div class="col mr-2">
          <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Surat Masuk Belum Dibaca</div>
          <div class="h5 mb-0 font-weight-bold text-gray-800">Total : <?= $jml?></div>
        </div>
        <div class="col-auto">
          <!-- <i class="fas fa-book fa-2x text-gray-300"></i> -->
          <img class="img-thumbnail" src="<?= base_url('assets/');?>img/3.svg" width="80" alt="">
        </div>
      </div>
    </div>
  </div>
</div>

<div class="col-xl-3 col-md-6 mb-4">
  <div class="card border-left-warning shadow h-100 py-2">
    <div class="card-body">
      <div class="row no-gutters align-items-center">
        <div class="col mr-2">
          <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Surat Masuk Sudah Dibaca</div>
          <div class="h5 mb-0 font-weight-bold text-gray-800">Total : <?= $jmla?></div>
        </div>
        <div class="col-auto">
          <!-- <i class="fas fa-book fa-2x text-gray-300"></i> -->
          <img class="img-thumbnail" src="<?= base_url('assets/');?>img/3.svg" width="80" alt="">
        </div>
      </div>
    </div>
  </div>
</div>

<div class="col-xl-3 col-md-6 mb-4">
  <div class="card border-left-primary shadow h-100 py-2">
    <div class="card-body">
      <div class="row no-gutters align-items-center">
        <div class="col mr-2">
          <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total  Surat</div>
          <div class="h5 mb-0 font-weight-bold text-gray-800">Total : <?= $jml + $jmla ?></div>
        </div>
        <div class="col-auto">
          <!-- <i class="fas fa-book fa-2x text-gray-300"></i> -->
          <img class="img-thumbnail" src="<?= base_url('assets/');?>img/2.svg" width="80" alt="">
        </div>
      </div>
    </div>
  </div>
</div>

</div>

         
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

</div>