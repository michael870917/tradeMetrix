<?php

    session_start();
    include_once ("../config.php");    
    include_once $CFG->dataroot.'/lib/php/com/tradeMetrix/bo/CatPlazaManagerBO.php';
    include_once $CFG->dataroot.'/lib/php/com/tradeMetrix/bo/Plaza.php';
    include_once $CFG->dataroot.'/lib/php/application/Utilities.php';
    //Instanceamiento de clases
    $utilities = new Utilities();
    $objetoClassManager = new CatPlazaManager();
    $objetoCatalogoGenerico = new Plaza();
    $utilities->limpiarEntrada(); // Ejecutar al inicio siempre la funcion para sanear la consulta    
    
    
    // consulta normal
        //$objCatalogo=$objetoClassManager->BuscaCatalogo();
    
    // Consulta simple (Devuelve objeto usuario) siempre debe llevar una condicional
        //$id=5;                    
        //$objetoClassManager->ArmarCondicional(Constantes::ONLY_IDGENERICO,Constantes::IGUAL_DB,$id);
        //$objCatalogo=$objetoClassManager->BuscaCatalogo(Constantes::OUTPUTSIMPLE);
    
    // Consulta lista (Devuelve un array de objetos usuario) puede o no llevar condicionales
        //$id=3;                
        //$objetoClassManager->ArmarCondicional(Constantes::ONLY_IDGENERICO,Constantes::IGUAL_DB,$id);
        //$objCatalogo=$objetoClassManager->BuscaCatalogo(Constantes::OUTPUTSLISTA);
    
    if($objCatalogo){
        if(is_object($objCatalogo)){            
            echo $objCatalogo->getIdPlaza().' -----> id plaza<br>';
            echo $objCatalogo->getIdRegionPlaza().' -----> id region plaza<br>';
            echo $objCatalogo->getDistritoPlaza().' -----> distrito<br>';
        }elseif(is_array($objCatalogo)){            
            foreach($objCatalogo as $catalogo){
                echo $catalogo->getIdPlaza().' <------> '.$catalogo->getIdRegionPlaza().' <------> '.$catalogo->getDistritoPlaza().'<br>';
            }
        }    
    }else{
        echo "error";
    }

?>