function cwb_a0003_trans(json) {
	//console.log(json['location']);
	const elementNameArr_EN=["ELEV","WDIR","WDSD","TEMP","HUMD","PRES","24R","H_FX","H_XD","H_FXT","H_F10","H_10D","H_F10T","H_UVI","D_TX","D_TXT","D_TS"];
	const elementNameArr_ZTW=["高度","風向(度)","風速(m/s)","溫度(攝氏)","相對濕度(0~1)","測站氣壓(百帕)","日累積雨量(毫米)","小時最大陣風風速(m/s)","小時最大陣風風向(度)","小時最大陣風時間(hhmm)","本時最大10分鐘平均風速(m/s)","本時最大10分鐘平均風向(度)",
	"本時最大10分鐘平均風速發生時間(hhmm)","本小時紫外線指數","本日最高溫(攝氏)","本日最高溫發生時間(hhmm)","本日總日照時數(hours)","縣市","縣市編號","鄉鎮","鄉鎮編號"];
	var data = json['records']['location'];
	for(key in data){
		//console.log(data[key]['weatherElement']);
		var lo_name = data[key]['locationName'];
		var time = data[key]['time']['obsTime'];
		console.log('\n地名：'+lo_name);
		var data_weather = data[key]['weatherElement'];
		for(key2 in data_weather){
			var EN_name = data_weather[key2]['elementName'];
			var val = data_weather[key2]['elementValue'];
			var ZTW_name = elementNameArr_ZTW[elementNameArr_EN.indexOf(EN_name)];
			console.log(ZTW_name+EN_name+":"+val);	
			
		}
		elementNameArr_EN.indexOf(200)
	}
}