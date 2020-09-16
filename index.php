<?php
    require "./biblioteke/smarty-3.1.34/libs/Smarty.class.php";
    require "./biblioteke/sesija.class.php";
    Sesija::kreirajSesiju();

    $smarty = new Smarty();
    
    $naslov = "Početna";
    $smarty->assign("naslov", $naslov);

    $putanja = dirname($_SERVER["REQUEST_URI"]);
    $smarty->assign("putanja", $putanja);
    
    $smarty->display("../templates/header.tpl");
    $smarty->display("../templates/index.tpl");
    $smarty->display("../templates/footer.tpl");
?>