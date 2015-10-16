<?php 
     class Book
	{
		 private $id;
		 private $title;
		 private $isbn;
		 private $quantity;
		 private $price =0;

		function setBookID($id){
			$this->id = $id;
		}
		function setBookTitle($title){
			$this->title = $title;
		}
		function setBookPrice($price){
			$this->price = $price;
		}
		function setBookIsbn($isbn){
			$this->isbn = $isbn;
		}
		function setQuantity($quantity){
			$this->quantity =$quantity;
		}
		function getQuantity(){
			return $this->quantity;
		}

		function getBookIsbn(){
			return $this->isbn;
		}
		function getBookID(){
			return $this->id ;
		}
		function getBookTitle(){
			return $this->title;
		}
		function getBookPrice(){
			return $this->price;
		}
	}
 ?>