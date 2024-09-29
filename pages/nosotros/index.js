let nav=document.getElementById("nav");
let isScrolling;

// Función que se llama cuando el usuario hace scroll
window.addEventListener('scroll', function() {

    clearTimeout(isScrolling);
    nav.style.backgroundColor="rgb(0,0,0,1)";
    nav.style.transition="all 1s";
 

    
    isScrolling = setTimeout(function() {
        
        nav.style.backgroundColor="rgb(0,0,0,0)";
    }, 500); 
});