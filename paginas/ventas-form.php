
<div class="container-fluid" style="margin:1rem auto;" >
<div class="row" >
  <div class="col-6" >
  <a  href="?p=ventas" class="btn btn-primary"><i class="lni lni-chevron-left" ></i> &nbsp;Volver</a>

  </div>
</div>
</div>

<div class="row">
<div class="col-lg-12">
                <div class="form-wrapper">
                  <form action="#" method="POST" id="formVenta" >
                    <input type="hidden" name="items" />
                    <input type="hidden" id="pedido_id" name="pedido_id" />

                    <div class="row">
                      <div class="col-6">
                        <div class="input-style-1">
                          <label>Cliente</label>
                          
                          <select id="select-client" name="select-client">

                          </select>
                          <!-- <input type="email" id="email" name="email" placeholder="Email" /> -->
                          <!-- <a   data-bs-toggle="modal" data-bs-target="#exampleModal" ><i class="lni lni-user"></i> Nuevo Cliente</a> -->
                        </div>
                      </div>
                      <!-- end col -->
                      <div class="col-6">
                        <div class="input-style-1">
                          <label> Pago </label>
                          <select id="select-tipoPago" name="select-tipoPago" onChange="cambiarTipoPago(event)">
                          </select>
                        </div>
                      </div>
                    </div>
                  </div>    
                    <!-- check -->
                    <div class="row" >
                    <div class="col-4">
                          <input type="checkbox" value="" class="form-check-input" id="granel-venta" name="granel" onChange="changeGradielVenta(event)" >
                          <label class="form-check-label" for="exampleCheck1">Granel</label>
                    </div>
                    <div class="col-4">
                    <div class="input-style-1">
                    <select id="select-listaPrecio" name="select-listaPrecio">

                    </select>
                    </div>
                    </div>
                  </div>
                  <div class="col-4">
                  <div class="mb-3">
                      <label for="refPago" class="form-label">Ref de pago:</label>
                      <input type="text" class="form-control" id="refPago" name="refPago" placeholder="0000-0" disabled>
                    </div>
                  </div>
                    <!-- end check -->
                  <div class="row">
                    <div class="col-12 ">
                        <div
                          class="
         
                            button-group
                            d-flex
                            justify-content-end
                            flex-wrap
                            btns-actions
                          "
                        >
                          <button
                            class="
                              btn
                              primary-btn
                              btn-hover
                              w-10
                              text-center
                            "
                            type="button"
                           onClick="newItem()"
                          >
                            Crear
                          </button>
                          <button
                            class="
                              btn
                              primary-btn
                              btn-hover
                              w-10
                              text-center
                            "
                            type="button"
                           onClick="getData()"
                          >
                            Confirmar
                          </button>
                        </div>
                      </div>
                  <div class="row">
                    <div class='table-responsive'>
                        <table class='table top-selling-table'>
                          <thead>
                            <tr>
                              <th>
                                <h6 class='text-sm text-medium'>Products</h6>
                              </th>
                              <th class='min-width'>
                                <h6 class='text-sm text-medium'>
                                  Cantidad 
                                </h6>
                              </th>
                              <th class='min-width'>
                                <h6 class='text-sm text-medium'>
                                  Precio Unitario 
                                </h6>
                              </th>
                              <th class='min-width'>
                                <h6 class='text-sm text-medium'>
                                  Total 
                                </h6>
                              </th>
                              <th>
                                <h6 class='text-sm text-medium text-end'>
                                  Actions 
                                </h6>
                              </th>
                            </tr>
                          </thead>
                          <tbody id="itemVenta">
                          
                      
                          </tbody>
                        </table>

                      </div>
                    </div>
                    <div class="row">
                      <div class="" id="total">
                        <label>Total</label>
                        <label id="amount">
                          Bs. 0.00
                        </label>
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
                          <label>Direcci??n</label>
                          <input type="text" id="direccion" name="direccion" placeholder="direccion" />
                        </div>
                      </div>
                     
                      <!-- end col -->
                    
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