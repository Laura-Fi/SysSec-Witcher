<?php
    require_once('incl/session.php');
    require_once('incl/dbConnect.php');
    require_once('navbar.php');


    //TO DO
    $postsQuery = "select postId,postImage,postName from posts";
    $postsResult = $mysqli->query($postsQuery);
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>All posts</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="style/allPosts.css">
</head>

<body>
    <div class="container">
        <h1>Welcome <?php echo $_SESSION["firstName"]?>!</h1>
        <br>
        <h2>Dive into the magic world of the Witcher</h1>
        <br>
        <div class="card-deck">
            <?php
                while($curPost = mysqli_fetch_array($postsResult)) {
                    echo "<div class='col-sm-4'>";
                    echo "<div class='card'>";
                    echo "<img src='img/".$curPost['postImage']."' class='card-img-top' style=alt=''>";
                    echo "<div class='card-body'>";
                    echo "<h5 class='card-title'>".$curPost['postName']."</h5>";
                    echo "<a href='readPost.php?postId=".$curPost["postId"]."' class='btn btn-primary'>Read now</a>";
                    if ($_SESSION["isAdmin"] == 1) {
                        echo "<div class='card-footer text-center'>";
                        ?>
                        <a href=<?php echo "incl/deletePost.incl.php?postId=".$curPost["postId"]?> class="card-link" onclick="return confirm('Are you sure you want to delete this post?');">Delete</a>
                        <?php
                        echo "</div>";
                    }
                    echo "</div>";
                    echo "</div>";
                    echo "</div>";
                }
            ?>
        </div>
    </div>
</body>
</html>
        
