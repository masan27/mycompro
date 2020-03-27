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
            <h1 class="h3 mb-0 text-gray-800">Bungkus</h1>
          </div>

          <!-- DataTales -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="font-weight-bold text-primary" style="display: inline-block; margin-right: 1em;">Daftar Bungkus</h6>
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
              <?php
              // echo $this->session->lainnya;


              ?>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" data-page-length="100">
                    <thead>
                      <tr>
                        <th width="5%">No</th>
                        <th>Tanggal</th>
                        <th width="5%">Kelas</th>
                        <th>Matakuliah</th>
                        <th>Nama</th>
                        <th style="width:100px;"></th>
                      </tr>
                    </thead>
                    <tfoot>
                      <tr>
                        <th>No</th>
                        <th>Tanggal</th>
                        <th>Kelas</th>
                        <th>Matakuliah</th>
                        <th>Nama</th>
                        <th></th>
                      </tr>
                    </tfoot>
                    <tbody>
                      <?php $no = 1;
                      foreach ($items as $item) {
                        if ($item->nama == NULL) {
                          $class = 'check';
                          $text = 'Bungkus';
                          $style = 'primary';
                          $modal = 'accConfirm';
                          $url = 'admin/lainnya_acc/yes/' . $item->id;
                        } else {
                          if ($item->nama == $this->session->nama) {
                            $class = 'times';
                            $text = 'Batalkan';
                            $style = 'info';
                            $modal = 'cancelConfirm';
                            $url = 'admin/lainnya_acc/cancel/' . $item->id;
                          } else {
                            $class = 'exclamation';
                            $text = 'Sudah diisi';
                            $style = 'warning';
                            $modal = 'fillConfirm';
                            $url = "";
                          }
                        }
                        ?>
                        <tr>
                          <td><?= $no++ ?></td>
                          <td>
                            <?php echo $item->tanggal ?>
                          </td>
                          <td>
                            <?php echo $item->kelas ?>
                          </td>
                          <td>
                            <?php echo $item->matkul; ?>
                          </td>
                          <td>
                            <?php echo $item->nama ?>
                          </td>
                          <td align="center">
                            <a onclick="<?= $modal ?>('<?php echo base_url($url) ?>')" href="#!" class="btn btn-<?= $style ?> btn-icon-split btn-sm">
                              <span class="icon text-white-50">
                                <i class="fas fa-<?= $class ?>"></i>
                              </span>
                              <span class="text"><?= $text ?></span>
                            </a>
                          </td>
                        </tr>
                      <?php } ?>
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
    <!-- <link href="<?php echo base_url('assets/toggle/bootstrap4-toggle.min.css') ?>" rel="stylesheet">
  <script type="text/javascript" defer src="<?php echo base_url('assets/toggle/bootstrap4-toggle.min.js') ?>"></script> -->
    <link href="<?php echo base_url('assets/datatables/dataTables.bootstrap4.min.css') ?>" rel="stylesheet">
    <script type="text/javascript" defer src="<?php echo base_url('assets/datatables/jquery.dataTables.min.js') ?>"></script>
    <script type="text/javascript" defer src="<?php echo base_url('assets/datatables/dataTables.bootstrap4.min.js') ?>"></script>
    <script type="text/javascript" defer src="<?php echo base_url('js/demo/datatables-demo.js') ?>"></script>
    <script>
      function accConfirm(url) {
        $('#modalacc').attr('href', url);
        $('#accModal').modal();
      }

      function cancelConfirm(url) {
        $('#modalcancel').attr('href', url);
        $('#cancelModal').modal();
      }

      function fillConfirm(url) {
        $('#btn-warning').attr('href', url);
        $('#fillModal').modal();
      }
      window.setTimeout(function() {
        $(".alert").fadeTo(500, 0).slideUp(500, function() {
          $(this).remove();
        });
      }, 1000);
    </script>

</body>

</html>