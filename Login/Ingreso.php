<?php
if(isset($_POST["btnEnviar"])){
$usuario = $_POST['usuario'];
$password = MD5($_POST['password']);
$tipo = $_POST['tipo'];

require 'conexionBD.php';
$bd=new ConexionBD();
$resultado=$bd->conectar();
$stmt = $resultado->prepare("select * from usuario where username=?");
$stmt->bind_param("s", $usuario);
$stmt->execute();
$stmt_result = $stmt->get_result();
if($stmt_result->num_rows > 0){
    $data = $stmt_result->fetch_assoc();
    $psw = $data['pasword'];
    $typeuser = $data['tipo_usuario_idtipo_usuario'];
    if ($psw === $password and $typeuser == $tipo){
        header("Location: Principal/index.php");
    }    else {
        echo "<script>alert('Usuario o contraseña incorrecta');</script>";
    }
} else {
    echo "<script>alert('Usuario o contraseña inexistente');</script>";
}
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
    </script>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ingreso a sistema</title>
</head>

<body>
    <div class="container vh-100">
        <div class="row justify-content-center h-100">
            <div class="card w-25 my-auto shadow">
                <div class="card-header text-center bg-primary text-white">
                    <h2>Inicio de sesión</h2>
                </div>
                <div class="card-body">
                    <form action="" method="post">
                        <div class="form-group">
                            <label for="tipo">Tipo de usuario: </label>
                            <select class="form-control" id="tipo" name="tipo">
                                <option value=1 name="tipo">Gerente</option>
                                <option value=2 name="tipo" selected>Colaborador</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="usuario">Usuario: </label>
                            <input type="text" id="usuario" name="usuario" class="form-control" placeholder="Usuario"
                                maxlength=15 />
                        </div>
                        <div class="form-group">
                            <label for="password">Contraseña: </label>
                            <input type="password" id="password" name="password" class="form-control"
                                placeholder="Contraseña" />
                        </div>
                        <input type="submit" id="btnEnviar" name="btnEnviar" class="btn btn-primary w-100"
                            value="Ingresar" formtarget="_blank" onclick="cerrar();" />

                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
    function cerrar() {
        this.window.close();
    }
    </script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js
    "></script>
</body>

</html>