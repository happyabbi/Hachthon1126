<?php
/*********************************************
目地:取出站點資料
來源:MySQL--->JSON
*********************************************/
 header('Access-Control-Allow-Origin: *');
 header("Content-Type:text/html; charset=utf-8");
 //====================init ===================
include_once "config.php";
if (!empty($_GET)){
	$max=empty($_GET["max"])?10:$_GET["max"];
			//=====================link to mysql ==============================
	$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
	if ($mysqli->connect_errno) {
		printf("Connect failed: %s\n", $mysqli->connect_error);
		exit();
	}
	$mysqli->query("set names utf8" );
				//景點
			if ($_GET["sscf"]){
				$MySql_query="select id,Py as lat,Px as lng ,'../images/icon/shintoshrine.png' as icon,name as title,`Add` as addr ,Toldescribe  as content  from od_sscf where bus=0 and `Add` like '%新竹%'";
			}
		
			//餐廳
			if ($_GET["ssrf"]){
				$MySql_query="select id,Py as lat,Px as lng ,'../images/icon/restaurant.png' as icon,name as title,`Add` as addr ,Description  as content  from od_ssrf where bus=0 and `Add` like '%新竹%'";
			}
			//新竹縣市旅館
			if ($_GET["sshf"]){
				$MySql_query="select sno as id,lat,lng ,'../images/icon/hostel_0star.png' as icon,`旅館名稱` as  title,`地址` as addr ,`電話號碼`  as content  from od_scht where bus=0 ";
				$MySql_query.=" union select sno as id,`經度` as lat,`緯度` as lng ,'../images/icon/hostel_0star.png' as icon,`旅館名稱` as  title,`營業地址` as addr ,`電話`  as content  from od_ssht where bus=0 ";
			}
		if ($result = $mysqli->query($MySql_query)) {
		while($row = $result->fetch_array(MYSQL_ASSOC)) {
				$myArray[] = $row;
		}
	echo json_encode(array("markers" =>$myArray));
	}
	$result->close();	
	$mysqli->close();
}

?>