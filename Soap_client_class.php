<?php
/**
 *
 * @author Andres Duarte M.
 *
 */
class Soap_client{

    private $options;
    private $auth_params;

    public function __construct($location, $uri)
    {
        $this->options = array(
            'location' => $location,
            'uri'      => 'urn:' . $uri
        );

        $this->auth_params = array(
          'ws_user' => 'admin',
          'ws_pass' => 'example123'
        );
    }

    public function call($function_name, $method_params = array())
    {
        try
        {
            $client = new SoapClient(NULL,  $this->options);
            $params = array_merge($this->auth_params, $method_params);
            return $client->__soapCall($function_name, $params, array('connection_timeout' => 30));
        }
        catch(Exception $e)
        {
            return FALSE;
        }
    }
}