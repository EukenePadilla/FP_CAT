<?php
include_once 'familiasClass.php';
include_once 'connect_data.php';

class familiasModel extends familiasClass{
    private $link;
    private $list=array();
    private $objCiclo;
    
    /**
     * @return mixed
     */
    public function getObjCiclo()
    {
        return $this->objCiclo;
    }

    /**
     * @param mixed $objCiclos
     */
    public function setObjCiclo($objCiclo)
    {
        $this->objCiclo = $objCiclo;
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
    
    function setAllFamiliasProfesionales() 
    {
        $this->OpenConnect();
        $sql="call spFindAllFamiliasProfesionales()";
        
/*         DELIMITER $$
        CREATE DEFINER=`root`@`localhost` PROCEDURE `spFindAllFamiliasProfesionales`()
        NO SQL
        select * from familias$$
        DELIMITER ; */
        
        $result = $this->link->query($sql);
        
        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
        {
            $familiasProfesionales=new familiasModel();
            
            $familiasProfesionales->setCod_familia($row['cod_familia']);
            $familiasProfesionales->setNom_familia_es($row['nom_familia_es']);
            $familiasProfesionales->setNom_familia_eu($row['nom_familia_eu']);
            
            
            array_push($this->list, $familiasProfesionales);
        }
        mysqli_free_result($result);
        
        $this->CloseConnect();
    }
    
    function setFindCodFamilia(){
        $this->OpenConnect();
                $familiaEu=$this->Nom_familia_eu;
                $sql="call spFindCodFamilia('$familiaEu')";
                
/*                 DELIMITER $$
                CREATE DEFINER=`root`@`localhost` PROCEDURE `spFindCodFamilia`(IN `pFamiliaEu` VARCHAR(40))
                NO SQL
                select familias.cod_familia from familias where familias.nom_familia_eu=pFamiliaEu$$
                DELIMITER ; */
                
                $result = $this->link->query($sql);
                 if ($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
                     {
                    $this->setCod_familia($row['cod_familia']);
                     }               
                     
                 mysqli_free_result($result);
               $this->CloseConnect();
               return $row;
               
              
    }
    
    function getFamiliasProfesionalesJson()
    {
        // returns the list of objects in a srting with JSON format
        $arr=array();
        
        foreach ($this->list as $object)
        {
            $vars = $object->getObjectVars();
            
            if ($object->objCiclo !=null){
                
                $vars['objCiclo']=$object->objCiclo->getObjectVars();
            }
            array_push($arr, $vars);
        }
        return json_encode($arr);
    }
    
}
