<?php
include_once ("DBConfig.php");
include_once ("DaoAbstract.php");
interface allFunctionsReports{
    public function SelectDatosVistas();
    public function SelectDatosStored();
}

class metodosGenericosDAO extends DaoAbstract implements allFunctionsReports{
    private $functionCompleteQueryController;
    
    public function __construct(){
        parent::__construct();
        $this->functionCompleteQueryController = new FunctionCompleteQuery();
    }
    
    public function __destruct(){
        parent::__destruct();
        unset($this->functionCompleteQueryController);
    }
    
    public function SelectDatosVistas($accion=null){        
        if($accion !== ""){
            $query="SELECT * FROM " .$accion;            
            $resulset=$this->getBySqlQueryTwo($this->link,$query);
        }else{
            $resulset=false;
        }
        return $resulset;
    }
    
    public function SelectDatosStored($accion = null){
        
    }
   
}

?>