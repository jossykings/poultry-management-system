const category = document.getElementById("category");
const eggs = document.getElementById("quantity_of_eggs_used");
const birds = document.getElementById("number_of_birds");
window.addEventListener("DOMContentLoaded", () => {
    if (category.value == "Egg") {
        eggs.setAttribute("type", "number");
    } else {
        eggs.setAttribute("type", "hidden");
    }
    if (category.value == "Chicken") {
        birds.setAttribute("type", "number");
    } else {
        birds.setAttribute("type", "hidden");
    }
});
category.addEventListener("click", () => {
    if (category.value == "Egg") {
        eggs.setAttribute("type", "number");
    } else {
        eggs.setAttribute("type", "hidden");
    }
    if (category.value == "Chicken") {
        birds.setAttribute("type", "number");
    } else {
        birds.setAttribute("type", "hidden");
    }
});
