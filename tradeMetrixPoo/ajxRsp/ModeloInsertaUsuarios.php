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
    
    ///Insercion usuarios
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
    $id=$objetoUsuarioManager->InsertaUsuario($objetoUsuario);        
    if($id != false){
        echo $id;
    }
    
    
    
    /* 
    //Insercion rol de usuario    
    $objetoUsuario->setIdRolUsuario(4);
    $objetoUsuario->setIdUsuario(4);
    $id=$objetoUsuarioManager->InsertaUsuarioRol($objetoUsuario);
    
    if($id != false){
        echo $id;
    }
    */
    
    /*
    //Insercion plaza de usuario
    $objetoUsuario->setIdPlazaUsuario(4);
    $objetoUsuario->setIdUsuario(4);
    $id=$objetoUsuarioManager->InsertaUsuarioPlaza($objetoUsuario);
    
    if($id != false){
        echo $id;
    }
    */
    
    /*
    //Insercion cc de usuario
    $objetoUsuario->setIdCCUsuario(3);
    $objetoUsuario->setIdUsuario(4);
    $id=$objetoUsuarioManager->InsertaUsuarioCC($objetoUsuario);
    
    if($id != false){
        echo $id;
    }
    */
    
    /*
    //Insercion region de usuario
    $objetoUsuario->setIdRegionUsuario(3);
    $objetoUsuario->setIdUsuario(4);
    $id=$objetoUsuarioManager->InsertaUsuarioRegion($objetoUsuario);
    
    if($id != false){
        echo $id;
    }
    */
    
    /*
    //Insercion marca de usuario
    $objetoUsuario->setIdMarcaUsuario(3);
    $objetoUsuario->setIdUsuario(4);
    $id=$objetoUsuarioManager->InsertaUsuarioMarca($objetoUsuario);
    
    if($id != false){
        echo $id;
    }
    */
    
?>