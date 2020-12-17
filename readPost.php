<?php
    require_once('incl/session.php');
    require_once('incl/dbConnect.php');

    /*
    if (!(is_numeric($_REQUEST["postId"]) && intval($_REQUEST["parkId"]) >= 1 && intval($_REQUEST["parkId"]) <= 24)){
        header('location: oops.html');
        exit;
    }*/

    $postId = ($_REQUEST['postId']);
    $postsQuery = "select * from posts, users where postId ='".$postId."' and userId = id";
    // make sure it is an integer
    //$query = "SELECT * FROM posts where postId = " . intval($_REQUEST["postId"]);
    //
    $postsResult = $mysqli->query($postsQuery);
    $curPost = mysqli_fetch_array($postsResult);
    //var_dump($postsResult);


    $commentQuery = "select * from comments c left join users u on c.userId = u.id where c.postId =".$postId."" ;
    $commentResult = $mysqli->query($commentQuery);
    $curComment = mysqli_fetch_array($commentResult);
    //var_dump($commentResult);

/*
    $userQuery = "select id,firstName,lastName from users join comments on users.id = comments.userId where comments.postId =".$postId."";
    $userResult = $mysqli->query($userQuery);
    //var_dump($userResult);
    $curUser = mysqli_fetch_array($userResult);
*/

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        require_once('incl/dbConnect.php');

        $userId = $_SESSION['userId'];
        $postId = $_REQUEST['postId'];
        $commentText = $_POST['commentText'];

        $query = "insert into comments(userId, commentDate, postId, commentText) 
        values ('$userId', CURRENT_TIMESTAMP, '$postId', '$commentText');";
        $mysqli->query($query);  

        header("Location: readPost.php?postId=".$curComment["postId"]);  
    }
?>

<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title><?php echo $curPost['postName']?></title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="style/readPost.css">
</head>

<body>
    <?php
        require_once('navbar.php');
        //include('incl/addComment.incl.php');
    ?>
    <div class="container">
        <div>
            <img src="img/<?php echo $curPost['postImage']?>" class="img-fluid" alt="Responsive image">
            <h1><?php echo $curPost['postName']?></h1>
            <h5 class="text-secondary">by <?php echo $curPost['firstName']." ".$curPost['lastName']." | ".(new DateTime ($curPost['postDate']))->format('d.m.Y')?></h2>
            <!--<a href="logout.php" id="logoutLink">Logout</a>-->
            <br>
            <p><?php echo $curPost['postText']?></p>
            <br>
        </div>
        <div>
            <h2>Comments:</h2>
            <?php
                while ($curComment = mysqli_fetch_array($commentResult)) {
                    echo "<div class='container' id='commentContainer'>";
                    echo "<div class='comment'>";
                    echo "<p class='text-primary' id='commentHeading'>".$curComment['firstName']." ".$curComment['lastName']." | ".(new DateTime ($curComment['commentDate']))->format('d.m.Y')."<br>";
                    echo "<p id='commentText'>".$curComment['commentText']."</p>";
                    echo "</div>";
                    echo "</div>";
                }
            ?>
        </div>
        <div>
            <div id="respond">
                <h3>Leave a Comment</h3>
                <form action=<?php echo "readPost.php?postId=".$curComment["postId"]?> method="post" id="commentform">
                    <textarea name="comment" id="commentTextarea" rows="10" cols="10" tabindex="4"  required="required"></textarea>
                    <!-- comment_post_ID value hard-coded as 1 -->
                    <input type="hidden" name="comment_post_ID" value="1" id="comment_post_ID" />
                    <button class="btn btn-primary" type="submit" value="Submit comment" id="submitButton">Submit</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>