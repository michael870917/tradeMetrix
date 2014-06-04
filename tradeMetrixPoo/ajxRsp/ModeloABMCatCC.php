<?php

    session_start();
    include_once ("../config.php");    
    include_once $CFG->dataroot.'/lib/php/com/tradeMetrix/bo/CentroConsumoManagerBO.php';
    include_once $CFG->dataroot.'/lib/php/com/tradeMetrix/bo/CentroConsumo.php';    
    include_once $CFG->dataroot.'/lib/php/application/Utilities.php';
       
    //Instanceamiento de clases
    $utilities = new Utilities();
    $objetoClassManager = new CentroConsumoManager();
    $objetoClass = new CentroConsumo();            
    $utilities->limpiarEntrada(); // Ejecutar al inicio siempre la funcion para sanear la consulta    
        
    ///Metodo 1 insercion usuarios
    foreach($_REQUEST as $key => $value){
        $asignacion = "\$" . $key . "='" .strip_tags(($value)). "';";
		eval($asignacion);
    }
    
    /*
    // Insertar
    $objetoClass->setIdPlazaCC(3);
    $objetoClass->setNombreCC("Mi villita");
    $objetoClass->setGeolngCC("56456456.34");
    $objetoClass->setGeolatCC("12412323.78");
    $objetoClass->setDireccionCC("La villa olimpica");
    $objetoClass->setAforoCC(3500);
    $id=$objetoClassManager->InsertaCatCC($objetoClass);        
    if($id != false){
        echo $id;
    }
    */        
    
    /*
    // Actualizar
    $objetoClass->setIdPlazaCC(5);
    $objetoClass->setNombreCC("probador");
    $objetoClass->setGeolngCC("12121212.12");
    $objetoClass->setGeolatCC("1313131313.13");
    $objetoClass->setDireccionCC("Probador");
    $objetoClass->setAforoCC(4500);
    $objetoClass->setIdCC(8);
    $id=$objetoClassManager->ActualizaCatCC($objetoClass);        
    if($id != false){
        echo $id;
    }
    */
    
    /*
    // eliminar    
    $objetoClass->setIdCC(8);
    $id=$objetoClassManager->EliminarCatCC($objetoClass);        
    if($id != false){
        echo $id;
    }else{
        echo "error";
    }
    */
    
    
?>