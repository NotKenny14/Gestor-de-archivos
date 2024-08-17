function agregarArchivosGestor() {

	  var formData = new FormData(document.getElementById('frmArchivos'));

          $.ajax({
            url:"../procesos/archivos/guardarArchivos.php",
            type:"POST",
            datatype: "html",
            data: formData,
            cache:false,
            contentType:false,
            processData:false,
            success:function(respuesta){
            	console.log(respuesta);
              respuesta = respuesta.trim();

              if (respuesta == 1) { 
              	$("#tablaGestorArchivos").load("gestor/tablagestor.php"); 
              	swal(":D", "Agregado con exito!", "success");
              } else {
              	swal(":(", "Fallo al agregar", "error");
              }
            }
          });
}


function obtenerArchivoPorId(idArchivo) {
    $.ajax({
      type: "POST",
      data:"idArchivo=" + idArchivo,
      url:"../procesos/archivos/obtenerArchivo.php",
      success:function(respuesta) {
        $('#archivoObtenido').html(respuesta);
        $('#idArchivo').val(idArchivo);
        
      }
      
    });
}

function compartirArchivo(){
    $.ajax({
      method: "POST",
      data: $('#frmCompartir').serialize(),
      url: "../procesos/archivos/compartirArchivo.php",
      success:function(respuesta){
        respuesta = respuesta.trim();

        if (respuesta == 1) {
          swal(":D", "Compartido con exito", "success");
        } else {
          swal(":(", "Error al compartir, intente de nuevo", "Error");
        }
      }
    });
  }



function dejarCompartir(idArchivo,idUsuario){
  swal({
  title: '¿Ya terminaste de usar el archivo compartido?',
  text: "Una vez que aceptes, el archivo desaparecera de esta lista",
  icon: 'warning',
  buttons: true,
  dangerMode: true,
  })
  .then((willDelete) => {
    if (willDelete) {
      $.ajax({
        type:"POST",
        data:("idArchivo=" + idArchivo+ '&idUsuario='+idUsuario),
        url:"../procesos/archivos/noCompartir.php",
        success:function(respuesta){
          respuesta = respuesta.trim();
          if (respuesta == 1) {   
            $("#tablaCompartir").load("gestor/tablaCompartir.php"); 
            swal(
      "Completado con exito!", {
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