// identifier : burger et la nav
let burger, nav;
burger = document.querySelector('#burger');
nav = document.querySelector('nav');
    
// je clique sur le burger
burger.addEventListener('click', () => {
    // je vois la nav SI elle n'est pas déjà en block
    if(nav.style.display == "block"){
        nav.style.display = "none";
    } else {
        nav.style.display = "block";
    }
});
