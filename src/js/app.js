document.addEventListener('DOMContentLoaded', function (){
    eventListener();
    darkmode();
});

function darkmode(){
    const darkModeBtn = document.querySelector('.dark-mode-btn')

    const darkPreference = window.matchMedia('(prefers-color-scheme: dark)');
    
    // console.log(darkPreference.matches);

    if(darkPreference.matches){
        document.body.classList.add('dark-mode')
    } else{
        document.body.classList.remove('dark-mode')
    }


    darkModeBtn.addEventListener('click', function(){
        document.body.classList.toggle('dark-mode')
    })
}


function eventListener(){
    const mobileMenu = document.querySelector('.mobile-menu');


    mobileMenu.addEventListener('click',responsiveNav);
}

function responsiveNav(){
    const nav = document.querySelector('.navegation');

    if(nav.classList.contains('show')){
        nav.classList.remove('show')
    } else {
        nav.classList.add('show')
    }

    console.log(nav.classList);
}