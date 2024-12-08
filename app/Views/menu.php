<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link collapsed" href="/home/dashboard">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->
      <?php
        if (session()->get('level')==1){
          ?>

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-file-person"></i><span>Data Master</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="/home/barang">
              <i class="bi bi-circle"></i><span>Barang</span>
            </a>
          </li>
          <li>
            <a href="/home/karyawan">
              <i class="bi bi-circle"></i><span>Karyawan</span>
            </a>
          </li>
          <li>
            <a href="/home/user">
              <i class="bi bi-circle"></i><span>User</span>
            </a>
          </li>

                  </ul>
      </li><!-- End Components Nav -->
    <?php } ?>
     <?php
        if (session()->get('level')==1 || session()->get('level')==2 || session()->get('level')==3){
          ?>
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#component-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-receipt"></i><span>Laporan Penjualan</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="component-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
          <li>
            <a href="/home/transaksi">
              <i class="bi bi-circle"></i><span>Transaksi</span>
            </a>
          </li>
          <li>
            <a href="/home/nota">
              <i class="bi bi-circle"></i><span>Nota</span>
            </a>
          </li>
        </ul>
      </li><!-- End Tables Nav -->
    <?php } ?>
    <?php
        if (session()->get('level')==1 || session()->get('level')==3){
          ?>
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-receipt"></i><span>Laporan</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="forms-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="/home/lbarangm">
              <i class="bi bi-circle"></i><span>Barang Masuk</span>
            </a>
          </li>
          <li>
            <a href="/home/lbarangk">
              <i class="bi bi-circle"></i><span>Barang Keluar</span>
            </a>
          </li>
        </ul>
      </li><!-- End Forms Nav -->
<?php } ?>
    <?php
        if (session()->get('level')==1 || session()->get('level')==4 || session()->get('level')==5) {
          ?>
      <li class="nav-item">
        <a class="nav-link " data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-cash-coin"></i><span>Transaksi</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="tables-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
          <?php
        if (session()->get('level')==1 || session()->get('level')==5){
          ?>
          <li>
            <a href="/home/barangmasuk">
              <i class="bi bi-circle"></i><span>Barang Masuk</span>
            </a>
          </li>
        <?php } ?>
        <?php
        if (session()->get('level')==1 || session()->get('level')==4){
          ?>
          <li>
            <a href="/home/barangkeluar">
              <i class="bi bi-circle"></i><span>Barang Keluar</span>
            </a>
          </li>
        <?php } ?>
        </ul>
      </li><!-- End Tables Nav -->
<?php } ?>
       <?php  if (session()->get('level')==9){
          ?>
      <li class="nav-heading">Halaman</li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="/home/profil">
          <i class="bi bi-person"></i>
          <span>Profile</span>
        </a>
      </li><!-- End Profile Page Nav -->
    <?php } ?>
    </li>
    </ul>

  </aside><!-- End Sidebar-->