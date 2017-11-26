<?php /* Smarty version 2.6.26, created on 2017-11-26 13:16:12
         compiled from ../tpl/index.tpl.htm */ ?>
<!doctype html>

<!--[if IE 7 ]>    <html lang="en-gb" class="isie ie7 oldie no-js"> <![endif]-->
<!--[if IE 8 ]>    <html lang="en-gb" class="isie ie8 oldie no-js"> <![endif]-->
<!--[if IE 9 ]>    <html lang="en-gb" class="isie ie9 no-js"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!-->
<html lang="en-gb" class="no-js">
<!--<![endif]-->

<head>

    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <!--[if lt IE 9]> 
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <![endif]-->
    <title>遊輪式公車景點規劃 <?php echo $this->_tpl_vars['COMPANY']; ?>
 - <?php echo $this->_tpl_vars['SYSNAME']; ?>
</title>
    <meta name="description" content="">
    <meta name="author" content="ffit.com">
    <!--[if lt IE 9]>
        <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    <!--[if lte IE 8]>
		<script type="text/javascript" src="http://explorercanvas.googlecode.com/svn/trunk/excanvas.js"></script>
	<![endif]-->
    <link rel="stylesheet" href="../css/bootstrap.min.css" />	
  <!--  <link rel="stylesheet" href="../css/isotope.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="../js/fancybox/jquery.fancybox.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="../css/da-slider.css" type="text/css"/>-->
	<!-- Map Icons 
	<link rel="stylesheet" type="text/css" href="../bower_components/map-icons/dist/css/map-icons.min.css">
	<script type="text/javascript" src="../bower_components/map-icons/dist/js/map-icons.min.js"></script> -->
	
    <!-- Owl Carousel Assets -->
    <!--<link rel="stylesheet" href="../js/owl-carousel/owl.carousel.css" >-->
    <link rel="stylesheet" href="../css/styles.css" />
	<?php echo '
		<style>
		.btn{
			width:100px;
			margin:6px;
		}
		.btn img{
			width:24px;
		}
		#infox h3{
			color:blue;
		}
		td{
			color:black;
		}
		th{
			color:blue;		
		}
		table {
			margin-bottom:40px;
			width:100%;
		}
		</style>
	'; ?>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="../font/css/font-awesome.min.css" >
	<!--<link rel="stylesheet" href="../css/img.css" />	-->
</head>

<body>

  

	<div class="row">
		<h2>&nbsp;遊輪式公車-景點規劃 / 改善公車不易到達景點問題【增加旅遊深度 方便規劃路線 節省交通費用 】
</h2>
	</div>
   <div class="row" style="background-color:white">
		<!--<div class="panel panel-default">
			<div class="panel-body" style="background-color:red">-->
			<!--<div class="panel-group" id="accordion" >-->
							
		<!--		-->	
		<!--map-->
			<div  id="map_area"  class="col-md-9">
				<div id="map_canvas" class="map" style="align-content: center;width:100%;height:500px!important;">map</div>	
				
			</div>
				<div class="col-md-3" id="left_fun" >
				<div class="panel panel-info" >
					
                        <div class="panel-heading">
                          <a data-toggle="collapse" data-parent="#accordion" href="#webfilter"><i class="fa fa-search"></i> 遊輪公車路線</a>　
						</div>
                        <div id="webfilter" class="panel-collapse collapse in panel-body" >
						<form class="form-horizontal" method="get" enctype="multipart/form-data" >
						<div class="form-group">
			
							<button id="button0id" name="button0id" class="btn btn-default"><img src="../images/icon/busstop.png" />站牌</button>			
							<button id="button1id" name="button1id" class="btn btn-warning"><img src="../images/icon/shintoshrine.png" />景點</button>			
							<button id="button2id" name="button2id" class="btn btn-success"><img src="../images/icon/party-2.png" />活動</button>
							<button id="button3id" name="button3id" class="btn btn-success"><img src="../images/icon/restaurant1.png" />餐廳</button>
							<button id="button4id" name="button4id" class="btn btn-success"><img src="../images/icon/hostel_0star.png" />旅館</button>
							<button id="button6id" name="button6id" class="btn btn-success"><img src="../images/icon/wifi.png" />WIFI</button>
							<button id="button7id" name="button7id" class="btn btn-success"><img src="../images/icon/car.png" />車禍</button>
							<button id="button5id" name="button5id" class="btn btn-danger">Clear</button>
						</div>
							<div class="form-group">
							 <label class="col-md-5 control-label" for="keypoint"><i class="fa fa-unlock fw" > </i>公車未到之</label>							 
							  <div class="col-md-7">
							    <button id="ssc" class="btn btn-info" ><i class="fa fa-camera fw" > </i> 景點:<B style="color:red"><?php echo $this->_tpl_vars['ssc']; ?>
