const chick_type = document.getElementById("chick_type");
const yield = document.getElementById("yield");
chick_type.addEventListener("click", () => {
    if (chick_type.value == "broilers") {
        yield.setAttribute("type", "number");
    } else {
        yield.setAttribute("type", "hidden");
    }
});
