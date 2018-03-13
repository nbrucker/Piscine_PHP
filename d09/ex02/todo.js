var index = 0;

function loaded()
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
}

function createTodo(text)
{
	var div = "<div onclick=\"deleteTodo(" + index + ");\" class=\"todo\" id=\"" + index + "\">" + text + "</div>";
	document.getElementById("ft_list").insertAdjacentHTML("afterBegin", div);
	document.cookie = index + "=" + text + "; expires=Thu, 18 Dec 2023 12:00:00 UTC; path=/";
	index++;
}

function newTodo()
{
	var text = prompt("New Todo");
	if (!text)
		return;
	var div = "<div onclick=\"deleteTodo(" + index + ");\" class=\"todo\" id=\"" + index + "\">" + text + "</div>";
	document.getElementById("ft_list").insertAdjacentHTML("afterBegin", div);
	document.cookie = index + "=" + text + "; expires=Thu, 18 Dec 2023 12:00:00 UTC; path=/";
	index++;
}

function deleteTodo(id)
{
	if (confirm("Êtes-vous sûr ?"))
	{
		var elem = document.getElementById(id);
		elem.parentNode.removeChild(elem);
		document.cookie = id + "=; expires=Thu, 18 Dec 2013 12:00:00 UTC; path=/";
	}
}
