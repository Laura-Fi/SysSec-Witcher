<?php
    require_once('session.php');
    require_once('dbConnect.php');

    $query = "delete from posts where postId = " . $_REQUEST["postId"];
    $mysqli->query($query);

    if ($_SESSION["isAdmin"] == 1) { 
        header("Location: ../allPosts.php?deletePost=success");
    }
    else {
        header("Location: ../myPosts.php?deletePost=success");
    }
?>