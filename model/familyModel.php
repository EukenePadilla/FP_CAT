<?php
include_once 'connect_data.php';
include_once 'familyClass.php';

class familyModel extends familyClass
{
    private $link;
    private $list=array();
    
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
        mysqli_close ($this->link);
        
    }
   
    public function setList()
    {
        
        $this->OpenConnect();
        $sql="call spAllFamilies";
        
        $result = $this->link->query($sql);
        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
        {
            $newFamily=new familyModel();
            $newFamily->setCod_familia($row['cod_familia']);
            $newFamily->setNom_familia_eu($row['nom_familia_eu']);
            $newFamily->setNom_familia_es($row['nom_familia_es']);
            
            array_push($this->list, $newFamily);
        }
        mysqli_free_result($result);
        $this->CloseConnect();
    }
   
    
    
    function getListJsonString() {//if Class attributes PROTECTED
        
        // returns the list of objects in a srting with JSON format
        // Atributtes don't must be PUBLICs, they can be PRIVATE or PROTECTED
        $arr=array();
        
        foreach ($this->list as $object)
        {
            $vars = $object->getObjectVars();
            
            array_push($arr, $vars);
        }
        return json_encode($arr);
    }

    
}

