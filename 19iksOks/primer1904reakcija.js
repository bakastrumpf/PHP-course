const idle = 0;
const waiting = 1;
const enabled = 2;

const low = 3000;
const high = 10000;

let state = idle;
let start = null;

function enableButton() {
    const id = Math.floor(Math.random()*3);
    const element = document.getElementById("button"+id);

    element.className = "btn btn-success";
    element.disabled = false;
    element.innerHTML = "KRENI";

    start = new Date();
    state = enabled;
}

function buttonClicked() {

    const element = [
        document.getElementById ( "button0" ),
        document.getElementById ( "button1" ),
        document.getElementById ( "button2" ),
    ]; 
    
    if (state == idle) {
        let i = 0;
        for ( i = 0; i < element.length; ++i ) {
            element[i].className = "btn btn-danger";
            element[i].disabled = true;
            element[i].innerHTML = "ČEKAJ";
        }
        const interval = Math.random()*(high-low)+low;
        setTimeout(enableButton, interval);
        state = waiting;
    } else if ( state == enabled ) {
        let now = new Date ( );
        let difference = ( now.getTime ( ) - start.getTime ( ) ) / 1000;
        document.getElementById ( "result" ).innerHTML = difference;
        let i = 0;
        for ( i = 0; i < element.length; ++i ) {
            element[i].className = "btn btn-primary";
            element[i].disabled = false;
            element[i].innerHTML = "POČNI";
        }
        state = idle;
    }
}