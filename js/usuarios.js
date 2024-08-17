             function agregaDatosUsuario(idusuario) {
                $.ajax({
                    type: "POST",
                    data: "idusuario=" + idusuario, 
                    url: "../procesos/usuario/obtenerUsuario.php",
                    success:function(respuesta){
                        

                       respuesta = jQuery.parseJSON(respuesta);

                       $('#idUsuario').val(respuesta['idUsuario']);
                       $('#nombreU').val(respuesta['nombreUsuario']);
                       $('#usuarioU').val(respuesta['usuario']);
                       $('#passwordU').val(respuesta['contraseña']);
                       $('#rolU').val(respuesta['rol']);
                       

                    }
                })
            }

      
       function actualizaUsuario() {
    if($('#nombreU').val() == "") {
        swal("No hay usuario");
        return false;
    } else {
        $.ajax({
            type:"POST",
            data:$('#frmRegistroU').serialize(),
            url:"../procesos/usuario/actualizaUsuario.php",
            success:function(respuesta){
                respuesta = respuesta.trim();

                if (respuesta == 1) {
                    $("#tablaUsuariosLoad").load("usuarios/tablaUsuarios.php");
                    swal(":D", "Actualizado con exito!", "success");
                } else {
                    swal(":(", "Fallo al actualizar!", "error");
                }
            }
        })
    }
 }
           
           function eliminarUsuario(idusuario){
  swal({
  title: '¿Quieres eliminar al usuario?',
  text: "Una vez que aceptes, el usuario ya no existira en el sistema",
  icon: 'warning',
  buttons: true,
  dangerMode: true,
  })
  .then((willDelete) => {
    if (willDelete) {
      $.ajax({
        type:"POST",
        data:"idusuario=" + idusuario,
        url:"../procesos/usuario/eliminarUsuario.php",
        success:function(respuesta){
          respuesta = respuesta.trim();
          if (respuesta == 1) {   
            $("#tablaUsuariosLoad").load("usuarios/tablaUsuarios.php"); 
            swal(
      "Eliminado con exito!", {
      icon: "success",
                                });
        } else {
          swal(
      "Hubo un error!", {
      icon: "error",
                          });

        }
       
        }
      });
    }
});

}
        