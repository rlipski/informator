/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
addEventListener('load',function(){
    var lastAdded=document.querySelector('#latest div');
    var lastAdded2=document.querySelector('#latest .headContentRecipes');
    var lastAddedTitle=lastAdded2.querySelector('h1');

    var mostVisited=document.querySelector('#mostPopular .headContentRecipes');
    var mostVisited2=document.querySelector('#mostPopular div');
    var mostVisitedTitle=mostVisited.querySelector(' h1');

    window.addEventListener('scroll',function(){

        if(lastAdded.getBoundingClientRect().top<=40&&lastAdded.getBoundingClientRect().top>-60){
            lastAddedTitle.style.position='relative';
            lastAddedTitle.style.top='';
        }
        else if(lastAdded.getBoundingClientRect().top>40||lastAdded.getBoundingClientRect().top<=-60){
          lastAddedTitle.style.position='fixed';
          lastAddedTitle.style.top='40px';
        }

         if(lastAdded.getBoundingClientRect().bottom<80&&mostVisited.getBoundingClientRect().top>=35){
         lastAdded2.style.position='fixed';
          lastAdded2.style.top='-170px';
          lastAdded2.style.zIndex='4';
          lastAddedTitle.style.zIndex='1';
          lastAddedTitle.style.visibility='visible';
          lastAddedTitle.style.opacity=1;
        }

        else if(lastAdded.getBoundingClientRect().bottom>=80) {
            lastAdded2.style.position='relative';
            lastAdded2.style.top='0px';
            lastAddedTitle.style.zIndex='4';
            lastAddedTitle.style.opacity=1;
        }
        else {
            lastAdded2.style.position='relative';
            lastAdded2.style.top='250px';
            lastAdded2.style.zIndex='4';
            lastAddedTitle.style.zIndex='4';
            if(mostVisited.getBoundingClientRect().top<100){
                lastAddedTitle.style.opacity=(mostVisited.getBoundingClientRect().bottom/80)-(2.9);
            }
            else{
                lastAddedTitle.style.opacity=1;
            }
        }
        //change from 'ostatnio dodane' to 'najczesciej wybierane'
        if(mostVisitedTitle.getBoundingClientRect().top<=window.innerHeight&&mostVisited.getBoundingClientRect().bottom-60>=window.innerHeight){
            mostVisitedTitle.style.position='fixed';
            mostVisitedTitle.style.bottom='40px';
            mostVisited2.style.zIndex='-1';

        }
        else if(mostVisited.getBoundingClientRect().top<490&&mostVisited.getBoundingClientRect().top>40){

          mostVisitedTitle.style.position='relative';
          mostVisitedTitle.style.bottom='';
          mostVisitedTitle.style.top='';

        }
        else if(mostVisited.getBoundingClientRect().top<-60){
            mostVisitedTitle.style.position='fixed';
            mostVisitedTitle.style.top='40px';
            mostVisited2.style.zIndex = '4';
        }
        else{
          mostVisitedTitle.style.position='relative';
          mostVisitedTitle.style.bottom='';
          mostVisitedTitle.style.top='';
    }

    if(mostVisited2.getBoundingClientRect().bottom<=80&&lastAdded.getBoundingClientRect().bottom<30){
        mostVisited.style.position='fixed';
                mostVisited.style.top='100px';
    }
    if(mostVisited2.getBoundingClientRect().bottom<=80){
        mostVisited.style.position='fixed';
        mostVisited.style.top='-170px';
        mostVisited.style.zIndex='4';
    }
    else{
        mostVisited.style.position='relative';
        mostVisited.style.top='';
        mostVisited.style.zIndex='1';
    }
    });


});

