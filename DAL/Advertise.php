<?php
	/*
	* 页面名称：Advertise.php
	* 页面功能：广告信息管理数据操作
	* 页面类别：数据层
	* 编写日期：2013.05.07
	*/
	
	r_require_once("/lib/GenericDao.php");
	class Advertise extends GenericDao {
	    
		//获取所有广告信息
	    function getAllAdvertise() {
	    	$sql="SELECT * FROM tb_advertise";
	        return $this->executeQuery($sql);
	    }

	    //获取需要显示的广告信息
	    function getDisAdvertise() {
	    	$sql="SELECT * FROM tb_advertise where checked=1";
	        return $this->executeQuery($sql);
	    }
	    
	    //分页显示广告信息
	    function getbyAdvertise($pageNum,$pageSize,$offLimit=0) {
	    	$sql = "SELECT * FROM tb_advertise ORDER BY id";
	    	return $this->pagedQuery($sql,$pageNum,$pageSize);
	    }
	    
	    //查询记录总行数
	    function getTotalbyAdvertise() {
	    	$sql = "SELECT COUNT(*) AS CNT FROM tb_advertise";
	    	$row = $this->getOne($sql);
	    	return $row?$row['CNT']:0;
	    }
	    
	    //获取单条广告信息
	    function getAdvertisebyId($id) {
	    	$sql="SELECT * FROM tb_advertise where id=$id";
	    	return $this->getOne($sql);
	    }
	    
	    //添加广告信息
	    function insertAdvertise($title,$imgurl,$contenturl,$checked) {
			$sql="insert into tb_advertise(title,imgurl,contenturl,checked) values('$title','$imgurl','$contenturl',$checked)";
	    	return $this->executeInsert($sql);
	    }
	    
	    //修改广告信息
	    function updateAdvertise($id,$title,$imgurl,$contenturl,$checked) {
			$sql="update tb_advertise set title='$title',imgurl='$imgurl',contenturl='$contenturl',checked=$checked where id=$id";
	    	return $this->executeUpdate($sql);
	    }
	    
	    //删除广告信息
	    function deleteAdvertise($id)
	    {
	    	$sql="delete from tb_advertise where id=$id";
	    	return $this->executeDelete($sql);
	    }
	}
?>