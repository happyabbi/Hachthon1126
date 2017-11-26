 $(function () {
	var lat="24.747510";
	var lng="121.164850";
	var map = new GMaps({
	  div: '#map_canvas',
	  lat: 24.747510,
	  lng: 121.164850,
	  zoom:12,
	  zoomControl : true,
	});

	//景點
		$("#button1id").click(function(){
			$.getJSON( '../data/SSCF.php',"Type=all"
				, function(data) {  						
				$.each( data.markers, function(i, marker) {//設定時會影響到中心點				
					var C=map.addMarker({
							  lat: marker.lat,
							  lng: marker.lng,
							  title: marker.title,
							  icon:marker.icon ,
							  infoWindow: {
									content: '<p><b>'+marker.title+'</b><br>'+marker.addr+"<br> lat"+ marker.lat+" lng:"+marker.lng+'</p>'
									}
							});
					});
				});
		});
		//活動
		$("#button2id").click(function(){
			$.getJSON( '../data/SSAF.php',"Type=all"
				, function(data) {  						
				if (data.markers != null) {
				$.each( data.markers, function(i, marker) {//設定時會影響到中心點					
					var A=map.addMarker({
							  lat: marker.lat,
							  lng: marker.lng,
							  title: marker.title,
							  icon:marker.icon ,
							  infoWindow: {
									content: '<p><b>'+marker.title+'</b><br>'+marker.addr+"<br> lat"+ marker.lat+" lng:"+marker.lng+'</p>'
									}
							});
					});
				}
				});
		});
		//餐廳
		$("#button3id").click(function(){
			$.getJSON( '../data/SSRF.php',"Type=all"
				, function(data) {  						
				if (data.markers != null) {
				$.each( data.markers, function(i, marker) {//設定時會影響到中心點					
					var R= map.addMarker({
							  lat: marker.lat,
							  lng: marker.lng,
							  title: marker.title,
							  icon:marker.icon ,
							  infoWindow: {
									content: '<p><b>'+marker.title+'</b><br>'+marker.addr+"<br> lat"+ marker.lat+" lng:"+marker.lng+'</p>'
									}
							});
					});
				}
				});
		});		
		
		//旅館
		$("#button4id").click(function(){
			$.getJSON( '../data/SSHT.php',"Type=all"
				, function(data) {  						
				if (data.markers != null) {
				$.each( data.markers, function(i, marker) {//設定時會影響到中心點					
					var H=map.addMarker({
							  lat: marker.lat,
							  lng: marker.lng,
							  title: marker.title,
							  icon:marker.icon ,
							  infoWindow: {
									content: '<p><b>'+marker.title+'</b><br>'+marker.addr+"<br> lat"+ marker.lat+" lng:"+marker.lng+'</p>'
									}
							});
					});
				}
				});
		});
		
		//wifi
		$("#button6id").click(function(){
			$.getJSON( '../data/WIFI.php',"Type=all"
				, function(data) {  						
				if (data.markers != null) {
				$.each( data.markers, function(i, marker) {					
					var W=map.addMarker({
							  lat: marker.lat,
							  lng: marker.lng,
							  title: marker.title,
							  icon:marker.icon ,
							  infoWindow: {
									content: '<p><b>'+marker.title+'</b><br>'+marker.addr+"<br> lat"+ marker.lat+" lng:"+marker.lng+'<br>'+marker.content+'</p>'
									}
							});
					});
				}
				});
		});
		//交通事故
		$("#button7id").click(function(){
			$.getJSON( '../data/DG.php',"Type=all"
				, function(data) {  						
				if (data.markers != null) {
				$.each( data.markers, function(i, marker) {					
					var W=map.addMarker({
							  lat: marker.lat,
							  lng: marker.lng,
							  title: marker.title,
							  icon:marker.icon ,
							  infoWindow: {
									content: '<p><b>'+marker.title+'</b><br>'+marker.addr+"<br> lat"+ marker.lat+" lng:"+marker.lng+'<br>'+marker.content+'</p>'
									}
							});
					});
				}
				});
		});
$("#button0id").click(function(){
		//站牌
		$.getJSON('../data/BUSSTOP.php',"Type=all"
				, function(data) {  						
					$.each( data.markers, function(i, marker) {//設定時會影響到中心點				
					var S=map.addMarker({
							  lat: marker.lat,
							  lng: marker.lng,
							  title: marker.title,
							  icon:marker.icon ,
								 /* click: function(e) {
									  alert('click:'+marker.addr+" lat"+ marker.lat+" lng:"+marker.lng);
									//$('#map_canvas').gmap('openInfoWindow', {'content': marker.title}, this);
								  },*/
							 infoWindow: {
									content: '<p>路線:<B>'+marker.rname+'</B><BR>站牌:<b>'+marker.title+'</b><br>'+marker.addr+"<br> lat"+ marker.lat+" lng:"+marker.lng+'</p>'
									}	  
							
						});
					var SC=map.drawCircle({
							lat:marker.lat,
							lng:marker.lng,
							radius:1000, //1公里
							fillColor:'#ffccff',
							fillOpacity:0.3,
							strokeColor:'#b300b3',
							strokeOpacity:0.7,
						});
					$("#button5id").click(function(){
						map.removeMarkers();
						SC.setMap(null);		
					})
					});
					
	
				});
});	

//=================================================			
				$("#ssc").click(function(){
					
				$.getJSON( '../data/nssc.php',"sscf=1"
				, function(data) {  						
				if (data.markers != null) {
					$("#RES").html("<table><tr>公車不易到逹之景點</tr>");
					$.each( data.markers, function(i, marker) {					
					var W=map.addMarker({
							  lat: marker.lat,
							  lng: marker.lng,
							  title: marker.title,
							  icon:marker.icon ,
							  infoWindow: {
									content: '<p><b>'+marker.title+'</b><br>'+marker.addr+"<br> lat"+ marker.lat+" lng:"+marker.lng+'<br>'+marker.content+'</p>'
									}
							});
							var SC=map.drawCircle({
								lat:marker.lat,
										lng:marker.lng,
										radius:3000, //3公里
										fillColor:'#ffccff',
										fillOpacity:0.3,
										strokeColor:'#b300b3',
										strokeOpacity:0.7,
								});				
							$("#RES").append('<tr><td>'+(i+1)+'</td><td>'+marker.title+'</td><td>'+marker.addr+"</td><td> lat"+ marker.lat+"</td><td> lng:"+marker.lng+'</td><td>'+marker.content+'</td></tr>');
					});
					$("#RES").append("</table>");
				}
				});
				});
				
				
				$("#ssr").click(function(){					
					$.getJSON( '../data/nssc.php',"ssrf=1"
								, function(data) {  						
								if (data.markers != null) {
									$("#RES").html("<table><tr>公車不易到逹之餐廳</tr>");
								$.each( data.markers, function(i, marker) {					
									var W=map.addMarker({
											  lat: marker.lat,
											  lng: marker.lng,
											  title: marker.title,
											  icon:marker.icon ,
											  infoWindow: {
													content: '<p><b>'+marker.title+'</b><br>'+marker.addr+"<br> lat"+ marker.lat+" lng:"+marker.lng+'<br>'+marker.content+'</p>'
													}
											});
									var SC=map.drawCircle({
										lat:marker.lat,
										lng:marker.lng,
										radius:3000, //3公里
										fillColor:'#ffccff',
										fillOpacity:0.3,
										strokeColor:'#b300b3',
										strokeOpacity:0.7,
									});		
										$("#RES").append('<tr><td>'+(i+1)+'</td><td>'+marker.title+'</td><td>'+marker.addr+"</td><td> lat"+ marker.lat+"</td><td> lng:"+marker.lng+'</td><td>'+marker.content+'</td></tr>');
									});
									$("#RES").append("</table>");
								}
								});
					
				});
				$("#ssh").click(function(){
					
					$.getJSON( '../data/nssc.php',"sshf=1"
								, function(data) {  						
								if (data.markers != null) {
									$("#RES").html("<table><tr>公車不易到逹之旅館</tr>");
								$.each( data.markers, function(i, marker) {					
									var W=map.addMarker({
											  lat: marker.lat,
											  lng: marker.lng,
											  title: marker.title,
											  icon:marker.icon ,
											  infoWindow: {
													content: '<p><b>'+marker.title+'</b><br>'+marker.addr+"<br> lat"+ marker.lat+" lng:"+marker.lng+'<br>'+marker.content+'</p>'
													}
											});
									var SC=map.drawCircle({
										lat:marker.lat,
										lng:marker.lng,
										radius:3000, //3公里
										fillColor:'#ffccff',
										fillOpacity:0.3,
										strokeColor:'#b300b3',
										strokeOpacity:0.7,
									});		
										$("#RES").append('<tr><td>'+(i+1)+'</td><td>'+marker.title+'</td><td>'+marker.addr+"</td><td> lat"+ marker.lat+"</td><td> lng:"+marker.lng+'</td><td>'+marker.content+'</td></tr>');	
									});
									$("#RES").append("</table>");
									
								}
								});
					
				});
				


		$("#bus").change(function(){
			$("#RES").html("");
				map.removeMarkers();//清所有點
				map.cleanRoute();
				$('#RES').html('');
				 
				//console.log(map.getFromFusionTables());
				//var mapx = new google.maps.Map(document.getElementById('map_canvas'));
				//mapx.setMap(null);
				
			$.getJSON('../data/RES.php',"Type="+$(this).val()+"&sscf="+$("#sscf").val()+"&ssaf="+$("#ssaf").val()+"&ssrf="+$("#ssrf").val()+"&sshf="+$("#sshf").val()
				, function(data){					
					//console.log(data);
					html='<ul style="margin-top:20px;clear:both">';
					if (data.markers != null) {
					$.each( data.markers, function(i, marker) {
					    html +='<li style="margin-top:10px;clear:both" ><b><i class="fa fa-flag fw"> </i>  '+marker.name+"("+marker.lat+" , "+marker.lng+")</b>";
						html +='<ul style="margin-left:10px; ">';
						//標示站點
						map.addMarker({
								  lat: marker.lat,
								  lng: marker.lng,
								  title: marker.name,
								  icon:marker.icon ,
								 // click: function(e) {
								//	  alert('click:'+marker.addr+" lat"+ marker.lat+" lng:"+marker.lng);
									//$('#map_canvas').gmap('openInfoWindow', {'content': marker.title}, this);
								 // },
								  infoWindow: {
									content: '<p><b>'+marker.name+'</b><br>'+marker.StopUID+"<br>"+marker.addr+"<br> lat"+ marker.lat+" lng:"+marker.lng+'</p>'
									}
								});
						/*map.drawCircle({
							lat:marker.lat,
							lng:marker.lng,
							radius:1000,
							fillColor:'#ffccff',
							fillOpacity:0.3,
							strokeColor:'#b300b3',
							strokeOpacity:0.7,
						});*/
						//==	
					
						$.each( marker.dtl, function(i, point) {
							switch (point.type){
								case "fa-camera":
									colorcode="green";
								break;
								case "fa-bullhorn":
									colorcode="red";
								break;
								case "fa-cutlery":
									colorcode="blue";
								break;
								default:
									colorcode="black";
								break;								
							}
							//標示 地點
								map.addMarker({
								  lat: point.Py,
								  lng: point.Px,
								  title: point.name,
								  icon: point.icon ,
								  click: function(e) {
									  //導航    
									  map.cleanRoute();
									  $('#instructions').html('<i class="fa fa-map-marker"></i>導航<br> <img src="'+marker.icon+'"/>' +marker.name + "==><img src='"+point.icon+"' /><B>" +point.name+"</B>");//標題
										//多個站都能到時,後面的點會取代前面的點<==這個要想辦法
										map.travelRoute({
										  origin: [marker.lat, marker.lng],
										  destination: [point.Py,  point.Px],
										  travelMode: 'WALKING',//'driving',
										  routingPreference:'LESS_WALKING',
										  step: function(e) {
											$('#instructions').append('<li>' +e.instructions+'</li>');
											$('#instructions li:eq(' + e.step_number + ')').delay(450 * e.step_number).fadeIn(200, function() {
											  map.drawPolyline({
												path: e.path,
												strokeColor: '#131540',
												strokeOpacity: 0.6,
												strokeWeight: 6
											  })
											});
										  }
										});	
								  },
								  infoWindow: {
									content: '<p><b>'+point.name+'</b><br>'+point.tel+'<br>'+point.addr+"<br> lat:"+ point.Py+" lng:"+point.Px+'</p>'
									}
								});
						html +="<li style='color:"+ colorcode +";margin-top:4px;float:left;width:200px;'><input type='checkbox' name='"+point.id+"' id='"+point.id+"' value='"+point.id+"' checked><i class='fa "+point.type+" fw' > </i>&nbsp;<a class='setpoint' alt='"+point.Py+","+point.Px+"' >"+point.name+"</a><br>"+point.tel+
									"<br>("+point.Py+" , "+point.Px+")<br>";
							if (point.picture1!=''){
								html +=	"<img src='"+point.picture1+"' />";
							}else{								
								html +=	"<div >&nbsp;</div>";
							}
							html +="</li>";
						});
						html +='</ul></li>';
						
						$(".setpoint").click(function(){
							//alert('aa');			
						});
						//設定到位置上
						map.setCenter(marker.lat,marker.lng);
						map.setZoom(14);
					});
					html+="<ul>";
					$("#RES").append(html);
				}
				});

		});	

		
	});
	
	
