 function reportDiario(){
    window.open("./report/reporte-diario.php","Reporte Diario" , "width=420,height=300,scrollbars=NO");

}

// end lista de precios.
async function changeGradielInforme(e){
    let selVenta = document.querySelector('#select-tipoVentainforme')
    selVenta.innerHTML = ''; // limpia los nodos hijos
    datos = await getTipoVenta(e.target.checked,'tipoVenta');
    loadDataSelectTipoVentaInforme(datos)
}

function loadDataSelectTipoVentaInforme(data){
    let selVenta = document.querySelector('#select-tipoVentainforme')
    data['data'].forEach( p=>{
        let option = document.createElement('option');
        option.textContent = p.nombre.toUpperCase() ;
        option.value = p.tipo_venta_id;
        selVenta.append(option); 
    })
    selVenta.selectedIndex = 1; // valor por default y comienza desde 0 como primera posicion.
}

async function initialInforme(){
    check = document.querySelector('#granel-informe');
    datos = await getTipoVenta(check.checked,'tipoVenta');
    loadDataSelectTipoVentaInforme(datos)
}

if(document.getElementById('granel-informe')) initialInforme() 