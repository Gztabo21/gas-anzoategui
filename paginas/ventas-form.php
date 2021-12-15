<div class="row">
<div class="col-lg-6">
                <div class="form-wrapper">
                  <form action="#" method="POST" id="form" >
                    <div class="row">
                      <div class="col-6">
                        <div class="input-style-1">
                          <label>Cliente</label>
                          <input type="email" id="email" name="email" placeholder="Email" />
                          <a   data-bs-toggle="modal" data-bs-target="#exampleModal" ><i class="lni lni-user"></i> Nuevo Cliente</a>
                        </div>
                      </div>
                      <!-- end col -->
                      <div class="col-6">
                        <div class="input-style-1">
                          <label> Pago </label>
                          <input type="password" id="contrasena" name="contrasena" placeholder="Password" />
                        </div>
                      </div>
                    </div>
                    <div class="col-12">
                        <div
                          class="
         
                            button-group
                            d-flex
                            justify-content-end
                            flex-wrap
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
                            type="submit"
                          >
                            Crear
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
                          <tbody>
                            <tr>
                              <td>
                                <div class='product'>
                                  <div class='image'>
                                   
                                  </div>
                                  <p class='text-sm'>Bedroom</p>
                                </div>
                              </td>
                              <td>
                              <p class='text-sm text-medium '>1</p>
                              </td>
                              <td>
                                <p class='text-sm'>$345</p>
                              </td>
                              <td>
                              <p class='text-sm'>$345</p>
                              </td>
                              <td>
                                <div class='action justify-content-end'>
                                  <button class='edit'>
                                    <i class='lni lni-pencil'></i>
                                  </button>
                                  <button
                                    class='more-btn ml-10 dropdown-toggle'
                                    id='moreAction1'
                                    data-bs-toggle='dropdown'
                                    aria-expanded='false'
                                  >
                                    <i class='lni lni-more-alt'></i>
                                  </button>
                                  <ul
                                    class='dropdown-menu dropdown-menu-end'
                                    aria-labelledby='moreAction1'
                                  >
                                    <li class='dropdown-item'>
                                      <a href='#0' class='text-gray'>Remove</a>
                                    </li>
                                    <li class='dropdown-item'>
                                      <a href='#0' class='text-gray'>Edit</a>
                                    </li>
                                  </ul>
                                </div>
                              </td>
                            </tr>
                          </tbody>
                        </table>

                      </div>
                    </div>
                    <div class="row">
                      <div class="" id="total">
                        <label>Total</label>
                        <label>$000</label>
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