<?php
//即時性(高異動性)的資料才由這更新
error_reporting(E_ALL ^ E_DEPRECATED);
ini_set("max_execution_time", "6000");
header("Content-Type: text/html; charset=utf-8"); 

define ('DB_USER','root');
switch (gethostname()){
	case "Sking":		
		define ('DB_PASS','!QAZ1qaz');		
	break;
	case "FFIT":
		define ('DB_PASS','Vac@lulala');
	break;
	default:
		define ('DB_PASS','Vac@lulala');
	break;
}

//***************設定DB***********************

define ('DB_HOST','localhost');
define ('DB_NAME','govs');
	
//=======SYS===========================

$link = mysql_connect(DB_HOST,DB_USER,DB_PASS) or die('Cannot connect to the DB');
	mysql_query("SET NAMES UTF8");
	mysql_select_db(DB_NAME,$link) or die('Cannot select the DB');



echo "HOST IP:".getHostByName(getHostName())."<br>";//主機的
$flag=1;//是否執行

$NCDRURL=array(
"center"=>"http://portal.emic.gov.tw/pub/DSP/OpenData/EEA/Shelter.xml",//應變中心及收容所開設

/*新北市公園資料*/
/*"http://data.ntpc.gov.tw/api/v1/rest/datastore/382000000A-000707-001",
"http://data.ntpc.gov.tw/api/v1/rest/datastore/382000000A-000698-001",
"http://data.ntpc.gov.tw/api/v1/rest/datastore/382000000A-000703-001",
"http://data.ntpc.gov.tw/api/v1/rest/datastore/382000000A-000708-001",*/
//"PARK"=>"http://data.ntpc.gov.tw/api/v1/rest/datastore/382000000A-000129-002",
//"PARKX"=>"http://www.tainan.gov.tw/tainan/warehouse/CZ0000/tainan_park_info.xml",
//"LISTS"=>"http://data.coa.gov.tw/service/opendata/OpenDataServiceList.aspx", //行政院農業委員會開放平臺資料集清單
/*"FLW"=>"http://data.coa.gov.tw/Service/OpenData/FromM/GetNewRefugeMap.aspx",//土石流疏散避難圖
"FLW2"=>"http://data.coa.gov.tw/Service/OpenData/FromM/GetDebrisVillInfo.aspx",//土石流潛勢溪流資料
"FLW2"=>"http://data.coa.gov.tw/Service/OpenData/FromM/GetDebrisVillInfo.aspx",//土石流潛勢溪流資料*/
//每日
//"FOOD"=>"http://data.coa.gov.tw/Service/OpenData/FromM/RicepriceData.aspx",//行政院農業委員會 糧價查詢
//"FOOD2"=>"http://data.coa.gov.tw/service/opendata/agrstatUnit.aspx?item_code=222205350100",//行政院農業委員會 畜產都市零售價格

//"LIST"=>"http://search.data.gov.tw/wise/query?q=%2A%3A%2A&export=true&format=json&rows=2147483647&d=1&ndctype=JSON&ndcnid=6564",//清冊
/*"CAND"=>"http://cand.moi.gov.tw/of/ap/cand2_json.jsp?electkind=0700000",//里長*/
//"flow"=>"http://data.coa.gov.tw/Service/OpenData/DataFileService.aspx?UnitId=111",//土石流觀測站影像-行政院農業委員會

//"air"=>'http://opendata.epa.gov.tw/ws/Data/REWXQA/?$orderby=SiteName&$skip=0&$top=1000&format=json',//空氣品質即時污染指標
//"summer"=>'http://opendata.epa.gov.tw/ws/Data/UV/?format=json',//紫外線即時監測資料
/*



"http://portal.emic.gov.tw/pub/DSP/OpenData/EEM/CEOCopen.xml",//?
"http://data.ntpc.gov.tw/api/v1/rest/datastore/382000000A-000235-002",
"http://opendata.hccg.gov.tw/dataset/5778b745-2382-42ef-9df7-aeac248a7321/resource/b44318f7-b65e-4ad8-b5b5-4ab0bc41b0db/download/20160517145223335.json",
*/
//以下未測
//"od_sh_shelter2"=>"http://opendata.hccg.gov.tw/dataset/5778b745-2382-42ef-9df7-aeac248a7321/resource/b44318f7-b65e-4ad8-b5b5-4ab0bc41b0db/download/20160517145223335.json",//新竹市避難收容場所及人數 新竹市政府
//"http://data.taichung.gov.tw/GipOpenAdmin/gipadmin/site/public/Data/f1438562907493.csv",

//"http://data.tycg.gov.tw/opendata/datalist/datasetMeta/download?id=247820e9-0bb6-4ff9-a34e-f1df72d8b296&rid=ab2780bd-5316-495d-97bf-3c644b6a1afa",
//"http://data.moi.gov.tw/MoiOD/System/DownloadFile.aspx?DATA=D1DBD5E2-AB87-4FFF-BDA3-AF6850180845",

/*//test ok
"center"=>"http://portal.emic.gov.tw/pub/DSP/OpenData/EEA/Shelter.xml",//應變中心及收容所開設
"aa"=>"http://data.moi.gov.tw/MoiOD/System/DownloadFile.aspx?DATA=ABEEA328-61FC-4340-9A90-8E5EF6A9870A",//避難收容處所開設情形 (同上)
"LIST"=>"http://search.data.gov.tw/wise/query?q=%2A%3A%2A&export=true&format=json&rows=2147483647&d=1&ndctype=JSON&ndcnid=6564",//清冊
*/
//"aa"=>"http://data.moi.gov.tw/MoiOD/System/DownloadFile.aspx?DATA=ABEEA328-61FC-4340-9A90-8E5EF6A9870A",
//"od_sh_shelter1"=>"https://data.hsinchu.gov.tw/OpenData/GetFile.aspx?GUID=e03243d2-9960-4793-80b5-f44646d102d7&FM=json",//疏散避難圖 新竹縣政府

//"od_ntp_shelter"=>"http://data.ntpc.gov.tw/api/v1/rest/datastore/382000000A-001175-001",//新北市29區1032里防災避難地圖 新北市政府消防局
//"tnPARK"=>"http://www.tainan.gov.tw/tainan/warehouse/CZ0000/tainan_park_info.xml",
//"tcx"=>"http://210.69.115.180/collection/webpages/WebService/WSTransfer.ashx?op=GET&SN=257&key=FB8840D2F5DCB330&SAVE_TYPE=6",//104年臺中市已開闢公園、綠地、兒童遊樂場、廣場、河濱公園座數面積
//"PM25"=>'http://opendata.epa.gov.tw/ws/Data/REWXQA/?$orderby=SiteName&$skip=0&$top=1000&format=json',//定期抓
//"firetx"=>"http://opendata.hccg.gov.tw/dataset/dc2bf724-29f6-45e7-bc71-c4ed7beeac26/resource/ba94cbd2-615a-4f80-808a-e3df95015854/download/20161128104112358.json",//消防栓,新竹
);

