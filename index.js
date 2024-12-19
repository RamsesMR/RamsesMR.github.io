
let range = document.getElementById("customRange1")

range.addEventListener("input", () => {
    document.getElementById("numero").textContent = range.value;
});