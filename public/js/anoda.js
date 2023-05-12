const chick_type = document.getElementById("chick_type");
const yield = document.getElementById("yield");
const yieldlabel = document.getElementById("yield_label");
chick_type.addEventListener("click", () => {
    if (chick_type.value == "broilers") {
        yield.setAttribute("type", "number");
        yieldlabel.style.display = "block";
    } else {
        yield.setAttribute("type", "hidden");
        yieldlabel.style.display = "none";
    }
});
