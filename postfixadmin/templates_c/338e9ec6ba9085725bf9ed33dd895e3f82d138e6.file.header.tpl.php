<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-06-03 02:47:52
         compiled from "/var/www/hulea/public_html/postfixadmin/templates/header.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1365593286556e6ad8da3f74-71675493%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '338e9ec6ba9085725bf9ed33dd895e3f82d138e6' => 
    array (
      0 => '/var/www/hulea/public_html/postfixadmin/templates/header.tpl',
      1 => 1433296740,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1365593286556e6ad8da3f74-71675493',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'CONF' => 0,
    'smarty_template' => 0,
    'table' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_556e6ad8df9d15_36461378',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_556e6ad8df9d15_36461378')) {function content_556e6ad8df9d15_36461378($_smarty_tpl) {?><!-- <?php echo basename($_smarty_tpl->source->filepath);?>
 -->
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['CONF']->value['theme_css'];?>
" />
<?php if ($_smarty_tpl->tpl_vars['CONF']->value['theme_custom_css']) {?>
		<link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['CONF']->value['theme_custom_css'];?>
" />
<?php }?>
		<title>Postfix Admin - <?php echo $_SERVER['HTTP_HOST'];?>
</title>
	</head>
	<body class="lang-<?php echo $_SESSION['lang'];?>
 page-<?php echo $_smarty_tpl->tpl_vars['smarty_template']->value;?>
 <?php if (isset($_smarty_tpl->tpl_vars['table']->value)) {?>page-<?php echo $_smarty_tpl->tpl_vars['smarty_template']->value;?>
-<?php echo $_smarty_tpl->tpl_vars['table']->value;
}?>">
		<div id="container">
		<div id="login_header">
		<a href='main.php'><img id="login_header_logo" src="<?php echo $_smarty_tpl->tpl_vars['CONF']->value['theme_logo'];?>
" alt="Logo" /></a>
<?php if ($_smarty_tpl->tpl_vars['CONF']->value['show_header_text']==='YES'&&$_smarty_tpl->tpl_vars['CONF']->value['header_text']) {?>
		<h2><?php echo $_smarty_tpl->tpl_vars['CONF']->value['header_text'];?>
</h2>
<?php }?>
		</div>
<?php }} ?>
