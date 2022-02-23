<a  href="?p=ventas-form" class="btn btn-primary">Nueva</a>


<div
                  class='
                    title
                    d-flex
                    flex-wrap
                    align-items-center
                    justify-content-between
                  '
                >
                  
                  
                </div>
         
                <div class='table-responsive'>
                  <table class='table top-selling-table'>
                    <thead>
                      <tr>
                        <th>
                          <h6 class='text-sm text-medium'>Numero</h6>
                        </th>
                        <th class='min-width'>
                          <h6 class='text-sm text-medium'>
                            cliente
                          </h6>
                        </th>
                        <th class='min-width'>
                          <h6 class='text-sm text-medium'>
                            Estado
                          </h6>
                        </th>
                        <th class='min-width'>
                          <h6 class='text-sm text-medium'>
                            monto
                          </h6>
                        </th>
                        <th>
                          <h6 class='text-sm text-medium'>Fecha</h6>
                        </th>
                        <th>
                          <h6 class='text-sm text-medium'>
                            Actiones 
                          </h6>
                        </th>
                      </tr>
                    </thead>
                    <tbody id="Ventas">
                   
                    </tbody>
                  </table>

                </div>



<!-- Modal Formulario cliente -->
<div class="modal fade" id="Aprobar-Modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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