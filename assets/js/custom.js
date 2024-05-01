function clickNext(obj) {
	obj.nextElementSibling.click();
}

function addCarName(obj) {
	document.getElementById("removeLabel").innerHTML = "Remove " + obj.id;
}
