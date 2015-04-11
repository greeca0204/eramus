<?php
	/*
	 * 页面名称：friend.php
	 * 页面功能：友情链接信息管理
	 * 页面类别：业务层
	 * 编写日期：2013.04.07
	 */

	session_start();
	echo "<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />";
	
	if($_SESSION['username'] == null)
	{
		echo "<script>alert('请先登录！');location.href='index.php';</script>";
	}

	include("../global.inc.php");
	r_require_once("/lib/MultiActions.php");	

	//默认情况时
	function _default()
	{
		r_require_once("/smarty/MySmarty.php");
		r_include_once("/DAL/public/paggingbar.php");
		r_require_once("/DAL/Friend.php");
		
		$tpl = new MySmarty("admin");		
		$friend = new Friend();
		
		$tpl->assign("siteTitle","意拉慕斯后台管理系统");
		
		$pageNum = getRequestIntParam('page_num', 1);
		$pageSize = 15;
		$totalRecords = $friend->getTotalbyFriend();
		$totalPages = intval($totalRecords / $pageSize);
		$totalPages += ($totalRecords % $pageSize == 0 ? 0 : 1);
		if($pageNum > $totalPages) $pageNum = $totalPages;
		if($totalRecords>0)
			$tpl->assign('friend', $friend->getbyFriend($pageNum,$pageSize,0));
		
		$tpl->assign('paggingbar', genPaggingbar('friend.php',$pageNum,$totalPages));
		$tpl->display("showFriend.html");
	}
	
	//添加、修改友情链接页面
	function _new() {
		r_include_once("/smarty/MySmarty.php");
		r_require_once("/DAL/Friend.php");

		$id = getRequestIntParam('id', 0);
		$friends = getRequestStringParam('friends', '');
		$url = getRequestStringParam('url', '');
		$logo = getRequestStringParam('logo', '');
		$hasimg = getRequestStringParam('hasimg', '');
		
		$tpl = new MySmarty('admin');
		$friend = new Friend();
		
		$tpl->assign("siteTitle","意拉慕斯后台管理系统");		
		$tpl->assign("friend",$friend->getFriendbyId($id));
		$tpl->display("editFriend.html");
	}
	
	//添加、修改友情链接操作
	function _save() {
		r_require_once("/DAL/Friend.php");
		
		$id = getRequestIntParam('id', 0);
		$friends = getRequestStringParam('friends', '');
		$url = getRequestStringParam('url', '');
		$logo = getRequestStringParam('logo', '');
		$hasimg = getRequestStringParam('hasimg', '');
				
		$friend = new Friend();
		
		$newimg = substr(uploadImages('logo'),1);

		if ($id == 0) {
			$cc = $friend->insertFriend($friends,$url,$newimg);
		} else {
			if($newimg=="")
				$imgurl=$hasimg;
			else
				$imgurl=$newimg;
			
			$cc = $friend->updateFriend($id,$friends,$url,$imgurl);
		} 
		
		if ($cc)
        	echo "<script>alert('操作成功！');window.location.href='friend.php';</script>";
    	else
        	echo "<script>alert('操作失败！');window.location.href='friend.php';</script>";
	}
	
	//删除友情链接操作
	function _delete() {
		r_include_once("/DAL/Friend.php");
		$friend = new Friend();
		$chk1=$_POST['chk1'];
		if ($chk1!="" or count($chk1)!=0) {
			for ($i=0;$i<count($chk1);$i++){
				$cc = $friend->deleteFriend($chk1[$i]);
			}
			echo "<script>alert('操作成功！');window.location.href='friend.php';</script>";
		}
		else
			echo "<script>alert('操作失败！');window.location.href='friend.php';</script>";
	}
?>