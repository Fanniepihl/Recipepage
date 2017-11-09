document.addEventListener("DOMContentLoaded", function () {

	document.getElementById('connectCategoryRecipe').addEventListener('click', function (e) {
		e.preventDefault();
		var div = document.getElementById('categoryToRecipe');
		var categories = document.getElementById('categories');
		var newText = document.createElement("li");
		categories.selectedIndex
		newText.innerText = categories[categories.selectedIndex].innerText;
		div.appendChild(newText);
		hiddenValue = categories[categories.selectedIndex].value;
		newHidden = document.createElement("input");
		newHidden.type = "hidden";
		newHidden.value = categories[categories.selectedIndex].value;
		newHidden.name = "categories[]";
		div.appendChild(newHidden);
		categories.removeChild(categories.selectedIndex);	

	})

})