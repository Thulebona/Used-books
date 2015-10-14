<?php
	require 'navbar.php';
?>

<!DOCTYPE html>
<html>
<head>
	<title>Category</title>
	<link rel="stylesheet" type="text/css" href="Css/category.css">
	 <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Tangerine">
	  <link rel="stylesheet" type="text/css" href="Css/navBar.css">
</head>
<body>

<?php genHeader(); ?>

	<form align="center" class="container" action='index.php' method='post' accept-charset='UTF-8'  >
	<?php 
		$categories = array("Business", "Sport Management", "Tourism","Informatics and design","Accounting","Applied Science","Radiography","Health and Wellness","Architecture","Hospitality");
		for($x = 0; $x < count($categories); $x++)  {
	         echo '<button type="submit"  name="select" value="'.$categories[$x].'"><span>'.$categories[$x].'</span><img src="images/category/'.$categories[$x].'.png"></button>';
	   }
	 ?>
	</form>

</body>
</html>