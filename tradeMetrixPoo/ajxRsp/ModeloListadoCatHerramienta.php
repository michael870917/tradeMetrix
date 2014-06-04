<?php

    session_start();
    include_once ("../config.php");    
    include_once $CFG->dataroot.'/lib/php/com/tradeMetrix/bo/CatHerramientaManagerBO.php';
    include_once $CFG->dataroot.'/lib/php/com/tradeMetrix/bo/CatalogoGenerico.php';
    include_once $CFG->dataroot.'/lib/php/application/Utilities.php';
    //Instanceamiento de clases
    $utilities = new Utilities();
    $objetoClassManager = new CatHerramientaManager();
    $objetoCatalogoGenerico = new CatalogoGenerico();
    $utilities->limpiarEntrada(); // Ejecutar al inicio siempre la funcion para sanear la consulta    
    
    
    // consulta normal
        //$objCatHerramienta=$objetoClassManager->BuscaCatalogo();
    
    // Consulta simple (Devuelve objeto usuario) siempre debe llevar una condicional
        //$id=2;                    
        //$objetoClassManager->ArmarCondicional(Constantes::ONLY_IDGENERICO,Constantes::IGUAL_DB,$id);
        //$objCatHerramienta=$objetoClassManager->BuscaCatalogo(Constantes::OUTPUTSIMPLE);
    
    // Consulta lista (Devuelve un array de objetos usuario) puede o no llevar condicionales
        $id=1;                
        $objetoClassManager->ArmarCondicional(Constantes::ONLY_IDGENERICO,Constantes::IGUAL_DB,$id);
        $objCatHerramienta=$objetoClassManager->BuscaCatalogo(Constantes::OUTPUTSLISTA);
    
    if($objCatHerramienta){
        if(is_object($objCatHerramienta)){            
            echo $objCatHerramienta->getIdCatalogo().' -----> id herramienta<br>';
            echo $objCatHerramienta->getDescripcionCatalogo().' -----> herramienta<br>';                                                    
        }elseif(is_array($objCatHerramienta)){            
            foreach($objCatHerramienta as $catHerramienta){
                echo $catHerramienta->getIdCatalogo().' ------> '.$catHerramienta->getDescripcionCatalogo().'<br>';
            }
        }    
    }else{
        echo "error";
    }

?>