<?php

    session_start();
    include_once ("../config.php");    
    include_once $CFG->dataroot.'/lib/php/com/tradeMetrix/bo/CampaniaManagerBO.php';    
    include_once $CFG->dataroot.'/lib/php/application/Utilities.php';
    //Instanceamiento de clases
    $utilities = new Utilities();
    $objetoClassManager = new CampaniaManager();    
    $utilities->limpiarEntrada(); // Ejecutar al inicio siempre la funcion para sanear la consulta    
    
    
    // consulta normal
        //$objClass=$objetoClassManager->BuscaCampania();
    
    // Consulta simple (Devuelve objeto usuario) siempre debe llevar una condicional
        //$id=2;                    
        //$objetoClassManager->ArmarCondicional(Constantes::ONLY_IDAUDITORIA,Constantes::IGUAL_DB,$id);
        //$objClass=$objetoClassManager->BuscaAuditoria(Constantes::OUTPUTSIMPLE);
    
    // Consulta lista (Devuelve un array de objetos usuario) puede o no llevar condicionales
        //$id=1;
        //$name="Hornitos master";
        //$objetoClassManager->ArmarCondicional(Constantes::ALIAS_IDCAMPANIA,Constantes::IGUAL_DB,$id);
        //$objetoClassManager->ArmarCondicional(Constantes::ALIAS_NOMBRECAMPANIA,Constantes::IGUAL_DB,$name);
        
        $objClass=$objetoClassManager->BuscaCampania(Constantes::OUTPUTSLISTA);
    
    if($objClass){
        if(is_object($objClass)){            
            echo $objClass->getIdAuditoria().' -----> id auditoria<br>';
            echo $objClass->getFechaAuditoria().' -----> fecha auditoria<br>';
            echo $objClass->getPeriodoIniAuditoria().' -----> periodo inicial auditoria<br>';
            echo $objClass->getPeriodoFinAuditoria().' -----> periodo final auditoria<br>';
            echo $objClass->getIdUsuarioAuditoria().' -----> id usuario auditoria<br>';
            echo $objClass->getUsuarioAuditoria().' -----> usuario auditoria<br>';
            echo $objClass->getIdEventoAuditoria().' -----> id evento auditoria<br>';                                        
        }elseif(is_array($objClass)){            
            foreach($objClass as $dataSet){
                echo $dataSet->getIdCampania().' ------> '.$dataSet->getIdMarcaCampania().' ------> '.$dataSet->getMarcaCampania()
                .' ------> '.$dataSet->getIdPlazaCampania().' ------> '.$dataSet->getPlazaCampania().' ------> '.$dataSet->getNombreCampania()
                .' ------> '.$dataSet->getObjetivoCampania().' ------> '.$dataSet->getObjetivoKpiCampania().' ------> '.$dataSet->getTypeKpiCampania()
                .' ------> '.$dataSet->getFechaIniCampania().' ------> '.$dataSet->getFechaFinCampania().' ------> '.$dataSet->getActivoCampania()
                .' ------> '.$dataSet->getListActividadesCampania().' ------>'.$dataSet->getListHerramientaCampania()
                .' ------>'.$dataSet->getListReglaFotoRegistroCampania().' ------>'.$dataSet->getListReglaInventarioCampania()
                .' ------>'.$dataSet->getListReglaOtrosCampania().' ------>'.$dataSet->getListEventosCampania().' -----> listado campania<br>';
                
                if($dataSet->getListActividadesCampania() != false){
                    foreach($dataSet->getListActividadesCampania() as $dataInicial){
                        echo $dataInicial->getIdActividad().' ------> '.$dataInicial->getIdTipoActividad().' ------> '.$dataInicial->getTipoActividad()
                        .' ------> '.$dataInicial->getIdClasificacionActividad().' ------> '.$dataInicial->getClasificacionActividad()
                        .' ------> '.$dataInicial->getDescripcionActividad().' ------> '.$dataInicial->getPrioridadActividad().' ------> listado actividades<br>';
                        
                    }
                }
                
                if($dataSet->getListHerramientaCampania() != false){
                    foreach($dataSet->getListHerramientaCampania() as $dataInicialHer){
                        echo $dataInicialHer->getIdHerramienta().' ------> '.$dataInicialHer->getHerramienta().' ------> '.$dataInicialHer->getIdCampaniaHerramienta().' listado herramienta<br>';
                    }
                }    
                
                if($dataSet->getListReglaFotoRegistroCampania() != false){
                    foreach($dataSet->getListReglaFotoRegistroCampania() as $dataInicialFReg){
                        echo $dataInicialFReg->getIdReglaFotoRegistro().' ------> '.$dataInicialFReg->getIdTipoFoto().' ------> '
                        .$dataInicialFReg->getTipoFoto().' ------> '.$dataInicialFReg->getIdCampaniaFotoRegistro()
                        .' ------> '.$dataInicialFReg->getCantidadFotoRegistro().' listado fotoregistro<br>';
                    }
                }
                
                if($dataSet->getListReglaInventarioCampania() != false){
                    foreach($dataSet->getListReglaInventarioCampania() as $dataInicialInv){
                        echo $dataInicialInv->getIdReglaInventario().' ------> '.$dataInicialInv->getProductoInventario().' ------> '
                        .$dataInicialInv->getIdProductoInventario().' ------> '.$dataInicialInv->getIdCampaniaInventario()
                        .' ------> '.$dataInicialInv->getUnitarioInventario().' ------> '.$dataInicialInv->getCantidadInventario().' listado inventario<br>';
                    }
                }
                
                
                if($dataSet->getListReglaOtrosCampania() != false){
                    foreach($dataSet->getListReglaOtrosCampania() as $dataInicialOtros){
                        echo $dataInicialOtros->getIdReglaOtros().' ------> '.$dataInicialOtros->getIdCampaniaOtros().' ------> '
                        .$dataInicialOtros->getDescripcionOtros().' ------> '.$dataInicialOtros->getCantidadOtros().' listado otros<br>';
                    }
                }
                
                if($dataSet->getListEventosCampania() != false){
                    foreach($dataSet->getListEventosCampania() as $dataInicialEvent){                        
                        echo $dataInicialEvent->getIdEvento().' ------> '.$dataInicialEvent->getIdCampaniaEvento()
                        .' ------> '.$dataInicialEvent->getIdCCEvento().' ------> '.$dataInicialEvent->getNombreCCEvento()
                        .' ------> '.$dataInicialEvent->getFechaEvento().' ------> '.$dataInicialEvent->getHorainiEvento()
                        .' ------> '.$dataInicialEvent->getHorafinEvento().' ------> '.$dataInicialEvent->getActivoEvento().' listado eventos <br>';
                    }
                }
            }
        }    
    }else{
        echo "error";
    }

?>