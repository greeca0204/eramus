<?php /* Smarty version 2.6.18, created on 2015-04-05 03:49:23
         compiled from showAdvertise.html */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "header.html", 'smarty_include_vars' => array()));
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
<form name="fmEdit" id="fmEdit" action="advertise.php?action=delete" method="post">
	<table width="100%" align="center" cellspacing="1" cellpadding="3" class="i_table">
		<tr>
        	<td colspan="4" class="head">广告信息管理</td>
        </tr>
		<tr>
			<td width="50%" class="head_2">广告名称</td>
			<td width="20%" class="head_2">是否显示</td>
			<td width="10%" class="head_2">管理</td>
			<td width="20%" class="head_2">删除</td>
		</tr>
		<?php $_from = $this->_tpl_vars['advertise']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['advertise'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['advertise']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['advertise']):
        $this->_foreach['advertise']['iteration']++;
?>
		<tr>
			<td width="50%" class="b"><?php echo $this->_tpl_vars['advertise']['title']; ?>
</td>
			<td width="20%" class="b">
				<?php if ($this->_tpl_vars['advertise']['checked'] == 0): ?>隐藏<?php endif; ?>
				<?php if ($this->_tpl_vars['advertise']['checked'] == 1): ?>显示<?php endif; ?>
			</td>
   			<td width="10%" class="b">
            	<a href='advertise.php?action=new&id=<?php echo $this->_tpl_vars['advertise']['id']; ?>
'>修改</a>
			</td>
			<td width="20%" class="b">
                <input type="checkbox" name="chk1[]" id="chk1" value="<?php echo $this->_tpl_vars['advertise']['id']; ?>
" />
			</td>
		</tr>
		<?php endforeach; endif; unset($_from); ?>
		<tr>
			<td colspan="3" class="b">
				<input type="submit" name="Submit" value="删除" />
			</td>
			<td width="20%" class="b">
				全选/全不选<input type="checkbox" name="chk2" id="chk2" />
			</td>
		</tr>
		<tr>
			<td colspan="4" class="b"><?php echo $this->_tpl_vars['paggingbar']; ?>
</td>
		</tr>  
	</table>
</form>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "footer.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>