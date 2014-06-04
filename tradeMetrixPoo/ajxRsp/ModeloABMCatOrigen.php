<?php

    session_start();
    include_once ("../config.php");    
    include_once $CFG->dataroot.'/lib/php/com/tradeMetrix/bo/CatOrigenManagerBO.php';
    include_once $CFG->dataroot.'/lib/php/com/tradeMetrix/bo/CatalogoGenerico.php';    
    include_once $CFG->dataroot.'/lib/php/application/Utilities.php';
       
    //Instanceamiento de clases
    $utilities = new Utilities();
    $objetoClassManager = new CatOrigenManager();
    $objetoClass = new CatalogoGenerico();            
    $utilities->limpiarEntrada(); // Ejecutar al inicio siempre la funcion para sanear la consulta    
        
    ///Metodo 1 insercion usuarios
    foreach($_REQUEST as $key => $value){
        $asignacion = "\$" . $key . "='" .strip_tags(($value)). "';";
		eval($asignacion);
    }
    
    /*
    // Insertar
    $objetoClass->setDescripionCatalogo("Empresa");    
    $id=$objetoClassManager->InsertaCatOrigen($objetoClass);        
    if($id != false){
        echo $id;
    }
    */
    
    
    /*
    // Actualizar
    $catalogo = "origen distinto";
    $objetoClass->setDescripionCatalogo($catalogo);
    $objetoClass->setIdCatalogo(3);
    $id=$objetoClassManager->ActualizaCatOrigen($objetoClass);        
    if($id != false){
        echo $id;
    }
    */
    
    /*
    // eliminar    
    $objetoClass->setIdCatalogo(3);
    $id=$objetoClassManager->EliminarCatOrigen($objetoClass);        
    if($id != false){
        echo $id;
    }
    */
    
    

?>