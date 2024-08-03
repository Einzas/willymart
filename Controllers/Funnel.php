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
        $nombre = $_POST['nombre'];
        $telefono = $_POST['telefono'];
        $ciudad = $_POST['ciudad'];
        $direccion = $_POST['direccion'];
        $producto1 = $_POST['product1'];
        $producto2 = $_POST['product2'];
        $provincia = $_POST['provincia'];
        $referencia = $_POST['referencia'];

        //los producto1 y producto2 son dos radios buttons que se envian por post
        //si el producto1 es igual a 1 entonces se le asigna el valor de blanqueador
        if ($producto1 == 1) {
            $producto1 = "Blanqueador";
        } else {
            $producto1 = "NO";
        }

        //si el producto2 es igual a 1 entonces se le asigna el valor de blanqueador
        if ($producto2 == 1) {
            $producto2 = "Blanqueador x 2";
        } else {
            $producto2 = "NO";
        }

        //se crea un array con los datos del pedido
        $data = [
            'nombre' => $nombre,
            'telefono' => $telefono,
            'ciudad' => $ciudad,
            'direccion' => $direccion,
            'producto1' => $producto1,
            'producto2' => $producto2,
            'provincia' => $provincia,
            'referencia' => $referencia
        ];

        //se envia el array a la vista
        $this->model->pedido($data);
    }
}
