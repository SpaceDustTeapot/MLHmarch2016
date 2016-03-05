<?php
    require_once("Search.php");
    require_once("BusinessLookup.php");

    $search = new Search("Manchester");
    $search->setParams(array("term" => "curry"));

    $json = $search->executeFullJson();
    $arrayMaybe = json_decode($json, true);
    $bId = $arrayMaybe['businesses'][0]['id'];

    $business = new BusinessLookup($bId);
    var_dump($business->executeFullJson());
?>
