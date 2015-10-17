<?php
	session_start();
	require 'header.php';

	servePage();
?>

<?php

function servePage()
{
	?>

	<!DOCTYPE html>
	<html>
	<head>
		<title>Category</title>
		<link rel="stylesheet" type="text/css" href="css/category.css">
		<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Tangerine">
		<link rel="stylesheet" type="text/css" href="css/navBar.css">
		<link rel="stylesheet" type="text/css" href="css/loginBar.css">
			<link rel="stylesheet" type="text/css" href="css/myBooks.css">
	</head>
	<body>

	<?php 
		genHeader('mybooks'); 
		genBody();
	?>
	</body>
	</html>
	<?php
}


function genBody()
{
	if(!loggedIn())
	{
		?>
			You are not logged in. Login before looking at your books. How did you even get here?
		<?php
		return;
	}

	?>
		<div class = 'outerDiv'>
		<table class = 'bookTable'>
		  <tr>
    		<th class = "tableElementFirst">Title</th>
    		<th class = "tableElement">Description</th> 
    		<th class = "tableElement">Category</th>
    		<th class = "tableElement">ISBN</th>
    		<th class = "tableElement">Asking Price</th> 
    		<th class = "tableElement">Condition</th>
    		<th class = "tableElement">Status</th>
    		<th class = "tableElementLast">Picture</th>
 		  </tr>
	<?php

	require 'connector.php';

	$ownerUsername = getLoggedInUsername();
	error_log('Username:'.$ownerUsername, 0);
	$specificSQL = 'SELECT * FROM bookspecific WHERE ownerUsername="'.$ownerUsername.'"';
	$books = mysqli_query($con, $specificSQL);
	if(!$books){error_log('SPECIFIC QUERY FAILED WITH SQL: '.$specificSQL, 0);}
	while($book = mysqli_fetch_object($books))
	{
		$generalSQL = 'SELECT * FROM bookgeneral WHERE isbn="'.$book->isbn.'"';
		$booksg = mysqli_query($con, $generalSQL);
		if(!$booksg){error_log('GENERAL QUERY FAILED WITH SQL: '.$generalSQL, 0);} // not optimal
		while($bookg = mysqli_fetch_object($booksg)) //there will only ever be one bookg per outer loop
		{
			//draw book
				echo '<tr>';
				echo '<td class = "tableElementFirst">'.$bookg->title.'</td>'; 
				echo '<td class = "tableElement">'.$bookg->description.'</td>'; 
				echo '<td class = "tableElement">'.$bookg->category.'</td>'; 
				echo '<td class = "tableElement">'.$bookg->isbn.'</td>'; 

				echo '<td class = "tableElement">'.$book->price.'</td>'; 
				echo '<td class = "tableElement">'.$book->bookCondition.'</td>'; 
				echo '<td class = "tableElement">'.$book->status.'</td>'; 
				echo '<td class = "tableElementLast"> <img class = "imgTable" src = images/'.$book->imageName.'></img></td>'; 
				echo '</tr>';	
		}
	}
	?>
		</table>
		</div>
	<?php
}


?>