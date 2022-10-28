function sacuvajPorudzbinu(){
    var porudzbina = document.getElementById("porudzbina");
}

function proveriIme(){
    var ime = document.getElementById("ime");

}

function proveriPrezime(){
    var prezime = document.getElementById("prezime");

}

function proveriAdresu(){
    var adresa = document.getElementById("adresa");

}

function proveriPostBroj(){
    var postBroj = document.getElementById("postBr");
    var reg = new RegExp("/^\\[1][0-9]{5}/");  // neispravan regeks, proveriti!
    var match = postBroj.search(reg);
    if (!reg.search(postBroj)) // takođe neispravno, popraviti!
        return false;
    
    return postBroj.length < 5;

}

function nacinPlacanja(){
    var placanje = document.getElementById("placanje");

}

function proveriPorciju(){
    var velicinaPorcije = document.getElementById("velPorc");

}

function proveriPodatke(){
    var poruka = "";
    if (!proveriIme())
        poruka += "Nedostaje ime. ";
        if (!proveriPrezime())
        poruka += "Nedostaje prezime. ";
    if (!proveriAdresu())
        poruka += "Nedostaje adresa. ";
    if (!proveriPostBroj())
        poruka += "Neispravan format poštanskog broja. "
    if (!nacinPlacanja())
        poruka += "Niste odabrali način plaćanja. ";
    if (!proveriPorciju())
        poruka += "Niste odabrali veličinu porcije. "
    if (poruka == "")
        poruka = "Čestitamo, uspešno ste poslali porudžbinu. Očekujte isporuku. ";
    document.getElementById("poruka").innerHTML = poruka;

}