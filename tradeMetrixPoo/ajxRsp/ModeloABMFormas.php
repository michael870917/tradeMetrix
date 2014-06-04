<?php

    session_start();
    include_once ("../config.php");    
    include_once $CFG->dataroot.'/lib/php/com/tradeMetrix/bo/FormaManagerBO.php';
    include_once $CFG->dataroot.'/lib/php/com/tradeMetrix/bo/Forma.php';    
    include_once $CFG->dataroot.'/lib/php/application/Utilities.php';
       
    //Instanceamiento de clases
    $utilities = new Utilities();
    $objetoClassManager = new FormaManager();
    $objetoClass = new Forma();            
    $utilities->limpiarEntrada(); // Ejecutar al inicio siempre la funcion para sanear la consulta    
        
    ///Metodo 1 insercion usuarios
    foreach($_REQUEST as $key => $value){
        $asignacion = "\$" . $key . "='" .strip_tags(($value)). "';";
		eval($asignacion);
    }
    
    /*
    // Insertar
    $objetoClass->setIdClasificacionForma(3);
    $objetoClass->setNombreForma("Formandola");
    $objetoClass->setStatusForma(1);
    
    $id=$objetoClassManager->InsertaForma($objetoClass);        
    if($id != false){
        echo $id;
    }
    */
    
        
    
    /*
    // Actualizar
    $objetoClass->setIdClasificacionForma(3);
    $objetoClass->setNombreForma("Probando");
    $objetoClass->setStatusForma(120);
    $objetoClass->setIdForma(8);
    $id=$objetoClassManager->ActualizaForma($objetoClass);        
    if($id != false){
        echo $id;
    }
    */
    
    /*
    // eliminar    
    $objetoClass->setIdForma(8);
    $id=$objetoClassManager->EliminarForma($objetoClass);        
    if($id != false){
        echo $id;
    }else{
        echo "error";
    }
    */
    
    
    
?>