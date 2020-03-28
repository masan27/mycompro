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

<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog <?= $bg . ' ' . $txt ?>" role="document">
    <div class="modal-content <?= $bg . ' ' . $txt ?>">
      <div class="modal-header <?= $bg . ' ' . $txt ?>">
        <h5 class="modal-title <?= $bg . ' ' . $txt ?>" id="exampleModalLabel">Hai.. <?= $this->session->nama ?></h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span class="<?= $txt ?>" aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body <?= $bg . ' ' . $txt ?>">
        Apa Anda yakin melakukan logout??
      </div>
      <div class="modal-footer <?= $bg . ' ' . $txt ?>">
        <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
        <a class="btn btn-primary" href="<?php echo base_url('login/logout') ?>">Logout</a>
      </div>
    </div>
  </div>
</div>

<!-- Delete Confirmation-->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog <?= $bg . ' ' . $txt ?>" role="document">
    <div class="modal-content <?= $bg . ' ' . $txt ?>">
      <div class="modal-header <?= $bg . ' ' . $txt ?>">
        <h5 class="modal-title <?= $bg . ' ' . $txt ?>" id="exampleModalLabel">Apakah Anda Yakin?</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span class="<?= $txt ?>" aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body <?= $bg . ' ' . $txt ?>">Data yang dihapus tidak akan bisa dikembalikan.</div>
      <div class="modal-footer <?= $bg . ' ' . $txt ?>">
        <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
        <a id="btn-delete" class="btn btn-danger" href="#">Hapus</a>
      </div>
    </div>
  </div>
</div>

<!-- Ubah Akses-->
<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog <?= $bg . ' ' . $txt ?>" role="document">
    <div class="modal-content <?= $bg . ' ' . $txt ?>">
      <div class="modal-header <?= $bg . ' ' . $txt ?>">
        <h5 class="modal-title <?= $bg . ' ' . $txt ?>" id="exampleModalLabel">Apakah Anda Yakin?</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span class="<?= $txt ?>" aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body <?= $bg . ' ' . $txt ?>">Untuk mengubah Hak Akses Login?</div>
      <div class="modal-footer <?= $bg . ' ' . $txt ?>">
        <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
        <a id="btn-warning" class="btn btn-warning" href="#">Yakin</a>
      </div>
    </div>
  </div>
</div>

<!-- Notification-->
<div class="modal fade" id="notifModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog <?= $bg . ' ' . $txt ?>" role="document">
    <div class="modal-content <?= $bg . ' ' . $txt ?>">
      <div class="modal-header <?= $bg . ' ' . $txt ?>">
        <h5 class="modal-title <?= $bg . ' ' . $txt ?>" id="exampleModalLabel">Hei <?= $this->session->nama ?> kamu mengalami kesulitan melakukan login?? <br> Silahkan Hubungi Kami..</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span class="<?= $txt ?>" aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body <?= $bg . ' ' . $txt ?>">
        <ol>
          <li>Bu Rusma <a href="https://api.whatsapp.com/send?phone=6285715980304"> <img class="img-profile rounded-circle" src="<?php echo base_url('img/web-whatsapp.png') ?>" width="7%">Whatsapp </a></li>
          <li>Sian27 <a href="https://api.whatsapp.com/send?phone=6283893361181"> <img class="img-profile rounded-circle" src="<?php echo base_url('img/web-whatsapp.png') ?>" width="7%">Whatsapp </a></li>
        </ol>
      </div>
      <div class="modal-footer <?= $bg . ' ' . $txt ?>">
        <button class="btn btn-secondary" type="button" data-dismiss="modal">Tutup</button>
      </div>
    </div>
  </div>
</div>

<!-- Belum Bisa Login -->
<div class="modal fade" id="belumModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog <?= $bg . ' ' . $txt ?>" role="document">
    <div class="modal-content <?= $bg . ' ' . $txt ?>">
      <div class="modal-header <?= $bg . ' ' . $txt ?>">
        <h5 class="modal-title <?= $bg . ' ' . $txt ?>" id="exampleModalLabel">Hai <?= $this->session->nama ?></h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span class="<?= $txt ?>" aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body <?= $bg . ' ' . $txt ?>">
        Maaf tapi sepertinya belum waktunya kamu melakukan login <br> Silahkan coba sesuai dengan jadwal kamu yah.. <?= $this->session->nama ?>
      </div>
      <div class="modal-footer <?= $bg . ' ' . $txt ?>">
        <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
      </div>
    </div>
  </div>
</div>

