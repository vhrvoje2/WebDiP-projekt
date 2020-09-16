<div class="search">
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
    {section name=i loop=$igraci}
    <div class="galerijaCard">
        {if $igraci[i][3]}
        <div class="cardImg"><img src={$igraci[i][0]} alt="Slika igrača" class="cardImage"></div>
        {else}
        <div class="cardImg">
        <img src="https://riteshkumarreddykuchukulla.files.wordpress.com/2019/02/private-580x389.jpg" alt="Slika igrača" class="cardImage">
        </div>
        {/if}
        <h3 class="cardName">{$igraci[i][1]} {$igraci[i][2]}</h3>
    </div>
    {/section}
</div>