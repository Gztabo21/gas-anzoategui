<?php 
    require_once'./layout/head.php' ;
    $username ="Fares Figueroa";
    //require_once'./config/conexion.php';
    //$conex= new conexion();
    
    //var_dump($conex->conect());
    $pagina = isset($_GET['p']) ? strtolower($_GET['p']) : 'inicio';
    $url = './paginas/'.$pagina.'.php';
    
    include('./layout/sidebar-nav.php');
    
    echo"<main class='main-wrapper'>";
   include('./layout/header.php');
  include('./layout/history-url.php');
 
          echo"<div class='row'>          
            <div class='col-lg-12'>
              <div class='card-style mb-30'>";
               include($url);
            echo"  </div>
            </div>
            
          </div>
        
        </div>
 
      </section>";
 

      include('./layout/footer.php');
      include('./layout/footer-main.php');
//   echo"
//     </main>

//     <script src=\"assets/js/bootstrap.bundle.min.js\"></script>
//     <script src=\"assets/js/Chart.min.js\"></script>
//     <script src=\"assets/js/dynamic-pie-chart.js\"></script>
//     <script src=\"assets/js/moment.min.js\"></script>
//     <script src=\"assets/js/fullcalendar.js\"></script>
//     <script src=\"assets/js/jvectormap.min.js\"></script>
//     <script src=\"assets/js/world-merc.js\"></script>
//     <script src=\"assets/js/polyfill.js\"></script>
//     <script src=\"assets/js/main.js\"></script>

//   </body>
// </html>";
