<nav class="navbar navbar-expand-lg navbar-dark fixed-top">
  <div class="container">

    <a class="navbar-brand">
      <img src="assets/images/log.png" alt="Logo" width="100" height="75" class="nav_logo">
    </a>

    <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvas" aria-controls="offcanvas">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvas" aria-labelledby="offcanvasLabel">
      <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasLabel">Menú</h5>
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
      </div>
      <div class="offcanvas-body">
        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="index#home">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" aria-current="page" data-bs-toggle="offcanvas" data-bs-target="#offcanvasOfertas" aria-controls="offcanvasOfertas">ofertas</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="about">Nosotros</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="index#tienda">Parcelas</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="index#contacto">Contacto</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="offcanvas" href="#offcanvasVendeTuParcela" role="button" aria-controls="offcanvasVendeTuParcela">
              Vende tu parcela</a>
          </li>
        </ul>
      </div>
    </div>

  </div>
</nav>