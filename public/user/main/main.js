let btn=document.querySelectorAll('#btn');
let div=document.querySelectorAll('.child');

for(let i=0;btn.length;i++){
    btn[i].onclick=function(){
        div[i].classList.toggle('none');


    }
}
