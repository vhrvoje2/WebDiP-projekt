<?php
    require "../biblioteke/smarty-3.1.34/libs/Smarty.class.php";
    require "../biblioteke/baza.class.php";
    require "../biblioteke/sesija.class.php";
    Sesija::kreirajSesiju();

    $baza = new Baza();
    $smarty = new Smarty();
    
    if (isset($_POST["klub"])){
        $baza->spojiDB();
        $upit = "SELECT klub.klub_id, naziv, sum(cijena) FROM klub INNER JOIN profil ON klub.klub_id = profil.klub_id GROUP BY naziv ORDER BY naziv";
        $rezultat = $baza->selectDB($upit);
        $baza->zatvoriDB();

        $podaci = mysqli_fetch_all($rezultat);
        echo json_encode($podaci);
        exit();
    }


    $naslov = "Klubovi";
    $smarty->assign("naslov", $naslov);

    $putanja = dirname($_SERVER["REQUEST_URI"], 2);
    $smarty->assign("putanja", $putanja);
    
    $smarty->display("../templates/header.tpl");
    $smarty->display("../templates/klubovi.tpl");
    $smarty->display("../templates/footer.tpl");
?>