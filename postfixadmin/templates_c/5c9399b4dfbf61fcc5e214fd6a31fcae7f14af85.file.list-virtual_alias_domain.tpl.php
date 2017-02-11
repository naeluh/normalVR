<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-06-03 02:48:42
         compiled from "/var/www/hulea/public_html/postfixadmin/templates/list-virtual_alias_domain.tpl" */ ?>
<?php /*%%SmartyHeaderCode:421078825556e6b0a7cfc24-84454392%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5c9399b4dfbf61fcc5e214fd6a31fcae7f14af85' => 
    array (
      0 => '/var/www/hulea/public_html/postfixadmin/templates/list-virtual_alias_domain.tpl',
      1 => 1433296741,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '421078825556e6b0a7cfc24-84454392',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'PALANG' => 0,
    'tAliasDomains' => 0,
    'item' => 0,
    'fDomain' => 0,
    'search' => 0,
    'can_create_alias_domain' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_556e6b0a8af314_71225590',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_556e6b0a8af314_71225590')) {function content_556e6b0a8af314_71225590($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_replace')) include '/var/www/hulea/public_html/postfixadmin/smarty/libs/plugins/modifier.replace.php';
?>
<table id="alias_domain_table">
	<tr>
		<th colspan="6"><?php echo $_smarty_tpl->tpl_vars['PALANG']->value['pOverview_alias_domain_title'];?>
</th>
	</tr>
	<?php if (count($_smarty_tpl->tpl_vars['tAliasDomains']->value)>0) {?>
		<?php if (count($_smarty_tpl->tpl_vars['tAliasDomains']->value)>0) {?> 
			<?php echo $_smarty_tpl->getConfigVariable('tr_header');?>

			<td><?php echo $_smarty_tpl->tpl_vars['PALANG']->value['pOverview_alias_address'];?>
</td>
			<td><?php echo $_smarty_tpl->tpl_vars['PALANG']->value['to'];?>
</td>
			<td><?php echo $_smarty_tpl->tpl_vars['PALANG']->value['last_modified'];?>
</td>
			<td><?php echo $_smarty_tpl->tpl_vars['PALANG']->value['active'];?>
</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			</tr>
			<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['tAliasDomains']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->_loop = true;
?>
				<?php echo $_smarty_tpl->getConfigVariable('tr_hilightoff');?>

				<td><?php if ($_smarty_tpl->tpl_vars['item']->value['alias_domain']!=$_smarty_tpl->tpl_vars['fDomain']->value) {?><a href="<?php echo $_smarty_tpl->getConfigVariable('url_list_virtual');?>
?domain=<?php echo rawurlencode($_smarty_tpl->tpl_vars['item']->value['alias_domain']);?>
"><?php }?>
					<?php if ($_smarty_tpl->tpl_vars['search']->value=='') {?>
						<?php echo $_smarty_tpl->tpl_vars['item']->value['alias_domain'];?>

					<?php } else { ?>
						<?php echo smarty_modifier_replace($_smarty_tpl->tpl_vars['item']->value['alias_domain'],$_smarty_tpl->tpl_vars['search']->value,"<span class='searchresult'>".((string)$_smarty_tpl->tpl_vars['search']->value)."</span>");?>

					<?php }?>
					<?php if ($_smarty_tpl->tpl_vars['item']->value['alias_domain']!=$_smarty_tpl->tpl_vars['fDomain']->value) {?></a><?php }?></td>
				<td><?php if ($_smarty_tpl->tpl_vars['item']->value['target_domain']!=$_smarty_tpl->tpl_vars['fDomain']->value) {?><a href="<?php echo $_smarty_tpl->getConfigVariable('url_list_virtual');?>
?domain=<?php echo rawurlencode($_smarty_tpl->tpl_vars['item']->value['target_domain']);?>
"><?php }?>
					<?php if ($_smarty_tpl->tpl_vars['search']->value=='') {?>
						<?php echo $_smarty_tpl->tpl_vars['item']->value['target_domain'];?>

					<?php } else { ?>
						<?php echo smarty_modifier_replace($_smarty_tpl->tpl_vars['item']->value['target_domain'],$_smarty_tpl->tpl_vars['search']->value,"<span class='searchresult'>".((string)$_smarty_tpl->tpl_vars['search']->value)."</span>");?>

					<?php }?>
					<?php if ($_smarty_tpl->tpl_vars['item']->value['target_domain']!=$_smarty_tpl->tpl_vars['fDomain']->value) {?></a><?php }?></td>
				<td><?php echo $_smarty_tpl->tpl_vars['item']->value['modified'];?>
</td>
				<td><a href="<?php echo $_smarty_tpl->getConfigVariable('url_editactive');?>
aliasdomain&amp;id=<?php echo rawurlencode($_smarty_tpl->tpl_vars['item']->value['alias_domain']);?>
&amp;active=<?php if (($_smarty_tpl->tpl_vars['item']->value['active']==0)) {?>1<?php } else { ?>0<?php }?>&amp;token=<?php echo rawurlencode($_SESSION['PFA_token']);?>
"><?php if ($_smarty_tpl->tpl_vars['item']->value['active']==1) {
echo $_smarty_tpl->tpl_vars['PALANG']->value['YES'];
} else {
echo $_smarty_tpl->tpl_vars['PALANG']->value['NO'];
}?></a></td>
				<td><a href="<?php echo $_smarty_tpl->getConfigVariable('url_create_alias_domain');?>
&amp;edit=<?php echo rawurlencode($_smarty_tpl->tpl_vars['item']->value['alias_domain']);?>
"><?php echo $_smarty_tpl->tpl_vars['PALANG']->value['edit'];?>
</a></td>
				<td><a href="<?php echo $_smarty_tpl->getConfigVariable('url_delete');?>
?table=aliasdomain&amp;delete=<?php echo rawurlencode($_smarty_tpl->tpl_vars['item']->value['alias_domain']);?>
&amp;token=<?php echo rawurlencode($_SESSION['PFA_token']);?>
"
					onclick="return confirm ('<?php echo $_smarty_tpl->tpl_vars['PALANG']->value['confirm'];
echo $_smarty_tpl->tpl_vars['PALANG']->value['pOverview_get_alias_domains'];?>
: <?php echo $_smarty_tpl->tpl_vars['item']->value['alias_domain'];?>
 -&gt; <?php echo $_smarty_tpl->tpl_vars['item']->value['target_domain'];?>
');"><?php echo $_smarty_tpl->tpl_vars['PALANG']->value['del'];?>
</a></td>
				</tr>
			<?php } ?>
		<?php }?>
	<?php }?>
</table>
<?php if ($_smarty_tpl->tpl_vars['can_create_alias_domain']->value) {?>
	<br/>
	<br /><a href="<?php echo $_smarty_tpl->getConfigVariable('url_create_alias_domain');?>
&amp;target_domain=<?php echo rawurlencode($_smarty_tpl->tpl_vars['fDomain']->value);?>
" class="button"><?php echo $_smarty_tpl->tpl_vars['PALANG']->value['add_alias_domain'];?>
</a><br />

<?php }?>
<?php }} ?>
