<div class="prijavaBox">
    <fieldset>
        <form id="prijava" class="prijavaForm" action="../php/prijava.php" method="POST">
            <input type="text" id="username" name="username" autocomplete="off" placeholder="Korisničko ime"><br>
            <input type="password" id="password" name="password" autocomplete="off" placeholder="Lozinka"><br>
            <div class="gumbDiv">
                <input type="checkbox" id="zapamti" name="zapamti" value="1">
                <label for="zapamti">Zapamti me</label>
            </div>
            <div class="gumbDiv">
                <input class="formGumb" type="submit" name="submit" value="Prijavi se">
            </div>
            <div class="gumbDiv">
                <a class="navLink" href="../php/zaboravljena.php"><h5>Zaboravljena lozinka?</h5></a>
            </div>
            <div class="greskeDiv">
                <p class="greske">{$greske}</p>
            </div>
        </form>
    </fieldset>
</div>