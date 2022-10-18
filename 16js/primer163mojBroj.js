// document.write("Hello, world!");

let startTime = undefined;

function zeroPad(number, length){
    let result = number.toString();
    let n = length - result.length;

    let i = 0;
    for(i=0; i<n; ++i){
        result = "0" + result;
    }
    return result;
}

function tick(){
    let currentTime = new Date();
    let difference = currentTime.getTime() - startTime.getTime();

    let date = new Date(difference);
    console.log(date);

    let minutes = date.getMinutes();
    let seconds = date.getSeconds();
    let milliseconds = date.getMilliseconds();
    minutes = zeroPad(minutes, 2);
    seconds = zeroPad(seconds, 2);
    milliseconds = zeroPad(milliseconds, 3);

    let timer = minutes + "." + seconds + ":" + milliseconds;

    document.getElementById("timer").innerHTML = timer;
}

function start(){
    // pišemo funkciju jer želimo da se pokreće klikom na dugme, a ne čim se stranica učita
    startTime = new Date();
    
    setInterval(tick, 100);
}
