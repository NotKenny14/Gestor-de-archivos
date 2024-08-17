 
 function agregarCarpeta(){
 		var carpeta = $('#nombreCarpeta').val();
        var tramite = $('#tramites').val();
       
        	if (carpeta == "") {
        		swal("Debes agregar una carpeta");
        		return false;
        	} else {
        		$.ajax({
        			type:"POST",
        			data:{"carpeta":  carpeta, "tramite":  tramite},
        			url:"../procesos/carpetas/agregarCarpeta.php",
        			success:function (respuesta){
        				respuesta = respuesta.trim(); 
        				if (respuesta == 1) {
                            $('#tablaCarpetas').load("carpetas/tablaCarpetas.php");
        					$('#nombreCarpeta').val("");
                            $('#tramites').val("");
        					swal(":D", "Agregado con exito!", "success");
        				} else if(respuesta == 2){
                            swal("Esta carpeta ya existe");
                        } 
                        else {
        					swal(":(", "Fallo al agregar!", "error");
        				}
        			}
        		});
        	}
 }


 function obtenerDatosCarpeta(idCarpeta) {
    $.ajax({
        type: "POST",
        data: "idCarpeta=" + idCarpeta,
        url:"../procesos/carpetas/obtenerCarpetas.php",
        success:function(respuesta){
            console.log(respuesta);
               respuesta = jQuery.parseJSON(respuesta);
             
             genera_tabla(respuesta);

           

      
              
        }
    });
 }

 function actualizaCarpeta() {
    if($('#carpetaU').val() == "") {
        swal("No hay carpeta");
        return false;
    } else {
        $.ajax({
            type:"POST",
            data:$('#frmActualiza').serialize(),
            url:"../procesos/carpetas/actualizaCarpeta.php",
            success:function(respuesta){
                respuesta = respuesta.trim();

                if (respuesta == 1) {
                    $('#tablaCarpetas').load("carpetas/tablaCarpetas.php");
                    swal(":D", "Actualizado con exito!", "success");
                } else {
                    swal(":(", "Fallo al actualizar!", "error");
                }
            }
        })
    }
 }


function genera_tabla(data) {
 var tabla = "<div class='row'> <div class='col-sm-12'><div class='table-responsive'> <table border =2 class='table table-hover' ><thead class='thead-dark'><tr > <th style='text-align: center;'> Nombre Archivo  </th> <th style='text-align: center;'> Visualizar  </th> <th style='text-align: center;'> Imprimir  </th> <th style='text-align: center;'> Compartir </th> </tr></thead> ";


for (d of data) {
     var rutaImpresion = "../archivos/./"+d.nombreArchivo;

    tabla = tabla + "<tbody><tr>  <td> "+ d.nombreArchivo +"</td>  <td align='center'><span class='btn btn-primary btn-sm'data-toggle='modal' data-target='#visualizarArchivo'"
                            +"onclick='obtenerArchivoPorId("+d.idArchivo+")'><span class='fa-solid fa-eye'></span></span>" + 
                            "</td> <td align='center'><a href='"+ rutaImpresion +"'target='_blank' class ='btn btn-success btn-sm' success' ><span class='fa-solid fa-print'></span></a>  </td> <td align='center'><span class='btn btn-warning btn-sm'data-toggle='modal' data-target='#compartir'"
                            +"onclick='obtenerArchivoPorId("+d.idArchivo+")'><span class='fa-brands fa-slideshare'></span></span>" + 
                            "</td> </tr> </tbody>" ;
} 



tabla = tabla + "</table></div></div></div>"
 document.getElementById('divtabla').innerHTML = tabla;

}