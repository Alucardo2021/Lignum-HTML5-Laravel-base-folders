function Fade() {
    let section =  document.getElementById('sectionHelloWorld');
    
    let opacity = 0;
    let fadeIn = setInterval(() => {
         if (opacity >= 1) {
            clearInterval(fadeIn);
         }
         section.style.opacity = opacity;
         opacity += 0.006;
    }, 10);
}

function Alerta(){
    alert("Te estás portando mal, serás castigada...")
}


async function GetSuper(){
    let monstruos = await fetch('https://www.dnd5eapi.co/api/monsters/' , {
        method: "GET",
        headers: {
            'Content-Type': 'application/json'
            // 'Content-Type': 'application/x-www-form-urlencoded',
        }
    })
   .then(response => response.json());


   let section =  document.getElementById('sectionNombres');

   section.innerText=(monstruos.results[parseInt(Math.random() *(334 - 1 + 1) + 1)].name);
}