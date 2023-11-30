<?php

$host_db="sql300.infinityfree.com";
$user_db="if0_35174159";
$pass_db="0fcVVtFvAvUi";
$db_name="if0_35174159_test_php";

try{
    $conexion = new PDO("mysql:host=$host_db;db_name=$db_name",$user_db,$pass_db);
   // $conexion = new mysqli($host_db,$user_db,$pass_db,$db_name);
} catch(Exception $e){
    echo $e->getMessage();
}

?>