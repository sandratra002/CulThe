const edit = (info, index) => {
    console.log(info);
    let inputField = document.getElementById("cueilleur");
    let occupation = document.getElementById("expense");

    let btn = document.getElementById("form__submit-btn");

    occupation.value = info["salaire"];

    console.log(info);

    setSelectByValue("tea", info.iduser);

    btn.value = "Update";
    btn.textContent = "Update";

    btn.onclick = (e) => {
        e.preventDefault();
        let inputField = document.getElementById("numero");
        let occupation = document.getElementById("expense");
        let tea = document.getElementById("tea");

        let formData = new FormData();
        formData.append("id", info["id"]);
        formData.append("salaire", occupation.value);
        formData.append("cueilleur", tea.value);

        let obj = {"salaire" : occupation.value, "cueilleur" : tea.value};

        let url = `../../handler/admin/salaire_handler.php?mode=u`;
        ajax("POST", url, formData)
            .then((data) => {
                console.log(data)
                popup(data, "popup success");
                updateValue("table", index + 1, "Salaire", obj["salaire"]);
                updateValue("table", index + 1, "Nom", getTextContentByValue("tea", obj["cueilleur"]));
                updateValue("table", index + 1, "IdUser", obj["cueilleur"]);
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
    let url = `../../handler/admin/salaire_handler.php?mode=d`;
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
