<?php
include_once '../model/countryLanguageModel.php';

    $countryLanguage=new countryLanguageModel();
    
    $countryLanguage->setOfficialLanguages();
    $listLanguagesJson=$countryLanguage->getCountriesLanguageJson();
    
    echo $listLanguagesJson;
