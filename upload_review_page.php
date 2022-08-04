<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Book Fan Reading Log">
    <meta name="keywords" content="books, reading, log, fiction">
    <meta name="author" content="GLA">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Review</title>
    <link href="https://fonts.googleapis.com/css?family=Lato%7cUbuntu" rel="stylesheet"> 
    <link rel="stylesheet" href="css/layout.css"> 
</head>

<body>
    <div id="container">
        <h1 style="text-align: center; position:relative; top:50%"> Book Reviews</h1>
        
        
        <div id="content">
        <img src="Images/The_Martians.jpg" width="100" height="100" alt="'The Martian' Book" title="The Martian book">
            <h2>Upload Review</h2>
            <?php include("forms/upload_review_form.php"); ?>
        
        </div> <!--end of content-->

        <?php include("footnav.php"); ?>
        
    </div> <!--end of Container-->
</body>

</html>