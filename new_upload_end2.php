<?php
function add_text($text){
	$myfile = fopen("upload/files.txt", "r") or die("Unable to open file!");
	// Output one character until end-of-file
	$str = "";
	while(!feof($myfile)) {
		$str.=fgetc($myfile);
	}
	fclose($myfile);
	$myfile = fopen("upload/files.txt", "w") or die("Unable to open file!");
	$str = $str."\r\n".$text;
	fwrite($myfile, $str);
	fclose($myfile);
}
############ Configuration ##############
$config["generate_image_file"]			= true;
$config["generate_thumbnails"]			= true;
$config["image_max_size"] 			= 3000; //Maximum image size (height and width)
$config["thumbnail_size"]  			= 100; //Thumbnails will be cropped to 200x200 pixels
//$config["thumbnail_prefix"]			= "thumb_"; //Normal thumb Prefix
$config["thumbnail_prefix"]			= ""; //Normal thumb Prefix
/*
$config["destination_folder"]			= 'home/Website/ajax-image-upload/uploads/'; //upload directory ends with / (slash)
$config["thumbnail_destination_folder"]		= 'home/Website/ajax-image-upload/uploads/'; //upload directory ends with / (slash)
$config["upload_url"] 				= "http://website/ajax-image-upload/uploads/"; 
*/
$config["destination_folder"]			= 'upload/'; //upload directory ends with / (slash)
$config["thumbnail_destination_folder"]		= 'upload/thumb/'; //upload directory ends with / (slash)
$config["upload_url"] 				= "upload/"; 
$config["thumbnail_upload_url"] 				= "upload/thumb/"; 

$config["quality"] 				= 100; //jpeg quality
$config["random_file_name"]			= true; //randomize each file name

/*
if(!isset($_SERVER['HTTP_X_REQUESTED_WITH'])) {
	print_r($_FILES["file"]);
	exit;  //try detect AJAX request, simply exist if no Ajax
}
*/
//specify uploaded file variable
$_FILES["file"]["name"]=array($_FILES["file"]["name"]);
$_FILES["file"]["type"]=array($_FILES["file"]["type"]);
$_FILES["file"]["tmp_name"]=array($_FILES["file"]["tmp_name"]);
$_FILES["file"]["error"]=array($_FILES["file"]["error"]);
$_FILES["file"]["size"]=array($_FILES["file"]["size"]);
/*var_dump($_FILES);*/
$config["file_data"] = $_FILES["file"]; 


//include sanwebe impage resize class
include("plugin/new_aiu/resize.class.php"); 


//create class instance 
$im = new ImageResize($config); 


try{
	$responses = $im->resize(); //initiate image resize
	
	$arr = explode("/",$_SERVER['PHP_SELF']);
	array_pop($arr);
	$url = join('/',$arr);
	
	echo '<h3>Thumbnails</h3>';
	//output thumbnails
	foreach($responses["thumbs"] as $response){
		echo "<img src='".$url."/".$config["thumbnail_upload_url"].$response."' class='images' title='".$response."'/>";
	}
	
	echo '<h3>Images</h3>';
	//output images
	foreach($responses["images"] as $response){
		add_text($response);	
		/*echo "<img src='".$url.'/'.$config["upload_url"].$response."' class='thumbnails' title='".$response."' />";*/
	}
	
	
}catch(Exception $e){
	echo '<div class="error">';
	echo $e->getMessage();
	echo '</div>';
}

		
?>
