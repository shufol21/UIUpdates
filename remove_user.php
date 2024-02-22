<?php
// Include necessary files and start the session
include 'session-file.php';
include 'classes/User.php';
include 'classes/Post.php';

// Check if the user is logged in
if(isset($_SESSION['username'])) {
    // Get user details from the database
    $userLoggedIn = $_SESSION['username'];
    $user_details_query = mysqli_query($con, "SELECT * FROM admin WHERE adminname='$userLoggedIn'") or die(mysqli_error($con));
    $user = mysqli_fetch_array($user_details_query);
} else {
    // Redirect to login page if not logged in
    header("Location: admin.php");
    exit(); // Stop further execution
}

// Handle user deletion
if(isset($_POST['search_user_btn'])) {
    // Sanitize and validate user input
    $userToDelete = mysqli_real_escape_string($con, $_POST['search']);

    // Delete user's posts, messages, and comments
    $deleteUserQuery = "DELETE FROM users WHERE username = '$userToDelete'";
    $deletePostsQuery = "DELETE FROM posts WHERE added_by = '$userToDelete'";
    $deleteMessagesQuery = "DELETE FROM messages WHERE user_to = '$userToDelete' OR user_from = '$userToDelete'";
    $deleteCommentsQuery = "DELETE FROM comments WHERE posted_by = '$userToDelete'";

    // Perform the DELETE queries
    if(mysqli_query($con, $deleteUserQuery) &&
       mysqli_query($con, $deletePostsQuery) &&
       mysqli_query($con, $deleteMessagesQuery) &&
       mysqli_query($con, $deleteCommentsQuery)) {
        echo "User $userToDelete, their posts, messages, and comments are deleted successfully.";
    } else {
        echo "Error deleting user: " . mysqli_error($con);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Remove User</title>
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
    <!-- User deletion form -->
    <form action="remove_user.php" method="post">
        <input type="text" name="search" placeholder="Enter User Name to remove....">
        <input type="submit" name="search_user_btn" value="Remove">
    </form>
</body>
</html>