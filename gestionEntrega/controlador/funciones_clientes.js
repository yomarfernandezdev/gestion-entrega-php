function agregardatos(id_cliente, nombre, telefono_1, telefono_2, direccion_entrega, email, dni){
    cadena = "id_cliente=" + id_cliente +
    "&nombre=" + nombre +
    "&telefono_1=" + telefono_1 +
    "&telefono_2=" + telefono_2 +
    "&direccion_entrega=" + direccion_entrega +
    "&email=" + email +
    "&dni=" + dni;

    accion = "insertar";
    mensaje_si = "Cliente agregado con exito";
    mensaje_no= "Error de registro";
    a_ajax(cadena, accion, mensaje_si, mensaje_no);
}
function agregaform(datos) {
    d = datos.split('||');
    $('#id_clienteu').val(d[0]);
    $('#nombreu').val(d[1]);
    $('#telefono_1u').val(d[2]);
    $('#telefono_2u').val(d[3]);
    $('#direccion_entregau').val(d[4]);
    $('#emailu').val(d[5]);
    $('#dniu').val(d[6]);
}

function modificarCliente(){
    id_cliente = $('#id_clienteu').val();
    nombre = $('#nombreu').val();
    telefono_1 = $('#telefono_1u').val();
    telefono_2 = $('#telefono_2u').val();
    direccion_entrega = $('#direccion_entregau').val();
    email = $('#emailu').val();
    dni = $('#dniu').val();
    cadena = "id_cliente=" + id_cliente +
    "&nombre=" + nombre +
    "&telefono_1=" + telefono_1 +
    "&telefono_2=" + telefono_2 +
    "&direccion_entrega=" + direccion_entrega +
    "&email=" + email +
    "&dni=" + dni;

    accion = "modificar";
    mensaje_si = "Cliente modificado con exito";
    mensaje_no= "Error de registro";
    a_ajax(cadena, accion, mensaje_si, mensaje_no);
}

function preguntarSiNo(id_cliente) {
    var opcion = confirm("¿Esta seguro de eliminar el registro?");
    if (opcion == true) {
        alert("El registro será eliminado.");
        eliminarDatos(id_cliente);
    } else {
        alert("El proceso de eliminación del registro ha sido cancelado.");
    }
}

function eliminarDatos(id_cliente) {
    cadena = "id_cliente=" + id_cliente;

    accion = "borrar";
    mensaje_si = "Cliente borrado con exito";
    mensaje_no= "Error de registro";
    a_ajax(cadena, accion, mensaje_si, mensaje_no);
}

function a_ajax(cadena, accion, mensaje_si, mensaje_no){
    $.ajax({
        type: "POST",
        url: "../modelo/clientes_modelo.php?accion="+accion,
        data: cadena,
        success: function (r){
            if (r == 1) {
            $('#tabla').load('../vista/componentes/vista_clientes.php');
                //alert(mensaje_si);
                // redireccionamiento al ejecutar
                window.location.href = 'https://www.google.com';
            } else {
                alert(mensaje_no);
            }
        }
    });
}
