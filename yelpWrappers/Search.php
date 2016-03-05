<?php
    require_once("YelpApiRequest.php");

    /**
     * The search class abstracts calls to the yelp search api. Operations are
     * almost identical to what can be found in the documentation for this which
     * can be found at yelp.co.uk/developers/documentation/v2/search_api . see
     * this documentation for more information.
     */
    class Search
    {
        private $params;

        /*
         * Constructor for search object. A location MUST be given.
         *
         * The $location parameter may take many forms.For a full run down, see
         * the api specification.
         *
         * One way to use the location parameter is as a place name, post code
         * or country, etc.
         */
        public function __construct($location)
        {
            $this->params = array(
                    "location" => $location,
                    "term" => null,
                    "limit" => null,
                    "offset" => null,
                    "sort" => null,
                    "category_filter" => null,
                    "radius_filter" => null,
                    "deals_filter" => null
            );

        }

        /*
         * The $newParams parameter should be an associative array with index
         * names matching api parameters.
         *
         * Possible Parameters:
         * location - a location as specified in the full api documentation
         * term - a search term to use when searching
         * limit - the amount of businesses to be returned
         * offset - offset to the returned businesses
         * sort -
         *          0 = best matched (default)
         *          1 = distance
         *          2 = highest rated
         * category_filter - category to filter by, see api documentation
         * radius_filter - search area in meters
         * deals_filter - if true, exclusively search for businesses with deals
         */
        public function setParams($newParams)
        {
            foreach($newParams as $key => $value)
            {
                $this->params[$key] = $value;
            }
        }

        /**
         * Invokes search api and returns raw json. For a full rundown of the
         * data structure of the json returned, see the API documentation. 
         */
        public function executeFullJson()
        {
            $url = "https://api.yelp.com/v2/search";
            $params = $this->params;
            $method = "GET";

            $request = new YelpApiRequest($url, $params, $method);
            return $request->makeRequest();
        }

    }
?>
