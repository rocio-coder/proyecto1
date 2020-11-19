<!DOCTYPE html>
<html lang="es" dir="ltr">

<head>
  <meta charset="utf-8">
  <title>Hijxs del Campo</title>

  <link rel="stylesheet" href="boostrap/bootstrap.min.css">
  <link rel="stylesheet" href="estilos.css">
  <link rel="stylesheet" href="img">
  <link href="https://fonts.googleapis.com/css2?family=Oxygen&family=Ubuntu:wght@300&display=swap" rel="stylesheet">




</head>

<body>

  <!-- CONTROL+ ALT+ B  https://www.w3schools.com/tags/tag_figure.asp  Users/ro/Desktop/programacion/savada35.jpg-->

  <!-- https://www.w3schools.com/html/html_images.asp-->


  <!-- dentro de seccion lookbook: cambiar el nombre de las clases de noticia + modificar el width
  <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@300&display=swap" rel="stylesheet">

  font-family: 'Ubuntu', sans-serif;-->

  <!-- col: tamaño del celular en adelante , col-lg: tamaño de la computadora col-md: tamaño de tablet-->

  <header>

    <nav class="navbar navbar-expand-lg navbar-light">
      <figure>
        <img id="logo" src="img/plant.png" alt="logoeditado">
      </figure>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="index.html">Inicio</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="actividades.html">Actividades</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="articulo.html">Articulo</a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="contactanos.html">Contactanos</a>
          </li>
        </ul>
      </div>
    </nav>


    <img src=" " alt="">

  </header>
  <?php
  function form_mail($sPara, $sAsunto, $sTexto, $sDe)
  {
      $bHayFicheros = 0;
      $sCabeceraTexto = "";
      $sAdjuntos = "";

      if ($sDe) $sCabeceras = "From:" . $sDe . "\n";
      else $sCabeceras = "";
      $sCabeceras .= "MIME-version: 1.0\n";
      foreach ($_POST as $sNombre => $sValor)
          $sTexto = $sTexto . "\n" . $sNombre . " = " . $sValor;

      foreach ($_FILES as $vAdjunto) {
          if ($bHayFicheros == 0) {
              $bHayFicheros = 1;
              $sCabeceras .= "Content-type: multipart/mixed;";
              $sCabeceras .= "boundary=\"--Separador-de-mensajes--\"\n";

              $sCabeceraTexto = "----Separador-de-mensajes--\n";
              $sCabeceraTexto .= "Content-type: text/plain;charset=iso-8859-1\n";
              $sCabeceraTexto .= "Content-transfer-encoding: 7BIT\n";

              $sTexto = $sCabeceraTexto . $sTexto;
          }
          if ($vAdjunto["size"] > 0) {
              $sAdjuntos .= "\n\n----Separador-de-mensajes--\n";
              $sAdjuntos .= "Content-type: " . $vAdjunto["type"] . ";name=\"" . $vAdjunto["name"] . "\"\n";;
              $sAdjuntos .= "Content-Transfer-Encoding: BASE64\n";
              $sAdjuntos .= "Content-disposition: attachment;filename=\"" . $vAdjunto["name"] . "\"\n\n";

              $oFichero = fopen($vAdjunto["tmp_name"], 'r');
              $sContenido = fread($oFichero, filesize($vAdjunto["tmp_name"]));
              $sAdjuntos .= chunk_split(base64_encode($sContenido));
              fclose($oFichero);
          }
      }

      if ($bHayFicheros)
          $sTexto .= $sAdjuntos . "\n\n----Separador-de-mensajes----\n";
      return (mail($sPara, $sAsunto, $sTexto, $sCabeceras));
  }

  //cambiar aqui el email
  if (form_mail(
      "suarez.rocio96@gmail.com",
      $_POST[asunto],
      "Los datos introducidos en el formulario son:\n\n",
      $_POST[email]
  ))
      echo "<h2>Muchas Gracias. Su mensaje fue enviado con exito</h2>";

  <main class="container">

    <section class="row">

      <h2 class="col-12 p-4" id="gracias">Gracias por su visita!</h2>








    </section>
  </main>






  <footer class="col-12 p-3">
    <p> Direccion: Calle 1620, Ingeniero J. Allan, Provincia de Buenos Aires, Argentina </p>
    <p> Telefono: 4805-0851 </p>
    <p> Estrato </p>

  </footer>




  <script src="boostrap/jquery.min.js" charset="utf-8" !important></script>
  <script src="boostrap/bootstrap.bundle.min.js" charset="utf-8 !important"></script>


</body>

</html>
