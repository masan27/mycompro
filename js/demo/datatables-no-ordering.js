// Call the dataTables jQuery plugin
$(document).ready(function () {
	$('#dataTable').DataTable({
		"language": {
			"url": "//cdn.datatables.net/plug-ins/1.10.19/i18n/Indonesian.json"
		},
		"ordering": false,
		"bFilter": false
	});
});
