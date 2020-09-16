<?php
/* Smarty version 3.1.34-dev-7, created on 2020-06-05 20:45:06
  from 'D:\Program Files\XAMPP\htdocs\projekt\templates\galerija.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5eda92b257b030_89807273',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '3c1242ca40bece7ab86af7bc5d7b49514e42ab8d' => 
    array (
      0 => 'D:\\Program Files\\XAMPP\\htdocs\\projekt\\templates\\galerija.tpl',
      1 => 1591382705,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5eda92b257b030_89807273 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="search">
    <fieldset>
        <legend><strong>Pretraži profile:</strong></legend>
        <input type="text" id="pojam" name="pojam" autocomplete="off" placeholder="Pretraga"><br>
        <div>
            <label for="sort">Sortiraj po nazivu:</label>
            <select name="sort" id="sort">
                <option value="sport">Sporta</option>
                <option value="klub">Kluba</option>
            </select>

            <label for="filter">Sport:</label>
            <select name="filter" id="filter">
                <option value="Nogomet">Nogomet</option>
                <option value="Rukomet">Rukomet</option>
                <option value="Košarka">Košarka</option>
                <option value="Vaterpolo">Vaterpolo</option>
                <option value="Hokej">Hokej na ledu</option>
                <option value="Odbojka">Odbojka</option>
                <option value="Američki nogomet">Američki nogomet</option>
                <option value="Bejzbol">Bejzbol</option>
                <option value="Kriket">Kriket</option>
                <option value="Lacrosse">Lacrosse</option>
            </select>    
        </div>    
    </fieldset>
</div>

<div class="galerija">
    <?php
$__section_i_0_loop = (is_array(@$_loop=$_smarty_tpl->tpl_vars['igraci']->value) ? count($_loop) : max(0, (int) $_loop));
$__section_i_0_total = $__section_i_0_loop;
$_smarty_tpl->tpl_vars['__smarty_section_i'] = new Smarty_Variable(array());
if ($__section_i_0_total !== 0) {
for ($__section_i_0_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] = 0; $__section_i_0_iteration <= $__section_i_0_total; $__section_i_0_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']++){
?>
    <div class="galerijaCard">
        <?php if ($_smarty_tpl->tpl_vars['igraci']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)][3]) {?>
        <div class="cardImg"><img src=<?php echo $_smarty_tpl->tpl_vars['igraci']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)][0];?>
 alt="Slika igrača" class="cardImage"></div>
        <?php } else { ?>
        <div class="cardImg">
        <img src="https://riteshkumarreddykuchukulla.files.wordpress.com/2019/02/private-580x389.jpg" alt="Slika igrača" class="cardImage">
        </div>
        <?php }?>
        <h3 class="cardName"><?php echo $_smarty_tpl->tpl_vars['igraci']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)][1];?>
 <?php echo $_smarty_tpl->tpl_vars['igraci']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)][2];?>
</h3>
    </div>
    <?php
}
}
?>
</div><?php }
}
