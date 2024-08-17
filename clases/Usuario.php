    <?php

require_once "Conexion.php";

class Usuario extends Conectar{
    public function agregarUsuario($datos){
        $conexion = Conectar::conexion();
 if (self::buscarUsuarioRepetido($datos['usuario'])) {
            return 2;
        } else {
            $sql = "INSERT INTO t_usuarios (nombre,
                                email,
                                usuario,
                                password,
                                id_dep,
                                id_rol
                                ) 
            VALUES (?, ?, ?, ?, ?, ?)";
$query = $conexion->prepare($sql);
$query->bind_param('ssssii', 
                    $datos['nombre'],
                    $datos['correo'],
                   $datos['usuario'],
                   $datos['password'],
                   $datos['departamento'],
                   $datos['idrol']
                   
                    );
                   
                $exito = $query->execute();
                $query->close();
                return $exito;

        }

    

              }

               public function buscarUsuarioRepetido($usuario) {
                                    $conexion = Conectar::conexion();
                        
                                    $sql = "SELECT usuario 
                                            FROM t_usuarios 
                                            WHERE usuario = '$usuario'";
                                    $result = mysqli_query($conexion, $sql);
                                    $datos = mysqli_fetch_array($result);
                        
                                    if ($datos['usuario'] != "" || $datos['usuario'] == $usuario) {
                                        return 1;
                                    } else{ 
                                        return 0;
                                    }
                                }

                                public function login($usuario, $password){
                                     $conexion = Conectar::conexion();

                                     $sql = "SELECT count(*) as existeUsuario 
                                     FROM t_usuarios 
                                     WHERE usuario = '$usuario' 
                                     AND password = '$password'";
                                     $result = mysqli_query($conexion, $sql);

                                     $respuesta = mysqli_fetch_array($result)['existeUsuario'];

                                     if ($respuesta > 0) {
                                        $_SESSION['usuario'] = $usuario;

                                        $sql = "SELECT id_usuario FROM t_usuarios WHERE usuario = '$usuario' 
                                     AND password = '$password' ";
                                     $result = mysqli_query($conexion, $sql);
                                     $idUsuario = mysqli_fetch_row($result)[0];

                                     $_SESSION['idUsuario'] = $idUsuario;

                                      $sql2 = "SELECT id_rol FROM t_usuarios WHERE usuario = '$usuario' 
                                     AND password = '$password' ";
                                     $result2 = mysqli_query($conexion, $sql2);
                                     $idRol = mysqli_fetch_row($result2)[0];

                                        $_SESSION['idROL'] = $idRol;

                                        return 1;
                                     } else {
                                        return 0;
                                     }

                                }

                                    
                                    public function obtenerDatoUsuario($idusuario){
                                         $conexion = Conectar::conexion();
                                         $sql = "SELECT id_usuario, nombre, usuario, password, id_rol 
                                         FROM t_usuarios
                                         WHERE id_usuario = '$idusuario'"; 
                                        $result = mysqli_query($conexion, $sql);
                                        $mostrar=mysqli_fetch_array($result);
                                            $datos = array(
                                                        "idUsuario" =>$mostrar['id_usuario'],
                                                        "nombreUsuario" => $mostrar['nombre'],
                                                        "usuario" => $mostrar['usuario'],
                                                        "contraseña" => $mostrar['password'],
                                                        "rol" => $mostrar['id_rol']

                                        );
                                            return $datos;
                                    }



                                    public function actualizarUsuario($datos) {
                                        $conexion = Conectar::conexion();
                                        $sql = "UPDATE t_usuarios 
                                        SET nombre = '$datos[1]',
                                        usuario = '$datos[2]',
                                        password = '$datos[3]',
                                        id_rol = '$datos[4]' 
                                        WHERE id_usuario = '$datos[0]'";

                                       
                                        return mysqli_query($conexion, $sql);

                                    }


                                    public function eliminarUsuario($idusuario){
                                        $conexion = Conectar::conexion();
                                        $sql = "DELETE FROM t_usuarios
                                        WHERE id_usuario = '$idusuario'";
                                        return mysqli_query($conexion, $sql);
                                    }


     }  


    ?>
