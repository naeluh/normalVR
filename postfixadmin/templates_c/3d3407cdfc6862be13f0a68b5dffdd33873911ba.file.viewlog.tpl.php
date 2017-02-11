<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-06-03 02:49:03
         compiled from "/var/www/hulea/public_html/postfixadmin/templates/viewlog.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2040516005556e6b1f6a7684-82890502%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3d3407cdfc6862be13f0a68b5dffdd33873911ba' => 
    array (
      0 => '/var/www/hulea/public_html/postfixadmin/templates/viewlog.tpl',
      1 => 1433296743,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2040516005556e6b1f6a7684-82890502',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'select_options' => 0,
    'PALANG' => 0,
    'tLog' => 0,
    'fDomain' => 0,
    'item' => 0,
    'log_data' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_556e6b1f756551_85790437',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_556e6b1f756551_85790437')) {function content_556e6b1f756551_85790437($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_truncate')) include '/var/www/hulea/public_html/postfixadmin/smarty/libs/plugins/modifier.truncate.php';
if (!is_callable('smarty_modifier_replace')) include '/var/www/hulea/public_html/postfixadmin/smarty/libs/plugins/modifier.replace.php';
?><div id="overview">
<form name="frmOverview" method="post" action="">
	<select name="fDomain" onchange="this.form.submit();"><?php echo $_smarty_tpl->tpl_vars['select_options']->value;?>
</select>
	<input class="button" type="submit" name="go" value="<?php echo $_smarty_tpl->tpl_vars['PALANG']->value['go'];?>
" />
</form>
</div>
<?php if ($_smarty_tpl->tpl_vars['tLog']->value) {?>
<table id="log_table">
	<tr>
		<th colspan="5"><?php echo $_smarty_tpl->tpl_vars['PALANG']->value['pViewlog_welcome'];?>
 <?php echo $_smarty_tpl->tpl_vars['fDomain']->value;?>
</th>
	</tr>
	<?php echo $_smarty_tpl->getConfigVariable('tr_header');?>

		<td><?php echo $_smarty_tpl->tpl_vars['PALANG']->value['pViewlog_timestamp'];?>
</td>
		<td><?php echo $_smarty_tpl->tpl_vars['PALANG']->value['admin'];?>
</td>
		<td><?php echo $_smarty_tpl->tpl_vars['PALANG']->value['domain'];?>
</td>
		<td><?php echo $_smarty_tpl->tpl_vars['PALANG']->value['pViewlog_action'];?>
</td>
		<td><?php echo $_smarty_tpl->tpl_vars['PALANG']->value['pViewlog_data'];?>
</td>
	</tr>
	<?php $_smarty_tpl->tpl_vars["PALANG_pViewlog_data"] = new Smarty_variable($_smarty_tpl->tpl_vars['PALANG']->value['pViewlog_data'], null, 0);?>

	<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['tLog']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->_loop = true;
?>
		<?php $_smarty_tpl->tpl_vars['log_data'] = new Smarty_variable(smarty_modifier_truncate($_smarty_tpl->tpl_vars['item']->value['data'],35,"...",true), null, 0);?>
		<?php $_smarty_tpl->tpl_vars['item_data'] = new Smarty_variable($_smarty_tpl->tpl_vars['item']->value['data'], null, 0);?>
		<?php echo smarty_modifier_replace($_smarty_tpl->getConfigVariable('tr_hilightoff'),'>'," style=\"cursor:pointer;\" onclick=\"alert('".((string)$_smarty_tpl->tpl_vars['PALANG_pViewlog_data']->value)." = ".((string)$_smarty_tpl->tpl_vars['item_data']->value)."')\">");?>

		<td nowrap="nowrap"><?php echo $_smarty_tpl->tpl_vars['item']->value['timestamp'];?>
</td>
		<td nowrap="nowrap"><?php echo $_smarty_tpl->tpl_vars['item']->value['username'];?>
</td>
		<td nowrap="nowrap"><?php echo $_smarty_tpl->tpl_vars['item']->value['domain'];?>
</td>
		<td nowrap="nowrap"><?php echo $_smarty_tpl->tpl_vars['item']->value['action'];?>
</td>
		<td nowrap="nowrap"><?php echo $_smarty_tpl->tpl_vars['log_data']->value;?>
</td>
		</tr>
<?php } ?>
</table>
<?php }?>
<?php }} ?>
