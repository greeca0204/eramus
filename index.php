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
		$tpl->display("index.html");
	}

?>