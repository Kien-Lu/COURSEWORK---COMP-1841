<?php
include '../includes/DatabaseConnection.php';
include '../includes/DatabaseFunction.php';

try {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $postId = $_POST['postid'];
        $postText = trim($_POST['posttext']);
        $userId = $_POST['users'];
        $moduleId = $_POST['modules'];

        if (empty($postText) || empty($userId) || empty($moduleId)) {
            throw new Exception('All fields are required.');
        }

        $targetDir = 'image/';
        if (!is_dir($targetDir)) {
            mkdir($targetDir, 0777, true);
        }

        if (isset($_FILES['fileToUpload']) && $_FILES['fileToUpload']['error'] === UPLOAD_ERR_OK) {
            $allowedTypes = ['image/jpeg', 'image/png', 'image/gif'];
            if (!in_array($_FILES['fileToUpload']['type'], $allowedTypes)) {
                throw new Exception('Invalid file type. Only JPG, PNG, and GIF are allowed.');
            }

            if ($_FILES['fileToUpload']['size'] > 2 * 1024 * 1024) { // 2MB limit
                throw new Exception('File size exceeds the 2MB limit.');
            }

            $fileName = basename($_FILES['fileToUpload']['name']);
            $targetFile = $targetDir . $fileName;

            if (!move_uploaded_file($_FILES['fileToUpload']['tmp_name'], $targetFile)) {
                throw new Exception('File upload failed. Check file permissions or directory path.');
            }

            updatePostImage($pdo, $postId, $fileName);
        }

        updatePost($pdo, $postId, $postText);
        updateUserAndModule($pdo, $postId, $userId, $moduleId);

        header('location: post.php');
        exit;
    } else {
        if (!isset($_GET['id'])) {
            throw new Exception('Post ID is required.');
        }

        $postId = $_GET['id'];
        $post = getPost($pdo, $postId);
        $users = allUsers($pdo);
        $modules = allModules($pdo);
        $title = 'Edit Post';

        ob_start();
        include '../templates/editpost.html.php';
        $output = ob_get_clean();
    }
} catch (Exception $e) {
    $title = 'Error Occurred';
    $output = 'Error editing post: ' . $e->getMessage();
}

include '../templates/user_layout.html.php';
?>



