<?php

/**
 * @author michael
 * @copyright 2014
 */

interface ManagerInterface{
    public function ArmarCondicional($nombreCampo,$condicional,$valorEvaluacion);    
    public function FormaObjetoSimple($array);
    public function FormaObjetoLista($array);    
}


?>