<?php
    require "../biblioteke/baza.class.php";
    require "../biblioteke/sesija.class.php";
    require "./logger.php";
    Sesija::kreirajSesiju();
    logger(1);
    Sesija::obrisiSesiju();

    header("Location: ../index.php");
?>