//http://opendata.hccg.gov.tw/dataset/dc2bf724-29f6-45e7-bc71-c4ed7beeac26/resource/3432f103-b093-4fc7-8ec8-f7ded6ab191c/download/20151117150248858.xls,http://opendata.hccg.gov.tw/dataset/dc2bf724-29f6-45e7-bc71-c4ed7beeac26/resource/fe608fc1-8bbc-41e7-b3a2-e80cb02bf354/download/20161128104112358.csv,http://opendata.hccg.gov.tw/dataset/dc2bf724-29f6-45e7-bc71-c4ed7beeac26/resource/ba94cbd2-615a-4f80-808a-e3df95015854/download/20161128104112358.json,
//http://opendata.hccg.gov.tw/dataset/dc2bf724-29f6-45e7-bc71-c4ed7beeac26/resource/d7a266fd-b16f-408c-aad9-d76afe3f4a81/download/20161128104112358.xml

//http://www.dadupo.com.tw/hospital/hospital.htm  //台灣各地醫院名冊
//衛生福利部疾病管制署 103-105年流感疫苗合約醫療院所名冊 http://data.gov.tw/node/43594 
// http://data.gov.tw/iisi/logaccess/81128?dataUrl=http://od.cdc.gov.tw/emerging/103-105%E5%B9%B4%E6%B5%81%E6%84%9F%E7%96%AB%E8%8B%97%E5%90%88%E7%B4%84%E9%86%AB%E7%99%82%E9%99%A2%E6%89%80%E5%90%8D%E5%86%8A.csv&ndctype=CSV&ndcnid=43594 103-105年流感疫苗合約醫療院所名冊

