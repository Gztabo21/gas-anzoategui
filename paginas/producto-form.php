<div class="form-wrapper">
                  <form action="./controller/producto.php" method="POST" id="formProduct" >
                  <input type="hidden" id="productoId" name="productoId" />
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
                          <label>Precio</label>
                          <input type="text" id="precio" name="precioUnitario" placeholder="0.00" />
                        </div>
                      </div>
                      <!-- end col -->
                     
                      <div class="col-12">
                        <div class="input-style-1">
                          <label>Peso</label>
                          <input type="text" id="peso" name="peso" placeholder="0.00" />
                        </div>
                      </div>
                      <!-- end col -->
                      <div class="col-12">
                        <div class="input-style-1">
                          <label>Unidad Metrica</label>
                          <input type="text" id="unidadMetrica" name="unidadMetrica" placeholder="kg" />
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
                            Guardar
                          </button>
                        </div>
                      </div>
                    </div>
                    <!-- end row -->
                  </form>
                  
                </div>