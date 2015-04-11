<?php
	/*
	 * page name:case.php
	 * author:Ryan Luo
	 * page function:slove the success case business logic in eramus website
	 * page type:business layer
	 * code date:2015.04.3
	 * modify date:2015.04.3
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
		r_require_once("/DAL/Cases.php");
		
		$tid = getRequestIntParam('tid', 0);
		$tpl = new MySmarty("admin");		
		$cases = new Cases();
		
		$tpl->assign("siteTitle","意拉慕斯后台管理系统");
		$pageNum = getRequestIntParam('page_num', 1);
		$pageSize = 15;
		$totalRecords = $cases->getTotalbyCase($tid);
		$totalPages = intval($totalRecords / $pageSize);
		$totalPages += ($totalRecords % $pageSize == 0 ? 0 : 1);
		if($pageNum > $totalPages) $pageNum = $totalPages;
		if($totalRecords>0)
			$tpl->assign('cases', $cases->getCaseByPage($tid,$pageNum,$pageSize,0));
		
		$tpl->assign('paggingbar', genPaggingbar('cases.php',$pageNum,$totalPages));
		$tpl->display("showCase.html");
	}

	function _new() {
		date_default_timezone_set('Asia/Shanghai');
		r_include_once("/smarty/MySmarty.php");
		r_require_once("/DAL/Cases.php");

		$cid = getRequestIntParam('cid', 0);
		$title = getRequestStringParam('title', '');
		$ccontent="";

		if (!empty($_POST['content1'])) {
			if (get_magic_quotes_gpc()) {
				$ccontent = stripslashes($_POST['content1']);
			} else {
				$ccontent = $_POST['content1'];
			}
		}
		$tid = getRequestIntParam('tid',0);

		$tpl = new MySmarty("admin");
		$cases = new Cases();
		
		$tpl->assign("siteTitle","意拉慕斯后台管理系统");		
		$tpl->assign("cases",$cases->getOnebyCase($cid));
		$tpl->display("editCase.html");
	}
	
	function _save() {
		date_default_timezone_set('Asia/Shanghai');
		r_require_once("/DAL/Cases.php");
		
		$cid = getRequestIntParam('cid', 0);
		$title = getRequestStringParam('title', '');
		$ccontent="";
		
		if (!empty($_POST['content1'])) {
			if (get_magic_quotes_gpc()) {
				$ccontent = stripslashes($_POST['content1']);
			} else {
				$ccontent = $_POST['content1'];
			}
		}

		$tid = getRequestIntParam('tid',0);		
		$cases = new Cases();
		
		if ($cid == 0) {
			$cc = $cases->insertCase($title,$ccontent,$tid);
		} else {
			$cc = $cases->updateCase($cid,$title,$ccontent,$tid);
		}
		
		if ($cc)
        	echo "<script>alert('操作成功！');window.location.href='cases.php?tid=".$tid."';</script>";
    	else
        	echo "<script>alert('操作失败！');window.location.href='cases.php?tid=".$tid."';</script>";
        
	}
	
	function _delete() {
		r_include_once("/DAL/Cases.php");
		$cases = new Cases();
		$chk1=$_POST['chk1'];
		if ($chk1!="" or count($chk1)!=0) {
			for ($i=0;$i<count($chk1);$i++){
				$cc = $cases->deleteCase($chk1[$i]);
			}
			echo "<script>alert('操作成功！');window.location.href='cases.php';</script>";
		}
		else
			echo "<script>alert('操作失败！');window.location.href='cases.php';</script>";
	}
?>