function toDB($key,$jsondata,$link){//寫入db  

switch($key){

	case "PM25": //PM25
		//	$query="truncate table od_pm25"; 不用刪,可以留查
		//mysql_query($query,$link) or die('Errant query:  '.$query);
		
		foreach($jsondata as $row){
		$query="INSERT INTO od_pm25 (";
		$field=implode( '`,`', array_keys($row));		
		$val="";	
		foreach ($row as $k=>$v){
			$v=is_array($v)?$v=implode(',',$v):$v;
			$val .="'".htmlspecialchars(str_replace("\\","/",$v),ENT_QUOTES)."',";			
		}
		//$query ="INSERT INTO od_pm25 (`". $field."`) values (".substr($val,0,-1).')';
		$query ="INSERT INTO od_pm25 (`". $field."`,`cd`) values (".$val.'NOW())';
		echo $query."<br>";
		$result = mysql_query($query,$link) or die('Errant query:  '.$query);		
		}
	break;
	case "tcx": 
		foreach($jsondata["DataRoot"]["DataLoop"] as $row){
		$query="INSERT INTO od_park_tc (";
		$field=implode( '`,`', array_keys($row));		
		$val="";	
		foreach ($row as $k=>$v){
			$v=is_array($v)?$v=implode(',',$v):$v;
			$val .="'".htmlspecialchars(str_replace("\\","/",$v),ENT_QUOTES)."',";			
		}
		$query ="INSERT INTO od_park_tc (`". $field."`) values (".substr($val,0,-1).')';
		echo $query."<br>";
		$result = mysql_query($query,$link) or die('Errant query:  '.$query);		
		}

	break;
	case "PARK": //新北市公園資料
			$query="truncate table od_park";
		mysql_query($query,$link) or die('Errant query:  '.$query);
		
		foreach($jsondata["result"]["records"] as $row){
		$query="INSERT INTO od_park (";
		$field=implode( ',', array_keys($row));		
		$val="";	
		foreach ($row as $k=>$v){
			$v=is_array($v)?$v=implode(',',$v):$v;
			$val .="'".htmlspecialchars(str_replace("\\","/",$v),ENT_QUOTES)."',";			
		}
		$query ="INSERT INTO od_park (". $field.') values ('.substr($val,0,-1).')';
		echo $query."<br>";
		$result = mysql_query($query,$link) or die('Errant query:  '.$query);		
		}

	break;
		case "PARKX": //新北市公園資料
			$query="truncate table od_park";
	//	mysql_query($query,$link) or die('Errant query:  '.$query);
		
		foreach($jsondata as $row){
		$query="INSERT INTO od_park (";
		$field=implode( ',', array_keys($row));		
		$val="";	
		foreach ($row as $k=>$v){
			$v=is_array($v)?$v=implode(',',$v):$v;
			$val .="'".htmlspecialchars(str_replace("\\","/",$v),ENT_QUOTES)."',";			
		}
		$query ="INSERT INTO od_park (". $field.') values ('.substr($val,0,-1).')';
		echo $query."<br>";
		//$result = mysql_query($query,$link) or die('Errant query:  '.$query);		
		}

	break;

	
	case "CAND": //里長

		//有座標,所以不能直接刪,要用update
		foreach($jsondata as $k=>$row){
			//查有無資料
			$query="select * from od_cand where cityname='".$row["cityname"]."' and townname='".$row["townname"]."' and villname='".$row["villname"]."'";
			$result = mysql_query($query,$link) or die('Errant query:  '.$query);
			
			if ($rowx=mysql_fetch_array ($result)){
			//有找到　=>update					
				$field="";
				foreach ($row as $k=>$v){
					$field .=" $k='$v',";			
				}
				$query="update od_cand set ". $field ." Where cityname='".$row["cityname"]."' and townname='".$row["townname"]."' and villname='".$row["villname"]."'";; //update command 
			}else{
			//無資料
				$query="insert into od_cand (". implode( ',', array_keys($row)) .") values ('".implode("','", $row)."')";	
			}
			echo "$query<br>";
			$result = mysql_query($query,$link) or die('Errant query:  '.$query);	
		}
	break;
	case "flow": //土石流觀測站影像
		//清空
		$query="TRUNCATE TABLE od_flow";
		$result = mysql_query($query,$link) or die('Errant query:  '.$query);
		/**/$query="truncate table od_flow";
		mysql_query($query,$link) or die('Errant query:  '.$query);
		
		//var_dump($jsondata["Record"]);
		foreach($jsondata as $row){			
			$query="insert into od_flow (". implode( ',', array_keys($row)) .") values ('".implode("','", $row)."')";
			//echo "$query<br>";
			$result = mysql_query($query,$link) or die('Errant query:  '.$query);
		}
	break;
	
	case "LIST": //清冊		(ref)
		$query="truncate table od_list";
		mysql_query($query,$link) or die('Errant query:  '.$query);
		
		//var_dump($jsondata["Record"]);
		foreach($jsondata["Record"] as $row){
		$query="INSERT INTO od_list (";
		$field=implode( ',', array_keys($row));		
		$val="";	
		foreach ($row as $k=>$v){
			$v=is_array($v)?$v=implode(',',$v):$v;
			$val .="'".htmlspecialchars(str_replace("\\","/",$v),ENT_QUOTES)."',";			
		}
		$query ="INSERT INTO od_list (". $field.') values ('.substr($val,0,-1).')';
		//echo $query."<br>";
		$result = mysql_query($query,$link) or die('Errant query:  '.$query);		
		}
	
	break;
	
	case "LISTS": //清冊		(ref)
		$query="truncate table od_lists";
		mysql_query($query,$link) or die('Errant query:  '.$query);
		
		foreach($jsondata as $row){
		$query="INSERT INTO od_lists (";
		$field=implode( ',', array_keys($row));		
		$val="";	
		foreach ($row as $k=>$v){
			$v=is_array($v)?$v=implode(',',$v):$v;
			$val .="'".htmlspecialchars(str_replace("\\","/",$v),ENT_QUOTES)."',";			
		}
		$query ="INSERT INTO od_lists (". $field.') values ('.substr($val,0,-1).')';
		echo $query."<br>";
		$result = mysql_query($query,$link) or die('Errant query:  '.$query);		
		}
	
	break;
	case "FLW": //土石流疏散避難		(ref)
		$query="truncate table od_FLW";
		mysql_query($query,$link) or die('Errant query:  '.$query);
		
		foreach($jsondata as $row){
		$query="INSERT INTO od_FLW (";
		$field=implode( ',', array_keys($row));		
		$val="";	
		foreach ($row as $k=>$v){
			$v=is_array($v)?$v=implode(',',$v):$v;
			$val .="'".htmlspecialchars(str_replace("\\","/",$v),ENT_QUOTES)."',";			
		}
		$query ="INSERT INTO od_FLW (". $field.') values ('.substr($val,0,-1).')';
		echo $query."<br>";
		$result = mysql_query($query,$link) or die('Errant query:  '.$query);		
		}
	
	break;	
	case "FOOD": //糧價		(ref)
		$query="truncate table od_FOOD_PRICE";
		mysql_query($query,$link) or die('Errant query:  '.$query);
		
		foreach($jsondata as $row){
		$query="INSERT INTO od_FOOD_PRICE (";
		$field=implode( ',', array_keys($row));		
		$val="";	
		foreach ($row as $k=>$v){
			$v=is_array($v)?$v=implode(',',$v):$v;
			$val .="'".htmlspecialchars(str_replace("\\","/",$v),ENT_QUOTES)."',";			
		}
		$query ="INSERT INTO od_FOOD_PRICE (". $field.') values ('.substr($val,0,-1).')';
		echo $query."<br>";
		$result = mysql_query($query,$link) or die('Errant query:  '.$query);		
		}
	
	break;
	case "FOOD2": //畜產都市零售價格		(ref)
		$query="truncate table od_FOOD2_PRICE";
		mysql_query($query,$link) or die('Errant query:  '.$query);
		
		foreach($jsondata as $row){
		$query="INSERT INTO od_FOOD2_PRICE (";
		$field=implode( ',', array_keys($row));		
		$val="";	
		foreach ($row as $k=>$v){
			$v=is_array($v)?$v=implode(',',$v):$v;
			$val .="'".htmlspecialchars(str_replace("\\","/",$v),ENT_QUOTES)."',";			
		}
		$query ="INSERT INTO od_FOOD2_PRICE (". $field.') values ('.substr($val,0,-1).')';
		echo $query."<br>";
		$result = mysql_query($query,$link) or die('Errant query:  '.$query);		
		}
	
	break;
	case "center": //處理收容所 update  
		 $jsondata=$jsondata ["SheltersInfoList"]["shelterInfo"];	 
		 foreach($jsondata as $k=>$v){	//更新開放狀態			
			$query="update shelter set openstatus='".$v["@attributes"]["openstatus"]."' where shelterCode='".$v["@attributes"]["shelterCode"]."' ";
			echo $query."<Br>";
			$result = mysql_query($query,$link) or die('Errant query:  '.$query);
		 }
	break;
	case "centerX": //收容所 新增加
	 $jsondata=$jsondata ["SheltersInfoList"]["shelterInfo"];	 
	 foreach($jsondata as $k=>$v){
		$field="";	
		$query="select * from shelter where shelterCode='".$v["@attributes"]["shelterCode"]."' ";
		$result = mysql_query($query,$link) or die('Errant query:  '.$query);
		if ($rowx=mysql_fetch_array ($result)){
			 //update
			  foreach($v["@attributes"] as $key=>$val){
				  if ($key=='lon'){
					$key='lng';  
				  }
				  $field.=" $key='$val',";
			  }
			  $query="update shelter set ".  substr($field,0,-1) ." Where shelterCode='".$v["@attributes"]["shelterCode"]."'"; //update command 
		}else{
			 //insert
			$v_s="";
			$field=str_replace('lon,','lng,',implode( ',', array_keys($v["@attributes"])));
			foreach($v["@attributes"] as $key=>$val){				
				 $v_s .="'".trim($val)."',";			
			}
			$query="insert into shelter (".$field. " ) values (". substr($v_s,0,-1) .")"; 	 
		}
		$result = mysql_query($query,$link) or die('Errant query:  '.$query);
	 }
	break;
	case "od_sh_shelter1":
		$query="truncate table od_sh_shelter1";
		mysql_query($query,$link) or die('Errant query:  '.$query);
		foreach($jsondata["Table"] as $row){
		$field=implode( ',', array_keys($row));		
		$val="";	
		foreach ($row as $k=>$v){
			$v=is_array($v)?$v=implode(',',$v):$v;
			$val .="'".htmlspecialchars(str_replace("\\","/",$v),ENT_QUOTES)."',";			
		}
		$query ="INSERT INTO od_sh_shelter1 (". $field.') values ('.substr($val,0,-1).')';		
		$result = mysql_query($query,$link) or die('Errant query:  '.$query);		
		}
	break;
	case "od_ntp_shelter":
	$query="truncate table od_ntp_shelter";
		mysql_query($query,$link) or die('Errant query:  '.$query);
		foreach($jsondata ["result"]["records"] as $row){
		$field=implode( ',', array_keys($row));		
		$val="";	
		foreach ($row as $k=>$v){
			$v=is_array($v)?$v=implode(',',$v):$v;
			$val .="'".htmlspecialchars(str_replace("\\","/",$v),ENT_QUOTES)."',";			
		}
		$query ="INSERT INTO od_ntp_shelter (". $field.') values ('.substr($val,0,-1).')';
	
		$result = mysql_query($query,$link) or die('Errant query:  '.$query);		
		}
	
	
	breaK;
	case "od_sh_shelter2":
		$query="truncate table $key";
		mysql_query($query,$link) or die('Errant query:  '.$query);	
		foreach($jsondata as $row){
		$field=implode( "','", array_keys($row));		
		$val="";	
		foreach ($row as $k=>$v){
			$v=is_array($v)?$v=implode(',',$v): $v;			
			$val .="'".htmlspecialchars(str_replace("\\","/",$v),ENT_QUOTES)."',";			
		}
		$query ="INSERT INTO $key ('". $field."') values (".substr($val,0,-1).')';		
		$result = mysql_query($query,$link) or die('Errant query:  '.$query."<br>".mysqli_error($link));		
		}
	break;
	default:
		echo "<hr>";
		//echo array_keys($jsondata)."<hr>";
		var_dump($jsondata);
	break;
}
}



