<?php

    session_start();
    include_once ("../config.php");    
    include_once $CFG->dataroot.'/lib/php/com/tradeMetrix/bo/CatMarcaManagerBO.php';
    include_once $CFG->dataroot.'/lib/php/com/tradeMetrix/bo/Marca.php';
    include_once $CFG->dataroot.'/lib/php/application/Utilities.php';
    //Instanceamiento de clases
    $utilities = new Utilities();
    $objetoClassManager = new CatMarcaManager();
    $objetoCatalogoGenerico = new Marca();
    $utilities->limpiarEntrada(); // Ejecutar al inicio siempre la funcion para sanear la consulta    
    
    
    // consulta normal
        //$objCatalogo=$objetoClassManager->BuscaCatalogo();
    
    // Consulta simple (Devuelve objeto usuario) siempre debe llevar una condicional
        //$id=2;                    
        //$objetoClassManager->ArmarCondicional(Constantes::ONLY_IDGENERICO,Constantes::IGUAL_DB,$id);
        //$objCatalogo=$objetoClassManager->BuscaCatalogo(Constantes::OUTPUTSIMPLE);
    
    // Consulta lista (Devuelve un array de objetos usuario) puede o no llevar condicionales
        //$id=5;                
        //$objetoClassManager->ArmarCondicional(Constantes::ONLY_IDGENERICO,Constantes::IGUAL_DB,$id);
        //$objCatalogo=$objetoClassManager->BuscaCatalogo(Constantes::OUTPUTSLISTA);
    
    if($objCatalogo){
        if(is_object($objCatalogo)){            
            echo $objCatalogo->getIdMarca().' -----> id marca<br>';
            echo $objCatalogo->getMarca().' -----> marca<br>';
            echo $objCatalogo->getAcronimoMarca().' -----> acronimo marca<br>';
            echo $objCatalogo->getCategoriaMarca().' -----> categoria marca<br>';                                                                
        }elseif(is_array($objCatalogo)){            
            foreach($objCatalogo as $catalogo){
                echo $catalogo->getIdMarca().' <------> '.$catalogo->getMarca().' <------> '.$catalogo->getAcronimoMarca().' <------> '.$catalogo->getCategoriaMarca().'<br>';
            }
        }    
    }else{
        echo "error";
    }

?>