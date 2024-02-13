window.onload = () => {
    let btn = document.getElementById("form__submit-btn");
    btn.onclick = (e) => {
        e.preventDefault();

        let dateDebut = document.getElementById("date_debut").value;
        let dateFin = document.getElementById("date_fin").value;

        let formData = new FormData();
        formData.append("date_debut", dateDebut);
        formData.append("date_fin", dateFin);

        let url = "../../handler/client/payement_handler.php";  
        let method = "POST";

        ajax(method, url, formData)
            .then((data) =>{
                popup(data, "popup success");
                createTableData(data);
            })
            .catch((err) =>{
                popup(err, "popup error");
            });
    };
};

const createTableData = (data) => {
    let table = document.getElementById("table");
    removeTableBodyRows("table");
    let tBody = document.createElement("tbody");
    table.appendChild(tBody);
    let jsonData = JSON.parse(data);
    for(const data of jsonData){
        let tr = document.createElement("tr");
        tr.innerHTML = `
            <tr>${data['date']}</tr>
            <tr>${data["nom"]}</tr>
            <tr>${data["malus"]}</tr>
            <tr>${data["bonus"]}</tr>
            <tr>${data["poid_minimal"]}</tr>
            <tr>${data["montant"]}</tr>
        `;
        tBody.appendChild(tr);
    }
};