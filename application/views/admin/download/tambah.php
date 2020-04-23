<?php
//asli
$bg = '';
$btn_wr = 'btn-primary';
$txt = '';
if (isset($_COOKIE['txt'])) {
  $bg = $_COOKIE['bg_d'];
  $txt = $_COOKIE['txt'];
  $btn_wr = $_COOKIE['btn_wr'];
}
?>

<div class="modal fade bd-example-modal-lg" id="Tambah" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg <?= $bg . ' ' . $txt ?>">
    <div class="modal-content <?= $bg . ' ' . $txt ?>">
      <div class="modal-header <?= $bg . ' ' . $txt ?>">
        <h5 class="modal-title <?= $bg . ' ' . $txt ?>" id="exampleModalLabel">Tambah data?</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span class="<?= $txt ?>" aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body <?= $bg . ' ' . $txt ?>">

        <?php
        // Validasi error
        echo validation_errors('<div class="alert alert-warning">', '</div>');

        // Error upload
        if (isset($error)) {
          echo '<div class="alert alert-warning">';
          echo $error;
          echo '</div>';
        }


        // Form buka 
        echo form_open_multipart(base_url('admin/download'));
        ?>


        <div class="row">
          <div class="col-md-12">
            <div class="form-group form-group-lg">
              <label>Nama file/download</label>
              <input type="text" name="judul_download" class="form-control" placeholder="Judul download" value="<?php echo set_value('judul_download') ?>">
            </div>
          </div>

          <div class="col-md-12">
            <div class="custom-file">
              <label>Upload File</label>
              <input id="tambah_gambar" type="file" name="gambar" class="custom-file-input file-tambah" placeholder="Upload gambar">
              <label class="custom-file-label" for="gambar">Pilih File</label>
            </div>
          </div>          

        </div>

        <div class="form-group text-center">
          <input type="submit" name="submit" class="simpan btn btn-success btn-lg" value="Simpan Data">
        </div>
        <div class="clearfix"></div>

        <?php
        // Form close 
        echo form_close();
        ?>

      </div>
      <div class="modal-footer <?= $bg . ' ' . $txt ?>">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>