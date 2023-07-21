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


let monstruos;

async function AlCargar(){
    monstruos = await fetch('https://www.dnd5eapi.co/api/monsters/' , {
        method: "GET",
        headers: {
            'Content-Type': 'application/json'
            // 'Content-Type': 'application/x-www-form-urlencoded',
        }
    })
   .then(response => response.json());
}

async function GetMonstruo(){
   let random = parseInt(Math.random() *(334 - 1 + 1) + 1);

   let monstruo = await fetch('https://www.dnd5eapi.co'+ monstruos.results[random].url , {
    method: "GET",
    headers: {
        'Content-Type': 'application/json'
        // 'Content-Type': 'application/x-www-form-urlencoded',
    }
    })
    .then(response => response.json());

    document.getElementById('pName').innerText ='Name: '+ monstruo.name;
    document.getElementById('pAlignment').innerText ='Alignment: '+ monstruo.alignment;
    document.getElementById('pType').innerText ='Type: '+ monstruo.type;
    document.getElementById('pSize').innerText ='Size: '+ monstruo.size;

   
   console.log(monstruos.results[random])
   console.log(monstruo);
}