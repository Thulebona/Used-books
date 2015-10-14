<?php

require 'user.php';

function genHeader()
{
	genUserBar();
	genNavBar();
}

function genUserBar()
{
	?>
		<!--including script here bad? where should we then?-->
		<script src="js/user.js"></script>

		<!--TODO: build css file for this-->
		<div id = "loginDiv">
			E-Mail:
			<input id = 'usernameInput' type='text' maxlength='30' value=''/>
			Password:
			<input id = 'passwordInput' type='password' maxlength='30' value=''/>
			<button id = 'buttonLogin' onclick='login()'>  Login </button>
		</div>

	<?php
}

function genNavBar()
{
	?>
	<div id='cssmenu'>
    	<ul>
       		<li class='active'><a href='categories.php'><span>Books</span></a></li>
       		<li><a href='#'><span>Upload a Book</span></a></li>
       		<li class='last'><a href='#'><span>Contact</span></a></li>
   	 	</ul>
	</div>

	<?php
}

?>