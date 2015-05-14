<?php /* Smarty version 2.6.18, created on 2015-05-14 10:03:01
         compiled from showMsg.html */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "header.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<form name="fmEdit" id="fmEdit" action="lyb.php?action=delete" method="post">
    <table width="100%" align="center" cellspacing="1" cellpadding="3" class="i_table">
		<tr>
        	<td colspan="6" class="head">留言信息管理</td>
        </tr>
        <tr>
			<td width="10%" class="head_2">留言编号</td>
			<td width="10%" class="head_2">留言名称</td>
			<td width="10%" class="head_2">留言电话</td>        
			<td width="10%" class="head_2">留言qq</td>
			<td width="40%" class="head_2">留言信息</td>       	
			<td width="20%" class="head_2">删除</td>
		</tr>
		<?php $_from = $this->_tpl_vars['msg']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['msg'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['msg']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['msg']):
        $this->_foreach['msg']['iteration']++;
?>
		<tr>
			<td width="10%" class="b"><?php echo $this->_tpl_vars['msg']['mid']; ?>
</td>
			<td width="10%" class="b"><?php echo $this->_tpl_vars['msg']['title']; ?>
</td>
			<td width="10%" class="b"><?php echo $this->_tpl_vars['msg']['tel']; ?>
</td>
			<td width="10%" class="b"><?php echo $this->_tpl_vars['msg']['qq']; ?>
</td>
			<td width="40%" class="b"><?php echo $this->_tpl_vars['msg']['content']; ?>
</td>        
			<td width="20%" class="b">
				<input type="checkbox" name="chk1[]" id="chk1" value="<?php echo $this->_tpl_vars['msg']['mid']; ?>
" />
			</td>
		</tr>
		<?php endforeach; endif; unset($_from); ?>
		<tr>
			<td colspan="5" class="b">
				<input type="submit" name="Submit" value="删除" />
			</td>
			<td width="20%" class="b">
				全选/全不选<input type="checkbox" name="chk2" id="chk2" />
			</td>
		</tr>
		<tr>
			<td colspan="6" class="b"><?php echo $this->_tpl_vars['paggingbar']; ?>
</td>
		</tr>  
	</table>
</form>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "footer.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>