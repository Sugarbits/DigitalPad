<?php
function add_text($text){
	$myfile = fopen("uploads/files.txt", "r") or die("Unable to open file!");
	// Output one character until end-of-file
	$str = "";
	while(!feof($myfile)) {
		$str.=fgetc($myfile);
	}
	fclose($myfile);
	$myfile = fopen("uploads/files.txt", "w") or die("Unable to open file!");
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
$config["destination_folder"]			= 'uploads/'; //upload directory ends with / (slash)
$config["thumbnail_destination_folder"]		= 'uploads/thumb/'; //upload directory ends with / (slash)
$config["upload_url"] 				= "uploads/"; 
$config["thumbnail_upload_url"] 				= "uploads/thumb/"; 

$config["quality"] 				= 100; //jpeg quality
$config["random_file_name"]			= true; //randomize each file name


if(!isset($_SERVER['HTTP_X_REQUESTED_WITH'])) {
	exit;  //try detect AJAX request, simply exist if no Ajax
}

//specify uploaded file variable
$config["file_data"] = $_FILES["__files"]; 


//include sanwebe impage resize class
include("resize.class.php"); 


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
