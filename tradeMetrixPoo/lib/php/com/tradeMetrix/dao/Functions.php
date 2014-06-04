<?php

/**
 * @author michael
 * @copyright 2014
 */



class Generic{
    public $vars;
    
    public function __construct(){}
    
    public function get($var){
        return $this->vars[$var];
    }
    
    public function set($key,$value){
        return $this->vars[$key] = $value;
    }    
}





class FunctionCompleteQuery{
    public function recorro($matriz){
        $armando=array();
        foreach($matriz[0] as $key => $value){
            if(is_array($value)){
                recorro($value);
            }else{
                $armando[] = $key;
            }
        }
        
        $nombreObjetos = new stdClass();
        foreach($armando as $key => $value){            
            $nombreObjetos->$value = "";                       
        }
        return $nombreObjetos;        
    }
    
    
    
    public function methodWhere($fields){        
        if(count($fields) > 0){      
            $device=" WHERE ";
            $m=1;
            foreach($fields as $key => $value){
                if($m > 1){
                    $device .= " AND ".$value;
                }else{
                    $device .= $value;    
                }
                $m++;
            }
        }
        return $device;
    }
    
    public function methodLike($fields){        
        if(count($fields) > 0){      
            $device=" WHERE (";
            $m=1;
            foreach($fields as $key => $value){
                if($m > 1){
                    $device .= " OR ".$key." LIKE '%".$value."%'";
                }else{
                    $device .= $key." LIKE '%".$value."%'";
                }
                $m++;
                $string="";
            }
            $device .= ")";
        }
        return $device;
    }
    
    public function explodeMulti($delimiter,$value){
        foreach($delimiter as $data){
            if(stristr($value, $data) !== FALSE){                
                if($data == "<>" && $data == "<" && $data == ">"){
                    if($data == "<>"){
                        $this->delimiter($data);
                        $str=explode($data,$value);    
                    }
                }else{
                    $this->delimiter($data);
                    $str=explode($data,$value);
                }
            }
        }        
        return $str;
    }

    public function delimiter($dato){
        $this->dato=$dato;    
    }                

    public function array_to_xml($array, $level=1) {
        $xml = '';
        foreach ($array as $key=>$value) {
            
            $key = strtolower($key);
            if (is_object($value)) {$value=get_object_vars($value);}// convert object to array
            if (is_array($value)) {
                $multi_tags = false;
                foreach($value as $key2=>$value2) {
                 if (is_object($value2)) {$value2=get_object_vars($value2);} // convert object to array
                    if (is_array($value2)) {
                        $xml .= str_repeat("\t",$level)."<$key>\n";
                        $xml .= $this->array_to_xml($value2, $level+1);
                        $xml .= str_repeat("\t",$level)."</$key>\n";
                        $multi_tags = true;
                    } else {
                        if (trim($value2)!='') {
                            if (htmlspecialchars($value2)!=$value2) {
                                $xml .= str_repeat("\t",$level).
                                    "<$key2><![CDATA[$value2]]>"."</$key2>\n"; // changed $key to $key2... didn't work otherwise.
                            } else {
                                $xml .= str_repeat("\t",$level)."<$key2>$value2</$key2>\n"; // changed $key to $key2
                            }
                        }
                        $multi_tags = true;
                    }
                }
                if (!$multi_tags and count($value)>0) {
                    $xml .= str_repeat("\t",$level)."<$key>\n";
                    $xml .= $this->array_to_xml($value, $level+1);
                    $xml .= str_repeat("\t",$level)."</$key>\n";
                }
             } else {
                if (trim($value)!='') {
                    echo "value=$value<br>";
                    if (htmlspecialchars($value)!=$value) {
                        $xml .= str_repeat("\t",$level)."<$key>"."<![CDATA[$value]]></$key>\n";
                    } else {
                        $xml .= str_repeat("\t",$level)."<$key>$value</$key>\n";
                    }
                }
            }
        }
    return $xml;
    }
    
     
}

?>