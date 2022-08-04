<!DOCTYPE html>

<?php

include("smh_i_unironically_just_created_a_php_file.php");

if (isset($_POST['upload_review']))
{
    $username = $_POST['username'];
    $book_title = $_POST['book_title'];
    $author = $_POST['author'];
    $genre = $_POST['genre'];
    $star_rating = $_POST['star_rating'];
    $review = $_POST['review'];

    // Checking for dangerous single quotes
    if (str_contains($username, "'"))
    {
        $username = str_replace("'", "\'", $username);
    }
    if (str_contains($book_title, "'"))
    {
        $book_title = str_replace("'", "\'", $book_title);
    }
    if (str_contains($author, "'"))
    {
        $author = str_replace("'", "\'", $author);
    }
    if (str_contains($review, "'"))
    {
        $review = str_replace("'", "\'", $review);
    }

    $sql = "INSERT INTO `user-reviews` (`username`, `Title`, `Author`, `Genre`, `Star rating`, `Review`) VALUES ('$username', '$book_title', '$author', '$genre', '$star_rating', '$review')";
    $query = mysqli_query($dbconnect, $sql);
}

?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Book Fan Reading Log">
    <meta name="keywords" content="books, reading, log, fiction">
    <meta name="author" content="GLA">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Reviews</title>
    <link href="https://fonts.googleapis.com/css?family=Lato%7cUbuntu" rel="stylesheet"> 
    <link rel="stylesheet" href="css/layout.css">
</head>

<body>
    <h2>Thanks for uploading your review!</h2>
    <a href="index.php">Back to home</a> <a href="game_thing_idk.php">guess a number</a>
    <script>console.log('you seriously thought i wouldn\'t have even a single line of javascript?');</script>
</body>

</html>