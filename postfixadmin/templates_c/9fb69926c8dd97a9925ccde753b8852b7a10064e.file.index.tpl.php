<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-06-03 02:47:52
         compiled from "/var/www/hulea/public_html/postfixadmin/templates/index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1778022499556e6ad8bb5695-88353893%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9fb69926c8dd97a9925ccde753b8852b7a10064e' => 
    array (
      0 => '/var/www/hulea/public_html/postfixadmin/templates/index.tpl',
      1 => 1433296741,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1778022499556e6ad8bb5695-88353893',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'smarty_template' => 0,
    'authentication_has_role' => 0,
    'CONF' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_556e6ad8d9ad62_14353278',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_556e6ad8d9ad62_14353278')) {function content_556e6ad8d9ad62_14353278($_smarty_tpl) {?><!-- <?php echo basename($_smarty_tpl->source->filepath);?>
 -->
<?php echo $_smarty_tpl->getSubTemplate ("header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);
if ($_smarty_tpl->tpl_vars['smarty_template']->value!='login') {
$_config = new Smarty_Internal_Config("menu.conf", $_smarty_tpl->smarty, $_smarty_tpl);$_config->loadConfigVars($_smarty_tpl->tpl_vars['smarty_template']->value, 'local');
if ($_smarty_tpl->tpl_vars['authentication_has_role']->value['user']) {
echo $_smarty_tpl->getSubTemplate ('users_menu.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);
} else {
echo $_smarty_tpl->getSubTemplate ('menu.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);
}
}?><br clear="all" /><?php if ($_smarty_tpl->tpl_vars['authentication_has_role']->value['user']&&$_smarty_tpl->tpl_vars['CONF']->value['motd_user']) {?><div id="motd"><?php echo $_smarty_tpl->tpl_vars['CONF']->value['motd_user'];?>
</div><?php } elseif ($_smarty_tpl->tpl_vars['authentication_has_role']->value['global_admin']&&$_smarty_tpl->tpl_vars['CONF']->value['motd_superadmin']) {?><div id="motd"><?php echo $_smarty_tpl->tpl_vars['CONF']->value['motd_superadmin'];?>
</div><?php } elseif ($_smarty_tpl->tpl_vars['authentication_has_role']->value['admin']&&$_smarty_tpl->tpl_vars['CONF']->value['motd_admin']) {?><div id="motd"><?php echo $_smarty_tpl->tpl_vars['CONF']->value['motd_admin'];?>
</div><?php }
echo $_smarty_tpl->getSubTemplate ('flash_error.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);
if ($_smarty_tpl->tpl_vars['smarty_template']->value) {
echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['smarty_template']->value).".tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);
} else { ?><h3>Template not found</h3>(<?php echo htmlspecialchars($_SERVER['PHP_SELF'], ENT_QUOTES, 'UTF-8', true);?>
)<?php }
echo $_smarty_tpl->getSubTemplate ('footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php }} ?>
