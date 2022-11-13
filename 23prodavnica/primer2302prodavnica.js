
let nizKorisnika = [];

/*
korisnik = {
    korIme: "marija",
    mejl: "marija@proba.net",
    tel: "0643699633",
    lozinka: "tralala36"
}
*/

function init() {
    let tekstNizKorisnika = localStorage.getItem("nizKorisnika");
    if (tekstNizKorisnika != null) {
        nizKorisnika = JSON.parse(tekstNizKorisnika);
    }
}

function resetujGreske() {
    document.getElementById("korisnickoImeGreska").innerHTML = "";
    document.getElementById("mejlGreska").innerHTML = "";
    document.getElementById("telefonGreska").innerHTML = "";
    document.getElementById("lozinkaGreska").innerHTML = "";
    document.getElementById("potvrdaLozinkeGreska").innerHTML = "";
}

function dohvatiProveriPodatke() {
    resetujGreske(); // pre prvog ifa, ovde ili ispod svih let
    let korIme = document.getElementById("korisnickoIme").value;
    let mejl = document.getElementById("mejl").value;
    let tel = document.getElementById("telefon").value;
    let loz = document.getElementById("lozinka").value;
    let ploz = document.getElementById("potvrdaLozinke").value;
    // proveri da li su uneta sva polja (ni jedno nije prazno)
    // ako nije uneto neko polje, Greška ispisuje da nije popunjeno
    // i vraćamo se nazad, return false
    if (korIme == "") {
        document.getElementById("korisnickoImeGreska").innerHTML = "Niste uneli korisničko ime!";
        return false;
    }
    if (mejl == "") {
        document.getElementById("mejlGreska").innerHTML = "Niste uneli mejl!";
        return false;
    }
    if (tel == "") {
        document.getElementById("telefonGreska").innerHTML = "Niste uneli telefon!";
        return false;
    }
    if (loz == "") {
        document.getElementById("lozinkaGreska").innerHTML = "Niste uneli lozinku!";
        return false;
    }
    if (ploz == "") {
        document.getElementById("potvrdaLozinkeGreska").innerHTML = "Niste potvrdili lozinku!";
    }
    // da li je lozinka == potvrdaLozinke
    if (loz != ploz) {
        alert("Lozinke se ne poklapaju");
        return false;
    }
    return true;
}

function proveriPostojeciKorisnik() {
    let korIme = document.getElementById("korisnickoIme").value;
    // proveravamo da li već postoji neko s tim kor imenom
    for (let i = 0; i < nizKorisnika.length; i++) {
        if (nizKorisnika[i].korIme == korIme) {
            document.getElementById("korisnickoImeGreska").innerHTML =
                "Korisničko ime već postoji";
            return true;
        }
    }

    /*
    for (let kor of nizKorisnika){
        if (kor.korIme == korIme){
            document.getElementById("korisnickoImeGreska").innerHTML =
            "Korisničko ime već postoji";
            return true;
        }
    }
    */
}

function dodajKorisnika() {
    let korIme = document.getElementById("korisnickoIme").value;
    let mejl = document.getElementById("mejl").value;
    let tel = document.getElementById("telefon").value;
    let loz = document.getElementById("lozinka").value;
    let korisnik = {
        korIme: korisnickoIme,
        mejl: mejl,
        tel: telefon,
        lozinka: lozinka
    }

    /*
    ili, v2
    let korisnik = {
        korIme: document.getElementById("korisnickoIme").value, 
        mejl: document.getElementById("mejl").value,
        tel: document.getElementById("telefon").value,
        lozinka: document.getElementById("lozinka").value
    }
    */
    // novog korisnika dodajemo u niz
    nizKorisnika.push(korisnik);
    // novog korisnika čuvamo u localStorage
    console.log(nizKorisnika);
    alert("Uspešna registracija!");
    let tekstNizKorisnika = JSON.stringify(nizKorisnika);
    localStorage.setItem("nizKorisnika", tekstNizKorisnika);
}



function registrujSe() {
    // resetujGreske(); // može i ovde
    // pokupimo podatke i proverimo da li su u ispravnom formatu
    // TODO: ispišemo grešku ukoliko su podaci u lošem formatu
    if (dohvatiProveriPodatke()) {
        // ukoliko su u ispravnom formatu, proverimo da li je već registrovan
        // ako je korisnik već registrovan, javimo grešku
        if (!proveriPostojeciKorisnik()) {
            // ako korisnik nije registrovan, sačuvamo ga
            dodajKorisnika();
        }
    }

    // return; // implicitno
}

function prijava(){
    let korIme = document.getElementById("korisnickoIme").value;
    let loz = document.getElementById("lozinka").value;

    for (let i = 0; i < nizKorisnika.length; i++){
        let trenutniKorisnik = nizKorisnika[i];
        if (nizKorisnika[i].korisnickoIme == korIme && nizKorisnika[i].lozinka == loz){
            localStorage.setItem("ulogovaniKorisnik", korIme);
            localStorage.setItem("ulogovaniKorisnikMejl", nizKorisnika[i].mejl);
            window.location.href = "primer2402prodavnica.html";
        }
    }

}

// objašnjenje
/*
function test (a, b){
    let a = 6;
    let b = 4;
    if (a<b){
        return false;
    }else{
        return false;
    }
    return true;
}
*/
// let ok = test(1,2);