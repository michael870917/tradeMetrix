<?php

    session_start();
    include_once ("../config.php");    
    include_once $CFG->dataroot.'/lib/php/com/tradeMetrix/bo/UsuarioManagerBO.php';
    include_once $CFG->dataroot.'/lib/php/com/tradeMetrix/bo/Usuario.php';
    include_once $CFG->dataroot.'/lib/php/application/Utilities.php';
       
    //Instanceamiento de clases
    $utilities = new Utilities();
    $objetoUsuarioManager = new UsuarioManager();
    $objetoUsuario = new Usuario();        
    $utilities->limpiarEntrada(); // Ejecutar al inicio siempre la funcion para sanear la consulta    
    
    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////      
    

    // Actualizacion de datos
    
    foreach($_REQUEST as $key => $value){
        $asignacion = "\$" . $key . "='" .strip_tags(($value)). "';";
		eval($asignacion);
    }
    $objetoUsuario->setNombreUsuario($nombre);
    $objetoUsuario->setUsuario($usuario);
    $objetoUsuario->setClaveUsuario($utilities->Encriptacion($clave));
    $objetoUsuario->setEmailUsuario($email);
    $objetoUsuario->setTelcelUsuario($celular);
    $objetoUsuario->setTelcasaUsuario($casa);
    $objetoUsuario->setDomicilioUsuario($domicilio);
    $objetoUsuario->setIdUsuario(5);    
    $id=$objetoUsuarioManager->ActualizaUsuario($objetoUsuario);    
    if($id != false){
        echo $id;
    }else{
        echo "error";
    }
    
?>