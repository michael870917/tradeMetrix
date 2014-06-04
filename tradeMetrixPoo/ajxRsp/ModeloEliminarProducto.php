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
    
    
    $objetoProducto->setIdProducto(4);    
    $id=$objetoProductoManager->EliminarProducto($objetoProducto);    
    if($id != false){
        echo $id;
    }else{
        echo "error";
    }
    
    

?>