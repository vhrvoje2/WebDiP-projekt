<?php
    require "../biblioteke/smarty-3.1.34/libs/Smarty.class.php";
    require "../biblioteke/baza.class.php";
    require "../biblioteke/sesija.class.php";
    require "./logger.php";
    Sesija::kreirajSesiju();

    if (!isset($_SERVER["HTTPS"]) || strtolower($_SERVER["HTTPS"]) != "on"){
        $adresa = 'https://' . $_SERVER["SERVER_NAME"] . $_SERVER["REQUEST_URI"];
        header("Location: $adresa");
        exit();
    }

    $baza = new Baza();
    $smarty = new Smarty();
    $greske = "";

    function dodajPokusaj($ime){
        $baza = new Baza();
        $upit = "UPDATE korisnik SET pokusaji = pokusaji + 1 WHERE korisnicko_ime = '$ime'";
        logger(1, $upit);
        $baza->spojiDB();
        $baza->updateDB($upit);
        $baza->zatvoriDB();
    }

    if (isset($_POST["username"])){
        $sol = "31415965359";
        $username = $_POST["username"];
        $password = $_POST["password"];
        $sha1 = sha1($password . $sol);
        
        $baza->spojiDB();
        $query = "SELECT * FROM korisnik WHERE korisnicko_ime = '$username'";
        $odg = $baza->selectDB($query);
        $baza->zatvoriDB();
        
        $rezultat = mysqli_fetch_array($odg);
        if ($rezultat){
            if ($rezultat["korisnicko_ime"] == $username && $rezultat["lozinka_sha1"] == $sha1 && $rezultat["status"] == 1 && $rezultat["pokusaji"] < 3){
                Sesija::kreirajKorisnika($username, $rezultat["uloga_id"], $rezultat["korisnik_id"]);

                $resetPokusaji = "UPDATE korisnik SET pokusaji = 0 WHERE korisnicko_ime = '$username'";
                $baza->spojiDB();
                $baza->updateDB($resetPokusaji);
                $baza->zatvoriDB();
                
                logger(1);

                if (isset($_POST["zapamti"]) && $_POST["zapamti"] == 1){
                    setcookie("username", $username, time()+86400);
                }

                header("Location: ../index.php");
            }
            else if ($rezultat["pokusaji"] > 3){
                $greske = "Previše neuspješnih prijava! Račun blokiran!";
            }
            else if ($rezultat["lozinka_sha1"] != $sha1){
                dodajPokusaj($rezultat["korisnicko_ime"]);
                $greske = "Neispravna lozinka!";
            }
            else if (!$rezultat["status"]){
                $greske = "Korisnički račun nije aktivan!";
            }
        }
        else{
            $greske = "Neuspješna prijava!";
        }     
    }

    $naslov = "Prijava";
    $smarty->assign("naslov", $naslov);

    $putanja = dirname($_SERVER["REQUEST_URI"], 2);
    $smarty->assign("putanja", $putanja);
    $smarty->assign("greske", $greske);
    
    $smarty->display("../templates/header.tpl");
    $smarty->display("../templates/prijava.tpl");
    $smarty->display("../templates/footer.tpl");
?>