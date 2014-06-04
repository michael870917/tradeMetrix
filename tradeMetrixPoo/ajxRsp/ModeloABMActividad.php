<?php

    session_start();
    include_once ("../config.php");    
    include_once $CFG->dataroot.'/lib/php/com/tradeMetrix/bo/ActividadManagerBO.php';
    include_once $CFG->dataroot.'/lib/php/com/tradeMetrix/bo/Actividad.php';    
    include_once $CFG->dataroot.'/lib/php/application/Utilities.php';
       
    //Instanceamiento de clases
    $utilities = new Utilities();
    $objetoClassManager = new ActividadManager();
    $objetoClass = new Actividad();            
    $utilities->limpiarEntrada(); // Ejecutar al inicio siempre la funcion para sanear la consulta    
        
    ///Metodo 1 insercion usuarios
    foreach($_REQUEST as $key => $value){
        $asignacion = "\$" . $key . "='" .strip_tags(($value)). "';";
		eval($asignacion);
    }
    
    /*
    // Insertar
    $objetoClass->setIdTipoActividad(3);
    $objetoClass->setIdClasificacionActividad(2);
    $objetoClass->setDescripcionActividad("ACtividad insercion");
    $objetoClass->setPrioridadActividad(1);
    
    $id=$objetoClassManager->InsertaActividad($objetoClass);        
    if($id != false){
        echo $id;
    }
    */
    
    /*
    // Actualizar
    $objetoClass->setIdTipoActividad(1);
    $objetoClass->setIdClasificacionActividad(3);
    $objetoClass->setDescripcionActividad("Probando");
    $objetoClass->setPrioridadActividad(2);
    $objetoClass->setIdActividad(6);
    $id=$objetoClassManager->ActualizaActividad($objetoClass);        
    if($id != false){
        echo $id;
    }
    */  
    
    /*
    // eliminar    
    $objetoClass->setIdActividad(6);
    $id=$objetoClassManager->EliminarActividad($objetoClass);        
    if($id != false){
        echo $id;
    }else{
        echo "error";
    }
    */
    
    
    
?>