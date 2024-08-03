<?php
require_once 'PHPMailer/PHPMailer.php';
require_once 'PHPMailer/SMTP.php';
require_once 'PHPMailer/Exception.php';

use PHPMailer\PHPMailer\PHPMailer;

class FunnelModel extends Query

{

    public function __construct()
    {
        parent::__construct();
    }

    public function pedido($data)
    {
        $nombre = $data['nombre'];
        $telefono = $data['telefono'];
        $ciudad = $data['ciudad'];
        $direccion = $data['direccion'];
        $producto1 = $data['producto1'];
        $producto2 = $data['producto2'];
        $provincia = $data['provincia'];
        $referencia = $data['referencia'];

        require 'PHPMailer/Mail.php';
        $mail = new PHPMailer();
        $mail->isSMTP();
        $mail->SMTPDebug = $smtp_debug;
        $mail->Host = $smtp_host;
        $mail->SMTPAuth = true;
        $mail->Username = $smtp_user;
        $mail->Password = $smtp_pass;
        $mail->Port = 465;
        $mail->SMTPSecure = $smtp_secure;
        $mail->isHTML(true);
        $mail->CharSet = 'UTF-8';
        $mail->setFrom($smtp_from, $smtp_from_name);
        $mail->addAddress("jeimyjara@hotmail.com");
        $mail->Subject = 'Pedido de ' . $nombre;
        $mail->Body = $message_body;
        // $this->crearSubdominio($tienda);

        if ($mail->send()) {
            //echo "Correo enviado";
        } else {
            //echo "Error al enviar correo";
        }
    }
}
