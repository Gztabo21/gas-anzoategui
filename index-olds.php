
<?php
    $username = 'Gustavo';
    require_once'./layout/head.php';
   
    // <!-- ======== main-wrapper start =========== -->
    echo"<main class='main-wrapper'>";
    require_once'./layout/header.php';
    require_once'./layout/sidebar-nav.php';
     require_once'./layout/history-url.php';  
         
          echo"<div class='row'>
            <div class='col-lg-12'>
              <div class='card-style mb-30'>";
              require_once 'paginas/'+$pagina+'.php'; 
         echo"     </div>
            </div>
          </div>
        </div>
      </section>";

      require_once'./layout/footer.php'; 
    echo"</main>";
    require_once'./layout/footer-main.php';
    