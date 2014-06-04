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
    
    
    foreach($_REQUEST as $key => $value){
        $asignacion = "\$" . $key . "='" .strip_tags(($value)). "';";
		eval($asignacion);
    }
    
    /*
    
    // Actualiza producto    
    $objetoProducto->setIdMarcaProducto($idmarca);
    $objetoProducto->setIdTipoProducto($idtipoproducto);
    $objetoProducto->setNombreProducto($nombre);
    $objetoProducto->setDescripcionProducto($descripcion);
    $objetoProducto->setSkuProducto($sku);
    $objetoProducto->setThumbProducto($thumb);
    $objetoProducto->setPresentacionProducto($presentacion);
    $objetoProducto->setIdProducto(4);
    $id=$objetoProductoManager->ActualizaProducto($objetoProducto);    
    if($id != false){
        echo $id;
    }else{
        echo "error";
    }
    
    */
    
    
    /*
    // actualiza existencias
    
    $objetoProducto->setExistenciaProducto(900);
    $objetoProducto->setIdUsuarioProducto(1;
    $objetoProducto->setIdProducto(1);
    
    $id=$objetoProductoManager->ActualizaExistencia($objetoProducto);    
    if($id != false){
        echo $id;
    }else{
        echo "error";
    }
    */

?>