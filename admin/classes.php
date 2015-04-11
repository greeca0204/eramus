<?php
	/*
	 * 页面名称：classes.php
	 * 页面功能：类别信息管理
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

	//添加类别
	function _default()
	{
		r_require_once("/smarty/MySmarty.php");
		r_require_once("/DAL/tree.class.php");
		r_require_once("/DAL/Classes.php");
		
		$tpl = new MySmarty("administrator");		
		$classes = new Classes();
		$tree = new Tree();
		
		foreach($classes->getClass() as $v){//setNode(目录ID,上级ID，目录名字);
			$tree->setNode($v['id'], $v['cid'], $v['classname']);
		}
		//print_r($tree);

		$category = $tree->getChilds();
		
		echo "<form action='classes.php?action=add' method='post'>";
		echo "<select id='cid' name='cid'>";
		echo "<option value='0'>一级分类</option>";
		foreach ($category as $key=>$id)
		{
			echo "<option value='$id'>".$tree->getLayer($id, '-').$tree->getValue($id)."</option>";
		}
		echo "</select>";
		echo "分类名称：<input type='text' id='classname' name='classname'>";
		echo "<input type='submit' name='submit' value='添加'>";
		echo "</form>";
		
		$tpl->assign("siteTitle","广州运星科技有限公司后台管理系统");
	}
	
	//删除类别
	function _delclass()
	{
		r_require_once("/smarty/MySmarty.php");
		r_require_once("/DAL/tree.class.php");
		r_require_once("/DAL/Classes.php");
		
		$tpl = new MySmarty("administrator");		
		$classes = new Classes();
		$tree = new Tree();
		
		foreach($classes->getClass() as $v){//setNode(目录ID,上级ID，目录名字);
			$tree->setNode($v['id'], $v['cid'], $v['classname']);
		}
		//print_r($tree);

		$category = $tree->getChilds();
		
		echo "<form action='classes.php?action=delete' method='post'>";
		echo "<select id='id' name='id'>";
		foreach ($category as $key=>$id)
		{
		echo "<option value='$id'>".$tree->getLayer($id, '-').$tree->getValue($id)."</option>";
		}
		echo "</select>";
		echo "<input type='submit' name='submit' value='删除'>";
		echo "</form>";
		
		$tpl->assign("siteTitle","广州运星科技有限公司后台管理系统");
	}
	
	//添加操作
	function _add()
	{		
		r_require_once("/DAL/Classes.php");
		
		$classname = getRequestStringParam('classname', '');
		$cid = getRequestIntparam('cid',0);				
		$classes = new Classes();
		
		$cc = $classes->insertClass($classname,$cid);
		
		if ($cc)
        	echo "<script>alert('操作成功！');window.location.href='classes.php';</script>";
    	else
        	echo "<script>alert('操作失败！');window.location.href='classes.php';</script>";
	}
	
	//删除操作
	function _delete()
	{
		r_include_once("/DAL/Classes.php");
		$classes = new Classes();
		$id = getRequestIntparam('id',0);
		$cc = $classes->deleteClass($id);

		if ($cc)
        	echo "<script>alert('操作成功！');window.location.href='classes.php?action=delclass';</script>";
    	else
        	echo "<script>alert('操作失败！');window.location.href='classes.php?action=delclass';</script>";
	}
?>