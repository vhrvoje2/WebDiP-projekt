<?php
    require "../biblioteke/smarty-3.1.34/libs/Smarty.class.php";
    require "../biblioteke/baza.class.php";
    require "../biblioteke/sesija.class.php";
    Sesija::kreirajSesiju();

    if (!$_SESSION || $_SESSION["uloga"] > 3){
        header("Location: ../index.php");
    }

    $baza = new Baza();
    $smarty = new Smarty();
    
    $userID = $_SESSION["id"];
    $profil = null;

    if (isset($_GET["odg"])){
        $odgovor = $_GET["odg"];
        $ponudaID = $_GET["ponuda"];
        $profilID = $_GET["profil"];
        $klubID = $_GET["klub"];
        $iznos = $_GET["iznos"];
        $datum = date("Y-m-d");

        if ($odgovor == "DA"){
            $updatePonude = "UPDATE ponuda SET status = 1 WHERE ponuda_id = '$ponudaID'";
            $updateProfila = "UPDATE profil SET klub_id = '$klubID', cijena = '$iznos' WHERE profil.profil_id = '$profilID'";
            $updateTransfera = "INSERT INTO transferi (datum, cijena, status_vlasnik, status_igrac, klub_id, profil_id) 
                                VALUES ('$datum', '$iznos', 1, 1, '$klubID', '$profilID')";
            $baza->spojiDB();
            $baza->updateDB($updatePonude);
            $baza->updateDB($updateProfila);
            $baza->updateDB($updateTransfera);
            $baza->zatvoriDB();
        }
        else{
            $updatePonude = "UPDATE ponuda SET status = -1 WHERE ponuda.ponuda_id = '$ponudaID'";

            $baza->spojiDB();
            $baza->updateDB($updatePonude);
            $baza->zatvoriDB();
        }
    }

    if (isset($_GET["zahtjev"])){
        $odgovor = $_GET["zahtjev"];
        $transferID = $_GET["transfer"];
        $profilID = $_GET["profil"];
        $klubID = $_GET["klub"];
        $iznos = $_GET["iznos"];
        $datum = date("Y-m-d");

        if ($odgovor == "DA"){
            $updateProfila = "UPDATE profil SET klub_id = '$klubID', cijena = '$iznos' WHERE profil_id = '$profilID'";
            $updateTransfera = "UPDATE transferi SET status_igrac = 1, datum = '$datum' WHERE transfer_id = '$transferID'";

            $baza->spojiDB();
            $baza->updateDB($updateProfila);
            $baza->updateDB($updateTransfera);
            $baza->zatvoriDB();
        }
        else{
            $cijena = $iznos * 1.05;
            $updateProfil = "UPDATE profil SET cijena = '$cijena' WHERE profil_id = '$profilID'";
            $updateTransfera = "UPDATE transferi SET status_igrac = -1 WHERE transferi.transfer_id = '$transferID'";

            $baza->spojiDB();
            $baza->updateDB($updateProfil);
            $baza->updateDB($updateTransfera);
            $baza->zatvoriDB();
        }
    }

    if (isset($_POST["submit"])){
        $ime = $_POST["ime"];
        $prezime = $_POST["prezime"];
        $link = $_POST["slika"];
        $nacionalnost = $_POST["nacionalnost"];
        $godrod = $_POST["godrod"];
        $mjesto = $_POST["mjesto"];
        $sport = $_POST["sport"];
        $pozicija = $_POST["pozicija"];
        $ocjena = $_POST["ocjena"];
        $minute = $_POST["minute"];
        $privola = $_POST["privola"];

        $baza->spojiDB();

        $insert = "INSERT INTO profil (ime, prezime, slika, nacionalnost, godina_rodenja, mjesto_rodenja, sport_id, pozicija, ocjena, odigrano_minuta, cijena, privola) 
                    VALUES ('$ime', '$prezime', '$link', '$nacionalnost', '$godrod', '$mjesto', '$sport', '$pozicija', '$ocjena', '$minute', 0, '$privola')";
        $baza->updateDB($insert);
        
        $fetchProfilID = "SELECT profil_id FROM profil WHERE slika = '$link'";
        $fetch = $baza->selectDB($fetchProfilID);
        $fetchedID = mysqli_fetch_assoc($fetch)["profil_id"];

        $korSet = "UPDATE korisnik SET profil_id = '$fetchedID' WHERE korisnik_id = '$userID'";
        $baza->updateDB($korSet);

        $baza->zatvoriDB();
    }

    $baza->spojiDB();

    $upit = "SELECT profil_id FROM korisnik WHERE korisnik_id = '$userID'";
    $rezultat = $baza->selectDB($upit);
    $upitSportovi = "SELECT sport_id, naziv FROM sport";
    $sportovi = $baza->selectDB($upitSportovi);
    $baza->zatvoriDB();

    $profilID = mysqli_fetch_assoc($rezultat)["profil_id"];
    $popisSportova = mysqli_fetch_all($sportovi);
    $povijestTransfera = null;
    $popisPonuda = null;

    if (!empty($profilID)){
        $baza->spojiDB();

        $upit = "SELECT * FROM profil WHERE profil_id = '$profilID'";
        //$upitPovijest = "SELECT klub.naziv, transferi.datum FROM transferi INNER JOIN klub ON transferi.klub_id = klub.klub_id WHERE transferi.profil_id = '$profilID'
        //                    AND transferi.status_vlasnik = 1 AND transferi.status_igrac = 1";
        // $upitPonude = "SELECT klub.logo, klub.naziv, ponuda.iznos, ponuda.klub_id, ponuda.ponuda_id, ponuda.iznos FROM ponuda INNER JOIN klub ON ponuda.klub_id = klub.klub_id 
        //                    AND profil_id = '$profilID' AND ponuda.status = 0";

        $rezultat = $baza->selectDB($upit);
        //$povijest = $baza->selectDB($upitPovijest);
        //$ponude = $baza->selectDB($upitPonude);

        $baza->zatvoriDB();

        //$povijestTransfera = mysqli_fetch_all($povijest);
        //$popisPonuda = mysqli_fetch_all($ponude);
        $profil = mysqli_fetch_assoc($rezultat);
    }

    if (isset($_POST["povijest"])){
        $baza->spojiDB();
        $upitPovijest = "SELECT klub.naziv, transferi.datum, klub.logo FROM transferi INNER JOIN klub ON transferi.klub_id = klub.klub_id WHERE transferi.profil_id = '$profilID'
                            AND transferi.status_vlasnik = 1 AND transferi.status_igrac = 1 ORDER BY transferi.datum";

        $povijest = $baza->selectDB($upitPovijest);
        $baza->zatvoriDB();
        $povijestTransfera = mysqli_fetch_all($povijest);

        echo json_encode($povijestTransfera);
        exit();
    }

    if (isset($_POST["ponude"])){
        $baza->spojiDB();
        $upitPonude = "SELECT klub.logo, klub.naziv, ponuda.iznos, ponuda.klub_id, ponuda.ponuda_id, ponuda.profil_id FROM ponuda INNER JOIN klub ON ponuda.klub_id = klub.klub_id 
                            AND profil_id = '$profilID' AND ponuda.status = 0 ORDER BY klub.naziv";

        $ponude = $baza->selectDB($upitPonude);
        $baza->zatvoriDB();
        $popisPonuda = mysqli_fetch_all($ponude);

        echo json_encode($popisPonuda);
        exit();
    }

    if (isset($_POST["zahtjevi"])){
        $baza->spojiDB();
        $upitZahtjevi = "SELECT transferi.transfer_id, transferi.profil_id, transferi.klub_id, transferi.cijena, klub.naziv, klub.logo FROM transferi INNER JOIN klub 
                            ON klub.klub_id = transferi.klub_id WHERE transferi.status_vlasnik = 1 AND transferi.status_igrac = 0 AND transferi.profil_id = '$profilID' ORDER BY klub.naziv";

        $zahtjevi = $baza->selectDB($upitZahtjevi);
        $baza->zatvoriDB();
        $popisZahtjeva = mysqli_fetch_all($zahtjevi);
        echo json_encode($popisZahtjeva);
        exit();
    }

    if (isset($_POST["klub"])){
        $baza->spojiDB();

        $upitKlub = "SELECT klub.logo, klub.naziv FROM klub INNER JOIN profil on klub.klub_id = profil.klub_id WHERE profil.profil_id = '$profilID' ORDER BY klub.naziv";
        $klub = $baza->selectDB($upitKlub);

        $baza->zatvoriDB();

        $klubInfo = mysqli_fetch_assoc($klub);
        echo json_encode($klubInfo);
        exit();
    }

    if (isset($_POST["napusti"])){
        $baza->spojiDB();

        $datum = date("Y-m-d");
        $upitZahtjev = "INSERT INTO zahtjev (datum, odobrenje, profil_id) VALUES ('$datum', 0, '$profilID')";
        $baza->updateDB($upitZahtjev);

        $baza->zatvoriDB();
    }

    $naslov = "Profil";
    $smarty->assign("naslov", $naslov);

    $putanja = dirname($_SERVER["REQUEST_URI"], 2);
    $smarty->assign("putanja", $putanja);
    $smarty->assign("profil", $profil);
    $smarty->assign("sportovi", $popisSportova);
    
    $smarty->display("../templates/header.tpl");
    $smarty->display("../templates/profil.tpl");
    $smarty->display("../templates/footer.tpl");
?>