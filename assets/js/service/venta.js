// constantes
const item = [];
let idFila = 0;
let productos = [];
let producto ;
let precioProducto = 0.00 ;
let total = 0.00;
moment.locale('es');
 
const itemVenta = document.getElementById('itemVenta');
 
// icon
const checkIcon = document.createElement('i');
   checkIcon.className ="lni lni-checkmark";
const banIcon = document.createElement('i');
   banIcon.className ="lni lni-ban";
//end icon
// inicial
 
const productSelected = async (e) =>{
   let tipoVenta = document.querySelector("#select-listaPrecio");
   console.log(tipoVenta.value);
   let productoId = e.target.value;
 
   let listaPrecio = await getListaPrecioPorProductoytipoVenta(e.target.value,tipoVenta.value)
   console.log(listaPrecio['data'][0].precio);
   producto = productos.find(p => p.productoId == productoId)
   // console.log(producto);
   let precioNew = document.getElementById('precio_new');
   let subtotal = document.querySelector('#subtotal');
   // console.log(precioProducto);
   qty.value = 1;
   precioProducto = listaPrecio['data'][0].precio;
   precioNew.textContent = listaPrecio['data'][0].precio;
   subtotal.textContent = listaPrecio['data'][0].precio;
 
}
//validacion de numero
const onlyNumber = (ev)=>{
   let keyPermitido = [96,97,98,99,100,101,102,103,104,105,46,8]
   console.log(ev)
   if(!keyPermitido.includes(ev.keyCode)){
       console.log('soy el numero:',ev.key);
       //qty.value = qty.values
       return false   
   }
}
// select
const select = document.createElement('select');
select.className ="form-select";
select.id ="ventas-productos"
let option = document.createElement('option');
option.value = 0;
option.textContent = "Seleccione producto";
select.append(option);
select.addEventListener('change',productSelected)
 
 
 
const onChangeQty = (event)=>{
   let subtotal = document.getElementById('subtotal');
   let precioNew = document.getElementById('precio_new');
   subtotal.textContent = eval(event.target.value * precioNew.textContent );
}
 
const qty  = document.createElement('input');
qty.type='number';
qty.min = 1;
qty.max = 100;
qty.addEventListener('change',onChangeQty)
 
async function getProductos(){
   let isGranel = document.querySelector('#granel-venta');
   const {data} = await getAll('producto');
   let boolean = {0:false,1:true}
   console.log(data);
   productos = data
   productos.forEach( p=>{
       if(boolean[p.isGranel]===isGranel.checked){       
       let option = document.createElement('option');
       option.textContent = `${p.nombre} ${p.peso} ${p.unidadMetrica}`;
       option.value = p.productoId;
       select.append(option);
       }
   })
}
 
function confirmDeleteItemVenta(e){
   let confirm = window.confirm(e.target.message);
   let row = document.getElementById(`row-${e.target.id}`)
   if(confirm){
       itemVenta.removeChild(row);
       updateTotal(e.target.amount,'-');
   }
 
}
 
const confirmItem = () =>{
   let subtotal = document.getElementById('subtotal');
   let precioNew = document.getElementById('precio_new');
 
   let buttonDelete = d.createElement('button');
   buttonDelete.className ="btn btn-danger";
   buttonDelete.textContent = "Eliminar";
 
   buttonDelete.dataValue = "producto"; // vista lista del modulo de producto
   buttonDelete.message = `Desea eliminar el producto ${producto.nombre}`;
   buttonDelete.type = "button"
   buttonDelete.id = idFila;
   buttonDelete.addEventListener('click',confirmDeleteItemVenta)
   let fila =  document.createElement('tr');
   fila.id = `row-${idFila}`;
   let name = document.createElement('td')
   let cantidad = document.createElement('td')
   let precio = document.createElement('td')
   let subTotal = document.createElement('td')
   subtotal.id = `precio_subtotal`
   let actionbtn = document.createElement('td')
   name.textContent = producto.nombre;
   name.productoId = producto.productoId;
   cantidad.textContent = qty.value;
   precio.textContent = precioNew.textContent;
   subTotal.textContent = subtotal.textContent;
   buttonDelete.amount = subtotal.textContent;
   actionbtn.append(buttonDelete);
   fila.append(name,cantidad,precio,subTotal,actionbtn)
   itemVenta.append(fila);
   idFila =idFila+1;
   let filad = document.getElementById('edited');
   filad.remove();
   updateTotal(subtotal.textContent,'+');
   qty.value = 1;
  
 
}
 
const deleteItem = () =>{
   let confirm = window.confirm('Desea eliminar el item');
   let filad = document.getElementById('edited');
    if(confirm){
        filad.remove();
    }
}
 
function updateTotal(amount , operador){
   total = eval( `${amount}${operador} ${total}`);
   let totalA = document.querySelector("#amount");
   totalA.textContent = total < 0 ? (-1 * total) : total;
}
 
