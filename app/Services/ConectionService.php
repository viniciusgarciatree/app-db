<?php

namespace App\Services;

class ConectionService{

    public function testConection($data)
    {
        $db = new DataBase($data['host_name'], $data['user_name'], $data['password'], $data['default_schema']);
        return $db->testConect() ? "Conexão estabelicida" : "Não foi possivel se conectar " . $db->getErro();
    }
}