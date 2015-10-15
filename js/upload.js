

function validateUpload()
{

	form = document.forms[0];
	var title = form.elements["title"];
	var category = form.elements["category"];
	var description = form.elements["description"];
	var isbn = form.elements["isbn"];
	var conditionRadio = form.elements["condition"];
		var conditionRadio = form.elements["condition"];

	if(!loggedIn())
	{
		alert('please log in before uploading your books details.');
		return false;
	}
	else
	{
		document.getElementById("uploadForm").submit();
		return true;
	}

	
}

