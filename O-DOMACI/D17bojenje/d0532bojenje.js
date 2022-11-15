function oboji() {
    // dobavi polja s imenom "filled"
    let oboji = document.getElementsByName("filled");
    // svakom dobavljenom polju postavi atribut na boju
    oboji.forEach(polje => {
        polje.setAttribute("class", "green");
    });
}

function dodajSliku() {
    let slike = Array.from(document.getElementsByTagName("img"));
    // ne radi:
    // let slike = document.getElementsByTagName("img");
    console.log(slike);
    // radi s pravljenjem niza kroz Array.from !?
    // svakom dobavljenom polju postavi atribut na sliku
    slike.forEach(slika => {
        slika.setAttribute("src", "ico.png");
    });
}

// izvor: https://www.programiz.com/javascript/forEach
// izvor: https://www.freecodecamp.org/news/javascript-foreach-how-to-loop-through-an-array-in-js/