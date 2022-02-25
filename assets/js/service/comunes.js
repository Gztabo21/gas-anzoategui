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