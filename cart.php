<?php
  session_start();
  //session_destroy();
  require 'Book.php';
  require 'connector.php';
      
  if (isset($_GET['id']))
  {    
        $bookspecific = mysqli_query($con,'SELECT isbn,price,id FROM bookspecific WHERE id="'.$_GET['id'].'"');
        $result = mysqli_fetch_object($bookspecific);

        $resultGeneral = mysqli_query($con,'SELECT count(*) as rawNumber FROM bookspecific WHERE isbn="'.$result->isbn.'"');
        $count = mysqli_fetch_object($resultGeneral);
        
        $resultG = mysqli_query($con,'SELECT title FROM bookgeneral WHERE isbn="'.$result->isbn.'"');
        $g = mysqli_fetch_object($resultG);

        $book =new Book();

        $book->setBookID($result->id);
        $book->setBookIsbn($result->isbn);
        $book->setQuantity(1);
        $book->setBookTitle($g->title);
        $book->setBookPrice($result->price);

        $index = -1;
        if(!isset($_SESSION['book'])){$_SESSION['book'] = array();}
        $cart = unserialize(serialize($_SESSION['book']));
        for ($i=0; $i <count($cart); $i++)
          if ($cart[$i]->getBookIsbn()==$result->isbn) { $index = $i; break; }
        if ($index==-1) { $_SESSION['book'][]=$book; }
        else {
                $cart[$index]->setQuantity($cart[$index]->getQuantity()+1);
                $cart[$index]->setBookPrice($result->price);
                $_SESSION['book']=$cart;
        }
  }

  function cart()
  {
    global $index;
    include 'connector.php';

    if(!isset($_SESSION['book'])){$_SESSION['book'] = array();}
     $cart = unserialize(serialize($_SESSION['book']));
     for ($i=0; $i <count($cart); $i++) { 
      echo '<tr>';
                  $tot = $cart[$i]->getBookPrice() * $cart[$i]->getQuantity() ;
                  echo '<td>R'.$tot.'</td>';
                  echo '<td>'.$cart[$i]->getQuantity().' </td>' ; 
                  echo '<td>'.$cart[$i]->getBookTitle().'</td>'; 
                  echo '<td align="center"> <a href="#"><img src="images/remove.png"></a></td>';
       echo '</tr>';
        $index++;
     }
  }

?> 