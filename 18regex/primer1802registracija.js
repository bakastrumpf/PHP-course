
function proveriKorisnickoIme() {
    var korIme = document.getElementById('korisnicko_ime').value;
    var reg = new RegExp("^[a-z][a-z0-9_]{4,11}$","i");
    var match = korIme.match(reg);
    return match != null;
}

function proveriPodatke() {
    var poruka = "";
    if (!proveriKorisnickoIme())
        poruka += "Korisničko ime nije ispravno";
    
    if (poruka == "")
        poruka = "Sve je u redu";
    document.getElementById("poruka").innerHTML = poruka;
        
}