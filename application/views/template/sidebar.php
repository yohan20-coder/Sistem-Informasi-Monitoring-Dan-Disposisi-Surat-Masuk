<!-- Sidebar -->
<ul class="navbar-nav sidebar sidebar-dark accordion" id="accordionSidebar" style="background-color: #037ca0">

<!-- Sidebar - Brand -->
<a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
  <div class="sidebar-brand-icon rotate-n-15">
    <i class="fas fa-laptop-code"></i>
  </div>
  <div class="sidebar-brand-text mx-3">DISPOSISI ONLINE</div>
</a>

<!-- Divider -->
<hr class="sidebar-divider">

<!-- Membuat query join tabel user_menu dengan tabel user_access_menu dari menu -->

<?php
    $role_id = $this->session->userdata('role_id');
    $querymenu = "SELECT `user_menu`.`id`, `name` 
              FROM `user_menu` JOIN `user_access_menu` 
              ON `user_menu`.`id` = `user_access_menu`.`menu_id`     
              WHERE `user_access_menu`.`role_id` = $role_id 
                ORDER BY `user_access_menu`.`menu_id` ASC
              ";

    $menu = $this->db->query($querymenu)->result_array();       //mengmbil query menu kemudian di masukan dlm result array karena data yg diambil banyak
    // var_dump($menu);
    // die;
?>

<!-- Looping menu -->
  <?php foreach($menu as $m):?>
      <div class="sidebar-heading">
        <?= $m['name'];?>
      </div>

  <!-- Looping sub menu -->

  <?php
    //Membuat Query Join tabel menu dengan tabel sub menu
    $menu_id = $m['id'];
    $querysubmenu = "SELECT *
            FROM `user_sub_menu` JOIN `user_menu` 
            ON `user_sub_menu`.`menu_id` = `user_menu`.`id`     
            WHERE `user_sub_menu`.`menu_id` = $menu_id 
             AND `user_sub_menu`.`is_active`= 1
            ";
     $submenu = $this->db->query($querysubmenu)->result_array(); 
 ?>


    <?php foreach($submenu as $sm): ?>
  <!-- Nav Item - Dashboard -->
    <?php if($judul == $sm['title']) :?>
      <li class="nav-item active">
    <?php else: ?>
      <li class="nav-item">
    <?php endif;?>
          <a class="nav-link pb-0" href="<?= base_url( $sm['url']);?>">
             <i class="<?= $sm['icon'] ?>"></i>
            <span><?= $sm['title'] ?></span></a>
      </li>
      
    <?php endforeach ; ?>

    <hr class="sidebar-divider mt-3">

  <?php endforeach;  ?>

<li class="nav-item">
  <a class="nav-link" href="<?= base_url('auth/logout');?>">
    <i class="fas fa-fw fa-sign-out-alt"></i>
    <span>Logout</span></a>
</li>


<!-- Divider -->
<hr class="sidebar-divider d-none d-md-block">

<!-- Sidebar Toggler (Sidebar) -->
<div class="text-center d-none d-md-inline">
  <button class="rounded-circle border-0" id="sidebarToggle"></button>
</div>

</ul>
<!-- End of Sidebar -->


