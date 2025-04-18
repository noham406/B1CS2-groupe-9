let images = document.querySelectorAll('main article img');
let textes = document.querySelectorAll('main article p');

for (let i = 0; i<images.length; i++){
    images[i].addEventListener('click', function(){
        let img = this.getAttribute('src');
        let a = textes[i].innerHTML;
        let div = document.createElement('div');
        div.setAttribute('id', 'dessus');
        let nouvelleImage = document.createElement('img');
        nouvelleImage.setAttribute('src', img);
        let close = document.createElement('img');
        close.setAttribute('src', 'images/close.png');
        close.setAttribute('id', 'close');
        let p = document.createElement('p');
        p.innerHTML = a;
        div.appendChild(nouvelleImage);
        div.appendChild(close);
        div.appendChild(p);
        document.body.appendChild(div);
        close.addEventListener('click', function(){
            document.body.removeChild(div);
        })

    })
}