<!DOCTYPE html>

<?php 

include("smh_i_unironically_just_created_a_php_file.php");
// include("Index.php");

$showall_sql="SELECT * FROM `user-reviews` ORDER BY `user-reviews`.`username` ASC";
$showall_query=mysqli_query($dbconnect, $showall_sql);
$showall_rs=mysqli_fetch_assoc($showall_query);
$count=mysqli_num_rows($showall_query);

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
		<h2>All user-added items</h2>  
		<?php
        if ($count<1)
        {
            ?>
            <div class="error">
                something went wrong ¯\_(ツ)_/¯
            </div>
        <?php
        }
        else {
            do{
                ?>
                <div class="user_results">
                    <p>Review by: <span class="sub_heading"><code><b><?php echo $showall_rs['username']; ?></b></code></span></p>
                    <p>Title: <span class="sub_heading"><code><b><?php echo $showall_rs['Title']; ?></b></code></b></span></p>
                    <p>Author: <span class="sub_heading"><code><b><?php echo $showall_rs['Author']; ?></b></code></b></span></p>
                    <p>Genre: <span class="sub_heading"><code><b><?php echo $showall_rs['Genre']; ?></b></code></b></span></p>
					<p>Review: <span class="sub_heading"><code><b><?php echo $showall_rs['Review']; ?></b></code></b></span></p>

					<p>Star rating: </p>
					<?php
						for($i=1; $i<=5; $i++)
						{
							if($i<=$showall_rs['Star rating'])
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
            while($showall_rs=mysqli_fetch_assoc($showall_query));
        }
		?>

	
	</div> <!--end of content-->

	<?php include("footnav.php"); ?>
	
</div> <!--end of Container-->
</body>

</html>