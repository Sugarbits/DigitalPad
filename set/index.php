<head>
<link rel="stylesheet" type="text/css" media="screen" href="../plugin/jquery-ui/jquery-ui.min.css" />
<link rel="stylesheet" type="text/css" media="screen" href="../plugin/jqGrid/css/ui.jqgrid.css" />
<script src="../plugin/jquery.min.js" type="text/javascript"></script>
<script src="../plugin/jqGrid/src/i18n/grid.locale-en.js" type="text/javascript"></script>
<script src="../plugin/jqGrid/js/jquery.jqGrid.min.js" type="text/javascript"></script>
<script src="../plugin/jquery-ui/jquery-ui.min.js" type="text/javascript"></script>
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

for($i=1; $i < sizeof($brr); $i++){
    $drr[$crr[0]] = $i;
    $drr[$crr[1]] = $brr[$i];
    $drr[$crr[2]] = '';
	array_push($arr,$drr);
}
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
    <li><a href="#tabs-2">幻燈片圖</a></li>
    <li><a href="#tabs-3">跑馬燈字</a></li>
  </ul>

  <div id="tabs-2">
     <table id="list4"></table>
	 <div id="psortrows"></div>
		<div class="form-wrap">
		<h3>Ajax Image Uploader</h3>
			<form action="../plugin/ajax-image-upload-master/process.php" method="post" enctype="multipart/form-data" id="upload_form">
			<input name="__files[]" type="file" multiple />
			<input name="__submit__" type="submit" value="Upload"/>
			</form>
    <div id="output"><!-- error or success results --></div>
</div>
	</div>
	<div id="tabs-3">
<textarea id="word" rows="10" cols="50">
</textarea>
<BR>
<button onclick='ajax_text_word();'>修改</button>
	</div>
  </div>

</div>


