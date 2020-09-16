<!DOCTYPE html>
<html lang="hr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{$putanja}/./css/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="{$putanja}/./javascript/script.js"></script>
    <title>{$naslov}</title>
</head>
<body>
    <div class="mainGrid">
        <div class="mainHeader">
            <img src="{$putanja}/./multimedija/logo.png" alt="Logo" class="logoImg">
            <h1 class="headerNaslov">
                TransferHUB
            </h1>
        </div>
        <div class="navBox">
            <ul class="navList">
                <li class="navElement"><a href="{$putanja}/./index.php" class="navLink">Početna</a></li>
                {if !isset($smarty.session.uloga)}
                    <li class="navElement"><a href="{$putanja}/./php/prijava.php" class="navLink">Prijava</a></li>
                    <li class="navElement"><a href="{$putanja}/./php/registracija.php" class="navLink">Registracija</a></li>
                {/if}
                <li class="navElement"><a href="{$putanja}/./php/klubovi.php" class="navLink">Klubovi</a></li>
                <li class="navElement"><a href="{$putanja}/./php/galerija.php" class="navLink">Galerija</a></li>
                {if isset($smarty.session.uloga)}
                    <li class="navElement"><a href="{$putanja}/./php/profil.php" class="navLink">Profil</a></li>  
                {/if}
                {if isset($smarty.session.uloga) && $smarty.session.uloga < 3}
                    <li class="navElement"><a href="{$putanja}/./php/moderacija.php" class="navLink">Moderacija</a></li>  
                {/if}
                {if isset($smarty.session.uloga) && $smarty.session.uloga < 2}
                    <li class="navElement"><a href="{$putanja}/./php/admin.php" class="navLink">Administracija</a></li>  
                    <li class="navElement"><a href="{$putanja}/./php/crud.php" class="navLink">CRUD</a></li>
                {/if}
                <li class="navElement"><a href="{$putanja}/./o_autoru.html" class="navLink">O autoru</a></li>
                <li class="navElement"><a href="{$putanja}/./dokumentacija.html" class="navLink">Dokumentacija</a></li>
                {if isset($smarty.session.uloga)} 
                    <li class="navElement"><a href="{$putanja}/./php/odjava.php" class="navLink">Odjava [{$smarty.session.korisnik}]</a></li>  
                {/if}
            </ul>
        </div>
        <div class="wideContent">