<?php 
define('DATA_SERVER', 'localhost');
define('DATA_USER', 'root');
define('DATA_PASSWORD', 'hoang2003');
define('DATA_NAME', 'phpapp');
$connection = null; 

try {
    $connection = new PDO (
        "mysql:host=".DATA_SERVER.";dbname=".DATA_NAME,DATA_USER,DATA_PASSWORD);

    $connection->setAttribute(PDO::ATTR_ERRMODE,  PDO::ERRMODE_EXCEPTION);
    echo "Connection successfully ";
}catch(PDOException $e) {
    echo "Connection failed:" . $e->getMessage(); 
    $connection = null; 
}
?>