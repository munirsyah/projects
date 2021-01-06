<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/main.css'); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/sweetalert.css'); ?>">
    <style type="text/css">
      
    </style>
    <title>Klinik Restu Medika</title>

  </head>
  <body class="sidebar-mini fixed">
    <div class="wrapper">
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
              <p class="designation">Dokter Spesialis</p>
            </div>
          </div>
          <!-- Sidebar Menu-->
          <ul class="sidebar-menu">
            <li><a href="<?php echo base_url(); ?>"><i class="fa fa-dashboard"></i><span>Dashboard</span></a></li>
            <li class="active"><a href="<?php echo base_url('c_dokter/input_diagnosa');?>"><i class="fa fa-user-md"></i><span>Input Data Diagnosa</span></a></li>
            <li><a href="<?php echo base_url('c_dokter/tampil_rekam_medis_pasien');?>"><i class="fa fa-heartbeat"></i><span>View Data Rekam Medis</span></a></li>
          </ul>
        </section>
      </aside>
      <div class="content-wrapper">
        <div class="page-title">
          <div>
            <h1><i class="fa fa-user-md"></i> Data Pasien Poliklinik</h1>
            <p> Dokter Spesialis</p>
          </div>
          <div>
            <ul class="breadcrumb">
              <li><i class="fa fa-home fa-lg"></i></li>
              <li><a href="<?php echo base_url(); ?>">Dashboard</a></li>
            </ul>
          </div>
        </div>
        <div class="row">
          <div class="col-md-4">
            <div class="card">
              <h3 class="card-title">Biodata Pasien</h3>
              <div class="card-body">
                <?php
                    foreach($berobat as $row){
                ?>

                <input type="hidden" name="id_berobat" value="<?php echo $row->id_berobat; ?>">

                <input type="hidden" name="id_pasien" value="<?php echo $row->id_pasien; ?>">

                <div class="form-group">
                    <label>Nama Lengkap</label>
                    <p class="form-control-static"><?php echo ucwords($row->nama_pasien);?></p>
                </div>

                <div class="form-group">
                    <label>Jenis Kelamin</label>
                    <p class="form-control-static"><?php echo ucfirst($row->jeniskelamin_pasien);?></p>
                </div>

                <div class="form-group">
                    <label>Golongan Darah</label>
                    <p class="form-control-static"><?php echo ucwords($row->goldar_pasien);?></p>
                </div>
              </div>
              <?php
                }
              ?>
            </div>
          </div>

          <div class="col-md-8">
            <div class="card">
              <h3 class="card-title">Data Rekam Medis Pasien</h3>
              <div class="card-body">
                <?php 
                  if($rekammedispasien){
                    foreach ($rekammedispasien as $row) {
                ?>
                  <div class="form-group">
                      <label>Tanggal Berobat / Diagnosa</label>
                      <p class="form-control-static"><?php echo date('d F Y',strtotime($row->tgl_diagnosa));?></p>
                  </div>

                  <div class="form-group">
                      <label>Keluhan Pasien</label>
                      <p class="form-control-static"><?php echo ucfirst($row->data_keluhan);?></p>
                  </div>

                  <div class="form-group">
                      <label>Hasil Diagnosa</label>
                      <p class="form-control-static"><?php echo ucfirst($row->data_diagnosa);?></p>
                  </div>

                  <div class="form-group">
                      <label>Obat</label>
                      <p class="form-control-static"><?php echo ucfirst($row->resep);?></p>
                  </div>

                   <div class="form-group">
                      <label>Tindakan</label>
                      <p class="form-control-static"><?php echo ucfirst($row->tindakan);?></p>
                  </div>


                <?php
                    }
                  } else {
                ?>
                  <br>

                  <div class="form-group">
                      <label> </label>
                      <p class="form-control-static"></p>
                  </div>

                  <h4 class="card-title" align="center">Belum ada Data Rekam Medis</h4>

                  <div class="form-group">
                      <label> </label>
                      <p class="form-control-static"></p>
                  </div>

                  <br>

                  <br>
                <?php
                  }
                  echo $this->pagination->create_links();
                ?>

              </div>
            </div>
          </div>

          <div class="col-md-8">
            <div class="card">
              <h3 class="card-title">Input Data Rekam Medis</h3>
              <div class="card-body3">
                <form role="form" action="<?php echo base_url('c_dokter/simpan_diagnosa');?>" method="post" onsubmit="register()">
                  
                  <?php
                    foreach($berobat as $row){
                  ?>

                    <input type="hidden" name="id_berobat" value="<?php echo $row->id_berobat; ?>">

                    <input type="hidden" name="id_pasien" value="<?php echo $row->id_pasien; ?>">

                  <div class="form-group">
                    <label for="disabledSelect">Tanggal Diagnosa</label>
                      <input class="form-control" id="disabledInput" type="text" value="<?php echo date('d F Y');?>" name="tgldiagnosa" disabled>
                  </div>

                  <div class="form-group">
                        <label>Keluhan Pasien</label>
                        <textarea class="form-control" rows="3" name="keluhan" placeholder="Data Keluhan Pasien" required oninvalid="this.setCustomValidity('Kolom Keluhan Pasien tidak boleh kosong')" oninput="setCustomValidity('')"></textarea>
                  </div>

                  <div class="form-group">
                        <label>Resep Obat</label>
                        <textarea class="form-control" rows="3" name="resep" placeholder="Resep Obat" required oninvalid="this.setCustomValidity('Kolom Resep Obat tidak boleh kosong')" oninput="setCustomValidity('')"></textarea>
                  </div>

                  <div class="form-group">
                        <label>Tindakan</label>
                        <textarea class="form-control" rows="3" name="tindakan" placeholder="Tindakan" required oninvalid="this.setCustomValidity('Kolom Tindakan tidak boleh kosong')" oninput="setCustomValidity('')"></textarea>
                  </div>

                  <div class="form-group">
                      <label>Hasil Diagnosa</label>
                      <textarea class="form-control" rows="3" name="diagnosa" placeholder="Data Hasil Diagnosa" required oninvalid="this.setCustomValidity('Kolom Hasil Diagnosa tidak boleh kosong')" oninput="setCustomValidity('')"></textarea>
                  </div>

                  <?php } ?>

                  <div class="form-group">
                      <button class="btn btn-primary icon-btn" type="submit">
                          <i class="fa fa-fw fa-lg fa-save"></i>
                          Simpan Data
                      </button>
                      <button class="btn btn-default icon-btn" type="reset">
                          <i class="fa fa-fw fa-lg fa-times-circle"></i>
                          Default</a>
                      </button>
                  </div>

                </form>
              </div>
            </div>
          </div>
        </div>
      </div>