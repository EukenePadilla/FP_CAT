// <?php
// include_once 'countryLanguageClass.php';
// include_once 'countryModel.php';
// include_once 'connect_data.php';

// class countryLanguageModel extends countryLanguageClass{
//     private $link;
//     private $list=array();
//     private $objCountry;
    
    
//     public function getObjCountry()
//     {
//         return $this->objCountry;
//     }
//     public function setObjCountry($objCountry)
//     {
//         $this->objCountry = $objCountry;
//     }

//     public function OpenConnect()
//     {
//         $konDat=new connect_data();
//          try
//         {
//             $this->link=new mysqli($konDat->host,$konDat->userbbdd,$konDat->passbbdd,$konDat->ddbbname);
//         }
//         catch(Exception $e)
//         {
//              echo $e->getMessage();
//          }
//         $this->link->set_charset("utf8"); // honek behartu egiten du aplikazio eta 
//         //                  //databasearen artean UTF -8 erabiltzera datuak trukatzeko
//     }                   
//     public function CloseConnect()
//     {
//          try
//          { 
//            $this->link->close();
//          }
//          catch(Exception $e)
//         {
//          echo $e->getMessage();
//         }  
 
//     }
    
//     function setListByOfficialLanguage() // fill countryLanguage : $this->list
//     {
//         $this->OpenConnect();
//         $lang=$this->Language;
//         $sql="call spFindLanguageCountries('$lang')";
//         $result = $this->link->query($sql); 
        
//          while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) 
//          {    
//             $newCountryLang=new countryLanguageModel();
//             $newCountryLang->setCountryCode($row['CountryCode']);
            
//             $objCountry= new countryModel();
//             $objCountry->setCode($row['CountryCode']);
//             $objCountry->findIdCountry();
            
//             $newCountryLang->setObjCountry($objCountry);
//             array_push($this->list, $newCountryLang);
//          }
//         mysqli_free_result($result); 

//        $this->CloseConnect();
//     }
//     function setOfficialLanguages() // fill countryLanguage : $this->list
//     {
//         $this->OpenConnect();
//         $sql="call spFindAllLanguages()";
//         $result = $this->link->query($sql);
        
//         while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
//         {
//             $newCountryLang=new countryLanguageModel();
//             $newCountryLang->setLanguage($row['allLanguages']);
           
//             array_push($this->list, $newCountryLang);
//         }
//         mysqli_free_result($result);
        
//         $this->CloseConnect();
//     }
    
 
//     function getCountriesLanguageJson() // convert countryLanguage : $this->list to JSON
//     {
//         // returns the list of objects in a srting with JSON format
//         $arr=array();
        
//         foreach ($this->list as $object)
//         {
//             $vars = $object->getObjectVars();
            
//             if ($object->objCountry !=null){
                
//                 $vars['objCountry']=$object->objCountry->getObjectVars();
//             }
//             array_push($arr, $vars);
//         }
//         return json_encode($arr);
//     }
   
// }
