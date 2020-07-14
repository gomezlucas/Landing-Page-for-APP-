<?php 

//Conect to the Database 
$conn =  mysqli_connect('localhost', 'lucas', 'hipsdontlie', 'email_data');

//Check connection 
if (!$conn){
    echo "There is a problem with the DB connection:" . mysqli_connect_error() ;
}



?>
