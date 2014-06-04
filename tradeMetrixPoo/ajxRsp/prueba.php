<?php

/**
 * @author michael
 * @copyright 2014
 */

session_start();
    include_once ("../config.php");        
    include_once $CFG->dataroot.'/lib/php/com/tradeMetrix/bo/Prueba.php';
    //include_once $CFG->dataroot.'/lib/php/application/Utilities.php';
    //Instanceamiento de clases
    //$utilities = new Utilities();    
    
    //$utilities->limpiarEntrada(); // Ejecutar al inicio siempre la funcion para sanear la consulta

    $objetoClass = new Prueba();
    $datos=$objetoClass->Carbon()->Hierro();    
    print_r($datos);
        
?>