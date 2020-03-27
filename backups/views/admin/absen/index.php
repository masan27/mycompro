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
            <h1 class="h3 mb-0 text-gray-800">Absen</h1>
          </div>

          <!-- DataTales -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="font-weight-bold text-primary" style="display: inline-block; margin-right: 1em;">Daftar Absen</h6>
              <div class="form-row" style="display: inline-flex; min-width: 50%;">
                <div class="col-2">
                  <a href="<?php echo current_url() ?>" class="btn btn-success btn-icon-split btn-sm">
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
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" data-page-length="100">
                  <thead>
                    <tr>
                      <th width="5%">No</th>
                      <th>Kelas</th>
                      <th>Jam</th>
                      <th>Matkuliah</th>
                      <th style="width:55px;">&nbsp;</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>No</th>
                      <th>Kelas</th>
                      <th>Jam</th>
                      <th>Matkuliah</th>
                      <th>&nbsp;</th>
                    </tr>
                  </tfoot>
                  <tbody>
                    <?php $no = 1;                     
                    foreach ($items as $item) :
                      if ($dr_izin != NULL) {                                              
                      foreach ($dr_izin as $row) { 
                        if ($row->dari == $this->session->user_id) {                            
                        }else { 
                      ?>
                      <tr>
                        <td><?= $no++ ?></td>
                        <td>
                          <?php echo $item->kelas ?>
                        </td>
                        <td>
                          <?php echo $item->mulai . ' - ' . $item->selesai ?>
                        </td>
                        <td>
                          <?php echo $item->matkul ?>
                        </td>
                        <td align="center">
                          <a href="<?php echo base_url('admin/absen/astur/' . $item->id) ?>" class="btn btn-success btn-icon-split btn-sm">
                            <span class="icon text-white-50">
                              <i class="fas fa-door-open"></i>
                            </span>
                            <span class="text">Masuk</span>
                        </td>
                      </tr>
                      <?php } } } else {
                         ?>
                      <tr>
                        <td><?= $no++ ?></td>
                        <td>
                          <?php echo $item->kelas ?>
                        </td>
                        <td>
                          <?php echo $item->mulai . ' - ' . $item->selesai ?>
                        </td>
                        <td>
                          <?php echo $item->matkul ?>
                        </td>
                        <td align="center">
                          <a href="<?php echo base_url('admin/absen/astur/' . $item->id) ?>" class="btn btn-success btn-icon-split btn-sm">
                            <span class="icon text-white-50">
                              <i class="fas fa-door-open"></i>
                            </span>
                            <span class="text">Masuk</span>
                        </td>
                      </tr>
                      <?php
                      }
                       endforeach;
                    if ($izin != NULL) {
                      ?>
                      <tr>
                        <td>&nbsp;</td>
                      </tr>
                      <tr>
                        <td colspan="5" align="center">Daftar Backup Kelas Lain</td>
                      </tr>
                    <?php }
                    foreach ($izin as $item) : ?>
                      <tr>
                        <td><?= $no++ ?></td>
                        <td>
                          <?php echo $item->kelas ?>
                        </td>
                        <td>
                          <?php echo $item->mulai . ' - ' . $item->selesai ?>
                        </td>
                        <td>
                          <?php echo $item->matkul ?>
                        </td>
                        <td align="center">
                          <a href="<?php echo base_url('admin/absen/backup/' . $item->jadwal_id) ?>" class="btn btn-success btn-icon-split btn-sm">
                            <span class="icon text-white-50">
                              <i class="fas fa-door-open"></i>
                            </span>
                            <span class="text">Masuk</span>
                        </td>
                      </tr>
                    <?php endforeach; ?>
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