<?php
    /*
     * Example script for demonstrating how to possibly use the yelp api
     * wrappers.
     */

    /* Include Classes for required functionailty */
    //Search class for finding businesses
    require_once("Search.php");
    //BusinessLookup class for getting more information about a business given
    //its id.
    require_once("BusinessLookup.php");

    //Searches must have a location. This can be a name as a string as below.
    $search = new Search("Manchester");
    //Parameters can be modified or edited using arrays according to the yelp
    //api specification. This includes the location parameter.
    $search->setParams(array("term" => "curry"));

    //ExecuteFullJson calls the api method to return raw json from the api
    $json = $search->executeFullJson();
    //Decode the json how you like, I chose as an associative array here.
    $associativeArray = json_decode($json, true);
    //It is easier to see the structure of this data by referring to the yelp
    //api documentation.
    $bId = $associativeArray['businesses'][0]['id'];

    //Business lookup works similarly to search. A business ID is mandatory.
    $business = new BusinessLookup($bId);
    var_dump($business->executeFullJson());
?>
