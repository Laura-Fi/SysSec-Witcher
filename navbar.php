<style>
    .nav-item {
        margin-left: 20px; 
    }

    #delete {
        padding-left: 500px;
    }

</style>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <h3>The Witcher blog</h3>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <a class="nav-item nav-link active" href="allPosts.php">All posts<span class="sr-only">(current)</span></a>
        <a class="nav-item nav-link" href="myPosts.php">My posts</a>
        <a class="nav-item nav-link" href="addPost.php">Add post</a>
        <a class="nav-item nav-link" id="delete" href="delete.php" onclick="return confirm('Are you sure you want to delete this comment?');">Delete Account</a>
        <a class="nav-item nav-link" id="logout" href="logout.php">Logout</a>
    </div>
</nav>

