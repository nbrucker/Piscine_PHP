var talk = 0;
window.onload = function ()
{
	document.querySelector("#my_form").addEventListener("submit", form);
	document.querySelector("#arrow").addEventListener("click", clicked);
	document.querySelector("#main").addEventListener("click", clicked);
	document.querySelector("#oeil").addEventListener("click", clicked);
	document.querySelector("#outil").addEventListener("click", clicked);
	document.querySelector("#chat").addEventListener("click", clicked);
	document.querySelector("#chair").addEventListener("click", action);
	document.querySelector("#mac").addEventListener("click", action);
}
function action(event)
{
	event.preventDefault();
	if (event.target.id == "chair")
	{
		if (document.querySelector("#arrow").classList.contains('select'))
			window.location.href = "http://www.ikea.com/";
		else if (document.querySelector("#main").classList.contains('select'))
			alert('You just punched a chair, well played, you broke your hand !');
		else if (document.querySelector("#oeil").classList.contains('select'))
			alert('As you can see, this is a chair !');
		else if (document.querySelector("#outil").classList.contains('select'))
			alert('You fixed the broken chair !');
		else if (document.querySelector("#chat").classList.contains('select'))
			alert('A chair can\'t talk...');
	}
	if (event.target.id == "mac")
	{
		if (document.querySelector("#arrow").classList.contains('select'))
			window.location.href = "http://www.apple.com/";
		else if (document.querySelector("#main").classList.contains('select'))
			alert('You just punched a mac... Why ?');
		else if (document.querySelector("#oeil").classList.contains('select'))
			alert('As you can see, this is a mac !');
		else if (document.querySelector("#outil").classList.contains('select'))
			alert('You fixed the broken mac !');
		else if (document.querySelector("#chat").classList.contains('select'))
			alert('Beep beep boop !!!');
	}
}
function form(event)
{
	event.preventDefault();
	var answer = document.querySelector("#answer").value;
	var question = document.querySelector("#question");
	if (talk == 0)
	{
		if (answer.indexOf("oui") > -1)
		{
			question.innerHTML = "Tu t'amuse bien ici ?";
			talk = 1;
		}
		else if (answer.indexOf("non") > -1)
		{
			question.innerHTML = "Je ne t'ai jamais vu ici, tu est là depuis combien de temps ?";
			talk = 2;
		}
		else
			question.innerHTML = "Je n'ai pas compris";
	}
	else if (talk == 1)
	{
		if (answer.indexOf("oui") > -1)
		{
			question.innerHTML = "On est là pour travailler, pas pour s'amuser !";
			talk = 11;
		}
		else if (answer.indexOf("non") > -1)
		{
			question.innerHTML = "C'est bien, on est pas là pour ça !";
			talk = 12;
		}
		else
			question.innerHTML = "Je n'ai pas compris";
	}
	else if (talk == 2)
	{
		question.innerHTML = "Tu est sûrement très haut niveau depuis tout ce temps ! Quel est ton niveau ?";
		talk = 22;
	}
	else if (talk == 22)
	{
		question.innerHTML = "C'est impressionant !";
		talk = 222;
	}
	document.querySelector("#answer").value = "";
}
function clicked(event)
{
	event.preventDefault();
	document.querySelector("#arrow").classList.remove('select');
	document.querySelector("#main").classList.remove('select');
	document.querySelector("#oeil").classList.remove('select');
	document.querySelector("#outil").classList.remove('select');
	document.querySelector("#chat").classList.remove('select');
	document.querySelector("#" + event.target.id).classList.add('select');
}