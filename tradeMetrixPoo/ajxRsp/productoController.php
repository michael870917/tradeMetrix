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
    
    
    
    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    
    
    
    ///Metodo 2 Consulta datos ya sea de con un objeto Usuario o un array de objetos usuario
    
    // consulta normal
        //$objProducto=$objetoProductoManager->BuscaProducto();
    
    // Consulta simple (Devuelve objeto usuario) siempre debe llevar una condicional
        //$id=2;
        //$nombre="Malibú";
        //$objetoProductoManager->ArmarCondicional(Constantes::ONLY_IDPRODUCTO,Constantes::IGUAL_DB,$id);    
        //$objetoProductoManager->ArmarCondicional(Constantes::ONLY_NOMBREPRODUCTO,Constantes::IGUAL_DB,$nombre);
        //$objProducto=$objetoProductoManager->BuscaProducto(Constantes::OUTPUTSIMPLE);
    
    // Consulta lista (Devuelve un array de objetos usuario) puede o no llevar condicionales
        $id=2;
        $objetoProductoManager->ArmarCondicional(Constantes::ONLY_IDCATTIPOPRODUCTO,Constantes::IGUAL_DB,$id);
        $objProducto=$objetoProductoManager->BuscaProducto(Constantes::OUTPUTSLISTA);
    
    
    
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
    
    
    
    
    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////      
    
    /*
    // Metodo 3 Actualizacion de datos
    
    foreach($_REQUEST as $key => $value){
        $asignacion = "\$" . $key . "='" .strip_tags(($value)). "';";
		eval($asignacion);
    }
    $objetoUsuario->setNombreUsuario($nombre);
    $objetoUsuario->setUsuario($usuario);
    $objetoUsuario->setClaveUsuario($utilities->Encriptacion($clave));
    $objetoUsuario->setEmailUsuario($email);
    $objetoUsuario->setTelcelUsuario($celular);
    $objetoUsuario->setTelcasaUsuario($casa);
    $objetoUsuario->setDomicilioUsuario($domicilio);
    $objetoUsuario->setIdUsuario(22);    
    $id=$objetoUsuarioManager->ActualizaUsuario($objetoUsuario);    
    if($id != false){
        echo $id;
    }else{
        echo "error";
    }
    
    */
    
    
    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    
    /*
    // Metodo 4 Eliminacion datos
    $objetoUsuario->setIdUsuario(11);    
    $id=$objetoUsuarioManager->EliminarUsuario($objetoUsuario);    
    if($id != false){
        echo $id;
    }else{
        echo "error";
    }
    */
    
    /*    
    // Eliminacion rol usuarios
    $objetoUsuario->setIdRolUsuario(4);
    $objetoUsuario->setIdUsuario(4);    
    $id=$objetoUsuarioManager->EliminarUsuarioRol($objetoUsuario);    
    if($id != false){
        echo $id;
    }else{
        echo "error";
    }
    */
    
    /*
    // Eliminacion plaza usuarios
    $objetoUsuario->setIdPlazaUsuario(4);
    $objetoUsuario->setIdUsuario(4);    
    $id=$objetoUsuarioManager->EliminarUsuarioPlaza($objetoUsuario);    
    if($id != false){
        echo $id;
    }else{
        echo "error";
    }
    */
    
    /*
    // Eliminacion cc usuarios
    $objetoUsuario->setIdCCUsuario(3);
    $objetoUsuario->setIdUsuario(4);    
    $id=$objetoUsuarioManager->EliminarUsuarioCC($objetoUsuario);    
    if($id != false){
        echo $id;
    }else{
        echo "error";
    }
    */
    
    /*
    // Eliminacion region usuarios
    $objetoUsuario->setIdRegionUsuario(2);
    $objetoUsuario->setIdUsuario(4);    
    $id=$objetoUsuarioManager->EliminarUsuarioRegion($objetoUsuario);    
    if($id != false){
        echo $id;
    }else{
        echo "error";
    }
    */
    
    /*
    // Eliminacion region usuarios
    $objetoUsuario->setIdMarcaUsuario(3);
    $objetoUsuario->setIdUsuario(4);    
    $id=$objetoUsuarioManager->EliminarUsuarioMarca($objetoUsuario);    
    if($id != false){
        echo $id;
    }else{
        echo "error";
    }
    */
      
    
        ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    
    
    /*
    ///Metodo 1 insercion usuarios
    foreach($_REQUEST as $key => $value){
        $asignacion = "\$" . $key . "='" .strip_tags(($value)). "';";
		eval($asignacion);
    }
    $objetoUsuario->setNombreUsuario($nombre);
    $objetoUsuario->setUsuario($usuario);
    $objetoUsuario->setClaveUsuario($utilities->Encriptacion($clave));
    $objetoUsuario->setEmailUsuario($email);
    $objetoUsuario->setTelcelUsuario($celular);
    $objetoUsuario->setTelcasaUsuario($casa);
    $objetoUsuario->setDomicilioUsuario($domicilio);    
    $id=$objetoUsuarioManager->InsertaUsuario($objetoUsuario);        
    if($id != false){
        echo $id;
    }
    */
    
    
    /* 
    //Insercion rol de usuario    
    $objetoUsuario->setIdRolUsuario(4);
    $objetoUsuario->setIdUsuario(4);
    $id=$objetoUsuarioManager->InsertaUsuarioRol($objetoUsuario);
    
    if($id != false){
        echo $id;
    }
    */
    
    /*
    //Insercion plaza de usuario
    $objetoUsuario->setIdPlazaUsuario(4);
    $objetoUsuario->setIdUsuario(4);
    $id=$objetoUsuarioManager->InsertaUsuarioPlaza($objetoUsuario);
    
    if($id != false){
        echo $id;
    }
    */
    
    /*
    //Insercion cc de usuario
    $objetoUsuario->setIdCCUsuario(3);
    $objetoUsuario->setIdUsuario(4);
    $id=$objetoUsuarioManager->InsertaUsuarioCC($objetoUsuario);
    
    if($id != false){
        echo $id;
    }
    */
    
    /*
    //Insercion region de usuario
    $objetoUsuario->setIdRegionUsuario(3);
    $objetoUsuario->setIdUsuario(4);
    $id=$objetoUsuarioManager->InsertaUsuarioRegion($objetoUsuario);
    
    if($id != false){
        echo $id;
    }
    */
    
    /*
    //Insercion marca de usuario
    $objetoUsuario->setIdMarcaUsuario(3);
    $objetoUsuario->setIdUsuario(4);
    $id=$objetoUsuarioManager->InsertaUsuarioMarca($objetoUsuario);
    
    if($id != false){
        echo $id;
    }
    */

?>