function newItem(){
   if(!document.getElementById('edited')){
       getProductos()
       let fila = document.createElement('tr')
       fila.id = "edited";
       fila.nodeValue ="edited"
       let name = document.createElement('td')
       let cantidad = document.createElement('td')
       let precio = document.createElement('td')
       let subTotal = document.createElement('td');
       subTotal.id ="subtotal"
       let actionbtn = document.createElement('td')
       actionbtn.className ="btns-actions"
      
       let btnAccept = document.createElement('button');
       btnAccept.className ="btn btn-success";
       btnAccept.append(checkIcon);
       btnAccept.type ="button"
       btnAccept.addEventListener('click',confirmItem)
 
       let btnStop = document.createElement('button');
       btnStop.className ="btn btn-danger";
       btnStop.append(banIcon);
       btnStop.type = "button";
       btnStop.addEventListener('click',deleteItem)
 
       actionbtn.append(btnAccept,btnStop)
 
       name.append(select);
       qty.value = 1;
       cantidad.append(qty);
 
       precio.id="precio"+"_new";//append(input_precio);
       precio.textContent = precioProducto;
       subTotal.textContent = precioProducto;
      
       fila.append(name,cantidad,precio,subTotal,actionbtn);
       itemVenta.append(fila);
   }
}
 
// if( document.getElementById('itemVenta') ) itemsVenta() 
 
// construir data a enviar a la PHP y luego DDBB
function getData(){
   let parent = itemVenta.children;
   let nameCol = {0:"producto_id",1:"cantidad",2:"precio_unitario",3:"total"}
   let item = [];
   let selectClient = document.querySelector("#select-client");
   let selectPago = document.querySelector("#select-tipoPago");
   let isGranel = document.querySelector("#granel-venta");
   let tipoOrder = document.querySelector("#select-listaPrecio");
   let refPago = document.querySelector("#refPago");
  
   for(let i = 0 ; i <= parent.length-1 ; i++){
 
       let row = {"producto_id":null,"cantidad":null,"precio_unitario":null,"total":null};
       for(let y=0; y <= parent[i].children.length -1 ; y++ ){
           if(parent[i].children[y].children.length == 0){
               if(parent[i].children[y].productoId){
                   row[nameCol[y]] = parseInt(parent[i].children[y].productoId)
 
               }else{
                   row[nameCol[y]] = parseInt(parent[i].children[y].innerHTML)
                  
               }
           } 
       }
       item.push(row);
 
   }
   let order  = {"items":item,"refPago":refPago.value ? refPago.value:"N/A","isGranel":isGranel.value ? 1 : 0,"tipoOrder":tipoOrder.value,"Cliente_id":parseInt(selectClient.value),"tipo_pago":parseInt(selectPago.value),"total":total}
        sendDataItem(order);
 
}
 
 
async function sendDataItem(order){
  
   const resp = await fetch("./controller/ventas.php",{
       method:"POST",
       body:JSON.stringify(order),
       headers:{
           'Accept':'application/json',
           'Content-Type': 'application/json'
       }
   })
   // let json = await resp.json()
   if(resp.ok){
       window.location.href=`./?p=ventas`;
   }
}
 
// confirmar las venta
 
function confirmAutorizar(e){
   let confirm = window.confirm(e.target.message);
   if(confirm){
       confPedido(e.target.id, e.target.dataValue);
   } 
}
 
async function confPedido(id, model){
   const resp = await fetch(`./controller/${model}.php?AUTHPEDID=${id}`,{
       method:'GET',
       headers:{
           'Accept':'application/json'
       }
   })
   if(resp.ok){
       document.location.reload();
   }
}
 
// tabla de ventas
async function tableVentas(){
   let table = d.getElementById('Ventas');
   let ventas = await getAll('ventas');
       //fila.className = "form-select"
   ventas.data.forEach( async p=>{
       //crear button
       let buttonDelete = d.createElement('button');
       buttonDelete.className ="btn btn-danger";
       buttonDelete.textContent = "Eliminar";
       //crear button
       let buttonUpdate = d.createElement('button');
       buttonUpdate.className ="btn btn-success";
       buttonUpdate.textContent = "Editar";
       buttonUpdate['data-bs-toggle']="modal"
       buttonUpdate['data-bs-target']="#Aprobar-Modal"
       // button de autorizar
       let buttonAuthorizar = d.createElement('button');
       buttonAuthorizar.className ="btn btn-info";
       buttonAuthorizar.textContent = "Autorizar";
    
       // crear filas
       let fila = document.createElement('tr');
       //crear columnas
       let pedido_id = d.createElement('td');
       let cliente_id = d.createElement('td');
       let estado = d.createElement('td');
       let total = d.createElement('td');
       let fecha = d.createElement('td');
       let actions = d.createElement('td');
       // asigno valores de Base de datoas a las columnas
       pedido_id.textContent = p.pedido_id ;
       let cliente = await get(parseInt(p.cliente_id),'cliente');
      
       cliente_id.textContent = `${cliente['data'][0].nombre} ${cliente['data'][0].apellido}` ;
       estado.textContent = p.status == 1 ? "valido" :"pendiente";
       estado.className =  p.status ? "pendiente" :"Valido";
 
       total.textContent = p.total ;
       fecha.textContent = moment(p.fecha).format("MMM DD YYYY");
       buttonDelete.id = p.pedido_id;
       buttonAuthorizar.id = p.pedido_id;
       buttonUpdate.id = p.pedido_id;
       buttonAuthorizar.dataValue = "ventas"; // vista lista del modulo
       buttonAuthorizar.message = `Desea Confirmar el pedido ${p.pedido_id} del Cliente ${cliente['data'][0].nombre} ${cliente['data'][0].apellido}`;
       buttonAuthorizar.addEventListener('click',confirmAutorizar)
       // agregar evento al botton
       buttonDelete.dataValue = "ventas"; // vista lista del modulo
       buttonDelete.message = `Desea eliminar el pedido ${p.pedido_id} del Cliente ${cliente['data'][0].nombre} ${cliente['data'][0].apellido}`;
       buttonDelete.addEventListener('click',confirmDelete)
       buttonUpdate.addEventListener('click',updateDatos)
       buttonUpdate.dataValue = "ventas-form";
       actions.className="btns-actions";
       // agrego boton a las columna 
       actions.append(buttonDelete,buttonUpdate,buttonAuthorizar)
       // agrego las columnas a la fila
       fila.append(pedido_id,cliente_id,estado,total,fecha,actions);
       // agrego las fila a la columna
       table.append(fila);
   })
}
 
 
 
