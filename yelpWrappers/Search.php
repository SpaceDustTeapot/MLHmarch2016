<?php
    require_once("YelpApiRequest.php");

    class Search
    {
        private $params;

        /*
         * Constructor for search object. $location must be given.
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
         * param $newParams is an associative array with the new values to be
         * set.
         */
        public function setParams($newParams)
        {
            foreach($newParams as $key => $value)
            {
                $this->params[$key] = $value;
            }
        }

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
