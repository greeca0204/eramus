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
	
	class Cases extends GenericDao {
	
		//fetch all case from the tbl_case table
	    function getAllCase() {
	    	$sql="SELECT * FROM tbl_case";
	        return $this->executeQuery($sql);
	    }
	    
	    //fetch all case by some page from the tbl_case table
	    function getCaseByPage($tid,$pageNum,$pageSize,$offLimit=0) {
	    	$sql = "SELECT * FROM tbl_case where tid=$tid ORDER BY cid desc";
	    	return $this->pagedQuery($sql,$pageNum,$pageSize);
	    }
	    
	    //fetch one record from the tbl_case table by cid
	    function getOnebyCase($cid) {
	    	$sql = "SELECT * FROM tbl_case where cid=$cid";
	    	return $this->getOne($sql);
	    }

	    //fetch the record row from the tbl_case table
	    function getTotalbyCase($tid) {
	    	$sql = "SELECT COUNT(*) AS CNT FROM tbl_case where tid=$tid";
	    	$row = $this->getOne($sql);
	    	return $row?$row['CNT']:0;
	    }
	    
	    //insert the Case information into the tbl_case table
	    function insertCase($title,$ccontent,$tid) {
	    	$sql="insert into tbl_case(title,ccontent,tid) values('$title','$ccontent',$tid)";
	    	return $this->executeInsert($sql);
	    }
	    
	    //modify the Case information from the tbl_case table by cid
	    function updateCase($cid,$title,$ccontent,$tid) {
			$sql="update tbl_case set title='$title',ccontent='$ccontent',tid=$tid where cid=$cid";
	    	return $this->executeUpdate($sql);
	    }
		
	    //delete the Case information from the tbl_case table by cid
	    function deleteCase($cid)
	    {
	    	$sql="delete from tbl_case where cid=$cid";
	    	return $this->executeDelete($sql);
	    }
	}
?>