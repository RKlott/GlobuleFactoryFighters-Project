document.querySelector("#schedule").addEventListener("change", function() {
    let fileName = this.files[0] ? this.files[0].name : "Aucun fichier sélectionné";
    document.querySelector(".file-name").textContent = fileName;
});
