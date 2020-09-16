{if empty($profil)}
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
                        {section name=i loop=$sportovi}
                            <option value={$sportovi[i][0]}>{$sportovi[i][1]}</option>
                        {/section}
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
{else}
    <div class="playerContainer">
        <div class="playerCard">
            <div class="playerImgDiv">
                <img src={$profil["slika"]} alt="Slika igrača" class="playerImage">
                <h4 class="playerInfo">{$profil["ime"]} {$profil["prezime"]}</h4>
                <h5 class="playerInfo">{$profil["pozicija"]}</h5>
            </div>
            <div class="playerInfoDiv">
                <div class="playerInfoBox">
                    <h5>Nacionalnost</h5>
                    <h4 class="playerInfo">{$profil["nacionalnost"]}</h4>
                    <h5>Godina rođenja</h5>
                    <h4 class="playerInfo">{$profil["godina_rodenja"]}</h4>
                    <h5>Mjesto rođenja</h5>
                    <h4 class="playerInfo">{$profil["mjesto_rodenja"]}</h4>
                </div>
                
                <div class="playerInfoBox">
                    <h5>Cijena</h5>
                    <h4 class="playerInfo">{$profil["cijena"]} EUR</h4>
                    <h5>Ocjena</h5>
                    <h4 class="playerInfo">{$profil["ocjena"]}</h4>
                    <h5>Odigrano minuta</h5>
                    <h4 class="playerInfo">{$profil["odigrano_minuta"]}</h4>
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
{/if}

{* array(14) { 
["profil_id"]=> string(1) "1"               0
["ime"]=> string(4) "Luka"                  1
["prezime"]=> string(7) "Modrić"            2
["slika"]=> string(75) "https://gsports.live/football/wp-content/uploads/sites/2/2016/09/MODRIC.jpg" 
["nacionalnost"]=> string(5) "Hrvat"        4
["godina_rodenja"]=> string(4) "1985"       5
["mjesto_rodenja"]=> string(5) "Zadar"      6
["pozicija"]=> string(7) "veznjak"          7
["cijena"]=> string(9) "120000000"          8
["ocjena"]=> string(1) "9"                  9
["odigrano_minuta"]=> string(4) "1546"      10
["privola"]=> string(1) "1"                 11
["klub_id"]=> string(1) "1"                 12
["sport_id"]=> string(1) "1" }              13
*}