<?php

    session_start();
    include_once ("../config.php");        
    include_once $CFG->dataroot.'/lib/php/com/tradeMetrix/bo/Opcion.php';    
    include_once $CFG->dataroot.'/lib/php/application/Utilities.php';
       
    //Instanceamiento de clases
    $utilities = new Utilities();    
    $objetoClass = new Opcion();            
    $utilities->limpiarEntrada(); // Ejecutar al inicio siempre la funcion para sanear la consulta    
        
    ///Metodo 1 insercion usuarios
    foreach($_REQUEST as $key => $value){
        $asignacion = "\$" . $key . "='" .strip_tags(($value)). "';";
		eval($asignacion);
    }
    
    /*
    //Insertar opcion        
    $objetoClass->setIdPreguntaOpcion(1);
    $objetoClass->setIdOpcionElegir(1);
    $objetoClass->setObservacionOpcion("hola");
    $objetoClass->setRequeridoOpcion(1);
    $id=$objetoClass->InsertaOpcion($objetoClass);        
    if($id != false){
        echo $id;
    }else{
        echo "error";
    }
    */
    
    /*
    // Actualizar opcion     
    $objetoClass->setIdPreguntaOpcion(2);
    $objetoClass->setIdOpcionElegir(2);
    $objetoClass->setObservacionOpcion("adios");
    $objetoClass->setRequeridoOpcion(2);
    $objetoClass->setIdOpcion(3);    
    $id=$objetoClass->ActualizaOpcion($objetoClass);        
    if($id != false){
        echo $id;
    }else{
        echo "error";
    }
    */
    
    
    
    /*
    // Eliminar opcion     
    $objetoClass->setIdOpcion(7);
    $id=$objetoClass->EliminarOpcion($objetoClass);        
    if($id != false){
        echo $id;
    }else{
        echo "error";
    }
    */
    
    
    
?>