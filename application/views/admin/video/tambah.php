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

        // Form buka 
        echo form_open(base_url('admin/video'));
        ?>

        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label>Judul Video</label>
              <input type="text" name="judul" class="form-control" value="<?php echo set_value('judul') ?>" required placeholder="Judul Video">
            </div>
          </div>

          <div class="col-md-6">
            <div class="form-group">
              <label>Posisi Video</label>
              <select name="posisi" class="form-control">
                <option value="Homepage">Homepage - Main page</option>
                <option value="Video">Video - Video page</option>
              </select>
            </div>
          </div>

          <div class="col-md-12">
            <div class="form-group">
              <label>Kode Video dari Youtube</label>
              <input type="text" name="video" required class="form-control" placeholder="Kode video dari Youtube" value="<?php echo set_value('video') ?>">
              <span class="text-warning"> https://www.youtube.com/watch?v=xxxxxxxxxx</span>
            </div>
          </div>

          <div class="col-md-12">
            <div class="form-group">
              <label>Keterangan</label>
              <textarea name="keterangan" placeholder="Keterangan" class="form-control" id="keterangan"><?php echo set_value('keterangan') ?></textarea>
            </div>
          </div>

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