<?php
	/*
	 * 页面名称：advertise.php
	 * 页面功能：广告信息管理
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
		r_require_once("/DAL/Advertise.php");
		
		$tpl = new MySmarty("admin");		
		$advertise = new Advertise();
		
		$tpl->assign("siteTitle","意拉慕斯后台管理系统");
		
		$pageNum = getRequestIntParam('page_num', 1);
		$pageSize = 15;
		$totalRecords = $advertise->getTotalbyAdvertise();
		$totalPages = intval($totalRecords / $pageSize);
		$totalPages += ($totalRecords % $pageSize == 0 ? 0 : 1);
		if($pageNum > $totalPages) $pageNum = $totalPages;
		if($totalRecords>0)
			$tpl->assign('advertise', $advertise->getbyAdvertise($pageNum,$pageSize,0));
		
		$tpl->assign('paggingbar', genPaggingbar('advertise.php',$pageNum,$totalPages));
		$tpl->display("showAdvertise.html");
	}
	
	//添加、修改广告页面
	function _new() {
		r_include_once("/smarty/MySmarty.php");
		r_require_once("/DAL/Advertise.php");

		$id = getRequestIntParam('id', 0);
		$title = getRequestStringParam('title', '');
		$imgurl = getRequestStringParam('imgurl', '');
		$hasimg = getRequestStringParam('hasimg', '');
		$contenturl = getRequestStringParam('contenturl', '');
		$checked = getRequestIntParam('checked',0);
		
		
		$tpl = new MySmarty('admin');
		$advertise = new Advertise();
		
		$tpl->assign("siteTitle","意拉慕斯后台管理系统");		
		$tpl->assign("advertise",$advertise->getAdvertisebyId($id));
		$tpl->display("editAdvertise.html");
	}
	
	//添加、修改广告操作
	function _save() {
		r_require_once("/DAL/Advertise.php");
		
		$id = getRequestIntParam('id', 0);
		$title = getRequestStringParam('title', '');
		$imgurl = getRequestStringParam('imgurl', '');
		$hasimg = getRequestStringParam('hasimg', '');
		$contenturl = getRequestStringParam('contenturl', '');
		$checked = getRequestIntParam('checked',0);
				
		$advertise = new Advertise();
		
		$newimg = substr(uploadImages('imgurl'),1);

		if ($id == 0) {
			$cc = $advertise->insertAdvertise($title,$newimg,$contenturl,$checked);
		} else {
			
			if($newimg=="")
				$imgurl=$hasimg;
			else
				$imgurl=$newimg;

			$cc = $advertise->updateAdvertise($id,$title,$imgurl,$contenturl,$checked);
		} 
		
		if ($cc)
        	echo "<script>alert('操作成功！');window.location.href='advertise.php';</script>";
    	else
        	echo "<script>alert('操作失败！');window.location.href='advertise.php';</script>";
	}
	
	//删除广告操作
	function _delete() {
		r_include_once("/DAL/Advertise.php");
		$advertise = new Advertise();
		$chk1=$_POST['chk1'];
		if ($chk1!="" or count($chk1)!=0) {
			for ($i=0;$i<count($chk1);$i++){
				$cc = $advertise->deleteAdvertise($chk1[$i]);
			}
			echo "<script>alert('操作成功！');window.location.href='advertise.php';</script>";
		}
		else
			echo "<script>alert('操作失败！');window.location.href='advertise.php';</script>";
	}
?>