</B> </button>								 
								<button id="ssr" class="btn btn-info" ><i class="fa fa-cutlery fw" > </i> 餐飲:<B style="color:red"><?php echo $this->_tpl_vars['ssr']; ?>
</b></button>							
								<button id="ssh" class="btn btn-info" ><i class="fa fa-home fw"> </i> 旅館:<B style="color:red"><?php echo $this->_tpl_vars['ssh']; ?>
</b></button>
							  </div>
							</div>
							
							<div class="form-group">							
							 <hr>
							  <label class="checkbox-inline" for="sscf" style="margin-left:20px;">
								  <input type="checkbox" name="sscf" id="sscf" value="1" checked>
								  <!--<img src="../images/icon/villa.png" class="xicon" />--><i class="fa fa-camera fw" > </i> 景點
								</label>
								<label class="checkbox-inline" for="ssaf">
								  <input type="checkbox" name="ssaf" id="ssaf" value="1" checked>
								  <i class="fa fa-bullhorn fw" > </i> 活動
								</label>
								
								<label class="checkbox-inline" for="ssrf">
								  <input type="checkbox" name="ssrf" id="ssrf" value="1" checked>
								  <i class="fa fa-cutlery fw" > </i> 餐飲
								</label>
								<label class="checkbox-inline" for="sshf">
								  <input type="checkbox" name="sshf" id="sshf" value="1" checked>
								  <i class="fa fa-home fw"> </i> 旅館
								</label>
							<br>
							<hr>
							  <label class="col-md-4 control-label" for="bus">公車<Br>路線</label>							  
							  <div class="col-md-8">
							  <select id="bus" class="form-control input-md" >
									<option value="">公車路線</option>
								<?php unset($this->_sections['h']);
