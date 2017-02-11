<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-06-03 02:53:33
         compiled from "/var/www/hulea/public_html/postfixadmin/templates/fetchmail.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1976628566556e6c2d75a7f6-41639138%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '979531ad6d5896c66965053510b67b38085c1063' => 
    array (
      0 => '/var/www/hulea/public_html/postfixadmin/templates/fetchmail.tpl',
      1 => 1433296739,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1976628566556e6c2d75a7f6-41639138',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'edit' => 0,
    'new' => 0,
    'fetchmail_edit_row' => 0,
    'headers' => 0,
    'colspan' => 0,
    'PALANG' => 0,
    'user_domains' => 0,
    'header' => 0,
    'tFmail' => 0,
    'row' => 0,
    'extra_options' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_556e6c2d8056c1_03666743',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_556e6c2d8056c1_03666743')) {function content_556e6c2d8056c1_03666743($_smarty_tpl) {?><?php if ($_smarty_tpl->tpl_vars['edit']->value||$_smarty_tpl->tpl_vars['new']->value) {?>
	<div id="edit_form">
	<form name="fetchmail" method="post" action="">
	<?php echo $_smarty_tpl->tpl_vars['fetchmail_edit_row']->value;?>

<?php } else { ?>
	<?php $_smarty_tpl->tpl_vars["colspan"] = new Smarty_variable(count($_smarty_tpl->tpl_vars['headers']->value), null, 0);?>
	<div id="overview">
		<form name="frmOverview" method="post" action="">
		<table id="log_table" border="0">
			<tr>
				<th colspan="<?php echo $_smarty_tpl->tpl_vars['colspan']->value+2;?>
"><?php echo $_smarty_tpl->tpl_vars['PALANG']->value['pFetchmail_welcome'];
echo $_smarty_tpl->tpl_vars['user_domains']->value;?>
</th>
			</tr>
			<?php echo $_smarty_tpl->getConfigVariable('tr_header');?>

			<?php  $_smarty_tpl->tpl_vars['header'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['header']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['headers']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['header']->key => $_smarty_tpl->tpl_vars['header']->value) {
$_smarty_tpl->tpl_vars['header']->_loop = true;
?>
				<td><?php echo $_smarty_tpl->tpl_vars['header']->value;?>
</td>
			<?php } ?>
			<td colspan="2">&nbsp;</td>
			</tr>
		<?php if ($_smarty_tpl->tpl_vars['tFmail']->value) {?>
			<?php  $_smarty_tpl->tpl_vars['row'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['row']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['tFmail']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['row']->key => $_smarty_tpl->tpl_vars['row']->value) {
$_smarty_tpl->tpl_vars['row']->_loop = true;
?>
				<?php echo $_smarty_tpl->getConfigVariable('tr_hilightoff');?>

					<td nowrap="nowrap"><?php echo $_smarty_tpl->tpl_vars['row']->value['mailbox'];?>
&nbsp;</td>
					<td nowrap="nowrap"><?php echo $_smarty_tpl->tpl_vars['row']->value['src_server'];?>
&nbsp;</td>
					<td nowrap="nowrap"><?php echo $_smarty_tpl->tpl_vars['row']->value['src_auth'];?>
&nbsp;</td>
					<td nowrap="nowrap"><?php echo $_smarty_tpl->tpl_vars['row']->value['src_user'];?>
&nbsp;</td>
					<td nowrap="nowrap"><?php echo $_smarty_tpl->tpl_vars['row']->value['src_folder'];?>
&nbsp;</td>
					<td nowrap="nowrap"><?php echo $_smarty_tpl->tpl_vars['row']->value['poll_time'];?>
&nbsp;</td>
					<td nowrap="nowrap"><?php echo $_smarty_tpl->tpl_vars['row']->value['fetchall'];?>
&nbsp;</td>
					<td nowrap="nowrap"><?php echo $_smarty_tpl->tpl_vars['row']->value['keep'];?>
&nbsp;</td>
					<td nowrap="nowrap"><?php echo $_smarty_tpl->tpl_vars['row']->value['protocol'];?>
&nbsp;</td>
					<td nowrap="nowrap"><?php echo $_smarty_tpl->tpl_vars['row']->value['usessl'];?>
&nbsp;</td>
					<td nowrap="nowrap"><?php echo $_smarty_tpl->tpl_vars['row']->value['sslcertck'];?>
&nbsp;</td>
<?php if ($_smarty_tpl->tpl_vars['extra_options']->value) {?>
					<td nowrap="nowrap"><?php echo $_smarty_tpl->tpl_vars['row']->value['sslcertpath'];?>
&nbsp;</td>
					<td nowrap="nowrap"><?php echo $_smarty_tpl->tpl_vars['row']->value['sslfingerprint'];?>
&nbsp;</td>
					<td nowrap="nowrap"><?php echo $_smarty_tpl->tpl_vars['row']->value['extra_options'];?>
&nbsp;</td>
					<td nowrap="nowrap"><?php echo $_smarty_tpl->tpl_vars['row']->value['mda'];?>
&nbsp;</td>
<?php }?>
					<td nowrap="nowrap"><?php echo $_smarty_tpl->tpl_vars['row']->value['date'];?>
&nbsp;</td>
					<td nowrap="nowrap"><?php echo $_smarty_tpl->tpl_vars['row']->value['returned_text'];?>
--x--&nbsp;</td> <!-- Inhalt mit if auswerten!  -->
					<td><a href="fetchmail.php?edit=<?php echo rawurlencode($_smarty_tpl->tpl_vars['row']->value['id']);?>
"><?php echo $_smarty_tpl->tpl_vars['PALANG']->value['edit'];?>
</a></td>
					<td><a href="fetchmail.php?delete=<?php echo rawurlencode($_smarty_tpl->tpl_vars['row']->value['id']);?>
&amp;token=<?php echo rawurlencode($_SESSION['PFA_token']);?>
"
						onclick="return confirm('<?php echo $_smarty_tpl->tpl_vars['PALANG']->value['confirm'];
echo $_smarty_tpl->tpl_vars['PALANG']->value['pMenu_fetchmail'];?>
:<?php echo $_smarty_tpl->tpl_vars['row']->value['src_user'];?>
@<?php echo $_smarty_tpl->tpl_vars['row']->value['src_server'];?>
')"><?php echo $_smarty_tpl->tpl_vars['PALANG']->value['del'];?>
</a></td>
				</tr>
			<?php } ?>
		<?php }?>
		</table>
</form>
</div>
<br /><a href='?new=1' class="button"><?php echo $_smarty_tpl->tpl_vars['PALANG']->value['pFetchmail_new_entry'];?>
</a><br />
<?php }?>
<?php }} ?>
