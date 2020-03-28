<?php
	$bg = '';
	if (isset($_COOKIE['txt'])) {
		$bg = $_COOKIE['bg_wr'];
	}
?>
<a class="<?= $bg ?> scroll-to-top rounded" href="#page-top">
	<i class="fas fa-angle-up"></i>
</a>