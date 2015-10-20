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

		<script src="js/mybooks.js"></script>
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
    		<th class = "tableElement">Operations</th>
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
				if($book->status == 'reserved')
				{

					$orderSQL = 'SELECT * FROM orders WHERE bookId="'.$book->id.'"';
					$orders = mysqli_query($con, $orderSQL);
					if(!$orders)
					{
						error_log('ERROR: '.$orderSQL.'" failed to exetute', 0);
					}
					$order = mysqli_fetch_object($orders); 
					error_log('clientUsername:'.$order->clientUsername, 0);
					$clientSQL = 'SELECT username, name, lastName, email, phone FROM client WHERE username ="'.$order->clientUsername.'";';
					$clients = mysqli_query($con, $clientSQL);
					if(!$clients)
					{
						error_log('ERROR: "'.$clientSQL.'" failed to exetute', 0);
					}

					while($client = mysqli_fetch_object($clients))
					{
						if($client->username == $order->clientUsername)
						{
							$name = $client->name;
							$lname = $client->lastName;
							$email = $client->email;
							$phone = $client->phone;

							echo '<td class = "tableElement">'
							.$book->status.'</br>By '.$name. ' '.$lname.'</br>'.'Email: '.$email.'</br>Telephone: '.$phone.
							'</td>'; 

							echo '<td class = "tableElement"><button onclick = "deleteBook('.$book->id.')">Delete</button><br><button onclick = "unreserveBook('.$book->id.')">Unreserve</button></td>'; 
						}
					}
				}
				else
				{
					echo '<td class = "tableElement">'.$book->status.'</td>'; 
					echo '<td class = "tableElement"><button onclick = "deleteBook('.$book->id.')">Delete</button></td>'; 
				}
				
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