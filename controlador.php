<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Controlador</title>
</head>
<body>
    <?php
         require 'logica.php';
        if(isset($_POST['btnValidar'])){
          $correoLog= $_POST['txtcorreo'];
          $passLog= $_POST['txtpass'];

          $status= validarUsuario($correoLog,$passLog);
          
          if($status == 1){
              echo '<script> alert("BIENVENIDO A MACUIN DASHBOARDS"); </script>';
              echo '<script> window.location="menujefesoporte.html"; </script>';
          }if($status == 2){
                echo '<script> alert("BIENVENIDO A MACUIN DASHBOARDS"); </script>';
                echo '<script> window.location="menuauxiliar.html"; </script>';
          }if($status == 3){
                echo '<script> alert("BIENVENIDO A MACUIN DASHBOARDS"); </script>';
                echo '<script> window.location="menucliente.html"; </script>';
          }else{
            echo '<script> alert("VERIFICA CORREO Y CONTRASEÑA"); </script>';
            echo '<script> window.location="login.html" </script>';
          }
        }
        if(isset($_POST['save'])){
            $nameU = $_POST['name'];
            $user = $_POST['user'];
            $correo = $_POST['correo'];
            $contra = $_POST['contra'];
            $roles = $_POST['rol'];

            $status=guardarUser($nameU, $user, $correo, $contra, $roles);

            if($status == 1){
                echo '<script>alert("Usuario Agregado con Exito");</script>';
                echo '<script>window.location="RegUser.html";</script>';
            }else{
                echo '<script>alert("Error al Agregar");</script>';
                echo '<script>window.location="RegUser.html";</script>';
            }
        }
        if(isset($_POST['saved'])){
            $nameD = $_POST['named'];
            $area = $_POST['area'];
            $auxiliar = $_POST['aux'];

            $status=guardarDepa($nameD, $area, $auxiliar);

            if($status == 1){
                echo '<script>alert("Departamento Registrado");</script>';
                echo '<script>window.location="RegDep.html";</script>';
            }else{
                echo '<script>alert("Error al Registrar");</script>';
                echo '<script>window.location="RegDep.html";</script>';
            }
        }
        if(isset($_POST['edit'])){
            $id = $_POST['id']; 
            $nameU = $_POST['name'];
            $user = $_POST['user'];
            $correo = $_POST['correo'];
            $contra = $_POST['contra'];
            $roles = $_POST['rol'];

            $status=editaru($nameU, $user, $correo, $contra, $roles,$id);
            if($status==1){
                echo '<script>alert("Cambios Guardados con Exito");</script>';
                echo '<script>window.location="ConUser.php";</script>';
            }else{
                echo '<script>alert("Error no se Puede Actualizar");</script';
                echo '<script>window.location="EditarU.php";</script>';
            }
        }
        if(isset($_POST['editd'])){
            $id = $_POST['id'];
            $nameD = $_POST['namedep'];
            $area = $_POST['aread'];
            $auxiliar = $_POST['auxdep'];

            $status=editard($nameD, $area, $auxiliar, $id);
            if($status==1){
                echo '<script>alert("Cambios Guardados con Exito");</script>';
                echo '<script>window.location="ConDep.php";</script>';
            }else{
                echo '<script>alert("Error no se Puede Actualizar");</script>';
                echo '<script>window.location="EditarD.php";</script>';
            }
        }
        if(isset($_POST['eliminar'])){
            $id = $_POST['id'];
            $status=eliminarU($id);
            if($status == 1){
                echo '<script>alert("Usuario Eliminado");</script>';
                echo '<script>window.location="ConUser.php";</script>';
            }else{
                echo '<script>alert("No se Pudo Eliminar");</script>';
                echo '<script>window.location="ConUser.php";</script>';
            }
        }
        if(isset($_POST['eliminard'])){
            $id = $_POST['id'];
            $status=eliminarD($id);
            if($status == 1){
                echo '<script>alert("Departamento Eliminado");</script>';
                echo '<script>window.location="ConDep.php";</script>';
            }else{
                echo '<script>alert("No se pudo Eliminar");</script>';
                echo '<script>window.location="ConDep.php";</script>';
            }
        }
    ?>
</body>
</html>