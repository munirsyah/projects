<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->  
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->  
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->  
<head>
    <title>Data Rekam Medis Klinik Restu Medika</title>



    <!-- Meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Responsive HTML5 Resume/CV Template for Developers">
    <meta name="author" content="Xiaoying Riley at 3rd Wave Media">    
    <link rel="shortcut icon" href="<?php echo base_url('assets2/health-512.ico'); ?>"> 

    <!-- Global CSS -->
    <link rel="stylesheet" media="screen" href="<?php echo base_url('assets2/plugins/bootstrap/css/bootstrap.min.css'); ?>" type="text/css">
    <link rel="stylesheet" media="print" href="<?php echo base_url('assets2/plugins/bootstrap/css/bootstrap.min.css'); ?>">

    <!-- Plugins CSS -->
    <link rel="stylesheet" media="screen" href="<?php echo base_url('assets2/plugins/font-awesome/css/font-awesome.css'); ?>" type="text/css">
    <link rel="stylesheet" media="print" href="<?php echo base_url('assets2/plugins/font-awesome/css/print-font-awesome.css'); ?>" type="text/css">

    <!-- Theme CSS -->  
    <link id="theme-style" rel="stylesheet" media="screen" href="<?php echo base_url('assets2/css/styles-4.css'); ?>" type="text/css">
    <link id="theme-style" rel="stylesheet" media="print" href="<?php echo base_url('assets2/css/print-styles-4.css'); ?>" type="text/css">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head> 

<body onload="window.print()">
    <div class="wrapper">
        <div class="sidebar-wrapper">
            <?php foreach ($pasien as $row) { ?>
            <div class="profile-container">
                
                <h1 class="name"><?php echo $row->nama_pasien; ?></h1>
            </div><!--//profile-container-->
            
            <div class="contact-container container-block">
                <ul class="list-unstyled contact-list">
                    <li class="address"><i class="fa fa-map-marker"></i><?php echo $row->alamat_pasien; ?></li>
                    <li class="phone"><i class="fa fa-phone"></i><?php echo $row->notelp_pasien; ?></li>
                    <li class="website"><i class="fa fa-medkit"></i><?php echo $row->goldar_pasien; ?></li>
                    <li class="linkedin"><i class="fa fa-intersex"></i><?php echo $row->jeniskelamin_pasien; ?></li>
                    <li class="github"><i class="fa fa-calendar"></i><?php echo $row->tmptlahir_pasien.', '.date('d F Y', strtotime($row->tgllahir_pasien)); ?></li>
                    <li class="twitter"><i class="fa fa-briefcase"></i><?php echo $row->pekerjaan_pasien; ?></li>
                </ul>
            </div><!--//contact-container-->
            <?php } ?>


        </div><!--//sidebar-wrapper-->
        
        <div class="main-wrapper">
            
            <section class="section experiences-section">
                <h2 class="section-title"><i class="fa fa-stethoscope"></i>Data Rekam Medis</h2>
                <?php foreach ($berobat as $row) { ?>
                <div class="item">
                    <div class="meta">
                        <div class="upper-row">
                            <h3 class="job-title"><?php echo $row->nama_dokter; ?></h3>
                            <div class="time"><?php echo date('d F Y', strtotime($row->tgl_diagnosa)); ?></div>
                        </div><!--//upper-row-->
                        <div class="company">Poliklinik <?php echo $row->spesialis_dokter; ?></div>
                    </div><!--//meta-->
                    <div class="details">
                        <h3 class="job-title">Data Keluhan Pasien : </h3>
                        <p align="justify"><?php echo $row->data_keluhan; ?></p> 
                        <h3 class="job-title">Resep Obat : </h3>
                        <p align="justify"><?php echo $row->resep; ?></p>
                        <h3 class="job-title">Hasil Diagnosa Dokter : </h3>
                        <p align="justify"><?php echo $row->data_diagnosa; ?></p>
                        <h3 class="job-title">Tindakan : </h3>
                        <p align="justify"><?php echo $row->tindakan; ?></p>
                    </div><!--//details-->
                </div><!--//item-->
                <?php } ?>
                <br>
            </section>

            <div class="text-center">
                <!--/* This template is released under the Creative Commons Attribution 3.0 License. Please keep the attribution link below when using for your own project. Thank you for your support. :) If you'd like to use the template without the attribution, you can check out other license options via our website: themes.3rdwavemedia.com */-->
                <small class="copyright">
                    Dikeluarkan oleh Klinik Restu Medika.<br>
                    Jl. Gor Karanganom No.Trono Tempursari Ngawen Kabupaten Klaten Jawa Tengah 57466 Indonesia
                </small>
            </div><!--//container-->
        
        </div><!--//main-body-->

    </div>
 
    <footer class="footer">      
        <script type="text/javascript">
            function myFunction() {
                window.print();
                printWindow.document.close();
            }
        </script>

        <!-- Javascript -->          
        <script type="text/javascript" src="<?php echo base_url('assets2/plugins/jquery-1.11.3.min.js'); ?>"></script>
        <script type="text/javascript" src="<?php echo base_url('assets2/plugins/bootstrap/js/bootstrap.min.js'); ?>"></script>    
        <!-- custom js -->
        <script type="text/javascript" src="<?php echo base_url('assets2/js/main.js'); ?>"></script>       
    </footer><!--//footer-->
             
</body>
</html> 