function getJSON($url){//取得來源並將 XML 或JSON 統一為JSON 格式輸出
	$url=trim($url);
	$proxy_port="8888";
	$proxy_ip="proxy.ts.com.tw";
	$ch = curl_init(); 
	curl_setopt($ch, CURLOPT_URL, $url ); 
	//curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'Get');
	//curl_setopt($ch, CURLOPT_POST, 0 ); 
	//curl_setopt($ch, CURLOPT_POST, 1 ); 
	//curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data); 
	echo substr(getHostByName(getHostName()),0,8)."<br>";
	if (substr(getHostByName(getHostName()),0,8) <> "192.168." && substr(getHostByName(getHostName()),0,8) <> "127.0.0."){
		//proxy
		curl_setopt($ch, CURLOPT_PROXYPORT, $proxy_port);
		curl_setopt($ch, CURLOPT_PROXY, $proxy_ip);
		//   curl_setopt($ch, CURLOPT_PROXYTYPE, 'HTTP'); 
	
	}
	
	//是ssl
	//echo strtoupper($url)."<br>";
	if (substr(strtoupper($url),0,8)=="HTTPS://"){
		//echo "HTTPS <br>";
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
	}
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
	$postResult = trim(curl_exec($ch)); 

	if (curl_errno($ch)) { 
	   print curl_error($ch); 
	} 
	curl_close($ch);
	
	//xml的處理
	//echo strtoupper($postResult)."<br>";
	//if ($url=="http://cand.moi.gov.tw/of/ap/cand2_json.jsp?electkind=0700000"){
	//	echo substr($postResult,0,1)."<br>";
	//}
	if (substr(strtoupper($postResult),0,6)=="<?XML "){
		echo " is xml <br>";
	$xml = simplexml_load_string($postResult);
	$json = json_encode($xml);
	$array = json_decode($json,TRUE);
	}elseif (substr($postResult,0,2) =='{"' or substr($postResult,0,1) =='[' or $url=="http://search.data.gov.tw/wise/query?q=%2A%3A%2A&export=true&format=json&rows=2147483647&d=1&ndctype=JSON&ndcnid=6564" or  $url=="http://opendata.hccg.gov.tw/dataset/5778b745-2382-42ef-9df7-aeac248a7321/resource/b44318f7-b65e-4ad8-b5b5-4ab0bc41b0db/download/20160517145223335.json"){
		echo " is JSON <br>";
		//$array=$postResult;
		//$json = json_encode($postResult);
		//這是特例? <=這個單位出來前加上bom....造成的問題				
		$postResult=preg_replace("/^\xef\xbb\xbf/", '', $postResult); //移除BOM
		$array = json_decode($postResult,TRUE);
		/*	echo  json_last_error()."<Br>";
			echo json_last_error_msg()."<Br>";*/
				
	}else{
		//csv的處理		
		if (substr($postResult,0,6)=='存取'){
			echo "url 404<br>";
			$array=array();
		}else{
		echo " is csv or OTHER Format!! -" . substr($postResult,0,10)."<br>";
		$postResult=iconv("big5","UTF-8",$postResult);
		$array = array_map("str_getcsv", explode("\n", $postResult));
		$json = json_encode($array);
		$array = json_decode($json,TRUE);
		}
	}
	return $array;//只取內容
}


