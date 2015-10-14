<?php

function genHeader()
{
	genUserBar();
	genNavBar();
}

function genUserBar()
{
	if(loggedIn())
	{
	?>


		<!--including script here bad? where should we then?-->
		<script src="js/user.js"></script>
			<div id = "loginDiv">
				<div id = "innerLoginDiv">
					Welcome <?php echo getLoggedInUsername() ?>!
					<button id = 'buttonLogout' onclick = "logout()"> Logout </button>
				</div>
			</div>
	<?php
	}
	else
	{
		?>
			<!--including script here bad? where should we then?-->
			<script src="js/user.js"></script>
			<!--TODO: build css file for this-->
			<div id = "loginDiv">
				<div id = "innerLoginDiv">
					Username:
					<input id = 'usernameInput' type='text' maxlength='30' value=''/>
					Password:
					<input id = 'passwordInput' type='password' maxlength='30' value=''/>
					<button id = 'buttonLogin' onclick='login()'>  Login </button>
				</div>
			</div>
		<?php
	}
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

require 'userFunctions.php'
?>