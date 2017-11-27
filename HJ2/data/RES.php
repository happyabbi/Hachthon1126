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
	$reg=0.005;
	$MySql_query="select a.lat,a.lng,a.StopUID,b.Zh_tw as name, '../images/icon/busstop.png' as icon from (select DISTINCT StopUID,lat,lng from od_bsrs where RouteUID ='".$_GET["Type"]."' order by sno) as a left join od_bsstop as b on a.StopUID=b.StopUID";
	if ($result = $mysqli->query($MySql_query)) {
		while($row = $result->fetch_array(MYSQL_ASSOC)) {
			foreach($row as $k=> $v){
				$max_lat=$row["lat"]+$reg;
				$min_lat=$row["lat"]-$reg;
				$max_lng=$row["lng"]+$reg;
				$min_lng=$row["lng"]-$reg;	
				
			//景點
			if ($_GET["sscf"]){
				$MySql_query ="select name ,Px ,Py,picture1,tel,'fa-camera' as type, `Add` as addr, CONCAT('od_sscf@',sno) as id, '../images/icon/shintoshrine.png' as icon from od_sscf where (Py between $min_lat and $max_lat) and (Px between $min_lng and $max_lng) union ";
			}
			//活動
			if ($_GET["ssaf"]){
				$MySql_query.=" select name ,Px ,Py,picture1,tel,'fa-bullhorn' as type, `Add` as addr,CONCAT('od_ssaf@',sno) as id, '../images/icon/party-2.png' as icon from od_ssaf where (Py between $min_lat and $max_lat) and (Px between $min_lng and $max_lng)";
			}
			//餐廳
			if ($_GET["ssrf"]){
				$MySql_query.=" union select name ,Px ,Py,picture1,tel,'fa-cutlery' as type, `Add` as addr,CONCAT('od_ssrf@',sno) as id, '../images/icon/restaurant.png' as icon from od_ssrf where (Py between $min_lat and $max_lat) and (Px between $min_lng and $max_lng)";
			}
			//新竹縣市旅館
			$MySql_query.=" union select `旅館名稱` as name,lng as Px ,lat as Py,'' as picture1,`電話號碼` as tel,'fa-home' as type,`地址` as addr, CONCAT('od_scht@',sno) as id, '../images/icon/hostel_0star.png' as icon  FROM od_scht where (lat between ".$min_lat." and ".$max_lat.") and (lng between ".$min_lng." and ".$max_lng.")"; 
			$MySql_query.=" union select `旅館名稱` as name,`緯度` as Px,`經度` as Py,`圖片URL` as picture1,`電話` as tel ,'fa-home' as type,`營業地址` as addr, CONCAT('od_ssht@',sno) as id, '../images/icon/hostel_0star.png' as icon FROM od_ssht where (`經度` between ".$min_lat." and ".$max_lat.") and (`緯度` between ".$min_lng." and ".$max_lng.")"; 
		
	//echo $MySql_query."<br>";		
			if ($sresult = $mysqli->query($MySql_query)) {
				$dtldata="";
				while($srow = $sresult->fetch_array(MYSQL_ASSOC)) {////找出景點
					$dtldata[]=$srow;
					//=====================================================================
					//要放到多大
				/*	
					//寫回景點備註bus公車可到(改成寫路線,比較好查出關係,但二個以上時??)
					//$_GET["Type"];<==路線代碼
					//$row["StopUID"];<==位代碼
					
					$data=split("@",$srow['id']);					
				
					$query="select RouteUIDs,StopUIDs from ".$data[0]." where sno='".$data[1]."'";
					$resultv = $mysqli->query($query);
					$vrow = $resultv->fetch_array(MYSQL_ASSOC);
					$rx=$_GET["Type"];
					$sx=$row["StopUID"];
					if ($vrow["RouteUIDs"]!='' && strpos($vrow["RouteUIDs"],$_GET["Type"])<0){						
							$rx=$vrow["RouteUIDs"].",".$_GET["Type"];
							$sx=$vrow["StopUIDs"].",".$row["StopUID"];						
					}					
					$query="update ".$data[0]." SET bus=1,RouteUIDs='".$rx."',StopUIDs='".$sx."' where sno='".$data[1]."'";						
					//echo $query."<br>";
					$resultbus =$mysqli->query($query);//備註
					//========================================================================
					*/
				}}		
			}
			$row['dtl']=$dtldata;
			$myArray[] = $row;//站名					
		}
		
		
	echo json_encode(array("markers" =>$myArray));
	}
	$result->close();	
	$mysqli->close();
}

?>