//show field
function GetTableFields($tablename){
	$field=array();
	$result = mysql_query("SHOW COLUMNS FROM $tablename");
	if (!$result) {
		echo 'Could not run query: ' . mysql_error();
		exit;
	}
	if (mysql_num_rows($result) > 0) {
		while ($row = mysql_fetch_assoc($result)) {
			$field[]=implode( ' , ', $row );
				if ((strpos($row["Type"],'varchar')==0) or (strpos($row["Type"],'text')==0)){ 				
					$query="UPDATE $tablename SET ".$row["Field"]." = REPLACE(".$row["Field"].', \'台\', \'臺\');'; //<==sql error
					echo $row["Type"]." run update filter -- $query <br>";
				}			
		}
	}
	return $field;
}
//=====================================Main=========================================================
/**/
//防災資料 -列舉list
/*
if ($flag==1){
	foreach($NCDRURL as $key=>$url){
		echo "$url<hr>";
		$array=getJSON($url);	
		toDB($key,$array,$link);//接續處理各別的資料到db
		echo "<hr><br>";
	}
}*/

//防災即時資料 -國家災害防救科技中心 - 掃瞄

if ($flag==1){
	for ($i=1;$i<=100;$i++){
	$NCDRURL1[]="https://alerts.ncdr.nat.gov.tw/RssAtomFeed.ashx?AlertType=".$i;
}

//清空
$query="TRUNCATE TABLE od_ncdr_event";
$result = mysql_query($query,$link) or die('Errant query:  '.$query);

foreach($NCDRURL1 as $key=>$url){
	echo "$url<hr>";
	$array=getJSON($url);
	if (isset($array["entry"])){	//有entry只寫入內容
		$array=$array["entry"];
		foreach($array as $key=>$val){
			if (!empty($val["title"])){
			$v["id"]=trim($val["id"]);
			$v["title"]=trim($val["title"]);
			$v["updated"]=trim($val["updated"]);
			$v["author"]=trim($val["author"]["name"]);
			$v["url"]=trim($val["link"]["@attributes"]["href"]); 
			$v["summary"]=trim($val["summary"]);
			$query="insert into od_ncdr_event (". implode( ',', array_keys($v)) .") values ('".implode("','", $v)."')";
			//echo "$query<br>";
			$result = mysql_query($query,$link) or die('Errant query:  '.$query);
			}else{
				//只有一筆
				//echo "<hr>error !![entry is null] $key<br>";
				//print_r($array);
				//echo "<hr>";
			$v["id"]=trim($array["id"]);
			$v["title"]=trim($array["title"]);
			$v["updated"]=trim($array["updated"]);
			$v["author"]=trim($array["author"]["name"]);
			$v["url"]=trim($array["link"]["@attributes"]["href"]); 
			$v["summary"]=trim($array["summary"]);
			$query="insert into od_ncdr_event (". implode( ',', array_keys($v)) .",CD) values ('".implode("','", $v)."',NOW())";
			//echo "$query<br>";
			$result = mysql_query($query,$link) or die('Errant query:  '.$query);
			break;
				
			}
		}
			
	}else{
		foreach($array as $key=>$val){
		if (is_array($val)){
			echo "<hr>$key<br>";
				print_r($val);
			
			//print_r($val);			
		}else{
			echo "key=$key,value=$val<br>";			
		}
		
		}
	}
}


}
?>