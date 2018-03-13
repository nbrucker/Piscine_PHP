function showBox()
{
	if (document.getElementById("logbox").style.display == "none")
		document.getElementById("logbox").style.display = "block";
	else
		document.getElementById("logbox").style.display = "none";
}
function filtre(el)
{
	window.location.href = "index.php?type=" + el.value;
}
