<?php
/**
 * @author michael
 * @copyright 2014
 */
class AccionesValidacion{                    
    public function __construct(){                        
    }
    
    public function __destruct(){
        
    }
    private $_string;  
    private $_reemplazaBusqueda;      
    public function Where($arreglo){
        $m=0;
        foreach($arreglo as $key => $value){
            if(is_array($value)){
                foreach($value as $key2 => $value2){
                    if($m == 0){
                        if(is_string($value2)){
                          $this->_string .= $key.$this->ReemplazaBusqueda($key2)."'".$value2."'";  
                        }else{
                            $this->_string .= $key.$this->ReemplazaBusqueda($key2).$value2;
                        }    
                    }else{
                        if(is_string($value2)){
                          $this->_string .= " AND ".$key.$this->ReemplazaBusqueda($key2)."'".$value2."'";  
                        }else{
                            $this->_string .= " AND ".$key.$this->ReemplazaBusqueda($key2).$value2;
                        }
                    }
                }
            }
            $m++;
        }
        return $this->_string;
    }
    
    
    public function WhereUnique($nameObj,$compareBd,$valueObj){        
        if(is_string($valueObj)){
            $this->_string = $nameObj.$this->ReemplazaBusqueda($compareBd)."'".$valueObj."'";  
        }else{
            $this->_string = $nameObj.$this->ReemplazaBusqueda($compareBd).$valueObj;
        }    
        return $this->_string;
    }
    
    public function ReemplazaBusqueda($reemplazar){
        $array=array("igual" => "=", "diferente" => "<>", "menor" => "<", "mayor" => ">", "menorigual" => "<=", "mayorigual" => ">=");    
        foreach($array as $key => $value){
            if(strtolower($reemplazar) == $key){
                $this->_reemplazaBusqueda=$value;
            }
        }        
        return $this->_reemplazaBusqueda;
    }
    
}
?>