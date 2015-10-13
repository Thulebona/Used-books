<?php
	require 'connector.php';
	$result = mysqli_query($con,'select * from Books');
 ?>

<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Used Books</title>
    <link rel="stylesheet" type="text/css" href="Css/booksCoverStyle.css">
    <link rel="stylesheet" type="text/css" href="Css/navBar.css">
</head>
<body>
<div id='cssmenu'>
    <ul>
       <li><a href='#'><span>Home</span></a></li>
       <li class='active'><a href='categories.php'><span>Books</span></a></li>
       <li><a href='#'><span>Upload a Book</span></a></li>
       <li class='last'><a href='#'><span>Contact</span></a></li>
    </ul>
</div>
<table align="center" >
    <?php $i=0; 
	while ($item = mysqli_fetch_object($result)) 
	{?>
        <td >
          <table class="topic_table">
          	<tr>
              	<td class="topic_head">
                   <?php echo'<p align= "center" ><font color="#000000">'.$item->title.'</font></p>';?>
                      </a>
                </td>
            </tr>
            <tr>
            	<td class="topic_content">
            	   <div id="theimages" class="imgWrap" align="center">
                       <?php echo '<img src="images/'.$item->imageName.'" alt="'.$item->imageName.'">';?>
                        <pre class="imgDescription">
                           <?php echo '<p ><strong><b>' .$item->title.'</strong></b><br>'.$item->isbn.'<br>R:' .$item->price.
      			                '<br>' .$item-> bookCondition. '<br>' .$item->status. '</p><br><br><br><br>'  ?>
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
		  ?>
</table>
</body>
</html>