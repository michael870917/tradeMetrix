<?php

    session_start();
    include_once ("../config.php");    
    include_once $CFG->dataroot.'/lib/php/com/tradeMetrix/bo/ActividadManagerBO.php';        
    include_once $CFG->dataroot.'/lib/php/application/Utilities.php';
    //Instanceamiento de clases
    $utilities = new Utilities();
    $objetoClassManager = new ActividadManager();        
    $utilities->limpiarEntrada(); // Ejecutar al inicio siempre la funcion para sanear la consulta    
    
    
    // consulta normal
        //$objClass=$objetoClassManager->BuscaActividad();
    
    // Consulta simple (Devuelve objeto usuario) siempre debe llevar una condicional
        //$id=1;                    
        
        //$objetoClassManager->ArmarCondicional(Constantes::ONLY_IDACTIVIDAD,Constantes::IGUAL_DB,$id);
        //$objetoClassManager->ArmarCondicional(Constantes::ONLY_IDCLASIFFORMA,Constantes::IGUAL_DB,$id);
        //$objetoClassManager->ArmarCondicional(Constantes::ONLY_ESTATUSFORMA,Constantes::IGUAL_DB,$id);        
        //$objClass=$objetoClassManager->BuscaActividad(Constantes::OUTPUTSIMPLE);
    
    // Consulta lista (Devuelve un array de objetos usuario) puede o no llevar condicionales
        $id=1;                
        $objetoClassManager->ArmarCondicional(Constantes::ONLY_IDACTIVIDAD,Constantes::IGUAL_DB,$id);
        $objClass=$objetoClassManager->BuscaActividad(Constantes::OUTPUTSLISTA);
    
    if($objClass){
        if(is_object($objClass)){            
            echo $objClass->getIdActividad().' -----> id actividad<br>';
            echo $objClass->getIdTipoActividad().' -----> id tipo actividad<br>';                                                    
            echo $objClass->getIdClasificacionActividad().' -----> id clasificacion actividad<br>';
            echo $objClass->getClasificacionActividad().' -----> clasificacion actividad<br>';
            echo $objClass->getDescripcionActividad().' -----> descripcion actividad<br>';
            echo $objClass->getPrioridadActividad().' -----> prioridad actividad<br>';            
            
            
            
            
        }elseif(is_array($objClass)){            
            foreach($objClass as $loadData){
                echo $loadData->getIdActividad().' <------> '.$loadData->getIdTipoActividad().' <------> '.$loadData->getIdClasificacionActividad()
                .' <------> '.$loadData->getClasificacionActividad().' <------> '.$loadData->getDescripcionActividad()
                .' <------> '.$loadData->getPrioridadActividad().'<br>';
                /// Carga objeto forma
                echo $loadData->getListFormaActividad()->getIdForma().' -----> id forma<br>';
                echo $loadData->getListFormaActividad()->getIdActividadForma().' -----> id actividad forma<br>';                                                    
                echo $loadData->getListFormaActividad()->getIdClasificacionForma().' -----> id clasificacion forma<br>';
                echo $loadData->getListFormaActividad()->getClasificacionForma().' -----> clasificacion forma<br>';
                echo $loadData->getListFormaActividad()->getNombreForma().' -----> nombre forma<br>';
                echo $loadData->getListFormaActividad()->getStatusForma().' -----> status forma<br>';
                echo $loadData->getListFormaActividad()->getListPreguntasForma().' -----> list pregunta forma<br>';
                
                
                if($loadData->getListFormaActividad()->getListPreguntasForma() != false){
                foreach($loadData->getListFormaActividad()->getListPreguntasForma() as $pregunta){
                    echo $pregunta->getIdPregunta().' ------> '.$pregunta->getIdFormaPregunta().' ------> '.$pregunta->getIdTipoPregunta()
                    .' ------> '.$pregunta->getIdTipoRespuestaPregunta().' ------> '.$pregunta->getIdClasificacionRespuestaPregunta()
                    .' ------> '.$pregunta->getPregunta().'<br>';
                    
                    if($pregunta->getListRespuestas() != false){
                        foreach($pregunta->getListRespuestas() as $listadoRespuesta){
                            echo $listadoRespuesta->getIdRespuesta().' ------> '.$listadoRespuesta->getIdEventoRespuesta()
                            .' ------> '.$listadoRespuesta->getIdPreguntaRespuesta().' ------> '.$listadoRespuesta->getIdFormaRespuesta()
                            .' ------> '.$listadoRespuesta->getIdUsuarioRespuesta().' ------> '.$listadoRespuesta->getRespuesta().' --->  respuestas<br>';
                        }                                         
                        echo "<br>";
                    }
                    
                    if($pregunta->getListOpciones() != false){
                        foreach($pregunta->getListOpciones() as $listadoOpciones){
                            echo $listadoOpciones->getIdOpcion().' ------> '.$listadoOpciones->getIdPreguntaOpcion()
                            .' ------> '.$listadoOpciones->getIdOpcionElegir().' ------> '.$listadoOpciones->getObservacionOpcion()
                            .' ------> '.$listadoOpciones->getRequeridoOpcion().' --->  opciones<br>';
                        }                                         
                        echo "<br>";
                    }
                }    
            }
            }
        }    
    }else{
        echo "error";
    }


/*


*/
?>