<?php
/* Smarty version 3.1.34-dev-7, created on 2020-06-10 20:43:04
  from 'D:\Program Files\XAMPP\htdocs\projekt\templates\admin.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5ee129b8f1e486_26382604',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f392461a03756ae7c47b6ff75223affec5c1c341' => 
    array (
      0 => 'D:\\Program Files\\XAMPP\\htdocs\\projekt\\templates\\admin.tpl',
      1 => 1591814584,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5ee129b8f1e486_26382604 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="transferContainer">
    <fieldset class="moderacija">
        <legend><strong>Unos novog sporta:</strong></legend>
        <div class="gumbDiv">
            <input type="text" id="nazivS" name="nazivS" autocomplete="off" placeholder="Naziv sporta"><br>
            <input type="text" id="brojS" name="brojS" autocomplete="off" placeholder="Broj igrača"><br>
            <input type="text" id="tijeloS" name="tijeloS" autocomplete="off" placeholder="Nadzorno tijelo"><br>
            </div>  
            <div class="gumbDiv">
            <textarea name="opisS" id="opisS" cols="80" rows="8" placeholder="Opis"></textarea>
        </div>
        <div class="gumbDiv">
            <div class="gumbDiv">
                <input class="formGumb" type="submit" name="sportS" id="sportS" value="Unesi"> 
            </div>
        </div>
    </fieldset>
</div>
<div class="transferContainer">
    <fieldset class="moderacija">
        <legend><strong>Unos novog kluba:</strong></legend>
        <div class="gumbDiv">
            <input type="text" id="nazivK" name="nazivK" autocomplete="off" placeholder="Naziv kluba"><br>
            <input type="text" id="oznakaK" name="oznakaK" autocomplete="off" placeholder="Oznaka kluba"><br>
            <input type="text" id="logoK" name="logoK" autocomplete="off" placeholder="Logo link"><br>
        </div>  
        <div class="gumbDiv">
            <input type="text" id="godK" name="godK" autocomplete="off" placeholder="Godina osnivanja"><br>
            <input type="text" id="trenerK" name="trenerK" autocomplete="off" placeholder="Ime trenera"><br>
            <input type="text" id="stradionK" name="stradionK" autocomplete="off" placeholder="Naziv stadiona"><br>
        </div>
        <div class="gumbDiv">
            <label for="sportK">Sport:</label>
        </div>
        <div class="gumbDiv">
            <select name="sportK" id="sportK">
            <?php
$__section_i_0_loop = (is_array(@$_loop=$_smarty_tpl->tpl_vars['sportovi']->value) ? count($_loop) : max(0, (int) $_loop));
$__section_i_0_total = $__section_i_0_loop;
$_smarty_tpl->tpl_vars['__smarty_section_i'] = new Smarty_Variable(array());
if ($__section_i_0_total !== 0) {
for ($__section_i_0_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] = 0; $__section_i_0_iteration <= $__section_i_0_total; $__section_i_0_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']++){
?>
                <option value=<?php echo $_smarty_tpl->tpl_vars['sportovi']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)][0];?>
><?php echo $_smarty_tpl->tpl_vars['sportovi']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)][1];?>
</option>
            <?php
}
}
?>
            </select>
        </div>  
        <div class="gumbDiv">
            <div class="gumbDiv">
                <input class="formGumb" type="submit" name="klubS" id="klubS" value="Unesi"> 
            </div>
        </div>
    </fieldset>
</div>
<div class="transferContainer">
    <fieldset class="moderacija">
        <legend><strong>Dodijeljivanje moderatora:</strong></legend>
        <div class="gumbDiv">
            <div>
                <div class="gumbDiv">
                    <label for="mod">Moderator:</label>
                </div>
                <select name="mod" id="mod">
                    <?php
$__section_i_1_loop = (is_array(@$_loop=$_smarty_tpl->tpl_vars['moderatori']->value) ? count($_loop) : max(0, (int) $_loop));
$__section_i_1_total = $__section_i_1_loop;
$_smarty_tpl->tpl_vars['__smarty_section_i'] = new Smarty_Variable(array());
if ($__section_i_1_total !== 0) {
for ($__section_i_1_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] = 0; $__section_i_1_iteration <= $__section_i_1_total; $__section_i_1_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']++){
?>
                        <option value=<?php echo $_smarty_tpl->tpl_vars['moderatori']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)][0];?>
><?php echo $_smarty_tpl->tpl_vars['moderatori']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)][1];?>
</option>
                    <?php
}
}
?>
                </select>
            </div>
            <div>
                <div class="gumbDiv">
                    <label for="klub">Klub:</label>
                </div>
                <select name="klub" id="klub">
                    <?php
$__section_i_2_loop = (is_array(@$_loop=$_smarty_tpl->tpl_vars['klubovi']->value) ? count($_loop) : max(0, (int) $_loop));
$__section_i_2_total = $__section_i_2_loop;
$_smarty_tpl->tpl_vars['__smarty_section_i'] = new Smarty_Variable(array());
if ($__section_i_2_total !== 0) {
for ($__section_i_2_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] = 0; $__section_i_2_iteration <= $__section_i_2_total; $__section_i_2_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']++){
?>
                        <option value=<?php echo $_smarty_tpl->tpl_vars['klubovi']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)][0];?>
><?php echo $_smarty_tpl->tpl_vars['klubovi']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)][1];?>
</option>
                    <?php
}
}
?>
                </select>
            </div>

        </div>
        <div class="gumbDiv">
            <div class="gumbDiv">
                <input class="formGumb" type="submit" name="modD" id="modD" value="Dodijeli"> 
            </div>
        </div>
    </fieldset>
</div>
<div class="transferContainer">
    <div class="transferi">
        <table class="tablicaDiv">
            <caption>Zahtjevi za napuštanje kluba</caption>
        
            <thead class="tablicaZaglavlje">
                <tr>
                    <th class="tablicaHeader">Ime i prezime</th>
                    <th class="tablicaHeader">Klub</th>
                    <th class="tablicaHeader">Datum zahtjeva</th>
                    <th class="tablicaHeader"></th>
                    <th class="tablicaHeader"></th>
                </tr>
            </thead>
            <tbody class="tablicaTijelo" id="popisZahtjeva">
            </tbody>
        </table>
    </div>
</div><?php }
}
