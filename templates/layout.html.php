<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="post.css">
        <title><?=$title?></title>
    </head>
    <body>
        <header><h1>Internet Post Database</h1></header>
        <nav>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="post.php">Post List</a></li>
                <!--<li><a href="addpost.php">Add a new post</a></li>-->
                <li><a href="user/login/Login.html">User</a></li>
            </ul>
        </nav>
        <main>
            <?=$output?>
        </main>
        <footer>&copy; IJDB 2023</footer>
    </body>
</html>

