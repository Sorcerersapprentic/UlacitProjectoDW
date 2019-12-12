<?php
$mostrarMensaje = false;
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if(isset($_POST["contact_name"]))
{


    include("includes/data.php");
    $sql    = "INSERT INTO tb_contacto(nombre, email, asunto, mensaje) VALUES (?, ?, ?, ?);";
    $stmt   = $conn->prepare($sql);
    //echo var_dump($stmt);
    $stmt->bind_param("ssss", $_POST["contact_name"], $_POST["contact_email"], $_POST["contact_subject"], $_POST["contact_message"]);
    $stmt->execute();
    //echo $stmt->affected_rows;
    $stmt->close();
    $conn->close();
    $mostrarMensaje = true;

}
echo $mostrarMensaje;
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>La Comarca - Informaci&oacute;n de pedido</title>
<!-- 
Cafe House Template
http://www.templatemo.com/tm-466-cafe-house
-->
  <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,400italic,600,700' rel='stylesheet' type='text/css'>
  <link href='http://fonts.googleapis.com/css?family=Damion' rel='stylesheet' type='text/css'>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="css/font-awesome.min.css" rel="stylesheet">
  <link href="css/templatemo-style.css" rel="stylesheet">
  <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon" />

  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

  </head>
  <body>
    <!-- Preloader -->
    <div id="loader-wrapper">
      <div id="loader"></div>
      <div class="loader-section section-left"></div>
      <div class="loader-section section-right"></div>
    </div>
    <!-- End Preloader -->
    <?php 
	include('includes/navegacion.php');
?>    
   <!-- <section class="tm-welcome-section">
      <div class="container tm-position-relative">
        <div class="tm-lights-container">
          <img src="img/light.png" alt="Light" class="light light-1">
          <img src="img/light.png" alt="Light" class="light light-2">
          <img src="img/light.png" alt="Light" class="light light-3">  
        </div>        
        <div class="row tm-welcome-content">
          <h2 class="white-text tm-handwriting-font tm-welcome-header"><img src="img/header-line.png" alt="Line" class="tm-header-line">&nbsp;Contact Us&nbsp;&nbsp;<img src="img/header-line.png" alt="Line" class="tm-header-line"></h2>
          <h2 class="gold-text tm-welcome-header-2">Cafe House</h2>
          <p class="gray-text tm-welcome-description">Cafe House is free <span class="gold-text">responsive Bootstrap</span> v3.3.5 layout by <span class="gold-text">templatemo</span>. Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculusnec quam felis, ultricies nec, pellentesque eu, pretium quis, sem.</p>
          <a href="#main" class="tm-more-button tm-more-button-welcome">Message Us</a>      
        </div>
        <img src="img/table-set.png" alt="Table Set" class="tm-table-set img-responsive">            
      </div>      
    </section> -->
    <div class="tm-main-section light-gray-bg">
      <div class="container" id="main">
        <section class="tm-section row">
          <h2 class="col-lg-12 margin-bottom-30">Realice sus pedidos</h2>
          <form action="pedido.php" method="post" class="tm-contact-form">
            <div class="col-lg-6 col-md-6">
              <div class="form-group">
                <input type="text" id="client_name" name="client_name" class="form-control" placeholder="NOMBRE CLIENTE" required/>
              </div>
              <div class="form-group">
                <input type="email" id="client_email" name="client_email" class="form-control" placeholder="EMAIL" required/>
              </div>
              <div class="form-group">
                <textarea id="client_listapedido" name="client_message" class="form-control" rows="6" placeholder="Lista de pedido" required></textarea>
              </div>
              <div class="form-group">
                <button class="tm-more-button" type="submit" name="submit">Solicitar pedido</button> 
<?php 
if($mostrarMensaje)
{
	echo("<p>Su pedido ha sido enviado, gracias</p>");
}
?>
              </div>               
            </div>
            <div class="col-lg-6 col-md-6">
              <div id="google-map">
			<img src="img/Tamalasado.jpg" alt="Special" class="tm-special-img img-responsive">  
                  	<a href="#">
                    	<div class="tm-special-description">
                      <h4 class="tm-special-title">Todo lo que quieras para llevar</h4>
	       </div>
            </div> 
          </form>
        </section>
      </div>
    </div> 
     <footer>
      <div class="tm-black-bg">
        <div class="container">
          <div class="row margin-bottom-60">
            <nav class="col-lg-3 col-md-3 tm-footer-nav tm-footer-div">
              <h3 class="tm-footer-div-title">Menu principal</h3>
              <ul>
                <li><a href="#">Principal</a></li>
                <li><a href="#">Acerca de nosotros</a></li>
                <li><a href="#">Blog</a></li>
                <li><a href="#">Nuestros servicios</a></li>
              </ul>
            </nav>
            <div class="col-lg-5 col-md-5 tm-footer-div">
              <h3 class="tm-footer-div-title">Acerca de nosotros</h3>
              <p class="margin-top-15">Somos una empresa familiar apasionada por la cocina, aplicamos lo que aprendimos de nuestras abuelas y siempre poniendo mucho amor en todo lo que hacemos </p>
              <p class="margin-top-15">Puede sentir en nuestro lugar el calor de nuestra familia</p>
            </div>
            <div class="col-lg-4 col-md-4 tm-footer-div">
              <h3 class="tm-footer-div-title">Conoce m&aacute;s de nosotros</h3>
              <p>Redes Sociales en las que nos encontramos</p>
              <div class="tm-social-icons-container">
                <a href="#" class="tm-social-icon"><i class="fa fa-facebook"></i></a>
              </div>
            </div>
          </div>          
        </div>  
      </div>      
      <div>
        <div class="container">
          <div class="row tm-copyright">
           <p class="col-lg-12 small copyright-text text-center">Copyright &copy; 2084 Your Cafe House</p>
         </div>  
       </div>
     </div>
   </footer> Footer content
   <!-- JS -->
   <script type="text/javascript" src="js/jquery-1.11.2.min.js"></script>      <!-- jQuery -->
   <script type="text/javascript" src="js/templatemo-script.js"></script>      <!-- Templatemo Script -->
   <!--<script>
      /* Google map
      ------------------------------------------------*/
      var map = '';
      var center;

      function initialize() {
        var mapOptions = {
          zoom: 16,
          center: new google.maps.LatLng(9.422972, -83.658656),
          scrollwheel: false
        };
        
        map = new google.maps.Map(document.getElementById('google-map'),  mapOptions);

        google.maps.event.addDomListener(map, 'idle', function() {
          calculateCenter();
        });
        
        google.maps.event.addDomListener(window, 'resize', function() {
          map.setCenter(center);
        });
      }

      function calculateCenter() {
        center = map.getCenter();
      }

      function loadGoogleMap(){
        var script = document.createElement('script');
        script.type = 'text/javascript';
        script.src = 'https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false&' + 'callback=initialize';
        document.body.appendChild(script);
      }
      $(document).ready(function(){                
        loadGoogleMap();                
      });
      </script>-->
    </body>
    </html>