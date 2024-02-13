const edit = (info, index) => {
    let inputField = document.getElementById("nom");
    let occupation = document.getElementById("occupation");
    let rendement = document.getElementById("rendement");

    let btn = document.getElementById("form__submit-btn");

    inputField.textContent = info["nom"];
    inputField.value = info["nom"];

    occupation.value = info["occupation"];

    rendement.value = info["rendement"];

    btn.value = "Update";
    btn.textContent = "Update";

    btn.onclick = (e) => {
        e.preventDefault();
        let inputField = document.getElementById("nom");
        let occupation = document.getElementById("occupation");
        let rendement = document.getElementById("rendement");

        let formData = new FormData();
        formData.append("id", info["id"]);
        formData.append("nom", inputField.value);
        formData.append("occupation", occupation.value);
        formData.append("rendement", rendement.value);

        let obj = {"nom" : inputField.value, "occupation" : occupation.value , "rendement" : rendement.value};

        let url = `../../handler/admin/the_handler.php?mode=u`;
        ajax("POST", url, formData)
            .then((data) => {
                console.log(data)
                popup(data, "popup success");
                updateValue("table", index + 1, "Nom", obj["nom"]);
                updateValue("table", index + 1, "Occupation", obj["occupation"]);
                updateValue("table", index + 1, "Rendement", obj["rendement"]);
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
    let url = `../../handler/admin/the_handler.php?mode=d`;
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
