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
}
