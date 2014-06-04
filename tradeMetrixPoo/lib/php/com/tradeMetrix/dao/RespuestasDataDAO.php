<?php

/**
 * @author michael
 * @copyright 2014
 */

class ManejadorRespuestasSQL{
    
    private $_arregloCampos;
    private $_tabla;
    private $_tipoCampos;    
    
    public function CamposRespuestas(){
        $this->_arregloCampos=array("id","id_evento","id_pregunta","id_forma","id_usuario","respuesta");
        return $this->_arregloCampos;
    }
    
    public function TablaRespuestas(){
        $this->_tabla="respuestas";
        return $this->_tabla;
    }
    
    public function TipoCamposRespuestas(){
        $this->_tipoCampos="iiiiis";
        return $this->_tipoCampos;
    }
    
    ///////////////////////////////////////////////////////////////////////////////////////////////////
    
    public function CamposRespuestasActualizacion(){
        $this->_arregloCampos=array("id_evento","id_pregunta","id_forma","id_usuario","respuesta");
        return $this->_arregloCampos;
    }
    
    public function CamposLLaveRespuestasActualizacion(){
        $this->_arregloCampos=array("id");
        return $this->_arregloCampos;
    }
    
    public function TipoCamposRespuestasActualizacion(){
        $this->_tipoCampos="iiiisi";
        return $this->_tipoCampos;
    }
    
    ///////////////////////////////////////////////////////////////////////////////////////////////////
    
    public function CamposLLaveRespuestasEliminacion(){
        $this->_arregloCampos=array("id");
        return $this->_arregloCampos;
    }
    
    public function TipoCamposRespuestasEliminacion(){
        $this->_tipoCampos="i";
        return $this->_tipoCampos;
    }
}

?>