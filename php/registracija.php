<?php
    require "../biblioteke/smarty-3.1.34/libs/Smarty.class.php";
    require "../biblioteke/baza.class.php";
    require "../biblioteke/sesija.class.php";
    Sesija::kreirajSesiju();

    $baza = new Baza();
    $smarty = new Smarty();
    $greske = array();
    $uspjeh = "";

    if (isset($_POST["submit"])){
        $sol = "31415965359";
        $ime = $_POST["ime"];
        $prezime = $_POST["prezime"];
        $username = $_POST["username"];
        $email = $_POST["email"];
        $password = $_POST["password"];
        $datetime = date("Y-m-d H:i:s");
        
        $sha1 = sha1($password . $sol);

        if (strlen($ime) < 3){
            $greska = "Ime mora biti minimalno 3 znaka!";
            array_push($greske, $greska);
        }

        if (strlen($prezime) < 3){
            $greska = "Prezime mora biti minimalno 3 znaka!";
            array_push($greske, $greska);
        }

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
            $greska = "E-mail nije ispravnog formata!";
            array_push($greske, $greska);
        }

        if (!preg_match('@[0-9]@', $password)){
            $greska = "Lozinka mora sadržavati barem jedan broj!";
            array_push($greske, $greska);
        }

        if (!preg_match('@[A-Z]@', $password)){
            $greska = "Lozinka mora sadržavati barem jedno veliko slovo!";
            array_push($greske, $greska);
        }

        if (empty($greske)){
            $baza->spojiDB();
            $query = "INSERT INTO korisnik (ime, prezime, korisnicko_ime, lozinka, lozinka_sha1, email, vrijeme_registracije, status, uloga_id) 
                        VALUES ('$ime', '$prezime', '$username', '$password', '$sha1', '$email', '$datetime', 0, 3)";
            $odg = $baza->updateDB($query);
            $baza->zatvoriDB();

            $aktivacija = "Potvrdite svoj račun na http://barka.foi.hr/WebDiP/2019_projekti/WebDiP2019x143/php/aktivacija.php?username=" . $username . "&datum=" . $datetime;
            mail($email, "TransferHUB - Potvrda Računa", $aktivacija);

            $uspjeh = "Registracija uspješna! Provjerite e-mail!";
        }
    }

    if (isset($_POST["check"])){
        $username = $_POST["check"];
        $baza->spojiDB();
        $upit = "SELECT korisnicko_ime FROM korisnik WHERE korisnicko_ime = '$username'";
        $rezultat = $baza->selectDB($upit);
        $podaci = mysqli_fetch_all($rezultat);
        $baza->zatvoriDB();

        echo json_encode($podaci);
        exit();
    }
    
    $naslov = "Registracija";
    $smarty->assign("naslov", $naslov);

    $putanja = dirname($_SERVER["REQUEST_URI"], 2);
    $smarty->assign("putanja", $putanja);
    $smarty->assign("uspjeh", $uspjeh);
    $smarty->assign("greske", $greske);
    
    $smarty->display("../templates/header.tpl");
    $smarty->display("../templates/registracija.tpl");
    $smarty->display("../templates/footer.tpl");
?>