const  formUsuario = document.querySelector("#formUsuario");
if(formUsuario) formUsuario.addEventListener('submit',submitForm);


async function tableClientes(){
    let table = document.getElementById('Usuarios')
    let usuarios = await getAll('usuario');

    usuarios.data.forEach( c=>{
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
        let nombre_completo = document.createElement('td');
        let email = document.createElement('td');
        let actions = document.createElement('td');
        // asigno valores de Base de datoas a las columnas
        nombre_completo.textContent = `${c.nombre_completo}` ;
        email.textContent = c.email ;
        buttonDelete.id = c.usuario_id;
        buttonDelete.dataValue = "usuario";
        buttonDelete.message = `Desea eliminar el cliente ${c.nombre_completo}`;
        buttonUpdate.id = c.usuario_id;
        buttonUpdate.dataValue = "usuario-form"; // nombre formulario
        actions.className="btns-actions"
        //Agregar evento al botton 
        buttonDelete.addEventListener('click',confirmDelete)
        buttonUpdate.addEventListener('click',updateDatos)
        // agrego boton a las columna
        actions.append(buttonDelete,buttonUpdate)
        // agrego las columnas a la fila
        fila.append(nombre_completo,email,actions);
        // agrego las fila a la columna
        table.append(fila);
    }) 
}


if(document.getElementById('Usuarios')) tableClientes()

function recargarDataFormClientEdit(data,fields=[]){
    let usuario_id = document.getElementById('usuario_id')
    let nombre_completo = document.getElementById('nombre_completo')
    let cedula = document.getElementById('cedula')
    let email = document.getElementById('email')
    let password = document.getElementById('contrasena')
    usuario_id.value = data.usuario_id
    nombre_completo.value = data.nombre_completo;
    cedula.value = data.cedula;
    email.value = data.email;
    password.value = data.password;
}

// cargar datos del cliente a actualizar.
 if(formUsuario) EditForm('usuario',recargarDataFormClientEdit);
