<?php
require 'app/controller/mvc.controller.php';
require 'app/model/seguridad.class.php';
     //se instancia al controlador 
 $mvc = new mvc_controller();
 $seguridad = new seguridad();
 error_reporting(E_ALL ^ E_NOTICE);
 if($error=$seguridad->restringir_session()) //muestra el login
 {
   echo "prueba";
   echo $mvc->login($error);
 }
//Cerrar_sesion
 else if($_GET['action']=='logout'&&isset($_SESSION['USUARIO']))
 {
   echo $mvc->logout();
 }
 
 //Login action
 else if ($_GET['action']=='login'){
  echo $mvc->login_action($_POST['usuario'],$_POST['contraseña']);
  //si no hay sesión
 }
 //Visualizar proyectos
 else if ($_GET['action']=='verProy'){
  echo $mvc->visualizar_proyectos();
 }
 //Generar pdf
 else if ($_GET['action']=='generarPDF'){
  echo $mvc->generarInforme_pdf($_GET['idProy']);
 }

 else if ($_GET['action']=='visualizarProyecto'){
  echo $mvc->visualizar_proyecto($_GET['idProy']);
 }

 else if ($_GET['action']=='verActividad'){
  echo $mvc->visualizar_actividad($_GET['idAct']);
  }

  else if ($_GET['action']=='modProy'){
  echo $mvc->modificar_proyecto($_GET['idProy']);
 }

 else if ($_GET['action']=='editAct'){
  echo $mvc->modificar_actividad($_GET['idAct']);
 }



 else if ($_GET['action']=='crearProyecto'){
  echo $mvc->crear_proyecto();
 }

 else if ($_GET['action']=='crearAct'){
    echo $mvc->crear_act($_GET['idProy']);
   }

 else if ($_GET['action']=='miperfil'){
  echo $mvc->mi_perfil("",0);
 }

 else if ($_GET['action']=='maneUsus'){
        include "app/model/mcript.php"; 
        echo $mvc->mi_perfil(urldecode($desencriptar($_GET['idusu'])),0);
 }
  else if ($_GET['action']=='visUsu'){
  echo $mvc->perfiles();
 }
 else if ($_GET['action']=='editPer'){
    include "app/model/mcript.php"; 
    echo $mvc->mi_perfil(urldecode($desencriptar($_GET['idusu2'])),1);
 }
 else if($_GET['action']=='vaUsu'){
     echo $mvc->vaUsu();
 }
  else if($_GET['action']=='aUsu'){
      $datos=[
          'nombre'=> $_POST['nom'],
          'ap'=>$_POST['ap'],
          'am'=>$_POST['am'],
          'nac'=>$_POST['nac'],
          'gen'=>$_POST['gen'],
          'nomus'=>$_POST['nomus'],
          'tel'=>$_POST['tel'],
          'correo'=>$_POST['correo'],
          'contraseña'=>$_POST['pass'],
          'tip'=>$_POST['tip'],
      ];
     echo $mvc->aUsu($datos);
 }

 else if ($_GET['action']=='crearActividad'){
  $datos=[
      'idProyecto'=> $_POST['idProyecto'],
      'nombre_act'=>$_POST['nombre_act'],
      'desc_act'=>$_POST['desc_act'],
      'fec_ini'=>$_POST['fec_ini'],
      'fec_fin'=>$_POST['fec_fin'],
  ];
  echo $mvc->crearActividad($datos);
}

 else if($_GET['action']=='crearProy'){
  $datos=[
      'nombre_proy'=> $_POST['nombre_proy'],
      'desc_proy'=>$_POST['desc_proy'],
      'fec_ini'=>$_POST['fec_ini'],
      'fec_fin'=>$_POST['fec_fin'],
  ];
 echo $mvc->crearProy($datos);
}

 else if($_GET['action']=='eper'){
     $datos1=[
          'nombre'=> $_POST['nom'],
          'ap'=>$_POST['ap'],
          'am'=>$_POST['am'],
          'nac'=>$_POST['nac'],
          'gen'=>$_POST['gen'],
          'nomus'=>$_POST['nomus'],
          'tel'=>$_POST['tel'],
          'correo'=>$_POST['correo'],
          'contraseña'=>$_POST['pass'],
          'tip'=>$_POST['tip'],
          'id'=>$_POST['id'],
      ];
    echo $mvc->editP($datos1);
     
 }
else if($_GET['action']=='modPro'){
    $Texto_ID = $_POST['TextoID'];
    $ArrayID = explode(',', $Texto_ID);
    $TextoRol = $_POST['TextoRoles'];
    $ArrayRol= explode(',', $TextoRol);

     $datos1=[
         'id' => $_POST['TextoIDProyecto'],
         'Proyecto' => $_POST['nombre_Pro'],
         'Desc' => $_POST['Desc_Pro'],
         'fechaIni' => $_POST['trip-start'],
         'fechaFin' => $_POST['trip-end'],
         'estado' => $_POST['estado']                 
          
      ];
    echo $mvc->FmodProy($datos1,$ArrayID,$ArrayRol);
     
 }

 else if($_GET['action']=='modAct'){
    $Texto_ID = $_POST['TextoIDUSU'];
    $ArrayID = explode(',', $Texto_ID);
    
     $datos1=[
         'id' => $_POST['TextoIDActividad'],
         'Actividad' => $_POST['nombre_Act'],
         'Desc' => $_POST['Desc_Act'],
         'fechaIni' => $_POST['trip-start'],
         'fechaFin' => $_POST['trip-end'],
         'estado' => $_POST['estado']

          
      ];
    echo $mvc->FmodAct($datos1,$ArrayID);
     
 }

 else if(isset($_SESSION['USUARIO']))//muestra la pantalla princripal
 {
  echo $mvc->principal();
 }
 else{
  echo $mvc->login(NULL);
 }
?>