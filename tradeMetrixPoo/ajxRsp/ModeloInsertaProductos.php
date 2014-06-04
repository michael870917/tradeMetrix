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
        
    ///Metodo 1 insercion usuarios
    foreach($_REQUEST as $key => $value){
        $asignacion = "\$" . $key . "='" .strip_tags(($value)). "';";
		eval($asignacion);
    }
    $objetoProducto->setIdMarcaProducto($idmarca);
    $objetoProducto->setIdTipoProducto($idtipoproducto);
    $objetoProducto->setNombreProducto($nombre);
    $objetoProducto->setDescripcionProducto($descripcion);
    $objetoProducto->setSkuProducto($sku);
    $objetoProducto->setThumbProducto($thumb);
    $objetoProducto->setPresentacionProducto($presentacion);
    
        
    $id=$objetoProductoManager->InsertaProducto($objetoProducto);        
    if($id != false){
        echo $id;
    }
    

?>