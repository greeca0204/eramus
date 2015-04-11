<?php /* Smarty version 2.6.18, created on 2015-04-07 08:37:51
         compiled from editAdvertise.html */ ?>
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
    	<a href="advertise.php?action=new" target="_self">添加广告信息</a>&nbsp;
    	<a href="advertise.php?tid=1" target="mainFrame">广告信息管理</a>&nbsp;
    </td>
  </tr>
</table>
<br />
<form name="fmEdit" id="fmEdit" method="post" action="advertise.php?action=save" enctype="multipart/form-data">
	<input type="hidden" name="id" id="id" value="<?php echo $this->_tpl_vars['advertise']['id']; ?>
" />
	<table width="100%" align="center" cellspacing="1" cellpadding="3" class="i_table">
		<tr>
			<td colspan="2" class="head">广告信息管理</td>
        </tr>
		<tr>
			<td width="20%" class="b">广告名称：</td>
			<td class="b">
				<input name="title" id="title" value="<?php echo $this->_tpl_vars['advertise']['title']; ?>
"  class="frminput" />
			</td>
		</tr>
		<tr>
			<td width="20%" class="b">广告图片：</td>
			<td class="sel">
				<input type="file" name="imgurl" id="imgurl" value="<?php echo $this->_tpl_vars['advertise']['imgurl']; ?>
" />  
				<input type="hidden" name="hasimg" value="<?php echo $this->_tpl_vars['advertise']['imgurl']; ?>
" />           
			</td>
		</tr>
		<?php if ($this->_tpl_vars['advertise']['imgurl'] != ''): ?>
		<tr>
			<td width="20%" class="b">广告图片：</td>
			<td class="sel">            
    			<img src="../<?php echo $this->_tpl_vars['advertise']['imgurl']; ?>
" width="1000"  alt="意拉慕斯" />	
			</td>
		</tr>
		<?php endif; ?> 
		<tr>
			<td width="20%" class="b">广告链接：</td>
			<td class="b">
				<input name="contenturl" id="contenturl" value="<?php echo $this->_tpl_vars['advertise']['contenturl']; ?>
" class="frminput"/>
			</td>
		</tr>
		<tr>
			<td width="20%" class="b">是否显示：</td>
			<td class="sel">
				<select name="checked" id="checked">             
      				<option value="0"  <?php if ($this->_tpl_vars['advertise']['checked'] == 0): ?>selected<?php endif; ?>>隐藏</option>
                    <option value="1"  <?php if ($this->_tpl_vars['advertise']['checked'] == 1): ?>selected<?php endif; ?>>显示</option>
				</select>
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