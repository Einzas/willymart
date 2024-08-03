<?php

class Funnel extends Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->views->render($this, "index");
    }

    public function producto($id)
    {
        if ($id == "blanqueador") {
            $this->views->render($this, "blanqueador");
        } else if ($id == "desinfectante") {
            $this->views->render($this, "desinfectante");
        }
    }

    public function pedido()
    {
        $nombre = $_POST['name'];
        $telefono = $_POST['phone'];
        $ciudad = $_POST['city'];
        $direccion = $_POST['address'];
        $producto1 = $_POST['product'];
        $provincia = $_POST['province'];
        $referencia = $_POST['reference'];

        $data = [
            'nombre' => $nombre,
            'telefono' => $telefono,
            'ciudad' => $ciudad,
            'direccion' => $direccion,
            'producto1' => $producto1,
            'provincia' => $provincia,
            'referencia' => $referencia
        ];

        //se envia el array a la vista
        $this->model->pedido($data);
    }
}
