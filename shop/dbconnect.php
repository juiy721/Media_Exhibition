<?php
$db = mysqli_connect('localhost', 'root', 'root', 'mydb') or
die(my_sqli_connect_error());
mysqli_set_charset($db, 'utf8');
?>