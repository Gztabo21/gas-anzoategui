var d = document
const id = 0;

const productoForm = d.querySelector('#formProduct');
if(productoForm) productoForm.addEventListener('submit',submitForm)

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
        peso.textContent = p.peso ;
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
        fila.append(nombre,peso,precioUnitario,actions);
        // agrego las fila a la columna
        table.append(fila);
    }) 
}


if(d.getElementById('Productos')) tableProduct() 
   
//
    function recargarDataFormEdit(producto){
        let productoId = d.getElementById('productoId')
        let nombre = d.getElementById('nombre')
        let precio = d.getElementById('precio')
        let peso = d.getElementById('peso')
        let unidadMetrica = d.getElementById('unidadMetrica')
        productoId.value = producto.productoId
        nombre.value = producto.nombre;
        precio.value = producto.precioUnitario;
        unidadMetrica.value = producto.unidadMetrica;
        peso.value = producto.peso;
    }


if(d.querySelector('#formProduct')) EditForm('producto',recargarDataFormEdit);
