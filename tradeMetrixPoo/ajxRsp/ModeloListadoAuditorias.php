<?php

    session_start();
    include_once ("../config.php");    
    include_once $CFG->dataroot.'/lib/php/com/tradeMetrix/bo/AuditoriaManagerBO.php';
    include_once $CFG->dataroot.'/lib/php/com/tradeMetrix/bo/Auditoria.php';
    include_once $CFG->dataroot.'/lib/php/application/Utilities.php';
    //Instanceamiento de clases
    $utilities = new Utilities();
    $objetoClassManager = new AuditoriaManager();
    $objetoTablero = new Auditoria();
    $utilities->limpiarEntrada(); // Ejecutar al inicio siempre la funcion para sanear la consulta    
    
    
    // consulta normal
        $objClass=$objetoClassManager->BuscaAuditoria();
    
    // Consulta simple (Devuelve objeto usuario) siempre debe llevar una condicional
        //$id=2;                    
        //$objetoClassManager->ArmarCondicional(Constantes::ONLY_IDAUDITORIA,Constantes::IGUAL_DB,$id);
        //$objClass=$objetoClassManager->BuscaAuditoria(Constantes::OUTPUTSIMPLE);
    
    // Consulta lista (Devuelve un array de objetos usuario) puede o no llevar condicionales
        //$id=1;
        $id2=4;
        //$objetoClassManager->ArmarCondicional(Constantes::ONLY_IDTABLERO,Constantes::IGUAL_DB,$id);
        $objetoClassManager->ArmarCondicional(Constantes::ONLY_IDCATPLAZA,Constantes::IGUAL_DB,$id2);
        $objClass=$objetoClassManager->BuscaAuditoria(Constantes::OUTPUTSLISTA);
    
    if($objClass){
        if(is_object($objClass)){            
            echo $objClass->getIdAuditoria().' -----> id auditoria<br>';
            echo $objClass->getFechaAuditoria().' -----> fecha auditoria<br>';
            echo $objClass->getPeriodoIniAuditoria().' -----> periodo inicial auditoria<br>';
            echo $objClass->getPeriodoFinAuditoria().' -----> periodo final auditoria<br>';
            echo $objClass->getIdUsuarioAuditoria().' -----> id usuario auditoria<br>';
            echo $objClass->getUsuarioAuditoria().' -----> usuario auditoria<br>';
            echo $objClass->getIdEventoAuditoria().' -----> id evento auditoria<br>';                                        
        }elseif(is_array($objClass)){            
            foreach($objClass as $tablero){
                echo $tablero->getIdAuditoria().' ------> '.$tablero->getFechaAuditoria().' ------> '.$tablero->getPeriodoIniAuditoria()
                .' ------> '.$tablero->getPeriodoFinAuditoria().' ------> '.$tablero->getIdUsuarioAuditoria().' ------> '.$tablero->getUsuarioAuditoria()
                .' ------> '.$tablero->getIdEventoAuditoria().'<br>';
            }
        }    
    }else{
        echo "error";
    }

?>