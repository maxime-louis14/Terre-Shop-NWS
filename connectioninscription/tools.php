
<!DOCTYPE html>

<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


$bdd = new PDO(
    'mysql:host=localhost; dbname=compte',
    'root',
    'root',
    array(
        PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING,
        PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'
    )
);

//-------------_SESSION--------------------
session_start();
$_SESSION['role'] = 'admin';


function executerequest($replace, $param = array())
{
    if (!empty($_POST)) {
        foreach ($param as $key => $value) {
            $param[$key] = htmlspecialchars($value);
        }
    }

    global $bdd;
    $result = $bdd->prepare($replace);
    $success = $result->execute($param);


    if ($success) {
        return $result;
    } else {
        return false;
    }
}