$this->_sections['h']['name'] = 'h';
$this->_sections['h']['loop'] = is_array($_loop=$this->_tpl_vars['BSRUT']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['h']['show'] = true;
$this->_sections['h']['max'] = $this->_sections['h']['loop'];
$this->_sections['h']['step'] = 1;
$this->_sections['h']['start'] = $this->_sections['h']['step'] > 0 ? 0 : $this->_sections['h']['loop']-1;
if ($this->_sections['h']['show']) {
    $this->_sections['h']['total'] = $this->_sections['h']['loop'];
    if ($this->_sections['h']['total'] == 0)
        $this->_sections['h']['show'] = false;
} else
    $this->_sections['h']['total'] = 0;
if ($this->_sections['h']['show']):

            for ($this->_sections['h']['index'] = $this->_sections['h']['start'], $this->_sections['h']['iteration'] = 1;
                 $this->_sections['h']['iteration'] <= $this->_sections['h']['total'];
                 $this->_sections['h']['index'] += $this->_sections['h']['step'], $this->_sections['h']['iteration']++):
$this->_sections['h']['rownum'] = $this->_sections['h']['iteration'];
$this->_sections['h']['index_prev'] = $this->_sections['h']['index'] - $this->_sections['h']['step'];
$this->_sections['h']['index_next'] = $this->_sections['h']['index'] + $this->_sections['h']['step'];
$this->_sections['h']['first']      = ($this->_sections['h']['iteration'] == 1);
$this->_sections['h']['last']       = ($this->_sections['h']['iteration'] == $this->_sections['h']['total']);
?>	
									<option value="<?php echo $this->_tpl_vars['BSRUT'][$this->_sections['h']['index']][0]; ?>
" ><?php echo $this->_tpl_vars['BSRUT'][$this->_sections['h']['index']][1]; ?>
</option>									
								<?php endfor; endif; ?>
							  </select>	
							  </div>							  
							  <br>
							  <div class="col-md-12" style="margin-top:10px;background-color:#e6b3cc">
									<div id="instructions" style="margin-top:10px;">	</div>
									<div class="result"></div>
							  </div>							
							</div>
							<!--<div width="100%" style="align:right">
								<button  type="button" id="findit" name="findit" class="btn btn-success" ><i class="fa fa-search"></i> 查詢</button>	
							</div>-->
							<hr>
											
						<!--<label class="col-md-3 control-label" for="checkboxes"></label>
							<button  type="button" id="findit" name="findit" class="btn btn-success"><i class="fa fa-search"></i> 查詢</button>-->
							</form>	
							
                        </div>
			</div>
	
					<!--<div class="panel panel-info">
                        <div class="panel-heading">
                         <a data-toggle="collapse" data-parent="#accordion" href="#maplay"> <i class="fa fa-stack-overflow"></i> 圖層套用</a>
								<label for="allc" style="float:right">
								  <input type="checkbox" name="allc" id="allc" value="1">全選
								</label>
								
                        </div>
                        <div id="maplay" class="panel-collapse collapse panel-body">
							<div class="panel panel-success">
								<div class="panel-heading">
									<a data-toggle="collapse" data-parent="#accordion" href="#maplay1"> <i class="fa fa-cloud"></i> 天文氣像</a>
									
								</div>
								<div id="maplay1" class="panel-collapse collapse panel-body">
										<div class="checkbox">
										<label for="cwp_btn">
										<input type="checkbox" name="cwp_btn" id="cwp_btn" value="1">
										  雷達回波圖
										</label>
										<label for="cwp_btn1">
										<input type="checkbox" name="cwp_btn1" id="cwp_btn1" value="1">
										  彩色合成地面天氣圖
										</label>
										<label for="cwp_btn2">
									
										</div>
								</div>
							</div>
							
							<div class="panel panel-success">
								<div class="panel-heading">
									<a data-toggle="collapse" data-parent="#accordion" href="#maplay2"> <i class="fa fa-leaf"></i> 環境資訊</a>
								
								</div>
								<div id="maplay2" class="panel-collapse collapse panel-body">
	
										<div class="checkbox">
										<label for="land-full">
										<input type="checkbox" name="land-full" id="land-full" value="1">
										  土壤液化
										</label>
										<label for="water_btn">
										<input type="checkbox" name="water_btn" id="water_btn" value="1">
										  水災
										</label>
										</div>
								</div>
							</div>						
							
							
							<div class="panel panel-success">
								<div class="panel-heading">
									<a data-toggle="collapse" data-parent="#accordion" href="#maplay4"> <i class="fa fa-star"></i> 防洪排水</a>								
								</div>
								<div id="maplay4" class="panel-collapse collapse panel-body">	
										<div class="checkbox">
										<label for="flb_btn">
										<input type="checkbox" name="flb_btn" id="flb_btn" value="1">
										  防洪排水
										</label>	
										<label for="xcheckboxes-1">
										<input type="checkbox" name="xcheckboxes-1" id="xcheckboxes-1" value="1">
										  水庫保育
										</label>
										<label for="xvdo_btn1">
										<input type="checkbox" name="xvdo_btn1" id="xvdo_btn1" value="1">
										  河川水文
										</label>
										</div>
								</div>
								</div>
							
								<button id="clearMap" name="clearMap" class="btn btn-success" style="float:right;margin-right:10px;">清除</button>
	
						</div>
                      
                    </div>	-->		
				
			</div>  			
		<!--/map-->			
					
			<!--</div>-->
		</div>	<!--/.-->
    </div>
	<!--/news-->
		
	</div>
	<div class="row">
	<div class="col-md-12" >
				<div class="panel panel-info" >
						<div class="panel-heading">
                          <a style="color:black;"><i class="map map-icon-bus-station;"></i> 顯示結果</a>　
						</div>
                        <div  class="panel-collapse collapse in panel-body">
						<div id="chimg" class="form-group" style="margin-top:0;padding-top:0">
							<label class="col-md-1 control-label" for="checkboxes"></label>
							  <div id="RES" class="col-md-12">							
							  </div>
						</div>		
					</div>
			</div>
		</div>
	</div>
    <!--[if lte IE 8]><script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script><![endif]-->
	<script type="text/javascript" src="https://maps.google.com/maps/api/js?key=<?php echo $this->_tpl_vars['MAPKEY']; ?>
"></script>
	
    <!--<script src="../js/modernizr-latest.js"></script>-->
	<script type="text/javascript" src="../js/jquery-1.11.2.min.js"></script>  
	<!--<script type="text/javascript" src="../js/jquery.ui.map.min.js"></script>-->
	<script type="text/javascript" src="../js/gmaps.js"></script>
    <script type="text/javascript" src="../js/bootstrap.min.js" ></script>
	
   <!-- <script type="text/javascript" src="../js/jquery.isotope.min.js" ></script>
    <script type="text/javascript" src="../js/fancybox/jquery.fancybox.pack.js" ></script>
    <script type="text/javascript" src="../js/jquery.nav.js" ></script>
    <script type="text/javascript" src="../js/jquery.cslider.js" ></script>
	<script type="text/javascript" src="../js/jqBootstrapValidation.js"></script>
	<script type="text/javascript" src="../js/contact_me.js"></script>
    <script type="text/javascript" src="../js/custom.js" ></script>
    <script type="text/javascript" src="../js/owl-carousel/owl.carousel.js"></script>-->
    <!--<script type="text/javascript" src="js/scripts.js"></script>-->


	<!--<script src="../bower_components/EasyTree/jquery.easytree.min.js"></script>-->
	<!--<script src='https://npmcdn.com/@turf/turf/turf.min.js'></script>-->
	<!--<script src='https://api.mapbox.com/mapbox.js/plugins/turf/v2.0.2/turf.min.js'></script>-->
    <script src="../js/hj.js"></script>	
	
<?php echo '
    <script type="text/javascript">
	/*$(function(){
	
	});*/
    </script>
	'; ?>

</body>
</html>