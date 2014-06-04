<?php
/**
 * @author michael
 * @copyright 2014
 */
class Tablero{
    private $_idTablero;
    private $_idReporteTablero;
    private $_reporteTablero;
    private $_idRolTablero;
    private $_rolTablero;
    private $_idVisualizacionTablero;
    private $_visualizacionTablero;
    
    public function setIdTablero($clave=null){
        $this->_idTablero = $clave;
    }
    
    public function getIdTablero(){
        return $this->_idTablero;
    }
    
    public function setIdReporteTablero($clave=null){
        $this->_idReporteTablero = $clave;
    }
    
    public function getIdReporteTablero(){
        return $this->_idReporteTablero;
    }
    
    public function setReporteTablero($clave=null){
        $this->_reporteTablero = $clave;
    }
    
    public function getReporteTablero(){
        return $this->_reporteTablero;
    }
    
    public function setIdRolTablero($clave=null){
        $this->_idRolTablero = $clave;
    }
    
    public function getIdRolTablero(){
        return $this->_idRolTablero;
    }
    
    public function setRolTablero($clave=null){
        $this->_rolTablero = $clave;
    }
    
    public function getRolTablero(){
        return $this->_rolTablero;
    }
    
    public function setIdVisualizacionTablero($clave=null){
        $this->_idVisualizacionTablero = $clave;
    }
    
    public function getIdVisualizacionTablero(){
        return $this->_idVisualizacionTablero;
    }
    
    public function setVisualizacionTablero($clave=null){
        $this->_visualizacionTablero = $clave;
    }
    
    public function getVisualizacionTablero(){
        return $this->_visualizacionTablero;
    }
    
}
?>