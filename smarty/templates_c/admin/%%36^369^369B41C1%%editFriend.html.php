<?php /* Smarty version 2.6.18, created on 2015-04-07 08:47:43
         compiled from editFriend.html */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'header.html', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<table width="100%" align="center" cellspacing="1" cellpadding="3" class="i_table">
  <tr>
    <td class="head" colspan="2"><b>操作菜单</b></td>
  </tr>
  <tr>
    <td class="b_title">
    	<a href="friend.php?action=new" target="_self">添加友情链接</a>&nbsp;
    	<a href="friend.php" target="_self">友情链接管理</a>
    </td>
  </tr>
</table>
<br />
<form name="fmEdit" id="fmEdit" method="post" action="friend.php?action=save" enctype="multipart/form-data">
	<input type="hidden" name="id" id="id" value="<?php echo $this->_tpl_vars['friend']['id']; ?>
" />
	<table width="100%" align="center" cellspacing="1" cellpadding="3" class="i_table">
		<tr>
			<td colspan="2" class="head">友情链接管理</td>
        </tr>
		<tr>
			<td width="10%" class="b">链接名称：</td>
			<td class="b">
				<input name="friends" id="friends" value="<?php echo $this->_tpl_vars['friend']['friends']; ?>
"  class="frminput" />
			</td>
		</tr>
		<tr>
			<td width="10%" class="b">链接地址：</td>
			<td class="b">
				<input name="url" id="url" value="<?php echo $this->_tpl_vars['friend']['url']; ?>
" class="frminput"/>
			</td>
		</tr>
		<tr>
			<td width="10%" class="b">链接logo：</td>
			<td class="sel">
				<input type="file" name="logo" id="logo" value="<?php echo $this->_tpl_vars['friend']['logo']; ?>
" />  
				<input type="hidden" name="hasimg" value="<?php echo $this->_tpl_vars['friend']['logo']; ?>
" />
			</td>
		</tr>
		<?php if ($this->_tpl_vars['friend']['logo'] != ''): ?>
		<tr>
			<td width="20%" class="b">链接logo：</td>
			<td class="b">            
    			<img src="../<?php echo $this->_tpl_vars['friend']['logo']; ?>
" width="100"  alt="意拉慕斯" />	
			</td>
		</tr>
		<?php endif; ?>
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