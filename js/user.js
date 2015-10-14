/*Responsible for handling AJAX user login and logout requests. Calls user.php*/

function login()
{
/*

//todo: get this working
	//get data
	var username = document.getElementById('usernameInput').value;
	var password = document.getElementById('passwordInput').value;

	var request = new XMLHttpRequest();
    request.open('POST', 'user.php', true);

	request.setRequestHeader("Content-type", "application/x-www-form-urlencoded")
    request.setRequestHeader("username", username);
    request.setRequestHeader("password", password);

    request.send();

    if (request.status === 200) 
    {
    	*/
      	//modify site user bar
      	document.getElementById("loginDiv").innerHTML = "<button id = 'buttonLogout'> Logout </button>";

      	document.getElementById("buttonLogout").addEventListener("click", logout);
      	/*
    }*/
}

function logout()
{
	document.getElementById("loginDiv").innerHTML = 
			"E-Mail:"+
			"<input id = 'usernameInput' type='text' maxlength='30' value=''/>"+
			"Password:"+
			"<input id = 'passwordInput' type='password' maxlength='30' value=''/>"+
			"<button id = 'buttonLogin'>  Login </button>";

	document.getElementById("buttonLogin").addEventListener("click", login);
}
