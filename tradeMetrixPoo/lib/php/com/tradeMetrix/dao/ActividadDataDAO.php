<?php

/**
 * @author michael
 * @copyright 2014
 */

class ManejadorActividadSQL{
    
    private $_arregloCampos;
    private $_tabla;
    private $_tipoCampos;    
    
    public function CamposActividad(){
        $this->_arregloCampos=array("id","id_tipo_actividad","id_clasif","descripcion","prioridad");
        return $this->_arregloCampos;
    }
    
    public function TablaActividad(){
        $this->_tabla="actividades";
        return $this->_tabla;
    }
    
    public function TipoCamposActividad(){
        $this->_tipoCampos="iiisi";
        return $this->_tipoCampos;
    }
    
    ///////////////////////////////////////////////////////////////////////////////////////////////////
    
    public function CamposActividadActualizacion(){
        $this->_arregloCampos=array("id_tipo_actividad","id_clasif","descripcion","prioridad");
        return $this->_arregloCampos;
    }
    
    public function CamposLLaveActividadActualizacion(){
        $this->_arregloCampos=array("id");
        return $this->_arregloCampos;
    }
    
    public function TipoCamposActividadActualizacion(){
        $this->_tipoCampos="iisii";
        return $this->_tipoCampos;
    }
    
    ///////////////////////////////////////////////////////////////////////////////////////////////////
    
    public function CamposLLaveActividadEliminacion(){
        $this->_arregloCampos=array("id");
        return $this->_arregloCampos;
    }
    
    public function TipoCamposActividadEliminacion(){
        $this->_tipoCampos="i";
        return $this->_tipoCampos;
    }    
}

?>