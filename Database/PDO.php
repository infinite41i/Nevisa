<?php

$host = $conf['database']['hostname'];
$username = $conf['database']['username'];
$password = $conf['database']['password'];
$dbname = $conf['database']['name'];

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
} catch (PDOException $e) {
    if($e->getCode() == 1049){
        die("Can't connect to database.");
    } else if ($e->getCode() == 2002){
        die("Can't connect to host");
    } else {
        die("PDO Exception.".$e->getMessage());
    }
}

?>