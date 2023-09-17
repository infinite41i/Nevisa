<?php
$ROOT = './';
include('functions.php');
if(file_exists('config.php')){
    require('config.php');
} else {
    redirect('setup.php');
}
include('Database/PDO.php');
?>