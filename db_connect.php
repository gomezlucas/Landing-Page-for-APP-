<?php 

require_once ("vendor/autoload.php");

use Dotenv\Dotenv;



if (file_exists(__DIR__ . '/.env')) {
    $dotenv = Dotenv::createImmutable(__DIR__);
    $dotenv -> load();
}

  
$db = $_ENV["DB_NAME"];
$db_server  = $_ENV["DB_SERVER"];
$db_user = $_ENV["DB_USER"];
$db_pass = $_ENV["DB_PASSWORD"];

 //Development Connection
//$server  = 'localhost';
//$db = 'rescuecall_db';
//$user = 'lucas';
//$pass = "hipsdontlie";


//Conect to the Database 

$conn =  mysqli_connect($db_server, $db_user, $db_pass, $db);
 
//Check connection 
if (!$conn){
    echo "There is a problem with the DB connection:" . mysqli_connect_error() ;
}

?>
