<?php
	/*
	 * page name:index.php
	 * author:Ryan Luo
	 * page function:this is the frist page action in the eramus website
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
		r_require_once("/DAL/Announcement.php");
		
		$tpl = new MySmarty();
		$announce = new Announcement();
			
		$tpl->assign("siteTitle","意拉慕斯");	
		$tpl->assign("announce",$announce->getFirstAnnounce());
		
		$browser = getBrowser(); //recognize the browser
		
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
			echo "<script>location.href='index.php';</script>";
		}
		else{
			if($intScreenX==1920&&$intScreenY==1080){	
				if($browser=='Firefox'||$browser=='Chrome'||$browser=='Safari'||$browser=='Opera'||$browser='IE11')
					$tpl->display("index_bigScreen.html");
				else
					//$tpl->display("index_bigScreen_IE.html");
					echo "您的浏览器版本过低，请更换其他浏览器观看！";
			}		
			else{				
				if($browser=='Firefox'||$browser=='Chrome'||$browser=='Safari'||$browser=='Opera'||$browser='IE11')
					$tpl->display("index.html");
				else
					//$tpl->display("index_IE.html");
					echo "您的浏览器版本过低，请更换其他浏览器观看！";
			}
		}
	}
	
	//case page
	function _case()
	{
		date_default_timezone_set('Asia/Shanghai');
		r_require_once("/smarty/MySmarty.php");	
		$tpl = new MySmarty();
		$tpl->assign("siteTitle","意拉慕斯");	
		$tpl->display("case.html");
	}
	
	//business page
	function _business()
	{
		date_default_timezone_set('Asia/Shanghai');
		r_require_once("/smarty/MySmarty.php");	
		$tpl = new MySmarty();
		$tpl->assign("siteTitle","意拉慕斯");	
		$tpl->display("business.html");
	}
	
	//contract us page
	function _contract()
	{
		date_default_timezone_set('Asia/Shanghai');
		r_require_once("/smarty/MySmarty.php");	
		$tpl = new MySmarty();
		$tpl->assign("siteTitle","意拉慕斯");	
		$tpl->display("contract.html");
	}

	//browser recognize
	function getBrowser(){
		if(empty($_SERVER['HTTP_USER_AGENT'])){
			return 'Fail';
		}
		if(false!==strpos($_SERVER['HTTP_USER_AGENT'],'MSIE 11.0')){
			return 'IE11';
		}
		if(false!==strpos($_SERVER['HTTP_USER_AGENT'],'MSIE 10.0')){
			return 'IE10';
		}
		if(false!==strpos($_SERVER['HTTP_USER_AGENT'],'MSIE 9.0')){
			return 'IE9';
		}
		if(false!==strpos($_SERVER['HTTP_USER_AGENT'],'MSIE 8.0')){
			return 'IE8';
		}
		if(false!==strpos($_SERVER['HTTP_USER_AGENT'],'MSIE 7.0')){
			return 'IE7';
		}
		if(false!==strpos($_SERVER['HTTP_USER_AGENT'],'MSIE 6.0')){
			return 'IE6';
		}
		if(false!==strpos($_SERVER['HTTP_USER_AGENT'],'Firefox')){
			return 'Firefox';
		}
		if(false!==strpos($_SERVER['HTTP_USER_AGENT'],'Chrome')){
			return 'Chrome';
		}
		if(false!==strpos($_SERVER['HTTP_USER_AGENT'],'Safari')){
			return 'Safari';
		}
		if(false!==strpos($_SERVER['HTTP_USER_AGENT'],'Opera')){
			return 'Opera';
		}
		if(false!==strpos($_SERVER['HTTP_USER_AGENT'],'360SE')){
			return '360SE';
		}
	}

	
?>
