 setTimeout(function(){
   console.log("Loaded");

   document.querySelector("#close").onclick = function(){
     $.get( "../api.php/usuario/logout", function( data ) {
       window.location.href = `index.html?msg=${data.msg}`; 
});
   }
 }, 1000);
