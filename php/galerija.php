<?php
    require "../biblioteke/smarty-3.1.34/libs/Smarty.class.php";
    require "../biblioteke/baza.class.php";
    require "../biblioteke/sesija.class.php";
    Sesija::kreirajSesiju();
    
    $baza = new Baza();
    $smarty = new Smarty();

    $baza->spojiDB();

    $igraci = array();

    if (isset($_GET["id"])){
        $id = $_GET["id"];
        $upit = "SELECT slika, ime, prezime, privola FROM profil WHERE klub_id = '$id' ORDER BY ime";
    }
    else if (isset($_POST["pojam"])){
        $sport = $_POST["filter"];
        if ($_POST["sort"] == "klub"){
            $upit = "SELECT slika, ime, prezime, privola FROM profil 
            INNER JOIN klub ON profil.klub_id = klub.klub_id 
            INNER JOIN sport ON klub.sport_id = sport.sport_id
            WHERE sport.naziv = '$sport'
            ORDER BY klub.naziv";
        }
        else{
            $upit = "SELECT slika, ime, prezime, privola FROM profil 
            INNER JOIN klub ON profil.klub_id = klub.klub_id 
            INNER JOIN sport ON klub.sport_id = sport.sport_id 
            WHERE sport.naziv = '$sport'
            ORDER BY sport.naziv";
        }
        $rezultat = $baza->selectDB($upit);
        $igraci = mysqli_fetch_all($rezultat);
        $baza->zatvoriDB();
        echo json_encode($igraci);
        exit();
    }
    else { 
        $upit = "SELECT slika, ime, prezime, privola FROM profil ORDER BY ime";
    }


    $rezultat = $baza->selectDB($upit);
    $igraci = mysqli_fetch_all($rezultat);

    $baza->zatvoriDB();

    $naslov = "Galerija";
    $smarty->assign("naslov", $naslov);

    $putanja = dirname($_SERVER["REQUEST_URI"], 2);
    $smarty->assign("putanja", $putanja);
    $smarty->assign("igraci", $igraci);
    
    $smarty->display("../templates/header.tpl");
    $smarty->display("../templates/galerija.tpl");
    $smarty->display("../templates/footer.tpl");
?>