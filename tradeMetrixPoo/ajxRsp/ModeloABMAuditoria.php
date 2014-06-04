<?php

    session_start();
    include_once ("../config.php");    
    include_once $CFG->dataroot.'/lib/php/com/tradeMetrix/bo/AuditoriaManagerBO.php';
    include_once $CFG->dataroot.'/lib/php/com/tradeMetrix/bo/Auditoria.php';    
    include_once $CFG->dataroot.'/lib/php/application/Utilities.php';
       
    //Instanceamiento de clases
    $utilities = new Utilities();
    $objetoClassManager = new AuditoriaManager();
    $objetoClass = new Auditoria();            
    $utilities->limpiarEntrada(); // Ejecutar al inicio siempre la funcion para sanear la consulta    
        
    ///Metodo 1 insercion usuarios
    foreach($_REQUEST as $key => $value){
        $asignacion = "\$" . $key . "='" .strip_tags(($value)). "';";
		eval($asignacion);
    }
    
    /*
    //Insertar auditoria
    $objetoClass->setFechaAuditoria("2014-05-27 00:00:00");
    $objetoClass->setPeriodoIniAuditoria("2014-05-26 09:00:00");
    $objetoClass->setPeriodoFinAuditoria("2014-05-26 15:00:00");
    $id=$objetoClassManager->InsertaAuditoria($objetoClass);        
    if($id != false){
        echo $id;
    }else{
        echo "error";
    }
    */
    
    /*
    //Insertar usuario to auditoria
    $objetoClass->setIdAuditoria(2);
    $objetoClass->setIdUsuarioAuditoria(1);    
    $id=$objetoClassManager->InsertaUsuarioAuditoria($objetoClass);        
    if($id != false){
        echo $id;
    }else{
        echo "error";
    }
    */
    
    /*
    // Actualizar    
    $objetoClass->setFechaAuditoria("2014-05-30 00:00:00");
    $objetoClass->setPeriodoIniAuditoria("2014-05-30 09:00:00");
    $objetoClass->setPeriodoFinAuditoria("2014-05-30 15:00:00");
    $objetoClass->setIdAuditoria(5);
    $id=$objetoClassManager->ActualizaAuditoria($objetoClass);        
    if($id != false){
        echo $id;
    }else{
        echo "error";
    }
    */
    
    /*
    // Eliminar auditoria     
    $objetoClass->setIdAuditoria(6);
    $id=$objetoClassManager->EliminarAuditoria($objetoClass);        
    if($id != false){
        echo $id;
    }else{
        echo "error";
    }
    */
    
    
    /*
    // Eliminar  usuario to auditoria  
    $objetoClass->setIdAuditoria(2);
    $objetoClass->setIdUsuarioAuditoria(1);    
    $id=$objetoClassManager->EliminarUsuarioAuditoria($objetoClass);        
    if($id != false){
        echo $id;
    }else{
        echo "error";
    }
    */
?>