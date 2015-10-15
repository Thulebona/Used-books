<?php
  session_start(); 

   require 'connector.php';
   require 'header.php';
?>

<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Upload a book</title>
    <link rel="stylesheet" type="text/css" href="css/navBar.css">
    <link rel="stylesheet" type="text/css" href="css/loginBar.css">

    <script src="js/user.js"></script>
    <script src="js/upload.js"></script>

</head>
<body>

<?php genHeader('upload'); ?>


<div id = 'uploadFormDiv'>
	<form onsubmit = "return validateUpload(this);">
		Title: <br>
		<input type = "text" name = "title"><br>

		Category: <br>
		<input type = "text" name = "category"><br>

		Description: <br>
		<input type = "text" name = "description"><br>
		<!--image-->
		ISBN Code: <br>
		<input type = "text" name = "description"><br>

		Condition: <br>
		<input type="radio" name="condition" value="undamaged" checked>Undamaged
  		<br>
  		<input type="radio" name="condition" value="scruffy">Scruffy
  		<br>
  		<input type="radio" name="condition" value="damaged">Damaged
  		<br>

		Price: <br>
		<input type = "text" name = "price"><br>

		<input type="submit" value="Submit">
	</form>
</div>



</body>
</html>