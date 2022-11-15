// TODO:
// sredi regekse da RADE!!!
// localStorage: čuva podatke o prijavi
// jmbg: regeks - poslednje dve cifre 1 i 0 - mora peške da se piše, ne može raspon 0-1
// alert: ako su neka polja nepopunjena
// uspešna prijava prebacuje na novu stranicu
// nova stranica ispisuje podatke o prijavi + iznos rate za odabranu kategoriju (npr. 80 hiljada / 6 rata =  13333 dinara)

function proveriIme(){
    let ime = document.getElementById("ime").value;
    if (ime == ""){
        return false;
    } 
}

function proveriPrezime(){
    let prezime = document.getElementById("prezime").value;
    if (prezime == ""){
        return false;
    }
}

function proveriAdresu(){
    let adresa = document.getElementById("adresa").value;
    if (adresa == ""){
        return false;
    }
}

function proveriJmbg(){
    let jmbg = document.getElementById("jmbg").value;
    var reg = new RegExp("^\d{13}$");

    // \d{11}[1]{1}[0]{1}
    var pos = jmbg.search(reg);
}

function posalji(){
    var poruka = "";
    if (!proveriIme())
        poruka += "Niste uneli ime. ";
    if (!proveriPrezime())
        poruka += "Niste uneli prezime. ";
    if (!proveriAdresu())
        poruka += "Niste uneli adresu. ";
    if (!proveriJmbg())
        poruka += "Niste uneli JMBG ili postoji greška u formatu. "
    if (poruka == "")
        poruka = "Sve je u redu. Uspešno ste se prijavili za obuku. ";
    document.getElementById("poruka").innerHTML = poruka;
}