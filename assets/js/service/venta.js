// constantes 
const item = []
const itemVenta = document.getElementById('itemVenta');
// icon
const checkIcon = document.createElement('i');
    checkIcon.className ="lni lni-checkmark";
const banIcon = document.createElement('i');
    banIcon.className ="lni lni-ban";
//end icon
function itemsVenta(){    
    let fila = document.createElement('tr');
    if(item.length == 0){
        itemVenta.append(fila)
    }
}
const productoss =[
    {id:1,name:"cilindro 10 kg",precio:1,moneda:'$'},
    {id:2,name:"cilindro 20 kg",precio:5,moneda:'$'},
    {id:3,name:"cilindro 45 kg",precio:10,moneda:'$'}
]
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

const onChangeQty = (event)=>{
    let subtotal = document.getElementById('subtotal');
    let precioNew = document.getElementById('precio_new');
    subtotal.textContent = eval(event.target.value * precioNew.value );
    console.log(event.target.value)
}

const qty  = document.createElement('input');
qty.type='number';
qty.min = 1;
qty.max = 100;
// evento de qty
qty.addEventListener('change',onChangeQty)
//qty.className= "form-select";
//qty.addEventListener('keypress',onlyNumber)
productoss.forEach( p=>{
    let option = document.createElement('option');
    option.textContent = p.name;
    option.value = p.id;
    select.append(option);
})

const confirmItem = () =>{ 
    let fila =  document.createElement('tr');
    let name = document.createElement('td')
    let cantidad = document.createElement('td')
    let precio = document.createElement('td')
    let subTotal = document.createElement('td')
    let actionbtn = document.createElement('td')
    name.textContent ="cilindro"
    console.log(qty.value,select.value,)
    cantidad.textContent = "1"
    precio.textContent = 100
    subTotal.textContent = 100
    fila.append(name,cantidad,precio,subTotal,actionbtn)
    itemVenta.append(fila);
    let filad = document.getElementById('edited');
    filad.remove();
}

const deleteItem = () =>{
    let confirm = window.confirm('Desea eliminar el item');
    let filad = document.getElementById('edited');
     if(confirm){
         filad.remove();
         console.log('Eliminado!!')
     } 
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
        cantidad.append(qty);
        let input_precio = document.createElement('input');
        input_precio.type="text";
        input_precio.disabled=true;
        input_precio.id="precio"+"_new";
        input_precio.value= "100";   
        precio.append(input_precio);
        subTotal.append()
        
        fila.append(name,cantidad,precio,subTotal,actionbtn);
        itemVenta.append(fila);
    }
}

if( document.getElementById('itemVenta') ) itemsVenta()  
