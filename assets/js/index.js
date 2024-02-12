const getTableValues = () =>{
    const table = document.getElementById('table');
    const headers = Array.from(table.querySelectorAll('th')).map(th => th.textContent.toLowerCase());

    const rows = table.querySelectorAll('tr:not(:first-child)'); // Skip header row
    const data = [];

    for (const row of rows) {
        const cells = row.querySelectorAll('td');
        const object = {};
        
        for (let i = 0; i < cells.length; i++) {
            object[headers[i]] = cells[i].textContent;
        }
    
        data.push(object);
    }
    return data;
};

const deleteRow = (tableId, rowIndex) => {
    const table = document.getElementById(tableId);
    if (table && rowIndex >= 0 && rowIndex < table.rows.length) {
      table.deleteRow(rowIndex);
    } else {
      console.error(`Invalid row index: ${rowIndex}`);
    }
  }


function updateValue(tableId, rowIndex, headerLabel, newValue) {
    const table = document.getElementById(tableId);
    if (table && rowIndex >= 0 && rowIndex < table.rows.length) {
      const headerRow = table.rows[0]; // Assume header row is the first row
      const headerCells = headerRow.querySelectorAll('th');
      const cellIndex = Array.from(headerCells).findIndex(cell => cell.textContent === headerLabel);
      if (cellIndex !== -1) {
        const row = table.rows[rowIndex];
        const cellToChange = row.cells[cellIndex];
        cellToChange.textContent = newValue;
      } else {
        console.error(`Header label "${headerLabel}" not found in the table`);
      }
    } else {
      console.error(`Invalid row index: ${rowIndex}`);
    }
}
  
  
  

const ajax = (method, link, formData) =>{
    return new Promise((resolve, reject) =>{
        let xhr = new XMLHttpRequest();

        xhr.onreadystatechange = () =>{
            if(xhr.readyState == 4){
                if(xhr.status == 200){
                    if(xhr.responseText.indexOf("success") != 0){
                        resolve(xhr.responseText);
                    }else{
                        reject(xhr.responseText);
                    }
                }else{
                    reject(xhr.responseText);
                }
            }else{

            }
        }

        xhr.onload = () => {

        };

        xhr.open(method, link);
        xhr.send(formData);
    });
};

const popup = (message, classes) =>{
    let container = document.querySelector("body");
    let popup = document.createElement("div");
    popup.classList = `${classes}`;
    popup.innerHTML = `${message}`;
    container.appendChild(popup);

    setTimeout(() =>{
        container.removeChild(popup)
    }, 3000);
};