<?php

    session_start();
    include_once ("../config.php");    
    include_once $CFG->dataroot.'/lib/php/com/tradeMetrix/bo/ProductoManagerBO.php';
    include_once $CFG->dataroot.'/lib/php/com/tradeMetrix/bo/Producto.php';
    include_once $CFG->dataroot.'/lib/php/com/tradeMetrix/bo/Consumo.php';
    include_once $CFG->dataroot.'/lib/php/application/Utilities.php';
    //Instanceamiento de clases
    $utilities = new Utilities();
    $objetoProductoManager = new ProductoManager();
    $objetoProducto = new Producto();
    $objetoConsumo = new Consumo();        
    $utilities->limpiarEntrada(); // Ejecutar al inicio siempre la funcion para sanear la consulta    
    
    
    // consulta normal
        //$objProducto=$objetoProductoManager->BuscaProducto();
    
    // Consulta simple (Devuelve objeto usuario) siempre debe llevar una condicional
        //$id=1;
        //$nombre="Roncito";
        //$objetoProductoManager->ArmarCondicional(Constantes::ONLY_IDPRODUCTO,Constantes::IGUAL_DB,$id);    
        //$objetoProductoManager->ArmarCondicional(Constantes::ONLY_NOMBREPRODUCTO,Constantes::IGUAL_DB,$nombre);
        //$objProducto=$objetoProductoManager->BuscaProducto(Constantes::OUTPUTSIMPLE);
    
    // Consulta lista (Devuelve un array de objetos usuario) puede o no llevar condicionales
        //$id=2;
        //$objetoProductoManager->ArmarCondicional(Constantes::ONLY_IDCATTIPOPRODUCTO,Constantes::IGUAL_DB,$id);
        //$objProducto=$objetoProductoManager->BuscaProducto(Constantes::OUTPUTSLISTA);
    
    if($objProducto){
        if(is_object($objProducto)){            
            echo $objProducto->getIdProducto().' -----> id producto<br>';
            echo $objProducto->getIdMarcaProducto().' -----> id marca producto<br>';
            echo $objProducto->getMarcaProducto().' -----> marca producto<br>';
            echo $objProducto->getIdTipoProducto().' -----> id tipo producto<br>';
            echo $objProducto->getTipoProducto().' -----> tipo producto<br>';
            echo $objProducto->getNombreProducto().' -----> nombre producto<br>';
            echo $objProducto->getDescripcionProducto().' -----> descripcion<br>';
            echo $objProducto->getSkuProducto().' -----> sku producto<br>';
            echo $objProducto->getThumbProducto().' -----> thumb producto<br>';
            echo $objProducto->getPresentacionProducto().' -----> presentacion producto<br>';
            echo $objProducto->getExistenciaProducto().' -----> existencia producto<br>';
            echo $objProducto->getSku1nProducto().' -----> sku1n producto<br>';
            echo $objProducto->getIdUsuarioProducto().' -----> id usuario producto<br>';
            echo $objProducto->getIdOrigenProducto().' -----> id origen producto<br>';
            echo $objProducto->getOrigenProducto().' -----> origen producto<br>';                            
        }elseif(is_array($objProducto)){            
            foreach($objProducto as $product){
                echo $product->getIdProducto().' ------> '.$product->getIdMarcaProducto().' ------> '.$product->getMarcaProducto().' ------> '.$product->getIdTipoProducto()
                .' ------> '.$product->getTipoProducto().' ------> '.$product->getNombreProducto().' ------> '.$product->getDescripcionProducto().' ------> '.$product->getSkuProducto()                
                .' ------> '.$product->getThumbProducto().' ------> '.$product->getPresentacionProducto().' ------> '.$product->getExistenciaProducto().' ------> '.$product->getSku1nProducto()                
                .' ------> '.$product->getIdUsuarioProducto().' ------> '.$product->getIdOrigenProducto().' ------> '.$product->getOrigenProducto().'<br>';
            }
        }    
    }else{
        echo "error";
    }

?>