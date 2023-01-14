<?php
require_once("../primer4910config.inc.php");

$sql = "select * from akcija where userkomp = '{$_SESSION['user']}'";
// $sql = "select * from akcija"; 
// ispisuje sva putovanja svih kompanija

$akcije = mysqli_query($conn, $sql)
or die("GRESKA: " .mysqli_error($conn));

?>