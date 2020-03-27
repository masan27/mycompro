<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Hai.. <?= $this->session->nama ?></h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">Maaf tapi saat ini kamu tidak di ijinkan untuk melakukam Logout<br>Jika kamu ingin ganti perangkat silahkan hubungi kami<br>
        <ol>
          <li>Bu Rusma <a href="https://wa.me/6285715980304"> <img class="img-profile rounded-circle" src="<?php echo base_url('img/web-whatsapp.png') ?>" width="7%">Whatsapp </a></li>
          <li>Sian27 <a href="https://wa.me/6283893361181?text=Hai Sian27,%20saya%20ingin%20bertanya%20bole???"> <img class="img-profile rounded-circle" src="<?php echo base_url('img/web-whatsapp.png') ?>" width="7%">Whatsapp </a></li>
        </ol>
      </div>
      <div class="modal-footer">
        <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
        <!-- <a class="btn btn-primary" href="<?php echo base_url('login/logout') ?>">Logout</a> -->
      </div>
    </div>
  </div>
</div>

<!-- Delete Confirmation-->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Apakah Anda Yakin?</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">Data yang dihapus tidak akan bisa dikembalikan.</div>
      <div class="modal-footer">
        <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
        <a id="btn-delete" class="btn btn-danger" href="#">Hapus</a>
      </div>
    </div>
  </div>
</div>

<!-- Ubah Akses-->
<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Apakah Anda Yakin?</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">Untuk mengubah Hak Akses Login?</div>
      <div class="modal-footer">
        <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
        <a id="btn-warning" class="btn btn-warning" href="#">Yakin</a>
      </div>
    </div>
  </div>
</div>

<!-- Notification-->
<div class="modal fade" id="notifModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Hei <?= $this->session->nama ?> kamu mengalami kesulitan melakukan login?? <br> Silahkan Hubungi Kami..</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
        <ol>
          <li>Bu Rusma <a href="https://api.whatsapp.com/send?phone=6285715980304"> <img class="img-profile rounded-circle" src="<?php echo base_url('img/web-whatsapp.png') ?>" width="7%">Whatsapp </a></li>
          <li>Sian27 <a href="https://api.whatsapp.com/send?phone=6283893361181"> <img class="img-profile rounded-circle" src="<?php echo base_url('img/web-whatsapp.png') ?>" width="7%">Whatsapp </a></li>
        </ol>
      </div>
      <div class="modal-footer">
        <button class="btn btn-secondary" type="button" data-dismiss="modal">Tutup</button>
      </div>
    </div>
  </div>
</div>

<!-- Belum Bisa Login -->
<div class="modal fade" id="belumModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Hai <?= $this->session->nama ?></h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
        Maaf tapi sepertinya belum waktunya kamu melakukan login <br> Silahkan coba sesuai dengan jadwal kamu yah.. <?= $this->session->nama ?>
      </div>
      <div class="modal-footer">
        <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
      </div>
    </div>
  </div>
</div>

<!-- Isi Kelas-->
<div class="modal fade" id="accModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Apakah Anda Yakin?</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">Untuk mengisi kelas kosong ini?</div>
      <div class="modal-footer">
        <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
        <a id="modalacc" class="btn btn-primary" href="#">Yakin</a>
      </div>
    </div>
  </div>
</div>

<!-- Batal Kelas-->
<div class="modal fade" id="cancelModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Apakah Anda Yakin?</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">Untuk membatalkan mengisi kelas ini?</div>
      <div class="modal-footer">
        <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
        <a id="modalcancel" class="btn btn-warning" href="#">Yakin</a>
      </div>
    </div>
  </div>
</div>

<!-- Kelas Penuh-->
<div class="modal fade" id="fillModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Hai.. <?= $this->session->nama ?></h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">Maaf kelas ini sudah penuh</div>
      <div class="modal-footer">
        <button class="btn btn-secondary" type="button" data-dismiss="modal">Tutup</button>
      </div>
    </div>
  </div>
</div>