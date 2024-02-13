const edit = (info, index) => {
    let inputField = document.getElementById("nom");
    let genreField = document.getElementById("tea");
    let birthDateField = document.getElementById("birthday");

    let btn = document.getElementById("form__submit-btn");

    inputField.textContent = info["nom"];
    inputField.value = info["nom"];

    birthDateField.value = info["date de naissance"];

    setSelectByValue("tea", info["genre"]);

    btn.value = "Update";
    btn.textContent = "Update";

    btn.onclick = (e) => {
        e.preventDefault();
        let inputField = document.getElementById("nom");
        let genreField = document.getElementById("tea");
        let birthDateField = document.getElementById("birthday");

        let formData = new FormData();
        formData.append("id", info["id"]);
        formData.append("nom", inputField.value);
        formData.append("genre", genreField.value);
        formData.append("birthday", birthDateField.value);
        let genre = ["Homme", "Femme", "N/A"];

        let obj = {"nom" : inputField.value, "genre" : genre[genreField.value-1] , "birthday" : birthDateField.value};
        console.log(obj);

        let url = `http://localhost/FinalProject/handler/admin/cueilleur_handler.php?mode=u`;
        ajax("POST", url, formData)
            .then((data) => {
                console.log(data)
                popup(data, "popup success");
                updateValue("table", index + 1, "Nom", obj["nom"]);
                updateValue("table", index + 1, "Genre", obj["genre"]);
                updateValue("table", index + 1, "Date de naissance", obj["birthday"]);
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
    let url = `http://localhost/FinalProject/handler/admin/cueilleur_handler.php?mode=d`;
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
