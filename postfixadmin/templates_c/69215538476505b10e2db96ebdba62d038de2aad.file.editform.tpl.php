<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-06-03 02:48:15
         compiled from "/var/www/hulea/public_html/postfixadmin/templates/editform.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1594464974556e6aef739e00-86423883%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '69215538476505b10e2db96ebdba62d038de2aad' => 
    array (
      0 => '/var/www/hulea/public_html/postfixadmin/templates/editform.tpl',
      1 => 1433296739,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1594464974556e6aef739e00-86423883',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'table' => 0,
    'formtitle' => 0,
    'struct' => 0,
    'field' => 0,
    'key' => 0,
    'field2' => 0,
    'fielderror' => 0,
    'submitbutton' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_556e6aef89f7e7_23764896',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_556e6aef89f7e7_23764896')) {function content_556e6aef89f7e7_23764896($_smarty_tpl) {?><?php if (!is_callable('smarty_function_html_options')) include '/var/www/hulea/public_html/postfixadmin/smarty/libs/plugins/function.html_options.php';
if (!is_callable('smarty_function_html_checkboxes')) include '/var/www/hulea/public_html/postfixadmin/smarty/libs/plugins/function.html_checkboxes.php';
?><div id="edit_form">
<form name="edit_<?php echo $_smarty_tpl->tpl_vars['table']->value;?>
" method="post" action="">
<input class="flat" type="hidden" name="table" value="<?php echo $_smarty_tpl->tpl_vars['table']->value;?>
" />

<table>
	<tr>
		<th colspan="4"><?php echo $_smarty_tpl->tpl_vars['formtitle']->value;?>
</th>
	</tr>

<?php  $_smarty_tpl->tpl_vars['field'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['field']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['struct']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['field']->key => $_smarty_tpl->tpl_vars['field']->value) {
$_smarty_tpl->tpl_vars['field']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['field']->key;
?>
	<?php if ($_smarty_tpl->tpl_vars['field']->value['display_in_form']==1) {?>

		<?php if ($_smarty_tpl->tpl_vars['table']->value=='foo'&&$_smarty_tpl->tpl_vars['key']->value=='bar') {?>
			<tr><td>Special handling (complete table row) for <?php echo $_smarty_tpl->tpl_vars['table']->value;?>
 / <?php echo $_smarty_tpl->tpl_vars['key']->value;?>
</td></tr>
		<?php } else { ?>
			<tr>
				<td class="label"><?php echo $_smarty_tpl->tpl_vars['field']->value['label'];?>
</td>
				<td>
				<?php if ($_smarty_tpl->tpl_vars['field']->value['editable']==0) {?>
					<?php echo $_smarty_tpl->tpl_vars['value_'.($_smarty_tpl->tpl_vars['key']->value)]->value;?>

				<?php } else { ?>
					<?php if ($_smarty_tpl->tpl_vars['table']->value=='foo'&&$_smarty_tpl->tpl_vars['key']->value=='bar') {?>
						Special handling (td content) for <?php echo $_smarty_tpl->tpl_vars['table']->value;?>
 / <?php echo $_smarty_tpl->tpl_vars['key']->value;?>

					<?php } elseif ($_smarty_tpl->tpl_vars['field']->value['type']=='bool') {?>
						<input class="flat" type="checkbox" value='1' name="value[<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
]"<?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['value_'.($_smarty_tpl->tpl_vars['key']->value)]->value;?>
<?php $_tmp1=ob_get_clean();?><?php if ($_tmp1==1) {?> checked="checked"<?php }?>/>
					<?php } elseif ($_smarty_tpl->tpl_vars['field']->value['type']=='enum') {?>
						<select class="flat" name="value[<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
]">
						<?php echo smarty_function_html_options(array('output'=>$_smarty_tpl->tpl_vars['struct']->value[$_smarty_tpl->tpl_vars['key']->value]['options'],'values'=>$_smarty_tpl->tpl_vars['struct']->value[$_smarty_tpl->tpl_vars['key']->value]['options'],'selected'=>$_smarty_tpl->tpl_vars['value_'.($_smarty_tpl->tpl_vars['key']->value)]->value),$_smarty_tpl);?>

						</select>
					<?php } elseif ($_smarty_tpl->tpl_vars['field']->value['type']=='list') {?>
						<select class="flat" name="value[<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
][]" size="10" multiple="multiple">
						<?php echo smarty_function_html_options(array('output'=>$_smarty_tpl->tpl_vars['struct']->value[$_smarty_tpl->tpl_vars['key']->value]['options'],'values'=>$_smarty_tpl->tpl_vars['struct']->value[$_smarty_tpl->tpl_vars['key']->value]['options'],'selected'=>$_smarty_tpl->tpl_vars['value_'.($_smarty_tpl->tpl_vars['key']->value)]->value),$_smarty_tpl);?>

						</select>

<!-- alternative: 
						<div style='max-height:30em; overflow:auto;'>
							<?php echo smarty_function_html_checkboxes(array('name'=>"value[".((string)$_smarty_tpl->tpl_vars['key']->value)."]",'output'=>$_smarty_tpl->tpl_vars['struct']->value[$_smarty_tpl->tpl_vars['key']->value]['options'],'values'=>$_smarty_tpl->tpl_vars['struct']->value[$_smarty_tpl->tpl_vars['key']->value]['options'],'selected'=>$_smarty_tpl->tpl_vars['value_'.($_smarty_tpl->tpl_vars['key']->value)]->value,'separator'=>"<br />"),$_smarty_tpl);?>

						</div>
-->
					<?php } elseif ($_smarty_tpl->tpl_vars['field']->value['type']=='pass') {?>
						<input class="flat" type="password" name="value[<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
]" />
					<?php } elseif ($_smarty_tpl->tpl_vars['field']->value['type']=='txtl') {?>
						<textarea class="flat" rows="10" cols="35" name="value[<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
]"><?php  $_smarty_tpl->tpl_vars['field2'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['field2']->_loop = false;
 $_smarty_tpl->tpl_vars['key2'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['value_'.($_smarty_tpl->tpl_vars['key']->value)]->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['field2']->key => $_smarty_tpl->tpl_vars['field2']->value) {
$_smarty_tpl->tpl_vars['field2']->_loop = true;
 $_smarty_tpl->tpl_vars['key2']->value = $_smarty_tpl->tpl_vars['field2']->key;
echo $_smarty_tpl->tpl_vars['field2']->value;?>

<?php } ?></textarea>
					<?php } else { ?>
						<input class="flat" type="text" name="value[<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
]" value="<?php echo $_smarty_tpl->tpl_vars['value_'.($_smarty_tpl->tpl_vars['key']->value)]->value;?>
" />
					<?php }?>
				<?php }?>	
				</td>
				<td><?php echo $_smarty_tpl->tpl_vars['field']->value['desc'];?>
</td>
				<td class="error_msg"><?php echo $_smarty_tpl->tpl_vars['fielderror']->value[$_smarty_tpl->tpl_vars['key']->value];?>
</td>
			</tr>
		<?php }?>

	<?php }?>
<?php } ?>

	<tr>
		<td>&nbsp;</td>
		<td colspan="3"><input class="button" type="submit" name="submit" value="<?php echo $_smarty_tpl->tpl_vars['submitbutton']->value;?>
" /></td>
	</tr>
</table>

</form>
</div>
<?php }} ?>
