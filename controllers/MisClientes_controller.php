<?php

class MisClientes_controller extends Controller {

    public function Mostrar() {
        $data = array(
            'id_usuario_asignado' => Session::getValue('ID' . NOMBRE_SESSION),
            'id_empresa' => Session::getValue('EMPRESA' . NOMBRE_SESSION),
        );
        $clientes = Clientes::whereV($data, 'and');
        $datos = array();
        $i = 0;
        foreach ($clientes as $value) {
            $i++;
            $ubigeo = Ubigeo_controller::ubigeo_completo($value['id_ubigeo']);
            array_push($datos, array(
                'contador' => $i,
                'id' => $value['id'],
                'origen' => '<a href="' . $value['origen'] . '">Link</a>',
                'fecha_hora' => '<small><b>Fecha : </b>' . $value['fecha'] . '<br><b>Hora : </b>' . $value['hora'] . '</small>',
                'empresa' => $value['empresa'],
                'id_ubigeo' => $ubigeo,
                'mensaje' => $value['mensaje'],
                'correo_principal' => $value['correo_principal'],
                'correo_secundario' => $value['correo_secundario'],
            ));
        }
        echo json_encode($datos, JSON_PRETTY_PRINT);
    }

    public function MandarMensaje() {
        $cliente = Clientes::getById($_POST['id']);
        Correos_controller::CorreoMisClientes($cliente->getCorreo_secundario(), $cliente->getCorreo_principal(), $cliente->getEmpresa(), $_POST['cuerpo']);
    }


}
