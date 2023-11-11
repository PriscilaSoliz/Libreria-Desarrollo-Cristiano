console.log('hola que tal desde abrir_menu_navbar.js');


// // console.log('Hello World');
let bt_abrir_navbar = document.getElementById('bt_abrir_menu');
console.log(bt_abrir_navbar);
let div_navbar1 = document.getElementById('div_despliegue');
let div_navbar2 = document.getElementById('div_contenido');
let span_nombres = document.querySelectorAll('.navbar_nombre');
let ban_navbar = true;

// // console.log(len_links);

bt_abrir_navbar .addEventListener('click', function(){

    // console.log('click en abrir menu');
    if(ban_navbar){
// //         //disminue el tamaño del navbar
//         // console.log('esta en true, ahora se achicara');
        div_navbar1.classList.remove('w-nav-grande');
        div_navbar1.classList.add('w-nav-chico');
        div_navbar2.classList.remove('ml-64');
        div_navbar2.classList.add('ml-14');
        span_nombres.forEach(function(span_nombre){
            span_nombre.classList.add('hidden');
        });
        ban_navbar = false;
        
    }else{
//         //aumenta el tamaño del navbar
//         // console.log('esta en false, ahora se agrandara');
        div_navbar1.classList.remove('w-nav-chico');
        div_navbar1.classList.add('w-nav-grande');
        div_navbar2.classList.remove('ml-14');
        div_navbar2.classList.add('ml-64');
        span_nombres.forEach(function(span_nombre){
            span_nombre.classList.remove('hidden');
        });
        ban_navbar = true;
    }
    // console.log(ban_navbar);

});


const mostrarNombres = () => {
    let span_nomres = document.querySelectorAll('.hh_nombres');
    span_nomres.forEach(e => {
        e.classList.toggle('hidden');
    })
}

//agrandart y disminur la pantalla
let bt_menu = document.getElementById('bt_menu'); //boton menu del nav
let div_despliegue = document.getElementById('div_despliegue'); // este es el div del na
let bool_div_menu = document.getElementById('bool_div_menu').value; //si esta abierto o cerrado
let div_contenido = document.getElementById('div_contenido'); //div del contenmido

bt_menu.addEventListener('click',(e)=>{
    e.preventDefault();
   console.log('le di click!!',bool_div_menu)
   mostrarNombres();
    if(bool_div_menu == 'abierto'){
//cuadno este abierto
       console.log('entre a abierto')
       bool_div_menu = 'cerrado';
        // console.log(div_despliegue)
        div_despliegue.classList.remove('w-64');
        div_despliegue.classList.add('w-14');
    }else{
       console.log('entre a cerrado')
        bool_div_menu = 'abierto'
        div_despliegue.classList.remove('w-14');
        div_despliegue.classList.add('w-64');

    }

})
