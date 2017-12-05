<span id='result'></span>
<script type="text/javascript" src="plugin/jquery.min.js"></script>
<script> 
var obj={
	cityname:'',
	TMP:'',
	PM25:''
}
//http://feg.netease.com/archives/82.html
function getDataFun(){
    var reqlist = [];
    reqlist.push($.ajax({url: "data/result.php",type:'GET',data:{'dataid':'O-A0003-001'},dataType:'text'}));
    reqlist.push($.ajax({url: "data_PM25/result.php",type:'GET',dataType:'text'}));
    reqlist.push($.ajax({url: "data/test.php",type:'GET',dataType:'text'}));
 
    $.when.apply($,reqlist).then(function(data1,data2,data3){
        //成功回调，所有请求正确返回时调用
		//里面的数据依次是[data,statusText,jqXHR]
        //console.log(data1[0]);
		var data1_o  = JSON.parse(data1[0]);
		var data2_o  = JSON.parse(data2[0]);
        console.log(data1_o['records']['location'][0]['weatherElement'][0]['elementValue']);
        console.log(data1_o['records']['location'][0]['parameter'][2]['parameterValue']);
		obj.TMP = data1_o['records']['location'][0]['weatherElement'][0]['elementValue'];
		obj.cityname = data1_o['records']['location'][0]['parameter'][2]['parameterValue'];
        //console.log(data2[0]);
        console.log(data2_o[14]['Site']+':'+data2_o[14]['PM25']);
		obj.PM25 = data2_o[14]['PM25'];
		$('#result').html(JSON.stringify(obj));
        //console.log(data3[0]);
    },function(){
        //失败回调，任意一个请求失败时返回
        console.log('fail!!');
    })
}
getDataFun();
/*
function ajax(){
   $.ajax({
  url: "data/result.php",
  type :"GET",
  data:{
	  'dataid':'O-A0003-001'
  },
  cache: false
}).done(function( html ) {
	// var obj = JSON.parse(html);
	 var obj = JSON.parse(html);
	 console.log(obj);
	 var temp = obj['records']['location'][0]['weatherElement'][0]['elementValue'];
	 var city = obj['records']['location'][0]['parameter'][2]['parameterValue'];
	 //$( "#result" ).append(""+temp+" °C");
	 var result={
		TMP:temp,
		cityname:city
	 };
	 return result;
  });
 }
 
function ajax2(){
   $.ajax({
  url: "data_PM25/result.php",
  type :"GET",
  data:{},
  cache: false
}).done(function( html ) {
	 //console.log(JSON.parse(html));
	 var obj = JSON.parse(html);
	 console.log(obj[14]['Site']+':'+obj[14]['PM25']);
	// var temp = obj['records']['location'][0]['weatherElement'][0]['elementValue'];
  });
 }
 
 */
</script>