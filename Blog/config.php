<?php

$host = 'db';
$user = 'root';
$pass = 'lionPass';
$dbname = 'Blog';

$db = new mysqli($host, $user, $pass, $dbname);

if ($db-> connect_error){
    die('Connect Error (' . $db->connect_errno .') ' . $db->connect_error);
}