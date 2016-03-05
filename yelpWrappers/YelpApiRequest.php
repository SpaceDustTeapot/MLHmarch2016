<?php
    /*
     * This class is used by other classes in the wrapper. Where possible, use
     * those instead
     */
    class YelpApiRequest
    {
        private $consumerKey = "6NZXeGcgKV4vK2gIABXX5A";
        private $consumerSecret = "y_i_7CM-br-2sCkP58FLSOM4ExM";
        private $token = "2szXBAVTH7XGrlsrzZnCw3GMARvWFFHz";
        private $tokenSecret = "saZoRHvYE3wgNCA0Hs4UFmTJBFU";

        private $url;
        private $params;
        private $method;

        public function __construct($url, $params, $method)
        {
            $this->url = $url;
            $this->params = $params;
            $this->method = $method;
        }

        public function makeRequest()
        {
            $oAuth = new OAuth($this->consumerKey, $this->consumerSecret);
            $oAuth->setToken($this->token, $this->tokenSecret);

            //remove null entries
            $params = $this->params;
            foreach($params as $key => $value)
            {
                if(is_null($value))
                {
                    unset($params[$key]);
                }
            }

            try
            {
                $oAuth->fetch($this->url, $params, $this->method);

                return $oAuth->getLastResponse();
            }
            catch(OAuthException $E)
            {
                throw new Exception("Response: ". $E->lastResponse);
            }
        }
    }
?>
