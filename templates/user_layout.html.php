<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="../post.css">
        <title><?=$title?></title>
    </head>
    <body>
        <header id="user">
            <h1>Internet Post Database User Area<br />
            Manage posts, modules and users</h1></header>
        <nav>
            <ul>
                <!--<li><a href="index.php">Home</a></li>-->
                <li><a href="user/post.php">Post List</a></li>
                <li><a href="addpost.php">Add a new post</a></li>
                <li><a href="login/Logout.php">Public Site</a></li>
            </ul>
        </nav>
        <main>
            <?=$output?>
        </main>
        <footer>&copy; IJDB 2023</footer>
    </body>
</html>