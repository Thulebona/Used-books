

<?php

	/*Responsible for updating user login session*/

	if(isset($_POST['login']))
	{
		$loginPost = $_POST['login'];
		login($loginPost['username'], $loginPost['password']);
	}
	else if(isset($_POST['logout']))
	{
		logout();
	}

	function login($username, $password)
	{
		//create session
	}

	function loggedIn()
	{
		//return username or bool?
	}


	function logout()
	{
		//logout based on session data
	}

	function getBooks()
	{
		//get books based on session data
	}
	
?>