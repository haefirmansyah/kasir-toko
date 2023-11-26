<!-- Brand Logo -->
<a href="#" class="brand-link">
  <span class="brand-text font-weight-light"> <b>Bintang Utama Komputer</b></span>
</a>

<!-- Sidebar -->
<div class="sidebar">
  <!-- Sidebar user panel (optional) -->
  <div class="user-panel mt-3 pb-3 mb-3 d-flex">
    <div class="image">
      <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
    </div>
    <div class="info">
      <a href="#" class="d-block">
        <?php echo $_SESSION['username']; ?>
      </a>
    </div>
  </div>

  <!-- Sidebar Menu -->
  <nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
      <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

      <li class="nav-item">
        <a href="index.php" class="nav-link">
          <i class="nav-icon fas fa-th"></i>
          <p>
            Dashboard
          </p>
        </a>
      </li>

      <li class="nav-header">DATA MASTER</li>
      <li class="nav-item">
        <a href="pelanggan.php" class="nav-link">
          <i class="nav-icon fas fa-user-tag fa-sm"></i>
          <p>
            Pelanggan

          </p>
        </a>
      </li>
      <li class="nav-item has-treeview">
        <a href="#" class="nav-link">
        <i class="nav-icon fas fa-hands-helping"></i>
          <p>
            Layanan
            <i class="fas fa-angle-left right"></i>
          </p>
        </a>
        <ul class="nav nav-treeview">
          <li class="nav-item">
            <a href="jasa.php" class="nav-link">
              <i class="far fa-circle nav-icon fa-sm"></i>
              <p>Daftar Jasa Service</p>
            </a>
          </li>


      </li>

    </ul>
    <li class="nav-item has-treeview">
      <a href="#" class="nav-link">
        <i class="nav-icon fas fa-boxes fa-sm"></i>
        <p>
          Stok Sparepart
          <i class="fas fa-angle-left right"></i>
        </p>
      </a>
      <ul class="nav nav-treeview">
        <li class="nav-item">
          <a href="sparepart.php" class="nav-link">
            <i class="far fa-circle nav-icon"></i>
            <p>Daftar Stock Sparepart</p>
          </a>
        </li>

    </li>

    </ul>
    </li>
    <li class="nav-header">DATA SERVICE MASUK </li>
    <li class="nav-item">
      <a href="servis.php" class="nav-link">
        <i class="nav-icon fas fa-file"></i>
        <p>Input SERVICE </p>
      </a>
    </li>

    <li class="nav-header">DATA TRANSAKSI</li>
    <li class="nav-item">
      <a href="transaksi-head.php" class="nav-link">
      <i class="nav-icon fas fa-money-check-alt fa-sm"></i>
        <p>Transaksi</p>
      </a>
    </li>

    <li class="nav-header">LAPORAN</li>
    <li class="nav-item has-treeview">
      <a href="#" class="nav-link">
        <i class="fas fa-file nav-icon"></i>
        <p>
          Jenis Laporan
          <i class="right fas fa-angle-left"></i>
        </p>
      </a>
      <ul class="nav nav-treeview">
        <li class="nav-item">
          <?php
          $status = $_SESSION["hak_akses"];
          if ($status == "admin" or $status == "owner") {

            echo "<a href='laporan-transaksi.php' class='nav-link'>";
          } else {
            echo "<a href='#' class='nav-link'>";
          }

          ?>
          <i class="far fa-dot-circle nav-icon"></i>
          <p>Laporan Transaki</p>
          </a>
        </li>
        <li class="nav-item">
          <?php
          $status = $_SESSION["hak_akses"];
          if ($status == "admin" or $status == "owner") {

            echo "<a href='laporan-jasa.php' class='nav-link'>";
          } else {
            echo "<a href='#' class='nav-link'>";
          }

          ?>
          <i class="far fa-dot-circle nav-icon"></i>
          <p>Laporan Jasa</p>
          </a>
        </li>
        <li class="nav-item">
          <?php
          $status = $_SESSION["hak_akses"];
          if ($status == "admin" or $status == "owner") {

            echo "<a href='laporan-sparepart.php' class='nav-link'>";
          } else {
            echo "<a href='#' class='nav-link'>";
          }

          ?>
          <i class="far fa-dot-circle nav-icon"></i>
          <p>Laporan Sparepart</p>
          </a>
        </li>


      </ul>
      <?php
      $status = $_SESSION["hak_akses"];
      if ($status == "admin" or $status == "owner") {
        echo "
        <li class='nav-header'>Hak Admin / Owner</li>
              <li class='nav-item has-treeview'>
                <a href='#' class='nav-link'>
                  <i class='fas fa-file nav-icon'></i>
                  <p>
                    Fasilitas
                    <i class='right fas fa-angle-left'></i>
                  </p>
                </a>
                <ul class='nav nav-treeview'>
                  <li class='nav-item'>
                   <a href='akun.php' class='nav-link'> 
                 
                      <i class='far fa-dot-circle nav-icon'></i>
                      <p>Akun</p>
                    </a>
                  </li>
                  <li class='nav-item'>
                   <a href='kategori.php' class='nav-link'> 
                 
                      <i class='far fa-dot-circle nav-icon'></i>
                      <p>Kategori</p>
                    </a>
                  </li>";
      }
      ?>


      </ul>
  </nav>
  <!-- /.sidebar-menu -->
</div>
<!-- /.sidebar -->