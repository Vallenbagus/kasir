<?php
$role = Yii::$app->user->isGuest ? null : Yii::$app->user->identity->role;
?>

<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
    
    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Kasir</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">
    <ul class="nav">
        <!-- Nav Item - Dashboard -->
        <li class="nav-item">
            <a class="nav-link" href="index.html">
                <i class="fas fa-fw fa-chart-bar"></i>
                <span>Dashboard</span>
            </a>
        </li>

        <?php
        if ($role === "admin") {
        ?>
            <li class="nav-item">
            <a class="nav-link" href="http://localhost/kasir/web/index.php?r=login%2Findex">
            <i class="fas fa-solid-regular fa-user"></i>
                <span>User</span>
            </a>
        </li>

            <!-- Nav Item - Produk -->
        <li class="nav-item">
            <a class="nav-link" href="http://localhost/kasir/web/index.php?r=tb-barang%2Findex">
                <i class="fas fa-solid fa-cart-plus"></i>
                <span>Produk</span>
            </a>
        </li>
        <?php
        }
        ?>
      
        
        <?php
        // Check if the user has the 'staff' role
        if ($role === "petugas") {
        ?>
            <li class="nav-item">
            <a class="nav-link" href="http://localhost/kasir/web/index.php?r=tb-pelanggan%2Findex">
            <i class="fas fa-solid fa-user-plus"></i>
                <span>Pelanggan</span>
            </a>
        <!-- Nav Item - kasir -->
        <li class="nav-item">
            <a class="nav-link" href="http://localhost/kasir/web/index.php?r=tb-penjualan%2Findex">
                <i class="fas fa-fw fa-clock"></i>
                <span>Transaksi</span>
            </a>
        </li>


           <!-- Nav Item - Detail Kasir -->
        <li class="nav-item">
            <a class="nav-link" href="http://localhost/kasir/web/index.php?r=tb-detailpenjualan%2Fcreate">
            <i class="fas fa-solid fa-file-invoice"></i>
                <span>Detailtransaksi</span>
            </a>
        </li>
        <?php
        }
        ?>
    </ul>
         
    </ul>
    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>
</ul>

<style>
    .nav {
        font-weight: bold;
    }
</style>