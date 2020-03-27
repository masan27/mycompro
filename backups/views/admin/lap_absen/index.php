<!DOCTYPE html>
<html lang="en">

<head>
  <?php $this->load->view("admin/_partials/head.php") ?>
</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <?php $this->load->view("admin/_partials/sidebar.php") ?>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <?php $this->load->view("admin/_partials/navbar.php") ?>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Laporan - Absensi</h1>
          </div>

          <!-- DataTales -->
          <?php
          if (isset($_REQUEST['tgl_dari']) && isset($_REQUEST['tgl_samp'])) {
            $tgl_dari = $_REQUEST['tgl_dari'];
            $tgl_samp = $_REQUEST['tgl_samp'];
          } else {
            $tgl_dari = date('Y-m-d');
            $tgl_samp = date('Y-m-d');
          }
          $tgl_dari_txt = date('d M Y', strtotime($tgl_dari));
          $tgl_samp_txt = date('d M Y', strtotime($tgl_samp));
          $tgl_periode_txt = $tgl_dari_txt . ' - ' . $tgl_samp_txt;
          $no = 1;
          ?>
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="font-weight-bold text-primary" style="display: inline-flex; margin: .75em 1em 0 0;vertical-align: top;">Cetak Laporan Absensi</h6>
              <div class="form-row" style="display: inline-flex; min-width: 75%;">
                <div class="col-3">
                  <div class="form-group" style="margin-bottom: 0px;">
                    <input type="date" name="tgl_dari" id="tgl_dari" value="<?php echo date('Y-m-d', strtotime($tgl_dari)) ?>" class="form-control" onchange="period_change(this)">
                  </div>
                </div>
                <div class="col-3">
                  <div class="form-group" style="margin-bottom: 0px;">
                    <input type="date" name="tgl_samp" id="tgl_samp" value="<?php echo date('Y-m-d', strtotime($tgl_samp)) ?>" class="form-control" onchange="period_change(this)">
                  </div>
                </div>
                <div class="col-3">
                  <?php
                  $period_url = base_url('admin/laporan/print');
                  if (isset($_REQUEST['tgl_dari']) && isset($_REQUEST['tgl_samp'])) {
                    $period_url .= '/?tgl_dari=' . $_REQUEST['tgl_dari'] . '&tgl_samp=' . $_REQUEST['tgl_samp'];
                  }
                  ?>
                  <a href="<?php echo $period_url ?>" target="_blank" class="btn btn-primary btn-icon-split">
                    <span class="icon text-white-50">
                      <i class="fas fa-print"></i>
                    </span>
                    <span class="text">Print</span>
                  </a>
                </div>
                <div class="col-2">
                  <a href="<?php echo current_url() ?>" class="btn btn-success btn-icon-split ">
                    <span class="icon text-white-50">
                      <i class="fas fa-sync-alt"></i>
                    </span>
                    <span class="text">Refresh</span>
                  </a>
                </div>
              </div>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered table-striped table-sm" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <td class="text-center" width="4%">No</td>
                      <td class="text-center" width="10%">Tanggal</td>
                      <td class="text-center" width="10%">Kelas</td>
                      <td class="text-center" width="10%">SKS</td>
                      <td class="text-center" width="46%">Astur</td>
                      <td class="text-center" width="20%">Jam</td>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $no = 1;
                    foreach ($absen as $item) {
                      ?>
                      <tr>
                      <?php
                        echo '<td class="text-center" style="vertical-align: middle">' . $no++ . '</td>
                                <td class="text-center" style="vertical-align: middle" >' . $item->tanggal . '</td>
                                <td class="text-center" style="vertical-align: middle" >' . $item->kelas . '</td>
                                <td class="text-center" style="vertical-align: middle">' . $item->sks . '</td>
                                <td style="vertical-align: middle">' . $item->nama . '</td>
                                <td class="text-center" style="vertical-align: middle">' . $item->mulai . ' / '.$item->selesai .'</td>';
                      }
                      ?>
                      </tr>
                      <?php
                      ?>
                  </tbody>
                </table>
                <table class="table table-bordered table-striped table-sm" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <td colspan="3" class="text-center font-weight-bold">Total SKS</td>
                    </tr>
                    <tr>
                      <td class="text-center" width="4%">No</td>
                      <td class="text-center" width="70%">Nama Astur</td>
                      <td class="text-center" width="26%">Jumlah SKS</td>
                    </tr>
                  </thead>
                  <?php $ni = 1;
                  foreach ($sks as $item) {
                    ?>
                    <tbody>
                      <tr>
                        <td class="text-center"><?= $ni++ ?></td>
                        <td class=><?= $item->nama ?></td>
                        <td class="text-center"><?= $item->sks ?></td>
                      </tr>
                    </tbody>
                  <?php } ?>
                </table>
              </div>
            </div>
          </div>
        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <?php $this->load->view("admin/_partials/footer.php") ?>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <?php $this->load->view("admin/_partials/scrolltop.php") ?>

  <!-- Logout Modal-->
  <?php $this->load->view("admin/_partials/modal.php") ?>

  <!-- Script -->
  <?php $this->load->view("admin/_partials/js.php") ?>

  <link href="<?php echo base_url('assets/select2/select2.min.css') ?>" rel="stylesheet" />
  <link href="<?php echo base_url('assets/select2/select2-bootstrap.min.css') ?>" rel="stylesheet" />
  <script defer src="<?php echo base_url('assets/select2/select2.min.js') ?>"></script>
  <script>

  </script>

  <!-- Page level custom scripts -->
  <script type="text/javascript">
    function period_change(selected) {
      // window.location = "<?php echo base_url('admin/lap_buku_besar/?period=') ?>" + selected.value;
      var tgl_dr = document.getElementById('tgl_dari').value;
      var tgl_sp = document.getElementById('tgl_samp').value;
      // var kd_akun = document.getElementById('kd_akun').value;
      window.location = "<?php echo base_url('admin/laporan') ?>" + "/?tgl_dari=" + tgl_dr + "&tgl_samp=" + tgl_sp;
    }
  </script>

</body>

</html>