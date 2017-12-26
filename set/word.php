<script type="text/javascript" src="../plugin/jquery.min.js"></script>
<?php
$myfile = fopen("../word.txt", "r") or die("Unable to open file!");

// Output one character until end-of-file
       
$str = "";
while(!feof($myfile)) {
  $str.=fgetc($myfile);
}
fclose($myfile);
$str = str_replace("\r\n","$",$str);
//die($str);
//$crr=array("id","name","note");
//$brr = explode("\r\n",$str);
?>
<style>
body
{
    font-family:Gill Sans MT;
    padding:10px;
}
fieldset
{
    border: solid 1px #000;
    padding:10px;
    display:block;
    clear:both;
    margin:5px 0px;
}
legend
{
    padding:0px 10px;
    background:black;
    color:#FFF;
}
input.add
{
    float:right;
}
input.fieldname
{
    float:left;
    clear:left;
    display:block;
    margin:5px;
}
select.fieldtype
{
    float:left;
    display:block;
    margin:5px;
}
input.remove
{
    float:left;
    display:block;
    margin:5px;
}
#yourform label
{
    float:left;
    clear:left;
    display:block;
    margin:5px;
}
#yourform input, #yourform textarea
{
    float:left;
    display:block;
    margin:5px;
}
.add span {
    display: inline-block;
    transform: rotate(-180deg);
}

</style>
<div id='block_a'>
<fieldset id="buildyourform">
    <legend>跑馬燈訊息</legend>
</fieldset>
</div>
<div id='block_b'>
<fieldset id="yourform" style='display:;'>
	<legend>文字檔預覽</legend>
	<textarea id="textarea01" style="background:#fff; border:dashed #bc2122 1px; height:auto; width:100%;"></textarea>
</fieldset>
</div>
<!--<input type="button" value="v" class="add" id="preview" />
<input type="button" value="v" class="add" id="re-preview" />-->
<button type="button" value="" class="add" id="preview"  style='display:none;'>v</button >
<button type="button" value="" class="add" id="re-preview"  style='display:none;'><span>v</span></button >
<input type="button" value="新增跑馬燈欄位" class="add" id="add" />
<input type="button" value="儲存" class="save" id="save" />
<input type="button" value="取消" class="cancel" id="cancel" />
<script>
$(document).ready(function() {
	$( "#save" ).click(function() {
		preview();
		data = $('#textarea01').val();
		ajax_text_write(data);
	});
	//save to text
	function ajax_text_write(data){
	var scriptUrl = "../ajax_text_write.php";
	console.log(data);
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
	function preview(){
		var texts='';
        $("#buildyourform div").each(function() {
            var id = "input" + $(this).attr("id").replace("field","");
			texts += $(this).find("input.fieldname").first().val() + "\r\n";
            var input;
                   // input = $("<input type=\"text\" id=\"" + id + "\" name=\"" + id + "\" />");
			
          });
		$('#textarea01').val(texts);
	}
	//save to text end
	//console.log(("<?php echo $str;?>").split("$"));
	function init(){
		var input_arr = (("<?php echo $str;?>").split('$'));
		for(val in input_arr){
			if(val == (input_arr.length-1)) continue;
			console.log(input_arr[val]);
			var intId = $("#buildyourform div").length + 1;
			var fieldWrapper = $("<div class=\"fieldwrapper\" id=\"field" + intId + "\"/>");
			var fName = $("<input type=\"text\" class=\"fieldname\" value=\""+input_arr[val]+"\"/>");
			var removeButton = $("<input type=\"button\" class=\"remove\" value=\"-\" />");
			removeButton.click(function() {
				$(this).parent().remove();
			});
			fieldWrapper.append(fName);
			//fieldWrapper.append(fType);
			fieldWrapper.append(removeButton);
			$("#buildyourform").append(fieldWrapper);
		}
	}
	init();
    $("#add").click(function() {
        var intId = $("#buildyourform div").length + 1;
        var fieldWrapper = $("<div class=\"fieldwrapper\" id=\"field" + intId + "\"/>");
        var fName = $("<input type=\"text\" class=\"fieldname\" />");
        //var fType = $("<select class=\"fieldtype\"><option value=\"checkbox\">Checked</option><option value=\"textbox\">Text</option><option value=\"textarea\">Paragraph</option></select>");
        var removeButton = $("<input type=\"button\" class=\"remove\" value=\"-\" />");
        removeButton.click(function() {
            $(this).parent().remove();
        });
        fieldWrapper.append(fName);
        //fieldWrapper.append(fType);
        fieldWrapper.append(removeButton);
        $("#buildyourform").append(fieldWrapper);
    });
    $("#preview").click(function() {
  		 var texts='';
        $("#buildyourform div").each(function() {
            var id = "input" + $(this).attr("id").replace("field","");
			texts += $(this).find("input.fieldname").first().val() + "\n";
            var input;
                   // input = $("<input type=\"text\" id=\"" + id + "\" name=\"" + id + "\" />");
			
          });
		$('#textarea01').val(texts);
    });
	    $("#re-preview").click(function() {
		$("#buildyourform div").each(function() {
			$(this).remove();
		});
		//console.log(($("#textarea01").val()).split('\n'));
		var input_arr = (($("#textarea01").val()).split('\n'));
		for(val in input_arr){
			if(val == (input_arr.length-1)) continue;
			console.log(input_arr[val]);
			var intId = $("#buildyourform div").length + 1;
			var fieldWrapper = $("<div class=\"fieldwrapper\" id=\"field" + intId + "\"/>");
			var fName = $("<input type=\"text\" class=\"fieldname\" value=\""+input_arr[val]+"\"/>");
			var removeButton = $("<input type=\"button\" class=\"remove\" value=\"-\" />");
			removeButton.click(function() {
				$(this).parent().remove();
			});
			fieldWrapper.append(fName);
			//fieldWrapper.append(fType);
			fieldWrapper.append(removeButton);
			$("#buildyourform").append(fieldWrapper);
		}
		
	
        //fieldSet.append(textarea);
    });
});

</script>


