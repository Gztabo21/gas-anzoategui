<div class="container-fluid" style="margin:1rem auto;" >
<div class="row" >
  <div class="col-6" >
  <a  href="?p=cliente" class="btn btn-primary"><i class="lni lni-chevron-left" ></i> &nbsp;Volver</a>

  </div>
</div>
</div>
<div class="form-wrapper">
                  <form id="formClient" action="./controller/cliente.php" method="POST" >
                  <input type="hidden" id="cliente_id" name="cliente_id" />

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
                     
                     
                      <div class="row">
                          <div class="col-2">
                            
                            <div class="input-style-1">
                              <label>tipo Doc</label>
                              <select class="form-select" id="tipo_documento" name="tipo_documento" aria-label="Default select example">
                                <option value="V">V</option>
                                <option value="E">E</option>
                              </select>
                            </div>
                          </div>
                          <div class="col-10">
                            <div class="input-style-1">
                              <label>Cedula</label>
                              <input type="text" id="cedula" name="cedula" placeholder="123456789" />
                            </div>
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
                      
                      <div class="col-xs-12 col-4">
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