<!-- Isi Kelas-->
<div class="modal fade" id="accModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog <?= $bg . ' ' . $txt ?>" role="document">
    <div class="modal-content <?= $bg . ' ' . $txt ?>">
      <div class="modal-header <?= $bg . ' ' . $txt ?>">
        <h5 class="modal-title <?= $bg . ' ' . $txt ?>" id="exampleModalLabel">Apakah Anda Yakin?</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span class="<?= $txt ?>" aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body <?= $bg . ' ' . $txt ?>">Untuk mengisi kelas kosong ini?</div>
      <div class="modal-footer <?= $bg . ' ' . $txt ?>">
        <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
        <a id="modalacc" class="btn <?= $btn_wr ?>" href="#">Yakin</a>
      </div>
    </div>
  </div>
</div>

<!-- Batal Kelas-->
<div class="modal fade" id="cancelModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog <?= $bg . ' ' . $txt ?>" role="document">
    <div class="modal-content <?= $bg . ' ' . $txt ?>">
      <div class="modal-header <?= $bg . ' ' . $txt ?>">
        <h5 class="modal-title <?= $bg . ' ' . $txt ?>" id="exampleModalLabel">Apakah Anda Yakin?</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span class="<?= $txt ?>" aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body <?= $bg . ' ' . $txt ?>">Untuk membatalkan mengisi kelas ini?</div>
      <div class="modal-footer <?= $bg . ' ' . $txt ?>">
        <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
        <a id="modalcancel" class="btn btn-warning" href="#">Yakin</a>
      </div>
    </div>
  </div>
</div>

<!-- Kelas Penuh-->
<div class="modal fade" id="fillModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog <?= $bg . ' ' . $txt ?>" role="document">
    <div class="modal-content <?= $bg . ' ' . $txt ?>">
      <div class="modal-header <?= $bg . ' ' . $txt ?>">
        <h5 class="modal-title <?= $bg . ' ' . $txt ?>" id="exampleModalLabel">Hai.. <?= $this->session->nama ?></h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span class="<?= $txt ?>" aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body <?= $bg . ' ' . $txt ?>">Maaf kelas ini sudah penuh</div>
      <div class="modal-footer <?= $bg . ' ' . $txt ?>">
        <button class="btn btn-secondary" type="button" data-dismiss="modal">Tutup</button>
      </div>
    </div>
  </div>
</div>

<!-- Libur Confirmation-->
<div class="modal fade" id="liburModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog <?= $bg . ' ' . $txt ?>" role="document">
    <div class="modal-content <?= $bg . ' ' . $txt ?>">
      <div class="modal-header <?= $bg . ' ' . $txt ?>">
        <h5 class="modal-title <?= $bg . ' ' . $txt ?>" id="exampleModalLabel">Haii.. <?= $this->session->nama ?></h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span class="<?= $txt ?>" aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body <?= $bg . ' ' . $txt ?>">
        Dikarenakan tanggal hari ini tanggal merah, jadi kelas di liburkan<br>
        Jika kamu merasa hari ini bukan tanggal merah silahkan hubungi admin atau pj astur..
      </div>
      <div class="modal-footer <?= $bg . ' ' . $txt ?>">
        <button class="btn btn-secondary" type="button" data-dismiss="modal">Tutup</button>
      </div>
    </div>
  </div>
</div>

<!-- Theme Confirmation-->
<div class="modal fade" id="themeModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog <?= $bg . ' ' . $txt ?>" role="document">
    <div class="modal-content <?= $bg . ' ' . $txt ?>">
      <div class="modal-header <?= $bg . ' ' . $txt ?>">
        <h5 class="modal-title <?= $bg . ' ' . $txt ?>" id="exampleModalLabel">Haii.. <?= $this->session->nama ?></h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span class="<?= $txt ?>" aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body <?= $bg . ' ' . $txt ?>">
        Fitur ini masih beta dan kemungkinan tidak akan berjalan sempurna di beberapa perangkat.<br> Apakah anda yakin untuk mengubah tema aplikasi???
      </div>
      <div class="modal-footer <?= $bg . ' ' . $txt ?>">
        <button class="btn btn-secondary" type="button" data-dismiss="modal">Tutup</button>
        <a id="modaltheme" class="btn <?= $btn_wr ?>" href="#">Yakin</a>
      </div>
    </div>
  </div>
</div>

<!-- Active Confirmation-->
<div class="modal fade" id="aktifModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog <?= $bg . ' ' . $txt ?>" role="document">
    <div class="modal-content <?= $bg . ' ' . $txt ?>">
      <div class="modal-header <?= $bg . ' ' . $txt ?>">
        <h5 class="modal-title <?= $bg . ' ' . $txt ?>" id="exampleModalLabel">Apakah Anda Yakin?</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span class="<?= $txt ?>" aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body <?= $bg . ' ' . $txt ?>">
        Untuk mengaktifkan atau menonaktifkan pengguna?
      </div>
      <div class="modal-footer <?= $bg . ' ' . $txt ?>">
        <button class="btn btn-secondary" type="button" data-dismiss="modal">Tutup</button>
        <a id="Maktif" class="btn <?= $btn_wr ?>" href="#">Yakin</a>
      </div>
    </div>
  </div>
</div>