

/***
 * 
 * 
 * funciones principales
 * 
 * 
 */


function preloader() {

    $(window).on('load', function () {
        $("#loading").fadeOut(500);
    });

}

function load() {

    preloader();


}

/***
 * 
 * 
 * funciones onload
 * 
 * 
 */

$(document).ready(function () {
  const $menuToggle = $('.header_toggle');
  const $navbar = $('.l-navbar');
  const $closeNavButton = $('.close-nav-button'); // Elemento para cerrar la barra de navegación
  
  $menuToggle.click(function () {
  $navbar.toggleClass(
  'show-sidebar'); // Abre o cierra la barra de navegación al hacer clic en el icono de menú
  });
  
  $closeNavButton.click(function () {
  $navbar.removeClass(
  'show-sidebar'); // Cierra la barra de navegación al hacer clic en el botón "Cerrar"
  });
  });


load();