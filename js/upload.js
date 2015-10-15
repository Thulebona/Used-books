

function validateUpload(form)
{
	if(!loggedIn())
	{
		alert('please log in before uploading your books details.');
		return false;
	}

	return true;
}

