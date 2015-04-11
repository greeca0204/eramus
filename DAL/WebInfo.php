<?php
	/*
	 * 页面名称：WebInfo.php
	 * 页面功能：网站基本信息管理数据操作
	 * 页面类别：数据层
	 * 编写日期：2013.05.07
	 */
	
	r_require_once("/lib/GenericDao.php");
	class WebInfo extends GenericDao {
	    
	    //获取公司信息
	    function getWeb() {
	    	$sql="SELECT * FROM tb_link where id=1";
	    	return $this->getOne($sql);
	    }
	    
	    //修改公司信息
	    function updateWeb($id,$website,$comname,$keyword,$description,$negotiator,$address,$postcode,$tel,$tel2,$tel3,$tel4,$fax,$email,$copyright) {
	    	$sql="update tb_link set website='$website',comname='$comname',keyword='$keyword',description='$description',negotiator='$negotiator',address='$address',postcode='$postcode',tel='$tel',tel2='$tel2',tel3='$tel3',tel4='$tel4',fax='$fax',email='$email',copyright='$copyright' where id=$id";
	    	return $this->executeUpdate($sql);
	    }
	}
?>