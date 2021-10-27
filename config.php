<?php

$db_host = "127.0.0.1";
$db_name = "balink";
$db_user = "root";
$db_pass = "";
try {
    $db = new PDO("mysql:host={$db_host};dbname={$db_name}", $db_user, $db_pass, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8;'));
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // les erreurs lanceront des exceptions
    //$db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
} catch (PDOException $e) {
    echo $e->getMessage();
}