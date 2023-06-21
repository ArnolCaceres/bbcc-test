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
    <title>Simulador de cuotas</title>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Mulish&display=swap"
      rel="stylesheet"
    />
    <link rel="icon" href="assets/images/BBCC_icon.ico" />
    <link rel="stylesheet" href="assets/css/mainv2.css" />
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
          Bienvenido (Nombre) !
          <?php echo $_SESSION['user']; ?>
        </p>
      </div>

      <div class="options">
        <!--<ul>
          <li class="active">Ver inmuebles</li>
          <li><a href="verTabla.php">Simulador de cuotas</a></li>
        </ul>-->
        <div class="option1">
          <a href="main.php">Ver inmuebles</a>
        </div>
        <div class="option2">
          <a>Simulador de cuotas</a>
        </div>
      </div>

      <div class="guia">
        <p>
          <i class="fas fa-info-circle"></i>
          <span>Guía de uso</span>
        </p>
      </div>

      <div class="formulario">
        </fieldset>
        <!--<hr>-->
        <table class="tab">
          <tr>
            <td>
              <label for="moneda">Moneda</label>
            </td>
            <td>
              <select id="moneda" name="moneda" required>
                <option value="soles">Soles</option>
                <option value="dolares">Dólares</option>
              </select>
            </td>
          </tr>

          <tr>
            <td>
              <label for="valorvivienda">Valor de Vivienda</label>
            </td>
            <td>
              <input
                type="number"
                id="valorvivienda"
                name="valorvivienda"
                min="0"
                max="1000000000"
                step="100000"
                value="0"
                required
              />
            </td>
          </tr>
          <tr>
            <td>
              <label for="apoyo"
                >¿Ha recibido anteriormente apoyo habitacional?</label
              >
            </td>
            <td>
              <select id="apoyo" name="apoyo" required>
                <option value="1">Sí</option>
                <option value="0">No</option>
              </select>
            </td>
          </tr>
          <tr>
            <td>
              <label for="cuotainicial">Cuota Inicial</label>
            </td>
            <td>
              <input
                type="number"
                id="cuotainicial"
                name="cuotainicial"
                min="0"
                max="100"
                required
              />
            </td>
          </tr>
          <tr>
            <td>
              <label for="per_cuotainicial">% de cuota inicial</label>
            </td>
            <td>
              <!--Se calcula de acuerdo al input-->
              <span id="porcentaje_cuota_inicial"></span>
            </td>
          </tr>
          <tr>
            <td>
              <label for="bonobuenpagador">Bono del Buen Pagador</label>
            </td>
            <td>
              <span id="bono_buen_pagador"></span>
            </td>
          </tr>
          <tr>
            <td>
              <label for="sostenible">¿La vivienda es sostenible?</label>
            </td>
            <td>
              <select id="sostenible" name="sostenible" required>
                <option value="1">Sí</option>
                <option value="0">No</option>
              </select>
            </td>
          </tr>
          <tr>
            <td>
              <label for="totalbbp">Total BBP</label>
            </td>
            <td>
              <span id="totalbbp"></span>
            </td>
          </tr>
          <tr>
            <td>
              <label for="monto" id="montof">Monto a financiar</label>
            </td>
            <td>
              <span id="monto"></span>
            </td>
          </tr>
          <tr>
            <td>
              <label for="tea">Tasa Efectiva Anual</label>
            </td>
            <td>
              <input
                type="number"
                id="tea"
                name="tea"
                min="0"
                max="100"
                step="0.01"
                value="0"
                required
              />
            </td>
          </tr>
          <tr>
            <td>
              <label for="segurod">Seguro de Desgravamen Mensual</label>
            </td>
            <td>
              <input
                type="number"
                id="segurod"
                name="segurod"
                min="0"
                max="100"
                step="0.01"
                value="0"
                required
              />
            </td>
          </tr>
          <tr>
            <td>
              <label for="seguroi">Seguro de Inmueble Anual</label>
            </td>
            <td>
              <input
                type="number"
                id="seguroi"
                name="seguroi"
                min="0"
                max="100"
                step="0.01"
                value="0"
                required
              />
            </td>
          </tr>
          <tr>
            <td>
              <label for="plazo">Plazo (en meses)</label>
            </td>
            <td>
              <input type="number" id="plazo"/>
            </td>
          </tr>
          <tr>
            <td>
              <label for="tcea" id="tcea">Tasa Costo Efectiva Anual</label>
            </td>
            <td>
              <span id="tcea"></span>
            </td>
          </tr>
          <tr>
            <td>
              <label for="cuota" id="cuotam">Cuota Mensual</label>
            </td>
            <td>
              <span id="cuota"></span>
            </td>
          </tr>
        </table>

        <div class="button-container">
          <button id="calculate-btn" class="calculate" onclick="gen_table();">Calcular</button>
          <button id="cancel-btn" class="cancel" onclick="borrar_tabla();">Borrar</button>
        </div>

      </div>

      <section id="tabla-result" class="view">
        <div class="cronograma">
          </fieldset>
          <!--<hr>-->
          <table class="tabla-res">
              <thead>
                  <tr>
                      <td>Periodo</td>
                      <td>Saldo Inicial</td>
                      <td>Amortización</td>
                      <td>Intereses</td>
                      <td>Seguro de Desgravamen</td>
                      <td>Seguro de Inmueble</td>
                      <td>Saldo Final</td>
                      <td>Cuota Mensual</td>
                  </tr>
              </thead>
              <tbody id="tabla-res">
              </tbody>
              <!--
              <tfoot>
                  <tr>
                      <td class="ft">TOTAL</td>
                      <td id="t1"></td>
                      <td id="t2"></td>
                      <td id="t3"></td>
                      <td id="t4"></td>
                      <td id="t5"></td>
                      <td id="t6"></td>
                      <td id="t7"></td>
                  </tr>
              </tfoot>-->
          </table>
        </div>
      </section>

    </main>

    <footer></footer>

    <script src="assets/js/simulador.js"></script>
  </body>
</html>