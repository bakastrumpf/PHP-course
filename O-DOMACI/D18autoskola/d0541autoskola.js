function proveriIme(){
    let ime = document.getElementById("ime").value;
    if (ime == null){
        return false;
    }
    
}

function proveriPrezime(){
    let prezime = document.getElementById("prezime").value;
    if (prezime == null){
        return false;
    }
}

function proveriAdresu(){
    let adresa = document.getElementById("adresa").value;
    if (adresa == null){
        return false;
    }
}

function proveriJmbg(){
    let jmbg = document.getElementById("jmbg").value;
    var reg = new RegExp("^\d{13}$");

    // [0-9]{11}+[1]{1}+[0]{1}
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