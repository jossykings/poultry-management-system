const click = document.getElementById("click");
const showform = document.getElementById("showform");

click.addEventListener("click", () => {
    showform.classList.toggle("open");
    if (showform.classList.contains("open")) {
        click.innerText = "close form";
        // showform.classList.remove("open");
    } else {
        click.innerText = "create user";
    }
});
