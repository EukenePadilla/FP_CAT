<?php
include_once '../model/countryLanguageModel.php';

    $language=filter_input(INPUT_GET,'language');
    $countryLanguage=new countryLanguageModel();
    $countryLanguage->setLanguage($language);
    
    $countryLanguage->setListByOfficialLanguage();
    $listCountriesJson=$countryLanguage->getCountriesLanguageJson();
    
    echo $listCountriesJson;
