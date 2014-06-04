<?php

    session_start();
    include_once ("../config.php");    
    include_once $CFG->dataroot.'/lib/php/com/tradeMetrix/bo/CampaniaManagerBO.php';    
    include_once $CFG->dataroot.'/lib/php/application/Utilities.php';
    //Instanceamiento de clases
    $utilities = new Utilities();
    $objetoClassManager = new CampaniaManager();
    $objetoClassActividad = new Actividad();    
    $objetoClassHerramienta = new Herramienta();
    $utilities->limpiarEntrada(); // Ejecutar al inicio siempre la funcion para sanear la consulta    
    
    
    // Consulta lista (Devuelve un array de objetos usuario) puede o no llevar condicionales
        //$id=1; 
        //$objetoClassActividad->setIdActividad($id);                                       
        //$objClass=$objetoClassManager->BusquedaCampaniaActividad($objetoClassActividad);
        
        
        // Consulta lista (Devuelve un array de objetos usuario) puede o no llevar condicionales
        $id=1; 
        $objetoClassHerramienta->setIdHerramienta($id);                                       
        $objClass=$objetoClassManager->BusquedaCampaniaHerramienta($objetoClassHerramienta);
    
    
    /*
    if($objClass){
        if(is_array($objClass)){            
            foreach($objClass as $tablero){
                echo $tablero->getIdActividad().' ------> '.$tablero->getIdTipoActividad().' ------> '.$tablero->getTipoActividad()
                .' ------> '.$tablero->getIdClasificacionActividad().' ------> '.$tablero->getClasificacionActividad()
                .' ------> '.$tablero->getDescripcionActividad()
                .' ------> '.$tablero->getPrioridadActividad().' ------>  <br>';
                
                echo $tablero->getListFormaActividad()->getIdForma(). ' ------> '.$tablero->getListFormaActividad()->getIdActividadForma()
                . ' ------> '.$tablero->getListFormaActividad()->getIdClasificacionForma(). ' ------> '.$tablero->getListFormaActividad()->getClasificacionForma()
                . ' ------> '.$tablero->getListFormaActividad()->getNombreForma(). ' ------> '.$tablero->getListFormaActividad()->getStatusForma()
                . ' ------> '.$tablero->getListFormaActividad()->getListPreguntasForma().'<br>';
                
                foreach($tablero->getListFormaActividad()->getListPreguntasForma() as $dataSet){
                    
                    
                    echo $dataSet->getIdPregunta().' ------> '.$dataSet->getIdFormaPregunta().' ------> '.$dataSet->getIdTipoPregunta()
                    .' ------> '.$dataSet->getIdTipoRespuestaPregunta().' ------> '.$dataSet->getIdClasificacionRespuestaPregunta()
                    .' ------> '.$dataSet->getPregunta().' ------> '.$dataSet->getListRespuestas().' ------> '.$dataSet->getListOpciones().'<br>';
                    
                    if($dataSet->getListRespuestas() != false){
                        foreach($dataSet->getListRespuestas() as $dataSetR){                        
                            echo $dataSetR->getIdRespuesta().' ------> '.$dataSetR->getIdEventoRespuesta().' ------> '.$dataSetR->getIdPreguntaRespuesta()
                            .' ------> '.$dataSetR->getIdFormaRespuesta().' ------> '.$dataSetR->getIdUsuarioRespuesta().' ------> '.$dataSetR->getRespuesta().'<br>';
                            
                        }    
                    }
                    
                    if($dataSet->getListOpciones() != false){
                        foreach($dataSet->getListOpciones() as $dataSetO){
                            echo $dataSetO->getIdOpcion().' ------> '.$dataSetO->getIdPreguntaOpcion().' ------> '.$dataSetO->getIdOpcionElegir()
                            .' ------> '.$dataSetO->getObservacionOpcion().' ------> '.$dataSetO->getRequeridoOpcion().'<br>';
                        }    
                    }
                    
                    
                }
            }
        }    
    }else{
        echo "error";
    }
    */
    
    if($objClass){
        if(is_array($objClass)){            
            foreach($objClass as $desglose){
                echo $desglose->getIdHerramienta().' ------> '.$desglose->getHerramienta().' ------> '.$desglose->getIdCampaniaHerramienta().'<br>';
            }
        }
    }

?>