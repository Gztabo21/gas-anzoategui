  
  
  <!-- ======== sidebar-nav start =========== -->
  <aside class="sidebar-nav-wrapper">
      <div class="navbar-logo">
        <a href="index.html">
          <img src="./assets/images/logo/logo.png" alt="logo" width="80px;" />
        </a>
      </div>
      <nav class="sidebar-nav">
        <ul>
          
          <li class="nav-item  <?php echo $pagina == 'inicio' ? 'active' : '' ?>">
            <a href="?p=inicio">
              <span class="icon">
              <i class="lni lni-home"></i>
              </span>
              <span class="text">Inicio</span>
            </a>
          </li>
          <!-- ventas -->
          <li class="nav-item <?php echo $pagina == 'ventas' ? 'active' : '' ?>">
            <a href="?p=ventas">
              <span class="icon">
              <i class="lni lni-cart-full"></i>
              </span>
              <span class="text">Ventas</span>
            </a>
          </li>
          <li class="nav-item <?php echo $pagina == 'cliente' ? 'active' : '' ?>">
            <a href="?p=cliente">
            <span class="icon">
              <i class="lni lni-user"></i>
            </span>
              <span class="text">cliente</span>
            </a>
          </li>
          <li class="nav-item <?php echo $pagina == 'producto' ? 'active' : '' ?>">
            <a href="?p=producto">
            <span class="icon">
            <i class="lni lni-candy"></i>
            </span>
              <span class="text">Productos</span>
            </a>
          </li>
          <span class="divider"><hr /></span>
          <li class="nav-item  <?php echo $pagina == 'informe' ? 'active' : '' ?>">
            <a href="?p=informe">
              <span class="icon">
              <i class="lni lni-empty-file"></i>
              </span>
              <span class="text">Informe</span>
            </a>
          </li>
          <li class="nav-item  <?php echo $pagina == 'usuarios' ? 'active' : '' ?>">
            <a href="?p=usuario">
              <span class="icon">
              <i class="lni lni-users"></i>
              </span>
              <span class="text">Usuarios</span>
            </a>
          </li>
          
        </ul>
      </nav>
      
    </aside>
    <div class="overlay"></div>
    <!-- ======== sidebar-nav end =========== -->
