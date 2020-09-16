<?php
/* Smarty version 3.1.34-dev-7, created on 2020-06-09 17:41:47
  from 'D:\Program Files\XAMPP\htdocs\projekt\templates\header.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5edfadbb1eda15_27421719',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '0f773ade942a389da07632852a80248b824631ee' => 
    array (
      0 => 'D:\\Program Files\\XAMPP\\htdocs\\projekt\\templates\\header.tpl',
      1 => 1591717261,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5edfadbb1eda15_27421719 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="hr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['putanja']->value;?>
/./css/style.css">
    <?php echo '<script'; ?>
 src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['putanja']->value;?>
/./javascript/script.js"><?php echo '</script'; ?>
>
    <title><?php echo $_smarty_tpl->tpl_vars['naslov']->value;?>
</title>
</head>
<body>
    <div class="mainGrid">
        <div class="mainHeader">
            <img src="<?php echo $_smarty_tpl->tpl_vars['putanja']->value;?>
/./multimedija/logo.png" alt="Logo" class="logoImg">
            <h1 class="headerNaslov">
                TransferHUB
            </h1>
        </div>
        <div class="navBox">
            <ul class="navList">
                <li class="navElement"><a href="<?php echo $_smarty_tpl->tpl_vars['putanja']->value;?>
/./index.php" class="navLink">Početna</a></li>
                <?php if (!isset($_SESSION['uloga'])) {?>
                    <li class="navElement"><a href="<?php echo $_smarty_tpl->tpl_vars['putanja']->value;?>
/./php/prijava.php" class="navLink">Prijava</a></li>
                    <li class="navElement"><a href="<?php echo $_smarty_tpl->tpl_vars['putanja']->value;?>
/./php/registracija.php" class="navLink">Registracija</a></li>
                <?php }?>
                <li class="navElement"><a href="<?php echo $_smarty_tpl->tpl_vars['putanja']->value;?>
/./php/klubovi.php" class="navLink">Klubovi</a></li>
                <li class="navElement"><a href="<?php echo $_smarty_tpl->tpl_vars['putanja']->value;?>
/./php/galerija.php" class="navLink">Galerija</a></li>
                <?php if (isset($_SESSION['uloga'])) {?>
                    <li class="navElement"><a href="<?php echo $_smarty_tpl->tpl_vars['putanja']->value;?>
/./php/profil.php" class="navLink">Profil</a></li>  
                <?php }?>
                <?php if (isset($_SESSION['uloga']) && $_SESSION['uloga'] < 3) {?>
                    <li class="navElement"><a href="<?php echo $_smarty_tpl->tpl_vars['putanja']->value;?>
/./php/moderacija.php" class="navLink">Moderacija</a></li>  
                <?php }?>
                <?php if (isset($_SESSION['uloga']) && $_SESSION['uloga'] < 2) {?>
                    <li class="navElement"><a href="<?php echo $_smarty_tpl->tpl_vars['putanja']->value;?>
/./php/admin.php" class="navLink">Administracija</a></li>  
                    <li class="navElement"><a href="<?php echo $_smarty_tpl->tpl_vars['putanja']->value;?>
/./php/crud.php" class="navLink">CRUD</a></li>
                <?php }?>
                <li class="navElement"><a href="<?php echo $_smarty_tpl->tpl_vars['putanja']->value;?>
/./o_autoru.html" class="navLink">O autoru</a></li>
                <li class="navElement"><a href="<?php echo $_smarty_tpl->tpl_vars['putanja']->value;?>
/./dokumentacija.html" class="navLink">Dokumentacija</a></li>
                <?php if (isset($_SESSION['uloga'])) {?> 
                    <li class="navElement"><a href="<?php echo $_smarty_tpl->tpl_vars['putanja']->value;?>
/./php/odjava.php" class="navLink">Odjava [<?php echo $_SESSION['korisnik'];?>
]</a></li>  
                <?php }?>
            </ul>
        </div>
        <div class="wideContent"><?php }
}
