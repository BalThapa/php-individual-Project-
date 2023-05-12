<?php
include 'config.php';

if (isset ($_POST['author']) && isset($_POST['title']) && isset ($_POST['content']) && isset($_POST['id']) ) {
    $author = $db->real_escape_string($_POST['author']);
    $title = $db->real_escape_string($_POST['title']);
    $content = $db->real_escape_string($_POST['content']);
    $id = (int)$_POST['id'];

    $result = $db->query("UPDATE posts SET author='$author', title='$title', content='$content' WHERE id=$id");

    if(!$result){
        die('Error: ' . $db->error);
    }
}

header('Location: admin.php');

?>