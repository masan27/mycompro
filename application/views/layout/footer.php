<?php
$site = $this->konfigurasi_model->listing();
?>
<style type="text/css" media="screen">
  .kontakwa {
    z-index: 9999;
    position: fixed;
    background-color: #cc9000;
    padding: 10px;
    bottom: 0;
    right: 120px;
    font-weight: 700;
    font-size: 40px;
    color: white;
    text-align: center;
    /* border-top: solid 2px green;
    border-left: solid 2px green;
    border-right: solid 2px green; */
    min-width: 80px;
    border-radius: 0 10px 0 0;
  }

  .telepon {
    z-index: 9999;
    position: fixed;
    background-color: #cc8800;
    padding: 10px;
    bottom: 0;
    right: 200px;
    min-width: 80px;
    font-weight: 700;
    font-size: 40px;
    color: white;
    text-align: center;
    /* border-top: solid 2px #e93478;
    border-left: solid 2px #e93478;
    border-right: solid 2px #e93478; */
    border-radius: 10px 0 0 0;
  }

  .kontakwa a,
  .telepon a {
    color: white;
    font-size: 40px;
    font-weight: 700;
    text-align: center;
  }

  .kontakwa:hover,
  .telepon:hover {
    background-color: pink;

  }
</style>
<div class="telepon">
  <a href="tel:<?php echo $site->telepon ?>"><i class="fa fa-phone-alt"></i></a>
</div>
<div class="kontakwa">
  <a target="_blank" href="https://wa.me/<?php echo str_replace('+', '', $site->whatsapp) ?>?text=Saya%20tertarik%20untuk%20Menggunakan%20Layanan%20Anda.%20Apakah%20bisa%20dibantu?" class="topbar-social-item"><i class="fab fa-whatsapp"></i>
  </a>
</div>
<!-- END WA -->
<?php
$site           = $this->konfigurasi_model->listing();
$nav_berita     = $this->nav_model->nav_berita();
?>
<!-- Start Footer Section -->
<footer>
  <div class="bg-footer-top">
    <div class="container">
      <div class="row">
        <div class="footer-top">
          <div class="row">
            <div class="col-md-6 col-sm-6">
              <div class="footer-widgets">
                <div class="widgets-title">
                  <h4 style="color:white;"><?php echo $site->namaweb ?></h4>
                </div>

                <!-- .widgets-content -->
                <div class="address-box">
                  <ul class="address">
                    <li>
                      <i class="fa fa-home" aria-hidden="true"></i>
                      <span><?php echo nl2br($site->alamat) ?></span>
                    </li>
                    <li>
                      <i class="fa fa-phone-alt" aria-hidden="true"></i>
                      <span><?php echo $site->telepon ?></span>
                    </li>
                    <li>
                      <i class="fa fa-envelope" aria-hidden="true"></i>
                      <span><?php echo $site->email ?></span>
                    </li>
                    <li>
                      <i class="fab fa-whatsapp" aria-hidden="true"></i>
                      <span><?php echo $site->whatsapp ?></span>
                    </li>
                  </ul>
                </div>                                                
                <!-- .address -->
              </div>
              <!-- .footer-widgets -->
            </div>
            <!-- .col-md-4 -->
            <div class="col-md-6 col-sm-6">
              <div class="footer-widgets">
                <div class="widgets-title">
                  <h3>Lasted News</h3>
                </div>
                <!-- .widgets-title -->
                <ul class="latest-news">
                  <?php foreach ($nav_berita as $nav_berita) { ?>
                    <li>
                      <span class="thumbnail-img">
                        <?php if ($nav_berita->gambar != "") { ?>
                          <img src="<?php echo base_url('upload/image/' . $nav_berita->gambar) ?>" alt="<?php echo $nav_berita->judul_berita ?>" class="img-responsive" />
                        <?php } else { ?>
                          <img src="<?php echo base_url('assets/pendukung/' . $site->icon) ?>" alt="<?php echo $nav_berita->judul_berita ?>" class="img-responsive" />
                        <?php } ?>
                      </span>
                      <div class="thumbnail-content">
                        <h5><a href="<?php echo base_url('berita/read/' . $nav_berita->slug_berita) ?>"><?php echo $nav_berita->judul_berita ?></a></h5>
                      </div>
                      <!-- .thumbnail-content -->
                    </li>
                  <?php } ?>
                </ul>
              </div>
              <!-- .footer-widgets -->
            </div>


          </div>
          <!-- .row -->
        </div>
        <!-- .footer-top -->
      </div>
      <!-- .row -->
    </div>
    <!-- .container -->
  </div>
  <!-- .bg-footer-top -->

  <div class="bg-footer-bottom">
    <div class="container">
      <div class="row">
        <div class="footer-bottom">
          <div class="copyright-txt">
            <p>&copy; <?php echo date('Y') ?>. Powered By <a href="<?= base_url('kontak') ?>" title="About Me">TheCroc27</a></p>
          </div>
          <!-- .copyright-txt -->          

        </div>
        <!-- .footer-bottom -->
      </div>
      <!-- .row -->
    </div>
    <!-- .container -->
  </div>
  <!-- .bg-footer-bottom -->

</footer>

<!-- End Footer Section -->


<!-- Start Scrolling -->

<div class="scroll-img"><i class="fa fa-angle-up" aria-hidden="true"></i></div>


<!-- End Scrolling -->


</div>


<script type="text/javascript" src="<?php echo base_url() ?>assets/web/js/jquery-2.2.3.min.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>assets/web/js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>assets/web/js/jquery.easing.1.3.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>assets/web/js/jquery.waypoints.min.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>assets/web/js/jquery.counterup.min.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>assets/web/js/swiper.min.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>assets/web/js/lightcase.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>assets/web/js/jquery.nstSlider.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>assets/web/js/jquery.flexslider.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>assets/web/js/custom.map.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>assets/web/js/plugins.isotope.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>assets/web/js/isotope.pkgd.min.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>assets/web/js/custom.isotope.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>assets/web/js/custom.js"></script>
<!-- Select2 -->
<script src="<?php echo base_url() ?>assets/select2/select2.full.min.js"></script>
<!-- DataTables JS -->
<script src="<?php echo base_url() ?>assets/datatables/jquery.dataTables.js"></script>
<script src="<?php echo base_url() ?>assets/datatables/dataTables.bootstrap4.js"></script>
<script>
  $(function() {
    $("#example1").DataTable();
  });
  document.onscroll = function() {
    if (window.innerHeight + window.scrollY > document.body.clientHeight) {
      // document.getElementsByClassName('telepon').style.display = 'none';
      // document.getElementsByClassName('kontakwa').style.display = 'none';
    }
    // if (window.innerHeight + window.scrollY < document.body.clientHeight) {
      // document.getElementById('nav').style.display = 'block';
      // document.getElementById('nav1').style.display = 'block';
    // }
  }
</script>
<!-- CKEditor -->
<!-- <script>
  $(function() {
    //Initialize Select2 Elements
    $('.select2').select2()
    // Replace the <textarea id="editor1"> with a CKEditor
    // instance, using default configuration.
    ClassicEditor
      .create(document.querySelector('.editorku'))
      .then(function(editor) {
        // The editor instance
      })
      .catch(function(error) {
        console.error(error)
      })

    // bootstrap WYSIHTML5 - text editor

    $('#keterangan').wysihtml5({
      toolbar: {
        fa: true
      }
    })
  })
</script> -->

</html>