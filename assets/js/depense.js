const edit = (info) => {
    let inputField = document.getElementById("expense");

    let btn = document.getElementById("form__submit-btn");

    inputField.textContent = info["libelle"];
    inputField.value = info["libelle"];

    btn.value = "Update";
    btn.textContent = "Update";

    btn.onclick = () => {
        let formData = new FormData();
        formData.append("id", info["id"]);
        formData.append("libelle", info["libelle"]);
        let url = `http://localhost/FinalProject/handler/depense_handler.php?mode=u`;
        ajax("POST", url, formData)
            .then((data) => {
                console.log(data)
            })
            .catch((error) =>{
                console.log(error);
            })
    };
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
                edit(values[index]);
            });
        })(index); 
        index++;
    }
    
};
