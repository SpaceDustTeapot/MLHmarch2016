<?php
    require_once("YelpApiRequest.php");

    /**
     * The BusinessLookup class abstracts calls to the yelp business api.
     * Operations are almost identical to what can be found in the documentation
     * for this which can be found at
     * yelp.co.uk/developers/documentation/v2/business . see this documentation
     * for more information.
     */
    class BusinessLookup
    {
            private $params;
            private $businessId;

            /**
             * Constructor for a BusinessLookup object. businessId must be
             * given.
             */
            public function __construct($businessId)
            {
                $this->params = array(
                    "cc" => null,
                    "lang" => null,
                    "lang_filter" => null,
                    "action_links" => null
                );

                $this->businessId = $businessId;
            }

            /*
             * The $newParams parameter should be an associative array with
             * index names matching api parameters (note that this does not
             * include the businessId. use setBusinessId())
             *
             * Possible Parameters:
             * cc - ISO 3166-1 alpha-2 country code (e.g. GB)
             * lang - ISO 639 language code (default en)
             * lang_filter - if true, filter business reviews by specified
             *      language
             * actionlinks - see api documentation
             */
            public function setParams($newParams)
            {
                foreach($newParams as $key => $value)
                {
                    $this->params[$key] = $value;
                }
            }

            /*
             * Change the businessId of the BusinessLookup object.
             */
            public function setBusinessId($businessId)
            {
                $this->businessId = $businessId;
            }

            /**
             * Invokes search api and returns raw json. For a full rundown of
             * the data structure of the json returned, see the API
             * documentation. 
             */
            public function executeFullJson()
            {
                $url = "https://api.yelp.com/v2/business/$this->businessId";
                $params = $this->params;
                $method = "GET";

                $request = new YelpApiRequest($url, $params, $method);
                return $request->makeRequest();
            }
    }

?>
