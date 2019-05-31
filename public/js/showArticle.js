/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
addEventListener('load',function(){
    var head=document.querySelector(' .headTitle');
    var headTitle = head.querySelector('h1');
    var article = document.querySelector('.showArticle');

    window.addEventListener('scroll',function(){

        if (window.scrollY>=170){
            console.log('1');
            head.style.position='fixed';
            head.style.top ='-170px';
            head.style.zIndex ='3';
            headTitle.style.zIndex ='4';
            headTitle.style.top ='40px';
            article.style.marginTop='250px';

        }
        else if (window.scrollY < 170) {
            head.style.position='relative';
            head.style.top='0px';
            article.style.marginTop = '0';
        }





    });
});
