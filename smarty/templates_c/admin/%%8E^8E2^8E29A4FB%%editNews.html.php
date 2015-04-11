<?php /* Smarty version 2.6.18, created on 2015-04-07 08:19:56
         compiled from editNews.html */ ?>
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
    	<a href="news.php?action=new" target="_self">添加新闻信息</a>&nbsp;
    	<a href="news.php" target="mainFrame">新闻信息管理</a>&nbsp;
    </td>
  </tr>
</table>
<br />
<form name="fmEdit" id="fmEdit" method="post" action="news.php?action=save" enctype="multipart/form-data">
	<input type="hidden" name="nid" id="nid" value="<?php echo $this->_tpl_vars['news']['nid']; ?>
" />
	<table width="100%" align="center" cellspacing="1" cellpadding="3" class="i_table">
		<tr>
			<td colspan="2" class="head">新闻信息管理</td>
        </tr>
		<tr>
			<td width="10%" class="b">文章标题：</td>
			<td class="b">
				<input name="title" id="title" value="<?php echo $this->_tpl_vars['news']['title']; ?>
"  class="frminput" />
			</td>
		</tr>
		<tr>
			<td width="10%" class="b">文章作者：</td>
			<td class="b">
				<input name="author" id="author" value="<?php echo $this->_tpl_vars['news']['author']; ?>
" class="frminput"/>
			</td>
		</tr>
        <tr>
			<td width="10%" class="b">文章内容：</td>
			<td class="b">
				<textarea name="content1"  id="content1" style="width:100%;height:350px;" class="frmarea"><?php echo $this->_tpl_vars['news']['content']; ?>
</textarea>
			</td>
		</tr>
		<tr>
			<td width="10%" class="b">文章类别：</td>
			<td class="sel">
				<select name="type" id="type">
                	<?php $_from = $this->_tpl_vars['classes']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['classes'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['classes']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['classes']):
        $this->_foreach['classes']['iteration']++;
?>
      				<option value="<?php echo $this->_tpl_vars['classes']['id']; ?>
" <?php if ($this->_tpl_vars['news']['type'] == $this->_tpl_vars['classes']['id']): ?>selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['classes']['classname']; ?>
</option>
                    <?php endforeach; endif; unset($_from); ?>
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