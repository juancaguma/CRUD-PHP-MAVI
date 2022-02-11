<?php
    include ('../base_datos/conexion.php');
    $accion=$_POST["accion"];
    if($accion==1){ //Add
        $nombre      =  $_POST["nombre"];
        $ape_paterno =  $_POST["ape_pat"];
        $ape_materno =  $_POST["ape_mat"];
        $domicilio   =  $_POST["direcc"];
        $email       =  $_POST["email"];
        add_cliente($nombre,$ape_paterno,$ape_materno,$domicilio,$email,$conexion);
    }else if ($accion==2) { //Update
        $nombre      =  $_POST["nombre"];
        $ape_paterno =  $_POST["ape_pat"];
        $ape_materno =  $_POST["ape_mat"];
        $domicilio   =  $_POST["direcc"];
        $email       =  $_POST["email"];
        $id_user     =  $_POST["id"];
        update_cliente($nombre,$ape_paterno,$ape_materno,$domicilio,$email,$conexion,$id_user);
    }else if ($accion==3) { //Delete
        $id_user=$_POST["id_user"];
        borrar_cliente($id_user,$conexion);
    }else if ($accion==4) { //Get datos
        getClientes($conexion);
    }

    function add_cliente($nombre,$ape_paterno,$ape_materno,$domicilio,$email,$conexion){
        
        $sql = "INSERT INTO clientes 
                    ( nombre, ape_paterno, ape_materno, domicilio, email ) 
                VALUES 
                    ('$nombre','$ape_paterno','$ape_materno','$domicilio','$email') "; 

        $query = $conexion->prepare($sql);
        if ($query->execute()) {
            echo 1;
        }else{
                echo 0;
        }
    }

    function getClientes($conexion){
        $sql = "select * from clientes where borrado =0"; 

        $query = $conexion->prepare($sql);
        $query->execute();
        $datos = $query->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($datos);
    }

    function borrar_cliente($id_user,$conexion){
        $sql = "delete from clientes where id = $id_user "; 

        $query = $conexion->prepare($sql);
        $query->execute();
        echo 1;
    }
    function update_cliente($nombre,$ape_paterno,$ape_materno,$domicilio,$email,$conexion,$id_user){
        $sql= "UPDATE clientes SET nombre= '$nombre', ape_paterno='$ape_paterno', ape_materno='$ape_materno', domicilio='$domicilio', email='$email' WHERE id=$id_user";
        $query = $conexion->prepare($sql);
        if ($query->execute()) {
           echo 1;
        }else{
            echo 0;
        }
    }
?>
