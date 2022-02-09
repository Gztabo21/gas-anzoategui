<?php require_once"./layout/head.php" ?>
  
    

      <!-- ========== signin-section start ========== -->
      <section class="signin-section">

          <div class="row g-0 auth-row">
            <div class="col-lg-6">
              <div class="auth-cover-wrapper bg-primary-100">
                <div class="auth-cover">
                  <div class="title text-center">
                    <h1 class="text-primary mb-10">Bievenido al sistema</h1>
                   
                  </div>
                  <div class="cover-image">
                    <img src="assets/images/auth/signin-image.svg" alt="" />
                  </div>
                  <div class="shape-image">
                    <img src="assets/images/auth/shape.svg" alt="" />
                  </div>
                </div>
              </div>
            </div>
            <!-- end col -->
            <div class="col-lg-6">
              <div class="signin-wrapper">
                <div class="form-wrapper">
                  <h6 class="mb-15">inicia Sesion</h6>
                  <p class="text-sm mb-25">
                    sistema administrativo.
                  </p>
                  <form id="form" action="./controller/login.php" method="POST" >
                    <div class="row">
                      <div class="col-12">
                        <div class="input-style-1">
                          <label>Email</label>
                          <input type="email" onkeydown="validarfield(event)" autocomplete="off"  validar="email" id="email" name="email" placeholder="Email" />
                          <p id="messageValidar"></p>
                        </div>
                      </div>
                     
                      <div class="col-12">
                        <div class="input-style-1">
                          <label>Password</label>
                          <input type="password" id="contrasena" name="contrasena" placeholder="Password" />
                        </div>
                      </div>
                      <!-- end col -->
                      <!-- <div class="col-xxl-6 col-lg-12 col-md-6">
                        <div class="form-check checkbox-style mb-30">
                          <input
                            class="form-check-input"
                            type="checkbox"
                            value=""
                            id="checkbox-remember"
                          />
                          <label
                            class="form-check-label"
                            for="checkbox-remember"
                          >
                            Remember me next time</label
                          >
                        </div>
                      </div> -->
                      <!-- end col -->
                      <!-- <div class="col-xxl-6 col-lg-12 col-md-6">
                        <div
                          class="
                            text-start text-md-end text-lg-start text-xxl-end
                            mb-30
                          "
                        >
                          <a href="#0" class="hover-underline"
                            >Forgot Password?</a
                          >
                        </div>
                      </div> -->
                      <div class="col-12">
                      <p id="error-response"></p>
                      </div>
                      <!-- end col -->
                      <div class="col-12">
                        <div
                          class="
                            button-group
                            d-flex
                            justify-content-center
                            flex-wrap
                          "
                        >
                          <button
                            class="
                              main-btn
                              primary-btn
                              btn-hover
                              w-100
                              text-center
                            "
                            
                            type="submit"
                          >
                            Iniciar
                          </button>
                        </div>
                      </div>
                    </div>
                    <!-- end row -->
                  </form>
                  
                </div>
              </div>
            </div>
            <!-- end col -->
          </div>
          <!-- end row -->
        </div>
      </section>
      
      <?php require_once"./layout/footer-main.php" ?>
  
