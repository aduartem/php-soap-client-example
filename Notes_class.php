<?php
/**
 *
 * @author Andres Duarte M.
 *
 */
require 'Soap_client_class.php';

class Notes{

    private $soap_client;

    public function __construct()
    {
        $location = 'http://localhost/ws-php-nusoap-example/wsNotes.php';
        $this->soap_client = new Soap_client($location, 'wsNotes');
    }

    public function get($id = NULL)
    {
        return $this->soap_client->call('read', array('id' => $id));
    }

    public function create($title, $body)
    {
        $params = array('title' => $title, 'body' => $body);
        return $this->soap_client->call('create', $params);
    }

    public function update($id, $title, $body)
    {
        $params = array('id' => $id, 'title' => $title, 'body' => $body);
        return $this->soap_client->call('update', $params);
    }

    public function delete($id)
    {
        return $this->soap_client->call('delete', array('id' => $id));
    }
}