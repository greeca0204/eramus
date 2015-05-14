<?php /* Smarty version 2.6.18, created on 2015-05-14 11:04:05
         compiled from editCase.html */ ?>
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
<form name="fmEdit" id="fmEdit" method="post" action="cases.php?action=save" enctype="multipart/form-data">
	<input type="hidden" name="cid" id="cid" value="<?php echo $this->_tpl_vars['cases']['cid']; ?>
" />
	<table width="100%" align="center" cellspacing="1" cellpadding="3" class="i_table">
		<tr>
			<td colspan="2" class="head">案例信息管理</td>
        </tr>
        <tr>
			<td width="20%" class="b">案例名称</td>
			<td class="b">
				<input type="text" name="title" id="title" value="<?php echo $this->_tpl_vars['cases']['title']; ?>
"  class="frminput" />
			</td>
	  	</tr>
	  	<tr>
			<td width="20%" class="b">案例内容</td>
			<td class="b">
				<textarea name="content1"  id="content1" style="width:100%;height:350px; resize:none;"><?php echo $this->_tpl_vars['cases']['ccontent']; ?>
</textarea>
			</td>
	  	</tr>
		<tr>
			<td width="20%" class="b">案例类别</td>
			<td class="sel">
				<select id="tid" name="tid">
                    <option value="1" <?php if ($this->_tpl_vars['cases']['tid'] == 1): ?>selected="selected"<?php endif; ?>>社交媒体</option>
                    <option value="2" <?php if ($this->_tpl_vars['cases']['tid'] == 2): ?>selected="selected"<?php endif; ?>>SEO优化</option>
                    <option value="3" <?php if ($this->_tpl_vars['cases']['tid'] == 3): ?>selected="selected"<?php endif; ?>>电子市场</option>
                    <option value="4" <?php if ($this->_tpl_vars['cases']['tid'] == 4): ?>selected="selected"<?php endif; ?>>网络公关</option>
                    <option value="5" <?php if ($this->_tpl_vars['cases']['tid'] == 5): ?>selected="selected"<?php endif; ?>>合作伙伴</option>
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