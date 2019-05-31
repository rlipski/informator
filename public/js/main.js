/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
addEventListener('load',function(){


    //lastAddedTitle.style.display='none';
    var menu=document.querySelector('nav a');
    menu.addEventListener('click',function(){
        menu.classList.toggle('showMenu');
    });
});

