<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-06-03 03:22:42
         compiled from "/var/www/hulea/public_html/postfixadmin/templates/adminlistadmin.tpl" */ ?>
<?php /*%%SmartyHeaderCode:735444288556e7302440db1-94503159%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8890941ef10c811f461c37e36492a2c34f318a2e' => 
    array (
      0 => '/var/www/hulea/public_html/postfixadmin/templates/adminlistadmin.tpl',
      1 => 1433296738,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '735444288556e7302440db1-94503159',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'admin_properties' => 0,
    'PALANG' => 0,
    'admin' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_556e730254ac76_94049822',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_556e730254ac76_94049822')) {function content_556e730254ac76_94049822($_smarty_tpl) {?><?php if ($_smarty_tpl->tpl_vars['admin_properties']->value) {?>
	<table id="admin_table">
		<?php echo $_smarty_tpl->getConfigVariable('tr_header');?>

			<td><?php echo $_smarty_tpl->tpl_vars['PALANG']->value['admin'];?>
</td>
			<td><?php echo $_smarty_tpl->tpl_vars['PALANG']->value['pAdminList_admin_count'];?>
</td>
			<td><?php echo $_smarty_tpl->tpl_vars['PALANG']->value['last_modified'];?>
</td>
			<td><?php echo $_smarty_tpl->tpl_vars['PALANG']->value['active'];?>
</td>
			<td colspan="2">&nbsp;</td>
		</tr>
<?php  $_smarty_tpl->tpl_vars['admin'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['admin']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['admin_properties']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['admin']->key => $_smarty_tpl->tpl_vars['admin']->value) {
$_smarty_tpl->tpl_vars['admin']->_loop = true;
?>
		<?php echo $_smarty_tpl->getConfigVariable('tr_hilightoff');?>

			<td><a href="list-domain.php?username=<?php echo rawurlencode($_smarty_tpl->tpl_vars['admin']->value['username']);?>
"><?php echo $_smarty_tpl->tpl_vars['admin']->value['username'];?>
</a></td>
			<td>
				<?php if ($_smarty_tpl->tpl_vars['admin']->value['superadmin']==1) {?>
					<?php echo $_smarty_tpl->tpl_vars['PALANG']->value['super_admin'];?>

				<?php } else { ?>
					<?php echo $_smarty_tpl->tpl_vars['admin']->value['domain_count'];?>

				<?php }?>
			</td>
			<td><?php echo $_smarty_tpl->tpl_vars['admin']->value['modified'];?>
</td>
			<td><a href="<?php echo $_smarty_tpl->getConfigVariable('url_editactive');?>
admin&amp;id=<?php echo rawurlencode($_smarty_tpl->tpl_vars['admin']->value['username']);?>
&amp;active=<?php if (($_smarty_tpl->tpl_vars['admin']->value['active']==0)) {?>1<?php } else { ?>0<?php }?>&amp;token=<?php echo rawurlencode($_SESSION['PFA_token']);?>
"><?php echo $_smarty_tpl->tpl_vars['admin']->value['_active'];?>
</a></td>
			<td><a href="<?php echo $_smarty_tpl->getConfigVariable('url_edit_admin');?>
&amp;edit=<?php echo rawurlencode($_smarty_tpl->tpl_vars['admin']->value['username']);?>
"><?php echo $_smarty_tpl->tpl_vars['PALANG']->value['edit'];?>
</a></td>
			<td><a href="<?php echo $_smarty_tpl->getConfigVariable('url_delete');?>
?table=admin&amp;delete=<?php echo rawurlencode($_smarty_tpl->tpl_vars['admin']->value['username']);?>
&amp;token=<?php echo rawurlencode($_SESSION['PFA_token']);?>
" 
				onclick="return confirm ('<?php echo $_smarty_tpl->tpl_vars['PALANG']->value['confirm'];
echo $_smarty_tpl->tpl_vars['PALANG']->value['admin'];?>
: <?php echo $_smarty_tpl->tpl_vars['admin']->value['username'];?>
');"><?php echo $_smarty_tpl->tpl_vars['PALANG']->value['del'];?>
</a></td>
		</tr>
<?php } ?>
	</table>
	<br /><a href="<?php echo $_smarty_tpl->getConfigVariable('url_create_admin');?>
" class="button"><?php echo $_smarty_tpl->tpl_vars['PALANG']->value['pAdminMenu_create_admin'];?>
</a><br />
<?php }?>
<?php }} ?>
