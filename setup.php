<?php
$ROOT = './' ;
include('functions.php');

//redirect if configuration already done
if(file_exists('config.php')){
    redirect('./');
}

if(
    isset($_POST['sitename']) &&
    isset($_POST['username']) &&
    isset($_POST['password']) &&
    isset($_POST['email']) &&
    isset($_POST['dbname']) &&
    isset($_POST['dbhostname']) &&
    isset($_POST['dbusername']) &&
    isset($_POST['dbpassword'])
    ){
    $SITENAME = $_POST['sitename'];
    $USERNAME = $_POST['username'];
    $PASSWORD = $_POST['password'];
    $EMAIL = $_POST['email'];
    $DBNAME = $_POST['dbname'];
    $DBHOSTNAME = $_POST['dbhostname'];
    $DBUSERNAME = $_POST['dbusername'];
    $DBPASSWORD = $_POST['dbpassword'];

    // echo 'Recieved data:';
    // echo $SITENAME . '<br/>';
    // echo $USERNAME . '<br/>';
    // echo $PASSWORD . '<br/>';
    // echo $DBNAME . '<br/>';
    // echo $DBHOSTNAME . '<br/>';
    // echo $DBUSERNAME . '<br/>';
    // echo $DBPASSWORD . '<br/>';

    //Form Validation
    // --------------------------
    // --------------------------

    //SQL PDO setup
    try{
        $pdo_general = new PDO("mysql: host=".$DBHOSTNAME, $DBUSERNAME, $DBPASSWORD);
    } catch (PDOException $e) {
        die("Could not connect to database: ".$e->getMessage());
    }
    //create database
    try{
        // !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
        //SQL Injection-Prone - Should Validate $DBNAME
        // !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
        $create_db_sql = "CREATE DATABASE IF NOT EXISTS `". $DBNAME ."` CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci";
        $stmt = $pdo_general->prepare($create_db_sql);
        $stmt->execute();
    } catch (PDOException $e) {
        die($e->getMessage());
    }    
    //Set-up database tables
    try{
        $pdo = new PDO("mysql: host=". $DBHOSTNAME . ";dbname=" . $DBNAME, $DBUSERNAME, $DBPASSWORD);
    } catch(PDOException $e) {
        die_drop($pdo_general, $DBNAME, "Could not connect to database: ".$e->getMessage());
    }
    try {
        $users_table_sql = 
        "CREATE TABLE users (
            `id` BIGINT(20) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            `username` VARCHAR(255) NOT NULL,
            `nickname` VARCHAR(255) NOT NULL,
            `email` VARCHAR(255) NOT NULL,
            `password` VARCHAR(255) NOT NULL,
            `permissions` VARCHAR(255) NOT NULL
        );
        ";
        $stmt = $pdo->prepare($users_table_sql);
        $stmt->execute();
    } catch (PDOException $e) {
        die_drop($pdo_general, $DBNAME, "Could not create table `users`: ".$e->getMessage());
    }
    //Create admin user
    try {
        $create_users_table_sql = 
        "INSERT INTO users (`username`, `nickname`, `email`, `password`, `permissions`)
            VALUES (:username, :nickname, :email, :panel_password, :permissions);
        ";
        $stmt = $pdo->prepare($create_users_table_sql);
        $stmt->execute([
            ':username' => $USERNAME,
            ':nickname' => $USERNAME,
            ':email' => $EMAIL,
            ':panel_password' => $PASSWORD,
            ':permissions' => "owner"
        ]);
    } catch (PDOException $e) {
        die_drop($pdo_general, $DBNAME, "Could not create administrator user: ".$e->getMessage());
    }
    //Set-up posts table
    try {
        $users_table_sql = 
        "CREATE TABLE posts (
            `id` BIGINT(20) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            `post_author_id` BIGINT(20) NOT NULL,
            `post_date` DATETIME NOT NULL
            `post_title` TEXT NOT NULL,
            `post_content` LONGTEXT NOT NULL,
            `post_status` VARCHAR(255) NOT NULL,
        );
        ";
        $stmt = $pdo->prepare($users_table_sql);
        $stmt->execute();
    } catch (PDOException $e) {
        die_drop($pdo_general, $DBNAME, "Could not create table `users`: ".$e->getMessage());
    }
    //Set-up config file
    $data = "<?php

    \$conf = [
        'database' => [
            'hostname' => '$DBHOSTNAME',
            'name'     => '$DBNAME',
            'username' => '$DBUSERNAME',
            'password' => '$DBPASSWORD',
        ],
        'website' => [
            'name' => '$SITENAME'
        ]
    ]
    
    ?>";
    $config_created = file_put_contents($ROOT."config.php", $data);
    if($config_created === False){
        die_drop($pdo_general, $DBNAME, "Could not write to file 'config.php': ".$e->getMessage());
    }

    //Opration Finished
    include("templates/FTE/success.php");
} else {
    include("templates/FTE/FTE.php");
}

function die_drop(PDO $pdo, string $database_name, string $message = "Operation failed."){
    try {
        $sql = "DROP DATABASE `". $database_name . "`;";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        die($message);
    } catch (PDOException $e) {
        die($message . "\nCould not drop created database. If '" . $database_name . "' exists n your database, you can delete it manually. Be careful to backup database data if exists.");
    }
}
?>