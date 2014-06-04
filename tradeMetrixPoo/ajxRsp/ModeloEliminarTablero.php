<?php

    session_start();
    include_once ("../config.php");    
    include_once $CFG->dataroot.'/lib/php/com/tradeMetrix/bo/TableroManagerBO.php';
    include_once $CFG->dataroot.'/lib/php/com/tradeMetrix/bo/Tablero.php';    
    include_once $CFG->dataroot.'/lib/php/application/Utilities.php';
       
    //Instanceamiento de clases
    $utilities = new Utilities();
    $objetoTableroManager = new TableroManager();
    $objetoTablero = new Tablero();        
    $utilities->limpiarEntrada(); // Ejecutar al inicio siempre la funcion para sanear la consulta    
    
    
    $objetoTablero->setIdTablero(7);    
    $id=$objetoTableroManager->EliminarTablero($objetoTablero);    
    if($id != false){
        echo $id;
    }else{
        echo "error";
    }
    
    

?>