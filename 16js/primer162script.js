console.log("Hello, world!");

let message = "This is my first message!";

console.log(message);

let longerMessage = message + "This is a longer, second message!";

console.log(longerMessage);

let i = 0;
for (i=0; i < longerMessage.length; ++i){
    console.log(longerMessage[i]);
}

console.log(longerMessage.toLowerCase());
console.log(longerMessage.toUpperCase());

// "This is"

console.log(longerMessage.indexOf("Message"));
console.log(longerMessage.indexOf("first message"));

console.log(longerMessage.lastIndexOf("first message"));

console.log(longerMessage.slice(5, 10));
console.log(longerMessage.substring(5, 10));

console.log(eval(" 2*3+5"));

let now = new Date(2022, 10, 25, 12, 32, 33);
// let now = new Date(10000);
console.log(now);
console.log(now.getFullYear());
console.log(now.getUTCFullYear());
console.log(now.getMonth());
console.log(now.getDate());
console.log(now.getDay());
console.log(now.getHours());
console.log(now.getUTCHours());
console.log(now.getTime());
console.log(now.getMilliseconds());

let date = new Date (2022, 9, 18, 17, 45, 0);
console.log(date);

if (date < now){
    console.log("OK");
}