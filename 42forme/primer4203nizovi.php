<?php

$nizNumericki = array("банана", "јабука", "мандарина");
// $nizNumericki = ["banana", "jabuka", "mandarina"];

echo $nizNumericki[1];

echo "<hr>";

/*
$nizDrugaciji = array(
    "banana" => 150,
    "jabuka" => 100,
    "mandarina" => 160
);
*/

$nizDrugaciji = [
    "банана" => 150,
    "јабука" => 100,
    "мандарина" => 160
];

echo $nizDrugaciji["jabuka"];

for($i=0; $i < count($nizNumericki); $i++){
    echo $nizNumericki[$i]."<br>";
}

echo "<br>";

echo "Воће (foreach):<br>";

foreach($nizNumericki as $element){
    echo $element."<br>";
}

echo "<br>";

echo "Цена (foreach):<br>";
foreach($nizDrugaciji as $element){
    echo $element."<br>";
}

echo "<br>";

array_push($nizNumericki, "малине");
// sort($nizNumericki);
echo "Воће (foreach with key):<br>";
foreach($nizNumericki as $key => $value){
    echo $key."-->".$value."<br>";
}

echo "<br>";

// sort($nizDrugaciji);
arsort($nizDrugaciji);
echo "Цене (foreach with key):<br>";
foreach($nizDrugaciji as $key => $value){
    echo $key."-->".$value."<br>";
}

echo "<hr>";

$nizBrojeva = range(1,10,2);
var_dump($nizBrojeva);
echo "<br>";

reset($nizBrojeva);
echo "Први број: ".current($nizBrojeva)."<br>";
next($nizBrojeva);
echo "Други број: ".current($nizBrojeva)."<br>";
next($nizBrojeva);
echo "Трећи број: ".current($nizBrojeva)."<br>";
end($nizBrojeva);
echo "Последњи број: ".current($nizBrojeva)."<br>";

array_push($nizBrojeva, 3);
echo "Број елемената у низу је ".count($nizBrojeva)."<br>";
echo "Број различитих елемената у низу је ".count(array_count_values($nizBrojeva))."<br>";

echo "<hr>";

define('MESECI', 
['јануар', 'фебруар', 'март', 'април', 'мај', 'јун', 
'јул',  'август', 'септембар', 'октобар', 'новембар', 'децембар']);

echo MESECI[4];

echo "<hr>";



?>