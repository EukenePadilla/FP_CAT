<?php
include_once 'countryClass.php';
include_once 'connect_data.php';

class countryModel extends countryClass{
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
         try
         { 
           $this->link->close();
         }
         catch(Exception $e)
        {
         echo $e->getMessage();
        }  
    } 
    
    
    function findIdCountry() // fill country : $this
    {
        $this->OpenConnect();
        $code=$this->Code;
        $sql="call spFindIdCountry('$code')";
         
        $result = $this->link->query($sql);    
         if ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) 
         {    
            $this->setName($row['Name']);
            $this->setContinent($row['Continent']);
            //$this->setSurfaceArea($row['SurfaceArea']);
            //$this->setIndepYear($row['IndepYear']);
            $this->setPopulation($row['Population']);
            //$this->setLifeExpectancy($row['LifeExpectancy']);
            // $this->setCapital($row['Capital']);
         }
         mysqli_free_result($result);
        
       $this->CloseConnect();
    }
    
    function setListByContinent()  // fill country : $this->list
    {  
        $this->OpenConnect();
        $continent=$this->Continent;
        $sql="call spFindContinentCountries('$continent')";
         
        $result = $this->link->query($sql);    
         while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) 
         {    
            $newCountry=new countryModel();
            $newCountry->setCode($row['Code']);
            $newCountry->setName($row['Name']);
            $newCountry->setContinent($row['Continent']);
            //$newCountry->setSurfaceArea($row['SurfaceArea']);
            //$newCountry->setIndepYear($row['IndepYear']);
            $newCountry->setPopulation($row['Population']);
            //$newCountry->setLifeExpectancy($row['LifeExpectancy']);
            //$newCountry->setCapital($row['Capital']);      
            array_push($this->list, $newCountry);
         }
        mysqli_free_result($result); 
       $this->CloseConnect();
    }
    
    function getListCountriesJson()   // convert country : $this->list to JSON
    {
        // returns the list of objects in a srting with JSON format
        $arr=array();
        
        foreach ($this->list as $object)
        {
            $vars = $object->getObjectVars();
            
            array_push($arr, $vars);
        }
        return json_encode($arr);
    }
 
}
