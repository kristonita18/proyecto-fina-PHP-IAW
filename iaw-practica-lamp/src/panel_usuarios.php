<?php
session_start();

if ($_SESSION['logincorrecto'] != 1) {
  $_SESSION['logincorrecto'] = 0;
  header('Location: login.php');
}


include_once("config.php");

$result = mysqli_query($mysqli, "SELECT id AS id_usuario, name AS nombre_usuario, age AS edad_usuario, email AS email_usuario FROM users");
?>



<!doctype html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <title>Panel de control</title>



    
<link href="../css/bootstrap.min.css" rel="stylesheet">


    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
    
    <link href="../css/dashboard.css" rel="stylesheet">
  </head>
  <body>
    <nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow">
  <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="index.php">Proyecto IAW</a>
  <input class="form-control form-control-dark w-100" type="text" placeholder="Buscar" aria-label="Search">
  <ul class="navbar-nav px-3">
    <li class="nav-item text-nowrap">
      <a class="nav-link" href="logout.php">Salir</a>
    </li>
  </ul>
</nav>

<div class="container-fluid">
  <div class="row">
    <nav class="col-md-2 d-none d-md-block bg-light sidebar">
      <div class="sidebar-sticky">
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link" href="panel.php">
              <span data-feather="home"></span>
              Productos <span class="sr-only">(current)</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="#">
              <span data-feather="shopping-cart"></span>
              Usuarios
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="panel_fabricantes.php">
              <span data-feather="users"></span>
              Fabricantes
            </a>
          </li>
        </ul>
      </div>
    </nav>

    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
      
      <h2>Panel de Usuarios <a href="new_usuario.php" class="btn btn-sm btn-outline-secondary">Añadir</a></h2>
      <div class="table-responsive">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th>Nombre</th>
              <th>Edad</th>
              <th>Email</th>
              <th></th>
            </tr>
          </thead>
          <tbody>
        <?php
	        while($res = mysqli_fetch_array($result)) {
        ?>
            <tr>
              <td><?php echo utf8_encode($res['nombre_usuario']);?></td>
              <td><?php echo utf8_encode($res['edad_usuario']);?></td>
              <td><?php echo $res['email_usuario'];?></td>
              <td><a href="edit_usuario.php?codigo_usuario=<?php echo $res['id_usuario'];?>" class="btn btn-sm btn-outline-secondary">Editar</a> <a href="eliminar_usuario.php?codigo_usuario=<?php echo $res['id_usuario'];?>" class="btn btn-sm btn-outline-secondary">Eliminar</a></td>
            </tr>
        <?php    
        }
        mysqli_close($msqli);
	      ?>
          </tbody>
        </table>
      </div>
    </main>
  </div>
</div>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
      <script>window.jQuery || document.write('<script src="/docs/4.3/assets/js/vendor/jquery-slim.min.js"><\/script>')</script><script src="/docs/4.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-xrRywqdh3PHs8keKZN+8zzc5TX0GRTLCcmivcbNJWm2rs5C8PRhcEn3czEjhAO9o" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.9.0/feather.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.min.js"></script>
        <script src="dashboard.js"></script></body>
</html>