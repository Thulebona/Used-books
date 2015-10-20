
function unreserveBook(bookId)
{
	alert(bookId);

	var request = new XMLHttpRequest();
  	request.open('POST', 'mybooks.php', true);

	request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  request.send('action=unreserve&bookId=' + bookId);

  request.onload = function (e) 
  {
    if (request.status === 200) 
    {
        document.getElementById("").innerHTML = "";
    }
    else
    {
        alert("Unreserve failed");
    }
  };
}

function deleteBook(bookId)
{
	alert(bookId);

	var request = new XMLHttpRequest();
  	request.open('POST', 'mybooks.php', true);

	request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  request.send('action=delete&bookId=' + bookId);

  	request.onload = function (e) 
  	{
   	 	if (request.status === 200) 
    	{
    	    document.getElementById("").innerHTML = "";
  		}
    	else
    	{
      	 	alert("Delete failed");
    	}
  	};
}