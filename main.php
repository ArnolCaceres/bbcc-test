<?php
session_start();

if (!isset($_SESSION['mail'])) {
  echo '
        <script>
            alert("Por favor debes iniciar sesión");
            window.location = "index.php";
        </script>
        ';
  session_destroy();
  die();
}
?>

<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Página principal</title>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Mulish&display=swap"
      rel="stylesheet"
    />
    <link rel="icon" href="assets/images/BBCC_icon.ico" />
    <link rel="stylesheet" href="assets/css/mainv1.css" />
    <script
      src="https://kit.fontawesome.com/192123a608.js"
      crossorigin="anonymous"
    ></script>
  </head>
  <body>
    <header>
      <div class="text_logo">BBCC Inmobiliaria</div>
      <div class="userTarget">
        <img src="assets/images/BBCC_logo.png" alt="BBCC Inmobiliaria" />
        <nav>
          <a class="textUser">
            <?php echo $_SESSION['mail']; ?>
          </a>
          <ul>
            <a href="php/cerrar_sesion.php" class="cerrar-sesion"
              >Cerrar sesión</a
            >
          </ul>
        </nav>
      </div>
    </header>

    <main>
      <div class="welcome">
        <p>
          Bienvenido <?php echo $_SESSION['user']; ?>
        </p>
      </div>

      <div class="options">
        <!--<ul>
          <li class="active">Ver inmuebles</li>
          <li><a href="verTabla.php">Simulador de cuotas</a></li>
        </ul>-->
        <div class="option1">
          <a>Ver inmuebles</a>
        </div>
        <div class="option2">
          <a href="simulador.php">Simulador de cuotas</a>
        </div>
      </div>

      <section class="products">
        <!--<h2>Our Products</h2>-->
        <div class="all-products">
          <div class="product">
            <img src="assets/images/houses/inm1.jpg" />
            <div class="product-info">
              <h4 class="product-title">Inmueble 1</h4>
              <p class="product-price">$ 120000</p>
              <a class="product-btn" href="#">Cotizar</a>
            </div>
          </div>
          <div class="product">
            <img src="assets/images/houses/inm2.jpg" />
            <div class="product-info">
              <h4 class="product-title">Inmueble 2</h4>
              <p class="product-price">S/. 79099</p>
              <a class="product-btn" href="#">Cotizar</a>
            </div>
          </div>
          <div class="product">
            <img src="assets/images/houses/inm3.jpg" />
            <div class="product-info">
              <h4 class="product-title">Inmueble 3</h4>
              <p class="product-price">$ 89990</p>
              <a class="product-btn" href="#">Cotizar</a>
            </div>
          </div>
          <!--
          <div class="product">
            <img src="ipad-pro.jpg" />
            <div class="product-info">
              <h4 class="product-title">Inmueble 4</h4>
              <p class="product-price">$629*</p>
              <a class="product-btn" href="#">Cotizar</a>
            </div>
          </div>
          -->
        </div>
      </section>
    </main>

    <footer></footer>
  </body>
</html>
