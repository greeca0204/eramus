<?php
	/*
	 * page name:announcement.php
	 * author:Ryan Luo
	 * page function:slove the announcent business logic in eramus website
	 * page type:business layer
	 * code date:2015.03.31
	 * modify date:2015.03.31
	 */
	session_start();
	echo "<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />";
	
	if($_SESSION['username'] == null)
	{
		echo "<script>alert('请先登录！');location.href='index.php';</script>";
	}

	require_once("../global.inc.php");
	r_require_once("/lib/MultiActions.php");	

	function _default()
	{
		date_default_timezone_set('Asia/Shanghai');
		r_require_once("/smarty/MySmarty.php");
		r_include_once("/DAL/public/paggingbar.php");
		r_require_once("/DAL/Announcement.php");
		
		$tpl = new MySmarty("admin");		
		$announce = new Announcement();
		
		$tpl->assign("siteTitle","意拉慕斯后台管理系统");
		$pageNum = getRequestIntParam('page_num', 1);
		$pageSize = 15;
		$totalRecords = $announce->getTotalbyAnnounce();
		$totalPages = intval($totalRecords / $pageSize);
		$totalPages += ($totalRecords % $pageSize == 0 ? 0 : 1);
		if($pageNum > $totalPages) $pageNum = $totalPages;
		if($totalRecords>0)
			$tpl->assign('announce', $announce->getAnnounceByPage($pageNum,$pageSize,0));
		
		$tpl->assign('paggingbar', genPaggingbar('announcement.php',$pageNum,$totalPages));
		$tpl->display("showAnnounce.html");
	}
	
	function _new() {
		date_default_timezone_set('Asia/Shanghai');
		r_include_once("/smarty/MySmarty.php");
		r_require_once("/DAL/Announcement.php");

		$aid = getRequestIntParam('aid', 0);
		$title = getRequestStringParam('title', '');
		$acontent="";
		
		if (!empty($_POST['content1'])) {
			if (get_magic_quotes_gpc()) {
				$acontent = stripslashes($_POST['content1']);
			} else {
				$acontent = $_POST['content1'];
			}
		}
		
		$tpl = new MySmarty("admin");
		$announce = new Announcement();
		
		$tpl->assign("siteTitle","意拉慕斯后台管理系统");		
		$tpl->assign("announce",$announce->getOnebyAnnounce($aid));
		$tpl->display("editAnnounce.html");
	}
	
	function _save() {
		date_default_timezone_set('Asia/Shanghai');
		r_require_once("/DAL/Announcement.php");
		
		$aid = getRequestIntParam('aid', 0);
		$title = getRequestStringParam('title', '');
		$acontent="";

		if (!empty($_POST['content1'])) {
			if (get_magic_quotes_gpc()) {
				$acontent = stripslashes($_POST['content1']);
			} else {
				$acontent = $_POST['content1'];
			}
		}
		
		$announce = new Announcement();
		
		if ($aid == 0) {
			$cc = $announce->insertAnnounce($title,$acontent);
		} else {
			$cc = $announce->updateAnnounce($aid,$title,$acontent);
		}
		
		if ($cc)
        	echo "<script>alert('操作成功！');window.location.href='announcement.php';</script>";
    	else
        	echo "<script>alert('操作失败！');window.location.href='announcement.php';</script>";
	}
	
	function _delete() {
		r_include_once("/DAL/Announcement.php");
		$announce = new Announcement();
		$chk1=$_POST['chk1'];
		if ($chk1!="" or count($chk1)!=0) {
			for ($i=0;$i<count($chk1);$i++){
				$cc = $announce->deleteAnnounce($chk1[$i]);
			}
			echo "<script>alert('操作成功！');window.location.href='announcement.php';</script>";
		}
		else
			echo "<script>alert('操作失败！');window.location.href='announcement.php';</script>";
	}
?>