function mudar(){
    var exemplo = document.getElementById('linkv');
    var video = document.getElementById('video');
    
var resultado = exemplo.value.replace("watch?v=", "embed/");
var resultado = exemplo.value.replace("shorts/", "embed/");
exemplo.disabled=true;
video.disabled=false; 
video.value=resultado;

}



 function marca(){
 var checkbox = document.getElementById('btnradio1');
 var checkbox2 = document.getElementById('btnradio2');
if(checkbox.checked) {
  window.location.href = "home.php";
}else if(checkbox2.checked) {
  window.location.href ="questoes.php";
} 
 }




    var search = document.getElementById('pesquisar'); 

 search.addEventListener("keydown",
   function  pesq(event){
   if(event.keyCode==37){
    var btn = document.querySelector("#lupa");
    
    searchD();
   } else{
    console.log("nao verificou");
   }

   }); 
   
   function searchD(){
   
    
    window.location ="explorar.php?search="+search.value;
  
  }


 var av = document.getElementById('avancar'); 

 var c1 = document.getElementById('c1');
 var c2 = document.getElementById('c2');
 var c3 = document.getElementById('c3');

 var b1 = document.getElementById('b1');
 var b2 = document.getElementById('b2');
 var b3 = document.getElementById('b3');
 
   function  avanca(){
   if(hasClass(c1, 'active')==true){
    c1.classList.remove('active');
    c2.classList.add('active');
    b1.classList.remove('active');
    b2.classList.add('active');
    
   } else if(hasClass(c2, 'active')==true){

    c2.classList.remove('active');
    c3.classList.add('active');
    b2.classList.remove('active');
    b3.classList.add('active');
   
   }else if(hasClass(c3, 'active')==true){
    c3.classList.remove('active');
    c1.classList.add('active');
  b3.classList.remove('active');
    b1.classList.add('active');  

   } 

   }

   b=document.getElementById('body');

   b.addEventListener("keyup",function(e){
  const KEY_LEFT  = 37;
  const KEY_RIGHT = 39;
  if(e.keyCode==37){
    
    volta();
     
    }
   else if(e.keyCode==39){
    
   avanca(); 
    
   }
  }
);

   function  volta(){
  
   if(hasClass(c1, 'active')==true){
    c1.classList.remove('active');
    c3.classList.add('active');
    b1.classList.remove('active');
    b3.classList.add('active');
   
   } else if(hasClass(c2, 'active')==true){
    c2.classList.remove('active');
    c1.classList.add('active');
    b2.classList.remove('active');
    b1.classList.add('active');

   }else if(hasClass(c3, 'active')==true){
    c3.classList.remove('active');
    c2.classList.add('active');
     b3.classList.remove('active');
    b2.classList.add('active');  
   } 

   }

   function hasClass(elemento, classe) {
    return (' ' + elemento.className + ' ').indexOf(' ' + classe + ' ') > -1;
}

function excluir (conteudo){

  var resultado = confirm("Deseja excluir o item  ?");
    if (resultado == true) {
      var cont=conteudo;
        window.location.href="delete.php?conteudo="+cont+""; 
         
          
    }
    else{
        alert("Você desistiu de excluir ");
    }}

    var el = document.getElementById('list');                
el.addEventListener('click', function(e) {
 
       var c=1;
       
   while(c <=4){

    document.getElementById('a'+c).style.display='none';
   c++;
   } 
   var ele =e.target.id;

document.getElementById('a'+ele).style.display='flex';
   
});
  var i = setInterval(function () {
    
    clearInterval(i);
  
    // faz com que a barra de carregamento pare de carregar
    document.getElementById("loading").style.display = "none";
   

}, 4000);