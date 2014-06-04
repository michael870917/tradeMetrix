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
    
    
    foreach($_REQUEST as $key => $value){
        $asignacion = "\$" . $key . "='" .strip_tags(($value)). "';";
		eval($asignacion);
    }
    // Actualiza Tablero    
    $objetoTablero->setIdRolTablero($idrol);
    $objetoTablero->setIdReporteTablero($idreporte);
    $objetoTablero->setIdVisualizacionTablero($idvisualizacion);    
    $objetoTablero->setIdTablero(8);
    $id=$objetoTableroManager->ActualizaTablero($objetoTablero);    
    if($id != false){
        echo $id;
    }else{
        echo "error";
    }


?>