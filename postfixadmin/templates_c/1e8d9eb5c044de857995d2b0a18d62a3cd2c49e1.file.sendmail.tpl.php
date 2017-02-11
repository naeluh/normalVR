<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-06-03 02:50:40
         compiled from "/var/www/hulea/public_html/postfixadmin/templates/sendmail.tpl" */ ?>
<?php /*%%SmartyHeaderCode:212703483556e6b80c9c5b6-97636363%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1e8d9eb5c044de857995d2b0a18d62a3cd2c49e1' => 
    array (
      0 => '/var/www/hulea/public_html/postfixadmin/templates/sendmail.tpl',
      1 => 1433296742,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '212703483556e6b80c9c5b6-97636363',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'PALANG' => 0,
    'smtp_from_email' => 0,
    'CONF' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_556e6b80d135e7_12468333',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_556e6b80d135e7_12468333')) {function content_556e6b80d135e7_12468333($_smarty_tpl) {?><div id="edit_form">
<form name="mailbox" method="post" action="">
<table>
	<tr>
		<th colspan="3"><?php echo $_smarty_tpl->tpl_vars['PALANG']->value['pSendmail_welcome'];?>
</th>
	</tr>
	<tr>
		<td class="label"><label><?php echo $_smarty_tpl->tpl_vars['PALANG']->value['from'];?>
:</label></td>
		<td><em><?php echo $_smarty_tpl->tpl_vars['smtp_from_email']->value;?>
</em></td>
		<td>&nbsp;</td>
	</tr>
	<tr>
		<td class="label"><label><?php echo $_smarty_tpl->tpl_vars['PALANG']->value['pSendmail_to'];?>
:</label></td>
		<td><input class="flat" type="text" name="fTo" /></td>
		<td>&nbsp;</td>
	</tr>
	<tr>
		<td class="label"><label><?php echo $_smarty_tpl->tpl_vars['PALANG']->value['subject'];?>
:</label></td>
		<td><input class="flat" type="text" name="fSubject" value="<?php echo $_smarty_tpl->tpl_vars['PALANG']->value['pSendmail_subject_text'];?>
" /></td>
		<td>&nbsp;</td>
	</tr>
	<tr>
		<td class="label"><label><?php echo $_smarty_tpl->tpl_vars['PALANG']->value['pSendmail_body'];?>
:</label></td>
		<td>
		<textarea class="flat" rows="10" cols="60" name="fBody"><?php echo $_smarty_tpl->tpl_vars['CONF']->value['welcome_text'];?>
</textarea>
		</td>
		<td>&nbsp;</td>
	</tr>
	<tr>
		<td class="label">&nbsp;</td>
		<td colspan="2"><input class="button" type="submit" name="submit" value="<?php echo $_smarty_tpl->tpl_vars['PALANG']->value['pSendmail_button'];?>
" /></td>
	</tr>
</table>
</form>
</div>
<?php }} ?>
