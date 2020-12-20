<?php
    require_once('incl/dbConnect.php');
    require_once('incl/session.php');

    $deletionResult = $mysqli->multi_query("delete from posts where userId=".$_SESSION["id"].";delete from users where id=".$_SESSION["id"]);
    if ($deletionResult) {
        echo("Your account has been successfully deleted.");
        header("location: logout.php");
        exit;
    } else {
        echo("An error occurred while deleting your account: ".$mysqli->error);
    }
?>