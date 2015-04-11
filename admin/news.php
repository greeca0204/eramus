<?php
	/*
	 * 页面名称：news.php
	 * 页面功能：文章信息管理
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
		r_require_once("/DAL/News.php");
		
		$tpl = new MySmarty("admin");		
		$news = new News();
		
		$tpl->assign("siteTitle","意拉慕斯后台管理系统");
		
		$pageNum = getRequestIntParam('page_num', 1);
		$pageSize = 15;
		$totalRecords = $news->getTotalbyNews();
		$totalPages = intval($totalRecords / $pageSize);
		$totalPages += ($totalRecords % $pageSize == 0 ? 0 : 1);
		if($pageNum > $totalPages) $pageNum = $totalPages;
		if($totalRecords>0)
			$tpl->assign('news', $news->getbyNews($pageNum,$pageSize,0));
		
		$tpl->assign('paggingbar', genPaggingbar('news.php',$pageNum,$totalPages));
		$tpl->display("showNews.html");
	}
	
	//添加、修改文章页面
	function _new() {
		r_include_once("/smarty/MySmarty.php");
		r_require_once("/DAL/News.php");
		r_require_once("/DAL/Classes.php");

		$nid = getRequestIntParam('nid', 0);
		$title = getRequestStringParam('title', '');
		$author = getRequestStringParam('author', '');
		$addtime = getRequestStringParam('addtime', '');
		$content = getRequestStringParam('content1','');
		$type = getRequestIntParam('type',0);
		
		if (!empty($_POST['content1'])) {
			if (get_magic_quotes_gpc()) {
				$content = stripslashes($_POST['content1']);
			} else {
				$content = $_POST['content1'];
			}
		}		
		
		$tpl = new MySmarty('admin');
		$news = new news();
		$classes = new Classes();
		
		$tpl->assign("siteTitle","意拉慕斯后台管理系统");		
		$tpl->assign("news",$news->getOneNews($nid));
		$tpl->assign("classes",$classes->getClass());
		$tpl->display("editNews.html");
	}
	
	//添加、修改文章操作
	function _save() {
		r_require_once("/DAL/News.php");
		
		$nid = getRequestIntParam('nid', 0);
		$title = getRequestStringParam('title', '');
		$author = getRequestStringParam('author', '');
		$addtime = getRequestStringParam('addtime', '');
		$content = getRequestStringParam('content1','');
		$type = getRequestIntParam('type',0);		
		
		if (!empty($_POST['content1'])) {
			if (get_magic_quotes_gpc()) {
				$content = stripslashes($_POST['content1']);
			} else {
				$content = $_POST['content1'];
			}
		}
				
		$news = new News();
		
		if ($nid == 0) {
			$cc = $news->insertNews($title,$author,$addtime,$content,$type);
		} else {
			$cc = $news->updateNews($nid,$title,$author,$content,$type);
		} 
		
		if ($cc)
        	echo "<script>alert('操作成功！');window.location.href='news.php';</script>";
    	else
        	echo "<script>alert('操作失败！');window.location.href='news.php';</script>";
	}
	
	//删除文章操作
	function _delete() {
		r_include_once("/DAL/News.php");
		$news = new News();
		$chk1=$_POST['chk1'];
		if ($chk1!="" or count($chk1)!=0) {
			for ($i=0;$i<count($chk1);$i++){
				$cc = $news->deleteNews($chk1[$i]);
			}
			echo "<script>alert('操作成功！');window.location.href='news.php';</script>";
		}
		else
			echo "<script>alert('操作失败！');window.location.href='news.php';</script>";
	}
?>