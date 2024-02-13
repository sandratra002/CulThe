window.onload = () => {
    let btn = document.getElementById("form__submit-btn");
    btn.onclick = () => {
        let dateDebut = document.getElementById("date_debut").value;
        let dateFin = document.getElementById("date_fin").value;

        let formData = new FormData();
        formData.append("date_debut", dateDebut);
        formData.append("date_fin", dateDebut);

        let url = "../../handler/client/resultat_handler.php";  
        let method = "POST";

        ajax(method, url, formData)
            .then((data) =>{

            })
            .catch((err) =>{

            });
    };
};