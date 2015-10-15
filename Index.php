<?php
  session_start();
  require 'connector.php';
  require 'header.php';
  //check if the category is selected
  if(isset($_POST['select'])) //if it is then select with category
  {
    $resultGeneral = mysqli_query($con,'SELECT * FROM bookgeneral WHERE category="'.$_POST['select'].'"');
  }
  else if (isset($_GET['id'])) {
      $bookspecific = mysqli_query($con,'SELECT * FROM bookspecific WHERE id="'.$_GET['id'].'"');
      $result = mysqli_fetch_object($bookspecific);

      $bookIsbn = mysqli_query($con,'SELECT * FROM bookgeneral WHERE isbn="'.$result->isbn.'"');  
      $general = mysqli_fetch_object($bookIsbn);

      $resultGeneral = mysqli_query($con,'SELECT * FROM bookgeneral WHERE category="'.$general->category.'"');
   }
  else //otherwise select all
  {
    $resultGeneral = mysqli_query($con,'SELECT * FROM bookgeneral');
  }

?>

<!doctype html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="css/booksCoverStyle.css">
    <link rel="stylesheet" type="text/css" href="css/navBar.css">
    <link rel="stylesheet" type="text/css" href="css/loginBar.css">
</head>
<body>
<?php genHeader('index'); ?>

  <div  class="container">
      <div class="tableDiv">
          <?php 
            $i=0; 
            while($general = mysqli_fetch_object($resultGeneral))
            {
               $resultSpecific = mysqli_query($con, 'SELECT * FROM bookspecific WHERE isbn="'.$general->isbn.'"');
               while ($item = mysqli_fetch_object($resultSpecific)) 
               {?>

                   <div class="tableWrapper" >
                     <div class="topic_table">
                          <div class="topic_head">
                             <?php echo'<p align= "center" ><font color="#000000">'.$general->title.'</font></p>';?>
                          </div>
                          <div class="topic_content">
                            <div id="theimages" class="imgWrap" align="center">
                                 <?php echo '<img src="images/'.$general->imageName.'" alt="'.$general->imageName.'">';?>
                                  <pre class="imgDescription">
                                     <?php echo '<p class = "imgText"><strong><b>' .$general->title.'</strong></b><br>'.$general->isbn.'<br>R:' .$item->price.
                                      '<br>' .$item->bookCondition. '<br>' .$item->status. '<br>' .$item->ownerUsername.'<br>' .$general->description.'</p><br><br><br>'  ?>
                                     <a href="index.php?id=<?php echo $item->id; ?>"><input  type="button" name="addTocart" value="Add to Cart"  class="cartDiv"/></a> 
                                     <!-- <input type="button" value="Remove from Cart"  border="2px" class="cartDiv"/>-->
                                  </pre>
                            </div><br>
                          </div>
                     </div>
                   </div>
           <?php 
               }
             }   
            ?>
       </div>
      <div class="shoppingCartDiv">

        <form action="#" id="cart_form" name="cart_form">
          <table >
            <tr>
            <thead>
              <th>Book Name</th>
              <th>Book price</th>
              <th>delete </th>
              </thead>
            </tr>
           
            <?php
             if (isset($_GET['id'])) {
              $bookspecific = mysqli_query($con,'SELECT * FROM bookspecific WHERE id="'.$_GET['id'].'"');
              $result = mysqli_fetch_object($bookspecific);
              $resultGeneral = mysqli_query($con,'SELECT * FROM bookgeneral WHERE isbn="'.$result->isbn.'"');
              $general = mysqli_fetch_object($resultGeneral);
            
              $_SESSION['cart_'.$result->isbn]+=1;
              $_SESSION['cartId_'.$result->id]+=1;

              foreach ($_SESSION as $key => $value) {
                # code... 
              echo '<tr>';
                if($value>0){
                  if(su)
                  echo '<td>'.$general->title.'</td>';
                  echo '<td>'.$result->price.'</td>'; 
                  echo '<td align="center"> <a href="#"><img src="images/remove.png"></a></td>';
                  }
              echo '</tr>';
              }
              

              
               }
              ?>              
           
          </table>
          <div class="cart-total">
          <b>Total Charges:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b> R<span>&nbsp;&nbsp;0</span>
          </div>
    
    <button type="submit" class="checkOut" id="Submit">CheckOut</button>
    
    </form>

      </div>
  </div>

</body>
</html>