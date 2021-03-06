function agregarClient() {
    //capturar los valores contenidos en las cajas de los input del formualrio index.html
    var datos={
        id:$("#ClientID").val(),
        name:$("#Clientname").val(),
        lastname:$("#lastname").val(),
        tel:$("#tel").val(),
        age:$("#age").val(),
        email:$("#email").val(),
        password:$("#password").val(),
    }
    
    //convertir a JSON
    let datosPeticion=JSON.stringify(datos);

    //Realizamos la peticion AJAX
    $.ajax({
        url:"https://g7f0671950df122-jsbm.adb.us-phoenix-1.oraclecloudapps.com/ords/admin/cliente/cliente",
        data:datosPeticion,
        type:"POST",
        contentType:"application/JSON",
        //si es correcto muestreme mensaje        
        success:function (respuesta){
            console.log("insertado exitosamente")
        },
        //si es incorrecto muestreme error = xhr
        error:function(xhr, status){
            console.log(status);
        }
    });
}

function listarClient() {
    $("#btn-agregarClient").hide();

    $.ajax({
        url:"https://g7f0671950df122-jsbm.adb.us-phoenix-1.oraclecloudapps.com/ords/admin/cliente/cliente",
        Type:"GET",
        dataType:"json",

        success:function (respuesta) {
            console.log(respuesta);
            listarRespuestaClient(respuesta.items);
        },

        error:function (xhr, status) {
            console.log(status);
        }
        
    });
}

function listarRespuestaClient(items) {
    var tabla=`<table border="2">
                <tr>
                    <th>ID</th>
                    <th>NOMBRE</th>
                    <th>APELLIDO</th>
                    <th>TELEFONO</th>
                    <th>EDAD</th>
                    <th>CORREO</th>
                    <th>CONTRASEÑA</th>
                    <th colspan="2">ACCIONES</th>
                </tr>`;
    for (let i = 0; i < items.length; i++) {
        tabla+=`<tr>
                    <td>${items[i].id} </td>
                    <td>${items[i].name} </td>
                    <td>${items[i].lastname} </td>
                    <td>${items[i].tel} </td>
                    <td>${items[i].age} </td>
                    <td>${items[i].email} </td>
                    <td>${items[i].password} </td>
                    <td><button onclick="editarRegistroClient(${items[i].id})">Editar</button></td>
                    <td><button onclick="borrarRegistroClient(${items[i].id})">Borrar</button></td>
                </tr>`;
    }
    tabla+=`</table>`

    console.log(tabla);

    $("#listadoClient").html(tabla)
}

function editarRegistroClient(ClientID) {
    $("#btn-guardarEdicionClient").show();
    $("#btn-agregarClient").hide();
    $("#btn-listarClient").hide();
    $("#ClientID").prop('disabled', true);

    var datos={
        id:ClientID
    }

    let datosPeticion=JSON.stringify(datos);

    $.ajax({
        url:"https://g7f0671950df122-jsbm.adb.us-phoenix-1.oraclecloudapps.com/ords/admin/cliente/cliente/"+ClientID,
        data:datosPeticion,
        type:'GET',
        dataType:'json',
    
        success:function (respuesta) {
            var items=respuesta.items;

            $('#ClientID').val(items[0].id),
            $('#Clientname').val(items[0].name),
            $('#lastname').val(items[0].lastname),
            $('#tel').val(items[0].tel),
            $('#age').val(items[0].age);
            $('#email').val(items[0].email);
            $('#password').val(items[0].password);
            console.log(items);
        },

        //xhr = codigo del error
        error:function(xhr, status){
            console.log(status);
    
        }
    });
}

function actualizarRegistroClient() {
    var datos={
        id:$("#ClientID").val(),
        name:$("#Clientname").val(),
        lastname:$("#lastname").val(),
        tel:$("#tel").val(),
        age:$("#age").val(),
        email:$("#email").val(),
        password:$("#password").val(),
    }

    //conversion a JSON
    let datosPeticion=JSON.stringify(datos);

    //Hacemos peticion Ajax
    $.ajax({
        url:"https://g7f0671950df122-jsbm.adb.us-phoenix-1.oraclecloudapps.com/ords/admin/cliente/cliente",
        data:datosPeticion,
        type:'PUT',
        contentType:'application/JSON',

        success:function (respuesta) {
            console.log("actualizado!");
        },

        //xhr = codigo del error
        error:function(xhr, status){
            console.log(status);

        }
    });
}

function borrarRegistroClient(ClientID) {
    var datos={
        id:ClientID
    }

    let datosPeticion=JSON.stringify(datos);

    $.ajax({
        url:"https://g7f0671950df122-jsbm.adb.us-phoenix-1.oraclecloudapps.com/ords/admin/cliente/cliente",
        data:datosPeticion,
        type:"DELETE",
        contentType:"application/JSON",

        success:function (respuesta) {
            console.log("Borrado");
            listarClient();
        },
    
        //xhr = codigo del error
        error:function(xhr, status){
            console.log(status);
        }
    });
}