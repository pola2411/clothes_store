let btn=document.querySelectorAll('#btn');
let div=document.querySelectorAll('.child');
let  li=document.querySelectorAll('#view_color');
let redio=document.querySelectorAll('#redio');
let li_size=document.querySelectorAll('#view_size');
let radio_size=document.querySelectorAll('#radio_size');





for(let i=0;i<btn.length;i++){
    btn[i].onclick=function(){
        div[i].classList.toggle('none');


    }
}



for(let i=0;i<li.length;i++){

    li[i].onclick=function(){
        redio[i].checked=true;
        if(redio[i].checked==true){

            li[i].classList.add('toggle_li');
            for(let n=0;n<redio.length;n++){
                if(redio[n].checked==false){
                    li[n].classList.remove('toggle_li');
                }

            }

        }



    }
}




for(let i=0;li_size.length;i++){

    li_size[i].onclick=function(){
        radio_size[i].checked=true;
        if(radio_size[i].checked==true){

            li_size[i].classList.add('toggle_li');
            for(let n=0;radio_size.length;n++){
                if(radio_size[n].checked==false){
                    li_size[n].classList.remove('toggle_li');
                }

            }

        }



    }
}




