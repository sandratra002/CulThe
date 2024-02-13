window.onload = () => {
  let url = "../../handler/client/cueillette_handler.php";
  let method = "POST";

  let btn = document.getElementById("form__submit btn");

  btn.onclick = () => {
    let formData = getFormData();
    ajax(method, url, formData)
      .then((data) => {
        popup(data, "popup success");
      })
      .catch((error) => {
        popup(error, "popup error");
      });
  };
};

const getFormData = () => {
  let cueilleur = document.getElementById("cueilleur");
  let data_cueillette = document.getElementById("data_cueillette");
  let parcelle = document.getElementById("parcelle");
  let poids = document.getElementById("poids");

  let formData = new FormData();
  formData.append("cueilleur", cueilleur.value);
  formData.append("data_cueillette", data_cueillette.value);
  formData.append("parcelle", parcelle.value);
  formData.append("poids", poids.value);

  return formData;
};
