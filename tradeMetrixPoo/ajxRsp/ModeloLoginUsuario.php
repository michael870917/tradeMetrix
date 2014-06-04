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
        
    foreach($_REQUEST as $key => $value){
        $asignacion = "\$" . $key . "='" .strip_tags(($value)). "';";
		eval($asignacion);
    }
    $objetoUsuario->setUsuario($username);
    $objetoUsuario->setClaveUsuario($utilities->Encriptacion($password));
    $objUsuario=$objetoUsuarioManager->LoginUsuario($objetoUsuario);
    
    if(is_object($objUsuario)){
        echo $objUsuario->getIdUsuario().' '.$objUsuario->getNombreUsuario().' '.$objUsuario->getUsuario().' '.$objUsuario->getClaveUsuario()
        .' '.$objUsuario->getEmailUsuario().' '.$objUsuario->getTelcelUsuario().' '.$objUsuario->getTelcasaUsuario().' '.$objUsuario->getFotoUsuario()
        .' '.$objUsuario->getDomicilioUsuario().' '.$objUsuario->getIdRolUsuario().' '.$objUsuario->getRolUsuario();
    }
    
    
        
?>