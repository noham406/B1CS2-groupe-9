let table1, table2, tableau1, tableau2;
bouton1 = document.querySelector('#bouton1');
bouton2 = document.querySelector('#bouton2');
tableau1 = document.querySelector('#tableau1');
tableau2 = document.querySelector('#tableau2');

bouton1.addEventListener('click', function() {
    if (tableau1.style.display == "block") {
      tableau1.style.display = "none";
    } else {
      tableau1.style.display = "block";
      tableau2.style.display = "none";
    }
});

bouton2.addEventListener('click', function() {
    if (tableau2.style.display == "block") {
      tableau2.style.display = "none";
    } else {
      tableau2.style.display = "block";
      tableau1.style.display = "none";
    }
});