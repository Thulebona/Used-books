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
       <li class='active'><a href='#'><span>Books</span></a></li>
       <li><a href='#'><span>Upload a Book</span></a></li>
       <li class='last'><a href='#'><span>Contact</span></a></li>
    </ul>
</div>
<table >
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
                    <!--- / Topic Head / Title  /--->
                    <!--- Topic Image --->
                	</tr>
                  	<tr>
                    	<td class="topic_content">
                    	<div id="theimages" class="imgWrap" align="center">
                           <?php echo '<img src="images/'.$item->imageName.'" alt="'.$item->imageName.'">';?>
                            <pre class="imgDescription">
                               <?php echo '<p ><strong><b>' .$item->title.'</strong></b><br>'
							    .$item->isbn.'<br>R:' .$item->price.
							   '<br>' .$item-> bookCondition. '<br>' .$item->status. '</p>'  ?>
                               
                               <p> <input type="button" align="left" value="Add to Cut"  border="2px" class="addToCut"></p>
                               
                             </pre>
            		   </div><br>
                    </td>
                </tr>
                </table>
             </td>
        <?php
         $i++;
          if($i%6==0){   
          echo "</tr>".PHP_EOL;
			$i=0;
         }
		?>
     <?php } ?>
</table>

</body>
</html>