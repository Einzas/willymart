<?php

class PedidoModel extends Query
{
    public function __construct()
    {
        parent::__construct();
    }

    public function store($data)
    {
        $url  = $data['url'];
        $sql_id_plataforma = "SELECT id_plataforma FROM plataforma WHERE url_imporsuit = '$url'";
        $id_plataforma = $this->select($sql_id_plataforma);
        $id_plataforma = $id_plataforma[0]['id_plataforma'];

        $id_producto = $data['productos']['id_producto'];
    }
}
