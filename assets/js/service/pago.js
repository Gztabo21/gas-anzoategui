async function getTipoPago(){
    let url = 'controller/pago.php';
    const resp = await fetch(url);
    let json = await resp.json()
    if(resp.ok){
        return json
    }
}
async function selectTipoPago(){
    let data = await getAll('pago')
 
    let selectTipoPago = document.getElementById('select-tipoPago')
    selectTipoPago.className = "form-select"    
    data.data.forEach( p=>{
             let option = document.createElement('option');
             option.textContent = p.nombre.toUpperCase();
             option.value = p.pago_id;
             selectTipoPago.append(option);
         })
 }
 if( document.getElementById('select-tipoPago') ) selectTipoPago()  
 