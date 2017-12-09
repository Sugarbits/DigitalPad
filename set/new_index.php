<head>
<link rel="stylesheet" type="text/css" media="screen" href="../plugin/jquery-ui/jquery-ui.min.css" />
<link rel="stylesheet" type="text/css" media="screen" href="../plugin/jqGrid/css/ui.jqgrid.css" />
<script src="../plugin/jquery.min.js" type="text/javascript"></script>
<script src="../plugin/jqGrid/src/i18n/grid.locale-en.js" type="text/javascript"></script>
<script src="../plugin/jqGrid/js/jquery.jqGrid.min.js" type="text/javascript"></script>
<script src="../plugin/jquery-ui/jquery-ui.min.js" type="text/javascript"></script>
<style>
.clearfix {
  overflow: auto;
}
.div_a{
	 width:40vw;
	 height:75vh;
	 float:left;
}
.div_a iframe {display: block; width: 100%; height: 100%; border: none;}
.div_b{
	 width:50vw;
	 height:75vh;
	 float:left;
}
.div_b iframe {display: block; width: 100%; height: 100%; border: none;}
</style>
</head>

<?php
$myfile = fopen("../plugin/ajax-image-upload-master/uploads/files.txt", "r") or die("Unable to open file!");

// Output one character until end-of-file
       
$str = "";
while(!feof($myfile)) {
  $str.=fgetc($myfile);
}
fclose($myfile);
$crr=array("id","name","note");
$brr = explode("\r\n",$str);

$drr = array();
$arr = array();

$tb = "<table border='1'><tr><th>#</th><th>檔名</th><th>預覽</th><th>刪除</th></tr>";

for($i=1; $i < sizeof($brr); $i++){
	$temp = "<img src=\"../plugin/ajax-image-upload-master/uploads/thumb/$brr[$i]\" alt=\"my image\">";
	$tb .= "<tr><td>$i</td><td>$brr[$i]</td><td>$temp</td><td><input type='button' value='x'/></td></tr>";
    $drr[$crr[0]] = $i;
    $drr[$crr[1]] = $brr[$i];
    $drr[$crr[2]] = '';
	array_push($arr,$drr);
}
$tb .= "</table>";

/*
for($i=1;$i<sizeof($arr);$i++){
	
}
*/



/*
$myfile = fopen("word.txt", "w") or die("Unable to open file!");
$txt = "Mickey Mouse\n";
fwrite($myfile, $txt);
$txt = "Minnie Mouse\n";
fwrite($myfile, $txt);
fclose($myfile);
*/
?>
<div id="tabs">
  <ul>
    <li><a href="#tabs-1">字</a></li>
    <li><a href="#tabs-2">圖</a></li>
    <li><a href="#tabs-3">影</a></li>
    <li><a href="#tabs-4">角本</a></li>
  </ul>
	<div id="tabs-1">
<textarea id="word" rows="10" cols="50">
</textarea>
<BR>
<button id="word_fix">修改</button>
	</div>
  <div id="tabs-2">
  <div class='clearfix'>
	<div class='div_a'>
		<iframe  style='overflow: visible; display: block; position: relative; visibility: visible; z-index: 0;' scrolling="no" src="../new_picture_tb.php"  frameBorder="0">
			<p>Your browser does not support iframes.</p>
		</iframe>
	</div>
	<div class='div_b'>
		<iframe  style='overflow: visible; display: block; position: relative; visibility: visible; z-index: 0;' scrolling="no" src="../new_upload_ui.php"  frameBorder="0">
			<p>Your browser does not support iframes.</p>
		</iframe>
	</div>
 </div>
</div>
  <div id="tabs-3">
	 <?php echo $tb;?>
		<div class="form-wrap">
		<h3>Ajax Image Uploader</h3>
			<form action="../plugin/ajax-image-upload-master/process.php" method="post" enctype="multipart/form-data" id="upload_form">
			<input name="__files[]" type="file" multiple />
			<input name="__submit__" type="submit" value="Upload"/>
			</form>
    <div id="output"><!-- error or success results --></div>
</div>
	</div>

  </div>

</div>


<script>
	
	$( "#tabs" ).tabs();
	$( "#word_fix" ).click(function() {
		data = $('#word').val();
		ajax_text_write(data);
	});


//const field-url set
const self_config={
	
}
//const field-url set END
 function ajax_piclist_write(data){
	var scriptUrl = "../ajax_piclist_write.php";
	//var scriptUrl = "../test.php";
	//JSON.parse
	data = JSON.parse(JSON.stringify(data));
	$.ajax({
		url: scriptUrl,
		type: 'post',
		data:{data:data},
		dataType: 'html',
		async: false,
		success: function(data) {
			result = data;
			},
		error: function(jqXHR, textStatus, errorThrown) {
        // report error
			console.log(errorThrown);
		}
		});
	//alert(data);
	console.log(result);
}
  function ajax_piclist_del(target,data){
	var scriptUrl = "../ajax_piclist_del.php";
	//var scriptUrl = "../test.php";
	//JSON.parse
	data = JSON.parse(JSON.stringify(data));
	$.ajax({
		url: scriptUrl,
		type: 'post',
		data:{target:target,data:data},
		dataType: 'html',
		async: false,
		success: function(data) {
			result = data;
			},
		error: function(jqXHR, textStatus, errorThrown) {
        // report error
			console.log(errorThrown);
		}
		});
	//alert(data);
	console.log(result);
} 
  function ajax_text_jsonread(){
	var scriptUrl = "../ajax_text_jsonread.php";
	$.ajax({
		url: scriptUrl,
		type: 'get',
		async: false,
		success: function(data) {
			result = data;
			},
		error: function(jqXHR, textStatus, errorThrown) {
        // report error
			console.log(errorThrown);
		}
		});
	//alert(data);
	return result;
} 
function ajax_text_write(data){
	var scriptUrl = "../ajax_text_write.php";

	$.ajax({
		url: scriptUrl,
		type: 'post',
		data:{data:data},
		dataType: 'html',
		async: false,
		success: function(data) {
			result = data;
			},
		error: function(jqXHR, textStatus, errorThrown) {
        // report error
			console.log(errorThrown);
		}
		});
	//alert(data);
	console.log(result);
} 
  function ajax_text_read(){
	var scriptUrl = "../ajax_text_read.php";
	$.ajax({
		url: scriptUrl,
		type: 'get',
		async: false,
		success: function(data) {
			result = data;
			},
		error: function(jqXHR, textStatus, errorThrown) {
        // report error
			console.log(errorThrown);
		}
		});
	//alert(data);
	return result;
}
$(document).ready(function (e) {

$('#word').val(ajax_text_read());
	
$("#upload_form").on( "submit", function(event) {//on form submit
    if(!window.File && window.FileReader && window.FileList && window.Blob){ //if browser doesn't supports File API
        alert("Your browser does not support new File API! Please upgrade.");
    }
})
});



/*

//var mydata = JSON.parse(<?php echo json_encode($arr);?>);
var mydata = JSON.parse(JSON.stringify(<?php echo json_encode($arr);?>));
console.log(mydata);

*/

</script>
<script type="text/javascript">    
//configuration
var max_file_size 		= 2048576; //allowed file size. (1 MB = 1048576)
var allowed_file_types 		= ['image/png', 'image/gif', 'image/jpeg', 'image/pjpeg']; //allowed file types
var result_output 		= '#output'; //ID of an element for response output
var my_form_id 			= '#upload_form'; //ID of an element for response output
var total_files_allowed 	= 3; //Number files allowed to upload

</script>