<script>
 function ajax_text(data){
	var scriptUrl = "../ajax_text.php";
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
  function ajax_del_text(target,data){
	var scriptUrl = "../ajax_del_text.php";
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
  function ajax_text_r(){
	var scriptUrl = "../ajax_text_r.php";
	//var scriptUrl = "../test.php";
	//JSON.parse
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
function ajax_text_word(){
	data = $('#word').val();
	var scriptUrl = "../ajax_text_word.php";

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
  function ajax_text_word_r(){
	var scriptUrl = "../ajax_text_word_r.php";
	//var scriptUrl = "../test.php";
	//JSON.parse
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


$('#word').val(ajax_text_word_r());
	
$("#upload_form").on( "submit", function(event) {//on form submit
    if(!window.File && window.FileReader && window.FileList && window.Blob){ //if browser doesn't supports File API
        alert("Your browser does not support new File API! Please upgrade.");
    }
})
});
function del_grid(tb_id,gr_id){
	var obj = $("#list4").jqGrid('getRowData'); 
	var target = '';
	//撈取檔名
		for(key in obj){
			console.log(obj[key]);
			//alert(obj[key]["id"]);
			if(obj[key]["id"] == gr_id){
				target = obj[key]["name"];
			}
		}
	//撈取檔名END
	$(tb_id).jqGrid('delRowData',gr_id);
	var obj = $("#list4").jqGrid('getRowData'); 
	var j = 0;
		for(key in obj){
			j++;
				console.log(obj[key]);
			//alert(obj[key]["id"]);
			obj[key]["id"]=j;
		}
		$("#list4").clearGridData();
		var text="";
		var textarr=[];
		for(var i=0;i<=obj.length;i++){
			$("#list4").jqGrid('addRowData',i+1,obj[i]);
			//text += "\n"+obj[i]["name"];
		}
		for(key in obj){
			textarr.push(obj[key]["name"]);
		}
			ajax_del_text(target,JSON.stringify(textarr));

}
  $( function() {
    $( "#tabs" ).tabs();
//跑馬燈字

//跑馬燈字 END	
 function unitsInStockFormatter(cellvalue, options, rowObject) {
	 //console.log(""+cellvalue+","+options+","+rowObject);
	 return "<img src='../plugin/ajax-image-upload-master/uploads/thumb/"+rowObject['name']+"' alt='my image' />";
 }
$("#list4").jqGrid({
	datatype: "local",
	height: 650,
   	colNames:['編號','檔名','預覽', '動作'],
   	colModel:[
   		{name:'id',index:'id', width:60, sorttype:"int"},
   		{name:'name',index:'name', width:300},
   		{name:'pic',index:'name', width:100,fixed: true,
			formatter: /*function () {
                ;
            }*/unitsInStockFormatter
		},
   		//{name:'note',index:'note', width:50, sortable:false}
   		{name:'act',index:'note', width:50, sortable:false}
   	],
	rowNum:5,
	rowList:[5,10],
	sortname: 'id',
	gridComplete: function(){
		var ids = $("#list4").jqGrid('getDataIDs');
		for(var i=0;i < ids.length;i++){
			var cl = ids[i];
			be = "<input style='height:22px;width:20px;' type='button' value='E' onclick=\"$('#list4').editRow('"+cl+"');\"  />"; 
			se = "<input style='height:22px;width:20px;' type='button' value='S' onclick=\"$('#list4').saveRow('"+cl+"');\"  />"; 
			ce = "<input style='height:22px;width:20px;' type='button' value='C' onclick=\"$('#list4').restoreRow('"+cl+"');\" />"; 
			de = "<input style='height:22px;width:20px;' type='button' value='X' onclick=\"del_grid('#list4',"+cl+");\" />"; 
			$("#list4").jqGrid('setRowData',ids[i],{act:/*be+se+*/de});
		}	
	},
   //	multiselect: true,
   	caption: "Manipulating Array Data"
});

//var mydata = JSON.parse(<?php echo json_encode($arr);?>);
var mydata = JSON.parse(JSON.stringify(<?php echo json_encode($arr);?>));

/*var mydata = [
		{id:"1",name:"test",note:"note"},
		{id:"2",name:"test",note:"note"},
		{id:"3",name:"test",note:"note"}
		];*/
	$("#list4").jqGrid('navGrid','#psortrows',{edit:false,add:false,del:true});
	$("#list4").jqGrid('sortableRows');

	for(var i=0;i<=mydata.length;i++)
		$("#list4").jqGrid('addRowData',i+1,mydata[i]);
	} );

		//change event
	$("#list4").bind('sortstop', function(event, ui) {
		var obj = $("#list4").jqGrid('getRowData'); 
		var j = 0;
		for(key in obj){
			j++;
			//alert(obj[key]["id"]);
			obj[key]["id"]=j;
		}
		$("#list4").clearGridData();
		var text="";
		var textarr=[];
		for(var i=0;i<=obj.length;i++){
			$("#list4").jqGrid('addRowData',i+1,obj[i]);
			//text += "\n"+obj[i]["name"];
		}
		for(key in obj){
			textarr.push(obj[key]["name"]);
		}
			ajax_text(JSON.stringify(textarr));
		});
	//change event over
</script>
<script type="text/javascript">    
//configuration
var max_file_size 		= 2048576; //allowed file size. (1 MB = 1048576)
var allowed_file_types 		= ['image/png', 'image/gif', 'image/jpeg', 'image/pjpeg']; //allowed file types
var result_output 		= '#output'; //ID of an element for response output
var my_form_id 			= '#upload_form'; //ID of an element for response output
var total_files_allowed 	= 3; //Number files allowed to upload



//on form submit
$(my_form_id).on( "submit", function(event) { 
	event.preventDefault();
	var proceed = true; //set proceed flag
	var error = [];	//errors
	var total_files_size = 0;
	
	if(!window.File && window.FileReader && window.FileList && window.Blob){ //if browser doesn't supports File API
		error.push("Your browser does not support new File API! Please upgrade."); //push error text
	}else{
		var total_selected_files = this.elements['__files[]'].files.length; //number of files
		
		//limit number of files allowed
		if(total_selected_files > total_files_allowed){
			error.push( "You have selected "+total_selected_files+" file(s), " + total_files_allowed +" is maximum!"); //push error text
			proceed = false; //set proceed flag to false
		}
		 //iterate files in file input field
		$(this.elements['__files[]'].files).each(function(i, ifile){
			if(ifile.value !== ""){ //continue only if file(s) are selected
				if(allowed_file_types.indexOf(ifile.type) === -1){ //check unsupported file
					error.push( "<b>"+ ifile.name + "</b> is unsupported file type!"); //push error text
					proceed = false; //set proceed flag to false
				}
				total_files_size = total_files_size + ifile.size; //add file size to total size
			}
		});
		
		//if total file size is greater than max file size
		if(total_files_size > max_file_size){ 
			error.push( "You have "+total_selected_files+" file(s) with total size "+total_files_size+", Allowed size is " + max_file_size +", Try smaller file!"); //push error text
			proceed = false; //set proceed flag to false
		}
		
		var submit_btn  = $(this).find("input[type=submit]"); //form submit button	
		
		//if everything looks good, proceed with jQuery Ajax
		if(proceed){
			submit_btn.val("Please Wait...").prop( "disabled", true); //disable submit button
			var form_data = new FormData(this); //Creates new FormData object
			var post_url = $(this).attr("action"); //get action URL of form
			//console.log(post_url);
			
			//jQuery Ajax to Post form data
			$.ajax({
				url : post_url,
				type: "POST",
				data : form_data,
				contentType: false,
				cache: false,
				processData:false,
				mimeType:"multipart/form-data"
			}).done(function(res){ //
				$(my_form_id)[0].reset(); //reset form
				$(result_output).html(res); //output response from server
				submit_btn.val("Upload").prop( "disabled", false); //enable submit button once ajax is done
				//更新list
				var newdata = JSON.parse(ajax_text_r());
				//console.log(newdata);
				$("#list4").clearGridData();
				for(var i=0;i<=newdata.length;i++)
					$("#list4").jqGrid('addRowData',i+1,newdata[i]);
				//更新list_END
			});
		}
	}
	
	$(result_output).html(""); //reset output 
	$(error).each(function(i){ //output any error to output element
		$(result_output).append('<div class="error">'+error[i]+"</div>");
	});
		
});
</script>
