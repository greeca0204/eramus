<?php /* Smarty version 2.6.18, created on 2015-04-03 16:22:40
         compiled from showCase.html */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "header.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<table width="100%" align="center" cellspacing="1" cellpadding="3" class="i_table">
  <tr>
    <td class="head" colspan="2"><b>操作菜单</b></td>
  </tr>
  <tr>
    <td class="b_title">
    	<a href="cases.php?action=new" target="_self">添加案例信息</a>&nbsp;
    	<a href="cases.php?tid=1" target="mainFrame">社交媒体案例信息管理</a>&nbsp;
        <a href="cases.php?tid=2" target="mainFrame">SEO优化案例信息管理</a>&nbsp;
        <a href="cases.php?tid=3" target="mainFrame">电子市场案例信息管理</a>&nbsp;
        <a href="cases.php?tid=4" target="mainFrame">网络公关案例信息管理</a>&nbsp;
        <a href="cases.php?tid=5" target="mainFrame">合作伙伴案例信息管理</a>
    </td>
  </tr>
</table>
<br />
<form name="fmEdit" id="fmEdit" action="cases.php?action=delete" method="post">
    <table width="100%" align="center" cellspacing="1" cellpadding="3" class="i_table">
		<tr>
        	<td colspan="4" class="head">案例信息管理</td>
        </tr>
        <tr>
			<td width="20%" class="head_2">案例编号</td>
			<td width="50%" class="head_2">案例名称</td>          	
	  	  	<td width="10%" class="head_2">管理</td>
			<td width="20%" class="head_2">删除</td>
		</tr>
		<?php $_from = $this->_tpl_vars['cases']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['cases'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['cases']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['cases']):
        $this->_foreach['cases']['iteration']++;
?>
		<tr>
			<td width="20%" class="b"><?php echo $this->_tpl_vars['cases']['cid']; ?>
</td>
			<td width="50%" class="b"><?php echo $this->_tpl_vars['cases']['title']; ?>
</td>           
   			<td width="10%" class="b">
            	<a href='cases.php?action=new&cid=<?php echo $this->_tpl_vars['cases']['cid']; ?>
'>修改</a>
		  	</td>
			<td width="20%" class="b">
				<input type="checkbox" name="chk1[]" id="chk1" value="<?php echo $this->_tpl_vars['cases']['cid']; ?>
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