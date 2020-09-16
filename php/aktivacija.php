<?php
    require "../biblioteke/baza.class.php";

    $baza = new Baza();
    
    if (isset($_GET["username"])){
        $username = $_GET["username"];
        $datetime = $_GET["datum"];

        $baza->spojiDB();
        $upit = "UPDATE korisnik SET status = 1 WHERE korisnicko_ime = '$username'";
        $baza->updateDB($upit);
        $baza->zatvoriDB();
        echo "Korisnički račun aktiviran!";
    }

    if (isset($_POST["kolacici"])){
        setcookie("kolacici", "dopusti", time()+48*60*60, "/");
    }
?>