<?php

    session_start();
    include_once ("../config.php");
    include_once $CFG->dataroot.'/lib/php/com/tradeMetrix/bo/CampaniaManagerBO.php';    
    include_once $CFG->dataroot.'/lib/php/application/Utilities.php';
       
    //Instanceamiento de clases
    $utilities = new Utilities(); 
    $objetoClassManager = new CampaniaManager();   
    $objetoClass = new Campania();
    $objetoClassRFR = new ReglaFotoRegistro();
    $objetoClassRI = new ReglaInventario();
    $objetoClassRO = new ReglaOtros();
    $objetoClassH = new Herramienta();
    
    $utilities->limpiarEntrada(); // Ejecutar al inicio siempre la funcion para sanear la consulta    
        
    ///Metodo 1 insercion usuarios
    foreach($_REQUEST as $key => $value){
        $asignacion = "\$" . $key . "='" .strip_tags(($value)). "';";
		eval($asignacion);
    }
    
    /*
    //Insertar campania
    $objetoClass->setIdMarcaCampania(1);
    $objetoClass->setNombreCampania("Campaneando");
    $objetoClass->setObjetivoCampania("Objetivo campaneando");
    $objetoClass->setObjetivoKpiCampania("Objetivo kpi campaneando");
    $objetoClass->setTypeKpiCampania("Type kpi");
    $objetoClass->setFechaIniCampania("2014-06-02 13:00:00");
    $objetoClass->setFechaFinCampania("2014-06-03 16:00:00");
    $objetoClass->setActivoCampania(1);
    $id=$objetoClassManager->InsertaCampania($objetoClass);
    if($id != false){
        echo $id;
    }else{
        echo "error";
    }
    */
    
    /*
    // Actualizar campania     
    $objetoClass->setIdMarcaCampania(2);
    $objetoClass->setNombreCampania("Probandola");
    $objetoClass->setObjetivoCampania("Objetivo Probandola");
    $objetoClass->setObjetivoKpiCampania("Objetivo kpi Probandola");
    $objetoClass->setTypeKpiCampania("Type kpi Probandola");
    $objetoClass->setFechaIniCampania("2014-06-04 13:00:00");
    $objetoClass->setFechaFinCampania("2014-06-05 16:00:00");
    $objetoClass->setActivoCampania(0);
    $objetoClass->setIdCampania(19);
    
    $id=$objetoClassManager->ActualizaCampania($objetoClass);
    if($id != false){
        echo $id;
    }else{
        echo "error";
    }
    */
    
    /*
    // Eliminar campania     
    $objetoClass->setIdCampania(22);
    $id=$objetoClassManager->EliminarCampania($objetoClass);        
    if($id != false){
        echo $id;
    }else{
        echo "error";
    }
    */
    
    
    /*   
    //Insertar  actividad campania
    $objetoClass->setIdCampania(2);    
    $objetoClass->setIdActividadCampania(2);
    $id=$objetoClassManager->InsertaActividadCampania($objetoClass);
    if($id != false){
        echo $id;
    }else{
        echo "error";
    }    
    */
    
    /*
    // Eliminar campania     
    $objetoClass->setIdCampania(2);
    $objetoClass->setIdActividadCampania(4);
    $id=$objetoClassManager->EliminarActividadCampania($objetoClass);        
    if($id != false){
        echo $id;
    }else{
        echo "error";
    }
    */
    
    /*    
    //Insertar  plaza campania
    $objetoClass->setIdPlazaCampania(3);    
    $objetoClass->setIdCampania(2);
    $objetoClass->setSimultaniedadCampania(3);
    $objetoClass->setActivacionesCampania(4);
    $objetoClass->setOutletsCampania(5);
    $id=$objetoClassManager->InsertaPlazaCampania($objetoClass);
    if($id != false){
        echo $id;
    }else{
        echo "error";
    }
    */
    
    /*
    // Eliminar campania     
    $objetoClass->setIdCampania(2);
    $objetoClass->setIdPlazaCampania(5);
    $id=$objetoClassManager->EliminarPlazaCampania($objetoClass);        
    if($id != false){
        echo $id;
    }else{
        echo "error";
    } 
    */ 
    
    /*
    //Insertar  regla fotoregistro campania
    $objetoClassRFR->setIdTipoFoto(3);    
    $objetoClassRFR->setIdCampaniaFotoRegistro(2);
    $objetoClassRFR->setCantidadFotoRegistro(3);    
    $id=$objetoClassManager->InsertaFotoRegistroCampania($objetoClassRFR);
    if($id != false){
        echo $id;
    }else{
        echo "error";
    }  
    */
    
    /*
    // Eliminar regla fotoregistro     
    $objetoClassRFR->setIdTipoFoto(4);
    $objetoClassRFR->setIdCampaniaFotoRegistro(2);
    $id=$objetoClassManager->EliminarReglaFotoRegistroCampania($objetoClassRFR);        
    if($id != false){
        echo $id;
    }else{
        echo "error";
    }  
    */
    
    
    /*
    //Insertar  regla inventario campania
    $objetoClassRI->setIdProductoInventario(2);    
    $objetoClassRI->setIdCampaniaInventario(2);
    $objetoClassRI->setUnitarioInventario(3);    
    $objetoClassRI->setCantidadInventario(3);
    $id=$objetoClassManager->InsertaInventarioCampania($objetoClassRI);
    if($id != false){
        echo $id;
    }else{
        echo "error";
    }
    */
    
    /*
    //Insertar  regla otros campania        
    $objetoClassRO->setIdCampaniaOtros(2);
    $objetoClassRO->setDescripcionOtros("observacion otros");    
    $objetoClassRO->setCantidadOtros(3);
    $id=$objetoClassManager->InsertaOtrosCampania($objetoClassRO);
    if($id != false){
        echo $id;
    }else{
        echo "error";
    }
    */
    
    /*
    // Eliminar regla inventario     
    $objetoClassRI->setIdReglaInventario(9);    
    $id=$objetoClassManager->EliminarReglaInventarioCampania($objetoClassRI);        
    if($id != false){
        echo $id;
    }else{
        echo "error";
    }
    */
    
    /*
    // Eliminar regla inventario     
    $objetoClassRO->setIdReglaOtros(3);    
    $id=$objetoClassManager->EliminarReglaOtrosCampania($objetoClassRO);        
    if($id != false){
        echo $id;
    }else{
        echo "error";
    }
    */
    
    
    /*
    //Insertar  herramienta campania        
    $objetoClassH->setIdCampaniaHerramienta(2);        
    $objetoClassH->setIdHerramienta(3);
    $id=$objetoClassManager->InsertaHerramientaCampania($objetoClassH);
    if($id != false){
        echo $id;
    }else{
        echo "error";
    }
    */
    
    /*
    // Eliminar herramienta campania     
    $objetoClassH->setIdCampaniaHerramienta(1);    
    $objetoClassH->setIdHerramienta(5);
    $id=$objetoClassManager->EliminarHerramientaCampania($objetoClassH);        
    if($id != false){
        echo $id;
    }else{
        echo "error";
    }
    */
?>