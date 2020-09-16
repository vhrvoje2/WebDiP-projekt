<?php
    function logger($tipRadnje, $upit = NULL){
        $baza = new Baza();
        $korisnikID = $_SESSION["id"];

        $date = date("Y-m-d H:i:s");
        $radnja;

        if (strpos($upit, 'SELECT') !== false) {
            $radnja = "SELECT";
        }
        else if (strpos($upit, 'UPDATE') !== false){
            $radnja = "UPDATE";
        }
        else if (strpos($upit, 'INSERT') !== false){
            $radnja = "INSERT";
        }
        else if (strpos($upit, 'DELETE') !== false){
            $radnja = "DELETE"; 
        }
        else if ($tipRadnje == 1){
            $radnja = "Prijava/Odjava";
        }

        $record = "INSERT INTO dnevnik (korisnik_id, tip_id, radnja, upit, datum_vrijeme)
                    VALUES ('$korisnikID', '$tipRadnje', '$radnja', '$upit', '$date')";
        $baza->spojiDB();
        $baza->updateDB($record);
        $baza->zatvoriDB();
    }
?>