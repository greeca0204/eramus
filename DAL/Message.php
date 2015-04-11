<?php
	/*
	 * page name:Case.php
	 * author:Ryan Luo
	 * page function:slove the case data in eramus website
	 * page type:data layer
	 * code date:2015.04.03
	 * modify date:2015.04.03
	 */
	
	r_require_once("/lib/GenericDao.php");
	
	class Message extends GenericDao {
	
		//fetch all message from the tbl_msg table
	    function getAllMsg() {
	    	$sql="SELECT * FROM tbl_msg";
	        return $this->executeQuery($sql);
	    }
	    
	    //fetch all message by some page from the tbl_msg table
	    function getMsgByPage($pageNum,$pageSize,$offLimit=0) {
	    	$sql = "SELECT * FROM tbl_msg ORDER BY mid desc";
	    	return $this->pagedQuery($sql,$pageNum,$pageSize);
	    }
	    
	    //fetch one record from the tbl_msg table by cid
	    function getOnebyMsg($mid) {
	    	$sql = "SELECT * FROM tbl_msg where mid=$mid";
	    	return $this->getOne($sql);
	    }

	    //fetch the record row from the tbl_msg table
	    function getTotalbyMsg() {
	    	$sql = "SELECT COUNT(*) AS CNT FROM tbl_msg";
	    	$row = $this->getOne($sql);
	    	return $row?$row['CNT']:0;
	    }
	    
	    //insert the message information into the tbl_msg table
	    function insertMsg($title,$content,$tel,$qq) {
	    	$sql="insert into tbl_msg(title,ccontent,tel,qq) values('$title','$ccontent','$tel','$qq')";
	    	return $this->executeInsert($sql);
	    }
	    
	    //modify the message information from the tbl_msg table by mid
	    function updateMsg($mid,$title,$content,$tel,$qq) {
			$sql="update tbl_msg set title='$title',content='$content',tel='$tel',qq='$qq' where mid=$mid";
	    	return $this->executeUpdate($sql);
	    }
		
	    //delete the message information from the tbl_msg table by mid
	    function deleteMsg($mid)
	    {
	    	$sql="delete from tbl_msg where mid=$mid";
	    	return $this->executeDelete($sql);
	    }
	}
?>