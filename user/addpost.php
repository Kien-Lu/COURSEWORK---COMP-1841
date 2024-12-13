<?php
if(isset($_POST['posttext'])){
    try{
        include '../includes/DatabaseConnection.php';
        include '../includes/DatabaseFunction.php';
        insertpost($pdo, $_POST['posttext'],$_FILES['fileToUpload']['name'], $_POST['users'], $_POST['modules']);
        include '../includes/uploadfile.php';
        header('location: post.php');
    }catch (PDOException $e){
        $title = 'An error has occurred';
        $output = 'Database error: ' . $e->getMessage();
    }
}else{
    include '../includes/DatabaseConnection.php';
    include '../includes/DatabaseFunction.php';
    $title = 'Add a new post';
    $users = allUsers($pdo);
    $modules = allModules($pdo);
    ob_start();
    include '../templates/addpost.html.php';
    $output = ob_get_clean();
}
include '../templates/user_layout.html.php';
