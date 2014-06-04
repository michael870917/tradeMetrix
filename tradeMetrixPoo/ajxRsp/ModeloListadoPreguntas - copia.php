<?php

    session_start();
    include_once ("../config.php");        
    include_once $CFG->dataroot.'/lib/php/com/tradeMetrix/bo/Pregunta.php';
    include_once $CFG->dataroot.'/lib/php/application/Utilities.php';
    //Instanceamiento de clases
    $utilities = new Utilities();    
    $objetoClass = new Pregunta();
    $utilities->limpiarEntrada(); // Ejecutar al inicio siempre la funcion para sanear la consulta    
    
    /*
    
    //////////////////////////////////////////////////////////////////////////7
    // parametros usados para aprtados preguntas
    //////////////////////////////////////////////////////////////////////////7
    
    // consulta normal
        //$objClass=$objetoClass->BuscaPreguntas();
    
    // Consulta simple (Devuelve objeto usuario) siempre debe llevar una condicional
        //$id=5;                    
        //$objetoClass->ArmarCondicional(Constantes::ONLY_IDPREGUNTA,Constantes::IGUAL_DB,$id);
        //$objClass=$objetoClass->BuscaPreguntas(Constantes::OUTPUTSIMPLE);
    
    // Consulta lista (Devuelve un array de objetos usuario) puede o no llevar condicionales
        //$id=1;
        //$id2=4;
        //$objetoClass->ArmarCondicional(Constantes::ONLY_IDTABLERO,Constantes::IGUAL_DB,$id);
        //$objetoClass->ArmarCondicional(Constantes::ONLY_IDCATPLAZA,Constantes::IGUAL_DB,$id2);
        //$objClass=$objetoClass->BuscaPreguntas(Constantes::OUTPUTSLISTA);
    
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
            }
        }    
    }else{
        echo "error";
    }
    
    */
    
    
    /* 
    
    //////////////////////////////////////////////////////////////////////////
    // parametros usados para aprtados respuestas
    //////////////////////////////////////////////////////////////////////////
     
    $id=2;                    
    $objetoClass->ArmarCondicional(Constantes::ONLY_IDPREGUNTATORESPUESTA,Constantes::IGUAL_DB,$id);
    $objClass=$objetoClass->BuscaRespuestas(Constantes::OUTPUTSLISTA);    
    
    
    if($objClass){
        if(is_array($objClass)){            
            foreach($objClass as $pregunta){
                echo $pregunta->getIdRespuesta().' ------> '.$pregunta->getIdEventoRespuesta().' ------> '.$pregunta->getIdPreguntaRespuesta()
                .' ------> '.$pregunta->getIdFormaRespuesta().' ------> '.$pregunta->getIdUsuarioRespuesta().' ------> '.$pregunta->getRespuesta().'<br>';
            }
        }    
    }else{
        echo "error";
    }
    */
    
    
    
    
    /*
    
    //////////////////////////////////////////////////////////////////////////
    // parametros usados para aprtados opciones
    //////////////////////////////////////////////////////////////////////////
     
    $id=1;                    
    $objetoClass->ArmarCondicional(Constantes::ONLY_IDPREGUNTATOOPCIONES,Constantes::IGUAL_DB,$id);
    $objClass=$objetoClass->BuscaOpciones(Constantes::OUTPUTSLISTA);    
    
    
    if($objClass){
        if(is_array($objClass)){            
            foreach($objClass as $pregunta){
                echo $pregunta->getIdOpcion().' ------> '.$pregunta->getIdPreguntaOpcion().' ------> '.$pregunta->getIdOpcionElegir()
                .' ------> '.$pregunta->getObservacionOpcion().' ------> '.$pregunta->getRequeridoOpcion().'<br>';
            }
        }    
    }else{
        echo "error";
    }
    */  
    
?>