<?php
	/*
	 * 页面名称：webInfo.php
	 * 页面功能：联系我们信息管理
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
		r_include_once("/smarty/MySmarty.php");
		r_require_once("/DAL/WebInfo.php");		
		
		$id = getRequestIntparam('id',0);
		$website = getRequestStringParam('website', '');
		$comname = getRequestStringParam('comname', '');
		$keyword = getRequestStringParam('keyword', '');
		$description = getRequestStringParam('description', '');
		$negotiator = getRequestStringParam('negotiator', '');
		$address = getRequestStringParam('address', '');
		$postcode = getRequestStringParam('postcode', '');
		$tel = getRequestStringParam('tel', '');
		$tel2 = getRequestStringParam('tel2', '');
		$tel3 = getRequestStringParam('tel3', '');
		$tel4 = getRequestStringParam('tel4', '');
		$fax = getRequestStringParam('fax', '');
		$email = getRequestStringParam('email', '');
		$copyright = getRequestStringParam('copyright', '');
				
		$tpl = new MySmarty('admin');
		$webInfo = new WebInfo();
		
		$tpl->assign("siteTitle","意拉慕斯后台管理系统");
		$tpl->assign("webInfo",$webInfo->getWeb());
		$tpl->display("editWebInfo.html");
	}
	
	//修改公司基本信息操作
	function _save() {
		r_require_once("/DAL/WebInfo.php");		
		
		$id = getRequestIntparam('id',0);
		$website = getRequestStringParam('website', '');
		$comname = getRequestStringParam('comname', '');
		$keyword = getRequestStringParam('keyword', '');
		$description = getRequestStringParam('description', '');
		$negotiator = getRequestStringParam('negotiator', '');
		$address = getRequestStringParam('address', '');
		$postcode = getRequestStringParam('postcode', '');
		$tel = getRequestStringParam('tel', '');
		$tel2 = getRequestStringParam('tel2', '');
		$tel3 = getRequestStringParam('tel3', '');
		$tel4 = getRequestStringParam('tel4', '');
		$fax = getRequestStringParam('fax', '');
		$email = getRequestStringParam('email', '');
		$copyright = getRequestStringParam('copyright', '');
		
		$webInfo = new WebInfo();
		
		$cc = $webInfo->updateWeb($id,$website,$comname,$keyword,$description,$negotiator,$address,$postcode,$tel,$tel2,$tel3,$tel4,$fax,$email,$copyright);		
		if ($cc)
        	echo "<script>alert('操作成功！');window.location.href='webInfo.php';</script>";
    	else
        	echo "<script>alert('操作失败！');window.location.href='webInfo.php';</script>";
	}
?>