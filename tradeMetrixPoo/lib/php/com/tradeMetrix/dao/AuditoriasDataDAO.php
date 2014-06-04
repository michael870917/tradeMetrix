<?php

/**
 * @author michael
 * @copyright 2014
 */

class ManejadorAuditoriaSQL{
    
    private $_arregloCampos;
    private $_tabla;
    private $_tipoCampos;    
    
    public function CamposAuditoria(){
        $this->_arregloCampos=array("id","fecha_auditoria","fecha_ini","fecha_fin");
        return $this->_arregloCampos;
    }
    
    public function TablaAuditoria(){
        $this->_tabla="auditoria";
        return $this->_tabla;
    }
    
    public function TipoCamposAuditoria(){
        $this->_tipoCampos="isss";
        return $this->_tipoCampos;
    }
    
    ///////////////////////////////////////////////////////////////////////////////////////////////////    
    
    public function CamposUsuarioAuditoria(){
        $this->_arregloCampos=array("id","id_auditoria","id_usuarios");
        return $this->_arregloCampos;
    }
    
    public function TablaUsuarioAuditoria(){
        $this->_tabla="auditoria_to_usuarios";
        return $this->_tabla;
    }
    
    public function TipoCamposUsuarioAuditoria(){
        $this->_tipoCampos="iii";
        return $this->_tipoCampos;
    }
    
    ///////////////////////////////////////////////////////////////////////////////////////////////////
    
    public function CamposAuditoriaActualizacion(){
        $this->_arregloCampos=array("fecha_auditoria","fecha_ini","fecha_fin");
        return $this->_arregloCampos;
    }
    
    public function CamposLLaveAuditoriaActualizacion(){
        $this->_arregloCampos=array("id");
        return $this->_arregloCampos;
    }
    
    public function TipoCamposAuditoriaActualizacion(){
        $this->_tipoCampos="sssi";
        return $this->_tipoCampos;
    }
    
    ///////////////////////////////////////////////////////////////////////////////////////////////////
    
    public function CamposLLaveAuditoriaEliminacion(){
        $this->_arregloCampos=array("id");
        return $this->_arregloCampos;
    }
    
    public function TipoCamposAuditoriaEliminacion(){
        $this->_tipoCampos="i";
        return $this->_tipoCampos;
    }
    
    
    ///////////////////////////////////////////////////////////////////////////////////////////////////
    
    public function CamposLLaveUsuarioAuditoriaEliminacion(){
        $this->_arregloCampos=array("id_auditoria","id_usuarios");
        return $this->_arregloCampos;
    }
    
    public function TipoCamposUsuarioAuditoriaEliminacion(){
        $this->_tipoCampos="ii";
        return $this->_tipoCampos;
    }    
    
}

?>