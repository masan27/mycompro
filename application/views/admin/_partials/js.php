	<!-- Bootstrap core JavaScript-->
	<script type="text/javascript" defer src="<?php echo base_url('assets/jquery/jquery.min.js') ?>"></script>

	<!-- Core plugin JavaScript-->
	<script type="text/javascript" defer src="<?php echo base_url('assets/jquery-easing/jquery.easing.min.js') ?>"></script>

	<!-- Custom scripts for all pages-->
	<script type="text/javascript" defer src="<?php echo base_url('assets/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
	<script type="text/javascript" defer src="<?php echo base_url('js/sb-admin-2.min.js') ?>"></script>

	<!-- Tinymce-->
	<script>
		tinymce.init({
			selector: '#isi',
			height: 300,
			plugins: 'print preview paste searchreplace autolink directionality visualblocks visualchars code fullscreen image link media template codesample table charmap hr pagebreak nonbreaking anchor toc insertdatetime advlist lists textcolor wordcount imagetools colorpicker textpattern help',
			toolbar: 'formatselect | fontsizeselect | bold italic strikethrough forecolor backcolor | link | alignleft aligncenter alignright alignjustify  | numlist bullist outdent indent | image | table | removeformat',
			visual_table_class: 'tiny-table',
			fontsize_formats: "8px 10px 12px 14px 18px 24px 36px"
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