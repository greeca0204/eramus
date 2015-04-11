<?php /* Smarty version 2.6.18, created on 2015-04-07 08:21:29
         compiled from showNews.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'date_format', 'showNews.html', 29, false),)), $this); ?>
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
    	<a href="news.php?action=new" target="_self">添加新闻信息</a>&nbsp;
    	<a href="news.php" target="mainFrame">新闻信息管理</a>&nbsp;
    </td>
  </tr>
</table>
<br />
<form name="fmEdit" id="fmEdit" action="news.php?action=delete" method="post">
	<table width="100%" align="center" cellspacing="1" cellpadding="3" class="i_table">
		<tr>
        	<td colspan="5" class="head">新闻信息管理</td>
        </tr>
		<tr>
			<td width="25%" class="head_2">文章名称</td>
			<td width="25%" class="head_2">发布时间</td>
			<td width="20%" class="head_2">文章类型</td>
			<td width="10%" class="head_2">管理</td>
			<td width="20%" class="head_2">删除</td>
		</tr>
		<?php $_from = $this->_tpl_vars['news']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['news'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['news']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['news']):
        $this->_foreach['news']['iteration']++;
?>
		<tr>
			<td width="25%" class="b"><?php echo $this->_tpl_vars['news']['title']; ?>
</td>
			<td width="25%" class="b"><?php echo ((is_array($_tmp=$this->_tpl_vars['news']['addtime'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%Y-%m-%d") : smarty_modifier_date_format($_tmp, "%Y-%m-%d")); ?>
</td>
			<td width="20%" class="b"><?php echo $this->_tpl_vars['news']['classname']; ?>
</td>
   			<td width="10%" class="b">
            	<a href='news.php?action=new&nid=<?php echo $this->_tpl_vars['news']['nid']; ?>
'>修改</a>
			</td>
			<td width="20%" class="b">
                <input type="checkbox" name="chk1[]" id="chk1" value="<?php echo $this->_tpl_vars['news']['nid']; ?>
" />
			</td>
		</tr>
		<?php endforeach; endif; unset($_from); ?>
		<tr>
			<td colspan="4" class="b">
				<input type="submit" name="Submit" value="删除" />
			</td>
			<td width="20%" class="b">
				全选/全不选<input type="checkbox" name="chk2" id="chk2" />
			</td>
		</tr>
		<tr>
			<td valign="middle" colspan="5" class="b"><?php echo $this->_tpl_vars['paggingbar']; ?>
</td>
		</tr>  
	</table>
</form>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "footer.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>