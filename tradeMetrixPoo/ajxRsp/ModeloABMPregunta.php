<?php

    session_start();
    include_once ("../config.php");
    include_once $CFG->dataroot.'/lib/php/com/tradeMetrix/bo/Pregunta.php';    
    include_once $CFG->dataroot.'/lib/php/application/Utilities.php';
       
    //Instanceamiento de clases
    $utilities = new Utilities();    
    $objetoClass = new Pregunta();
    $utilities->limpiarEntrada(); // Ejecutar al inicio siempre la funcion para sanear la consulta    
        
    ///Metodo 1 insercion usuarios
    foreach($_REQUEST as $key => $value){
        $asignacion = "\$" . $key . "='" .strip_tags(($value)). "';";
		eval($asignacion);
    }
    
    /*
    //Insertar pregunta        
    $objetoClass->setIdFormaPregunta(1);
    $objetoClass->setIdTipoPregunta(2);
    $objetoClass->setIdTipoRespuestaPregunta(1);
    $objetoClass->setIdClasificacionRespuestaPregunta(2);
    $objetoClass->setPregunta("preguntando");
    $id=$objetoClass->InsertaPregunta($objetoClass);
    if($id != false){
        echo $id;
    }else{
        echo "error";
    }
    */
    
    /*
    // Actualizar pregunta     
    $objetoClass->setIdFormaPregunta(2);
    $objetoClass->setIdTipoPregunta(1);
    $objetoClass->setIdTipoRespuestaPregunta(2);
    $objetoClass->setIdClasificacionRespuestaPregunta(1);
    $objetoClass->setPregunta("preguntandole");
    $objetoClass->setIdPregunta(7);
    $id=$objetoClass->ActualizaPregunta($objetoClass);
    if($id != false){
        echo $id;
    }else{
        echo "error";
    }
    */
    
    /*
    // Eliminar pregunta     
    $objetoClass->setIdPregunta(6);
    $id=$objetoClass->EliminarPregunta($objetoClass);        
    if($id != false){
        echo $id;
    }else{
        echo "error";
    }
    */
    
    
    
    
?>