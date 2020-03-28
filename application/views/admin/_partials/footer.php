<?php
	//bg
	$bg = 'bg-white';
	$txt = '';
	if (isset($_COOKIE['txt'])) {
	$bg = $_COOKIE['bg_s'];
	$txt = $_COOKIE['txt'];
	}
?>

<!--ubah--><footer class="sticky-footer <?= $bg ?>">
	<div class="container my-auto">
		<div class="copyright text-center my-auto">
		<!--ubah-->	<span class="<?= $txt ?>">Copyright &copy; TheCroc27...</span>
		</div>
	</div>
</footer>