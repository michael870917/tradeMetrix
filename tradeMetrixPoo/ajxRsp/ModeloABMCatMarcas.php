<?php

    session_start();
    include_once ("../config.php");    
    include_once $CFG->dataroot.'/lib/php/com/tradeMetrix/bo/CatMarcaManagerBO.php';
    include_once $CFG->dataroot.'/lib/php/com/tradeMetrix/bo/Marca.php';    
    include_once $CFG->dataroot.'/lib/php/application/Utilities.php';
       
    //Instanceamiento de clases
    $utilities = new Utilities();
    $objetoClassManager = new CatMarcaManager();
    $objetoClass = new Marca();            
    $utilities->limpiarEntrada(); // Ejecutar al inicio siempre la funcion para sanear la consulta    
        
    ///Metodo 1 insercion usuarios
    foreach($_REQUEST as $key => $value){
        $asignacion = "\$" . $key . "='" .strip_tags(($value)). "';";
		eval($asignacion);
    }
    
    /*
    // Insertar
    $objetoClass->setMarca("huizache");
    $objetoClass->setAcronimoMarca("huizachito");
    $objetoClass->setCategoriaMarca("Mezcal");    
    $id=$objetoClassManager->InsertaCatMarca($objetoClass);        
    if($id != false){
        echo $id;
    }
    */
        
    
    /*
    // Actualizar
    $objetoClass->setMarca("huizache");
    $objetoClass->setAcronimoMarca("huizachito");
    $objetoClass->setCategoriaMarca("Mescal");
    $objetoClass->setIdMarca(6);
    $id=$objetoClassManager->ActualizaCatMarca($objetoClass);        
    if($id != false){
        echo $id;
    }
    */
    
    /*
    // eliminar    
    $objetoClass->setIdMarca(7);
    $id=$objetoClassManager->EliminarCatMarca($objetoClass);        
    if($id != false){
        echo $id;
    }else{
        echo "error";
    }
    */
    
    
?>