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
    
    
    // consulta normal
        //$objTablero=$objetoTableroManager->BuscaTablero();
    
    // Consulta simple (Devuelve objeto usuario) siempre debe llevar una condicional
        //$id=1;                    
        //$objetoTableroManager->ArmarCondicional(Constantes::ONLY_IDCATROL,Constantes::IGUAL_DB,$id);
        //$objTablero=$objetoTableroManager->BuscaTablero(Constantes::OUTPUTSIMPLE);
    
    // Consulta lista (Devuelve un array de objetos usuario) puede o no llevar condicionales
        $id=1;
        $id2=1;
        $objetoTableroManager->ArmarCondicional(Constantes::ONLY_IDTABLERO,Constantes::IGUAL_DB,$id);
        $objetoTableroManager->ArmarCondicional(Constantes::ONLY_IDCATROL,Constantes::IGUAL_DB,$id2);
        $objTablero=$objetoTableroManager->BuscaTablero(Constantes::OUTPUTSLISTA);
    
    if($objTablero){
        if(is_object($objTablero)){            
            echo $objTablero->getIdTablero().' -----> id tablero<br>';
            echo $objTablero->getIdReporteTablero().' -----> id reporte tablero<br>';
            echo $objTablero->getReporteTablero().' -----> reporte tablero<br>';
            echo $objTablero->getIdRolTablero().' -----> id rol tablero<br>';
            echo $objTablero->getRolTablero().' -----> rol tablero<br>';
            echo $objTablero->getIdVisualizacionTablero().' -----> id visualizacion tablero<br>';
            echo $objTablero->getVisualizacionTablero().' -----> visualizacion tablero<br>';                                        
        }elseif(is_array($objTablero)){            
            foreach($objTablero as $tablero){
                echo $tablero->getIdTablero().' ------> '.$tablero->getIdReporteTablero().' ------> '.$tablero->getReporteTablero()
                .' ------> '.$tablero->getIdRolTablero().' ------> '.$tablero->getRolTablero().' ------> '.$tablero->getIdVisualizacionTablero()
                .' ------> '.$tablero->getVisualizacionTablero().'<br>';
            }
        }    
    }else{
        echo "error";
    }

?>