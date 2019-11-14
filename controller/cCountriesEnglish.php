<?php
include_once '../model/countryLanguageModel.php';

    $countryLanguage=new countryLanguageModel();
    $countryLanguage->setLanguage("English");
    
    $countryLanguage->setListByOfficialLanguage();
    $listCountriesJson=$countryLanguage->getCountriesLanguageJson();
    
    echo $listCountriesJson;
