const edit = (info, index) => {
    console.log(info);
    let inputField = document.getElementById("numero");
    let occupation = document.getElementById("occupation");
    let tea = document.getElementById("tea");

    let btn = document.getElementById("form__submit-btn");

    inputField.value = info["numero parcelle"];

    occupation.value = info["surface en ha"];

    setSelectByValue("tea", info["type de plantation"]);

    btn.value = "Update";
    btn.textContent = "Update";

    btn.onclick = (e) => {
        e.preventDefault();
        let inputField = document.getElementById("numero");
        let occupation = document.getElementById("occupation");
        let tea = document.getElementById("tea");

        let formData = new FormData();
        formData.append("id", info["id"]);
        formData.append("numero", inputField.value);
        formData.append("surface", occupation.value);
        formData.append("variete", tea.value);

        let obj = {"numero" : inputField.value, "surface" : occupation.value, "variete" : tea.value};

        let url = `../../handler/admin/parcelle_handler.php?mode=u`;
        ajax("POST", url, formData)
            .then((data) => {
                console.log(data)
                popup(data, "popup success");
                updateValue("table", index + 1, "Numero parcelle", obj["numero"]);
                updateValue("table", index + 1, "Surface en Ha", obj["surface"]);
                updateValue("table", index + 1, "Type de plantation", getTextContentByValue("tea", obj["variete"]));
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
    let url = `../../handler/admin/parcelle_handler.php?mode=d`;
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
