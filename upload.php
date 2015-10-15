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
    <link rel="stylesheet" type="text/css" href="css/uploadForm.css">

    <script src="js/user.js"></script>
    <script src="js/upload.js"></script>

</head>
<body>

<?php genHeader('upload'); 

	if(isset($_POST['isbn'])) //do submit logic
	{
		error_log('POST RESULT SET', 0);

		 $generalWithISBN = mysqli_query($con,'SELECT * FROM bookgeneral WHERE isbn="'.$_POST['isbn'].'"');
		 if(count($generalWithISBN) < 1)
		 {
		 	//isbn imageName description
		 	//mysqli_query($con,'INSERT INTO bookgeneral VALUES("'$_POST['isbn'])'", )';
		 }
		 else
		 {

		 }


		$_POST = array();
	}
	else //serve submission form
	{
?>


<div id = 'uploadFormDiv'>
	<form id = "uploadForm" onsubmit = "upload.php" method = 'post'>
		Title: <br>
		<input type = "text" name = "title"><br>

		Category: <br>
		<input type = "text" name = "category"><br>

		Description: <br>
		<input type = "text" name = "description"><br>

		ISBN Code: <br>
		<input type = "text" name = "isbn"><br>

		Condition: <br>
		<input type="radio" name="condition" value="undamaged" checked>Undamaged
  		<br>
  		<input type="radio" name="condition" value="scruffy">Scruffy
  		<br>
  		<input type="radio" name="condition" value="damaged">Damaged
  		<br>

		Price: <br>
		<input type = "text" name = "price"><br>

		Image:<br>
		<input type="file" name="datafile" size="40"><br>

		<br>
		<button id = "uploadButton" onclick = "return validateUpload(this)">Upload</button>
	</form>
</div>

<?php
	}
?>



</body>
</html>