<?php
try{
    include '../includes/DatabaseConnection.php';
    include '../includes/DatabaseFunction.php';
    $row = getPost($pdo, $_POST['id']);

    deletePost($pdo, $_POST['id']);
    header('location: post.php');
}catch(PDOException $e){
$title = 'An error has occured';
$output = 'Unable to connect to delete post: '.$e->getMessage();
}
include 'templates/layout.html.php';