document.addEventListener("DOMContentLoaded", function () {

	document.getElementById('connectCategoryRecipe').addEventListener('click', function (e) {
		e.preventDefault();
		var div = document.getElementById('categoryToRecipe');
		var category = document.getElementById('category');
		var newText = document.createElement("li");
		category.selectedIndex
		newText.innerText = category[category.selectedIndex].innerText;
		div.appendChild(newText);
		hiddenValue = category[category.selectedIndex].value;
		newHidden = document.createElement("input");
		newHidden.type = "hidden";
		newHidden.value = category[category.selectedIndex].value;
		newHidden.name = "category";
		div.appendChild(newHidden);
		category.removeChild(category[category.selectedIndex]);	

	})

})

//ändrat alla från categories till category