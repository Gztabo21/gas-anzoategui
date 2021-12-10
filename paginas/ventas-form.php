<div class="row">
<div class="col-lg-6">
                <div class="form-wrapper">
                  <form action="#" method="POST" >
                    <div class="row">
                      <div class="col-12">
                        <div class="input-style-1">
                          <label>Cliente</label>
                          <input type="email" id="email" name="email" placeholder="Email" />
                          <a class="btn btn-primary"  data-bs-toggle="modal" data-bs-target="#exampleModal" ><i class="lni lni-user"></i> Nuevo Cliente</a>
                        </div>
                      </div>
                      <!-- end col -->
                      <div class="col-12">
                        <div class="input-style-1">
                          <label>Password</label>
                          <input type="password" id="contrasena" name="contrasena" placeholder="Password" />
                        </div>
                      </div>
                      <!-- end col -->
                      <div class="col-xxl-6 col-lg-12 col-md-6">
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
                      </div>
                      <!-- end col -->
                      <div class="col-xxl-6 col-lg-12 col-md-6">
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

<!-- Modal Formulario cliente -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Gas | Anzoategui</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <div class="form-wrapper">
                  <form action="#" method="POST" >
                    <div class="row">
                      <div class="col-6">
                        <div class="input-style-1">
                          <label>Nombre</label>
                          <input type="text" id="nombre" name="nombre" placeholder="Nombre" />
                        </div>
                      </div>
                      <!-- end col -->
                      <div class="col-6">
                        <div class="input-style-1">
                          <label>Apellido</label>
                          <input type="text" id="apellido" name="apellido" placeholder="Apellido" />
                        </div>
                      </div>
                      <!-- end col -->
                     
                      <div class="col-12">
                        <div class="input-style-1">
                          <label>Cedula</label>
                          <input type="text" id="cedula" name="cedula" placeholder="123456789" />
                        </div>
                      </div>
                      <!-- end col -->
                      <div class="col-12">
                        <div class="input-style-1">
                          <label>Telefono</label>
                          <input type="text" id="telefono" name="telefono" placeholder="Telf:0000" />
                        </div>
                      </div>
                     
                      <!-- end col -->
                     
                      <div class="col-12">
                        <div class="input-style-1">
                          <label>Dirección</label>
                          <input type="text" id="direccion" name="direccion" placeholder="direccion" />
                        </div>
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
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>