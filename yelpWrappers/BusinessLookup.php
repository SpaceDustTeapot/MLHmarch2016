<?php
    require_once("YelpApiRequest.php");

    class BusinessLookup
    {
            private $params;
            private $businessId;

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

            public function setBusinessId($businessId)
            {
                $this->businessId = $businessId;
            }

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
