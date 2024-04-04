let log=document.getElementById('logInModal');
let sign=document.getElementById('signInModal');

let btn = document.getElementById('logIn');

let x = document.getElementById('christ');

function check(){


    // alert(window.getComputedStyle(log).top);


}
// alert(window.getComputedStyle(log).top);

// if(window.getComputedStyle(log).top == '-768px'){
//     alert(window.getComputedStyle(log).top);
// }
// else{
//     alert(window.getComputedStyle(log).top);
// }
btn.addEventListener('click', check());
x.addEventListener('click', check());
// const login = document.getElementById('logins');
// const pass = document.getElementById('password');


// login.addEventListener('submit', function (){

// })



const input1 = document.getElementById('login');

function onBlur(){
    for(elem of input1){
        if(elem.value.trim()===""){
            elem.style.borderColor = "red";
        }
        else{
            elem.style.borderColor="blue";
        }
    }
}
for(elem of input1){
    input1.addEventListener('blur', onBlur);
}

// let k = document.getElementsByClassName