<?php
/**
 * @author michael
 * @copyright 2014
 */
class ReglaOtros{
    private $_idReglaOtros;
    private $_idCampaniaOtros;
    private $_cantidadOtros;
    private $_descripcionOtros;
    
    public function setIdReglaOtros($clave=null){
        $this->_idReglaOtros = $clave;
    }
        
    public function getIdReglaOtros(){
        return $this->_idReglaOtros;
    }
        
    public function setIdCampaniaOtros($clave=null){
        $this->_idCampaniaOtros = $clave;
    }
    
    public function getIdCampaniaOtros(){
        return $this->_idCampaniaOtros;
    }
    
    public function setCantidadOtros($clave=null){
        $this->_cantidadOtros = $clave;
    }
    
    public function getCantidadOtros(){
        return $this->_cantidadOtros;
    }
    
    public function setDescripcionOtros($clave=null){
        $this->_descripcionOtros = $clave;
    }
    
    public function getDescripcionOtros(){
        return $this->_descripcionOtros;
    }
    
    public function  FormaObjetoListaReglaOtrosCampania($array){        
        $read = new LecturaReglaOtros();
        foreach($array as $key => $value){
            $objMayor = new ReglaOtros();
            $objMayor->setIdReglaOtros($value->idReglaOtros);
            $objMayor->setIdCampaniaOtros($value->idCampaniaReglaOtros);
            $objMayor->setCantidadOtros($value->cantidadReglaOtros);
            $objMayor->setDescripcionOtros($value->descripcionReglaOtros);
            $read->setNuevoObjetoReglaOtros($objMayor);
            $read->cargarObjetosReglaOtros();
        }        
        $coleccion=$read->getListaObjetosReglaOtros();
        return $coleccion;
    }
}


class LecturaReglaOtros{
    private $_arregloObjetosReglaOtros = array();    
    
    ///////////////////////////////////////////////
    // Opera Bloque Regla otros    
    public function cargarObjetosReglaOtros(){
        array_push($this->_arregloObjetosReglaOtros,$this->nuevoArreglo);
    }
    
    public function getListaObjetosReglaOtros(){
        return $this->_arregloObjetosReglaOtros;
    }
    
    public function setNuevoObjetoReglaOtros(ReglaOtros $objetoIncorporar){
        $this->nuevoArreglo=$objetoIncorporar;
    }        
}

?>