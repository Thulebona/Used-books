<!DOCTYPE html>
<html>
<head>
	<title>Category</title>
	<link rel="stylesheet" type="text/css" href="Css/category.css">
	 <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Tangerine">
	  <link rel="stylesheet" type="text/css" href="Css/navBar.css">
</head>
<body>
<div id='cssmenu'>
    <ul>
       <li><a href='#'><span>Home</span></a></li>
       <li class='active'><a href='categories.php'><span>Books</span></a></li>
       <li><a href='#'><span>Upload a Book</span></a></li>
    </ul>
</div>

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