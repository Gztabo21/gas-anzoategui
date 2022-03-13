var d = document
const id = 0;

const productoForm = d.querySelector('#formProduct');
if(productoForm) productoForm.addEventListener('submit',submitFormProducto)

async function SelectProduct(){
    let products = await getAll('producto')
    let select = d.getElementById('select-producto')
        select.className = "form-select"
        products.data.forEach( p=>{
            let option = d.createElement('option');
            option.textContent = p.nombre ;
            option.value = p.productoId;
            select.append(option);
        })
}

if(document.querySelector("#select-producto")) SelectProduct()

async function tableProduct(){
    let table = d.getElementById('Productos')
    let products = await getAll('producto')

        //fila.className = "form-select"
    products.data.forEach( p=>{
        //crear button
        let buttonDelete = d.createElement('button');
        buttonDelete.className ="btn btn-danger";
        buttonDelete.textContent = "Eliminar";
        //crear button
        let buttonUpdate = d.createElement('button');
        buttonUpdate.className ="btn btn-success";
        buttonUpdate.textContent = "Editar";
        // crear filas
        let fila = document.createElement('tr');
        //crear columnas
        let nombre = d.createElement('td');
        let peso = d.createElement('td');
        let precioUnitario = d.createElement('td');
        let actions = d.createElement('td');
        // asigno valores de Base de datoas a las columnas
        nombre.textContent = p.nombre ;
        peso.textContent = `${p.peso} ${p.unidadMetrica}` ;
        precioUnitario.textContent = p.precioUnitario ;
        buttonDelete.id = p.productoId;
        buttonUpdate.id = p.productoId;
        // agregar evento al botton 
        buttonDelete.dataValue = "producto"; // vista lista del modulo de producto
        buttonDelete.message = `Desea eliminar el producto ${p.nombre} ${p.peso}`;
        buttonDelete.addEventListener('click',confirmDelete)
        buttonUpdate.addEventListener('click',updateDatos)
        buttonUpdate.dataValue = "producto-form";
        actions.className="btns-actions";
        // agrego boton a las columna
        actions.append(buttonDelete,buttonUpdate)
        // agrego las columnas a la fila
        fila.append(nombre,peso,actions);
        // agrego las fila a la columna
        table.append(fila);
    }) 
}


if(d.getElementById('Productos')) tableProduct() 
   
//
    async function recargarDataFormEdit(producto){
        let productoId = d.getElementById('productoId')
        let nombre = d.getElementById('nombre')
        let precio = d.getElementById('precio')
        let peso = d.getElementById('peso')
        let granel = d.getElementById('granel');
        let unidadMetrica = d.getElementById('unidadMetrica')
        productoId.value = producto.productoId
        nombre.value = producto.nombre;
        precio.value = producto.precioUnitario;
        unidadMetrica.value = producto.unidadMetrica;
        granel.value = producto.isGranel;
        granel.disabled = true;
        peso.value = producto.peso;

        let listaPrecio = await getListaPrecioPorProducto(producto.productoId);
        listaPrecio['data'].forEach( e=>{
            let input = d.querySelector(`#input_${e.tipo_ventaId}`);
            input.value = e.precio;
        })
        
    }


if(d.querySelector('#formProduct')) EditForm('producto',recargarDataFormEdit);

const selectVenta = document.createElement('select');
selectVenta.id ="tipoVentaSelect"
// cambios lista de precios productos
async function changeGradiel(e){
    console.log(e.target.checked);
    let table = document.getElementById('lista-precio');
    table.innerHTML = ''; // limpia los nodos hijos
    datos = await getTipoVenta(e.target.checked,'tipoVenta');
    tableListaPrecio(datos);
    
    // loadDataSelectTipoVenta(datos)
}



async function tableListaPrecio(data){
    let table = document.getElementById('lista-precio')
        //fila.className = "form-select"
    data['data'].forEach( p=>{
        // crear filas
        let fila = document.createElement('tr');
        fila.id="child"
        //crear columnas
        let nombre = d.createElement('td');
        let precioUnitario = d.createElement('td');
        let inputPrecio = document.createElement('input');
        // asigno valores de Base de datos a las columnas
        nombre.textContent = p.nombre.toUpperCase() ;
        nombre.id = p.tipo_venta_id;
        inputPrecio.id = `input_${p.tipo_venta_id}`;
        inputPrecio.name = p.nombre;
        precioUnitario.append(inputPrecio);
        // agrego las columnas a la fila
        fila.append(nombre,precioUnitario);
        // agrego las fila a la columna
        table.append(fila);
    }) 
}


async function initialListaPrecio(){
    check = document.querySelector('#granel');
    datos = await getTipoVenta(check.checked,'tipoVenta');
   tableListaPrecio(datos)
}

if(d.getElementById('granel')) initialListaPrecio() 


// envio de datos al back-end

function getDataListaPrecio(){
    let table = document.getElementById('lista-precio');
    let parent = table.children;
    let nameCol = {0:"tipo_ventaId",1:"precio"}
    let item = [];
    
    for(let i = 0 ; i <= parent.length-1 ; i++){

        let row = {"tipo_ventaId":null,"precio":null};
        for(let y=0; y <= parent[i].children.length -1 ; y++ ){

            if(parent[i].children[y].children.length > 0){
                //console.log(nameCol[y]);
              
                    row[nameCol[y]] = parseFloat(parent[i].children[y].children[0].value)
        
            }else{
                row[nameCol[y]] = parseFloat(parent[i].children[y].id);
                
            }
        }
        item.push(row);

    }
    return item
    //let order  = {"items":item,"Cliente_id":parseInt(selectClient.value),"tipo_pago":parseInt(selectPago.value),"total":total}
         //sendDataItem(order);

}

// event submit form
async function submitFormProducto(e){
    e.preventDefault()
    let regexv2= /[=]/gm 
    let ruta = consultarRuta()[1].split(regexv2)[1].split('-')[0]

    let productoId  = document.getElementsByName('productoId')[0].value ;
    let nombre  = document.getElementsByName('nombre')[0].value;
    let precioUnitario = document.getElementsByName('precioUnitario')[0].value;
    let peso = document.getElementsByName('peso')[0].value;
    let unidadMetrica = document.getElementsByName('unidadMetrica')[0].value;
    let granel = document.getElementsByName('granel')[0].checked ? 1 : 0;
    
    // armar objet
    let listaPrecio = getDataListaPrecio();
    let product = {
        "productoId":productoId,
        "nombre":nombre,
        "precioUnitario":precioUnitario,
        "peso":peso,
        "unidadMetrica":unidadMetrica,
        "granel":granel,
        "listaPrecio":listaPrecio
    }
    //console.log(product)
    const resp = await fetch("./controller/producto.php",{
        method:"POST",
        body: JSON.stringify(product),
        headers:{
            'Content-Type':"application/json",
            'Accept':'application/json'
        }
    })
    
    //console.log(resp)
    let json = await resp.json()
    if(resp.ok){
        window.location.href=`./?p=${ruta}`;
    }

}