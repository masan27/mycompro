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

          <?php if ($this->session->flashdata('success')) : ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
              <?php echo $this->session->flashdata('success'); ?>
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
          <?php endif; ?>

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard <?= $this->session->nama ?></h1>
          </div>

          <!-- DataTales -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="font-weight-bold text-primary" style="display: inline-block; margin-right: 1em;">Jadwal Mengajar Astur Minggu Ini</h6>
              <!-- <a href="<?php echo base_url('#') ?>" class="btn btn-primary btn-icon-split btn-sm">
                <span class="icon text-white-50">
                  <i class="fas fa-plus"></i>
                </span>
                <span class="text">Tambah</span>
              </a> -->
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" data-page-length="100">
                  <thead>
                    <tr>
                      <th width="5%">No</th>
                      <th width="5%">Kelas</th>
                      <th>Matakuliah</th>
                      <th>Astur</th>
                      <th>Jam</th>
                      <th>Dosen</th>
                      <th>Hari</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>Kelas</th>
                      <th>Matakuliah</th>
                      <th>Astur</th>
                      <th>Jam</th>
                      <th>Dosen</th>
                      <th>Hari</th>
                      <th>&nbsp;</th>
                    </tr>
                  </tfoot>
                  <tbody>
                    <?php $no = 1;
                    $kelas_id = 0;
                    $astur_sebelum = '';
                    foreach ($items as $item) {
                      if ($kelas_id == $item->kelas_id) { ?>
                        <tr>
                          <td><?= $no++ ?></td>
                          <td><?php echo $item->kelas ?></td>
                          <td><?php echo $item->matkul ?></td>
                          <td><?php echo $astur_sebelum . ' | ' . $item->nama ?></td>
                          <td><?php echo $item->mulai . ' - ' . $item->selesai ?></td>
                          <td><?php echo $item->dosen ?></td>
                          <td><?php echo $item->hari ?></td>
                        </tr>
                      <?php
                        } else {
                          $kelas_id = $item->kelas_id;
                          $astur_sebelum = $item->nama;
                          ?>
                        <tr>
                          <td><?= $no++ ?></td>
                          <td><?php echo $item->kelas ?></td>
                          <td><?php echo $item->matkul ?></td>
                          <td><?php echo $item->nama ?></td>
                          <td><?php echo $item->mulai . ' - ' . $item->selesai ?></td>
                          <td><?php echo $item->dosen ?></td>
                          <td><?php echo $item->hari ?></td>
                        </tr>
                    <?php
                      }
                    }
                    ?>
                  </tbody>
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

  <!-- Page level custom scripts -->
  <link href="<?php echo base_url('assets/datatables/dataTables.bootstrap4.min.css') ?>" rel="stylesheet">
  <script type="text/javascript" defer src="<?php echo base_url('assets/datatables/jquery.dataTables.min.js') ?>"></script>
  <script type="text/javascript" defer src="<?php echo base_url('assets/datatables/dataTables.bootstrap4.min.js') ?>"></script>
  <script type="text/javascript" defer src="<?php echo base_url('js/demo/datatables-demo.js') ?>"></script>
  <script>
    function deleteConfirm(url) {
      $('#btn-delete').attr('href', url);
      $('#deleteModal').modal();
    }
    window.setTimeout(function() {
      $(".alert").fadeTo(500, 0).slideUp(500, function() {
        $(this).remove();
      });
    }, 1000);
  </script>

</body>

</html>