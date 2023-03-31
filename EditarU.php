<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuarios</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="css/estilo.css">
  </head>
  <body>
    <div id="principal">
      <nav class="navbar fixed-top" id="nabvar">
        <div class="container-fluid">
          <a class="navbar-brand" href="menujefesoporte.html"><img src="img/logo.jpeg" alt="Bootstrap" width="40" height="40">  Macuin Dashboard</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
            <div class="offcanvas-header">
              <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Jefe de Soporte</h5>
              <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
              <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                <li class="nav-item">
                  <a class="nav-link active" aria-current="page" href="menujefesoporte.html">Menu Principal</a>
                </li>
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Administrar Usuarios
                  </a>
                  <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="ConUser.php">Ver Usuarios</a></li>
                    <li><a class="dropdown-item" href="RegUser.html">Agregar Usuario</a></li>
                  </ul>
                </li>
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Departamentos
                  </a>
                  <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="ConDep.php">Ver Departamentos</a></li>
                    <li><a class="dropdown-item" href="RegDep.html">Registrar Departamento</a></li>
                  </ul>
                </li>
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Tickets
                  </a>
                  <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="ConTic.php">Ver Solicitudes</a></li>
                  </ul>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </nav>
    </div>
    <br>
    <br>
    <br>
    <div>
      <center><h1 class="logo">Editar Usuario</h1></center>
      <div class="content">
        <div class="contact-wrapper">
          <div class="contact-form">
            <form class="reform" action="controlador.php" method="post">
              <p>
                <input name="id" type="hidden" value="<?php echo $_REQUEST['id'];?>" require>
                <label><b>Nombre Usuario:</b></label>
                <input name="name" type="text" value="<?php echo $_REQUEST['nomu'];?>" require>
              </p>
              <p>
                <label><b>Usuario:</b></label>
                <input name="user" type="text" value="<?php echo $_REQUEST['user'];?>" required>
              </p>
              <p>
                <label><b>Correo:</b></label>
                <input name="correo" type="email" value="<?php echo $_REQUEST['mail'];?>" required>
              </p>
              <p>
                <label><b>Contraseña:</b></label>
                <input name="contra" type="password" value="<?php echo $_REQUEST['contra'];?>" required>
              </p>
              <p>
                <label><b>Tipo de Rol:</b></label>
                <select class="form-select" aria-label="Default select example" name="rol">
                    <option><?php echo $_REQUEST['rol'];?></option>
                    <option value="jefe">Jefe de Soporte</option>
                    <option value="auxiliar">Auxiliar de Soporte</option>
                    <option value="cliente">Cliente</option>
                </select>
              </p>
              <p class="block">
                <button name="edit" type="submit" id="btm" class="btn btn-light">Actualizar</button>
              </p>
            </form>
          </div>
        </div>
      </div>
    </div>
    <footer>
      <section id="datos">
        Autores:<br>
        Cervantes Pecina Jonathan Alexis<br>
        Cervantes Pérez Victor Emiliano<br>
        Diaz Carranza Lizbeth Guadalupe
      </section>
      <section id="redes">
        <img src="img/facebook.png" width="15" height="15"> Facebook<br>
        <img src="img/instagram.png" width="15" height="15"> Instagram<br>
        <img src="img/whatsapp.png" width="15" height="15">  Whatsapp
      </section>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  </body>
</html>