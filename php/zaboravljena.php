<?php
    require "../biblioteke/smarty-3.1.34/libs/Smarty.class.php";
    require "../biblioteke/baza.class.php";
    require "../biblioteke/sesija.class.php";
    Sesija::kreirajSesiju();

    $baza = new Baza();
    $smarty = new Smarty();

    function generirajLozinku(){
        $lozinka = substr(str_shuffle('abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789'), 0, 8);
        return $lozinka;
    }

    if (isset($_POST["user"])){
        $user = $_POST["user"];
        $novaLozinka = generirajLozinku();
        $sha1 = sha1($novaLozinka);

        $upit = "UPDATE korisnik SET lozinka = '$novaLozinka', lozinka_sha1 = '$sha1' WHERE korisnicko_ime = '$user'";
        $email = "SELECT email FROM korisnik WHERE korisnicko_ime = '$user'";
        $baza->spojiDB();
        $baza->updateDB($upit);
        $mail = $baza->selectDB($email);
        $baza->zatvoriDB();

        $adresa = mysqli_fetch_assoc($mail)["email"];

        $poruka = "Vaša nova lozinka za TransferHUB je " . $novaLozinka;
        mail($adresa, "TransferHUB - Nova lozinka", $poruka);

        header("Location: ../php/prijava.php");
    }

    $naslov = "Nova lozinka";
    $smarty->assign("naslov", $naslov);

    $putanja = dirname($_SERVER["REQUEST_URI"], 2);
    $smarty->assign("putanja", $putanja);
    
    $smarty->display("../templates/header.tpl");
    $smarty->display("../templates/zaboravljena.tpl");
    $smarty->display("../templates/footer.tpl");
?>