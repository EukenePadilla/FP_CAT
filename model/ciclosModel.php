// <?php
include_once 'ciclosClass.php';
include_once 'connect_data.php';

class ciclosModel extends ciclosClass{
    private $link;
    private $list=array();
    private $objFamilia;
    
    /**
     * @return mixed
     */
    public function getObjFamilia()
    {
        return $this->objFamilia;
    }

    /**
     * @param mixed $objFamilia
     */
    public function setObjFamilia($objFamilia)
    {
        $this->objFamilia = $objFamilia;
    }

    public function OpenConnect()
    {
        $konDat=new connect_data();
         try
        {
            $this->link=new mysqli($konDat->host,$konDat->userbbdd,$konDat->passbbdd,$konDat->ddbbname);
        }
        catch(Exception $e)
        {
             echo $e->getMessage();
         }
        $this->link->set_charset("utf8"); // honek behartu egiten du aplikazio eta 
        //                  //databasearen artean UTF -8 erabiltzera datuak trukatzeko
    }                   
    public function CloseConnect()
    {
         try
         { 
           $this->link->close();
         }
         catch(Exception $e)
        {
         echo $e->getMessage();
        }  
    } 
    
    function setListByFamilia() 
    {  
        $this->OpenConnect();
        $codFamilia=$this->Cod_familia;/* 
        var_dump($codFamilia); */
        $codFamilia=implode($codFamilia);
        //var_dump($codFamilia);
        $sql="call spFindCiclosFamilia('$codFamilia')"; 
         
/*         DELIMITER $$
        CREATE DEFINER=`root`@`localhost` PROCEDURE `spFindCiclosFamilia`(IN `pCodFamilia` VARCHAR(40))
        NO SQL
        select ciclos.nom_ciclo_eu,ciclos.nom_ciclo_es from ciclos where ciclos.cod_familia=pCodFamilia$$
        DELIMITER ; */
        
        
        $result = $this->link->query($sql);    
         while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) 
         {    
            $newCiclo=new ciclosModel();
            
            $newCiclo->setNom_ciclo_eu($row['nom_ciclo_eu']);
            $newCiclo->setNom_ciclo_es($row['nom_ciclo_es']);
            
            array_push($this->list, $newCiclo);
         }
        mysqli_free_result($result); 
       $this->CloseConnect();
    }
    
    
//     function getListCiclosJson() // convert countryLanguage : $this->list to JSON
//         {
//             // returns the list of objects in a srting with JSON format
//             $arr=array();
        
//             foreach ($this->list as $object)
//                 {
//                     $vars = $object->getObjectVars();
            
//                     if ($object->objFamilia !=null){
            
//                         $vars['objFamilia']=$object->objFamilia->getObjectVars();
//                     }
//                     array_push($arr, $vars);
//                 }
//                 return json_encode($arr);
//             }
        
    
    function getListCiclosJson()   
    {
        
        $arr=array();
        
        foreach ($this->list as $object)
        {
            $vars = $object->getObjectVars();
            
            array_push($arr, $vars);
        }
        return json_encode($arr);
    }
 
}
