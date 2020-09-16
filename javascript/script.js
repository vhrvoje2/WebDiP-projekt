$(document).ready(function(){
    var naslov = $(document).find("title").text();
    var code; //captcha
    var postoji; //registracija
    var klub; //moderacija

    provjeriUvjete();

    switch(naslov){
        case "Prijava":
            provjeriCookie();
            break;
        case "Registracija":
            validacijaRegistracija();
            kreirajCaptchu();
            break;
        case "Klubovi":
            dohvatiPopisKlubova();
            break;
        case "Galerija":
            dodajSearch();
            break;
        case "Profil":
            dohvatiPodatkeProfila();
        break;
        case "Moderacija":
            dohvatiPodatkeModeratora();
            $("#klub").on("change", dohvatiPodatkeModeratora);
            $("#od").on("change", dohvatiTransfere);
            $("#do").on("change", dohvatiTransfere);
            $("#stat").on("change", dohvatiTransfere);
            break;
        case "Admin":
            dohvatiZahtjeveZaNapustanje();
            $("#sportS").on("click", unesiNoviSport);
            $("#klubS").on("click", unesiNoviKlub);
            $("#modD").on("click", dodijeliModeratora);
            break;
    }

    function dohvatiPodatkeProfila(){
        dohvatiPovijestTransfera();
        dohvatiPonudeZaKupnju();
        dohvatiZahtjeveZaTransfer();
        dohvatiKlub();
    }

    function dohvatiPodatkeModeratora(){
        dohvatiIgračeKluba();
        dohvatiZahtjeveTransfer();
        dohvatiSlobodneIgrace();
        dohvatiIgraceKlubova();
        dohvatiTransfere();
    }

    function provjeriCookie(){
        var username;
        var kolacic = document.cookie.split(";");
        if (kolacic.length > 0){
            kolacic.forEach(element => {
                if (element.includes("username")){
                    username = element.split("=");
                    username = username[1];
                    $("#username").val(username);
                    return;
                }
            });
        }
    }

    function provjeriUvjete(){
        var kolacic = document.cookie.toString();
        if (!kolacic.includes("kolacici")){
            var bool = confirm("Ova stranica koristi kolačiće za spremanje podataka na vaše računalo. Potvrdite korištenje kolačića kako bi koristili stranicu!")
            if (bool){
                $.ajax({
                    url: "./php/aktivacija.php",
                    type: "POST",
                    data: {"kolacici": 1}
                });
            }
            else{
                window.location.href = "https://en.wikipedia.org/wiki/HTTP_cookie"; 
            }
        }
    }

    function dohvatiPopisKlubova(){
        $.ajax({
            url: "../php/klubovi.php",
            type: "POST",
            data: {"klub": 1},
            dataType: "json",
            success: function(data){
                popuniPopisKlubova(data);
            }
        });
    }

    function popuniPopisKlubova(data){
        data.forEach(element => {
            var red = document.createElement("tr");
            red.classList.add("tablicaRed");

            var imeKluba = document.createElement("td");
            imeKluba.classList.add("tablicaData");

            var vrijednost = document.createElement("td");
            vrijednost.classList.add("tablicaData");

            var link = document.createElement("td");
            link.classList.add("tablicaLink");

            var anchor = document.createElement("a");
            anchor.classList.add("navLink");

            anchor.innerText = "Galerija";
            anchor.href = "../php/galerija.php?id=" + element[0];
            link.append(anchor);

            imeKluba.innerText = element[1];
            vrijednost.innerText = element[2];
        
            red.append(imeKluba);
            red.append(vrijednost);
            red.append(link);
            
            $(".tablicaTijelo").append(red);
        });
    }

    function dodajSearch(){
        $("#pojam").on("keyup", pretraziGaleriju);
        $("#sort").on("change", pretraziGaleriju);
        $("#filter").on("change", pretraziGaleriju);
    }

    function pretraziGaleriju(){
        var pojam = $("#pojam").val().toLowerCase();
        var sort = $("#sort").val();
        var filter = $("#filter").val();

        $.ajax({
            url: "../php/galerija.php",
            type: "POST",
            data: {"pojam": pojam, "sort": sort, "filter": filter},
            dataType: "json",
            success: function(data){
                $(".galerija").empty();
                data.forEach(element => {
                    if (element[1].toLowerCase().includes(pojam) || element[2].toLowerCase().includes(pojam)){
                        var div = document.createElement("div");
                        div.classList.add("galerijaCard");

                        var divSlika = document.createElement("div");
                        divSlika.classList.add("cardImg");

                        var img = document.createElement("img");
                        img.classList.add("cardImage");

                        if (element[3]){
                            img.src = element[0];
                        }
                        else{
                            img.src = "https://riteshkumarreddykuchukulla.files.wordpress.com/2019/02/private-580x389.jpg";
                        }

                        divSlika.append(img);

                        var imePrezime = document.createElement("h3");
                        imePrezime.classList.add("cardName");
                        imePrezime.innerText = element[1] + " " + element[2];

                        div.append(divSlika);
                        div.append(imePrezime);

                        $(".galerija").append(div);
                    }
                });
            }
        });
    }

    function validacijaRegistracija(){
        $("#gumb").attr("disabled", true);
        postoji = false;

        $("#ime").on("keyup", provjeriPodatke);
        $("#prezime").on("keyup", provjeriPodatke);
        $("#username").on("keyup", provjeriPodatke);
        $("#username").on("keyup", provjeriKorIme);
        $("#email").on("keyup", provjeriPodatke);
        $("#password").on("keyup", provjeriPodatke);
        $("#ponpassword").on("keyup", provjeriPodatke);
        $("#code").on("keyup", provjeriPodatke);
    }

    function provjeriKorIme(){
        var username = $("#username").val();

        $.ajax({
            url: "../php/registracija.php",
            type: "POST",
            data: {"check": username},
            dataType: "json",
            success: function(data){
                if (data.length > 0){
                    postoji = true;
                }
                else{
                    postoji = false;
                }
            }
        });
    }

    function kreirajCaptchu() {
        $("#captcha").text("");
        var charsArray = "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ!?";
        var lengthOtp = 6;
        var captcha = [];

        for (var i = 0; i < lengthOtp; i++) {
            var index = Math.floor(Math.random() * charsArray.length + 1); 
            captcha.push(charsArray[index]);
        }

        var canv = document.createElement("canvas");
        canv.id = "captcha";
        canv.width = 100;
        canv.height = 50;
        var ctx = canv.getContext("2d");
        ctx.font = "25px Georgia";
        ctx.strokeText(captcha.join(""), 0, 30);
        
        code = captcha.join("");

        $("#captcha").append(canv);
    }

    function provjeriPodatke(){
        var ime = $("#ime").val();
        var prezime = $("#prezime").val();
        var username = $("#username").val();
        var mail = $("#email").val();
        var lozinka = $("#password").val();
        var ponLozinka = $("#ponpassword").val();
        var codeIn = $("#code").val();
        var greske = []

        if (ime.length < 1){
            greske.push("Ime ne može biti prazno!");
        }
        else if (ime.length > 15){
            greske.push("Ime može bit maksimalno 15 znakova!");
        }

        if (prezime.length < 1){
            greske.push("Prezime ne može biti prazno!");
        }
        else if (prezime.length > 15){
            greske.push("Prezime može bit maksimalno 15 znakova!");
        }

        if (username.length < 5){
            greske.push("Korisničko ime mora biti minimalno 5 znakova!");
        }
        else if (username.length > 15){
            greske.push("Korisničko ime može bit maksimalno 15 znakova!");
        }

        if (lozinka != ponLozinka){
            greske.push("Lozinke nisu iste!");
        }

        if (lozinka.length < 8){
            greske.push("Lozinka mora biti minimalno 8 znakova!");
        }

        if (mail.length < 1){
            greske.push("E-mail ne može biti prazan!");
        }

        if (codeIn != code){
            greske.push("Captcha nije ispravna!");
        }

        if (postoji){
            greske.push("Korisničko ime je zauzeto!");
        }
        
        $(".greskeDiv").empty();

        if (greske.length > 0){
            greske.forEach(element => {
                var msg = document.createElement("p");
                msg.classList.add("greske");
                msg.innerText = element;
                $(".greskeDiv").append(msg);
            });
            
            $(".formGumb").attr("disabled", true);
        }
        else {
            $(".formGumb").attr("disabled", false);
        }
    }

    function dohvatiPovijestTransfera(){
        $.ajax({
            url: "../php/profil.php",
            type: "POST",
            data: {"povijest": 1},
            dataType: "json",
            success: function(data){
                $("#povijestTable").empty();
                data.forEach(element => {
                    var logo = document.createElement("td");
                    logo.classList.add("tablicaData");
                    var img = document.createElement("img");
                    img.classList.add("logoKluba");
                    img.src = element[2];
                    logo.append(img);

                    var red = document.createElement("tr");
                    red.classList.add("tablicaRed");

                    var klub = document.createElement("td");
                    klub.classList.add("tablicaData");
                    klub.innerText = element[0];

                    var datum = document.createElement("td");
                    datum.classList.add("tablicaData");
                    datum.innerText = element[1];

                    red.append(logo);
                    red.append(klub);
                    red.append(datum);
                    $("#povijestTable").append(red);
                });

            }
        });
    }

    function dohvatiPonudeZaKupnju(){
        $.ajax({
            url: "../php/profil.php",
            type: "POST",
            data: {"ponude": 1},
            dataType: "json",
            success: function(data){
                $("#ponudeTable").empty();
                data.forEach(element => {
                    var red = document.createElement("tr");
                    red.classList.add("tablicaRed");

                    var logo = document.createElement("td");
                    logo.classList.add("tablicaData");
                    var img = document.createElement("img");
                    img.classList.add("logoKluba");
                    img.src = element[0];
                    logo.append(img);

                    var klub = document.createElement("td");
                    klub.classList.add("tablicaData");
                    klub.innerText = element[1];

                    var iznos = document.createElement("td");
                    iznos.classList.add("tablicaData");
                    iznos.innerText = element[2] + " EUR";

                    var prihvati = document.createElement("td");
                    prihvati.classList.add("tablicaLink");

                    var linkDa = document.createElement("a");
                    linkDa.classList.add("navLink");
                    linkDa.innerText = "Prihvati";
                    linkDa.addEventListener("click", function(){
                        var urlDa = "../php/profil.php?ponuda=" + element[4] + "&profil=" + element[5] + "&klub=" + element[3] + "&iznos=" + element[2] + "&odg=DA";
                        $.ajax({
                            url: urlDa,
                            type: "GET",
                            success: dohvatiPodatkeProfila
                        });
                    });
                    prihvati.append(linkDa);

                    var odbij = document.createElement("td");
                    odbij.classList.add("tablicaLink");

                    var linkNe = document.createElement("a");
                    linkNe.classList.add("navLink");
                    linkNe.innerText = "Odbij";
                    linkNe.addEventListener("click", function(){
                        var urlNe = "../php/profil.php?ponuda=" + element[4] + "&profil=" + element[5] + "&klub=" + element[3] + "&iznos=" + element[2] + "&odg=NE";
                        $.ajax({
                            url: urlNe,
                            type: "GET",
                            success: dohvatiPodatkeProfila
                        });
                    })
                    odbij.append(linkNe);

                    red.append(logo);
                    red.append(klub);
                    red.append(iznos);
                    red.append(prihvati);
                    red.append(odbij);
                    $("#ponudeTable").append(red);
                });
            }
        });
    }

    function dohvatiZahtjeveZaTransfer(){
        $.ajax({
            url: "../php/profil.php",
            type: "POST",
            data: {"zahtjevi": 1},
            dataType: "json",
            success: function(data){
                $("#transferiTable").empty();
                data.forEach(element => {
                    var red = document.createElement("tr");
                    red.classList.add("tablicaRed");

                    var logo = document.createElement("td");
                    logo.classList.add("tablicaData");
                    var img = document.createElement("img");
                    img.classList.add("logoKluba");
                    img.src = element[5];
                    logo.append(img);

                    var klub = document.createElement("td");
                    klub.classList.add("tablicaData");
                    klub.innerText = element[4];

                    var iznos = document.createElement("td");
                    iznos.classList.add("tablicaData");
                    iznos.innerText = element[3] + " EUR";

                    var prihvati = document.createElement("td");
                    prihvati.classList.add("tablicaLink");

                    var linkDa = document.createElement("a");
                    linkDa.classList.add("navLink");
                    linkDa.innerText = "Prihvati";
                    linkDa.addEventListener("click", function(){
                        var urlDa = "../php/profil.php?transfer=" + element[0] + "&profil=" + element[1] + "&klub=" + element[2] + "&iznos=" + element[3] + "&zahtjev=DA";
                        $.ajax({
                            url: urlDa,
                            type: "GET",
                            success: dohvatiPodatkeProfila
                        });
                    });
                    prihvati.append(linkDa);

                    var odbij = document.createElement("td");
                    odbij.classList.add("tablicaLink");

                    var linkNe = document.createElement("a");
                    linkNe.classList.add("navLink");
                    linkNe.innerText = "Odbij";
                    linkNe.addEventListener("click", function(){
                        var urlNe = "../php/profil.php?transfer=" + element[0] + "&profil=" + element[1] + "&klub=" + element[2] + "&iznos=" + element[3] + "&zahtjev=NE";
                        $.ajax({
                            url: urlNe,
                            type: "GET",
                            success: dohvatiPodatkeProfila
                        });
                    })
                    odbij.append(linkNe);

                    red.append(logo);
                    red.append(klub);
                    red.append(iznos);
                    red.append(prihvati);
                    red.append(odbij);
                    $("#transferiTable").append(red);
                });
            }
        });
    }

    function dohvatiKlub(){
        $.ajax({
            url: "../php/profil.php",
            type: "POST",
            data: {"klub": 1},
            dataType: "json",
            success: function(data){
                $("#napustiTable").empty();
                if (data){
                    var red = document.createElement("tr");
                    red.classList.add("tablicaRed");

                    var logo = document.createElement("td");
                    logo.classList.add("tablicaData");
                    var img = document.createElement("img");
                    img.classList.add("logoKluba");
                    img.src = data["logo"];
                    logo.append(img);

                    var klub = document.createElement("td");
                    klub.classList.add("tablicaData");
                    klub.innerText = data["naziv"];
                    
                    var napusti = document.createElement("td");
                    napusti.classList.add("tablicaLink");

                    var linkNapusti = document.createElement("a");
                    linkNapusti.classList.add("navLink");
                    linkNapusti.innerText = "Pošalji zahtjev";
                    linkNapusti.addEventListener("click", function(){
                        $.ajax({
                            url: "../php/profil.php",
                            type: "POST",
                            data: {"napusti": 1},
                            success: function(){
                                alert("Zahtjev poslan!");
                            }
                        });
                    });
                    napusti.append(linkNapusti);

                    red.append(logo);
                    red.append(klub);
                    red.append(napusti);
                    $("#napustiTable").append(red);
                }
            }
        });
    }

    function dohvatiIgračeKluba(){
        var klubID = $("#klub").val();

        $.ajax({
            url: "../php/moderacija.php",
            type: "POST",
            data: {"klubID": klubID},
            dataType: "json",
            success: function(data){
                $("#popisIgraca").empty();
                data.forEach(element => {
                    var red = document.createElement("tr");
                    red.classList.add("tablicaRed");

                    var imePrezime = document.createElement("td");
                    imePrezime.classList.add("tablicaData");
                    imePrezime.innerText = element[1] + " " + element[2];
                    red.append(imePrezime);

                    var pozicija = document.createElement("td");
                    pozicija.classList.add("tablicaData");
                    pozicija.innerText = element[7];
                    red.append(pozicija);

                    var cijena = document.createElement("td");
                    cijena.classList.add("tablicaData");
                    cijena.innerText = element[8] + " EUR";
                    red.append(cijena);

                    var minute = document.createElement("td");
                    minute.classList.add("tablicaData");
                    minute.innerText = element[10];
                    red.append(minute);

                    var ocjena = document.createElement("td");
                    ocjena.classList.add("tablicaData");
                    ocjena.innerText = element[9];
                    red.append(ocjena);
                    
                    var uredi = document.createElement("td");
                    uredi.classList.add("tablicaLink");

                    var linkUredi = document.createElement("a");
                    linkUredi.classList.add("navLink");
                    linkUredi.innerText = "Uredi profil";
                    linkUredi.addEventListener("click", function(){
                        $.ajax({
                            url: "../php/urediProfil.php",
                            type: "POST",
                            data: {"profil": element[0]},
                            success: function(){
                                alert(element[0]);
                            }
                        });
                    });

                    uredi.append(linkUredi);
                    red.append(uredi);

                    $("#popisIgraca").append(red);
                });
            }
        });
    }

    function dohvatiZahtjeveTransfer(){
        var klubID = $("#klub").val();

        $.ajax({
            url: "../php/moderacija.php",
            type: "POST",
            data: {"zahtjevi": klubID},
            dataType: "json",
            success: function(data){
                $("#popisZahtjeva").empty();
                data.forEach(element => {
                    var red = document.createElement("tr");
                    red.classList.add("tablicaRed");

                    var imePrezime = document.createElement("td");
                    imePrezime.classList.add("tablicaData");
                    imePrezime.innerText = element[3] + " " + element[4];
                    red.append(imePrezime);

                    var iznos = document.createElement("td");
                    iznos.classList.add("tablicaData");
                    iznos.innerText = element[1] + " EUR";
                    red.append(iznos);

                    var klub = document.createElement("td");
                    klub.classList.add("tablicaData");
                    klub.innerText = element[2];
                    red.append(klub);
                    
                    var prihvati = document.createElement("td");
                    prihvati.classList.add("tablicaLink");

                    var linkPrihvati = document.createElement("a");
                    linkPrihvati.classList.add("navLink");
                    linkPrihvati.innerText = "Prihvati";
                    linkPrihvati.addEventListener("click", function(){
                        $.ajax({
                            url: "../php/moderacija.php",
                            type: "POST",
                            data: {"odgovorDa": element[0]},
                            success: dohvatiPodatkeModeratora
                        });
                    });

                    prihvati.append(linkPrihvati);
                    red.append(prihvati);

                    var odbij = document.createElement("td");
                    odbij.classList.add("tablicaLink");

                    var linkOdbij = document.createElement("a");
                    linkOdbij.classList.add("navLink");
                    linkOdbij.innerText = "Odbij";
                    linkOdbij.addEventListener("click", function(){
                        $.ajax({
                            url: "../php/moderacija.php",
                            type: "POST",
                            data: {"odgovorNe": element[0]},
                            success: dohvatiPodatkeModeratora
                        });
                    });

                    odbij.append(linkOdbij);
                    red.append(odbij);

                    $("#popisZahtjeva").append(red);
                });
            }
        });
    }

    function dohvatiSlobodneIgrace(){
        var klubID = $("#klub").val();

        $.ajax({
            url: "../php/moderacija.php",
            type: "POST",
            data: {"slobodni": klubID},
            dataType: "json",
            success: function(data){
                $("#popisSlobodnih").empty();
                data.forEach(element => {
                    var red = document.createElement("tr");
                    red.classList.add("tablicaRed");

                    var imePrezime = document.createElement("td");
                    imePrezime.classList.add("tablicaData");
                    imePrezime.innerText = element[1] + " " + element[2];
                    red.append(imePrezime);

                    var pozicija = document.createElement("td");
                    pozicija.classList.add("tablicaData");
                    pozicija.innerText = element[7];
                    red.append(pozicija);

                    var cijena = document.createElement("td");
                    cijena.classList.add("tablicaData");
                    cijena.innerText = element[8] + " EUR";
                    red.append(cijena);

                    var minute = document.createElement("td");
                    minute.classList.add("tablicaData");
                    minute.innerText = element[10];
                    red.append(minute);

                    var ocjena = document.createElement("td");
                    ocjena.classList.add("tablicaData");
                    ocjena.innerText = element[9];
                    red.append(ocjena);

                    var ponudi = document.createElement("td");
                    ponudi.classList.add("tablicaLink");

                    var linkPonudi = document.createElement("a");
                    linkPonudi.classList.add("navLink");
                    linkPonudi.innerText = "Pošalji ponudu";
                    linkPonudi.addEventListener("click", function(){
                        $.ajax({
                            url: "../php/moderacija.php",
                            type: "POST",
                            data: {"ponuda": element[0]},
                            success: dohvatiPodatkeModeratora
                        });
                    });

                    ponudi.append(linkPonudi);
                    red.append(ponudi)

                    $("#popisSlobodnih").append(red);
                });
            }
        });
    }

    function dohvatiIgraceKlubova(){
        var klubID = $("#klub").val();

        $.ajax({
            url: "../php/moderacija.php",
            type: "POST",
            data: {"zauzeti": klubID},
            dataType: "json",
            success: function(data){
                $("#popisZauzetih").empty();
                data.forEach(element => {
                    var red = document.createElement("tr");
                    red.classList.add("tablicaRed");

                    var klub = document.createElement("td");
                    klub.classList.add("tablicaData");
                    klub.innerText = element[0];
                    red.append(klub);

                    var imePrezime = document.createElement("td");
                    imePrezime.classList.add("tablicaData");
                    imePrezime.innerText = element[2] + " " + element[3];
                    red.append(imePrezime);

                    var pozicija = document.createElement("td");
                    pozicija.classList.add("tablicaData");
                    pozicija.innerText = element[4];
                    red.append(pozicija);

                    var cijena = document.createElement("td");
                    cijena.classList.add("tablicaData");
                    cijena.innerText = element[5] + " EUR";
                    red.append(cijena);

                    var minute = document.createElement("td");
                    minute.classList.add("tablicaData");
                    minute.innerText = element[6];
                    red.append(minute);

                    var ocjena = document.createElement("td");
                    ocjena.classList.add("tablicaData");
                    ocjena.innerText = element[7];
                    red.append(ocjena);

                    var ponudi = document.createElement("td");
                    ponudi.classList.add("tablicaLink");

                    var linkPonudi = document.createElement("a");
                    linkPonudi.classList.add("navLink");
                    linkPonudi.innerText = "Pošalji ponudu";
                    linkPonudi.addEventListener("click", function(){
                        $.ajax({
                            url: "../php/moderacija.php",
                            type: "POST",
                            data: {"ponuda": element[0]},
                            success: dohvatiPodatkeModeratora
                        });
                    });

                    ponudi.append(linkPonudi);
                    red.append(ponudi)

                    $("#popisZauzetih").append(red);
                });
            }
        });
    }

    function dohvatiTransfere(){
        var klubID = $("#stat").val();
        var datumOd = $("#od").val();
        var datumDo = $("#do").val();

        $.ajax({
            url: "../php/moderacija.php",
            type: "POST",
            data: {"klub": klubID,"datumOd": datumOd, "datumDo": datumDo},
            dataType: "json",
            success: function(data){
                $("#popisTransfera").empty();
                data.forEach(element => {
                    var red = document.createElement("tr");
                    red.classList.add("popisZauzetih");

                    var klub = document.createElement("td");
                    klub.classList.add("tablicaData");
                    klub.innerText = element[4];
                    red.append(klub);

                    var imePrezime = document.createElement("td");
                    imePrezime.classList.add("tablicaData");
                    imePrezime.innerText = element[0] + " " + element[1];
                    red.append(imePrezime);

                    var cijena = document.createElement("td");
                    cijena.classList.add("tablicaData");
                    cijena.innerText = element[2] + " EUR";
                    red.append(cijena);

                    var datum = document.createElement("td");
                    datum.classList.add("tablicaData");
                    datum.innerText = element[3];
                    red.append(datum);

                    $("#popisTransfera").append(red);
                });
            }
        });
    }

    function unesiNoviSport(){
        var naziv = $("#nazivS").val();
        var broj = $("#brojS").val();
        var tijelo = $("#tijeloS").val();
        var opis = $("#opisS").val();

        $.ajax({
            url: "../php/admin.php",
            type: "POST",
            data: {"naziv": naziv, "broj": broj, "tijelo": tijelo, "opis": opis},
            success: function(){
                alert("Upisano u bazu!");
                $("#nazivS").val("");
                $("#brojS").val("");
                $("#tijeloS").val("");
                $("#opisS").val("");
            }
        });
    }

    function unesiNoviKlub(){
        var naziv = $("#nazivK").val();
        var oznaka = $("#oznakaK").val();
        var logo = $("#logoK").val();
        var godina = $("#godK").val();
        var trener = $("#trenerK").val();
        var stadion = $("#stradionK").val();
        var sport = $("#sportK").val();

        $.ajax({
            url: "../php/admin.php",
            type: "POST",
            data: {"naziv": naziv, "oznaka": oznaka, "logo": logo, "godina": godina, "trener": trener, "stadion": stadion, "sport": sport},
            success: function(){
                alert("Upisano u bazu!");
                $("#nazivK").val("");
                $("#oznakaK").val("");
                $("#logoK").val("");
                $("#godK").val("");
                $("#trenerK").val("");
                $("#stradionK").val("");
                $("#sportK").val("");
            }
        });
    }

    function dohvatiZahtjeveZaNapustanje(){
        $.ajax({
            url: "../php/admin.php",
            type: "POST",
            data: {"napustanje": 1},
            dataType: "json",
            success: function(data){
                $("#popisZahtjeva").empty();
                data.forEach(element => {
                    var red = document.createElement("tr");
                    red.classList.add("tablicaRed");
    
                    var imePrezime = document.createElement("td");
                    imePrezime.classList.add("tablicaData");
                    imePrezime.innerText = element[2] + " " + element[3];
                    red.append(imePrezime);

                    var klub = document.createElement("td");
                    klub.classList.add("tablicaData");
                    klub.innerText = element[4];
                    red.append(klub);

                    var datum = document.createElement("td");
                    datum.classList.add("tablicaData");
                    datum.innerText = element[1];
                    red.append(datum);
                    
                    var prihvati = document.createElement("td");
                    prihvati.classList.add("tablicaLink");

                    var linkPrihvati = document.createElement("a");
                    linkPrihvati.classList.add("navLink");
                    linkPrihvati.innerText = "Prihvati";
                    linkPrihvati.addEventListener("click", function(){
                        $.ajax({
                            url: "../php/admin.php",
                            type: "POST",
                            data: {"odgovorDa": element[0], "profil": element[5]},
                            success: dohvatiZahtjeveZaNapustanje
                        });
                    });

                    prihvati.append(linkPrihvati);
                    red.append(prihvati);

                    var odbij = document.createElement("td");
                    odbij.classList.add("tablicaLink");

                    var linkOdbij = document.createElement("a");
                    linkOdbij.classList.add("navLink");
                    linkOdbij.innerText = "Odbij";
                    linkOdbij.addEventListener("click", function(){
                        $.ajax({
                            url: "../php/admin.php",
                            type: "POST",
                            data: {"odgovorNe": element[0]},
                            success: dohvatiZahtjeveZaNapustanje
                        });
                    });

                    odbij.append(linkOdbij);
                    red.append(odbij);

                    $("#popisZahtjeva").append(red);
                });
            }
        });
    }

    function dodijeliModeratora(){
        var modID = $("#mod").val();
        var klubID = $("#klub").val();

        $.ajax({
            url: "../php/admin.php",
            type: "POST",
            data: {"modID": modID, "klubID": klubID},
            success: function(){
                alert("Upisano u bazu!");
            },
            error: function(){
                alert("Pogreška");
            }
        });
    }
});