<fieldset class="moderacija">
    <legend><strong>Klub:</strong></legend>
    <div class="gumbDiv">
        {if !empty($klubovi)}
            <select name="klub" id="klub">
                {section name=i loop=$klubovi}
                    <option value={$klubovi[i][0]}>{$klubovi[i][1]}</option>
                {/section}
            </select>
        {else}
            <h3>Niste moderator ni jednom klubu</h3>
        {/if}
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
            {section name=i loop=$stat}
                <option value={$stat[i][0]}>{$stat[i][1]}</option>
            {/section}
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
</div>