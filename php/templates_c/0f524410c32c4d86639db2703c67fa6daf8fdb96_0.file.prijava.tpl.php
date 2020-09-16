<?php
/* Smarty version 3.1.34-dev-7, created on 2020-06-10 14:04:41
  from 'D:\Program Files\XAMPP\htdocs\projekt\templates\prijava.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5ee0cc59cbc321_51653633',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '0f524410c32c4d86639db2703c67fa6daf8fdb96' => 
    array (
      0 => 'D:\\Program Files\\XAMPP\\htdocs\\projekt\\templates\\prijava.tpl',
      1 => 1591790487,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5ee0cc59cbc321_51653633 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="prijavaBox">
    <fieldset>
        <form id="prijava" class="prijavaForm" action="../php/prijava.php" method="POST">
            <input type="text" id="username" name="username" autocomplete="off" placeholder="Korisničko ime"><br>
            <input type="password" id="password" name="password" autocomplete="off" placeholder="Lozinka"><br>
            <div class="gumbDiv">
                <input type="checkbox" id="zapamti" name="zapamti" value="1">
                <label for="zapamti">Zapamti me</label>
            </div>
            <div class="gumbDiv">
                <input class="formGumb" type="submit" name="submit" value="Prijavi se">
            </div>
            <div class="gumbDiv">
                <a class="navLink" href="../php/zaboravljena.php"><h5>Zaboravljena lozinka?</h5></a>
            </div>
            <div class="greskeDiv">
                <p class="greske"><?php echo $_smarty_tpl->tpl_vars['greske']->value;?>
</p>
            </div>
        </form>
    </fieldset>
</div><?php }
}
