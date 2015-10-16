<?php
  session_start();
  //session_destroy();
  require 'connector.php';
  if (isset($_GET['id']))
  {    
        $bookspecific = mysqli_query($con,'SELECT isbn FROM bookspecific WHERE id="'.$_GET['id'].'"');
        $result = mysqli_fetch_object($bookspecific);
             // $resultGeneral = mysqli_query($con,'SELECT * FROM bookgeneral WHERE isbn="'.$result->isbn.'"');
             // $general = mysqli_fetch_object($resultGeneral);  
        $_SESSION['cart_'.$result->isbn]+=1;
  }
  function cart()
  {
    global $result;
    include 'connector.php';
    foreach ($_SESSION as $key => $value)
    {
        echo '<tr>';
          if($value>0)
          {
            if(substr($key,0,5)=='cart_')
            {
                $bookId = substr($key,5,strlen($key)-5);
                $getBook = mysqli_query($con,'select title from bookgeneral where isbn="'.$bookId.'"');
                 while ($get_rows = mysqli_fetch_object($getBook)) 
                 {
                  echo '<td>'.$get_rows->title.'</td>'; 
                  echo '<td>'.$value.'  * '.$result->price.'</td>'; 
                  echo '<td align="center"> <a href="#"><img src="images/remove.png"></a></td>';
                   # code...
                 }//end while loop
            }//ednf if (substr($key,0,5)=='cart_')
          }//end if($value>0)
        echo '</tr>';
    }
  }

?> 