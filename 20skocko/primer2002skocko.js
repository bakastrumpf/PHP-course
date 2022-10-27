
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

function init(){
    let simboliDiv = document.getElementById("simboli");
    for(let i = 0; i < simboli.length; i++){
        let simbol = simboli[i];
        // 
        let simbolImg = document.createElement('img');
        let imgName = "img/"+simbol+".jpg";
        simbolImg.setAttribute("src", imgName);
        simbolImg.setAttribute("id", simbol); // može i bez ovoga, ali je kasnija obrada lakša

        simboliDiv.appendChild(simbolImg);
    }
    // generisanje simbola
    // simboli[1] = 'nesto';
    console.log(simboli);
}

function newGame(){
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
    for(let simbolImg of simboliImgs){
        let imgIme = simbolImg.getAttribute("id");
        simbolImg.setAttribute('onclick', 'odaberiSimbol('+imgIme+')')
    }

    // briše stare pokušaje i prikazuje polja za nov pokusaj
    let attemptsDiv = document.getElementById("pokusaji");
    attemptsDiv.innerHTML = '';
    br_pokusaja = 0;
    newAttempt();
    // generisanje nasumičnih kombinacija koje pogađamo

}

function newAttempt(){
    // da li imamo pravo na nov pokušaj?
    // br_pokusaja ima vrednosti 0, 1, 2, 3
    // br_pokusaja++;
    if(br_pokusaja == maks_br_pokusaja){
        alert("Nije rešeno");
        // TODO: onemogućiti dalje kliktanje po simbolima
        return;
    }

    let attemptsDiv = document.getElementById("pokusaji");
    for(let i=0; i < br_elem_u_kombinaciji; i++){
        // pravimo sliku i dodajemo je
        let attemptImg = document.createElement("img");
        let imgId = "pokušaj_"+br_pokusaja+"_"+i;
        // <img_id="pokusaj_0_3" /> 
        // attempt broj_pokusaja broj_elem
        // ovako jedinstveno odredimo id za svaku sliku
        attemptImg.setAttribute("id", imgId);
        attemptsDiv.appendChild(attemptImg);
    }
}

// funkciji prosleđujemo koji smo simbol kliknuli
function odaberiSimbol(simbol){

}