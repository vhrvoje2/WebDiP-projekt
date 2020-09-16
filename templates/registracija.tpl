<div class="registracijaBox">
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
                {if isset($greske)}
                    {foreach from=$greske item=greska}
                        <p class="greske">{$greska}</p>
                    {/foreach}
                {/if}
                <p class="uspjeh">{$uspjeh}</p>
            </div>
        </form>
    </fieldset>
</div>