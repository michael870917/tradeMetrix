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
    

    // Eliminacion datos usuarios
    $objetoUsuario->setIdUsuario(42);    
    $id=$objetoUsuarioManager->EliminarUsuario($objetoUsuario);    
    if($id != false){
        echo $id;
    }else{
        echo "error";
    }

    
    /*    
    // Eliminacion rol usuarios
    $objetoUsuario->setIdRolUsuario(4);
    $objetoUsuario->setIdUsuario(4);    
    $id=$objetoUsuarioManager->EliminarUsuarioRol($objetoUsuario);    
    if($id != false){
        echo $id;
    }else{
        echo "error";
    }
    */
    
    /*
    // Eliminacion plaza usuarios
    $objetoUsuario->setIdPlazaUsuario(4);
    $objetoUsuario->setIdUsuario(4);    
    $id=$objetoUsuarioManager->EliminarUsuarioPlaza($objetoUsuario);    
    if($id != false){
        echo $id;
    }else{
        echo "error";
    }
    */
    
    /*
    // Eliminacion cc usuarios
    $objetoUsuario->setIdCCUsuario(3);
    $objetoUsuario->setIdUsuario(4);    
    $id=$objetoUsuarioManager->EliminarUsuarioCC($objetoUsuario);    
    if($id != false){
        echo $id;
    }else{
        echo "error";
    }
    */
    
    /*
    // Eliminacion region usuarios
    $objetoUsuario->setIdRegionUsuario(2);
    $objetoUsuario->setIdUsuario(4);    
    $id=$objetoUsuarioManager->EliminarUsuarioRegion($objetoUsuario);    
    if($id != false){
        echo $id;
    }else{
        echo "error";
    }
    */
    
    /*
    // Eliminacion region usuarios
    $objetoUsuario->setIdMarcaUsuario(3);
    $objetoUsuario->setIdUsuario(4);    
    $id=$objetoUsuarioManager->EliminarUsuarioMarca($objetoUsuario);    
    if($id != false){
        echo $id;
    }else{
        echo "error";
    }
    */
      
    

?>