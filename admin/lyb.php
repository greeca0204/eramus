<?php
	/*
	 * page name:lyb.php
	 * author:Ryan Luo
	 * page function:slove the message business logic in eramus website
	 * page type:business layer
	 * code date:2015.04.03
	 * modify date:2015.04.03
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
		r_require_once("/DAL/Message.php");
		
		$tid = getRequestIntParam('tid', 0);
		$tpl = new MySmarty("admin");		
		$msg = new Message();
		
		$tpl->assign("siteTitle","意拉慕斯后台管理系统");
		$pageNum = getRequestIntParam('page_num', 1);
		$pageSize = 15;
		$totalRecords = $msg->getTotalbyMsg();
		$totalPages = intval($totalRecords / $pageSize);
		$totalPages += ($totalRecords % $pageSize == 0 ? 0 : 1);
		if($pageNum > $totalPages) $pageNum = $totalPages;
		if($totalRecords>0)
			$tpl->assign('msg', $msg->getMsgByPage($pageNum,$pageSize,0));
		
		$tpl->assign('paggingbar', genPaggingbar('lyb.php',$pageNum,$totalPages));
		$tpl->display("showMsg.html");
	}
	
	function _delete() {
		r_include_once("/DAL/Message.php");
		$msg = new Message();
		$chk1=$_POST['chk1'];
		if ($chk1!="" or count($chk1)!=0) {
			for ($i=0;$i<count($chk1);$i++){
				$cc = $msg->deleteMsg($chk1[$i]);
			}
			echo "<script>alert('操作成功！');window.location.href='lyb.php';</script>";
		}
		else
			echo "<script>alert('操作失败！');window.location.href='lyb.php';</script>";
	}
?>