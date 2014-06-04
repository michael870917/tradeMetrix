<?php

    session_start();
    include_once ("../config.php");    
    include_once $CFG->dataroot.'/lib/php/com/tradeMetrix/bo/FormaManagerBO.php';
    include_once $CFG->dataroot.'/lib/php/com/tradeMetrix/bo/Pregunta.php';
    
    include_once $CFG->dataroot.'/lib/php/application/Utilities.php';
    //Instanceamiento de clases
    $utilities = new Utilities();
    $objetoClassManager = new FormaManager();
    $objetoClassPregunta = new Pregunta();    
    $utilities->limpiarEntrada(); // Ejecutar al inicio siempre la funcion para sanear la consulta    
    
    
    // consulta normal
        //$objClass=$objetoClassManager->BuscaForma();
    
    // Consulta simple (Devuelve objeto usuario) siempre debe llevar una condicional
        //$id=1;                    
        
        //$objetoClassManager->ArmarCondicional(Constantes::ONLY_IDFORMA,Constantes::IGUAL_DB,$id);
        //$objetoClassManager->ArmarCondicional(Constantes::ONLY_IDCLASIFFORMA,Constantes::IGUAL_DB,$id);
        //$objetoClassManager->ArmarCondicional(Constantes::ONLY_ESTATUSFORMA,Constantes::IGUAL_DB,$id);        
        //$objClass=$objetoClassManager->BuscaForma(Constantes::OUTPUTSIMPLE);
    
    // Consulta lista (Devuelve un array de objetos usuario) puede o no llevar condicionales
        $id=1;                
        $objetoClassManager->ArmarCondicional(Constantes::ONLY_IDFORMA,Constantes::IGUAL_DB,$id);
        $objClass=$objetoClassManager->BuscaForma(Constantes::OUTPUTSLISTA);
    
    if($objClass){
        if(is_object($objClass)){            
            echo $objClass->getIdForma().' -----> id forma<br>';
            echo $objClass->getIdActividadForma().' -----> id actividad forma<br>';                                                    
            echo $objClass->getIdClasificacionForma().' -----> id clasificacion forma<br>';
            echo $objClass->getClasificacionForma().' -----> clasificacion forma<br>';
            echo $objClass->getNombreForma().' -----> nombre forma<br>';
            echo $objClass->getStatusForma().' -----> status forma<br>';
            echo $objClass->getListPreguntasForma().' -----> list pregunta forma<br>';
            if($objClass->getListPreguntasForma() != false){
                    foreach($objClass->getListPreguntasForma() as $pregunta){
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
            
        }elseif(is_array($objClass)){            
            foreach($objClass as $loadData){
                echo $loadData->getIdForma().' <------> '.$loadData->getIdActividadForma().' <------> '.$loadData->getIdClasificacionForma()
                .' <------> '.$loadData->getClasificacionForma().' <------> '.$loadData->getNombreForma().' <------> '.$loadData->getStatusForma()
                .' <------> '.$loadData->getListPreguntasForma().'<br>';                
                if($loadData->getListPreguntasForma() != false){
                    foreach($loadData->getListPreguntasForma() as $pregunta){
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

?>