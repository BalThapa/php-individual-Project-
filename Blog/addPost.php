<?php
    include 'config.php';


    if (isset($_POST['author']) 
        && isset($_POST['title']) 
        && isset($_POST['content'])) {
        $author = $db->real_escape_string($_POST['author']);
        $title = $db->real_escape_string($_POST['title']);
        $content = $db->real_escape_string($_POST['content']);
        $result = $db->query("INSERT INTO posts (author, title, content, `date`) VALUES ('$author', '$title', '$content', NOW())");

        if (!$result) {
            die('Error: ' . $db->error);

        }

    }

    header('Location: index.php');
?>