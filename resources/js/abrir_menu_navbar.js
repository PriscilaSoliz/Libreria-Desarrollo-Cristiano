console.log('hola que tal desde abrir_menu_navbar.js');
console.log(window.innerWidth);

// // console.log('Hello World');
let bt_abrir_navbar = document.getElementById('bt_abrir_menu');
console.log(bt_abrir_navbar);
let div_navbar1 = document.getElementById('div_despliegue');
let div_navbar2 = document.getElementById('div_contenido');
let span_nombres = document.querySelectorAll('.navbar_nombre');
let ban_navbar = true;

// // console.log(len_links);

bt_abrir_navbar .addEventListener('click', function(){
    if(window.innerWidth < 640){
abrir_navbar_pantalla_pequenio();
    }else{
  abrir_navbar_pantalla_grande();

    }
});

const abrir_navbar_pantalla_pequenio = () => {

 console.log('click en abrir menu patnalla pequnio');
    if(ban_navbar){
        //cerrar el navbar
        console.log('enter a cerrar ');
        div_navbar1.classList.remove('block');
        //qeu el navbar1 sea grande, seria crar otra variable
        div_navbar1.classList.add('hidden');
        ban_navbar = false;
    }else{
        console.log('enter a abrir ');
           div_navbar1.classList.remove('hidden');
          div_navbar1.classList.add('block');
          //coregir xd xd
        div_navbar2.classList.remove('ml-64');
        div_navbar2.classList.remove('ml-14');
        div_navbar2.classList.add('ml-0');
        ban_navbar = true;
    }
}



const abrir_navbar_pantalla_grande = () => {
 console.log('click en abrir menu patnalla grande');
 if(ban_navbar){
    // //         //disminue el tamaño del navbar
    //         // console.log('esta en true, ahora se achicara');
            div_navbar1.classList.remove('w-nav-grande');
            div_navbar1.classList.add('w-nav-chico');
            div_navbar2.classList.remove('sm:ml-64');
            div_navbar2.classList.add('sm:ml-14');
            span_nombres.forEach(function(span_nombre){
                span_nombre.classList.add('hidden');
            });
            ban_navbar = false;

        }else{
    //         //aumenta el tamaño del navbar
    //         // console.log('esta en false, ahora se agrandara');
            div_navbar1.classList.remove('w-nav-chico');
            div_navbar1.classList.add('w-nav-grande');
            div_navbar2.classList.remove('sm:ml-14');
            div_navbar2.classList.add('sm:ml-64');
            span_nombres.forEach(function(span_nombre){
                span_nombre.classList.remove('hidden');
            });
            ban_navbar = true;
        }
        // console.log(ban_navbar);

}

