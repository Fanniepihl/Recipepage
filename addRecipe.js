document.addEventListener("DOMContentLoaded", function () {

	document.getElementById('connectIngredientsRecipe').addEventListener('click', function (e) {
		e.preventDefault();
		var div = document.getElementById('ingredientsToRecipe');
		var ingredients = document.getElementById('ingredients');
		var newText = document.createElement("li");
		ingredients.selectedIndex
		newText.innerText = ingredients[ingredients.selectedIndex].innerText;
		div.appendChild(newText);
		hiddenValue = ingredients[ingredients.selectedIndex].value;
		newHidden = document.createElement("input");
		newHidden.type = "hidden";
		newHidden.value = ingredients[ingredients.selectedIndex].value;
		newHidden.name = "ingredients[]";
		div.appendChild(newHidden);
		ingredients.removeChild(ingredients.selectedIndex);	

	})

})