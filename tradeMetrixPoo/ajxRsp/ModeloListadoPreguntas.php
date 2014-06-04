<?php

    session_start();
    include_once ("../config.php");        
    include_once $CFG->dataroot.'/lib/php/com/tradeMetrix/bo/Pregunta.php';
    include_once $CFG->dataroot.'/lib/php/application/Utilities.php';
    //Instanceamiento de clases
    $utilities = new Utilities();    
    $objetoClass = new Pregunta();
    $utilities->limpiarEntrada(); // Ejecutar al inicio siempre la funcion para sanear la consulta    
    
    
    
    //////////////////////////////////////////////////////////////////////////7
    // parametros usados para aprtados preguntas
    //////////////////////////////////////////////////////////////////////////7

    
    // Consulta lista (Devuelve un array de objetos usuario) puede o no llevar condicionales
        $id=1;
        $objetoClass->ArmarCondicional(Constantes::ONLY_IDFORMA,Constantes::IGUAL_DB,$id);
        $objClass=$objetoClass->BuscaPreguntas(Constantes::OUTPUTSLISTA);
    
    if($objClass){
        if(is_object($objClass)){            
            echo $objClass->getIdPregunta().' -----> id pregunta<br>';
            echo $objClass->getIdFormaPregunta().' -----> id forma pregunta<br>';
            echo $objClass->getIdTipoPregunta().' -----> id tipo pregunta<br>';
            echo $objClass->getTipoPregunta().' -----> tipo pregunta<br>';
            echo $objClass->getIdTipoRespuestaPregunta().' -----> id tipo respuesta pregunta<br>';
            echo $objClass->getTipoRespuestaPregunta().' -----> tipo respuesta pregunta<br>';
            echo $objClass->getIdClasificacionRespuestaPregunta().' -----> id clasificacion respuesta pregunta<br>';
            echo $objClass->getClasificacionRespuestaPregunta().' -----> clasificacion respuesta pregunta<br>';
            echo $objClass->getPregunta().' -----> pregunta<br>';
        }elseif(is_array($objClass)){            
            foreach($objClass as $pregunta){
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
    }else{
        echo "error";
    }
    
    
    
    
    
?>