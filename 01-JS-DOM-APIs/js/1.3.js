let monstruos;

async function AlCargar() {
    try {
        monstruos = await fetch('https://www.dnd5eapi.co/api/monsters/', {
                method: "GET",
                headers: {
                    'Content-Type': 'application/json'
                }
            })
            .then(response => response.json());
 
    } catch (error) {
        console.log(error);
        ModificarHtml(null);
    }
}

async function GetMonstruo() {
    let random = parseInt(Math.random() * (500 - 1 + 1) + 1);

    try {
        await fetch('https://www.dnd5eapi.co' + monstruos.results[random].url, {
                method: "GET",
                headers: {
                    'Content-Type': 'application/json'
                }
            })
            .then(response => response.json())
            .then(data => ModificarHtml(data))
    } catch (error) {
        ModificarHtml(null);
    }
}

function ModificarHtml(monstruo) {
    if (monstruo) {
        if (document.getElementById('body').style.color == "red") {
            document.getElementById('body').style.color = "black";
        }
        document.getElementById('pName').innerText = 'Name: ' + monstruo.name;
        document.getElementById('pAlignment').innerText = 'Alignment: ' + monstruo.alignment;
        document.getElementById('pType').innerText = 'Type: ' + monstruo.type;
        document.getElementById('pSize').innerText = 'Size: ' + monstruo.size;
        document.getElementById('pStatStr').innerText = 'STR: ' + monstruo.strength;
        document.getElementById('pStatDex').innerText = 'DEX: ' + monstruo.dexterity;
        document.getElementById('pStatCon').innerText = 'CON: ' + monstruo.constitution;
        document.getElementById('pStatInt').innerText = 'INT: ' + monstruo.intelligence;
        document.getElementById('pStatWis').innerText = 'WIS: ' + monstruo.wisdom;
        document.getElementById('pStatCha').innerText = 'CHA: ' + monstruo.charisma;

    } else {
        document.getElementById('body').style.color = "red";
        document.getElementById('pName').innerText = 'Name: ';
        document.getElementById('pAlignment').innerText = 'Alignment: ';
        document.getElementById('pType').innerText = 'Type: ';
        document.getElementById('pSize').innerText = 'Size: ';
        document.getElementById('pStatStr').innerText = 'STR: ';
        document.getElementById('pStatDex').innerText = 'DEX: ';
        document.getElementById('pStatCon').innerText = 'CON: ';
        document.getElementById('pStatInt').innerText = 'INT: ';
        document.getElementById('pStatWis').innerText = 'WIS: ';
        document.getElementById('pStatCha').innerText = 'CHA: ';
    }
}