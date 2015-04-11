<?php
	/*
	 * page name:Announcement.php
	 * author:Ryan Luo
	 * page function:slove the announcent data in eramus website
	 * page type:data layer
	 * code date:2015.03.31
	 * modify date:2015.03.31
	 */
	
	r_require_once("/lib/GenericDao.php");
	
	class Announcement extends GenericDao {
	
		//fetch all announcement from the tbl_announcement table
	    function getAllAnnounce() {
	    	$sql="SELECT * FROM tbl_announcement";
	        return $this->executeQuery($sql);
	    }
	    
	    //fetch all announcement by some page from the tbl_announcement table
	    function getAnnounceByPage($pageNum,$pageSize,$offLimit=0) {
	    	$sql = "SELECT * FROM tbl_announcement ORDER BY aid";
	    	return $this->pagedQuery($sql,$pageNum,$pageSize);
	    }
	    
	    //fetch one record from the tbl_announcement table by aid
	    function getOnebyAnnounce($aid) {
	    	$sql = "SELECT * FROM tbl_announcement where aid=$aid";
	    	return $this->getOne($sql);
	    }

	    //fetch the record row from the tbl_announcement table
	    function getTotalbyAnnounce() {
	    	$sql = "SELECT COUNT(*) AS CNT FROM tbl_announcement";
	    	$row = $this->getOne($sql);
	    	return $row?$row['CNT']:0;
	    }
	    
	    //insert the announce information into the tbl_announcement table
	    function insertAnnounce($title,$acontent) {
	    	$sql="insert into tbl_announcement(title,acontent) values('$title','$acontent')";
	    	return $this->executeInsert($sql);
	    }
	    
	    //modify the announce information from the tbl_announcement table by aid
	    function updateAnnounce($aid,$title,$acontent) {
			$sql="update tbl_announcement set title='$title',acontent='$acontent' where aid=$aid";
	    	return $this->executeUpdate($sql);
	    }
		
	    //delete the announce information from the tbl_announcement table by aid
	    function deleteAnnounce($aid)
	    {
	    	$sql="delete from tbl_announcement where aid=$aid";
	    	return $this->executeDelete($sql);
	    }
		
		//fetch the first announce information from the tbl_announcement table
		function getFirstAnnounce() {
	    	$sql="SELECT * FROM tbl_announcement limit 0,1";
	        return $this->getOne($sql);
	    }


	}
?>