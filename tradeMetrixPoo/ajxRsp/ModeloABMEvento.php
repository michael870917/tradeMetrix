<?php

    session_start();
    include_once ("../config.php");    
    include_once $CFG->dataroot.'/lib/php/com/tradeMetrix/bo/EventoManagerBO.php';
    include_once $CFG->dataroot.'/lib/php/com/tradeMetrix/bo/Evento.php';    
    include_once $CFG->dataroot.'/lib/php/application/Utilities.php';
       
    //Instanceamiento de clases
    $utilities = new Utilities();
    $objetoClassManager = new EventoManager();
    $objetoClass = new Evento();            
    $utilities->limpiarEntrada(); // Ejecutar al inicio siempre la funcion para sanear la consulta    
        
    ///Metodo 1 insercion usuarios
    foreach($_REQUEST as $key => $value){
        $asignacion = "\$" . $key . "='" .strip_tags(($value)). "';";
		eval($asignacion);
    }
    
    /*
    //Insertar evento
    $objetoClass->setIdCampaniaEvento(1);
    $objetoClass->setIdCCEvento(1);
    $objetoClass->setFechaEvento("2014-06-01");
    $objetoClass->setHorainiEvento("2014-06-01 09:00:00");
    $objetoClass->setHorafinEvento("2014-06-01  17:00:00");
    $objetoClass->setActivoEvento(1);        
    $id=$objetoClassManager->InsertaEvento($objetoClass);        
    if($id != false){
        echo $id;
    }else{
        echo "error";
    }
    */
    
    /*
    //Insertar evento to usuario
    $objetoClass->setIdEvento(2);
    $objetoClass->setIdUsuarioToEvento(1);    
    $id=$objetoClassManager->InsertaEventoToUsuario($objetoClass);        
    if($id != false){
        echo $id;
    }else{
        echo "error";
    }
    */
    
    /*
    // Actualizar  evento  
    $objetoClass->setIdCampaniaEvento(1);
    $objetoClass->setIdCCEvento(1);
    $objetoClass->setFechaEvento("2014-06-01");
    $objetoClass->setHorainiEvento("2014-06-01 09:00:00");
    $objetoClass->setHorafinEvento("2014-06-01  17:00:00");
    $objetoClass->setActivoEvento(1);
    $objetoClass->setIdEvento(5);
    $id=$objetoClassManager->ActualizaEvento($objetoClass);        
    if($id != false){
        echo $id;
    }else{
        echo "error";
    }
    */
    
    /*
    // Actualizar  evento id cc      
    $objetoClass->setIdCCEvento(1);    
    $objetoClass->setIdEvento(4);
    $id=$objetoClassManager->ActualizaEventoIdCC($objetoClass);        
    if($id != false){
        echo $id;
    }else{
        echo "error";
    }
    */
    
    /*
    // Eliminar evento     
    $objetoClass->setIdEvento(6);
    $id=$objetoClassManager->EliminarEvento($objetoClass);        
    if($id != false){
        echo $id;
    }else{
        echo "error";
    }
    */
    
    
    /*
    // Eliminar  evento to usuario  
    $objetoClass->setIdEvento(2);
    $objetoClass->setIdUsuarioToEvento(1);    
    $id=$objetoClassManager->EliminarEventoToUsuario($objetoClass);        
    if($id != false){
        echo $id;
    }else{
        echo "error";
    }
    */
    
    
    /*
    //Insertar evento to regla fotoregistro
    $objetoClass->setIdEvento(2);
    $objetoClass->setIdReglaToEvento(1);
    $objetoClass->setCumplirToEvento(1);    
    $id=$objetoClassManager->InsertaEventoToReglasFotoRegistro($objetoClass);        
    if($id != false){
        echo $id;
    }else{
        echo "error";
    }
    */
    
    /*
    //Insertar evento to regla inventarios
    $objetoClass->setIdEvento(2);
    $objetoClass->setIdReglaToEvento(1);
    $objetoClass->setCumplirToEvento(1);    
    $id=$objetoClassManager->InsertaEventoToReglasInventario($objetoClass);        
    if($id != false){
        echo $id;
    }else{
        echo "error";
    }
    */
    
    
    //Insertar evento to regla otros
    $objetoClass->setIdEvento(2);
    $objetoClass->setIdReglaToEvento(1);
    $objetoClass->setCumplirToEvento(1);    
    $id=$objetoClassManager->InsertaEventoToReglasOtros($objetoClass);        
    if($id != false){
        echo $id;
    }else{
        echo "error";
    }    
    
?>