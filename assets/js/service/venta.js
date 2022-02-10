// constantes 
const item = [];
let idFila = 0;
let productos = [];
let producto ;
let precioProducto = 0.00 ;
let total = 0.00;
const itemVenta = document.getElementById('itemVenta');

// icon
const checkIcon = document.createElement('i');
    checkIcon.className ="lni lni-checkmark";
const banIcon = document.createElement('i');
    banIcon.className ="lni lni-ban";
//end icon

async function itemsVenta(){    
    // let fila = document.createElement('tr');
    // if(item.length == 0){
    //     itemVenta.append(fila)
    // }
    
    getProductos()
}
const productSelected = (e) =>{
    let productoId = e.target.value;
    producto = productos.find(p => p.productoId == productoId)
    let precioNew = document.getElementById('precio_new');
    let subtotal = document.querySelector('#subtotal')
    qty.value = 1;
    precioProducto = producto.precioUnitario;
    precioNew.textContent = producto.precioUnitario;
    subtotal.textContent = producto.precioUnitario;

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
select.id ="products"
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
    const {data} = await getAll('producto');
    productos = data
    productos.forEach( p=>{
        let option = document.createElement('option');
        option.textContent = p.nombre;
        option.value = p.productoId;
        select.append(option);
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
         console.log('Eliminado!!')
     } 
}

function updateTotal(amount , operador){
    total = eval( `${amount}${operador} ${total}`);
    let totalA = document.querySelector("#amount");
    totalA.textContent = total < 0 ? (-1 * total) : total;
    console.log(total);
}

function newItem(){
    if(!document.getElementById('edited')){
        let fila = document.createElement('tr')
        fila.id = "edited";
        fila.nodeValue ="edited"
        let name = document.createElement('td')
        let cantidad = document.createElement('td')
        let precio = document.createElement('td')
        let subTotal = document.createElement('td');
        subTotal.id ="subtotal"
        let actionbtn = document.createElement('td')
        
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
        subTotal.textContent = 0;
        
        fila.append(name,cantidad,precio,subTotal,actionbtn);
        itemVenta.append(fila);
    }
}

if( document.getElementById('itemVenta') ) itemsVenta()  

// construir data a enviar a la PHP y luego DDBB
function getData(){
    let parent = itemVenta.children;
    let nameCol = {0:"producto_id",1:"cantidad",2:"precio_unitario",3:"total"}
    let item = [];
    let selectClient = document.querySelector("#select-client");
    let selectPago = document.querySelector("#select-tipoPago");
    
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
    let order  = {"items":item,"Cliente_id":parseInt(selectClient.value),"tipo_pago":parseInt(selectPago.value),"total":total}
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