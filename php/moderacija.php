<?php   
    require "../biblioteke/smarty-3.1.34/libs/Smarty.class.php";
    require "../biblioteke/baza.class.php";
    require "../biblioteke/sesija.class.php";
    Sesija::kreirajSesiju();

    $baza = new Baza();
    $smarty = new Smarty();

    if (!$_SESSION || $_SESSION["uloga"] > 2){
        header("Location: ../index.php");
    }

    $baza->spojiDB();

    $korisnikID = $_SESSION["id"];

    $upitKlubovi = "SELECT DISTINCT klub.klub_id, klub.naziv FROM klub INNER JOIN moderator ON klub.klub_id = moderator.klub_id 
                    INNER JOIN korisnik ON moderator.korisnik_id = korisnik.korisnik_id 
                    WHERE korisnik.korisnik_id = '$korisnikID' ORDER BY klub.naziv";
    $rezultat = $baza->selectDB($upitKlubovi);
    $klubovi = mysqli_fetch_all($rezultat);

    $upitSviKlubovi = "SELECT klub_id, naziv FROM klub ORDER BY naziv";
    $rezultat2 = $baza->selectDB($upitSviKlubovi);
    $kluboviStat = mysqli_fetch_all($rezultat2);

    $baza->zatvoriDB();

    if (isset($_POST["klubID"])){
        $klubID = $_POST["klubID"];
        $baza->spojiDB();

        $upitIgraci = "SELECT * FROM profil WHERE klub_id = '$klubID' ORDER BY ime";
        $rezultat = $baza->selectDB($upitIgraci);

        $baza->zatvoriDB();
        $igraci = mysqli_fetch_all($rezultat);
        echo json_encode($igraci);
        exit();
    }

    if (isset($_POST["zahtjevi"])){
        $klubID = $_POST["zahtjevi"];
        $baza->spojiDB();

        $upitZahtjevi = "SELECT transferi.transfer_id, transferi.cijena, klub.naziv, profil.ime, profil.prezime FROM transferi 
                        INNER JOIN klub ON klub.klub_id = transferi.klub_id INNER JOIN profil ON transferi.profil_id = profil.profil_id 
                        WHERE transferi.status_vlasnik = 0 AND transferi.status_igrac = 0 AND profil.klub_id = '$klubID' ORDER BY profil.ime";
        $rezultat = $baza->selectDB($upitZahtjevi);

        $baza->zatvoriDB();
        $zahtjevi = mysqli_fetch_all($rezultat);
        echo json_encode($zahtjevi);
        exit();
    }

    if (isset($_POST["odgovorDa"])){
        $transferID = $_POST["odgovorDa"];

        $baza->spojiDB();

        $upitZahtjev = "UPDATE transferi SET status_vlasnik = 1 WHERE transfer_id = '$transferID'";
        $baza->updateDB($upitZahtjev);

        $baza->zatvoriDB();
    }

    if (isset($_POST["odgovorNe"])){
        $transferID = $_POST["odgovorNe"];

        $baza->spojiDB();

        $upitZahtjev = "UPDATE transferi SET status_vlasnik = -1 WHERE transfer_id = '$transferID'";
        $baza->updateDB($upitZahtjev);

        $baza->zatvoriDB();
    }

    if (isset($_POST["slobodni"])){
        $klubID = $_POST["slobodni"];

        $baza->spojiDB();

        $upitSport = "SELECT sport_id FROM klub WHERE klub_id = '$klubID'";
        $rezSport = $baza->selectDB($upitSport);

        $sportID = mysqli_fetch_assoc($rezSport)["sport_id"];

        $upitSlobodni = "SELECT * FROM profil WHERE sport_id = '$sportID' AND klub_id IS NULL ORDER BY ime";
        $rezSlobodni = $baza->selectDB($upitSlobodni);

        $igraci = mysqli_fetch_all($rezSlobodni);

        $baza->zatvoriDB();
        echo json_encode($igraci);
        exit();
    }
    
    if (isset($_POST["zauzeti"])){
        $klubID = $_POST["zauzeti"];

        $baza->spojiDB();

        $upitSport = "SELECT sport_id FROM klub WHERE klub_id = '$klubID'";
        $rezSport = $baza->selectDB($upitSport);

        $sportID = mysqli_fetch_assoc($rezSport)["sport_id"];

        $upitZauzeti = "SELECT klub.naziv, profil.profil_id, profil.ime, profil.prezime, profil.pozicija, profil.cijena, profil.odigrano_minuta, profil.ocjena 
                        FROM profil INNER JOIN klub ON profil.klub_id = klub.klub_id WHERE profil.sport_id = '$sportID' AND klub.klub_id != '$klubID' AND profil.klub_id IS NOT NULL ORDER BY klub.naziv";
        $rezZauzeti = $baza->selectDB($upitZauzeti);

        $igraci = mysqli_fetch_all($rezZauzeti);

        $baza->zatvoriDB();
        echo json_encode($igraci);
        exit();
    }

    if (isset($_POST["datumOd"])){
        $klubID = $_POST["klub"];
        $datumOd = $_POST["datumOd"];
        $datumDo = $_POST["datumDo"];

        $baza->spojiDB();

        $upit = "SELECT profil.ime, profil.prezime, transferi.cijena, transferi.datum, klub.naziv FROM transferi INNER JOIN klub ON transferi.klub_id = klub.klub_id
                INNER JOIN profil ON transferi.profil_id = profil.profil_id WHERE (transferi.datum BETWEEN '$datumOd' AND '$datumDo') AND klub.klub_id = '$klubID' ORDER BY profil.ime";
        
        $rezultat = $baza->selectDB($upit);

        $transferi = mysqli_fetch_all($rezultat);

        echo json_encode($transferi);
        exit();
    }

    $naslov = "Moderacija";
    $smarty->assign("naslov", $naslov);

    $putanja = dirname($_SERVER["REQUEST_URI"], 2);
    $smarty->assign("putanja", $putanja);
    $smarty->assign("klubovi", $klubovi);
    $smarty->assign("stat", $kluboviStat);
    
    $smarty->display("../templates/header.tpl");
    $smarty->display("../templates/moderacija.tpl");
    $smarty->display("../templates/footer.tpl");
?>