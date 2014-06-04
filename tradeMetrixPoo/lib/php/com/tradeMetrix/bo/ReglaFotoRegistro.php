<?php

/**
 * @author michael
 * @copyright 2014
 */
class ReglaFotoRegistro{
    private $_idReglaFotoRegistro;
    private $_idTipoFoto;
    private $_tipoFoto;
    private $_idCampaniaFotoRegistro;
    private $_cantidadFotoRegistro;
    
    public function setIdReglaFotoRegistro($clave=null){
        $this->_idReglaFotoRegistro = $clave;
    }
    
    public function getIdReglaFotoRegistro(){
        return $this->_idReglaFotoRegistro;
    }
    
    public function setIdTipoFoto($clave=null){
        $this->_idTipoFoto = $clave;
    }
    
    public function getIdTipoFoto(){
        return $this->_idTipoFoto;
    }    
    
    public function setTipoFoto($clave=null){
        $this->_tipoFoto = $clave;
    }
    
    public function getTipoFoto(){
        return $this->_tipoFoto;
    }
    
    public function setIdCampaniaFotoRegistro($clave=null){
        $this->_idCampaniaFotoRegistro = $clave;
    }
    
    public function getIdCampaniaFotoRegistro(){
        return $this->_idCampaniaFotoRegistro;
    }
    
    public function setCantidadFotoRegistro($clave=null){
        $this->_cantidadFotoRegistro = $clave;
    }
    
    public function getCantidadFotoRegistro(){
        return $this->_cantidadFotoRegistro;
    }
    
    public function  FormaObjetoListaReglaFotoRegistroCampania($array){        
        $read = new LecturaReglaFotoRegistro();
        foreach($array as $key => $value){
            $objMayor = new ReglaFotoRegistro();
            $objMayor->setIdReglaFotoRegistro($value->idReglaFotoRegistro);
            $objMayor->setIdTipoFoto($value->idTipoFoto);
            $objMayor->setTipoFoto($value->tipoFoto);            
            $objMayor->setIdCampaniaFotoRegistro($value->idCampaniaReglaFotoRegistro);
            $objMayor->setCantidadFotoRegistro($value->cantidadFotoRegistro);
            $read->setNuevoObjetoReglaFotoRegistro($objMayor);
            $read->cargarObjetosReglaFotoRegistro();
        }        
        $coleccion=$read->getListaObjetosReglaFotoRegistro();
        return $coleccion;
    }
}

class LecturaReglaFotoRegistro{
    private $_arregloObjetosReglaFotoRegistro = array();    
    
    ///////////////////////////////////////////////
    // Opera Bloque Regla foto registro    
    public function cargarObjetosReglaFotoRegistro(){
        array_push($this->_arregloObjetosReglaFotoRegistro,$this->nuevoArreglo);
    }
    
    public function getListaObjetosReglaFotoRegistro(){
        return $this->_arregloObjetosReglaFotoRegistro;
    }
    
    public function setNuevoObjetoReglaFotoRegistro(ReglaFotoRegistro $objetoIncorporar){
        $this->nuevoArreglo=$objetoIncorporar;
    }        
}
?>