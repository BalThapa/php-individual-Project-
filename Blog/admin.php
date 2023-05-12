<?php

include 'config.php';

$result = $db->query('SELECT * FROM posts ORDER BY date DESC');

if(!$result) {
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
        <link rel="stylesheet" href="./Style/adminStyle.css">
        <title>Admin</title>
    </head>
    <body>
        <div class="admin">
            <h1>ADMIN</h1>
            <table>
                <tr>
                    <th>Author</th>
                    <th>Title</th>
                    <th>Content</th>
                    <th>Date</th>
                    <th>Actions</th>
                </tr>

                <?php foreach ($posts as $post): ?>
                    <?php if (!empty($post['author']) && !empty($post['title']) && !empty($post['content'])):?>
                    <tr>
                        <td><?php echo $post['author'];?></td>
                        <td><?php echo $post['title'];?></td>
                        <td><?php echo $post['content'];?></td>
                        <td><?php echo $post['date'];?></td>
                        <td>
                            <a href="updatePost.php?id=<?php echo $post['id']; ?>">Update</a>
                            <a href="deletePost.php?id=<?php echo $post['id']; ?>">Delete</a>
                        </td>
                    </tr>
                    <?php endif; ?>
                <?php endforeach; ?>
            </table> 
        </div>   
    </body>
</html>