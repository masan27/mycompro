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
            <h1 class="h3 mb-0 text-gray-800">Absen</h1>
          </div>

          <!-- Content Row -->
          <?php
          $data_toggle = '';
          $data_target = '';
          // echo $this->session->keluar;

          if ($this->session->keluar == 'N') {
            if (date('H:i:s') <= $items->selesai && date('H:i:s') >= $items->mulai) {
              $link = "keluar/" . $items->id;
              $ket = "Keluar";
              $style = "danger";
              $type = 'submit';
            } else {
              $link = "#";
              $ket = "Absen";
              $data_target = 'data-toggle="modal"';
              $data_toggle = 'data-target="#belumModal"';
              $style = "secondary";
              $type = 'button';
            }
          } else if ($this->session->keluar == '' || $this->session->keluar == 'Y') {
            if (date('H:i:s') <= $items->selesai && date('H:i:s') >= $items->mulai) {
              $link = "masuk/" . $items->id;
              $ket = "Masuk";
              $style = "success";
              $type = 'submit';
            } else {
              $link = "#";
              $ket = "Absen";
              $data_target = 'data-toggle="modal"';
              $data_toggle = 'data-target="#belumModal"';
              $style = "secondary";
              $type = 'button';
            }
          } else if ($this->session->keluar == 'O') {
            $link = "astur/" . $items->id . "#";
            $ket = "Sudah Absen";
            $style = "info";
            $type = 'button';
          }
          ?>
          <form method="post" action="<?php echo base_url('admin/absen/' . $link) ?>">
            <div class="card shadow mb-4">
              <div class="card-body">
                <?php if ($this->session->flashdata('success')) : ?>
                  <div class="alert alert-success" role="alert">
                    <?php echo $this->session->flashdata('success'); ?>
                  </div>
                <?php endif; ?>
                <?php if ($this->session->flashdata('error')) : ?>
                  <div class="alert alert-danger" role="alert">
                    <?php echo $this->session->flashdata('error'); ?>
                  </div>
                <?php endif; ?>
                <div class="form-row">
                  <div class="form-group col-md-3" style="text-align: center; width:100%;">
                    <img class="img-profile rounded-circle" src="<?php echo base_url('img/' . $this->session->foto) ?>" style="width: 100px;">
                    <span style="text-decoration: underline 3px green; font-size:25px; font-weight: bold; padding-left:50px; "><?= $this->session->nama ?></span>
                    </button>
                  </div>
                </div>
                <div class="form-row">
                  <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" data-page-length="100">
                      <thead>
                        <tr>
                          <td>Kelas</td>
                          <td>Matakuliah</td>
                          <td>Jam</td>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td>
                            <?= $items->kelas ?>
                          </td>
                          <td>
                            <?= $items->matkul ?>
                          </td>
                          <td>
                            <?= $items->mulai . ' - ' . $items->selesai ?>
                          </td>
                        </tr>
                      </tbody>
                    </table>

                  </div>
                </div>
                <div class="form-row">
                  <div class="form-group col-md-3">
                    <button type="<?= $type ?>" class="btn btn-<?= $style ?> btn-user btn-block" <?= $data_target . ' ' . $data_toggle ?>>
                      <span class="text" style="font-size: 15px;"><?= $ket ?></span>
                    </button>
                  </div>
                </div>
          </form>

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

</body>

</html>