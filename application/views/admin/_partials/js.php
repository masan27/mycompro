	<!-- Bootstrap core JavaScript-->
	<script type="text/javascript" defer src="<?php echo base_url('assets/jquery/jquery.min.js') ?>"></script>

	<!-- Core plugin JavaScript-->
	<script type="text/javascript" defer src="<?php echo base_url('assets/jquery-easing/jquery.easing.min.js') ?>"></script>

	<!-- Custom scripts for all pages-->
	<script type="text/javascript" defer src="<?php echo base_url('assets/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
	<script type="text/javascript" defer src="<?php echo base_url('js/sb-admin-2.min.js') ?>"></script>
	<!-- iCheck -->
	<!-- <script src="<?php echo base_url('assets/iCheck/icheck.min.js') ?>"></script> -->

	<!-- Tinymce-->
	<script>
		tinymce.init({
			selector: '#isi',
			height: 300,
			plugins: 'print preview paste searchreplace autolink directionality visualblocks visualchars code fullscreen image link media template codesample table charmap hr pagebreak nonbreaking anchor toc insertdatetime advlist lists textcolor wordcount imagetools colorpicker textpattern help',
			toolbar: 'formatselect | fontsizeselect | bold italic strikethrough forecolor backcolor | link | alignleft aligncenter alignright alignjustify  | numlist bullist outdent indent | image | table | removeformat',
			visual_table_class: 'tiny-table',
			automatic_uploads: true,
			image_advtab: true,
			images_upload_url: "<?php echo base_url("admin/postfile/tinymce_upload") ?>",
			file_picker_types: 'image',
			paste_data_images: true,
			relative_urls: false,
			// remove_script_host: false,
			file_picker_callback: function(cb, value, meta) {
				var input = document.createElement('input');
				input.setAttribute('type', 'file');
				input.setAttribute('accept', 'image/*');
				input.onchange = function() {
					var file = this.files[0];
					var reader = new FileReader();
					reader.readAsDataURL(file);
					reader.onload = function() {
						var id = 'post-image-' + (new Date()).getTime();
						var blobCache = tinymce.activeEditor.editorUpload.blobCache;
						var blobInfo = blobCache.create(id, file, reader.result);
						blobCache.add(blobInfo);
						cb(blobInfo.blobUri(), {
							title: file.name
						});
					};
				};
				input.click();
			},
			images_upload_handler: function(blobInfo, success, failure) {
				var xhr, formData;

				xhr = new XMLHttpRequest();
				xhr.withCredentials = false;
				xhr.open('POST', "<?php echo base_url("admin/postfile/upfile") ?>");

				xhr.onload = function() {
					var json;

					if (xhr.status != 200) {
						failure('HTTP Error: ' + xhr.status);
						return;
					}

					json = JSON.parse(xhr.responseText);

					if (!json || typeof json.location != 'string') {
						failure('Invalid JSON: ' + xhr.responseText);
						return;
					}

					success(json.location);
				};

				formData = new FormData();
				formData.append('file', blobInfo.blob(), blobInfo.filename());

				xhr.send(formData);
			},
			fontsize_formats: " 8px 10px 12px 14px 18px 24px 36px",
		});
	</script>
	<script>
		tinymce.init({
			selector: '.textarea',
			height: 300,
			plugins: 'print preview paste searchreplace autolink directionality visualblocks visualchars code fullscreen image link media template codesample table charmap hr pagebreak nonbreaking anchor toc insertdatetime advlist lists textcolor wordcount imagetools colorpicker textpattern help',
			toolbar: 'formatselect | fontsizeselect | bold italic strikethrough forecolor backcolor | link | alignleft aligncenter alignright alignjustify  | numlist bullist outdent indent | image | table | removeformat',
			visual_table_class: 'tiny-table',
			fontsize_formats: "8px 10px 12px 14px 18px 24px 36px"
		});
	</script>
	<script>
		tinymce.init({
			selector: '.textareatengah',
			height: 500,
			plugins: 'print preview paste searchreplace autolink directionality visualblocks visualchars code fullscreen image link media template codesample table charmap hr pagebreak nonbreaking anchor toc insertdatetime advlist lists textcolor wordcount imagetools colorpicker textpattern help',
			toolbar: 'formatselect | bold italic strikethrough forecolor backcolor | link | alignleft aligncenter alignright alignjustify  | numlist bullist outdent indent | image | table | removeformat',
			visual_table_class: 'tiny-table'
		});
	</script>

	<!-- CUSTOM JS
	<script>
		window.onload = function() {
			//iCheck for checkbox and radio inputs
			$('.mailbox-messages input[type="checkbox"]').iCheck({
				checkboxClass: 'icheckbox_flat-blue',
				radioClass: 'iradio_flat-blue'
			})

			//Enable check and uncheck all functionality
			$('.checkbox-toggle').click(function() {
				var clicks = $(this).data('clicks')
				if (clicks) {
					//Uncheck all checkboxes
					$('.mailbox-messages input[type=\'checkbox\']').iCheck('uncheck')
					$('.fa', this).removeClass('fa-check-square-o').addClass('fa-square-o')
				} else {
					//Check all checkboxes
					$('.mailbox-messages input[type=\'checkbox\']').iCheck('check')
					$('.fa', this).removeClass('fa-square-o').addClass('fa-check-square-o')
				}
				$(this).data('clicks', !clicks)
			})
		}
		removeLoader();
	</script> -->