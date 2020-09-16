<?php
/* Smarty version 3.1.34-dev-7, created on 2020-06-10 14:14:19
  from 'D:\Program Files\XAMPP\htdocs\projekt\templates\zaboravljena.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5ee0ce9ba6aa50_79869935',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a9ebe371041828861ebd90a9ab5396c01c475ef8' => 
    array (
      0 => 'D:\\Program Files\\XAMPP\\htdocs\\projekt\\templates\\zaboravljena.tpl',
      1 => 1591791258,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5ee0ce9ba6aa50_79869935 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="prijavaBox">
    <fieldset>
        <div class="gumbDiv">
            <h6>Nova lozinka bit će poslana na vašu e-mail adresu</h6>
         </div>
        <form id="nova" class="prijavaForm" action="../php/zaboravljena.php" method="POST">
            <input type="text" id="user" name="user" autocomplete="off" placeholder="Korisničko ime"><br>
            <div class="gumbDiv">
                <input class="formGumb" type="submit" name="submit" value="Pošalji">
            </div>
        </form>
    </fieldset>
</div><?php }
}
