<?php
$ActualPassword = "secret";
if ($_POST["password"] == $ActualPassword) {
    session_start();
    $_SESSION["Authorised"] = "Y";
    header("Location: ../post.php");
} else {
    header("Location:Wrongpassword.php");
}