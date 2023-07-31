function Fade() {
    let section =  document.getElementById('sectionHelloWorld');
    let opacity = 0;
    let fadeIn = setInterval(() => {
        console.log(opacity);
         if (opacity >= 1) {
            clearInterval(fadeIn);
         }
         section.style.opacity = opacity;
         opacity += 0.006;
    }, 10);
    
}