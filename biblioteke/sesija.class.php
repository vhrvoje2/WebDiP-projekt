<?php

class Sesija {

    const KORISNIK = "korisnik";
    const ULOGA = "uloga";
    const ID = "id";
    const SESSION_NAME = "session";

    static function kreirajSesiju() {
        session_name(self::SESSION_NAME);

        if (session_id() == "") {
            session_start();
        }
    }

    static function kreirajKorisnika($korisnik, $uloga, $id) {
        self::kreirajSesiju();
        $_SESSION[self::KORISNIK] = $korisnik;
        $_SESSION[self::ULOGA] = $uloga;
        $_SESSION[self::ID] = $id;
    }

    static function dajKorisnika() {
        self::kreirajSesiju();
        if (isset($_SESSION[self::KORISNIK])) {
            $korisnik[self::KORISNIK] = $_SESSION[self::KORISNIK];
            $korisnik[self::ULOGA] = $_SESSION[self::ULOGA];
            $korisnik[self::ID] = $_SESSION[self::ID];
        } else {
            return null;
        }
        return $korisnik;
    }
    
    static function obrisiSesiju() {

        if (session_id() != "") {
            session_unset();
            session_destroy();
        }
    }

}
