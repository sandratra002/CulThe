function removeTableBodyRows(tableId) {
  const table = document.getElementById(tableId);
  if (table && table.tBodies.length > 0) {
    const tbody = table.tBodies[0];
    while (tbody.firstChild) {
      tbody.removeChild(tbody.firstChild); // Remove each row
    }
  } else {
    console.error(`Table with ID "${tableId}" not found or has no tbody elements.`);
  }
}

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
        //   table.deleteRow(rowIndex);
        let row = table.rows[rowIndex];
        row.style.display = "none";
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
  
const setSelectByValue = (selectId, value) => {
    const selectElement = document.getElementById(selectId);
  
    if (selectElement) {
      for (const option of selectElement.options) {
        if (option.textContent === value) {
          option.selected = true;
          return; // Success, no need to check further
        }
      }
  
      console.warn(`Option with value "${value}" not found in select "${selectId}".`);
    } else {
      console.error(`Select element with ID "${selectId}" not found.`);
    }
}
  

const ajax = (method, link, formData) =>{
    return new Promise((resolve, reject) =>{
        let xhr = new XMLHttpRequest();

        xhr.onreadystatechange = () =>{
            if(xhr.readyState == 4){
                if(xhr.status == 200){
                    if(xhr.responseText.indexOf("success") >= 0){
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

function getTextContentByValue(selectId, value) {
  const select = document.getElementById(selectId);
  for (const option of select.options) {
    if (option.value === value) {
      return option.textContent;
    }
  }
  return null;
}