function noclick() {
  document.addEventListener('contextmenu', function (e) {
    e.preventDefault();
  });
}

function preloader() {

  $(window).on('load', function () {
    $("#loading").fadeOut(500);
  });

}

function Aos() {
  AOS.init();
}

function Navbar() {

  const navbar = document.querySelector('.navbar');

  window.addEventListener('scroll', () => {
    if (window.scrollY >= 95) {
      navbar.classList.add('scrolled');
    } else {
      navbar.classList.remove('scrolled');
    }
  });

}

function AbrirDetalleProducto(idProducto, urlProducto) {
  var offcanvasDetalle = new bootstrap.Offcanvas(document.getElementById(
    'offcanvasDetalle'));
  offcanvasDetalle.show();

  var nuevaUrl = window.location.origin + window.location.pathname + '?producto=' +
    idProducto;

  if (urlProducto && urlProducto.indexOf('url=') === -1) {
    nuevaUrl += '&url=' + encodeURIComponent(urlProducto);
  }

  window.history.replaceState(null, null, nuevaUrl);

  setTimeout(function () {
    offcanvasDetalle.show();
  }, 100);
}

function exectute() {

  noclick();
  preloader();
  Aos();
  Navbar();

  AbrirDetalleProducto(idProducto, urlProducto);

}

exectute();