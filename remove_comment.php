<?php
    include 'session-file.php';
    include 'classes/User.php';
    include 'classes/Post.php'; 

    // Check if the user is logged in
    $userLoggedIn = $_SESSION['username'];
    if(isset($_SESSION['username'])) {
        $user_details_query = mysqli_query($con, "SELECT * FROM admin WHERE adminname='$userLoggedIn'") or die(mysqli_error($con));
        $user = mysqli_fetch_array($user_details_query);
    } else {
        header("Location: admin.php");
        exit(); // Stop further execution
    }
?>

<?php
    if(isset($_POST['search_comment_btn'])) {
        $comment = $_POST['search'];

        // Debug message to check the value of $comment
        echo "Comment ID to delete: $comment<br>";

        // Delete the comment
        $deleteQuery = "DELETE FROM comments WHERE id='$comment'";
        
        // Debug message to check the actual query being executed
        // echo "Query: $deleteQuery<br>";
        
        if(mysqli_query($con, $deleteQuery)) {
            $deletedRows = mysqli_affected_rows($con);
            if($deletedRows > 0) {
                echo "Comment no. $comment is deleted.";
            } else {
                echo "No comment found with ID: $comment";
            }
        } else {
            echo "Error deleting comment: " . mysqli_error($con);
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Remove Comment</title>
    <style>
        input[type="text"]{
            width: 70%;
            height: 50px;
            padding: 5px;
            border-radius: 5px;
            border: none;
            background: #eeeeee;
            padding-left: 10px;
        }

        input[type="submit"]{
            padding: 5px 10px;
            background: #7a6bff;
            border: none;
            border-radius: 3px;
            color: white;
            height: 50px;
            margin-left: 5px;
        }
    </style>
</head>
<body>
    <!-- Comment deletion form -->
    <form action="remove_comment.php" method="post">
        <input type="text" name="search" placeholder="Enter Comment ID to remove....">
        <input type="submit" name="search_comment_btn" value="Remove">
    </form>
</body>
</html>




