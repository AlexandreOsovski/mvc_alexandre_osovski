<nav class="navbar navbar-main mt-3 navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur"
  data-scroll="false">
  <div class="container-fluid py-1 px-3">
    <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item dropdown pe-2 d-flex align-items-center">
          <a href="#" class="nav-link text-white" id="dropdownMenuButton" data-bs-toggle="dropdown"
            aria-expanded="false">
            <i class="fa fa-user me-sm-1" aria-hidden="true"></i>
            <h6 class="d-sm-inline d-none text-white">&nbsp;
              Olá  &nbsp;<?php echo $_SESSION['nome'] ?>
            </h6>
          </a>
          <ul class="dropdown-menu dropdown-menu-end px-2 py-3 me-sm-n4" aria-labelledby="dropdownMenuButton">
            <li class="mb-2">
                <a class="dropdown-item border-radius-md" href="/usuarios/ver?id=<?php echo $_SESSION['id']; ?>">
                  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                 Meu perfil
                </a>
                <a class="dropdown-item border-radius-md" data-bs-toggle="modal" data-bs-target="#ModalSair">
                  <i class="fa fa-sign-out" aria-hidden="true"></i>
                  Sair
                </a>
            </li>
          </ul>
        </li>
        <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
          <a href="#" class="nav-link text-white p-0" id="iconNavbarSidenav">
            <div class="sidenav-toggler-inner">
              <i class="sidenav-toggler-line bg-white"></i>
              <i class="sidenav-toggler-line bg-white"></i>
              <i class="sidenav-toggler-line bg-white"></i>
            </div>
          </a>
        </li>
      </ul>
    </div>
  </div>
</nav>


<?php include(__DIR__ . '/../includes/modal_logout.php'); ?>