<?php
function dbConnect($usertype, $connectionType = 'mysql') {
    $host = 'localhost';
    $db = 'site29';
    if ($usertype == 'write') {
        $user = 'student29.site29';
        $pwd = 'Patri0ts';
    } else {
        exit('Unrecognized User');
    }
    if ($connectionType == 'mysql') {
        $conn = @ new mysqli($host, $user, $pwd, $db);
        if ($conn->connect_error) {
            exit($conn->connect_error);
        }
        return $conn;
    } else {
        try {
            return new PDO("mysql:host=$host;dbname=$db", $user, $pwd);
        } catch(PDOException $e) {
            echo $e->getMessage();
        }
    }
}
