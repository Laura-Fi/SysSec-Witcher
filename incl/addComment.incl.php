<?php
    require_once('incl/session.php');

    //$postDate = date('Y-m-d H:i:s');
    
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        require_once('incl/dbConnect.php');

        $userId = $_SESSION['userId'];
        $commentDate = CURRDATE();
        $postId = $_REQUEST['postId'];
        $commentText = $_POST['commentText'];

        /*
        // Select file type
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        // Valid file extensions
        $extensions_arr = array("jpg","jpeg","png","gif");
        // Check extension
        if( in_array($imageFileType,$extensions_arr) ){
            // Upload file
            move_uploaded_file($_FILES['file']['tmp_name'],$target_dir.$name);
        */

        $query = "insert into comments(userId, commentDate, postId, commentText) 
        values ('$userId', '$commentDate', '$postId', '$commentText');";
        $mysqli->query($query);  

        header("Location: readPost.php?postId=".$curComment["postId"]);  
    }     
?>