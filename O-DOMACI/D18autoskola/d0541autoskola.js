// TODO:
// sredi regekse da RADE!!!
// localStorage: čuva podatke o prijavi
// jmbg: regeks - poslednje dve cifre 1 i 0 - mora peške da se piše, ne može raspon 0-1
// alert: ako su neka polja nepopunjena
// uspešna prijava prebacuje na novu stranicu
// nova stranica ispisuje podatke o prijavi + iznos rate za odabranu kategoriju (npr. 80 hiljada / 6 rata =  13333 dinara)

function poslatiPodaci(){
    var ime = document.getElementById("ime").value;
    let prezime = document.getElementById("prezime");
    let adresa = document.getElementById("adresa");
    let jmbg = document.getElementById("jmbg");
    let kat = document.getElementById("kat");
    let rata = document.getElementById("rate");
    var r = document.getElementById("rate").value;
    // var c = 
    var iznos = 0;
    
}


let svePrijave = [];
function prijave(){
    var podaciPrijava = localStorage.getItem("svePrijave");
    if (podaciPrijava != null){
        svePrijave = JSON.parse(podaciPrijava);
    }
}

/*
function izracunaj() {
    var a = parseInt(document.racunaljka.prvi.value);
    var b = parseInt(document.racunaljka.drugi.value);
    var rez = 0;
    var operacija=document.racunaljka.operacija.value;

    if ((isNaN(a) == false) && (isNaN(b) == false)) {
        switch (operacija) {
            case "zbir": rez = a + b;
                break;
            case "razlika": rez = a - b;
                break;
            case "proizvod": rez = a * b;
                break;
            case "deljenje": if (b == 0)
                        rez = "Забрањено дељење нулом!";
                        // alert ("Забрањено дељење нулом!")
                    else
                        rez = a / b;
                break;
            default: rez = "Непостојећа операција";
            // alert ("Непостојећа операција")
        }
        document.racunaljka.rezultat.value = rez;
    } else {
        document.racunaljka.rezultat.value = "Рачунаљка ради само с целим бројевима!";
    }
}
*/


function proveriIme(){
    var ime = document.getElementById("ime").value;
    var reg = new RegExp("^[a-z]{3,20}$", "i");
    var match = ime.match;
    return match != null;

    /*
    if (ime == ""){
        return false;
    } 
    */
    
    /*
    var korIme = document.getElementById('korisnicko_ime').value;
    var reg = new RegExp("^[a-z][a-z0-9_]{4,11}$", "i");
    var match = korIme.match(reg);
    return match != null;
    */

}

function proveriPrezime(){
    var prez = document.getElementById("prezime").value;
    var reg = new RegExp("^[a-z]{3,20}$", "i");
    var match = prez.match;
    return match != null;

    /*
    if (prezime == ""){
        return false;
    }
    */
}

function proveriAdresu(){
    var adr = document.getElementById("adresa").value;
    var reg = new RegExp("^[a-z][]0-9]{5,20}$", "i");
    var match = adr.match;
    return match != null;
    
    /*
    if (adresa == ""){
        return false;
    }
    */
}

function proveriJmbg(){
    var jmbg = document.getElementById("jmbg").value;
    var reg = new RegExp("^\d{11}[1]{1}[0]{1}");

    // ^(0[1-9]|[12][0-9]|3[01])(0[1-9]|1[012])[0-9]{9}$

    var match = jmbg.match;
    return match != null;
}

function posalji(){
    var poruka = "";
    if (!proveriIme())
        poruka += "Нисте унели име. ";
    if (!proveriPrezime())
        poruka += "Нисте унели презиме. ";
    if (!proveriAdresu())
        poruka += "Нисте унели адресу. ";
    if (!proveriJmbg())
        poruka += "Нисте унели ЈМБГ или постоји грешка у формату. ЈМБГ има 13 цифара, последње две су 1 и 0. "
    if (poruka == "")
        poruka = "Успешно сте се пријавили за обуку. Ускоро ће вам се отворити нова страница. ";
    document.getElementById("poruka").innerHTML = poruka;
}