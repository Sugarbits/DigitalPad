<?php 
if(isset($_GET['dataid'])){
	$dataid = $_GET['dataid'];
	if($dataid == 'O-A0003-001'){
		$parameter = 'locationName=花蓮&elementName=TEMP&';
	}else{
		$parameter ='';
	}
}else{
	die("選擇資料以繼續");
}
if(isset($_GET['mode'])){
	switch($_GET['mode']){
		case '0':
			$mode = 0;
		break;
		case '1':
			$mode = 1;
			echo "
				<script src=\"json_syntaxHighlight.js\"></script>
				<script src=\"json_trans_CWB_A0003.js\"></script>
				<link rel=\"stylesheet\" href=\"json_syntaxHighlight.css\" type=\"text/css\" media=\"screen\" />";
		break;
		default:
			$mode = 0;
		break;
	}
}else{
	$mode = 0;
}

if($mode == 1){
	echo "<pre id=\"url\"></pre>";
	echo "<pre id=\"json\"></pre>";
} 
$verify_ID = 'CWB-AFC9A608-306E-42F6-B421-FFBD0ED36336';
function download_page($path){
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL,$path);
    curl_setopt($ch, CURLOPT_FAILONERROR,1);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION,1);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
    curl_setopt($ch, CURLOPT_TIMEOUT, 15);
    $retValue = curl_exec($ch);          
    curl_close($ch);
    return $retValue;
}
$var1 = 'F-C0032-009';
$curl_url = "http://opendata.cwb.gov.tw/api/v1/rest/datastore/O-A0003-001?locationName=花蓮&elementName=TEMP,H_UVI&Authorization=$verify_ID";
//$curl_url = "http://opendata.cwb.gov.tw/api/v1/rest/datastore/O-A0003-001?locationName=花蓮&Authorization=$verify_ID";
//$curl_url = "http://opendata.cwb.gov.tw/api/v1/rest/datastore/F-C0032-001?locationName=花蓮縣&Authorization=$verify_ID";
$curl_url = "http://opendata.cwb.gov.tw/api/v1/rest/datastore/{$dataid}?{$parameter}Authorization={$verify_ID}";
//die($curl_url);
$json_string = download_page($curl_url);
//$json_string = json_encode($content);
if($mode == 0){
	echo $json_string;	
}else{//mode =1
	;//do nothing
}

?>

<?php
if($mode==1){
echo "<script>
	var json = $json_string;
	//cwb_a0003_trans(json);
	document.getElementById(\"json\").innerHTML = syntaxHighlight(JSON.stringify(json, undefined, 2));
	document.getElementById(\"url\").innerHTML = '$curl_url';
	</script>
	";
}else{//mode =1
	echo "";//do nothing
}
?>
