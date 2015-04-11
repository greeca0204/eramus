<?php /* Smarty version 2.6.18, created on 2015-04-07 16:22:51
         compiled from editAnnounce.html */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'header.html', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<table width="100%" align="center" cellspacing="1" cellpadding="3" class="i_table">
  <tr>
    <td class="head" colspan="2"><b>操作菜单</b></td>
  </tr>
  <tr>
    <td class="b_title">
    	<a href="announcement.php?action=new" target="_self">添加公告信息</a>&nbsp;
    	<a href="announcement.php" target="_self">公告信息管理</a>
    </td>
  </tr>
</table>
<br />
<form name="fmEdit" id="fmEdit" method="post" action="announcement.php?action=save" enctype="multipart/form-data">
	<input type="hidden" name="aid" id="aid" value="<?php echo $this->_tpl_vars['announce']['aid']; ?>
" />
	<table width="100%" align="center" cellspacing="1" cellpadding="3" class="i_table">
		<tr>
			<td colspan="2" class="head">公告信息管理</td>
        </tr>
        <tr>
			<td width="20%" class="b">公告标题</td>
			<td class="b">
				<input type="text" name="title" id="title" value="<?php echo $this->_tpl_vars['announce']['title']; ?>
"  class="frminput" />
			</td>
	  	</tr>
	  	<tr>
			<td width="20%" class="b">公告内容</td>
			<td class="b">
				<textarea name="content1"  id="content1" style="width:100%;height:350px; resize:none;"><?php echo $this->_tpl_vars['announce']['acontent']; ?>
</textarea>
			</td>
	  	</tr>
		
		<tr>
			<td colspan="2" class="b">
				<input type="submit" value="提交">
				<input type="reset" value="重置">
			</td>
		</tr>
	</table>
</form>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'footer.html', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>