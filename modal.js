let or=document.getElementById('logIn');

let bg=document.getElementById('background');
let toReg=document.getElementById('toSignIn');
let toSign=document.getElementById('toLogIn');
let modalLog=document.getElementById('logInModal');
let modalSign=document.getElementById('signInModal');
let christ=document.getElementsByClassName('christ');

let recover = document.getElementById('recoverPassDiv');
let recoverTxt = document.getElementById('recoverPass') ;



or.addEventListener('click', function(){
    bg.style.visibility='visible';
    modalLog.style.top='20vmax';
})

toReg.addEventListener('click', function(){
    modalLog.style.top='-50vmax';
    modalSign.style.top='20vmax';
})

toSign.addEventListener('click', function(){
    modalLog.style.top='20vmax';
    modalSign.style.top='-50vmax';
})

for(let i=0;i<christ.length;i++){
    christ[i].addEventListener('click', function(){
        modalLog.style.top='-50vmax';
        modalSign.style.top='-50vmax';
        recover.style.top = "-50vmax";
        bg.style.visibility='hidden';
    })
}
bg.addEventListener('click', function(){
    modalLog.style.top='-50vmax';
    modalSign.style.top='-50vmax';
    recover.style.top = "-50vmax";
    bg.style.visibility='hidden';
})

recoverTxt.addEventListener('click', function(){
    modalLog.style.top = "-50vmax";
    recover.style.top = "20vmax";
})