<?php

    session_start();
    include_once ("../config.php");    
    include_once $CFG->dataroot.'/lib/php/com/tradeMetrix/bo/CatRolesManagerBO.php';
    include_once $CFG->dataroot.'/lib/php/com/tradeMetrix/bo/CatalogoGenerico.php';    
    include_once $CFG->dataroot.'/lib/php/application/Utilities.php';
       
    //Instanceamiento de clases
    $utilities = new Utilities();
    $objetoClassManager = new CatRolesManager();
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
    $id=$objetoClassManager->InsertaCatRoles($objetoClass);        
    if($id != false){
        echo $id;
    }
    */
    
    /*
    // Actualizar
    $catalogo = "probador";
    $objetoClass->setDescripionCatalogo($catalogo);
    $objetoClass->setIdCatalogo(6);
    $id=$objetoClassManager->ActualizaCatRoles($objetoClass);        
    if($id != false){
        echo $id;
    }
    */
    
    
    // eliminar    
    $objetoClass->setIdCatalogo(6);
    $id=$objetoClassManager->EliminarCatRoles($objetoClass);        
    if($id != false){
        echo $id;
    }
    
    
    
    

?>