<?php
//asli
$bg_s = '';
$bg_d = '';
$txt = '';
$txt_wr = 'text-primary';
$txt800 = ' ';
$tbl_drk = '';
if (isset($_COOKIE['txt'])) {
  $bg_s = $_COOKIE['bg_s'];
  $bg_d = $_COOKIE['bg_d'];
  $txt = $_COOKIE['txt'];
  $txt_wr = $_COOKIE['txt_wr'];
  $txt800 = $_COOKIE['txt'];
  $tbl_drk = $_COOKIE['tbl_drk'];
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
            <div class="alert alert-success alert-dismissible fade show" role="alert">
              <?php echo $this->session->flashdata('success'); ?>
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
          <?php endif; ?>

          <!-- Page Heading -->
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="<?= $txt800 ?>"><?php echo $title ?></h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="<?php echo base_url('admin/dashboard') ?>">Home</a></li>
                <li class="breadcrumb-item"><a href="<?php echo base_url('admin/' . $this->uri->segment(2)) ?>"><?php echo ucfirst(str_replace('_', ' ', $this->uri->segment(2))) ?></a></li>
                <li class="breadcrumb-item active <?= $txt800 ?>"><?php echo character_limiter($title, 10) ?></li>
              </ol>
            </div>
          </div>

          <?php
          $site   = $this->konfigurasi_model->listing();
          echo form_open(base_url('admin/berita/proses'));
          ?>
          <!-- DataTales -->
          <div class="card shadow mb-4 <?= $bg_s . ' ' . $txt ?>">
            <div class="card-header py-3 <?= $bg_d ?>">
              <p class="btn-group">
                <a href="<?php echo base_url('admin/berita/tambah') ?>" class="btn btn-success btn-lg">
                  <i class="fa fa-plus"></i> Tambah Konten</a>

                <button class="btn btn-warning" type="submit" name="draft">
                  <i class="fa fa-times"></i> Jangan Publikasikan
                </button>

                <button class="btn btn-primary" type="submit" name="publish">
                  <i class="fa fa-check"></i> Publikasikan
                </button>

                <button class="btn btn-danger" type="submit" name="hapus">
                  <i class="fa fa-trash"></i> Hapus
                </button>

                <?php
                $url_navigasi = $this->uri->segment(2);
                if ($this->uri->segment(3) != "") {
                ?>
                  <a href="<?php echo base_url('admin/' . $url_navigasi) ?>" class="btn btn-primary">
                    <i class="fa fa-backward"></i> Kembali</a>
                <?php } ?>
              </p>
              <a href="<?= base_url('admin/berita/kategori') ?>" class="btn btn-info btn-lg float-right">
                <i class="fas fa-list-ul"></i> Kategori
              </a>
            </div>
            <div class="card-body">
              <?php
              $model = $this->berita_model;
              ?>
              <div class="table-responsive">
                <table id="dataTable" class="<?= $txt . ' ' . $tbl_drk ?> display table table-bordered table-hover" cellspacing="0" width="100%">
                  <thead>
                    <tr>
                      <th width="5%">
                        <div class="mailbox-controls">
                          <!-- Check all button -->
                          <button type="button" class="btn btn-dark btn-sm checkbox-toggle">
                            <i class="far fa-square"></i>
                          </button>
                        </div>
                      </th>
                      <th width="10%">GAMBAR</th>
                      <th>JUDUL</th>
                      <th>KATEGORI</th>
                      <th>JENIS</th>
                      <th>STATUS</th>
                      <th>AUTHOR</th>
                      <th width="55px"></th>
                    </tr>
                  </thead>
                  <tbody>

                    <?php $i = 1;
                    foreach ($berita as $berita) { ?>

                      <tr>
                        <td>
                          <div class="mailbox-star text-center">
                            <div class="text-center">
                              <input type="checkbox" class="icheckbox_flat-blue " name="id_berita[]" value="<?php echo $berita->id_berita ?>">
                              <span class="checkmark"></span>
                            </div>
                        </td>
                        <td>
                          <?php if ($berita->gambar != "") { ?>
                            <img src="<?php echo base_url('upload/image/thumbs/' . $berita->gambar) ?>" class="img img-thumbnail img-responsive" width="60">
                          <?php } else { ?>
                            <img src="<?php echo base_url('upload/image/thumbs/' . $site->icon) ?>" class="img img-thumbnail img-responsive" width="60">
                          <?php } ?>
                        </td>
                        <td>

                          <span class="<?= $txt_wr ?>"><?php echo $berita->judul_berita ?></span> <sup><i class="fa fa-pencil"></i></sup>

                          <small>
                            <br>Posted: <?php echo date('d M Y H:i: s', strtotime($berita->tanggal_post)) ?>
                            <br>Published: <?php echo date('d M Y H:i: s', strtotime($berita->tanggal_publish)) ?>
                            <?php if ($berita->jenis_berita == "Promo") { ?>
                              <br>Promo: <span class="text-danger"><strong><?php echo date('d M Y', strtotime($berita->tanggal_mulai)) ?> s/d <?php echo date('d M Y ', strtotime($berita->tanggal_selesai)) ?></strong></span>
                            <?php } ?>
                            <br>Icon: <i class="<?php echo $berita->icon ?>"></i> <?php echo $berita->icon ?>
                            <br>Tgl posting: <?php echo date('d-m-Y', strtotime($berita->tanggal_publish)) ?>
                          </small>
                        </td>
                        <td class="text-center <?= $txt_wr ?>"><?php echo $berita->nama_kategori ?></td>
                        <td class="text-center <?= $txt_wr ?>"><?php echo $berita->jenis_berita ?></td>
                        <td class="text-center <?= $txt_wr ?>"><?php echo $berita->status_berita ?></td>
                        <td class="text-center <?= $txt_wr ?>"><?php echo $berita->nama ?></td>
                        <td class=text-center">
                          <div class="btn-group">
                            <!-- <a href="<?php echo base_url('berita/read/' . $berita->slug_berita) ?>" class="btn btn-success btn-xs" target="_blank"><i class="fa fa-eye"></i></a> -->

                            <a href="<?php echo base_url('admin/berita/edit/' . $berita->id_berita) ?>" class="btn btn-warning btn-xs"><i class="fa fa-edit"></i></a>

                            <a onclick="deleteConfirm('<?php echo base_url('admin/berita/delete/' . $berita->id_berita) ?>')" href="#!" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></a>
                          </div>
                        </td>
                      </tr>

                    <?php $i++;
                    } ?>

                  </tbody>
                </table>
              </div>
            </div>
          </div>
          <?php echo form_close(); ?>

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