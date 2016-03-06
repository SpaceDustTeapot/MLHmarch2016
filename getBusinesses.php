<?php

    require_once("yelpWrappers/Search.php");

    /**
     * Keywords should be delimited by spaces
     * returns array of businesses in form:
     * ['name']['url']
     *
     * the order of the keywords DOES matter
     * use adjectives before nouns. Use multiple function calls and combine
     * results for something such as "pizza OR chips" (as opposed to AND)
     */
    function getBusinesses($keywords, $location)
    {
        $search = new Search($location);
        $search->setParams(array('term' => $keywords, 'category_filter' => 'food'));
        $json = $search->executeFullJson();

        $associativeArray = json_decode($json, true);
        $businesses = $associativeArray['businesses'];

        $cutDownBusiness = array();
        foreach($businesses as $business)
        {
            $construct = array(
                "name" => $business['name'],
                "url" => $business['url']
        );
            array_push($cutDownBusiness, $construct);
        }

        return $cutDownBusiness;
    }
?>
