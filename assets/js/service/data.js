let company  = {
    "nombre":"Gas Anzoategui",
    "telf":"0281-000-00-00",
    "direccion":"av-dsfsdf.sdfsdf.-sdfsd. con Edi:3",
    "rif":"G-000000-0",
    "moneda":"Bs."
}

let permisos = {
    "administrador":{
        "venta":["crear","leer","eliminar","actualizar"],
        "cliente":["crear","leer","eliminar","actualizar"],
        "producto":["crear","leer","eliminar","actualizar"],
        "usuario":["crear","leer","eliminar","actualizar"],
        "reporte":["crear","leer","eliminar","actualizar"]
    },
    "normal":{
        "venta":["crear"],
        "cliente":["crear"],
        "producto":["crear"],
        "usuario":[],
        "reporte":[]
    },
    "super_usuario":{
        "venta":["crear","leer","eliminar","actualizar","autorizar"],
        "cliente":["crear","leer","eliminar","actualizar","autorizar"],
        "producto":["crear","leer","eliminar","actualizar","autorizar"],
        "usuario":["crear","leer","eliminar","actualizar","autorizar"],
        "reporte" :["crear","leer","eliminar","actualizar","autorizar"]
    },
}