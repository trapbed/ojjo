let btn=document.getElementsByClassName('btnMore');
let gradient=document.getElementById('gradientOpis');
let text=document.getElementById('btnBottom');

for(let i=0;i<btn.length;i++){
    btn[0].addEventListener('click', function(){
        if(gradient.style.visibility=='visible'){
            gradient.style.visibility='hidden';
            text.style.top='15vmax';
        }
        else{
            gradient.style.visibility='visible';
            text.style.top='13.6vmax';
        }
    })
}

