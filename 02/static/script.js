document.querySelector("#jmena").addEventListener("change", () => {
    document.querySelector("#login").value = document.querySelector("#jmena").value;
});