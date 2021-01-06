
    <!-- Javascripts-->
    <script src="<?php echo base_url('assets/js/jquery-2.1.4.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/essential-plugins.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/bootstrap.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/plugins/pace.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/main.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/js/plugins/chart.js'); ?>"></script>

    <script type="text/javascript" src="<?php echo base_url('assets/js/plugins/jquery.dataTables.min.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/js/plugins/dataTables.bootstrap.min.js'); ?>"></script>
    <script type="text/javascript">$('#sampleTable').DataTable();</script>

    <script type="text/javascript" src="<?php echo base_url('assets/js/plugins/bootstrap-datepicker.min.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/js/plugins/select2.min.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/js/plugins/bootstrap-datepicker.min.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/js/plugins/bootstrap-notify.min.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/js/plugins/sweetalert.min.js'); ?>"></script>
    <script>
      function register(){
        swal("Data berhasil disimpan!","", "success");
      }

      function update(){
        swal("Data berhasil diubah!","", "success");
      }

      function confirmhapuspasien(id){
        swal({
          title: "Anda yakin akan menghapus data pasien?",
          text: "Data yang telah dihapus tidak dapat dikembalikan!",
          type: "warning",
          showCancelButton: true,
          confirmButtonColor: "#DD6B55",
          confirmButtonText: "Ya",
          cancelButtonText: "Tidak!",
          closeOnConfirm: false,
          closeOnCancel: false
        },
        function(isConfirm){
          if (isConfirm) {
            swal("Deleted!", "Data Pasien dengan ID. "+id+" telah dihapus", "success");
            location.href = "http://localhost/proyekakhir/c_petugaspendaftaran/hapus_pasien/"+id;
          } else {
            swal("Cancelled","", "error");
          }
        });
      }

      function confirmhapusobat(id){
        swal({
          title: "Anda yakin akan menghapus data obat?",
          text: "Data yang telah dihapus tidak dapat dikembalikan!",
          type: "warning",
          showCancelButton: true,
          confirmButtonColor: "#DD6B55",
          confirmButtonText: "Ya",
          cancelButtonText: "Tidak!",
          closeOnConfirm: false,
          closeOnCancel: false
        },
        function(isConfirm){
          if (isConfirm) {
            swal("Deleted!", "Data Obat dengan ID. "+id+" telah dihapus", "success");
            location.href = "http://localhost/proyekakhir/c_logistik/hapus_obat/"+id;
          } else {
            swal("Cancelled","", "error");
          }
        });
      }

      function confirmhapusnonobat(id){
        swal({
          title: "Anda yakin akan menghapus data item medis?",
          text: "Data yang telah dihapus tidak dapat dikembalikan!",
          type: "warning",
          showCancelButton: true,
          confirmButtonColor: "#DD6B55",
          confirmButtonText: "Ya",
          cancelButtonText: "Tidak!",
          closeOnConfirm: false,
          closeOnCancel: false
        },
        function(isConfirm){
          if (isConfirm) {
            swal("Deleted!", "Data Item Medis non Obat dengan ID. "+id+" telah dihapus", "success");
            location.href = "http://localhost/proyekakhir/c_logistik/hapus_item_non_obat/"+id;
          } else {
            swal("Cancelled","", "error");
          }
        });
      }

      function confirmcancelberobat(id){
        swal({
          title: "Anda yakin akan meng-cancel pendaftaran?",
          text: "Data yang telah di-cancel tidak dapat dikembalikan!",
          type: "warning",
          showCancelButton: true,
          confirmButtonColor: "#DD6B55",
          confirmButtonText: "Ya",
          cancelButtonText: "Tidak!",
          closeOnConfirm: false,
          closeOnCancel: false
        },
        function(isConfirm){
          if (isConfirm) {
            swal("Confirmed!", "Data berobat telah di-cancel", "success");
            location.href = "http://localhost/proyekakhir/c_petugaspendaftaran/canceldaftar/"+id;
          } else {
            swal("Cancelled","", "error");
          }
        });
      }
    </script>
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
        format: "dd-mm-yyyy",
      	autoclose: true,
      	todayHighlight: true,
        startDate: new Date(),
      });

      $('#demoDatePasien').datepicker({
        format: "dd-mm-yyyy",
        autoclose: true,
        todayHighlight: true,
        endDate: new Date(),
      });

      $('#demoDate2').datepicker({
        format: "yyyy-mm-dd",
        autoclose: true,
        todayHighlight: true
      });
      
      $('#demoSelect').select2();
      </script>

      <script type="text/javascript">
      var data = {
        labels: ["January", "February", "March", "April", "May"],
        datasets: [
          {
            label: "My First dataset",
            fillColor: "rgba(220,220,220,0.2)",
            strokeColor: "rgba(220,220,220,1)",
            pointColor: "rgba(220,220,220,1)",
            pointStrokeColor: "#fff",
            pointHighlightFill: "#fff",
            pointHighlightStroke: "rgba(220,220,220,1)",
            data: [65, 59, 80, 81, 56]
          },
          {
            label: "My Second dataset",
            fillColor: "rgba(151,187,205,0.2)",
            strokeColor: "rgba(151,187,205,1)",
            pointColor: "rgba(151,187,205,1)",
            pointStrokeColor: "#fff",
            pointHighlightFill: "#fff",
            pointHighlightStroke: "rgba(151,187,205,1)",
            data: [28, 48, 40, 19, 86]
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
  </body>
</html>