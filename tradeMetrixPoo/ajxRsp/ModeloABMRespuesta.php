<?php

    session_start();
    include_once ("../config.php");        
    include_once $CFG->dataroot.'/lib/php/com/tradeMetrix/bo/Respuesta.php';    
    include_once $CFG->dataroot.'/lib/php/application/Utilities.php';
       
    //Instanceamiento de clases
    $utilities = new Utilities();    
    $objetoClass = new Respuesta();            
    $utilities->limpiarEntrada(); // Ejecutar al inicio siempre la funcion para sanear la consulta    
        
    ///Metodo 1 insercion usuarios
    foreach($_REQUEST as $key => $value){
        $asignacion = "\$" . $key . "='" .strip_tags(($value)). "';";
		eval($asignacion);
    }
    
    /*
    //Insertar respuesta        
    $objetoClass->setIdEventoRespuesta(1);
    $objetoClass->setIdPreguntaRespuesta(2);
    $objetoClass->setIdFormaRespuesta(1);
    $objetoClass->setIdUsuarioRespuesta(2);
    $objetoClass->setRespuesta("halcon");
    $id=$objetoClass->InsertaRespuesta($objetoClass);        
    if($id != false){
        echo $id;
    }else{
        echo "error";
    }
    */
    
    /*
    // Actualizar respuestas     
    $objetoClass->setIdEventoRespuesta(2);
    $objetoClass->setIdPreguntaRespuesta(1);
    $objetoClass->setIdFormaRespuesta(2);
    $objetoClass->setIdUsuarioRespuesta(1);
    $objetoClass->setRespuesta("halcones");
    $objetoClass->setIdRespuesta(12);
    
    $id=$objetoClass->ActualizaRespuesta($objetoClass);        
    if($id != false){
        echo $id;
    }else{
        echo "error";
    }
    */
    
    
    
    /*
    // Eliminar respuestas     
    $objetoClass->setIdRespuesta(10);
    $id=$objetoClass->EliminarRespuesta($objetoClass);        
    if($id != false){
        echo $id;
    }else{
        echo "error";
    }
    */
    
    
    
?>