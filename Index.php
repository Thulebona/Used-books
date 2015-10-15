<?php
  session_start(); 

   require 'connector.php';
   require 'header.php';

  //check if the category is selected
  if(isset($_POST['select'])) //if it is then select with category
  {
    $resultGeneral = mysqli_query($con,'SELECT * FROM bookgeneral WHERE category="'.$_POST['select'].'"');
  }
  else //otherwise select all
  {
    $resultGeneral = mysqli_query($con,'SELECT * FROM bookgeneral');
  }
?>

<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Used Books</title>
    <link rel="stylesheet" type="text/css" href="css/booksCoverStyle.css">
    <link rel="stylesheet" type="text/css" href="css/navBar.css">
    <link rel="stylesheet" type="text/css" href="css/loginBar.css">
</head>
<body>

<?php genHeader('index'); ?>

<table align="center" >
    <?php $i=0; 

  while($general = mysqli_fetch_object($resultGeneral))
  {

    $resultSpecific = mysqli_query($con, 'SELECT * FROM bookspecific WHERE isbn="'.$general->isbn.'"');
  	while ($item = mysqli_fetch_object($resultSpecific)) 
  	{?>
        <td >
          <table class="topic_table">
          	<tr>
                	<td class="topic_head">
                     <?php echo'<p align= "center" ><font color="#000000">'.$general->title.'</font></p>';?>
                        </a>
                  </td>
              </tr>
              <tr>
              	<td class="topic_content">
              	   <div id="theimages" class="imgWrap" align="center">
                         <?php echo '<img src="images/'.$item->imageName.'" alt="images/'.$item->imageName.'">';?>
                          <pre class="imgDescription">
                             <?php echo '<p class = "imgText"><strong><b>' .$general->title.'</strong></b><br>'.$general->isbn.'<br>R:' .$item->price.
        			                '<br>' .$item->bookCondition. '<br>' .$item->status. '<br>' .$item->ownerUsername.'<br>' .$general->description.'</p><br><br><br><br>'  ?>
                              <input type="button" value="Add to Cart"  border="2px" class="cartDiv"/> 
                             <!-- <input type="button" value="Remove from Cart"  border="2px" class="cartDiv"/>-->
                          </pre>
                    </div><br>
                </td>
              </tr>
            </table>
        </td>

        <?php $i++;
          if($i%5==0){   
            echo "</tr>".PHP_EOL;
  			    $i=0;
          }
    }
  }
		  ?>
</table>
</body>
</html>