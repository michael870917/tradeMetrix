<?php

    session_start();
    include_once ("../config.php");    
    include_once $CFG->dataroot.'/lib/php/com/tradeMetrix/bo/CatRegionManagerBO.php';
    include_once $CFG->dataroot.'/lib/php/com/tradeMetrix/bo/CatalogoGenerico.php';
    include_once $CFG->dataroot.'/lib/php/application/Utilities.php';
    //Instanceamiento de clases
    $utilities = new Utilities();
    $objetoClassManager = new CatRegionManager();
    $objetoCatalogoGenerico = new CatalogoGenerico();
    $utilities->limpiarEntrada(); // Ejecutar al inicio siempre la funcion para sanear la consulta    
    
    
    // consulta normal
        //$objCatalogo=$objetoClassManager->BuscaCatalogo();
    
    // Consulta simple (Devuelve objeto usuario) siempre debe llevar una condicional
        //$id=8;                    
        //$objetoClassManager->ArmarCondicional(Constantes::ONLY_IDGENERICO,Constantes::IGUAL_DB,$id);
        //$objCatalogo=$objetoClassManager->BuscaCatalogo(Constantes::OUTPUTSIMPLE);
    
    // Consulta lista (Devuelve un array de objetos usuario) puede o no llevar condicionales
        $id=8;                
        $objetoClassManager->ArmarCondicional(Constantes::ONLY_IDGENERICO,Constantes::IGUAL_DB,$id);
        $objCatalogo=$objetoClassManager->BuscaCatalogo(Constantes::OUTPUTSLISTA);
    
    if($objCatalogo){
        if(is_object($objCatalogo)){            
            echo $objCatalogo->getIdCatalogo().' -----> id catalogo<br>';
            echo $objCatalogo->getDescripcionCatalogo().' -----> descripcion<br>';                                                    
        }elseif(is_array($objCatalogo)){            
            foreach($objCatalogo as $catalogo){
                echo $catalogo->getIdCatalogo().' ------> '.$catalogo->getDescripcionCatalogo().'<br>';
            }
        }    
    }else{
        echo "error";
    }

?>