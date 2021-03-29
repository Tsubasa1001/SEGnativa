<?php

    $file = "welcome";

    if (!file_exists($file)) {

        touch($file);

        $fileO = fopen($file, "w+");
        if($fileO){
            fwrite($fileO, '0');
            fclose($fileO);
        }
    }

    $fileO = fopen($file, "r");
    if($fileO){
        $contador = fread($fileO, filesize($file));
        $contador = $contador + 1;
        fclose($fileO);
    }

    $fileO = fopen($file, "w+");
    if($fileO){
        fwrite($fileO, $contador);
        fclose($fileO);
    }
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <title>Nativa | Inicio</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- Estilos Css -->
    <link rel="stylesheet" href="http://segnativa.test/home/css/styles.css">

    <link href="https://fonts.googleapis.com/css?family=Red+Hat+Text:400,500,700&display=swap" rel="stylesheet">

</head>
<body>

  <!-- Ir Arriba -->
  <div class="go-top">
    <span class="fas fa-angle-up"></span>
  </div>

    <!-- Menu de Navegacion -->
    <header id="header">
    <nav class="menu">
     <div class="logo-box">
       <h1><a href="#">Nativa Fisioterapia</a> <img src="http://segnativa.test/home/img/img-1.jpg" alt="" height="30"></h1>
       <span class="btn-menu"><i class="fas fa-bars"></i></span>
     </div>
     
     <div class="list-container">
        <ul class="lists">
            <li><a href="#" class="active">Inicio</a></li>
            <li><a href="#" id="nosotros">Nosotros</a></li>
            <li><a href="#" id="ambiente">Ambiente</a></li>
            <li><a href="#" id="servicios">Servicios</a></li>
            <li><a href="#" id="contacto">Contacto</a></li>
            <li>
            @auth
                <a href="{{ url('/dashboard') }}" class="text-sm text-gray-700 underline">Dashboard</a>
                  Visitas : <b>{{$contador}}</b>
            @else
                <a href="{{ route('login') }}" id="login">
                  Log in
                </a>
                  Visitas : <b>{{$contador}}</b>
            @endauth
            </li>
            
        </ul>
     </div>
    </nav>
 
    <!-- Imagen Header -->
    <div class="img-header">
     <div class="welcome">
       <h1>Bienvenidos a NATIVA <img src="http://segnativa.test/home/img/img-1.jpg" alt="" height="60"></h1>
       <hr>
       <p>Clinica Fisioterapia y Estetica</p>
       
     </div>
    </div>
    
    <div class="skew-abajo"></div>

    </header>

 <main>

    <!-- Acerca de nosotros -->
    <section class="acerca-de">
    <div class="info-container">
      <h1>Acerca de Nosotros</h1>
      <p>Nativa – Fisioterapia & Estética es un Centro especializado en rehabilitación física, estética corporal y facial, con alto profesionalismo, a cargo de Nair Ramírez L., profesional con más de 10 años de experiencia en el mejoramiento de la calidad de vida de pacientes en diferentes instituciones y centros de Santa Cruz de la Sierra. Con una atención personalizada, de alta calidad y calidez humana.</p>
      <p>Todo lo que somos está íntegramente relacionado por el lugar del que venimos. En nuestro caso, somos nativas de un planeta que busca cada día alcanzar el bienestar. Por eso, nuestro compromiso con el mismo, es atender a nuestras raíces para construir mejores días para todos y todas en este mundo cambiante. </p>
      <div class="about-gallery">
        <img src="http://segnativa.test/home/img/img-1.jpg" alt="">
        <img src="http://segnativa.test/home/img/img-2.jpg" alt="">
      </div>

      

    </div>
    </section>

   <!-- Nuestro ambiente laboral -->
   <section class="our-ambiente">
      <div class="skew-arriba"></div>
   <div class="deg-background"></div>
   
   <div class="ejeZambiente">
      <div class="container-ambiente">
        <div class="ambiente-title">
          <h2>Nuestro Ambiente</h2>
          <hr>
        </div>
          <div class="ambiente-img">
            <img src="http://segnativa.test/home/img/theme-1.jpg" alt="">
            <img src="http://segnativa.test/home/img/theme-2.jpg" alt="">
            <img src="http://segnativa.test/home/img/theme-3.jpg" alt="">
            <img src="http://segnativa.test/home/img/theme-4.png" alt="">
            <img src="http://segnativa.test/home/img/theme-5.jpg" alt="">
         </div>
   <div class="skew-abajo"></div>
   </section>

   <!-- Servicios -->
   <section class="servicios">
    <div class="servicios-title">
     <h2>Algunos de nuestros Servicios</h2>
     <hr>
    </div>

     <div class="box-servicio">
      <div class="card-servicio">
        <div class="card-img"><img src="http://segnativa.test/home/img/servicio-1.jpg" alt=""></div>
        <div class="servicio-text">
        <h4>Piel de Porcelana</h4>
        <p>Un tratamiento facial dermocosmético para renovar la piel, disminuye las líneas de expresión, aumento de colágeno y elastina, disminuye las manchas superficiales.</p>
        </div>
      </div>

      <div class="card-servicio">
          <div class="card-img"><img src="http://segnativa.test/home/img/servicio-2.jpg" alt=""></div>
          <div class="servicio-text">
          <h4>Rehabilitacion Neurológica</h4>
          <p>La Fisioterapia Neurológica se encarga de mejorar las funciones del Sistema Nervioso Central y Periférico. El trabajo que realizamos es altamente meticuloso para alcanzar el mayor grado de rehabilitación y así mejorar la calidad de vida de los pacientes.
          </p>
          </div>
        </div>

        <div class="card-servicio">
            <div class="card-img"><img src="http://segnativa.test/home/img/servicio-3.jpg" alt=""></div>
            <div class="servicio-text">
            <h4>Estética facial</h4>
            <p>La Estética Facial nos ayuda a recuperar la salud de la piel, con la nutrición de los tejidos superficiales, promueve hidratación y equilibrio tanto en pieles mixtas, grasas y secas. </p>
            </div>
          </div>

          <div class="card-servicio">
              <div class="card-img"><img src="http://segnativa.test/home/img/servicio-4.png" alt=""></div>
              <div class="servicio-text">
              <h4>Terapia Manual POLD</h4>
              <p>La técnica del Método Pold en Fisioterapia está basada en la movilización pasiva, oscilatoria sobre la columna vertebral, tejidos blandos y articulares. Consigue efectos neurofisiológicos y biomecánicos, disminuye el dolor, desinflama, relaja en pacientes agudos y crónicos.
              </p>
              </div>
            </div>

     </div>
   </section>

 </main> 

 <!-- Footer -->
 <footer class="footer">
   <div class="skew-arriba"></div>
  <div class="deg-footer"></div>
 
  <div class="ejeZfooter">
  <div class="footer-content">
   <div class="footer-title">
     <h2>Contactanos</h2>
     <hr>
   </div>

   <div class="formulario-content">
     <div class="info">
       <a href="https://www.facebook.com/NativaFisio" target="_blank"> <img src="http://segnativa.test/home/img/facebook.png" alt="" height="40"> Nativa - Fisioterapia y estética</a><br><br>
       <a href="https://api.whatsapp.com/send?phone=+59167887132&text=Buenas,%20quisiera%20mas%20información" target="_blank"> <img src="http://segnativa.test/home/img/whatsapp.png" alt="" height="40"> +591  67887132</a><br><br>
       <a href="https://www.google.com/maps/dir/?api=1&destination=-17.75346%2C-63.1689&fbclid=IwAR14Cdep8_Sv1LcgwyU33zVs_sfgJZO5AqTX4EXTwavnTee9rTr1LZeplHE" target="_blank"> <img src="http://segnativa.test/home/img/ubicacion.png" alt="" height="40"> Barrio Hamacas C. 7 Este Bolpebra Nº3315 Santa Cruz de la Sierra, Bolivia</a>
     </div>
   </div>

   <div class="footer-text">
     <p>&copy; NATIVA | Todos los derechos reservados.</p>
   </div>
  
  </div>
</div>
 </footer>

<!-- Scripts -->
<script src="https://kit.fontawesome.com/35db202371.js"></script>
<script src="http://segnativa.test/home/js/app.js"></script>

</body>
</html>