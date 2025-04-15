let texte = document.querySelectorAll('article');
console.log(texte);

for (let i=0; i<texte.length; i++){
    texte[i].addEventListener('click', function(){
        
        for (let j=0; j<texte.length; j++){
            if (i != j){
                // texte[j].style.overflow="hidden";
                texte[j].style.height="38vh";
            }
        }

        if (this.style.height==="auto"){
            // this.style.overflow="hidden";
            this.style.height="38vh";
        } else {
            // this.style.overflow="visible";
            this.style.height="auto";
        }
    });
}


