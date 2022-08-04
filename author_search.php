<!DOCTYPE html>

<?php 

include("smh_i_unironically_just_created_a_php_file.php");

// if search button clicked
if(isset($_POST['author_search']))
{

$author = $_POST['author'];

if (str_contains($author, "'"))
{
	$author = str_replace("'", "\'", $author);
}

$author_sql="SELECT * FROM `aum` WHERE `Author` LIKE '%$author%' ORDER BY `Author` ASC";
$author_query=mysqli_query($dbconnect, $author_sql);
$author_rs=mysqli_fetch_assoc($author_query);
$count=mysqli_num_rows($author_query);

$user_author_sql="SELECT * FROM `user-reviews` WHERE `Author` LIKE '%$author%' ORDER BY `Author` ASC";
$user_author_query=mysqli_query($dbconnect, $user_author_sql);
$user_author_rs=mysqli_fetch_assoc($user_author_query);
$user_count=mysqli_num_rows($user_author_query);

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
    
	</head>  <!--end of head-->
    	
<body>


<div id="container">
	<h1 style="text-align: center; position:relative; top:50%"> Book Reviews</h1>
	
	
	<div id="content">
	<img src="Images/The_Martians.jpg" width="100" height="100" alt="'The Martian' Book" title="The Martian book">
		<h2>Author Search</h2>  
		<?php
        if ($count<1)
        {
			if ($user_count<1)
			{
				?>
				<div class="error">
					No results found (or an error occurred)
				</div>
			<?php
			}
        }
        else {
            do{
                ?>
                <div class="results">
                    <p>Title: <span class="sub_heading"><code><b><?php echo $author_rs['Title']; ?></b></code></b></span></p>
                    <p>Author: <span class="sub_heading"><code><b><?php echo $author_rs['Author']; ?></b></code></b></span></p>
                    <p>Genre: <span class="sub_heading"><code><b><?php echo $author_rs['Genre']; ?></b></code></b></span></p>
					<p>Review: <span class="sub_heading"><code><b><?php echo $author_rs['Review']; ?></b></code></b></span></p>

					<p>Star rating: </p>
					<?php
						for($i=1; $i<=5; $i++)
						{
							if($i<=$author_rs['Star rating'])
							{
								echo "<img src='Images/star.png' width='20' height='20' alt='Star' title='Star'>";
							}
							else
							{
								echo "<img src='Images/empty_star.png' width='20' height='20' alt='Star' title='Star'>";
							}
						}
					?>
                </div>

				<br>

                <?php
            }
            while($author_rs=mysqli_fetch_assoc($author_query));
        }
		if ($user_count<1)
        {
			if ($count<1){}
        }
        else {
            do{
                ?>
                <div class="user_results">
					<p>Review by: <span class="sub_heading"><code><b><?php echo $user_author_rs['username']; ?></b></code></b></span></p>
                    <p>Title: <span class="sub_heading"><code><b><?php echo $user_author_rs['Title']; ?></b></code></b></span></p>
                    <p>Author: <span class="sub_heading"><code><b><?php echo $user_author_rs['Author']; ?></b></code></b></span></p>
                    <p>Genre: <span class="sub_heading"><code><b><?php echo $user_author_rs['Genre']; ?></b></code></b></span></p>
					<p>Review: <span class="sub_heading"><code><b><?php echo $user_author_rs['Review']; ?></b></code></b></span></p>

					<p>Star rating: </p>
					<?php
						for($i=1; $i<=5; $i++)
						{
							if($i<=$user_author_rs['Star rating'])
							{
								echo "<img src='Images/star.png' width='20' height='20' alt='Star' title='Star'>";
							}
							else
							{
								echo "<img src='Images/empty_star.png' width='20' height='20' alt='Star' title='Star'>";
							}
						}
					?>
                </div>

				<br>

                <?php
            }
            while($user_author_rs=mysqli_fetch_assoc($user_author_query));
        }

	}	

		?>

	
	</div> <!--end of content-->

	<?php include("footnav.php"); ?>
	
</div> <!--end of Container-->
</body>

</html>