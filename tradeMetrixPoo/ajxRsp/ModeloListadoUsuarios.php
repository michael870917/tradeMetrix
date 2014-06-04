<?php

    session_start();
    include_once ("../config.php");    
    include_once $CFG->dataroot.'/lib/php/com/tradeMetrix/bo/UsuarioManagerBO.php';
    include_once $CFG->dataroot.'/lib/php/com/tradeMetrix/bo/Usuario.php';
    include_once $CFG->dataroot.'/lib/php/application/Utilities.php';

    //Instanceamiento de clases
    $utilities = new Utilities();
    $objetoUsuarioManager = new UsuarioManager();
    $objetoUsuario = new Usuario();        
    $utilities->limpiarEntrada(); // Ejecutar al inicio siempre la funcion para sanear la consulta    
    
    /// Consulta datos ya sea de con un objeto Usuario o un array de objetos usuario
        
    // consulta normal  -> Devuelve un array de objetos usuario
        //$objUsuario=$objetoUsuarioManager->BuscaUsuario();
    
    // Consulta simple (Devuelve objeto usuario) siempre debe llevar una condicional
        //$id=1;
        //$objetoUsuarioManager->ArmarCondicional(Constantes::ALIAS_IDUSUARIO,Constantes::IGUAL_DB,$id);    
        //$objUsuario=$objetoUsuarioManager->BuscaUsuario(Constantes::OUTPUTSIMPLE);
    
    // Consulta lista (Devuelve un array de objetos usuario) puede o no llevar condicionales
        $id=1;
        $objetoUsuarioManager->ArmarCondicional(Constantes::ALIAS_IDCATROLUSUARIO,Constantes::IGUAL_DB,$id);
        $objUsuario=$objetoUsuarioManager->BuscaUsuario(Constantes::OUTPUTSLISTA);
    
    if($objUsuario){
        if(is_object($objUsuario)){            
            echo $objUsuario->getIdUsuario().' id usuario<br>';
            echo $objUsuario->getIdRolUsuario().' id rol usuario<br>';
            echo $objUsuario->getRolUsuario().' rol usuario<br>';
            echo $objUsuario->getIdPlazaUsuario().' id plaza usuario<br>';
            echo $objUsuario->getPlazaUsuario().' plaza usuario<br>';
            echo $objUsuario->getIdRegionUsuario().' id region usuario<br>';
            echo $objUsuario->getRegionUsuario().' region usuario<br>';
            echo $objUsuario->getIdCCUsuario().' id centro consumo usuario<br>';
            echo $objUsuario->getCCUsuario().' centro consumo usuario<br>';
            echo $objUsuario->getNombreUsuario().' nombre usuario<br>';
            echo $objUsuario->getUsuario().' usuario<br>';
            echo $objUsuario->getClaveUsuario().' clave usuario<br>';
            echo $objUsuario->getEmailUsuario().' email usuario<br>';
            echo $objUsuario->getTelcelUsuario().' telcel usuario<br>';
            echo $objUsuario->getTelcasaUsuario().' telcasa usuario<br>';
            echo $objUsuario->getFotoUsuario().' foto usuario<br>';
            echo $objUsuario->getDomicilioUsuario().' domicilio usuario<br>';                
        }elseif(is_array($objUsuario)){            
            foreach($objUsuario as $user){
                echo $user->getIdUsuario().' '.$user->getIdRolUsuario().' '.$user->getRolUsuario().' '.$user->getIdPlazaUsuario()
                .' '.$user->getPlazaUsuario().' '.$user->getIdRegionUsuario().' '.$user->getRegionUsuario().' '.$user->getIdCCUsuario()
                .' '.$user->getCCUsuario().' '.$user->getNombreUsuario().' '.$user->getUsuario().' '.$user->getClaveUsuario()
                .' '.$user->getEmailUsuario().' '.$user->getTelcelUsuario().' '.$user->getTelcasaUsuario().' '.$user->getFotoUsuario()
                .' '.$user->getDomicilioUsuario().' <br>';
            }
        }    
    }else{
        echo "error";
    }        
?>