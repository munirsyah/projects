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
            <li><a href="<?php echo base_url('c_direktur/cari_laporan_profil');?>"><i class="fa fa-file-pdf-o"></i><span>Arsip Profil Pasien</span></a></li>
          </ul>
        </section>
      </aside>
      <div class="content-wrapper">
        <div class="page-title">
          <div>
            <h1><i class="fa fa-pie-chart"></i> Statistik Pasien Berobat</h1>
            <p> Direktur Bidang Pelayanan</p>
          </div>
          <div>
            <ul class="breadcrumb">
              <li><i class="fa fa-pie-chart fa-lg"></i></li>
              <li><a href="<?php echo base_url(); ?>">Statistik Pasien Berobat</a></li>
            </ul>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <h3 class="card-title">Tentukan Periode Berobat Pasien</h3>
              <form role="form" class="form-inline" action="<?php echo base_url('c_direktur/statistikkunjungan');?>" method="post">
                <div class="form-group">
                <label>Dari : </label>
                <input class="form-control" id="demoDate" type="text" placeholder="Tanggal Awal Periode" name="tanggalawal" required>
                </div>

                <div class="form-group">
                <label>Hingga : </label>
                <input class="form-control" id="demoDate2" type="text" placeholder="Tanggal Akhir Periode" name="tanggalakhir" required>
                </div>
                
                <div class="form-group">
                  <button class="btn btn-primary icon-btn" id="demoNotify" type="submit">
                      <i class="fa fa-fw fa-lg fa-search"></i>
                      Tampilkan
                  </button>
                </div>
              </form>
            </div>
          </div>
        </div>
            <?php if(isset($tanggal)){ if($tanggal){?>
              <div class="row">
                <div class="col-lg-6">
                  <div class="card">
                    <h3 class="card-title">Grafik Bar</h3>
                    <div class="embed-responsive embed-responsive-16by9">
                      <canvas class="embed-responsive-item" id="barChartDemo"></canvas>
                    </div>
                  </div>
                </div>

                <div class="col-lg-6">  
                  <div class="card">
                    <h3 class="card-title">Grafik Garis</h3>
                    <div class="embed-responsive embed-responsive-16by9">
                      <canvas class="embed-responsive-item" id="lineChartDemo"></canvas>
                    </div>
                  </div>
                </div>
              </div>
            <?php } } ?>
            </div>
          </div>
        </div>
      </div>

    <!-- Javascripts-->
    <script src="<?php echo base_url('assets/js/jquery-2.1.4.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/essential-plugins.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/bootstrap.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/plugins/pace.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/main.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/js/plugins/chart.js'); ?>"></script>
    <script type="text/javascript">
      var data = {
        labels: [<?php $no=1; foreach ($tanggal as $row) {
          if($no > 1){
            echo ', "'.date('d F Y', strtotime($row->tgl_berobat)).'"';
          } else {
            echo '"'.date('d F Y', strtotime($row->tgl_berobat)).'"';
          }
          $no++;
        }?>],
        datasets: [
          {
            label: "My First dataset",
            fillColor: "rgba(0,0,255,0.3)",
            strokeColor: "rgba(0,0,255,0.3)",
            pointColor: "rgba(0,0,255,0.3)",
            pointStrokeColor: "#fff",
            pointHighlightFill: "#fff",
            pointHighlightStroke: "rgba(151,187,205,1)",
            data: [<?php $no=1; foreach ($total as $row) {
              if($no > 1){
                echo ', '.$row->jumlah;
              } else {
                echo $row->jumlah;
              }
              $no++;
            }?>]
          }
        ]
      };
      var pdata = [
        {
          value: 300,
          color:"#F7464A",
          highlight: "#FF5A5E",
          label: "Red"
        },
        {
          value: 50,
          color: "#46BFBD",
          highlight: "#5AD3D1",
          label: "Green"
        },
        {
          value: 100,
          color: "#FDB45C",
          highlight: "#FFC870",
          label: "Yellow"
        }
      ]
      
      var ctxl = $("#lineChartDemo").get(0).getContext("2d");
      var lineChart = new Chart(ctxl).Line(data);
      
      var ctxb = $("#barChartDemo").get(0).getContext("2d");
      var barChart = new Chart(ctxb).Bar(data);
      
      var ctxr = $("#radarChartDemo").get(0).getContext("2d");
      var barChart = new Chart(ctxr).Radar(data);
      
      var ctxpo = $("#polarChartDemo").get(0).getContext("2d");
      var barChart = new Chart(ctxpo).PolarArea(pdata);
      
      var ctxp = $("#pieChartDemo").get(0).getContext("2d");
      var barChart = new Chart(ctxp).Pie(pdata);
      
      var ctxd = $("#doughnutChartDemo").get(0).getContext("2d");
      var barChart = new Chart(ctxd).Doughnut(pdata);
    </script>

    <script type="text/javascript" src="<?php echo base_url('assets/js/plugins/jquery.dataTables.min.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/js/plugins/dataTables.bootstrap.min.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/js/plugins/bootstrap-datepicker.min.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/js/plugins/select2.min.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/js/plugins/bootstrap-datepicker.min.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/js/plugins/bootstrap-notify.min.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/js/plugins/sweetalert.min.js'); ?>"></script>
    <script type="text/javascript">
      $('#sl').click(function(){
        $('#tl').loadingBtn();
        $('#tb').loadingBtn({ text : "Signing In"});
      });
      
      $('#el').click(function(){
        $('#tl').loadingBtnComplete();
        $('#tb').loadingBtnComplete({ html : "Sign In"});
      });
      
      $('#demoDate').datepicker({
        format: "yyyy-mm-dd",
        autoclose: true,
        todayHighlight: true
      });

      $('#demoDate2').datepicker({
        format: "yyyy-mm-dd",
        autoclose: true,
        todayHighlight: true
      });
      
      $('#demoSelect').select2();
      </script>

  </body>
</html>