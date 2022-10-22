
function proveriKorisnickoIme() {
    var korIme = document.getElementById('korisnicko_ime').value;
    var reg = new RegExp("^[a-z][a-z0-9_]{4,11}$","i");
    var match = korIme.match(reg);
    return match != null;
}

function proveriMejl(){
    var mejl = document.getElementById("mejl").value;
    // alert(mejl);
    var reg = new RegExp("^([a-z0-9_\\.-]+)@([a-z]+\\.)+[a-z]{2,10}$","i");
    var match = mejl.match(reg);
    // alert(match); => za tasha@etf.rs => ["tasha@etf.rs", "tasha", "etf."]
    return match!=null;
}

function proveriTelefon(){
    var tel = document.getElementById("telefon").value;
    var reg = new RegExp("^\\d+$");
    var pos = tel.search(reg);
    // var match = tel.match(reg);
    return pos != -1;
}

function proveriPodatke() {
    var poruka = "";
    if (!proveriKorisnickoIme())
        poruka += "Korisničko ime nije ispravno. ";
    
    if(!proveriMejl())
        poruka += "Mejl nije u ispravnom formatu. ";

    if(!proveriTelefon())
        poruka += "Telefon nije u ispravnom formatu. ";

    if (poruka == "")
        poruka = "Sve je u redu. Uspešno ste se registrovali.";
    document.getElementById("poruka").innerHTML = poruka;
        
}