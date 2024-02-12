window.onload = () => {
  let editBtns = document.getElementsByClassName("edit-btn");
  let deleteBtns = document.getElementsByClassName("delete-btn");

  let values = getTableValues();

  let index = 0;

  const edit = (info) => {
    let inputField = document.getElementById("expense");
    inputField.textContent = info.libelle;
  };

  for (const btn of editBtns) {
    btn.addEventListener("click", (e) => {
        e.preventDefault();
        edit(values[index]);
    });
    index++;
  }
};
