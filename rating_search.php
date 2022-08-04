<!DOCTYPE html>

<?php 

include("smh_i_unironically_just_created_a_php_file.php");

// if search button clicked
if(isset($_POST['rating_search']))
{

$amount = $_POST['amount'];
$stars = $_POST['stars'];

if (str_contains($amount, "'"))
{
	$amount = str_replace("'", "\'", $amount);
}

if ($amount=="exactly")
{
	$amount_sql="SELECT * FROM `aum` WHERE `Star rating` = $stars";
	$user_amount_sql="SELECT * FROM `user-reviews` WHERE `Star rating` = $stars";

}
else if ($amount=="at_least")
{
	$amount_sql="SELECT * FROM `aum` WHERE `Star rating` >= $stars";
	$user_amount_sql="SELECT * FROM `user-reviews` WHERE `Star rating` >= $stars";

}
else if ($amount=="at_most")
{
	$amount_sql="SELECT * FROM `aum` WHERE `Star rating` <= $stars";
	$user_amount_sql="SELECT * FROM `user-reviews` WHERE `Star rating` <= $stars";

}

$amount_query=mysqli_query($dbconnect, $amount_sql);
$amount_rs=mysqli_fetch_assoc($amount_query);
$count=mysqli_num_rows($amount_query);

$user_amount_query=mysqli_query($dbconnect, $user_amount_sql);
$user_amount_rs=mysqli_fetch_assoc($user_amount_query);
$user_count=mysqli_num_rows($user_amount_query);

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
		<h2>Rating Search</h2>  
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
                    <p>Title: <span class="sub_heading"><code><b><?php echo $amount_rs['Title']; ?></b></code></b></span></p>
                    <p>Author: <span class="sub_heading"><code><b><?php echo $amount_rs['Author']; ?></b></code></b></span></p>
                    <p>Genre: <span class="sub_heading"><code><b><?php echo $amount_rs['Genre']; ?></b></code></b></span></p>
					<p>Review: <span class="sub_heading"><code><b><?php echo $amount_rs['Review']; ?></b></code></b></span></p>

					<p>Star rating: </p>
					<?php
						for($i=1; $i<=5; $i++)
						{
							if($i<=$amount_rs['Star rating'])
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
            while($amount_rs=mysqli_fetch_assoc($amount_query));
        }
		if ($user_count<1)
        {
            if ($count<1){}
        }
        else {
            do{
                ?>
                <div class="user_results">
					<p>Review by: <span class="sub_heading"><code><b><?php echo $user_amount_rs['username']; ?></b></code></b></span></p>
                    <p>Title: <span class="sub_heading"><code><b><?php echo $user_amount_rs['Title']; ?></b></code></b></span></p>
                    <p>Author: <span class="sub_heading"><code><b><?php echo $user_amount_rs['Author']; ?></b></code></b></span></p>
                    <p>Genre: <span class="sub_heading"><code><b><?php echo $user_amount_rs['Genre']; ?></b></code></b></span></p>
					<p>Review: <span class="sub_heading"><code><b><?php echo $user_amount_rs['Review']; ?></b></code></b></span></p>

					<p>Star rating: </p>
					<?php
						for($i=1; $i<=5; $i++)
						{
							if($i<=$user_amount_rs['Star rating'])
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
            while($user_amount_rs=mysqli_fetch_assoc($user_amount_query));
        }
	}

		?>

	
	</div> <!--end of content-->

	<?php include("footnav.php"); ?>
	
</div> <!--end of Container-->
</body>

</html>