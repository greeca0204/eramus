<?php
	/*
	* 页面名称：News.php
	* 页面功能：新闻信息管理数据操作
	* 页面类别：数据层
	* 编写日期：2013.05.07
	*/
	
	r_require_once("/lib/GenericDao.php");
	class News extends GenericDao {
	    
		//获取所有文章
		function getAllNews()
		{
			$sql = "SELECT * FROM tb_news ORDER BY addtime DESC";
			return $this->executeQuery($sql);
		}
		
		//获取所有同类型文章
		function getAllTypeNews($classname) {
	    	$sql = "SELECT * FROM tb_news WHERE (type IN (SELECT id FROM tb_classes  WHERE classname = '$classname')) ORDER BY addtime DESC";
	    	return $this->executeQuery($sql);
	    }
		
		//获取某类型最新一篇文章
		function getLastNews($classname) {
			$sql = "SELECT * FROM tb_news where type in (SELECT id FROM tb_classes WHERE cid IN (SELECT id FROM tb_classes WHERE classname='$classname')) order by addtime desc limit 0,1";		
	        return $this->getOne($sql);
	    }
		
		//使用类别名获取最新N篇文章
	    function getLimNews($classname,$size) {
			$sql = "SELECT * FROM tb_news where type in (SELECT id FROM tb_classes WHERE cid IN (SELECT id FROM tb_classes WHERE classname='$classname')) order by addtime desc
			 limit 0,$size";		
	        return $this->executeQuery($sql);
	    }
	    
	    //使用类别id获取最新N篇文章
	    function getLimNewsById($type,$size){
	    	$sql = "SELECT * FROM tb_news WHERE type=$type LIMIT 0,$size";
	    	return $this->executeQuery($sql);
	    }
		
		//获取一篇文章
		function getOneNews($nid)
		{
			$sql = "SELECT * FROM tb_news WHERE nid = $nid";
			return $this->getOne($sql);			
		}
		
		//
		function getOneNewsbyName($classname)
		{
			$sql = "SELECT * FROM tb_news WHERE type in (SELECT id FROM tb_classes WHERE classname='$classname')";
			return $this->getOne($sql);
		}
		
		//分页显示所有文章
	    function getbyNews($pageNum,$pageSize,$offLimit=0) {
	    	$sql = "SELECT * FROM tb_news as A inner join tb_classes as B on A.type=B.id ORDER BY addtime desc";
	    	return $this->pagedQuery($sql,$pageNum,$pageSize);
	    }
		
		//查询记录总行数
	    function getTotalbyNews() {
	    	$sql = "SELECT COUNT(*) AS CNT FROM tb_news";
	    	$row = $this->getOne($sql);
	    	return $row?$row['CNT']:0;
	    }
	    
	    //分页显示某类所有文章
	    function getbyTNews($type,$pageNum,$pageSize,$offLimit=0) {
	    	$sql = "SELECT * FROM tb_news where type=$type ORDER BY addtime desc";
	    	return $this->pagedQuery($sql,$pageNum,$pageSize);
	    }
	    
	    //查询某类文章的记录总行数
	    function getTotalbyTNews($type) {
	    	$sql = "SELECT COUNT(*) AS CNT FROM tb_news where type=$type";
	    	$row = $this->getOne($sql);
	    	return $row?$row['CNT']:0;
	    }
		
		 //添加文章
	    function insertNews($title,$author,$addtime,$content,$type) {
			$sql="insert into tb_news(title,author,addtime,content,type) values('$title','$author','".time()."','$content',$type)";
	    	return $this->executeInsert($sql);
	    }
	    
	    //修改文章
	    function updateNews($nid,$title,$author,$content,$type) {
			$sql="update tb_news set title='$title',author='$author',content='$content',type=$type where nid=$nid";
	    	return $this->executeUpdate($sql);
	    }
	    
	    //删除文章
	    function deleteNews($nid)
	    {
	    	$sql="delete from tb_news where nid=$nid";
	    	return $this->executeDelete($sql);
	    }
		
	}
?>