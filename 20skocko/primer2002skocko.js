
const simboli = ['karo', 'pik', 'skocko', 'srce', 'tref', 'zvezda'];
const maks_br_pokusaja = 6;
const br_elem_u_kombinaciji = 4;

/*
console.log(k); // postoji globalna promenljiva
console.log(kombinacija); //javlja gresku
var k = 0;
*/

let kombinacija = [];
let pokusaj = [];
let br_pokusaja = 0;
let pokusajPoz = 0;

function init() {
    let simboliDiv = document.getElementById("simboli");
    for (let i = 0; i < simboli.length; i++) {
        let simbol = simboli[i];
        // 
        let simbolImg = document.createElement('img');
        let imgName = "img/" + simbol + ".jpg";
        simbolImg.setAttribute("src", imgName);
        simbolImg.setAttribute("id", simbol); // može i bez ovoga, ali je kasnija obrada lakša
        simboliDiv.appendChild(simbolImg);
    }
    // generisanje simbola
    // simboli[1] = 'nesto';
    // console.log(simboli);
}

function newGame() {
    // dodeljujemo onclick za svaki simbol
    let simboliDiv = document.getElementById("simboli");
    let simboliImgs = simboliDiv.children; // dohvatili niz slika

    /*for(let i=0; i<simboliImgs.length; i++){
        let simbolImg = simboliImgs[i]; // dohvatili konkretnu sliku
        // odaberiSimbol('tref')
        let imgSrc = simbolImg.getAttribute('src');
        let imgIme = imgSrc.substring(imgSrc.lastIndexOf("/"), imgSrc.lastIndexOf("."));
        // "img/tref.jpg" => "tref"
        // console.log(imgSrc.lastIndexOf("/"));
        // chooseSymbol('tref')
        simbolImg.setAttribute('onclick', 'odaberiSimbol('+imgIme+')');
    }
    */

    // for let elem of array
    for (let simbolImg of simboliImgs) {
        let imgIme = simbolImg.getAttribute("id");
        simbolImg.setAttribute('onclick', 'odaberiSimbol("' + imgIme + '")')
    }

    // briše stare pokušaje i prikazuje polja za nov pokusaj
    let attemptsDiv = document.getElementById("pokusaji");
    attemptsDiv.innerHTML = '';
    br_pokusaja = 0;
    newAttempt();
    // generisanje nasumičnih kombinacija koje pogađamo
    generateNewCombo();
}

function generateNewCombo() {
    // u FOR petlji izabrati nasumične simbole i dodati ih u niz kombinacija
    for (let i = 0; i < br_elem_u_kombinaciji; i++) {
        // Math.random() => vraća nasumičan realan broj iz intervala [0,1)
        // 6*Math.random()-> [0,6)
        // Math.floor(6*Math.random()) --> neki ceo broj od brojeva 0, 1, 2 , 3, 4, 5
        // Math.floor (5.05) --> 5
        // Math.floor (5.95) --> 5
        // Math.floor (-5.05) --> -6
        kombinacija[i] = simboli[Math.floor(simboli.length * Math.random())];
    }
    console.log(kombinacija);
}

function newAttempt() {
    // da li imamo pravo na nov pokušaj?
    // br_pokusaja ima vrednosti 0, 1, 2, 3
    // br_pokusaja++;
    if (br_pokusaja == maks_br_pokusaja) {
        alert("Nije rešeno");
        // TODO: onemogućiti dalje kliktanje po simbolima
        return;
    }
    pokusajPoz = 0;
    let attemptsDiv = document.getElementById("pokusaji");
    for (let i = 0; i < br_elem_u_kombinaciji; i++) {
        // pravimo sliku i dodajemo je
        let attemptImg = document.createElement("img");
        let imgId = "pokusaj_" + br_pokusaja + "_" + i;
        // <img_id="pokusaj_0_3" /> 
        // attempt broj_pokusaja broj_elem
        // ovako jedinstveno odredimo id za svaku sliku
        attemptImg.setAttribute("id", imgId);
        attemptsDiv.appendChild(attemptImg);
    }
}

// funkciji prosleđujemo koji smo simbol kliknuli
function odaberiSimbol(simbol) {
    // na id attempt_rbpokusaja_pozicija stavi odgovarajuću sliku
    pokusaj[pokusajPoz] = simbol;
    // prikaži njegovu sliku
    imgSrc = "img/" + simbol + ".jpg";
    imgId = "pokusaj_" + br_pokusaja + "_" + pokusajPoz;

    let imgDiv  = document.getElementById(imgId);
    imgDiv.setAttribute("src", imgSrc);

    pokusajPoz++;
    // ukoliko smo izabrali celu kombinciju:
    if (pokusajPoz == br_elem_u_kombinaciji) {
        // - proveriti da li smo pogodili ispravnu kombinaciju
        if (proveriKombinaciju()) {
            // - ako jesmo, završi igru
            zavrsiIgru();
        } else {
            // - ako nismo, prelazimo na novi pokušaj
            br_pokusaja++;
            newAttempt();
        }
    }
}

function zavrsiIgru() {
    // TODO:
}

function proveriKombinaciju() {
    // console.log(kombinacija);
    // console.log(pokusaj);
    let crveni = 0;
    let zuti = 0;
    let netacniNiz = [];

    for (let i = 0; i < br_elem_u_kombinaciji; i++) {
        // kombincija: skočko, srce, karo, karo 
        // pokušaj: pik, srce --> '', skočko, tref
        // problem: 
        if (kombinacija[i] == pokusaj[i]){
            crveni++;
            pokusaj[i]= '';
        }else{
            // skočko, karo, srce
            // 
            netacniNiz.push(kombinacija[i]);
        }
    }

    // pokušaj: pik, '', skočko, tref
    // netačno: skočko, karo, srce
    // -----------
    // pokušaj: skočko, '', zvezda, tref
    // netačno: skočko, skočko, srce
    for(let elem of netacniNiz){
        let ind = pokusaj.indexOf(elem);
        if(ind != -1){
            // skočko, srce
            zuti++;
            pokusaj[ind] = '';
        }
    }    

    // console.log(crveni);
    let pokusaj2Div = document.getElementById("pokusaji");
    // 2 crvena, 1 zuto
    // iscrtati crvene i žute tačke za rezultat
    for (let i = 0; i < br_elem_u_kombinaciji; i++) {
        let rezDugme = document.createElement("button");
        let klasaDugmeta = "indicator";
        if (crveni > 0) {
            klasaDugmeta += " crveni";
            crveni--;
        } else if (zuti > 0) {
            klasaDugmeta += " zuti";
            zuti--;
        }
        rezDugme.setAttribute("class", klasaDugmeta);
        pokusaj2Div.appendChild(rezDugme);
    }
    let noviRed = document.createElement("br");
    pokusaj2Div.appendChild(noviRed);
}