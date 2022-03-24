const  formClient = document.querySelector("#formClient");
if(formClient) formClient.addEventListener('submit',submitForm);


let cliente = []; 


async function selectClient(){
   let data = await getAll('cliente');
   let selectClient = document.getElementById('select-client');
   selectClient.className ="form-select";
        data.data.forEach( p=>{
            let option = document.createElement('option');
            option.textContent = p.cedula+' - '+p.nombre + ' ' + p.apellido;
            option.value = p.cliente_id;
            selectClient.append(option);
        })
}

if( document.getElementById('select-client') ) selectClient()  


async function getVerifiedCliente(){
    // model en minusculas y singular. ejemplo: usuario
    let url = `controller/usuario.php?id=${localStorage.getItem('auth')}`;
    
    const resp = await fetch(url);
    let json = await resp.json();

    if(resp.ok){
        usuario = json['data'][0];
        let url_rol = `controller/rol.php?id=${usuario.rol_id}`;
        const respDos = await fetch(url_rol);
        let rolJson = await respDos.json();
        let rol = rolJson['data'][0];
        accesoCliente(rol)
        //return json
    }
}

getVerifiedCliente();

function accesoCliente(rolUser){
    permisoUsuario = permisos[rolUser.nombre];
    cliente.push(permisoUsuario["cliente"].includes('crear'));//0
    cliente.push(permisoUsuario["cliente"].includes('eliminar'));//1
    cliente.push(permisoUsuario["cliente"].includes('actualizar'));//2
    cliente.push(permisoUsuario["cliente"].includes('leer'));//3
    cliente.push(permisoUsuario["cliente"].includes('autorizar'));//4
    // console.log( permisoUsuario["cliente"].includes('update'));

}

//  tabla

async function tableClientes(){
    let table = document.getElementById('Clientes')
    let clients = await getAll('cliente');

    clients.data.forEach( c=>{
        //crear button
        let buttonDelete = document.createElement('button');
        buttonDelete.className ="btn btn-danger";
        buttonDelete.textContent = "Eliminar";
        //crear button
        let buttonUpdate = document.createElement('button');
        buttonUpdate.className ="btn btn-success";
        buttonUpdate.textContent = "Editar";
        // crear filas
        let fila = document.createElement('tr');
        //crear columnas
        let nombre = document.createElement('td');
        let telefono = document.createElement('td');
        let actions = document.createElement('td');
        // asigno valores de Base de datoas a las columnas
        nombre.textContent = `${c.nombre} ${c.apellido}` ;
        telefono.textContent = c.telefono ;
        buttonDelete.id = c.cliente_id;
        buttonDelete.dataValue = "cliente";
        buttonDelete.message = `Desea eliminar el cliente ${c.nombre} ${c.apellido}`;
        buttonUpdate.id = c.cliente_id;
        buttonUpdate.dataValue = "cliente-form";
        actions.className="btns-actions"
        //Agregar evento al botton 
        buttonDelete.addEventListener('click',confirmDelete)
        buttonUpdate.addEventListener('click',updateDatos)
        // agrego boton a las columna
        console.log(cliente);
        let btnU =  buttonUpdate;
        let btnD =  buttonDelete;

        actions.append(btnD,btnU);
        // agrego las columnas a la fila
        fila.append(nombre,telefono,actions);
        // agrego las fila a la columna
        table.append(fila);
    }) 
}


if(document.getElementById('Clientes')) tableClientes()


function recargarDataFormClientEdit(data,fields=[]){
    let cliente_id = document.getElementById('cliente_id')
    let nombre = document.getElementById('nombre')
    let apellido = document.getElementById('apellido')
    let cedula = document.getElementById('cedula')
    let telefono = document.getElementById('telefono')
    let direccion = document.getElementById('direccion')
    cliente_id.value = data.cliente_id
    nombre.value = data.nombre;
    apellido.value = data.apellido;
    cedula.value = data.cedula;
    telefono.value = data.telefono;
    direccion.value = data.direccion;
}

// cargar datos del cliente a actualizar.
 if(formClient) EditForm('cliente',recargarDataFormClientEdit);

// delete 


// 

// function verificarAcceso(modul,action){
//     if(permisoUsuario){
//         return permisoUsuario[modul].includes(action)
//     }
// }
// permisoUsuario ? verificarAcceso('cliente','crear'): null