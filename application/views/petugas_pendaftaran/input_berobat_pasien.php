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
              <p class="designation">Petugas Pendaftaran</p>
            </div>
          </div>
          <!-- Sidebar Menu-->
          <ul class="sidebar-menu">
            <li><a href="<?php echo base_url(); ?>"><i class="fa fa-dashboard"></i><span>Dashboard</span></a></li>
            <li class="treeview"><a href=""><i class="fa fa-plus"></i><span>Daftar</span><i class="fa fa-angle-right"></i></a>
              <ul class="treeview-menu">
                <li><a href="<?php echo base_url('c_petugaspendaftaran/tambah_pasien'); ?>"><i class="fa fa-plus-square"></i> Pasien Baru</a></li>
                <li><a href="<?php echo base_url('c_petugaspendaftaran/daftar_berobat_pasien');?>"><i class="fa fa-stethoscope"></i> Berobat</a></li>
              </ul>
            </li>
            <li><a href="<?php echo base_url('c_petugaspendaftaran/tampil_pasien');?>"><i class="fa fa-gears"></i><span>Kelola Data Pasien</span></a></li>
            <li><a href="<?php echo base_url('c_petugaspendaftaran/list_data_berobat');?>"><i class="fa fa-table"></i><span>List Data Berobat</span></a></li>
            <li><a href="<?php echo base_url('c_petugaspendaftaran/detil_pasien');?>"><i class="fa fa-eye"></i><span>List Data Rinci Pasien</span></a></li>
          </ul>
        </section>
      </aside>
      <div class="content-wrapper">
        <div class="page-title">
          <div>
            <h1><i class="fa fa-stethoscope"></i> Daftar Berobat Pasien</h1>
            <p> Petugas Pendaftaran</p>
          </div>
          <div>
            <ul class="breadcrumb">
              <li><i class="fa fa-home fa-lg"></i></li>
              <li><a href="<?php echo base_url(); ?>">Dashboard</a></li>
            </ul>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <h3 class="card-title">Daftar Berobat Pasien</h3>
              
              <div class="row">
                    <div class="col-lg-12">
                        <form role="form" action="<?php echo base_url('c_petugaspendaftaran/cari_pasien');?>" method="post">

                            <div class="form-group">
                                <label>Cari Berdasarkan Nama Pasien</label>
                                <input class="form-control" type="text" required placeholder="Cari Berdasarkan Nama Pasien" name="nama" oninvalid="this.setCustomValidity('Silahkan isi kolom pencarian terlebih dahulu')" oninput="setCustomValidity('')">
                            </div>
                            <div class="form-group">
                                <button class="btn btn-primary icon-btn" type="submit">
                                    <i class="fa fa-fw fa-lg fa-search"></i>
                                    Cari
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-lg-12">
                        <?php
                            if ($pasien == null){
                                echo '<div class="form-group">';
                                echo '<label>Data Pasien tidak ditemukan</label>';
                                echo '</div>';
                            }else{
                        ?>
                        <h3 class="card-title">Hasil Pencarian</h3>
                        <table class="table table-hover">
                          <thead>
                            <tr>
                              <th>No</th>
                              <th>Nama Lengkap</th>
                              <th>Jenis Kelamin</th>
                              <th>Tempat & Tanggal Lahir</th>
                              <th>Golongan Darah</th>
                              <th>Aksi</th>
                            </tr>
                          </thead>
                          <tbody>
                          <?php $no = 1; foreach ($pasien as $row) {?>
                            <tr>
                              <td><?php echo $no; ?></td>
                              <td><?php echo $row->nama_pasien; ?></td>
                              <td><?php echo $row->jeniskelamin_pasien; ?></td>
                              <td><?php echo $row->tmptlahir_pasien.', '.date('d F Y',strtotime($row->tgllahir_pasien)); ?></td>
                              <td><?php echo $row->goldar_pasien; ?></td>
                              <td><?php echo anchor('c_petugaspendaftaran/form_daftar_berobat/'.$row->id_pasien,'<i class="fa fa-plus-circle fa-lg"></i> Daftar Berobat'); ?></td>
                            </tr>
                          <?php $no++; } ?>
                          </tbody>
                        </table>
                        <?php
                            }
                        ?>
                       
                    </div>

                </div>
            </div>
          </div>
        </div>
      </div>