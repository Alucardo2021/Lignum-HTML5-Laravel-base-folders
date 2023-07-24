async function buscar(){
    if (document.getElementById('buscador').value != '') {
        console.log(document.getElementById('buscador').value)

        let repositorios = await fetch('https://api.github.com/search/repositories?q='+document.getElementById('buscador').value  , {
            method: "GET",
            tablaHeaders: {
                'Content-Type': 'application/json'
            }
        }).then(response => response.json());     

        /* listarRepositorios(repositorios); */

        crearTablaDeRepositorios(repositorios);
             
    }  
}

function listarRepositorios(repositorios) {
    let lista = document.getElementById('listaDeRepositorios');

    lista.innerHTML = '';

    for (let index = 0; index < repositorios.total_count; index++) {
        lista.innerHTML += '<li class="listItem">'+repositorios.items[index].id+' | '+repositorios.items[index].node_id+' | '+repositorios.items[index].name+'</li>';
                
    } 
    
}


function crearTablaDeRepositorios(repositorios){

    let tablaBody = document.getElementById('tablaBody');
    tablaBody.innerHTML =' ';

    for (let index = 0; index < repositorios.total_count; index++) {
            
        let tablaRow = document.createElement('tr');
        tablaRow.setAttribute('class', 'tablaRow');

        aux = document.createElement('td');
        aux.innerText = repositorios.items[index].id;
        tablaRow.appendChild(aux);
    
        aux = document.createElement('td');
        aux.innerText = repositorios.items[index].name;
        tablaRow.appendChild(aux);
    
        aux = document.createElement('td');
        aux.innerText = repositorios.items[index].node_id;
        tablaRow.appendChild(aux);

        tablaBody.appendChild(tablaRow);

            
    }      
}

function generarTabla(){
    let aux;

    let tabla = document.createElement('table');
    tabla.setAttribute('id', 'tablaRepositorios');

    let tablaBody = document.createElement('tbody');
    tablaBody.setAttribute('id', 'tablaBody');

    let tablaHeader = document.createElement('thead');
    tablaHeader.setAttribute('id', 'tablaHeader');

    aux = document.createElement('th');
    aux.innerText = "ID";
    tablaHeader.appendChild(aux);
    
    aux = document.createElement('th');
    aux.innerText = "Name";
    tablaHeader.appendChild(aux);
    
    aux = document.createElement('th');
    aux.innerText = "Node ID";
    tablaHeader.appendChild(aux);

    tabla.appendChild(tablaHeader);
    tabla.appendChild(tablaBody);
    document.getElementById('listaContainer').appendChild(tabla);

}