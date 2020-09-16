<div class="transferContainer">
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
            {section name=i loop=$sportovi}
                <option value={$sportovi[i][0]}>{$sportovi[i][1]}</option>
            {/section}
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
                    {section name=i loop=$moderatori}
                        <option value={$moderatori[i][0]}>{$moderatori[i][1]}</option>
                    {/section}
                </select>
            </div>
            <div>
                <div class="gumbDiv">
                    <label for="klub">Klub:</label>
                </div>
                <select name="klub" id="klub">
                    {section name=i loop=$klubovi}
                        <option value={$klubovi[i][0]}>{$klubovi[i][1]}</option>
                    {/section}
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
</div>