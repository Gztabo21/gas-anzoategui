<div class="container-fluid" style="margin:1rem auto;" >
<div class="row" >
  <div class="col-6" >
  <a  href="?p=usuario" class="btn btn-primary"><i class="lni lni-chevron-left" ></i> &nbsp;Volver</a>

  </div>
</div>
</div>
<!-- formulario -->

<div class="col-lg-6">
              <div class="signup-wrapper">
                <div class="form-wrapper">
                  <form id="formUsuario" action="./controller/usuario.php" method="post" >
                  <input type="hidden" name="usuario_id" id="usuario_id" />
                    
                  <div class="row">
                      <div class="col-12">
                        <div class="input-style-1">
                          <label>Name</label>
                          <input type="text" placeholder="Name" name="nombre_completo" id="nombre_completo" />
                        </div>
                      </div>
                      <div class="col-12">
                        <div class="input-style-1">
                          <label>Cedula</label>
                          <input type="text" name="cedula" id="cedula" placeholder="cedula" />
                        </div>
                      </div>
                      <!-- end col -->
                      <div class="col-12">
                        <div class="input-style-1">
                          <label>Email</label>
                          <input type="email" placeholder="Email" name="email" id="email" />
                        </div>
                      </div>
                      <!-- end col -->
                      <div class="col-12">
                        <div class="input-style-1">
                          <label>Password</label>
                          <input type="password" placeholder="Password" name="contrasena" id="contrasena" />
                        </div>
                      </div>
                      <!-- end col -->
                    
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
                            Registrar
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
        

<!-- end formulario -->