<?php

    $host = 'localhost';
    $user = 'root';
    $pass = '';
    $dbname = 'linewebapp';


    try{
        $conn = mysqli_connect($host,$user,$pass,$dbname);
    if($conn){
               }
    } catch (PDOException $e){
        echo $e->getmessage();
    }