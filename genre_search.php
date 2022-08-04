<?php 

include("smh_i_unironically_just_created_a_php_file.php");

// if search button clicked
if(isset($_POST['genre_search']))
{

$genre = $_POST['genre'];

if ($genre == "heheheha")
{
	header("Location: https://youtu.be/xvFZjo5PgG0");
}

if (str_contains($genre, "'"))
{
	$genre = str_replace("'", "\'", $genre);
}

$genre_sql="SELECT * FROM `aum` WHERE `Genre` LIKE '%$genre%'";
$genre_query=mysqli_query($dbconnect, $genre_sql);
$genre_rs=mysqli_fetch_assoc($genre_query);
$count=mysqli_num_rows($genre_query);

$user_genre_sql="SELECT * FROM `user-reviews` WHERE `Genre` LIKE '%$genre%'";
$user_genre_query=mysqli_query($dbconnect, $user_genre_sql);
$user_genre_rs=mysqli_fetch_assoc($user_genre_query);
$user_count=mysqli_num_rows($user_genre_query);

?>

<!DOCTYPE html>

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
		<h2>Genre Search</h2>  
		<?php
        if ($count<1 || $user_count<1)
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
                    <p>Title: <span class="sub_heading"><code><b><?php echo $genre_rs['Title']; ?></b></code></b></span></p>
                    <p>Author: <span class="sub_heading"><code><b><?php echo $genre_rs['Author']; ?></b></code></b></span></p>
                    <p>Genre: <span class="sub_heading"><code><b><?php echo $genre_rs['Genre']; ?></b></code></b></span></p>
					<p>Review: <span class="sub_heading"><code><b><?php echo $genre_rs['Review']; ?></b></code></b></span></p>

					<p>Star rating: </p>
					<?php
						for($i=1; $i<=5; $i++)
						{
							if($i<=$genre_rs['Star rating'])
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
            while($genre_rs=mysqli_fetch_assoc($genre_query));
        }
		if ($user_count<1)
        {
            if ($count<1){}
        }
        else {
            do{
                ?>
                <div class="user_results">
					<p>Review by: <span class="sub_heading"><code><b><?php echo $user_genre_rs['username']; ?></b></code></b></span></p>
                    <p>Title: <span class="sub_heading"><code><b><?php echo $user_genre_rs['Title']; ?></b></code></b></span></p>
                    <p>Author: <span class="sub_heading"><code><b><?php echo $user_genre_rs['Author']; ?></b></code></b></span></p>
                    <p>Genre: <span class="sub_heading"><code><b><?php echo $user_genre_rs['Genre']; ?></b></code></b></span></p>
					<p>Review: <span class="sub_heading"><code><b><?php echo $user_genre_rs['Review']; ?></b></code></b></span></p>

					<p>Star rating: </p>
					<?php
						for($i=1; $i<=5; $i++)
						{
							if($i<=$user_genre_rs['Star rating'])
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
            while($user_genre_rs=mysqli_fetch_assoc($user_genre_query));
        }

	}	

		?>

	
	</div> <!--end of content-->

	<?php include("footnav.php"); ?>
	
</div> <!--end of Container-->
</body>

</html>