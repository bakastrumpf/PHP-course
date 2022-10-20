// document.write("Hello, world!");

let startTime = undefined;

function zeroPad(number, length) {
    let result = number.toString();
    let n = length - result.length;

    let i = 0;
    for (i = 0; i < n; ++i) {
        result = "0" + result;
    }
    return result;
}

function tick() {
    let currentTime = new Date();
    let difference = currentTime.getTime() - startTime.getTime();

    let date = new Date(difference);
    // console.log(date);

    let minutes = date.getMinutes();
    let seconds = date.getSeconds();
    let milliseconds = date.getMilliseconds();
    minutes = zeroPad(minutes, 2);
    seconds = zeroPad(seconds, 2);
    milliseconds = zeroPad(milliseconds, 3);

    let timer = minutes + "." + seconds + ":" + milliseconds;

    document.getElementById("timer").innerHTML = timer;

}

let set0 = [10, 15, 20];
let set1 = [25, 50, 75, 100];


let goal = 0;
let digit1 = 0;
let digit2 = 0;
let digit3 = 0;
let digit4 = 0;
let index0 = 0;
let index1 = 0;

let result = "";
let userResult = 0;

function generate() {
    goal = Math.random()*1000;
    goal = Math.floor(goal);

    digit1 = Math.random()*(10-1)+1;
    digit2 = Math.random()*(10-1)+1;
    digit3 = Math.random()*(10-1)+1;
    digit4 = Math.random()*(10-1)+1;
    
    digit1 = Math.floor(digit1);
    digit2 = Math.floor(digit2);
    digit3 = Math.floor(digit3);
    digit4 = Math.floor(digit4);

    index0 = Math.random()*set0.length;
    index0 = Math.floor(index0);

    index1 = Math.random()*set1.length;
    index1 = Math.floor(index1);

    document.getElementById("goal").innerHTML = zeroPad(goal, 3);
    document.getElementById("digit1").innerHTML = digit1;
    document.getElementById("digit2").innerHTML = digit2;
    document.getElementById("digit3").innerHTML = digit3;
    document.getElementById("digit4").innerHTML = digit4;
    document.getElementById("number0").innerHTML = set0[index0];
    document.getElementById("number1").innerHTML = set1[index1];
}

let state = undefined;
// 0 = generate
// 1 = play

let generateId = undefined;
let tickId = undefined;

function start() {
    // pišemo funkciju jer želimo da se pokreće klikom na dugme, a ne čim se stranica učita
    if (state == undefined || state == 1) {
        document.getElementById("dugmence").innerHTML = "Stop";
        clearInterval (tickId);
        generateId = setInterval(generate, 100);
        state = 0;
    } else {
        document.getElementById("dugmence").innerHTML = "Počni";
        clearInterval(generateId);
        startTime = new Date();
        tickId = setInterval(tick, 100);
        state = 1;
    }
}

function detect(num){
    console.log('Detected: ' + document.getElementById(num).innerHTML);
    result = document.getElementById('result').innerHTML;
    document.getElementById('result').innerHTML = result + document.getElementById(num).innerHTML;
}

function calculate(){
    result = document.getElementById('result').innerHTML;
    console.log(result);
    // console.log(eval('1+2'));
    userResult = eval(result);
    console.log("Result is: " + userResult);

    if(userResult == goal){
        console.log('Correct!');
        document.getElementById('info').innerHTML = 
            'Correct! Time: ' + document.getElementById('timer').innerHTML;
    }else{
        console.log('Not correct!');
        document.getElementById('info').innerHTML = 
            'Not correct!';
    }

    clearInterval(tickId);
}