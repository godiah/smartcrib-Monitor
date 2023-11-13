<?php

    $hostname = 'localhost';
    $user = 'root';
    $pword = '';
    $db= 'babyCrib';

 $conn = mysqli_connect($hostname,$user,$pword,$db );
    $mysqli= $conn;
     if(!$conn){
            echo  "unsuccessful" ; 
     }
?>