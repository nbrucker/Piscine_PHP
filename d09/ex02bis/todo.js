var index = 0;

$(document).ready(function()
{
	var cookies = document.cookie.split(";");
	for (var i = 0; i < cookies.length; i++)
	{
		cookies[i] = cookies[i].trim();
		var el = cookies[i].split("=");
		if (el.length == 2)
			document.cookie = el[0] + "=; expires=Thu, 18 Dec 2013 12:00:00 UTC; path=/";
	}
	for (var i = 0; i < cookies.length; i++)
	{
		cookies[i] = cookies[i].trim();
		var el = cookies[i].split("=");
		if (el.length == 2)
			createTodo(el[1]);
	}
});

function createTodo(text)
{
	var div = "<div class=\"todo\" id=\"" + index + "\">" + text + "</div>";
	$('#ft_list').prepend(div);
	document.cookie = index + "=" + text + "; expires=Thu, 18 Dec 2023 12:00:00 UTC; path=/";
	index++;
}

$('#new').click(function()
{
	var text = prompt("New Todo");
	if (!text)
		return;
	var div = "<div class=\"todo\" id=\"" + index + "\">" + text + "</div>";
	$('#ft_list').prepend(div);
	document.cookie = index + "=" + text + "; expires=Thu, 18 Dec 2023 12:00:00 UTC; path=/";
	index++;
});

$(document).on('click', '.todo', function(event)
{
	id = event.target.id;
	if (confirm("Êtes-vous sûr ?"))
	{
		$('#' + id).remove();
		document.cookie = id + "=; expires=Thu, 18 Dec 2013 12:00:00 UTC; path=/";
	}
});
