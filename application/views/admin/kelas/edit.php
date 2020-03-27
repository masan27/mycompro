<?php
//asli
$bg_s = '';
$bg_d = '';
$txt = '';
$txt_wr = 'text-primary';
$txt800 = 'text-gray-800';
if (isset($_COOKIE['txt'])) {
  $bg_s = $_COOKIE['bg_s'];
  $bg_d = $_COOKIE['bg_d'];
  $txt = $_COOKIE['txt'];
  $txt_wr = $_COOKIE['txt_wr'];
  $txt800 = $_COOKIE['txt'];
}
?>

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
      <div class="<?= $bg_d ?>" id="content">

        <!-- Topbar -->
        <?php $this->load->view("admin/_partials/navbar.php") ?>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="<?= $bg_d ?> container-fluid">

          <?php if ($this->session->flashdata('success')) : ?>
            <div class="alert alert-success" role="alert">
              <?php echo $this->session->flashdata('success'); ?>
            </div>
          <?php endif; ?>

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 <?= $txt800 ?>">Kelas</h1>
          </div>

          <!-- Form -->
          <?php echo form_open('admin/kelas/edit/' .  $items->id) ?>
          <div class="card shadow mb-4 <?= $bg_s . ' ' . $txt ?>">
            <div class="card-header py-3 <?= $bg_d ?>">
              <h6 class="font-weight-bold <?= $txt_wr ?>" style="display: inline-block; margin-right: 1em;">Edit Kelas</h6>
            </div>
            <div class="card-body">
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="matkul">Mata Kuliah</label>
                  <input type="text" name="matkul" id="matkul" value="<?php echo set_value('matkul', $items->matkul) ?>" class="form-control <?php echo form_error('matkul') ? 'is-invalid' : '' ?>">
                  <div class="invalid-feedback">
                    <?php echo form_error('matkul') ?>
                  </div>
                </div>
                <div class="form-group col-md-6">
                  <label for="kelas">Kelas</label>
                  <input type="text" name="kelas" id="kelas" value="<?php echo set_value('kelas', $items->kelas) ?>" class="form-control autoFloat <?php echo form_error('kelas') ? 'is-invalid' : '' ?>">
                  <div class="invalid-feedback">
                    <?php echo form_error('kelas') ?>
                  </div>
                </div>
              </div>
              <div class="form-row">
                <div class="form-group col-md-4">
                  <label for="hari">Hari</label>
                  <?php
                  $options = array(
                    '' => 'Pilih Hari'
                  );
                  foreach ($hari as $subitem) {
                    $options[$subitem->kode] =  $subitem->nama;
                  }
                  $extra = array(
                    'id'    => 'hari',
                    'class'    => 'form-control params js-example-basic-single',
                  );
                  if (form_error('hari')) {
                    $extra['class'] = 'form-control params js-example-basic-single is-invalid';
                  }
                  echo form_dropdown('hari', $options, set_value('hari', $items->kode), $extra);
                  ?>
                  <div class="invalid-feedback">
                    <?php echo form_error('hari') ?>
                  </div>
                </div>
                <div class="form-group col-md-4">
                  <label for="jam_mulai">Jam Mulai</label>
                  <input type="time" name="jam_mulai" id="jam_mulai" value="<?php echo set_value('jam_mulai', $items->jam_mulai) ?>" class="form-control <?php echo form_error('jam_mulai') ? 'is-invalid' : '' ?>">
                  <div class="invalid-feedback">
                    <?php echo form_error('jam_mulai') ?>
                  </div>
                </div>
                <div class="form-group col-md-4">
                  <label for="jam_selesai">Jam Selesai</label>
                  <input type="time" name="jam_selesai" id="jam_selesai" value="<?php echo set_value('jam_selesai', $items->jam_selesai) ?>" class="form-control <?php echo form_error('jam_selesai') ? 'is-invalid' : '' ?>">
                  <div class="invalid-feedback">
                    <?php echo form_error('jam_selesai') ?>
                  </div>
                </div>
              </div>
              <div class="form-row">
                <div class="form-group col-md-12">
                  <label for="dosen">Dosen</label>
                  <input type="text" name="dosen" id="dosen" value="<?php echo set_value('dosen', $items->dosen) ?>" class="form-control ">
                </div>
                <div class="form-group col-md-12">
                  <label for="sks">SKS</label>
                  <input type="text" maxlength="1" name="sks" id="sks" value="<?php echo set_value('sks', $items->sks) ?>" class="form-control <?php echo form_error('jam_selesai') ? 'is-invalid' : '' ?>">
                </div>
                <div class="invalid-feedback">
                  <?php echo form_error('jam_selesai') ?>
                </div>
              </div>
              <div class="card-footer py-3 <?= $bg_s ?>">
                <button type="submit" class="btn btn-success btn-icon-split btn-sm">
                  <span class="icon text-white-50">
                    <i class="fas fa-save"></i>
                  </span>
                  <span class="text">Simpan</span>
                </button>
                <a href="<?php echo base_url('admin/kelas/') ?>" class="btn <?= $bg_d . ' ' . $txt ?> btn-icon-split btn-sm">
                  <span class="icon text-white-50">
                    <i class="fas fa-window-close"></i>
                  </span>
                  <span class="text">Tutup</span>
                </a>
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

    <link href="<?php echo base_url('assets/select2/select2.min.css') ?>" rel="stylesheet" />
    <link href="<?php echo base_url('assets/select2/select2-bootstrap.min.css') ?>" rel="stylesheet" />
    <script defer src="<?php echo base_url('assets/select2/select2.min.js') ?>"></script>
    <script>
      window.onload = function() {
        $('.js-example-basic-single').select2({
          placeholder: 'Pilih Hari',
          allowClear: true,
          minimumResultsForSearch: -1,
          theme: "bootstrap"
        });
        removeLoader();
      }
    </script>
    <script type="text/javascript" src="<?php echo base_url('assets/autoNumeric/autoNumeric.min.js') ?>"></script>
    <script>
      const autoFloatOptions = {
        digitGroupSeparator: '',
        decimalCharacter: '.',
        decimalPlaces: 0,
        modifyValueOnWheel: false,
      };
      new AutoNumeric('.autoFloat', autoFloatOptions);
    </script>

</body>

</html>