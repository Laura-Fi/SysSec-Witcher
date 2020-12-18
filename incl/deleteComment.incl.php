<?php
    require_once('session.php');
    require_once('dbConnect.php');

    $query = "delete from comments where commentId = " . $_REQUEST['commentId'];
    $mysqli->query($query);

    header("Location: ../readPost.php?postId=".$_REQUEST['postId']);  
?>