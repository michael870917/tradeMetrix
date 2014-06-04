<?php

/**
 * @author michael
 * @copyright 2014
 */

class ManejadorPreguntaSQL{
    
    private $_arregloCampos;
    private $_tabla;
    private $_tipoCampos;    
    
    public function CamposPregunta(){
        $this->_arregloCampos=array("id","id_forma","id_tipo","id_tipo_respuesta","id_clasif_resp","pregunta");
        return $this->_arregloCampos;
    }
    
    public function TablaPregunta(){
        $this->_tabla="preguntas";
        return $this->_tabla;
    }
    
    public function TipoCamposPregunta(){
        $this->_tipoCampos="iiiiis";
        return $this->_tipoCampos;
    }
    
    ///////////////////////////////////////////////////////////////////////////////////////////////////
    
    public function CamposPreguntaActualizacion(){
        $this->_arregloCampos=array("id_forma","id_tipo","id_tipo_respuesta","id_clasif_resp","pregunta");
        return $this->_arregloCampos;
    }
    
    public function CamposLLavePreguntaActualizacion(){
        $this->_arregloCampos=array("id");
        return $this->_arregloCampos;
    }
    
    public function TipoCamposPreguntaActualizacion(){
        $this->_tipoCampos="iiiisi";
        return $this->_tipoCampos;
    }
    
    ///////////////////////////////////////////////////////////////////////////////////////////////////
    
    public function CamposLLavePreguntaEliminacion(){
        $this->_arregloCampos=array("id");
        return $this->_arregloCampos;
    }
    
    public function TipoCamposPreguntaEliminacion(){
        $this->_tipoCampos="i";
        return $this->_tipoCampos;
    }
}

?>