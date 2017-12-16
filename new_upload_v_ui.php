<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr">
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8"/>

<title>Plupload - jQuery UI Widget</title>

<link rel="stylesheet" href="//ajax.googleapis.com/ajax/libs/jqueryui/1.8.9/themes/base/jquery-ui.css" type="text/css" />
<link rel="stylesheet" href="plugin/plupload/js/jquery.ui.plupload/css/jquery.ui.plupload.css" type="text/css" />

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.2/jquery-ui.min.js"></script>

<!-- production -->
<script type="text/javascript" src="plugin/plupload/js/plupload.full.min.js"></script>
<script type="text/javascript" src="plugin/plupload/js/jquery.ui.plupload/jquery.ui.plupload.js"></script>

<!-- debug 
<script type="text/javascript" src="../../js/moxie.js"></script>
<script type="text/javascript" src="../../js/plupload.dev.js"></script>
<script type="text/javascript" src="../../js/jquery.ui.plupload/jquery.ui.plupload.js"></script>
-->

</head>
<body style="font: 13px Verdana; background: #eee; color: #333">
<!--<p>You can see this example with different themes on the <a href="http://plupload.com/example_jquery_ui.php">www.plupload.com</a> website.</p>-->

<form id="form" method="post" action="plugin/plupload/dump.php">
(上傳影片版)
	<div id="uploader">
		<p>Your browser doesn't have Flash, Silverlight or HTML5 support.</p>
	</div>
	<br />
	<!--<input type="submit" value="Submit" />-->
</form>

<script type="text/javascript">
// Initialize the widget when the DOM is ready
$(document).ready(function (e) {
		//
});

$(function() {
	$("#uploader").plupload({
		// General settings
		runtimes : 'html5,flash,silverlight,html4',
		url : 'new_upload_end.php',// 服務端程式接收路徑

		// User can upload no more then 20 files in one go (sets multiple_queues to false)
		max_file_count: 20,
		
		chunk_size: '0mb',

		// Resize images on clientside if we can
		/*resize : {
			width : 200, 
			height : 200, 
			quality : 90,
			crop: true // crop to exact dimensions
		},
		*/
		filters : {
			// Maximum file size
			//max_file_size : '1000mb',
			max_file_size : '40mb',
			// Specify what files to browse for
			mime_types: [
				{title : "Image files", extensions : "jpg,gif,png"},
				{title : "files", extensions : "mp4"}
			]
		},

		// Rename files by clicking on their titles
		rename: true,
		
		// Sort files
		sortable: true,

		// Enable ability to drag'n'drop files onto the widget (currently only HTML5 supports that)
		dragdrop: true,

		// Views to activate
		views: {
			list: true,
			thumbs: true, // Show thumbs
			active: 'thumbs'
		},

		// Flash settings
		flash_swf_url : 'plugin/plupload/js/Moxie.swf',

		// Silverlight settings
		silverlight_xap_url : 'plugin/plupload/js/Moxie.xap'
	});


	// Handle the case when form was submitted before uploading has finished
	$('#form').submit(function(e) {
		// Files in queue upload them first
		if ($('#uploader').plupload('getFiles').length > 0) {
			// When all files are uploaded submit form
			$('#uploader').on('complete', function() {
				$('#form')[0].submit();
			});

			$('#uploader').plupload('start');
		} else {
			alert("You must have at least one file in the queue.");
		}
		return false; // Keep the form from submitting
	});
});
</script>
</body>
</html>
