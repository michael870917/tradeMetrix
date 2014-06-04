<?php
    session_start();
    include_once ("../config.php");    
    include_once $CFG->dataroot.'/lib/php/com/tradeMetrix/bo/EventoManagerBO.php';
    include_once $CFG->dataroot.'/lib/php/com/tradeMetrix/bo/Evento.php';
    include_once $CFG->dataroot.'/lib/php/application/Utilities.php';
    //Instanceamiento de clases
    $utilities = new Utilities();
    $objetoClassManager = new EventoManager();
    $objetoTablero = new Evento();
    $utilities->limpiarEntrada(); //Ejecutar al inicio siempre la funcion para sanear la consulta            
    // consulta normal
        //$objClass=$objetoClassManager->BuscaEvento();
    
    // Consulta simple (Devuelve objeto usuario) siempre debe llevar una condicional
        //$id=1;
        //$id2=2;
        //$id3=1;
        //$objetoClassManager->ArmarCondicional(Constantes::ONLY_IDEVENTO,Constantes::IGUAL_DB,$id);
        //$objetoClassManager->ArmarCondicional(Constantes::ONLY_IDCAMPANIA,Constantes::IGUAL_DB,$id2);
        //$objetoClassManager->ArmarCondicional(Constantes::ONLY_ACTIVOEVENTO,Constantes::IGUAL_DB,$id3);
        $objClass=$objetoClassManager->BuscaEvento(Constantes::OUTPUTSIMPLE);
    
    // Consulta lista (Devuelve un array de objetos usuario) puede o no llevar condicionales
        //$id=3;
        //$id2=2;
        //$id3=1;
        //$fecha_ini="2014-05-26 08:00:00";
        //$fecha_fin="2014-05-26 09:00:00";
        //$objetoClassManager->ArmarCondicional(Constantes::ONLY_IDEVENTO,Constantes::IGUAL_DB,$id);
        //$objetoClassManager->ArmarCondicional(Constantes::ONLY_IDCAMPANIA,Constantes::IGUAL_DB,$id2);
        //$objetoClassManager->ArmarCondicional(Constantes::ONLY_ACTIVOEVENTO,Constantes::IGUAL_DB,$id3);
        //$objetoClassManager->ArmarCondicional(Constantes::ONLY_FECHAINIEVENTO,Constantes::MAYORIGUAL_DB,$fecha_ini);
        //$objetoClassManager->ArmarCondicional(Constantes::ONLY_FECHAINIEVENTO,Constantes::MENORIGUAL_DB,$fecha_fin);
        //$objetoClassManager->ArmarCondicional(Constantes::ONLY_IDREGIONTOREGION,Constantes::IGUAL_DB,$id);
        $objClass=$objetoClassManager->BuscaEvento(Constantes::OUTPUTSLISTA);
    
    if($objClass){
        if(is_object($objClass)){            
            echo $objClass->getIdEvento().' -----> id evento<br>';
            echo $objClass->getIdCampaniaEvento().' -----> id campania evento<br>';
            echo $objClass->getIdCCEvento().' -----> id CC evento<br>';
            echo $objClass->getNombreCCEvento().' -----> nombre CC evento<br>';
            echo $objClass->getFechaEvento().' -----> fecha evento<br>';
            echo $objClass->getHorainiEvento().' -----> hora ini evento<br>';
            echo $objClass->getHorafinEvento().' -----> hora fin evento<br>';
            echo $objClass->getActivoEvento().' -----> get activo evento<br>';                                        
        }elseif(is_array($objClass)){            
            foreach($objClass as $tablero){
                echo $tablero->getIdEvento().' ------> '.$tablero->getIdCampaniaEvento().' ------> '.$tablero->getIdCCEvento()
                .' ------> '.$tablero->getNombreCCEvento().' ------> '.$tablero->getFechaEvento().' ------> '.$tablero->getHorainiEvento()
                .' ------> '.$tablero->getHorafinEvento().' ------> '.$tablero->getActivoEvento().'<br>';
            }
        }    
    }else{
        echo "error";
    }

?>