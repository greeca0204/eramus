<?php
	/*
	* 页面名称：Classes.php
	* 页面功能：类别信息管理数据操作
	* 页面类别：数据层
	* 编写日期：2013.05.07
	*/
	
	r_require_once("/lib/GenericDao.php");
	class Classes extends GenericDao {
	    
		//获取所有类别项
	    function getClass() {
	    	$sql="SELECT * FROM tb_classes";
	        return $this->executeQuery($sql);
	    }
	    
	    //按类别名获取类别信息
	    function getClassInfo($classname){
	    	$sql = "SELECT * FROM tb_classes where cid IN (SELECT id FROM tb_classes where classname = '$classname')";
	    	return $this->executeQuery($sql);
	    }
		
		//使用类别项获取所有相关新闻信息
	    function getDelByClassName($classname) {
	    	//$sql="SELECT * FROM tb_news where type in (SELECT id FROM tb_classes where cid in (SELECT id FROM tb_classes where classname='$classname'))";
			$sql="SELECT news.nid,news.type,classes.id,classes.classname FROM tb_news AS news INNER JOIN tb_classes AS classes ON news.type=classes.id where classes.cid IN (SELECT classes.id FROM tb_classes AS classes WHERE classes.classname='$classname')";
	        return $this->executeQuery($sql);
	    }
		
		//查找某类别项的子类别
		function getClassByName($classname){
			$sql="SELECT id,classname FROM tb_classes WHERE tb_classes.cid IN (SELECT id FROM tb_classes WHERE classname='$classname')";
	        return $this->executeQuery($sql);
		}
		
		//添加新类别
		function insertClass($classname,$cid){		
			//$classname = iconv("utf-8","gb2312",$classname);
	    	$sql="insert into tb_classes(classname,cid) values('$classname',$cid)";
	    	return $this->executeInsert($sql);
		}
		
		//删除类别
	    function deleteClass($id)
	    {
	    	$sql="delete from tb_classes where id=$id";
	    	return $this->executeDelete($sql);
	    }
	}
?>