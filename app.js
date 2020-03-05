$(document).ready(function () {
  console.log("Jquery esta en funcion");

  // vue
  new Vue({
    el: '#app',
    vuetify: new Vuetify(),

    data: () => ({

    }),

    created () {
       
    },

  });

    const contenedor = document.querySelector('#contenedor');

    document.querySelector('#boton-menu').addEventListener('click', () =>{
    contenedor.classList.toggle('active');
  });
});