// activa la funcion tableVentas cuando encuentra a elemento con un ID "Ventas"
if(d.getElementById('Ventas')) tableVentas()
 
// end lista de precios.
async function changeGradielVenta(e){
   let selVenta = document.querySelector('#select-listaPrecio')
   let ventasProductos = document.querySelector('#ventas-productos');
   console.log(ventasProductos);
   selVenta.innerHTML = ''; // limpia los nodos hijos
   datos = await getTipoVenta(e.target.checked,'tipoVenta');
   loadDataSelectTipoVenta(datos)
}
 
function loadDataSelectTipoVenta(data){
   let selVenta = document.querySelector('#select-listaPrecio')
   data['data'].forEach( p=>{
       let option = d.createElement('option');
       option.textContent = p.nombre.toUpperCase() ;
       option.value = p.tipo_venta_id;
       //selVenta.value = p.tipo_venta_id;
       selVenta.append(option);
   })
   selVenta.selectedIndex = 1; // valor por default y comienza desde 0 como primera posicion.
}
 
async function initial(){
   check = document.querySelector('#granel-venta');
   datos = await getTipoVenta(check.checked,'tipoVenta');
   loadDataSelectTipoVenta(datos)
}
 
if(d.getElementById('granel-venta')) initial()
 
// cambio de tipo de pago
function cambiarTipoPago(ev){
   let refPago = document.querySelector("#refPago");
   ev.target.value === '1' ?  refPago.disabled = true : refPago.disabled = false;
}
// fin de cambio de tipo de pago
// recagar formulario
function recargarFormVenta(data){
    let table = d.getElementById('itemVenta');
    let pedido = data['pedido'][0];
   console.log(pedido);
   console.log(data['items']);
   let cliente = document.getElementById('select-client');
   let tipoPago = document.getElementById('select-tipoPago');
   let granelVenta = document.getElementById('granel-venta');
   let refPago = document.getElementById('refPago');
   let tipo_ventaId = document.getElementById('select-listaPrecio');
   let totalA = document.querySelector("#amount");
   totalA.textContent = pedido['total'];

   cliente.value = pedido['cliente_id'];
   tipoPago.value = pedido['tipo_pago_id'];
   granelVenta.value = pedido['isGranel']== 0 ? false :true;
   refPago.value = pedido['refPago']
   tipo_ventaId.value = pedido['tipo_ventaId']

//    console.log(total);
    data['items'].forEach(r=>{
        let fila = document.createElement('tr')

        let name = document.createElement('td')
        let cantidad = document.createElement('td')
        let precio = document.createElement('td')
        let subTotal = document.createElement('td');

        let actionbtn = document.createElement('td')      
  
        let btnStop = document.createElement('button');
        btnStop.className ="btn btn-danger";
        btnStop.textContent = "Eliminar"
        btnStop.type = "button";
        btnStop.addEventListener('click',deleteItem)
  
        actionbtn.append(btnStop)
         name.textContent = r.productoId;
         cantidad.textContent = r.cantidad;
         precio.textContent = r.precio_unitario;
         subTotal.textContent = r.total;
  
       
        fila.append(name,cantidad,precio,subTotal,actionbtn);
        table.append(fila);
        // console.table(r)
    })
}
//
async function editFormVenta(){
   console.log('cargue')
   let regexv2= /[=]/gm
   let nwTexto = consultarRuta();
 
   if(nwTexto.length > 2){     
       let id = nwTexto[2].split(regexv2)[1]
       console.log(id);
       let json = await get(parseInt(id),'ventas');
       recargarFormVenta(json['data']);
       // fnction(json['data'][0])
   }
}
 
if(document.getElementById('formVenta')) editFormVenta()