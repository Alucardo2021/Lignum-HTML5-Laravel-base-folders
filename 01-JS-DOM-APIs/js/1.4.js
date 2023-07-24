async function buscar(){
    if (document.getElementById('buscador').value != '') {
        console.log(document.getElementById('buscador').value)

        let repositorios = await fetch('https://api.github.com/search/repositories?q='+document.getElementById('buscador').value  , {
            method: "GET",
            headers: {
                'Content-Type': 'application/json'
            }
        }).then(response => response.json());     

        listarRepositorios(repositorios);
             
    }  
}

function listarRepositorios(repositorios) {
    let lista = document.getElementById('listaDeRepositorios');

    lista.innerHTML = '';

    for (let index = 0; index < repositorios.total_count; index++) {
        lista.innerHTML += '<li class="listItem">'+repositorios.items[index].id+' | '+repositorios.items[index].node_id+' | '+repositorios.items[index].name+'</li>';
                
    } 
    
}
