
function proveriKorisnickoIme() {
    var korIme = document.getElementById('korisnicko_ime').value;
    var reg = new RegExp("^[a-z][a-z0-9_]{4,11}$", "i");
    var match = korIme.match(reg);
    return match != null;
}

function proveriMejl() {
    var mejl = document.getElementById("mejl").value;
    // alert(mejl);
    var reg = new RegExp("^([a-z0-9_\\.-]+)@([a-z]+\\.)+[a-z]{2,10}$", "i");
    var match = mejl.match(reg);
    // alert(match); => za tasha@etf.rs => ["tasha@etf.rs", "tasha", "etf."]
    return match != null;
}

function proveriTelefon() {
    var tel = document.getElementById("telefon").value;
    // +381 64 2587 425
    // +(381)642587425
    // +38164/2587425
    // 015395848
    // 015/395848
    // (011)3153665
    // samo brojevi, () ili /
    // var reg = new RegExp("^\\+?(\\d+| \\(\\d+\\)|\\d+/)[\\d ]+$");
    var reg = new RegExp("^\\+?(\\(\\d+\\)|\\d+/?)[\\d ]+$");
    var pos = tel.search(reg);
    // var match = tel.match(reg);
    return pos != -1;
}

function proveriLozinku() {
    // dohvati lozinku  i ponovljenu lozinku
    var loz = document.getElementById("lozinka").value;
    var loz2 = document.getElementById("ponovljena_lozinka").value;
    // proveri da li su iste
    if (loz != loz2)
        return false;
    // proveri format lozinke: 
    //      - bar 1 malo slovo, 
    // var strongRegex = new RegExp("^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#\$%\^&\*])(?=.{8,})");
    // var mediumRegex = new RegExp("^(((?=.*[a-z])(?=.*[A-Z]))|((?=.*[a-z])(?=.*[0-9]))|((?=.*[A-Z])(?=.*[0-9])))(?=.{6,})");

    // var regMaloSlovo = new RegExp("[a-z]");
    var regMaloSlovo = /[a-z]/;
    if (loz.search(regMaloSlovo) == -1)
        return false;

    //      - bar 1 veliko slovo, 
    var regVelikoSlovo = new RegExp("[A-Z]");
    if (loz.search(regVelikoSlovo) == -1)
        return false;

    //      - bar 1 broj, 
    // var regBroj = new RegExp("\\d");
    var regBroj = /\d/;
    if (regBroj.exec(loz) == null)
        return false;

    //      - bar 1 specijalni znak   
    var regZnak = new RegExp("\\W");
    if (!regZnak.test(loz))
        return false;

    //      - bar 8 znakova
    return loz.length >= 8;
}

function proveriPodatke() {
    var poruka = "";
    if (!proveriKorisnickoIme())
        poruka += "Korisničko ime nije ispravno. ";
    if (!proveriMejl())
        poruka += "Mejl nije u ispravnom formatu. ";
    if (!proveriTelefon())
        poruka += "Telefon nije u ispravnom formatu. ";
    if (!proveriLozinku())
        poruka += "Lozinke se ne poklapaju ili postoji greška u formatu. "
    if (poruka == "")
        poruka = "Sve je u redu. Uspešno ste se registrovali. ";
    document.getElementById("poruka").innerHTML = poruka;
}