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
if (isset($edit)) {
?>

  <div class="modal fade" id="Edit" tabindex="1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog <?= $bg . ' ' . $txt ?>">
      <div class="modal-content <?= $bg . ' ' . $txt ?>">
        <div class="modal-header <?= $bg . ' ' . $txt ?>">
          <h5 class="modal-title <?= $bg . ' ' . $txt ?>" id="exampleModalLabel">Edit data?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span class="<?= $txt ?>" aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body <?= $bg . ' ' . $txt ?>">

          <?php
          // Validasi error
          echo validation_errors('<div class="alert alert-warning">', '</div>');

          // Form buka 
          echo form_open(base_url('admin/berita/kategori/'.$edit->id_kategori));
          ?>

          <div class="form-group">
            <input type="text" name="nama_kategori" class="form-control" placeholder="Nama kategori" value="<?php echo set_value('nama_kategori', $edit->nama_kategori) ?>" required>
          </div>

          <div class="form-group text-center">
            <input type="submit" name="submit" class="btn btn-success btn-lg" value="Simpan Data">
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
<?php } ?>