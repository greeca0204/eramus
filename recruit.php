<?php
	/*
	 * page name:recruit.php
	 * author:Ryan Luo
	 * page function:this is the recruit information page action in the eramus website
	 * page type:business layer
	 * code date:2015.03.30
	 * modify date:2015.03.30
	 */
	
	header('Content-Type: text/html; charset=UTF-8');
	include("global.inc.php");
	r_require_once("/lib/MultiActions.php");

	//website index	
	function _default()
	{
		date_default_timezone_set('Asia/Shanghai');
		r_require_once("/smarty/MySmarty.php");
		
		$tpl = new MySmarty();			
		$tpl->assign("siteTitle","意拉慕斯");
		
		//fetch the browser’s screen size to the cookie
		echo "<script> var width = window.screen.width; document.cookie='screenX='+width;
			var height = window.screen.height; document.cookie='screenY='+height;</script>";
		$screenX = @$_COOKIE['screenX']; 
		$intScreenX = intval($screenX);
		$screenY = @$_COOKIE['screenY'];
		$intScreenY = intval($screenY);
		
		//create the template in different browser and different screen size
		if($intScreenX==""||$intScreenY==""){
			//at the first time,some browser can not fetch the cookie,so we must refresh the browser
			echo "<script>location.href='recruit.php';</script>";
		}
		else{
			if($intScreenX==1920&&$intScreenY==1080){	
				$tpl->display("job_bigScreen.html");
			}		
			else{				
				$tpl->display("job.html");
			}
		}
	}	
?>
