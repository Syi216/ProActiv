<?php 
require_once "db.class.php";
class proyectos extends database{
    //Funcion proyectos activos 
    function proyAct($idUsuario){
        //Abrimos la conexion
        $link = $this->conectar();
        //Guardamos el query a ejecutar
        $query = "SELECT * FROM proyecto p INNER JOIN usuario_proyecto up on (p.IDPROYECTO=up.IDPROYECTO) WHERE p.ESTADO='A' and up.IDUSUARIO=".$idUsuario." ORDER BY FEFINPRO ASC LIMIT 3";
        //Ejecutamos el query
        $result = mysqli_query($link,$query);
        //Guardamos el resultado en un arreglo
        while ( $tsArray = mysqli_fetch_array($result) ){
            $data[] = $tsArray;   
        }
        //Cerramos la conexion
        return $data;
        mysqli_close($link);
    }
    //Funcion para ver todos los proyectos del usuario
    function proyUsr($idUsuario,$modo){
        if($modo=='N'){
            //Abrimos la conexion
            $link = $this->conectar();
            //Guardamos el query a ejecutar
            $query = "SELECT * FROM proyecto p INNER JOIN usuario_proyecto up on (p.IDPROYECTO=up.IDPROYECTO) WHERE up.IDUSUARIO=".$idUsuario." ORDER BY FEFINPRO ASC";
            //Ejecutamos el query
            $result = mysqli_query($link,$query);
            //Guardamos el resultado en un arreglo
            
            while ($tsArray = mysqli_fetch_array($result)){
                $data[] = $tsArray;   
            }
            //Cerramos la conexion  
            return $data;
            mysqli_close($link);
        }
        else{
            $link = $this->conectar();
            $query = "SELECT * FROM proyecto ORDER BY  FEFINPRO ASC";
            $result = mysqli_query($link,$query);
            while ($tsArray = mysqli_fetch_array($result)){
                $data[] = $tsArray;   
            }
            return $data;
            mysqli_close($link);
        }    
    }
    //generar informe de proyectos en PDF
    function getInfPro($idProyecto){
        $link = $this->conectar();
        $query="select * from proyecto where IDPROYECTO=".$idProyecto;
        $result = mysqli_query($link,$query);
        $tsArray = mysqli_fetch_assoc($result);
        return $tsArray;
        mysqli_close($link);
    }
    // obtener integrantes del proyecto
    function getIntPro($idProyecto){
        $link = $this->conectar();
        $query = 'select * from usuario u inner join usuario_proyecto up on (u.IDUSUARIO=up.IDUSUARIO) where up.IDPROYECTO='.$idProyecto;
        $result = mysqli_query($link,$query);
        while ($tsArray = mysqli_fetch_array($result)){
            $data[] = $tsArray;   
        }
        return $data;
        mysqli_close($link);
    }
    function getActInf($idProyecto){
        $link = $this->conectar();
        $query = "select * from actividad where IDPROYECTO=".$idProyecto;
        $result = mysqli_query($link,$query);
        while ($tsArray = mysqli_fetch_array($result)){
            $data[] = $tsArray;
        }
        return $data;
        mysqli_close($link);
    }
    function getIntAct($idActividad){
        $link = $this->conectar();
        $query = "SELECT * FROM usuario u INNER JOIN usuario_actividad ua on (u.IDUSUARIO=ua.IDUSUARIO) WHERE ua.IDACTIVIDAD =".$idActividad;
        $result = mysqli_query($link,$query);
        while ($tsArray = mysqli_fetch_array($result)){
            $data[] = $tsArray;
        }
        return $data;
        mysqli_close($link);
    }
}

?>