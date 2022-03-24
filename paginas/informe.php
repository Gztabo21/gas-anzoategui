<?php 
echo"<h2>Informes de Ventas</h2>";?>
<!-- consultas -->
<br />
<br />
<br />
<form action="./report/reportePorCliente.php" method="POST">
<div class="row" >
    <div class="col-4" >
        <input type="checkbox" class="form-check-input" id="granel-informe" name="granel-informe" onChange="changeGradielInforme(event)" >
        <label class="form-check-label" for="exampleCheck1">Granel</label>
    </div>
    <div class="col-4" >
    <select id="select-tipoVentainforme" name="select-tipoVentainforme">

    </select>
    </div>
</div>
<div class="row" >
    <div class="col-5">
        <div class="input-style-1">
            <label>Desde:</label>
            <input type="date" name="desde" id="desde" />
        </div>
    </div>    
    <div class="col-5">
    <div class="input-style-1">
        <label>Hasta:</label>
        <input type="date" name="hasta" id="Hasta" />
        </div>
    </div>        
<div>

<!-- por Clientes -->

<div class="row" >
    <!-- <div class="col-4">
        <div class="input-style-1">
            <select id="select-client" name="select-client" selectedIndex="0">
                <option value="#"> Selecciona un Cliente</option>
            </select>
        </div>
    </div>     -->
    <div class="col-4">
        <div class="input-style-1">
        <label>Cliente:</label>
        <input type="text" name="client" id="cliente" onKeyup="searchByCedula(event)" autocomplete="off" onClick="cleanResultComplete(event)" />
        <input type="hidden" name="select-client" id="valueClient" value="#" onKeyup="searchByCedula(event)" />
        <ul id="resultCompletado" >

        </ul>
        </div>
    </div> 
    <!-- <div class="input-style-1">
        <label>Hasta:</label>
        <input type="date" name="hasta" id="Hasta" />
        </div> -->
    </div>    
    <div class="col-4">
    <div class="button-group d-flex justify-content-center flex-wrap">
        <p></p>
        <input type="submit" value="Consultar" id="consulta" class="btn btn-primary"/>
    </div>
    </div>    
<div>
</form>
<!-- de Hoy -->
