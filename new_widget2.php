<?php 
$data = $_POST['data'];
print_r($data);
?>
<html>
<head>
<title>Widget2</title>
<script type="text/javascript" src="plugin/jquery.min.js"></script>
<style>

#div1{
	//background-image: url("new_pic/cloudy.png");
	//background-repeat: no-repeat, repeat;
	width:128px;
	height:64px;
	font-size:64px;
}
#div2{
	font-family:'微軟正黑體';
	font-size:200%;
	font-weight: bold;
}
</style>
</head>
<body style='margin:0px;padding:0px;'>
<div id='div1'>25度</div><div id='div2'>花蓮縣</div>
</body>
</html>
<script>
$(document).ready(function() {

	function w2_ajax(){
	$.ajax({
	method: "GET",
	url: "lab_plugin_xml3/result.php",
	data: { mode: "0", dataid: "F-C0032-001" }
	})
	.done(function( msg ) {
		turninto(msg);
	});
	/*$.getJSON( "lab_plugin_xml3/result.php", { mode: "0", dataid: "F-C0032-001" } )
	.done(function( json ) {
	console.log( "JSON Data: " + json );
	})
	.fail(function( jqxhr, textStatus, error ) {
	var err = textStatus + ", " + error;
	console.log( "Request Failed: " + err );
	});	*/
	}
w2_ajax();
setInterval(function(){ w2_ajax(); }, (1000*60*3));
});
function turninto(data){
	console.log(JSON.parse(data));
	 var Jdata = JSON.parse(data);
	 console.log(Jdata.records.location[10].locationName);
	 console.log(Jdata.records.location[10].weatherElement[2].time[0].parameter.parameterName);
	 $('#div2').html(Jdata.records.location[10].locationName);
	 $('#div1').html(Jdata.records.location[10].weatherElement[2].time[0].parameter.parameterName+'度');
}
</script>