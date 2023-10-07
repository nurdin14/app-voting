<aside class="main-sidebar sidebar-dark-primary elevation-4" style="background-color: #2C3A47;">
  <!-- Brand Logo -->
  <a href="index3.html" class="brand-link">
    <img src="<?= base_url(); ?>assets/dist/img/Lambang_Universitas_Majalengka.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
    <span style="color: #f1f2f6;">E-</span><span style="color: #f1f2f6;">Voting</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-item">
          <a href="<?= site_url('admin/index') ?>" class="nav-link active">
            <i class="nav-icon fas fa-home"></i>
            <p>
              Dashboard
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="<?= site_url('admin/pemilih') ?>" class="nav-link">
            <i class="nav-icon fas fa-users"></i>
            <p>
              Pemilih
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="<?= site_url('admin/tampil_kandidat') ?>" class="nav-link">
            <i class="nav-icon fas fa-user-tie"></i>
            <p>
              Kandidat
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-vote-yea"></i>
            <p>
              Voting
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="<?= site_url('admin/voting') ?>" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Voting</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?= site_url('admin/tampil_voting') ?>" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Data Voting</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?= site_url('admin/hasil_vote') ?>" class="nav-link">
                <i class="far fa-circle  nav-icon"></i>
                <p>Hasil Voting</p>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item">
          <a href="<?= site_url('admin/cetak_voting') ?>" class="nav-link">
            <i class="nav-icon fas fa-poll-h"></i>
            <p>
              Cetak Voting
            </p>
          </a>
        </li>
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>