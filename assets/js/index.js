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

const ajax = (method, link, formData) =>{
    return new Promise((resolve, reject) =>{
        let xhr = new XMLHttpRequest();

        xhr.onreadystatechange = () =>{
            if(xhr.readyState == 4){
                if(xhr.status == 200){
                    resolve(xhr.responseText);
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
}