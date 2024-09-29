// let nav=document.getElementById("nav");
// let isScrolling;

// // Función que se llama cuando el usuario hace scroll
// window.addEventListener('scroll', function() {

//     clearTimeout(isScrolling);
//     nav.style.backgroundColor="rgb(0,0,0,1)";
//     nav.style.transition="all 1s";
 

    
//     isScrolling = setTimeout(function() {
        
//         nav.style.backgroundColor="rgb(0,0,0,0)";
//     }, 500); 
// });

let divCyrano=document.getElementById("divCyrano");
let divCaraCruz=document.getElementById("divCaracruz");

divCaraCruz.addEventListener("click", ()=>{

    window.location.href = './pages/eventos/index.html';
})

divCyrano.addEventListener("click", ()=>{

    window.location.href = './pages/eventos/index.html';
})


window.addEventListener("load", function(){
  window.cookieconsent.initialise({
    "palette": {
      "popup": {
        "background": "#000",
        "text": "#fff"
      },
      "button": {
        "background": "#f1d600",
        "text": "#000"
      }
    },
    "theme": "classic",
    "content": {
      "message": "Utilizamos cookies para mejorar tu experiencia en nuestra web.",
      "dismiss": "Aceptar",
      "link": "Leer más",
      "href": "/pages/politicaPrivacidad/index.html"
    }
  });
});
