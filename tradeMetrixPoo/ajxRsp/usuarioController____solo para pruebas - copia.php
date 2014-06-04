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
    
    
    /*
    ///Metodo 1 insercion usuarios
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
    */
    
    
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
    
    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    
    
    /*
    ///Metodo 2 Consulta datos ya sea de con un objeto Usuario o un array de objetos usuario
    
    // consulta normal
        //$objUsuario=$objetoUsuarioManager->BuscaUsuario();
    
    // Consulta simple (Devuelve objeto usuario) siempre debe llevar una condicional
        //$id=2;
        //$objetoUsuarioManager->ArmarCondicional("usuarios.id",Constantes::IGUAL_DB,$id);    
        //$objUsuario=$objetoUsuarioManager->BuscaUsuario(Constantes::OUTPUTSIMPLE);
    
    // Consulta lista (Devuelve un array de objetos usuario) puede o no llevar condicionales
        //$id=2;
        //$objetoUsuarioManager->ArmarCondicional("usuarios.id",Constantes::IGUAL_DB,$id);
        //$objUsuario=$objetoUsuarioManager->BuscaUsuario(Constantes::OUTPUTSLISTA);
    
    
    
    if($objUsuario){
        if(is_object($objUsuario)){            
            echo $objUsuario->getIdUsuario().' id usuario<br>';
            echo $objUsuario->getIdRolUsuario().' id rol usuario<br>';
            echo $objUsuario->getRolUsuario().' rol usuario<br>';
            echo $objUsuario->getIdPlazaUsuario().' id plaza usuario<br>';
            echo $objUsuario->getPlazaUsuario().' plaza usuario<br>';
            echo $objUsuario->getIdRegionUsuario().' id region usuario<br>';
            echo $objUsuario->getRegionUsuario().' region usuario<br>';
            echo $objUsuario->getIdCCUsuario().' id centro consumo usuario<br>';
            echo $objUsuario->getCCUsuario().' centro consumo usuario<br>';
            echo $objUsuario->getNombreUsuario().' nombre usuario<br>';
            echo $objUsuario->getUsuario().' usuario<br>';
            echo $objUsuario->getClaveUsuario().' clave usuario<br>';
            echo $objUsuario->getEmailUsuario().' email usuario<br>';
            echo $objUsuario->getTelcelUsuario().' telcel usuario<br>';
            echo $objUsuario->getTelcasaUsuario().' telcasa usuario<br>';
            echo $objUsuario->getFotoUsuario().' foto usuario<br>';
            echo $objUsuario->getDomicilioUsuario().' domicilio usuario<br>';                
        }elseif(is_array($objUsuario)){            
            foreach($objUsuario as $user){
                echo $user->getIdUsuario().' '.$user->getIdRolUsuario().' '.$user->getRolUsuario().' '.$user->getIdPlazaUsuario()
                .' '.$user->getPlazaUsuario().' '.$user->getIdRegionUsuario().' '.$user->getRegionUsuario().' '.$user->getIdCCUsuario().' halcon<br>';
            }
        }    
    }
    
    */
    
    
    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////      
    
    /*
    // Metodo 3 Actualizacion de datos
    
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
    $objetoUsuario->setIdUsuario(22);    
    $id=$objetoUsuarioManager->ActualizaUsuario($objetoUsuario);    
    if($id != false){
        echo $id;
    }else{
        echo "error";
    }
    
    */
    
    
    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    
    /*
    // Metodo 4 Eliminacion datos
    $objetoUsuario->setIdUsuario(11);    
    $id=$objetoUsuarioManager->EliminarUsuario($objetoUsuario);    
    if($id != false){
        echo $id;
    }else{
        echo "error";
    }
    */
    
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