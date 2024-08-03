<?php

class Pedido extends Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->model->render($this, 'index');
    }

    public function store()
    {
        $url = "https://" . $_SERVER['HTTP_HOST'];

        $id_producto = $_POST['id_producto'];
        $cantidad = $_POST['cantidad'];
        $precio = $_POST['precio'];

        $data = [
            'nombre' => $_POST['nombre'],
            'telefono' => $_POST['telefono'],
            'calle_principal' => $_POST['calle_principal'],
            'calle_secundaria' => $_POST['calle_secundaria'],
            'ciudad' => $_POST['ciudad'],
            'provincia' => $_POST['provincia'],
            'referencia' => $_POST['referencia'],
            'productos' => $_POST['productos'],
            'total_venta' => $_POST['total'],
            'observacion' => $_POST['observacion'],
            'url' => $url,
            'productos' => array(
                'id_producto' => $id_producto,
                'cantidad' => $cantidad,
                'precio' => $precio
            )
        ];
        $this->model->store($data);
    }
}
