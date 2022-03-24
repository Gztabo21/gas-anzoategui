let usuario;
let rol;
let permisoUsuario 
// consultar todos los datos
async function getAll(model){
    // model en minusculas y singular. ejemplo: usuario
    let url = `controller/${model}.php`;
    const resp = await fetch(url);
    let json = await resp.json()
    if(resp.ok){
        return json
    }
}
// consultar un elemento por el id.
async function get(id,model){
    // model en minusculas y singular. ejemplo: usuario
    let url = `controller/${model}.php?id=${id}`;
    const resp = await fetch(url);
    let json = await resp.json()
    if(resp.ok){
        return json
    }
}


async function getTipoVenta(istrue,model){
    // model en minusculas y singular. ejemplo: usuario
    let url = `controller/${model}.php?isGranel=${istrue}`;
    const resp = await fetch(url);
    let json = await resp.json()
    if(resp.ok){
        return json
    }
}
//  eliminar elementos
async function delItem(id,model){   
    const resp = await fetch(`./controller/${model}.php?DELETEID=${id}`,{
        method:'GET',
        headers:{
            'Accept':'application/json'
        }
    })
    if(resp.ok){
        document.location.reload();
    }
}
//
// funcion de alerta antes de borrar
function confirmDelete(e){
    let confirm = window.confirm(e.target.message);
    if(confirm){
        delItem(e.target.id, e.target.dataValue);
    }
   
}
//
function updateDatos(e){
    window.location.href=`./?p=${e.target.dataValue}&id=${e.target.id}`
}
// event submit form
async function submitForm(e){
    e.preventDefault()
    let regexv2= /[=]/gm 
    let ruta = consultarRuta()[1].split(regexv2)[1].split('-')[0]
    const form = new FormData(this)
 
    const resp = await fetch(this.action,{
        method:this.method,
        body:form,
        headers:{
            'Accept':'application/json'
        }
    })
    //let json = await resp.json()
    if(resp.ok){
        window.location.href=`./?p=${ruta}`;
    }

}
// 
function consultarRuta(){
    let regex = /[?*&]/gm
    let texto = window.location.search
    return texto.split(regex);
}

async  function  EditForm(model,fnction){
    // nombre del modelo.
    // nombre la function que va recargar el formulario.
    let regexv2= /[=]/gm 
    let nwTexto = consultarRuta();

    if(nwTexto.length > 2){      
        let id = nwTexto[2].split(regexv2)[1]
        let json = await get(parseInt(id),model);
        fnction(json['data'][0])
    }  
    
}

function cerrarSession(){
   let confirm = window.confirm( "¿Desea cerrar session ?" ) ;
   if(confirm){
       window.localStorage.removeItem('auth');
       window.location.href="./signin.php";
   }
}

async function getListaPrecioPorProducto(productoId){
    const resp = await fetch(`./controller/listaPrecio.php?productoId=${productoId}`,{
        method:'GET',
        headers:{
            'Accept':'application/json'
        }
    })
    let json = await resp.json()
    if(resp.ok){
        console.log(json)
        return json
    }
}

async function getListaPrecioPorProductoytipoVenta(productoId,tipoVenta){
    const resp = await fetch(`./controller/listaPrecio.php?productoId=${productoId}&tipoVentaId=${tipoVenta}`,{
        method:'GET',
        headers:{
            'Accept':'application/json'
        }
    })
    let json = await resp.json()
    if(resp.ok){
        console.log(json)
        return json
    }
}

async function respaldoDDBB(){
    const resp = await fetch(`./controller/config.php`,{
        method:'GET',
        headers:{
            'Accept':'application/json'
        }
    })
    let json = await resp.json()
    if(resp.ok){
        let url ="./ddbb/"+json['file'];
        window.open(url, 'Download');
    }
}

async function searchByCedula(e){
    // los numeros
    // 48-57 para keypress && para 96-105 para keydown &key up
    // delete = 46
    // backspace 8
     let clients = await getAll('cliente');
    if(e.keyCode >= 96 && e.keyCode <= 105 || e.keyCode === 8 || e.keyCode === 46){
        // filtrar data
        if( e.keyCode !== 8 && e.keyCode !== 46 ) autoComplete(clients.data,e.target.value)
    } else{
        alert('solo numeros');
        e.target.value =""
    }
}
function autoComplete (data,key) {
const resultElem = document.querySelector("#resultCompletado"); 
resultElem.className="activeCompletado";
let itemNull = document.createElement('li');
itemNull.textContent = " No hay resultados"
const  result = data.filter(e=>{
            return e.cedula.startsWith(key)
        })
    resultElem.innerHTML = "";
    if (result.length === 0 ) resultElem.append(itemNull);
    result.forEach( r =>{
        
        let item = document.createElement('li');
        item.addEventListener('click',seleccionarItem)
        item.IdCliente = r.cliente_id;
        item.textContent = `${r.cedula} - ${r.nombre} ${r.apellido}`
        resultElem.append(item)
    })
    

}
function seleccionarItem (ev){
    const resultElem = document.querySelector("#resultCompletado"); 
    resultElem.className="";
    let cliente = document.querySelector("#cliente");
    let valueClient = document.querySelector("#valueClient");
    // console.log(ev.target);
    valueClient.value = ev.target.IdCliente;
    cliente.value = ev.target.textContent;
    resultElem.innerHTML=""
}

function cleanResultComplete(ev){
    const resultElem = document.querySelector("#resultCompletado"); 
    resultElem.innerHTML="";
    resultElem.className="";
}