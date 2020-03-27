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
            <h1 class="h3 mb-0 text-gray-800">Kegiatan</h1>
          </div>

          <!-- Content Row -->   
          <form method="post" action="<?php echo base_url('admin/topik/update') ?>">
            <div class="card shadow mb-4">
              <div class="card-header py-3">
                <h6 class="font-weight-bold text-primary" style="display: inline-block; margin-right: 1em;">Tambah Kegiatan</h6>
              </div>
              <div class="card-body">
                <?php if ($this->session->flashdata('success')) : ?>
                  <div class="alert alert-success" role="alert">
                    <?php echo $this->session->flashdata('success'); ?>
                  </div>
                <?php endif; ?>                
                <div class="form-row">
                  <div class="form-group col-md-12">                                  
                    <label for="topik">Kegiatan Saat Ini</label>
                    <?php                        
                        $isi = "";
                        // echo $this->session->lihat_topik;
                        if (isset($this->session->lihat_topik))
                        {
                          $isi = $topik->topik;
                        }
                        else 
                        {
                          $isi = "";
                        }
                    ?>
                    <textarea id="topik" name="topik" class="form-control"><?= $isi ?></textarea>
                  </div>                  
                </div>                              
              </div>
              <div class="card-footer py-3">
              <button type="submit" class="btn btn-success btn-icon-split btn-sm">
                <span class="icon text-white-50">
                  <i class="fas fa-save"></i>
                </span>
                <span class="text">Simpan</span>
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