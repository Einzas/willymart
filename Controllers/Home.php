<?php

use FontLib\EOT\Header;

session_start();
class Home extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }
    ///Vistas
    public function index()
    {
        $this->views->render($this, "index");
    }
    ///Funciones
}
