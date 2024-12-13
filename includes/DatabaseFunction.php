<?php
function query($pdo, $sql, $parameters = []){
    $query = $pdo->prepare($sql);
    $query->execute($parameters);
    return $query;
}
function totalPost($pdo){
    $query = query($pdo, 'SELECT COUNT(*) FROM post');
    $row= $query->fetch();
    return $row[0];
}
function getPost($pdo, $id){
    $parameters = [':id' => $id];
    $query = query($pdo, 'SELECT * FROM post WHERE id =:id', $parameters);
    return $query->fetch();
}
function updatePost($pdo, $postid, $posttext){
    $query = 'UPDATE post SET posttext = :posttext WHERE id = :id';
    $parameters = [':posttext' => $posttext, ':id' => $postid];
    query($pdo, $query, $parameters);
}
function deletePost($pdo, $id){
    $parameters = [':id' => $id];
    query($pdo, 'DELETE FROM post WHERE id = :id', $parameters);
}
function insertpost($pdo, $posttext, $fileToUpload, $userid, $moduleid) {
    $query = 'INSERT INTO post (posttext, postdate, post_pic, userid, moduleid)
    VALUES(:posttext, CURDATE(), :fileToUpload, :userid, :moduleid)';
    $parameters = [':posttext' => $posttext, ':fileToUpload' =>$fileToUpload, ':userid' => $userid, ':moduleid' => $moduleid];
    query($pdo, $query, $parameters);
}

function allUsers($pdo){
    $users = query($pdo, 'SELECT * FROM user');
    return $users->fetchAll();
}

function allModules($pdo){
    $modules = query($pdo, 'SELECT * FROM module');
    return $modules->fetchAll();
}

function allPosts($pdo){
    $posts = query($pdo, 'SELECT post.id, posttext, `name`, email, postdate, post_pic, moduleName FROM post
    INNER JOIN user ON userid = user.id
    INNER JOIN module ON moduleid = module.id');
    return $posts ->fetchAll();
}
function updateUserAndModule($pdo, $postid, $userid, $moduleid) {
    $query = 'UPDATE post SET userid = :userid, moduleid = :moduleid WHERE id = :id';
    $parameters = [':userid' => $userid, ':moduleid' => $moduleid, ':id' => $postid];
    query($pdo, $query, $parameters);
}
function updatePostImage($pdo, $postid, $fileToUpload) {
    $query = 'UPDATE post SET post_pic = :post_pic WHERE id = :id';
    $parameters = [':post_pic' => $fileToUpload, ':id' => $postid];
    query($pdo, $query, $parameters);
}