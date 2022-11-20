/*
let vreme = 0;
let sekunde;
let minute;
let time = "";

// TODO: na svaki minut iskače obaveštenje o vremenu provedenom na sajtu
// inicijalizuj brojanje vremena od 0
// sekunde pretvori u minute
// setInterval
// alert ("Na sajtu ste proveli" + vreme + "minuta");

// alert("Добродошли!");

// treba nam samo interval a ne funkcija!!!
// jer treba da se učita čim e sajt otvori 
// i da otad broji vreme
// i da redovno izbacuje ALERT

setInterval(function(){
    vreme++;
        // time = 67s;
    sekunde = vreme % 60;
    minute = Math.floor(vreme / 60);

    time = (minute < 10 ? "0" : "") + minute 
    + "." 
    + (sekunde < 10 ? "0" : "") + sekunde;
    }, 1000);

setInterval(function(){
    alert("Na sajtu ste " + vreme);
}, 60000);
*/

function proveriMejl() {
    var mejl = document.getElementById("email").value;
    // alert(mejl);
    var reg = new RegExp("^([a-z0-9_\\.-]+)@([a-z]+\\.)+[a-z]{2,10}$", "i");
    var match = mejl.match(reg);
    // alert(match);
    return match != null;
}

function proveriTel() {
    var tel = document.getElementById("tel");
    var reg = new RegExp("^\\+?(\\(\\d+\\)|\\d+/?)[\\d ]+$");
    var pos = tel.search(reg);
    return pos != -1;
}

function proveriPoruku() {
    var poruka = document.getElementById("poruka").value;
    if (poruka == "")
        return false;
}

function posalji() {
    var poruka = "";
    if (!proveriMejl())
        poruka += "Нисте унели имејл адресу. ";
    if (!proveriTel())
        poruka += "Телефон није у исправном формату. ";
    if (!proveriPoruku())
        poruka += "Нисте унели поруку. ";
    if (poruka == "")
        poruka = "Честитамо. Успешно сте послали поруку. ";
    document.getElementById("poruka").innerHTML = poruka;
}


// TODO: localStorage
// sačuvaj poruke u localStorage
// svaka poruka da ima ID
// poruke se čuvaju u nizu
// prikaz poruka sortiranih po imejl adresi

let svePoruke = [];

function prijave(){
    var podaciPoruka = localStorage.getItem("svePoruke");
    if (podaciPoruka != null){
        svePoruke = JSON.parse(podaciPoruka);
    }
}



// ideja:
// povezati formu da poruke šalje na imejl adresu
// ne može:
// izvor: https://html.form.guide/email-form/html-email-form/
// izvor: https://www.emailjs.com/docs/tutorial/creating-contact-form/
// kroz bek može, kod Nebojše to radili kroz Javu prošle godine