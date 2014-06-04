<?php

    session_start();
    include_once ("../config.php");    
    include_once $CFG->dataroot.'/lib/php/com/tradeMetrix/bo/CatHerramientaManagerBO.php';
    include_once $CFG->dataroot.'/lib/php/com/tradeMetrix/bo/CatalogoGenerico.php';    
    include_once $CFG->dataroot.'/lib/php/application/Utilities.php';
       
    //Instanceamiento de clases
    $utilities = new Utilities();
    $objetoClassManager = new CatHerramientaManager();
    $objetoClass = new CatalogoGenerico();            
    $utilities->limpiarEntrada(); // Ejecutar al inicio siempre la funcion para sanear la consulta    
        
    ///Metodo 1 insercion usuarios
    foreach($_REQUEST as $key => $value){
        $asignacion = "\$" . $key . "='" .strip_tags(($value)). "';";
		eval($asignacion);
    }
    
    /*
    // Insertar
    $objetoClass->setDescripionCatalogo("Herramienta 6");    
    $id=$objetoClassManager->InsertaCatHerramienta($objetoClass);        
    if($id != false){
        echo $id;
    }
    */
    
    
    /*
    // Actualizar
    $herramienta = "Herramienta cambio";
    $objetoClass->setDescripionCatalogo($herramienta);
    $objetoClass->setIdCatalogo(7);
    $id=$objetoClassManager->ActualizaCatHerramienta($objetoClass);        
    if($id != false){
        echo $id;
    }
    */
    
    /*
    // eliminar    
    $objetoClass->setIdCatalogo(7);
    $id=$objetoClassManager->EliminarCatHerramienta($objetoClass);        
    if($id != false){
        echo $id;
    }
    */
    

?>