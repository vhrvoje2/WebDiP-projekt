<?php
/* Smarty version 3.1.34-dev-7, created on 2020-06-09 19:06:01
  from 'D:\Program Files\XAMPP\htdocs\projekt\templates\moderacija.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5edfc17924f925_40956895',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'cbac5c2858905eeb6a8e510b9eec124128a4cc76' => 
    array (
      0 => 'D:\\Program Files\\XAMPP\\htdocs\\projekt\\templates\\moderacija.tpl',
      1 => 1591720088,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5edfc17924f925_40956895 (Smarty_Internal_Template $_smarty_tpl) {
?><fieldset class="moderacija">
    <legend><strong>Klub:</strong></legend>
    <div class="gumbDiv">
        <?php if (!empty($_smarty_tpl->tpl_vars['klubovi']->value)) {?>
            <select name="klub" id="klub">
                <?php
$__section_i_0_loop = (is_array(@$_loop=$_smarty_tpl->tpl_vars['klubovi']->value) ? count($_loop) : max(0, (int) $_loop));
$__section_i_0_total = $__section_i_0_loop;
$_smarty_tpl->tpl_vars['__smarty_section_i'] = new Smarty_Variable(array());
if ($__section_i_0_total !== 0) {
for ($__section_i_0_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] = 0; $__section_i_0_iteration <= $__section_i_0_total; $__section_i_0_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']++){
?>
                    <option value=<?php echo $_smarty_tpl->tpl_vars['klubovi']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)][0];?>
><?php echo $_smarty_tpl->tpl_vars['klubovi']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)][1];?>
</option>
                <?php
}
}
?>
            </select>
        <?php } else { ?>
            <h3>Niste moderator ni jednom klubu</h3>
        <?php }?>
    </div>
</fieldset>
<div class="transferContainer">
    <div class="transferi">
        <table class="tablicaDiv">
            <caption>Popis igrača u klubu</caption>
        
            <thead class="tablicaZaglavlje">
                <tr>
                    <th class="tablicaHeader">Ime i prezime</th>
                    <th class="tablicaHeader">Pozicija</th>
                    <th class="tablicaHeader">Cijena</th>
                    <th class="tablicaHeader">Odigrano minuta</th>
                    <th class="tablicaHeader">Ocjena</th>
                    <th class="tablicaHeader"></th>
                </tr>
            </thead>
            <tbody class="tablicaTijelo" id="popisIgraca">
            </tbody>
        </table>
    </div>
    <div class="transferi">
        <table class="tablicaDiv">
            <caption>Zahtjevi za transfer</caption>
        
            <thead class="tablicaZaglavlje">
                <tr>
                    <th class="tablicaHeader">Ime i prezime</th>
                    <th class="tablicaHeader">Iznos</th>
                    <th class="tablicaHeader">Klub</th>
                    <th class="tablicaHeader"></th>
                    <th class="tablicaHeader"></th>
                </tr>
            </thead>
            <tbody class="tablicaTijelo" id="popisZahtjeva">
            </tbody>
        </table>
    </div>
</div>
<div class="transferContainer">
    <div class="transferi">
        <table class="tablicaDiv">
            <caption>Popis slobodnih igrača</caption>
        
            <thead class="tablicaZaglavlje">
                <tr>
                    <th class="tablicaHeader">Ime i prezime</th>
                    <th class="tablicaHeader">Pozicija</th>
                    <th class="tablicaHeader">Cijena</th>
                    <th class="tablicaHeader">Odigrano minuta</th>
                    <th class="tablicaHeader">Ocjena</th>
                    <th class="tablicaHeader"></th>
                </tr>
            </thead>
            <tbody class="tablicaTijelo" id="popisSlobodnih">
            </tbody>
        </table>
    </div>
</div>
<div class="transferContainer">
    <div class="transferi">
        <table class="tablicaDiv">
            <caption>Popis igrača u drugim klubovima</caption>
        
            <thead class="tablicaZaglavlje">
                <tr>
                    <th class="tablicaHeader">Klub</th>
                    <th class="tablicaHeader">Ime i prezime</th>
                    <th class="tablicaHeader">Pozicija</th>
                    <th class="tablicaHeader">Cijena</th>
                    <th class="tablicaHeader">Odigrano minuta</th>
                    <th class="tablicaHeader">Ocjena</th>
                    <th class="tablicaHeader"></th>
                </tr>
            </thead>
            <tbody class="tablicaTijelo" id="popisZauzetih">
            </tbody>
        </table>
    </div>
</div>
<fieldset class="moderacija">
    <legend><strong>Statistika transfera:</strong></legend>
    <div class="gumbDiv">
        <select name="stat" id="stat">
            <?php
$__section_i_1_loop = (is_array(@$_loop=$_smarty_tpl->tpl_vars['stat']->value) ? count($_loop) : max(0, (int) $_loop));
$__section_i_1_total = $__section_i_1_loop;
$_smarty_tpl->tpl_vars['__smarty_section_i'] = new Smarty_Variable(array());
if ($__section_i_1_total !== 0) {
for ($__section_i_1_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] = 0; $__section_i_1_iteration <= $__section_i_1_total; $__section_i_1_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']++){
?>
                <option value=<?php echo $_smarty_tpl->tpl_vars['stat']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)][0];?>
><?php echo $_smarty_tpl->tpl_vars['stat']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)][1];?>
</option>
            <?php
}
}
?>
        </select>
    </div>
    <label for="od">Datum od:</label>
    <input type="date" id="od" name="od" value="2020-03-01">
    <label for="do">Datum do:</label>
    <input type="date" id="do" name="do" value="2020-06-09">
</fieldset>
<div class="transferContainer">
    <div class="transferi">
        <table class="tablicaDiv">
            <caption>Statistika transfera</caption>
        
            <thead class="tablicaZaglavlje">
                <tr>
                    <th class="tablicaHeader">Klub</th>
                    <th class="tablicaHeader">Ime i prezime</th>
                    <th class="tablicaHeader">Cijena</th>
                    <th class="tablicaHeader">Datum transfera</th>
                </tr>
            </thead>
            <tbody class="tablicaTijelo" id="popisTransfera">
            </tbody>
        </table>
    </div>
</div><?php }
}
