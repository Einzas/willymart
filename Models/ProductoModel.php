<?php

class ProductoModel extends Query
{

    public function __construct()
    {
        parent::__construct();
    }

    public function listar($id_plataforma)
    {
        $sql = "SELECT * FROM `inventario_bodegas` ib inner JOIN productos p on p.id_producto = ib.id_producto WHERE p.pagina_web = 1 and id_plataforma = '$id_plataforma'";
        return $this->select($sql);
    }
}
