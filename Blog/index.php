<?php
include 'config.php';

$result =  $db->query("SELECT * from posts order by date DESC");

if (!$result) {
    die('Error: ' . $db->error);
}

$posts = $result->fetch_all(MYSQLI_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog</title>
    <link rel="stylesheet" href="./Style/style.css">
</head>
<body>
    <div class="container">
        <div class="box">
            <h1>BLOG</h1>
            <h2>Add a new post</h2>
            <form action="addPost.php" method="post">
                <label for="author">Author:</label><br>
                <input type="text" id="author" name="author"><br>
                <label for="title">Title:</label><br>
                <input type="text" id="title" name="title"><br>
                <label for="content">Content:</label><br>
                <textarea id="content" name="content"></textarea><br><br>
                <input type="submit" value="Submit">
            </form>
        </div>
    </div>
    <div class="cards">
        <div class="card">
            <?php foreach ($posts as $post): ?>
                <?php if (!empty($post['author']) && !empty($post['title']) && !empty($post['content'])):?>
                    <div class="post">
                        <h2><?php echo $post['author']; ?></h2>
                        <h3><?php echo $post['title']; ?></h3>
                        <p><?php echo $post['content']; ?></p>
                        <?php if (!empty($post['date'])): ?>
                        <p>Posted on: <?php echo $post['date']; ?></p>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>
                
            <?php endforeach; ?> 
            
        </div>  
    </div>     
</body>
</html>

