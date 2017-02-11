<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-06-03 02:47:52
         compiled from "/var/www/hulea/public_html/postfixadmin/templates/flash_error.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1436666266556e6ad8dfc875-97367117%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '833589be731e36ab16851fd077c47dbae282b583' => 
    array (
      0 => '/var/www/hulea/public_html/postfixadmin/templates/flash_error.tpl',
      1 => 1433296739,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1436666266556e6ad8dfc875-97367117',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'msg' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_556e6ad8e5f695_72241342',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_556e6ad8e5f695_72241342')) {function content_556e6ad8e5f695_72241342($_smarty_tpl) {?><!-- <?php echo basename($_smarty_tpl->source->filepath);?>
 -->
<br clear="all"/><br />
<?php if (isset($_SESSION['flash'])) {
if (isset($_SESSION['flash']['info'])) {?><ul class="flash-info"><?php  $_smarty_tpl->tpl_vars['msg'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['msg']->_loop = false;
 $_from = $_SESSION['flash']['info']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['msg']->key => $_smarty_tpl->tpl_vars['msg']->value) {
$_smarty_tpl->tpl_vars['msg']->_loop = true;
?><li><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['msg']->value, ENT_QUOTES, 'UTF-8', true);?>
</li><?php } ?></ul><?php }
if (isset($_SESSION['flash']['error'])) {?><ul class="flash-error"><?php  $_smarty_tpl->tpl_vars['msg'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['msg']->_loop = false;
 $_from = $_SESSION['flash']['error']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['msg']->key => $_smarty_tpl->tpl_vars['msg']->value) {
$_smarty_tpl->tpl_vars['msg']->_loop = true;
?><li><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['msg']->value, ENT_QUOTES, 'UTF-8', true);?>
</li><?php } ?></ul><?php }
}?>
<?php }} ?>
