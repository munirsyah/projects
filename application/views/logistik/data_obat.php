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
              <p class="designation">Staff Logistik</p>
            </div>
          </div>
          <!-- Sidebar Menu-->
          <ul class="sidebar-menu">
            <li><a href="<?php echo base_url(); ?>"><i class="fa fa-dashboard"></i><span>Dashboard</span></a></li>
            <li class="treeview"><a href=""><i class="fa fa-plus-circle"></i><span> Input Data Barang</span><i class="fa fa-angle-right"></i></a>
              <ul class="treeview-menu">
                <li><a href="<?php echo base_url('c_logistik/input_obat'); ?>"><i class="fa fa-medkit"></i> Obat</a></li>
                <li><a href="<?php echo base_url('c_logistik/input_item_non_obat');?>"><i class="fa fa-stethoscope"></i> Alat Medis</a></li>
              </ul>
            </li>
            <li class="treeview"><a href=""><i class="fa fa-gears"></i><span> Kelola Data Barang</span><i class="fa fa-angle-right"></i></a>
              <ul class="treeview-menu">
                <li class="active"><a href="<?php echo base_url('c_logistik/tampil_obat'); ?>"><i class="fa fa-medkit"></i> Obat</a></li>
                <li><a href="<?php echo base_url('c_logistik/tampil_item_non_obat');?>"><i class="fa fa-stethoscope"></i> Alat Medis</a></li>
              </ul>
            </li>
            <li><a href="<?php  echo base_url('c_logistik/penjualan_obat');?>"><i class="fa fa-medkit"></i><span>Penjualan Obat</span></a></li>
            <!-- <li><a href="<?php echo base_url('c_logistik/tampil_restock');?>"><i class="fa fa-list"></i><span>List Inventory re-Stock</span></a></li> -->
          </ul>
        </section>
      </aside>
      <div class="content-wrapper">
        <div class="page-title">
          <div>
            <h1><i class="fa fa-medkit"></i> Kelola Data Barang Jenis Obat</h1>
            <p> Staff Logistik</p>
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
              <h3 class="card-title">Data Barang Jenis Obat</h3>
                <a href="<?= base_url('c_logistik/cetak_obat'); ?>" class="btn btn-primary btn-md btn-circle pull-right" style="margin-bottom: 2%;" target="_blank"><i class="fa fa-print"></i> Print</a>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="table-responsive">
                            <table class="table table-hover table-striped" id="sampleTable">
                                <thead>
                                    <tr>
                                        <th>ID. Obat</th>
                                        <th>Nama Obat</th>
                                        <th>Jenis Obat</th>
                                        <th>Tanggal Kadaluarsa</th>
                                        <th>Harga Jual (Rp)</th>
                                        <th>Satuan</th>
                                        <th>Stok</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        if ($obat){
                                            foreach($obat as $row){
                                              if($row->stok_obat>5){
                                    ?>
                                    <tr>
                                        <td><?php echo $row->id_obat ?></td>
                                        <td><?php echo $row->nama_obat ?></td>
                                        <td><?php echo $row->jenis_obat ?></td>
                                        <td><?php echo date('d F Y',strtotime($row->tglkadaluarsa_obat)) ?></td>
                                        <td align="left"> <?php echo number_format ($row->hargajual_obat); ?> </td>
                                        <td><?php echo $row->satuan ?></td>
                                        <td align="left"> <?php echo $row->stok_obat ?></td>
                                        <td><?php echo anchor('c_logistik/edit_obat/'.$row->id_obat,'<i class="fa fa-edit fa-lg"></i>').' '.anchor('c_logistik/hapus_obat/'.$row->id_obat,'<i class="fa fa-close fa-lg"></i>',array('onclick' => 'if(!confirmhapusobat('.$row->id_obat.')) return false;')); ?></td>
                                     </tr>
                                    <?php
                                      }else{

                                        ?>
                                      <tr bgcolor="red">
                                        <td><?php echo $row->id_obat ?></td>
                                        <td><?php echo $row->nama_obat ?></td>
                                        <td><?php echo $row->jenis_obat ?></td>
                                        <td><?php echo date('d F Y',strtotime($row->tglkadaluarsa_obat)) ?></td>
                                        <td align="left"> <?php echo number_format ($row->hargajual_obat); ?> </td>
                                        <td><?php echo $row->satuan ?></td>
                                        <td align="left"> <?php echo $row->stok_obat ?></td>
                                        <td><?php echo anchor('c_logistik/edit_obat/'.$row->id_obat,'<i class="fa fa-edit fa-lg"></i>').' '.anchor('c_logistik/hapus_obat/'.$row->id_obat,'<i class="fa fa-close fa-lg"></i>',array('onclick' => 'if(!confirmhapusobat('.$row->id_obat.')) return false;')); ?></td>
                                     </tr>
                                      <?php      

                                        }
                                      }
                                        } else {
                                            echo '<td colspan="7" align="center">Tidak ada Data Obat<td>';
                                        }   
                                    ?>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
          </div>
        </div>
      </div>