<?php

    session_start();
    include_once ("../config.php");    
    include_once $CFG->dataroot.'/lib/php/com/tradeMetrix/bo/CentroConsumoManagerBO.php';
    include_once $CFG->dataroot.'/lib/php/com/tradeMetrix/bo/CentroConsumo.php';
    include_once $CFG->dataroot.'/lib/php/application/Utilities.php';
    //Instanceamiento de clases
    $utilities = new Utilities();
    $objetoClassManager = new CentroConsumoManager();
    $objetoCatalogoGenerico = new CentroConsumo();
    $utilities->limpiarEntrada(); // Ejecutar al inicio siempre la funcion para sanear la consulta    
    
    
    // consulta normal
        //$objCatalogo=$objetoClassManager->BuscaCatalogo();
    
    // Consulta simple (Devuelve objeto usuario) siempre debe llevar una condicional
        $id=1;                    
        $objetoClassManager->ArmarCondicional(Constantes::ONLY_IDCATCC,Constantes::IGUAL_DB,$id);
        //$objetoClassManager->ArmarCondicional(Constantes::ONLY_IDCATPLAZA,Constantes::IGUAL_DB,$id);
        //$objetoClassManager->ArmarCondicional(Constantes::ONLY_IDCATREGION,Constantes::IGUAL_DB,$id);
        $objCatalogo=$objetoClassManager->BuscaCatalogo(Constantes::OUTPUTSIMPLE);
    
    // Consulta lista (Devuelve un array de objetos usuario) puede o no llevar condicionales
        //$id=4;                
        //$objetoClassManager->ArmarCondicional(Constantes::ONLY_IDCATCC,Constantes::IGUAL_DB,$id);
        //$objetoClassManager->ArmarCondicional(Constantes::ONLY_IDCATPLAZA,Constantes::IGUAL_DB,$id);
        //$objetoClassManager->ArmarCondicional(Constantes::ONLY_IDCATREGION,Constantes::IGUAL_DB,$id);
        //$objCatalogo=$objetoClassManager->BuscaCatalogo(Constantes::OUTPUTSLISTA);
    
    if($objCatalogo){
        if(is_object($objCatalogo)){            
            /*
            echo $objCatalogo->getIdCC().' -----> id cat cc<br>';
            echo $objCatalogo->getIdPlazaCC().' -----> id plaza cc<br>';                                                    
            echo $objCatalogo->getNombreCC().' -----> nombre cc<br>';
            echo $objCatalogo->getGeolngCC().' -----> geo longitud cc<br>';
            echo $objCatalogo->getGeolatCC().' -----> geo latitud cc<br>';
            echo $objCatalogo->getDireccionCC().' -----> direccion cc<br>';
            echo $objCatalogo->getAforoCC().' -----> aforo cc<br>';
            */
        }elseif(is_array($objCatalogo)){            
            foreach($objCatalogo as $catalogo){
               // echo $catalogo->getIdCC().' <------> '.$catalogo->getIdPlazaCC().' <------> '.$catalogo->getNombreCC()
               // .' <------> '.$catalogo->getGeolngCC().' <------> '.$catalogo->getGeolatCC().' <------> '.$catalogo->getDireccionCC()
               // .' <------> '.$catalogo->getAforoCC().'<br>';
            }
        }    
    }else{
        echo "error";
    }
    
    echo json_encode($utilities->ConvierteObjetoArray($objCatalogo));
    
?>