Problem 4b:
When I click on the new list element nothing happens: it does not change red like the other list elements.
This is because the new, added li elements dynamically added by jquery have not been added to the DOM.

EDIT (bonus):
I fixed the problem above by changing:

$("#labList li").on("click", function () {
$(this).toggleClass("red");
});

to:

$("#labList").on("click", "li", function () {
$(this).toggleClass("red");
});

This works because it uses event delegation to ensure that the click event listener for toggling the red class is delegated to the lab list elements.
