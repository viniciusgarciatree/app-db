<?php

namespace App\Services;

class LoadDataBaseService
{

    private $db;

    public function __construct($objCredencias)
    {
        $this->db = new DataBase($objCredencias->host, $objCredencias->user, $objCredencias->password);
        //$this->db->setPort($objCredencias->port);
    }

    public function getDataBases()
    {
        $query  = "SELECT schema_name as base FROM information_schema.schemata; ";

        $result = $this->db->selectDB($query);

        return $result;
    }
}