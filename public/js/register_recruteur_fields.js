let recruteurData = document.getElementById("recruteurData");
let postulantData = document.getElementById("postulantData");
let type = document.getElementById("type");

postulantData.style.display = "block";
recruteurData.style.display = "none";

type.addEventListener("change", () => {
    if (type.value == "recruteur") {
        recruteurData.style.display = "block";
        postulantData.style.display = "none";
    } else if (type.value == "postulant") {
        recruteurData.style.display = "none";
        postulantData.style.display = "block";
    } else {
        recruteurData.style.display = "none";
        postulantData.style.display = "block";
    }
});
