<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">

<!-- Main Content -->
<div id="content">

  <!-- Topbar -->
  <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
    <!-- <marquee>Selamat Datang Di Sistem Kearsipan Digital</marquee> -->
    <!-- Sidebar Toggle (Topbar) -->
    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
      <i class="fa fa-bars"></i>
    </button>

   
    <!-- Topbar Navbar -->
    <ul class="navbar-nav ml-auto">

  <div class="top-divider d-none d-sm-block"></div>
      <!-- Nav Item - User Information -->
      <li class="nav-item dropdown no-arrow">
        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?= $user['nama'] ?></span>
          <img class="img-profile rounded-circle" src="<?= base_url('assets/img/profile/') . $user['image'];?>">
        </a>
        <!-- Dropdown - User Information -->
        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
          <a class="dropdown-item" href="<?= base_url('user') ?>">
            <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
            My Profile
          </a>

       
          <a class="dropdown-item" href="<?= base_url('user/edit');?>">
            <i class="fas fa-fw fa-user-edit fa-sm fa-fw mr-2 text-gray-400"></i>
            Edit Profile
          </a>

           <a class="dropdown-item" href="<?= base_url('user/changepassword');?>">
            <i class="fas fa-fw fa-key fa-sm fa-fw mr-2 text-gray-400"></i>
            Ubah Password
          </a>
   
          
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="<?= base_url('auth/logout');?>" data-toggle="modal" data-target="#logoutModal">
            <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
            Logout
          </a>
        </div>
      </li>

    </ul>

  </nav>
  <!-- End of Topbar -->