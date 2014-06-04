<?php

    session_start();
    include_once ("../config.php");    
    include_once $CFG->dataroot.'/lib/php/com/tradeMetrix/bo/CatPlazaManagerBO.php';
    include_once $CFG->dataroot.'/lib/php/com/tradeMetrix/bo/Plaza.php';    
    include_once $CFG->dataroot.'/lib/php/application/Utilities.php';
       
    //Instanceamiento de clases
    $utilities = new Utilities();
    $objetoClassManager = new CatPlazaManager();
    $objetoClass = new Plaza();            
    $utilities->limpiarEntrada(); // Ejecutar al inicio siempre la funcion para sanear la consulta    
        
    ///Metodo 1 insercion usuarios
    foreach($_REQUEST as $key => $value){
        $asignacion = "\$" . $key . "='" .strip_tags(($value)). "';";
		eval($asignacion);
    }
    
    /*
    // Insertar
    $objetoClass->setIdRegionPlaza(3);
    $objetoClass->setDistritoPlaza("GDA occidente");        
    $id=$objetoClassManager->InsertaCatPlaza($objetoClass);        
    if($id != false){
        echo $id;
    }
    */
        
    
    /*
    // Actualizar
    $objetoClass->setIdRegionPlaza(4);
    $objetoClass->setDistritoPlaza("MTY centro");
    $objetoClass->setIdPlaza(7);
    $id=$objetoClassManager->ActualizaCatPlaza($objetoClass);        
    if($id != false){
        echo $id;
    }
    */
    
    /*
    // eliminar    
    $objetoClass->setIdPlaza(8);
    $id=$objetoClassManager->EliminarCatPlaza($objetoClass);        
    if($id != false){
        echo $id;
    }else{
        echo "error";
    }
    */
    
    
?>