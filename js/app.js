'use strict'
const session = document.querySelector('.principal-nav');


async function loadSession(){
  const response = await fetch("/api.php/usuario/session");
  const names = await response.json();

    if(names !== null){

      const close = document.createElement('A');
      close.innerHTML = `Cerrar Sesion`;
      close.setAttribute('id','close');
      close.href = "#";
      session.appendChild(close);

      const user = document.createElement('A');
      user.innerHTML = `${names.name}`;
      session.appendChild(user);

      const closesession = document.querySelector("#close");
      closesession.onclick = function(){
        $.get( "../api.php/usuario/logout", function( data ) {
          window.location.href = `index.html?msg=${data.msg}`;
    });
      }
    }
    else{
      const login = document.createElement('A');
      login.innerHTML = `Logeate`;
      login.href = "../static/login.html"
      session.appendChild(login);


      const registrate = document.createElement('A');
      registrate.innerHTML = `Registrate`;
      registrate.href = "../static/register.html"
      session.appendChild(registrate);

    }
}

loadSession();
