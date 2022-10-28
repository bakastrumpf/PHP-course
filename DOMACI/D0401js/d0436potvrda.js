function generisiPorudzbinu(){

}

function proveriIme(){
    var ime = document.getElementById("ime");
    var regIme = new RegExp("^[a-z]{4,}$"); // dopuniti regeks tako da prvo slovo bude veliko
    var match = ime.match(regIme);
    return match != null;
}

function proveriPrezime(){
    var prezime = document.getElementById("prezime");
    var regPrez = new RegExp("^[a-z]{4,}$"); // dopuniti regeks tako da prvo slovo bude veliko
    var match = prezime.match(regPrezime);
    return match != null;
}

function proveriTipNamestaja(){
    var tipNam = document.getElementById("tipNamestaja");

    if(tipNam == null)
        return false;

}

function proveriMaxCenu(){
    var cena = document.getElementById("cena");
    var regBroj = /\d/;
    if (regBroj.exec(cena) == null)
        return false;

}

function proveriKolicinu(){
    var kolicina = document.getElementById("kolicina");
    var regKol = new RegExp("/\d/");
    if(regKol.exec(kolicina) == null)
        return false;

}

function proveriNacinPlacanja(){
    var nacinPlacanja = document.getElementById("nacinPlacanja");

    if(nacinPlacanja == null)
        return false;

}

function proveriPodatke(){
    var poruka = "";
    if (!proveriIme())
        poruka += "Nedostaje ime, ili ste uneli nedozvoljene znakove. ";
        if (!proveriPrezime())
        poruka += "Nedostaje prezime, ili ste uneli nedozvoljene znakove. ";
    if (!proveriTipNamestaja())
        poruka += "Niste odabrali komad nameštaja. ";
    if (!proveriMaxCenu())
        poruka += "Neispravan format cene. Dozvoljene su brojčane vrednosti. "
    if (!proveriKolicinu())
        poruka += "Niste uneli količinu. Dozvoljene su brojčane vrednosti. ";
    if (!proveriNacinPlacanja())
        poruka += "Niste odabrali način plaćanjaa. "
    if (poruka == "")
        poruka = "Čestitamo, uspešno ste poslali porudžbinu. Uskoro ćemo vam se javiti telefonom. ";
    document.getElementById("poruka").innerHTML = poruka;

}