<?php
/* Smarty version 3.1.34-dev-7, created on 2020-06-06 11:12:00
  from 'D:\Program Files\XAMPP\htdocs\projekt\templates\registracija.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5edb5de04e2dc7_87816261',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '055bfe015eb68df1e5e349556223d9452a6d1fef' => 
    array (
      0 => 'D:\\Program Files\\XAMPP\\htdocs\\projekt\\templates\\registracija.tpl',
      1 => 1591434707,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5edb5de04e2dc7_87816261 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="registracijaBox">
    <fieldset>
        <form id="registracija" class="registracijaForm" action="../php/registracija.php" method="POST">
            <input type="text" id="ime" name="ime" autocomplete="off" placeholder="Ime"><br>
            <input type="text" id="prezime" name="prezime" autocomplete="off" placeholder="Prezime"><br>
            <input type="text" id="username" name="username" autocomplete="off" placeholder="Korisničko ime"><br>
            <input type="text" id="email" name="email" autocomplete="off" placeholder="E-mail"><br>
            <input type="password" id="password" name="password" autocomplete="off" placeholder="Lozinka"><br>
            <input type="password" id="ponpassword" name="ponpassword" autocomplete="off" placeholder="Ponovljena lozinka"><br>
            <div class="captchaDiv">
                <label for="code">CAPTCHA</label>
            </div>  
            <div class="captchaDiv">
                <div id="captcha"></div>
            </div>  
            <input type="text" id="code" name="code" autocomplete="off" placeholder="Unesite kod"><br>
            <div class="gumbDiv">
                <input id="gumb" class="formGumb" type="submit" name="submit" value="Registriraj se">
            </div>
            <div class="greskeDiv">
                <?php if (isset($_smarty_tpl->tpl_vars['greske']->value)) {?>
                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['greske']->value, 'greska');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['greska']->value) {
?>
                        <p class="greske"><?php echo $_smarty_tpl->tpl_vars['greska']->value;?>
</p>
                    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                <?php }?>
                <p class="uspjeh"><?php echo $_smarty_tpl->tpl_vars['uspjeh']->value;?>
</p>
            </div>
        </form>
    </fieldset>
</div><?php }
}
