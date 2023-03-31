<?php
    function conectarBD(){
        $servidor="127.0.0.1";
        $BD="macuin_dashboards";
        $usuario="root";
        $cont="";

        $conex=mysqli_connect($servidor,$usuario,$cont,$BD) or die("ERROR DE CONEXION");

        return $conex;
    }

    function validarUsuario($corrLog,$passLog){

        $conex=conectarBD();
        $consultaUsuario="select contraseña, tipo_rol from usuarios where correo= '$corrLog'";
        
        $rsVal=mysqli_query($conex,$consultaUsuario);
        
        while($arrVal=mysqli_fetch_array($rsVal)){
        $passBD = $arrVal['contraseña'];
        $rol = $arrVal['tipo_rol'];
        }
        if ($passBD === $passLog) {
            if ($rol == 'jefe'){
                $status=1;
            }if ($rol == 'auxiliar'){
                $status=2;
            }if ($rol == 'cliente'){
                $status=3;
            }
        }else{
          $status=0;
        }
         return $status;
    }

    function guardarUser($nameuser,$user,$email,$pass,$rol){
        $conectar=conectarBD();
        $insert="insert into usuarios(nombre_usuario,usuario,correo,contraseña,tipo_rol) values(?,?,?,?,?)";
            try{
                $stm = $conectar->prepare($insert);
                $stm->bind_param('sssss',$nameuser,$user,$email,$pass,$rol);
                $stm->execute();
                $stm->close();
                mysqli_close($conectar);
                return $status=1;
            }catch(Exception $e){
                die('Error al Insertar la informacion:' . $e->getMessage() );
            }
    }

    function guardarDepa($nameDep,$areaDep,$auxil){
        $conectar=conectarBD();
        $insertd="insert into departamentos(nombre_departamento,area_departamento,aux_encargado) values(?,?,?)";
        try{
            $stm = $conectar->prepare($insertd);
            $stm->bind_param('sss',$nameDep,$areaDep,$auxil);
            $stm->execute();
            $stm->close();
            mysqli_close($conectar);
            return $status=1;
        }catch(Exception $e){
            die('Error al Insertar la Informacion: ' .$e->getMessage());
        }
    }

    function consultarU(){
        $conectar=conectarBD();
        $consultar="select * from usuarios";
        try{
            $rsuser=mysqli_query($conectar,$consultar);
            mysqli_close($conectar);
            return $rsuser;
        }catch(Exception $e){
            die('Error al Mostrar Informacion' .$e->getMessage());
        }
    }

    function consultarD(){
        $conectar=conectarBD();
        $consultard="select * from departamentos";
        try{
            $rsdep=mysqli_query($conectar,$consultard);
            mysqli_close($conectar);
            return $rsdep;
        }catch(Exception $e){
            die('Error al Mostrar Informacion' .$e->getMessage());
        }
    }

    function consultarT(){
        $conectar=conectarBD();
        $consultart="select id_ticket, autor_ticket, departamento, fecha_ticket, clasificacion_ticket, detalles_ticket from tickets";
        try{
            $rstic=mysqli_query($conectar,$consultart);
            mysqli_close($conectar);
            return $rstic;
        }catch(Exception $e){
            die('Error al Mostrar Informacion' .$e->getMessage());
        }
    }

    function consultarA(){
        $conectar=conectarBD();
        $consultara="select nombre_usuario from usuarios where tipo_rol = 'auxiliar'";
        try{
            $rsuser=mysqli_query($conectar,$consultara);
            mysqli_close($conectar);
            return $rsuser;
        }catch(Exception $e){
            die('Error al Mostrar Auxiliares' .$e->getMessage());
        }
    }

    function editaru($nameuser,$user,$email,$pass,$rol,$id){
        $conectar=conectarBD();
        $act="update usuarios set nombre_usuario=?, usuario=?, correo=?, contraseña=?, tipo_rol=? where id=?";
        try{
            $stm=$conectar->prepare($act);
            $stm->bind_param('sssssi',$nameuser,$user,$email,$pass,$rol,$id);
            $stm->execute();
            $stm->close();

            mysqli_close($conectar);
            return $status=1;
        }catch(Exception $e){
            die('Error al Actualizar' .$e->getMessage());
        }
    }

    function editard($namedepa,$areadep,$auxildep,$id){
        $conectar=conectarBD();
        $actd="update departamentos set nombre_departamento=?, area_departamento=?, aux_encargado=? where id_departamento=?";
        try{
           $stm=$conectar->prepare($actd);
           $stm->bind_param('sssi',$namedepa,$areadep,$auxildep,$id);
           $stm->execute();
           $stm->close();
           
           mysqli_close($conectar);
           return $status=1;
        }catch(Exception $e){
            die('Error al Actualizar' .$e->getMessage());
        }
    }

    function eliminarU($id){
        $conectar = conectarBD();
        $eli = "delete from usuarios where id = ?";
        try{
            $stm=$conectar->prepare($eli);
            $stm->bind_param('i', $id);
            $stm->execute();
            $stm->close();

            mysqli_close($conectar);
            return $status=1;
        }catch(Exception $e){
            die('Error al intentar eliminar' .$e->getMessage());
        }
    }

    function eliminarD($id){
        $conectar = conectarBD();
        $elid = "delete from departamentos where id_departamento = ?";
        try{
            $stm=$conectar->prepare($elid);
            $stm->bind_param('i', $id);
            $stm->execute();
            $stm->close();

            mysqli_close($conectar);
            return $status=1;
        }catch(Exception $e){
            die('Error al intentar eliminar' .$e->getMessage());
        }
    }