const edit = (info, index) => {
    let inputField = document.getElementById("nom");
    let genreField = document.getElementById("tea");
    let birthDateField = document.getElementById("birthday");

    let poidMinimal = document.getElementById("poid_minimal");
    let bonusSuperieur = document.getElementById("bonus_superieur");
    let bonusInferieur = document.getElementById("bonus_inferieur");

    let btn = document.getElementById("form__submit-btn");

    inputField.textContent = info["nom"];
    inputField.value = info["nom"];

    birthDateField.value = info["date de naissance"];

    setSelectByValue("tea", info["genre"]);

    poidMinimal.value = info["poids minimal"];
    bonusInferieur.value = info["mallus"];
    bonusSuperieur.value = info["bonus"];

    btn.value = "Update";
    btn.textContent = "Update";

    btn.onclick = (e) => {
        e.preventDefault();
        let inputField = document.getElementById("nom");
        let genreField = document.getElementById("tea");
        let birthDateField = document.getElementById("birthday");
        let poidMinimal = document.getElementById("poid_minimal");
        let bonusSuperieur = document.getElementById("bonus_superieur");
        let bonusInferieur = document.getElementById("bonus_inferieur");

        let formData = new FormData();
        formData.append("id", info["id"]);
        formData.append("nom", inputField.value);
        formData.append("genre", genreField.value);
        formData.append("birthday", birthDateField.value);
        formData.append("poid_minimal", poidMinimal.value);
        formData.append("bonus_superieur", bonusSuperieur.value);
        formData.append("bonus_inferieur", bonusInferieur.value);
        let genre = ["Homme", "Femme", "N/A"];

        let obj = {"nom" : inputField.value, "genre" : genre[genreField.value-1] , "birthday" : birthDateField.value, "poidMinimal" : poidMinimal.value, "bonusSuperieur" : bonusSuperieur.value, "bonusInferieur" : bonusInferieur.value};
        console.log(obj);

        let url = `../../handler/admin/cueilleur_handler.php?mode=u`;
        ajax("POST", url, formData)
            .then((data) => {
                console.log(data)
                popup(data, "popup success");
                updateValue("table", index + 1, "Nom", obj["nom"]);
                updateValue("table", index + 1, "Genre", obj["genre"]);
                updateValue("table", index + 1, "Date de naissance", obj["birthday"]);
                updateValue("table", index + 1, "Poids Minimal", obj["poidMinimal"]);
                updateValue("table", index + 1, "Bonus Superieur", obj["bonusSuperieur"]);
                updateValue("table", index + 1, "Bonus Inferieur", obj["bonusInferieur"]);
                btn.removeEventListener("click", () => {});
            })
            .catch((error) =>{
                console.log(error);
                popup(error, "popup error");
            })
    };
};

const remove = (info, index) => {
    let formData = new FormData();
    formData.append("id", info["id"]);
    let url = `../../handler/admin/cueilleur_handler.php?mode=d`;
    ajax("POST", url, formData)
        .then((data) => {
            console.log(data)
            popup(data, "popup success");
            deleteRow("table", index + 1);
        })
        .catch((error) =>{
            console.log(error);
            popup(error, "popup error");
        })
};

window.onload = () => {
    let editBtns = document.getElementsByClassName("edit-btn");
    let deleteBtns = document.getElementsByClassName("delete-btn");

    let values = getTableValues();

    let index = 0;

    for (const btn of editBtns) {
        (function(index) { 
            btn.addEventListener("click", (e) => {
                e.preventDefault();
                edit(values[index], index);
            });
        })(index); 
        (function(index) { 
            deleteBtns[index].addEventListener("click", (e) => {
                e.preventDefault();
                remove(values[index], index);
            });
        })(index);
        index++;
    }
    
};
