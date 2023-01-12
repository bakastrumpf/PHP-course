<?php
require_once("../primer4810config.inc.php");

$sql = "select * from akcija where userkomp = '{$_SESSION['user']}'";

$akcije = mysqli_query($conn, $sql)
or die("GRESKA: " .mysqli_error($conn));

?>