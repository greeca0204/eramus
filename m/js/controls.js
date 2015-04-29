// JavaScript Document
	//html root的字体计算应该放在最前面，这样计算就不会有误差了/
	var _htmlFontSize = (function(){
		var clientWidth = document.documentElement ? document.documentElement.clientWidth : document.body.clientWidth;
		if(clientWidth > 640) clientWidth = 640;
		document.documentElement.style.fontSize = clientWidth * 1/16+"px";
		return clientWidth * 1/16;
	})();  

		$(document).ready(function(){
			$(".cycle").mouseover(function(){
  				$(".subnav").css("display","block");
			});
  	
			$(".cycle").mouseout(function(){
				$(".subnav").css("display","none");
			});
			
			$(".subnav").mouseover(function(){
				$(".subnav").css("display","block");
			});
			
			$(".subnav").mouseout(function(){
				$(".subnav").css("display","none");
			});
		});