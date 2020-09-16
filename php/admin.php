<?php
    require "../biblioteke/smarty-3.1.34/libs/Smarty.class.php";
    require "../biblioteke/baza.class.php";
    require "../biblioteke/sesija.class.php";
    Sesija::kreirajSesiju();

    $baza = new Baza();
    $smarty = new Smarty();

    if (!$_SESSION || $_SESSION["uloga"] > 1){
        header("Location: ../index.php");
    }

    $dohvatiSportove = "SELECT sport_id, naziv FROM sport ORDER BY naziv";
    $baza->spojiDB();
    $rez = $baza->selectDB($dohvatiSportove);

    $sportovi = mysqli_fetch_all($rez);

    $dohvatiKlubove = "SELECT klub_id, naziv FROM klub ORDER BY naziv";
    $rez2 = $baza->selectDB($dohvatiKlubove);

    $klubovi = mysqli_fetch_all($rez2);

    $dohvatiModeratore = "SELECT korisnik_id, korisnicko_ime FROM korisnik WHERE uloga_id < 3 ORDER BY korisnicko_ime";
    $rez3 = $baza->selectDB($dohvatiModeratore);

    $moderatori = mysqli_fetch_all($rez3);
    
    $baza->zatvoriDB();

    if (isset($_POST["tijelo"])){
        $naziv = $_POST["naziv"];
        $broj = $_POST["broj"];
        $tijelo = $_POST["tijelo"];
        $opis = $_POST["opis"];

        $upit = "INSERT INTO sport (naziv, broj_igraca, nadzorno_tijelo, opis)
                VALUES ('$naziv', '$broj', '$tijelo', '$opis')";
        $baza->spojiDB();
        $baza->updateDB($upit);
        $baza->zatvoriDB();
    }

    if (isset($_POST["logo"])){
        $naziv = $_POST["naziv"];
        $oznaka = $_POST["oznaka"];
        $logo = $_POST["logo"];
        $godina = $_POST["godina"];
        $trener = $_POST["trener"];
        $stadion = $_POST["stadion"];
        $sport = $_POST["sport"];

        $upit = "INSERT INTO klub (naziv, oznaka, logo, godina_osnivanja, trener, naziv_stadiona, sport_id) 
                VALUES ('$naziv', '$oznaka', '$logo', '$godina', '$trener', '$stadion', '$sport')";

        $baza->spojiDB();
        $baza->updateDB($upit);
        $baza->zatvoriDB();
    }

    if (isset($_POST["napustanje"])){
        $upit = "SELECT zahtjev.zahtjev_id, zahtjev.datum, profil.ime, profil.prezime, klub.naziv, profil.profil_id from zahtjev
                INNER JOIN profil ON zahtjev.profil_id = profil.profil_id INNER JOIN klub ON klub.klub_id = profil.profil_id 
                WHERE zahtjev.odobrenje = 0 ORDER BY profil.ime";
        $baza->spojiDB();

        $rez = $baza->selectDB($upit);
        $popis = mysqli_fetch_all($rez);

        $baza->zatvoriDB();

        echo json_encode($popis);
        exit();
    }

    if (isset($_POST["modID"])){
        $modID = $_POST["modID"];
        $klubID = $_POST["klubID"];
        $datum = date(Y-m-d);

        $upit = "INSERT INTO moderator (korisnik_id, klub_id, datum_dodjele) VALUES ('$modID', '$klubID','$datum')";

        $baza->spojiDB();
        $baza->updateDB($upit);
        $baza->zatvoriDB();
    }

    if (isset($_POST["odgovorDa"])){
        $zahtjevID = $_POST["odgovorDa"];
        $profilID = $_POST["profil"];

        $upProfil = "UPDATE profil SET klub_id = NULL, cijena = cijena * 0.9 WHERE profil_id = '$profilID'";
        $upZahtjev = "UPDATE zahtjev SET odobrenje = 1 WHERE zahtjev_id = '$zahtjevID'";
        $baza->spojiDB();
        $baza->updateDB($upProfil);
        $baza->updateDB($upZahtjev);
        $baza->zatvoriDB();
    }

    if (isset($_POST["odgovorNe"])){
        $zahtjevID = $_POST["odgovorNe"];

        $upit = "UPDATE zahtjev SET odobrenje = -1 WHERE zahtjev_id = '$zahtjevID'";
        $baza->spojiDB();
        $baza->updateDB($upit);
        $baza->zatvoriDB();
    }

    $naslov = "Admin";
    $smarty->assign("naslov", $naslov);

    $putanja = dirname($_SERVER["REQUEST_URI"], 2);
    $smarty->assign("putanja", $putanja);
    $smarty->assign("sportovi", $sportovi);
    $smarty->assign("moderatori", $moderatori);
    $smarty->assign("klubovi", $klubovi);
    
    $smarty->display("../templates/header.tpl");
    $smarty->display("../templates/admin.tpl");
    $smarty->display("../templates/footer.tpl");
?>