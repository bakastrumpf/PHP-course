
const simboli = ['karo', 'pik', 'skocko', 'srce', 'tref', 'zvezda'];
const maks_br_pokusaja = 6;
const br_elem_u_kombinaciji = 4;

/*
console.log(k); // postoji globalna promenljiva
console.log(kombinacija); //javlja gresku
var k = 0;
*/

/*
statistika:
    * vreme po partiji
    * broj pobeda
    * broj pokušaja

let brojPokusaja = 0; // neće raditi jer svaki put kad otvorimo stranicu sve ide od nule

localStorage:    // može da se upotrebi da čuva podatke u lokalu i nakon zatvaranja igre
                // odavde možemo da dohvatimo promenljive
    * setItem - postavljanje vrednosti u localStorage - parametri (key)
        key - string
        value - string

        localStorage.setItem('brojPokusaja', 3); --> 3 se konvertuje u String ("3")
    * getItem - dohvata vrednost iz localStorage - parametri (key)
            povratna vrednost - string
    * clear - brisanje celog sadržaja
*/

let kombinacija = [];
let pokusaj = [];
let br_pokusaja = 0;
let pokusajPoz = 0;
let vremePocetka;
let intervalTmp = 0;
let intervalId;


function init() {
    let simboliDiv = document.getElementById("simboli");
    for (let i = 0; i < simboli.length; i++) {
        let simbol = simboli[i];

        let simbolImg = document.createElement('img'); // <img>
        let imgName = "img/" + simbol + ".jpg";
        simbolImg.setAttribute("src", imgName);  // <img src="img/karo.jpg"/>
        simbolImg.setAttribute("id", simbol); // može i bez ovoga, ali je kasnija obrada lakša
        simboliDiv.appendChild(simbolImg);
    }



    // "key" - "value"
    // localStorage.setItem("pobeda", 0);
    // localStorage.setItem("pobeda", 1);
    // -------------------------------------------------------------------
    // dohvatamo vrednost
    // "key"
    // let pobeda = localStorage.getItem("pobeda"); // vraća 1 ako imamo vrednost za tu promenljivu
    // ovde generišemo simbole
    // simboli[1] = 'nesto';
    // console.log(simboli);
    // let nekaVrednost = localStorage.getItem("nekiKljuc"); // vraća NULL ako nemamo taj ključ
}

function intervalFunction() {
    console.log(intervalTmp);
    intervalTmp++;
    if (intervalTmp == 30) {
        console.log("interval end");
        clearInterval();
        ukloniAtributNaKlik();
        sacuvajStatistikuPartije(false);
        // TODO: ispisivanje tražene kombinacije

    }
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
    vremePocetka = Date.now(); // trenutak početka partije
    intervalId = setInterval(intervalFunction, 1000);
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
        ukloniAtributNaKlik();
        sacuvajStatistikuPartije(false);
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
    // sačuvaj u nizu sa pokušajima koji je simbol u pitanju  
    pokusaj[pokusajPoz] = simbol;
    // prikaži njegovu sliku
    imgSrc = "img/" + simbol + ".jpg";
    // na id attempt_rbpokusaja_pozicija stavi odgovarajuću sliku
    imgId = "pokusaj_" + br_pokusaja + "_" + pokusajPoz;
    let imgDiv = document.getElementById(imgId);

    console.log("imgDiv: " + imgDiv);

    imgDiv.setAttribute("src", imgSrc);
    // pređi na sledeću poziciju
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
    alert("POBEDA!!!");
    ukloniAtributNaKlik();
    sacuvajStatistikuPartije(true); // ili 1, ako smo ranije napisali drugačiju logiku aplikacije
}

function sacuvajStatistikuPartije(pobeda) {
    let vremeZavrsetka = Date.now();
    let protekloVreme = vremeZavrsetka - vremePocetka; //  milisekunde
    console.log(protekloVreme);

    // let sacuvanaIgra = localStorage.getItem("igre" + brojIgara);
    // games0, games1, games2...
    //pokusaj#vreme, pokusaj#vreme, pokusaj#vreme
    // let sacuvanoVreme = localStorage.getItem("vreme" + brojPartija);
    // let brojPartija mora da se pamti u localStorage
    // 2. mogućnost

    let sacuvanaIgra = localStorage.getItem("igre");
    // igre --> pokusaj#time0#ishod;pokusaj#time1#ishod;pokusaj#time2;
    // čitanje => times.split(';') -> pokusaj#time0, pokusaj#time1, pokusaj#time2 => split...
    if (sacuvanaIgra == null) {
        vremePocetka = "" + br_pokusaja + "#" + protekloVreme;
        // + "#" + pobeda;
    } else {
        sacuvanaIgra += ";" + br_pokusaja + "#" + protekloVreme;
    }

    localStorage.setItem("igre", sacuvanaIgra);
    let brojPobeda = localStorage.getItem("brojPobeda");
    // pobeda - true / false, 1/0, brojPobeda = pobeda
    if (brojPobeda == null) {
        if (pobeda) {
            brojPobeda = 1;
        } else {
            brojPobeda = 0;
        }
    } else {
        if (pobeda) {
            brojPobeda = parseInt(brojPobeda) + 1;
        }
    }
    localStorage.setItem("brojPobeda", brojPobeda);
}

function proveriKombinaciju() {
    // console.log(kombinacija);
    // console.log(pokusaj);
    let crveni = 0;
    let zuti = 0;
    let netacniNiz = [];
    let vratiVrednost = false;

    for (let i = 0; i < br_elem_u_kombinaciji; i++) {
        // kombincija: skočko, srce, karo, karo 
        // pokušaj: pik, srce --> '', skočko, tref
        // problem: 
        if (kombinacija[i] == pokusaj[i]) {
            crveni++;
            pokusaj[i] = '';
        } else {
            // skočko, karo, srce
            // 
            netacniNiz.push(kombinacija[i]);
        }
    }

    if (crveni == br_elem_u_kombinaciji) {
        vratiVrednost = true;
    }

    // pokušaj: pik, '', skočko, tref
    // netačno: skočko, karo, srce
    // -----------
    // pokušaj: skočko, '', zvezda, tref
    // netačno: skočko, skočko, srce
    for (let elem of netacniNiz) {
        let ind = pokusaj.indexOf(elem);
        if (ind != -1) {
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
    return vratiVrednost;
}

function ukloniAtributNaKlik() {
    let simboliDiv = document.getElementById("simboli");
    let simboliImgs = simboliDiv.children;
    for (i = 0; i < simboliImgs.length; i++) {
        simboliImgs[i].removeAttribute("onclick");
    }
}

function istorija() {
    window.open("primer2104istorija.html")
}