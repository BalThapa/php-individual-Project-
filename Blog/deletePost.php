<?php
include 'config.php';

$id = (int)$_GET['id'];
$result = $db->query("DELETE FROM posts WHERE id=$id");

if (!$result) {
    die('Error:' . $db->error);
}

header('Location: admin.php');

?>