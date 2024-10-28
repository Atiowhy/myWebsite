<?php
$hostname = 'localhost';
$username = 'root';
$password = '';
$database = 'myPorto';

$connection = mysqli_connect($hostname, $username, $password, $database);
if(!$connection){
    echo 'Database not connection ...';
    die;
}

?>