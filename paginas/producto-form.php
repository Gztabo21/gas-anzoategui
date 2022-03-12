<div class="container-fluid" style="margin:1rem auto;" >
<div class="row" >
  <div class="col-6" >
  <a  href="?p=producto" class="btn btn-primary"><i class="lni lni-chevron-left" ></i> &nbsp;Volver</a>

  </div>
</div>
</div>
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
                      <!-- <div class="col-6">
                        <div class="input-style-1">
                          <label>Precio</label> -->
                          <input type="hidden" id="precio" name="precioUnitario" value="0" placeholder="0.00" />
                        <!-- </div>
                      </div> -->
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
                          <input type="text" id="unidadMetrica" name="unidadMetrica" placeholder="Ejemplo: kg" />
                        </div>
                      </div>
<!-- lista de precio -->
                      <div class="col-12 ">
                          <input type="checkbox" value="" class="form-check-input" id="granel" name="granel" onChange="changeGradiel(event)" >
                          <label class="form-check-label" for="exampleCheck1">Granel</label>
                      </div>  

                      <div class='table-responsive' style="margin:1rem; max-width:80%;">
                        <table class='table top-selling-table'>
                          <thead>
                            <tr>
                              <th>
                                <h6 class='text-sm text-medium'>Nombre</h6>
                              </th>
                              <th class='min-width'>
                                <h6 class='text-sm text-medium'>
                                  Precio
                                </h6>
                              </th>
                             
                            </tr>
                          </thead>
                          <tbody id="lista-precio">
                          
                      
                          </tbody>
                        </table>
                      </div>
<!-- end lista de precio -->
                     
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