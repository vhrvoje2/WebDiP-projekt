<?php
/* Smarty version 3.1.34-dev-7, created on 2020-06-09 17:14:53
  from 'D:\Program Files\XAMPP\htdocs\projekt\templates\profil.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5edfa76d5b91b3_44876454',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '5fdd07411ccc25d0a2e39a7b9441c254c6d48aa6' => 
    array (
      0 => 'D:\\Program Files\\XAMPP\\htdocs\\projekt\\templates\\profil.tpl',
      1 => 1591715692,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5edfa76d5b91b3_44876454 (Smarty_Internal_Template $_smarty_tpl) {
if (empty($_smarty_tpl->tpl_vars['profil']->value)) {?>
    <div class="profilHeader">
        <h2>Novi profil</h2>
    </div>
    <div class="profilBox">
        <fieldset>
            <form id="profil" class="registracijaForm" action="../php/profil.php" method="POST">
                <input type="text" id="ime" name="ime" autocomplete="off" placeholder="Ime"><br>
                <input type="text" id="prezime" name="prezime" autocomplete="off" placeholder="Prezime"><br>
                <input type="text" id="slika" name="slika" autocomplete="off" placeholder="Link slike"><br>
                <input type="text" id="nacionalnost" name="nacionalnost" autocomplete="off" placeholder="Nacionalnost"><br>
                <input type="text" id="mjesto" name="mjesto" autocomplete="off" placeholder="Mjesto rođenja"><br>
                <input type="text" id="pozicija" name="pozicija" autocomplete="off" placeholder="Pozicija"><br>
                <input type="text" id="minute" name="minute" autocomplete="off" placeholder="Odigrano minuta"><br>
                <div class="gumbDiv">
                    <label for="godrod">Godina rođenja:</label><br>
                </div>
                <div class="gumbDiv">
                    <input type="number" id="godrod" name="godrod" autocomplete="off" value="1990" min="1950" max="2020">
                </div>
                <div class="gumbDiv">
                    <label for="sport">Sport:</label><br>
                </div>
                <div class="gumbDiv">
                    <select name="sport" id="sport">
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
                    <label for="ocjena">Ocjena:</label><br>
                </div>
                <div class="gumbDiv">
                    <select name="ocjena" id="ocjena">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                        <option value="9">9</option>
                        <option value="10">10</option>
                    </select>
                </div>
                <div class="gumbDiv">
                    <label for="privola">Privola za sliku:</label><br>
                </div>
                <div class="gumbDiv">
                    <select name="privola" id="privola">
                        <option value="1">Da</option>
                        <option value="0">Ne</option>
                    </select>
                </div>
                <div class="gumbDiv">
                    <input id="gumb" class="formGumb" type="submit" name="submit" value="Stvori profil">
                </div>
            </form>
        </fieldset>
    </div>
<?php } else { ?>
    <div class="playerContainer">
        <div class="playerCard">
            <div class="playerImgDiv">
                <img src=<?php echo $_smarty_tpl->tpl_vars['profil']->value["slika"];?>
 alt="Slika igrača" class="playerImage">
                <h4 class="playerInfo"><?php echo $_smarty_tpl->tpl_vars['profil']->value["ime"];?>
 <?php echo $_smarty_tpl->tpl_vars['profil']->value["prezime"];?>
</h4>
                <h5 class="playerInfo"><?php echo $_smarty_tpl->tpl_vars['profil']->value["pozicija"];?>
</h5>
            </div>
            <div class="playerInfoDiv">
                <div class="playerInfoBox">
                    <h5>Nacionalnost</h5>
                    <h4 class="playerInfo"><?php echo $_smarty_tpl->tpl_vars['profil']->value["nacionalnost"];?>
</h4>
                    <h5>Godina rođenja</h5>
                    <h4 class="playerInfo"><?php echo $_smarty_tpl->tpl_vars['profil']->value["godina_rodenja"];?>
</h4>
                    <h5>Mjesto rođenja</h5>
                    <h4 class="playerInfo"><?php echo $_smarty_tpl->tpl_vars['profil']->value["mjesto_rodenja"];?>
</h4>
                </div>
                
                <div class="playerInfoBox">
                    <h5>Cijena</h5>
                    <h4 class="playerInfo"><?php echo $_smarty_tpl->tpl_vars['profil']->value["cijena"];?>
 EUR</h4>
                    <h5>Ocjena</h5>
                    <h4 class="playerInfo"><?php echo $_smarty_tpl->tpl_vars['profil']->value["ocjena"];?>
</h4>
                    <h5>Odigrano minuta</h5>
                    <h4 class="playerInfo"><?php echo $_smarty_tpl->tpl_vars['profil']->value["odigrano_minuta"];?>
</h4>
                </div>
            </div>
        </div>
    </div>
    <div class="transferContainer">
        <div class="transferi">
            <table class="tablicaDiv">
                <caption>Povijest transfera</caption>
            
                <thead class="tablicaZaglavlje">
                    <tr>
                        <th class="tablicaHeader"></th>
                        <th class="tablicaHeader">Klub</th>
                        <th class="tablicaHeader">Datum transfera</th>
                    </tr>
                </thead>
                <tbody class="tablicaTijelo" id="povijestTable">
                </tbody>
            </table>
        </div>
        <div class="transferi">
            <table class="tablicaDiv">
                <caption>Ponude za kupnju</caption>

                <thead class="tablicaZaglavlje">
                    <tr>
                        <th class="tablicaHeader"></th>
                        <th class="tablicaHeader">Klub</th>
                        <th class="tablicaHeader">Iznos</th>
                        <th class="tablicaHeader"></th>
                        <th class="tablicaHeader"></th>
                    </tr>
                </thead>
                <tbody class="tablicaTijelo" id="ponudeTable">
                </tbody>
            </table>
        </div>
    </div>
    <div class="transferContainer">
        <div class="transferi">
            <table class="tablicaDiv">
                <caption>Zatraži napuštanje kluba</caption>
            
                <thead class="tablicaZaglavlje">
                    <tr>
                        <th class="tablicaHeader"></th>
                        <th class="tablicaHeader">Trenutni klub</th>
                        <th class="tablicaHeader"></th>
                    </tr>
                </thead>
                <tbody class="tablicaTijelo" id="napustiTable">
                </tbody>
            </table>
        </div>
        <div class="transferi">
            <table class="tablicaDiv">
                <caption>Zahtjev za transferom</caption>
            
                <thead class="tablicaZaglavlje">
                    <tr>
                        <th class="tablicaHeader"></th>
                        <th class="tablicaHeader">Klub</th>
                        <th class="tablicaHeader">Iznos</th>
                        <th class="tablicaHeader"></th>
                        <th class="tablicaHeader"></th>
                    </tr>
                </thead>
                <tbody class="tablicaTijelo" id="transferiTable">
                </tbody>
            </table>
        </div>
    </div>
<?php }?>

<?php }
}
