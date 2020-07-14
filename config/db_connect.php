<?php 

//Development Connection
//$server  = 'localhost';
//$db = 'rescuecall_db';
//$user = 'lucas';
//$pass = "hipsdontlie";

//Production Connection 
$server  = 'remotemysql.com';
$db = 'pP8BKywQT4';
$user = 'pP8BKywQT4';
$pass = "kBUKDpmhpl";



//Conect to the Database 
$conn =  mysqli_connect($server, $user, $pass, $db);

//Check connection 
if (!$conn){
    echo "There is a problem with the DB connection:" . mysqli_connect_error() ;
}



?>
