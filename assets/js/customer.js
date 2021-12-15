const valida ={
    'email':validarEmail,
    'number':validarNumber,
    'phone': validarPhone,
    'required':validarRequired
}
const $form = document.querySelector("#form");
$form.addEventListener('submit',validarForm);

function validarfield(e){
    if(e.target.attributes.hasOwnProperty('validar')){
        let validar = e.target.attributes.validar.value;
        let valor = e.target.value;
        valida[validar](valor,e.target)
    }
}
function messageValidation(field,type,e){
    let message = document.getElementById("messageValidar");
    e.className=`form-control is-${type} `
    message.className=`${type}-feedback`;
    type==="valid" ?  message.innerText=`${field} valido`: message.innerText=`ERROR: ${field} invalido`;
    return type==="valid" ? true : false;
}

function validarEmail(text,e){
    re=/^([\da-z_\.-]+)@([\da-z\.-]+)\.([a-z\.]{2,6})$/
	return !re.exec(text) ? messageValidation('email','invalid',e) : messageValidation('email','valid',e)
}
function validarPhone(text,e){
    
    re = /^[\+]?[(]?[0-9]{3}[)]?[-\s\.]?[0-9]{3}[-\s\.]?[0-9]{4,6}$/im
    return !re.exec(text) ?  messageValidation('telefono','invalid',e) : messageValidation('telefono','valid',e)

}
function validarNumber(e){
    var code = (e.which) ? e.which : e.keyCode;   
    if(code==8) { // backspace.
      return true;
    } else if(code>=48 && code<=57) { // is a number.
      return true;
    } else{ // other keys.
      return false;
    }

}
function validarRequired(e){
    e.target.value === "" ? false : true;
}

async function validarForm(e){
    
    e.preventDefault()
    
    const form = new FormData(this)
    const resp = await fetch(this.action,{
        method:this.method,
        body:form,
        headers:{
            'Accept':'application/json'
        }
    })
    let json = await resp.json()
    //console.log(json.code);
    // await resp.json()
    if(resp.ok){
        //this.reset();
        window.location.href="http://localhost/gas-anzoategui/?p=ventas"
    }
    if(!resp.ok){
        this.reset();
        document.getElementById('error-response').innerText =json.message;
        document.getElementById('error-response').className ='error-response';
        alert(json.message);
    }

}