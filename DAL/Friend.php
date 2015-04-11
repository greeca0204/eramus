<?php
	/*
	* 页面名称：Friend.php
	* 页面功能：友情链接信息管理数据操作
	* 页面类别：数据层
	* 编写日期：2013.05.07
	*/
	
	r_require_once("/lib/GenericDao.php");
	class Friend extends GenericDao {
	    
		//获取所有友情链接信息
	    function getAllFriend() {
	    	$sql="SELECT * FROM tb_friends";
	        return $this->executeQuery($sql);
	    }
	    
	    //分页显示友情链接信息
	    function getbyFriend($pageNum,$pageSize,$offLimit=0) {
	    	$sql = "SELECT * FROM tb_friends ORDER BY id";
	    	return $this->pagedQuery($sql,$pageNum,$pageSize);
	    }
	    
	    //查询记录总行数
	    function getTotalbyFriend() {
	    	$sql = "SELECT COUNT(*) AS CNT FROM tb_friends";
	    	$row = $this->getOne($sql);
	    	return $row?$row['CNT']:0;
	    }
	    
	    //获取单条友情链接信息
	    function getFriendbyId($id) {
	    	$sql="SELECT * FROM tb_friends where id=$id";
	    	return $this->getOne($sql);
	    }
	    
	    //添加友情链接信息
	    function insertFriend($friends,$url,$logo) {
	    	//$friends = iconv("utf-8","gb2312",$friends);
			$sql="insert into tb_friends(friends,url,logo) values('$friends','$url','$logo')";
	    	return $this->executeInsert($sql);
	    }
	    
	    //修改友情链接信息
	    function updateFriend($id,$friends,$url,$logo) {
			//$friends = iconv("utf-8","gb2312",$friends);
			$sql="update tb_friends set friends='$friends',url='$url',logo='$logo' where id=$id";
	    	return $this->executeUpdate($sql);
	    }
	    
	    //删除友情链接信息
	    function deleteFriend($id)
	    {
	    	$sql="delete from tb_friends where id=$id";
	    	return $this->executeDelete($sql);
	    }
	}
?>