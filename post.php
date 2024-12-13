<?php
try{
    include 'includes/DatabaseConnection.php';
    include 'includes/DatabaseFunction.php';

    $sql = 'SELECT SELECT post.id, posttext, `name`, email, postdate, post_pic, moduleName FROM post 
    INNER JOIN user ON userid = user.id
    INNER JOIN module ON moduleid = module.id';


    $posts = allPosts ($pdo);
    $title = 'Post list';
    $totalPost = totalPost($pdo);

    ob_start();
    include 'templates/post.html.php';
    $output = ob_get_clean();
}catch (PDOException $e){
    $title = 'An error has occured';
    $output = 'Database error:' . $e->getMessage(); 
}
include 'templates/layout.html.php';