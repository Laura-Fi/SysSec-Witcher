<?php
    require_once('session.php');


/*$postDate = date('Y-m-d H:i:s');
    
if($_SERVER["REQUEST_METHOD"] == "POST"){
    require_once('incl/dbConnect.php');

    $postName = $_POST['postName'];
    $postText = $_POST['postText'];
    $postImage = $_POST['postImage'];
    $userId = $_SESSION['id'];
    $postDate = $_POST['postDate'];

    $query = "insert into posts (postName, postText, postImage, id, postDate) 
    values ('$postName', '$postText', '$postImage', '$userId', '$postDate');";
    $mysqli->query($query); 
    header("Location: myPosts.php?post=success");           
}*/

if($_SERVER["REQUEST_METHOD"] == "POST"){
    require_once('dbConnect.php');

    $name_error = "";
    $text_error = "";
    $image_error = "";
    $postName = "";
    $postText = "";
    $postImage = "";
    $userId = "";
    $postDate = date('Y-m-d H:i:s');

    if (isset($_POST['submit'])){
        $postName = test_input($_POST['email']);
        $postText = test_input($_POST['name']);
        $postImage = test_input($_POST['park']);
        //error control
        if (empty($postName)){
            $name_error = "Don't forget to give your post an awesome heading!";
        }

        if (empty($postText)){
            $text_error = "Don't forget to add some content!";
        }

        if (empty($postImage)){
            $image_error = "Don't forget to upload some beautiful photo of the Witcher's magic world!";
        }

        $userId = $_SESSION['id'];
        $postDate = $_POST['postDate'];

        $query = "insert into posts (userId, postName, postText, postImage, postDate) 
        values ('$userId', '$postName', '$postText', '$postImage', '$postDate');";
        $mysqli->query($query); 
        header("Location: myPosts.php?post=success");
        }
}

    function test_input($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

?>