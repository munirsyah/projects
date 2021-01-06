<!-- Navbar-->
      <header class="main-header hidden-print"><a class="logo" href="<?php echo base_url(); ?>">Restu Medika</a>
        <nav class="navbar navbar-static-top">
          <!-- Sidebar toggle button--><a class="sidebar-toggle" href="#" data-toggle="offcanvas"></a>
          <!-- Navbar Right Menu-->
          <div class="navbar-custom-menu">
            <ul class="top-nav">
              
              <!-- User Menu-->
              <li class="dropdown"><a class="dropdown-toggle" href="#" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user fa-lg"></i></a>
                <ul class="dropdown-menu settings-menu">
                  <li><a href="#"><i class="fa fa-cog fa-lg"></i> Settings</a></li>
                  <li><a href="#"><i class="fa fa-user fa-lg"></i> Profile</a></li>
                  <li><a href="<?php echo base_url('c_authentication/logout');?>"><i class="fa fa-sign-out fa-lg"></i> Logout</a></li>
                </ul>
              </li>
            </ul>
          </div>
        </nav>
      </header>
      <!-- Side-Nav-->
      <aside class="main-sidebar hidden-print">
        <section class="sidebar">
          <div class="user-panel">
            <div class="pull-left image"><img class="img-circle" src="<?php echo base_url('assets/images/user.png'); ?>" alt="User Image"></div>
            <div class="pull-left info">
              <p><?php echo ucfirst($this->session->userdata('nama'));?></p>
              <p class="designation">Direktur Bidang Pelayanan</p>
            </div>
          </div>
          <!-- Sidebar Menu-->
          <ul class="sidebar-menu">
            <li><a href="<?php echo base_url(); ?>"><i class="fa fa-dashboard"></i><span>Dashboard</span></a></li>
            <li class="treeview"><a href=""><i class="fa fa-bar-chart"></i><span> Grafik</span><i class="fa fa-angle-right"></i></a>
              <ul class="treeview-menu">
                <li><a href="<?php echo base_url('c_direktur/statistikkunjungan'); ?>"><i class="fa fa-pie-chart"></i> Statistik Pasien Berobat</a></li>
                <li><a href="<?php echo base_url('c_direktur/statistikpendaftar'); ?>"><i class="fa fa-line-chart"></i> Statistik Berobat per Poliklinik</a></li>
              </ul>
            </li>
            <li class="active"s><a href="<?php echo base_url('c_direktur/cari_laporan_profil');?>"><i class="fa fa-file-pdf-o"></i><span>Arsip Profil Pasien</span></a></li>
          </ul>
        </section>
      </aside>
      <div class="content-wrapper">
        <div class="page-title">
          <div>
            <h1><i class="fa fa-file-pdf-o"></i> Arsip Profil Pasien</h1>
            <p> Direktur Bidang Pelayanan</p>
          </div>
          <div>
            <ul class="breadcrumb">
              <li><i class="fa fa-file-pdf-o fa-lg"></i></li>
              <li><a href="<?php echo base_url('c_direktur/cari_laporan_profil'); ?>">Arsip Profil Pasien</a></li>
            </ul>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <h3 class="card-title">Cari Data Profil</h3>
              <form role="form" action="<?php echo base_url('c_direktur/cari_laporan_profil');?>" method="post">
                <div class="form-group">
                <label>Cari berdasarkan Nama</label>
                <input class="form-control" placeholder="Masukkan Nama" name="nama" required oninvalid="this.setCustomValidity('Silahkan isi kolom pencarian terlebih dahulu')" oninput="setCustomValidity('')">
                </div>
                
                <div class="form-group">
                  <button class="btn btn-primary icon-btn" id="demoNotify" type="submit">
                      <i class="fa fa-fw fa-lg fa-search"></i>
                      Cari
                  </button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>