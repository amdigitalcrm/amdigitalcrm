<?php

class ClientesGeneral_controller extends Controller {

    public function Agregar() {
        $id = null;
        $origen = "http://hardmachineaqp.com/";
        $fecha = fecha_mysql;
        $hora = hora_mysql;
        $empresa = "Hard Machine";
        $email = "marcorodriguez2013@outlook.com";
        $telefono = "959304050";
        $id_ubigeo = "10101";
        $mensaje = "Deseo saber mas de sus productos";
        $id_usuario_asignado = NULL;
        $id_empresa = Session::getValue('EMPRESA' . NOMBRE_SESSION);
        $cliente = new Clientes($id, $origen, $fecha, $hora, $empresa, $email, $telefono, $id_ubigeo, $mensaje, $id_usuario_asignado, $id_empresa);
        $cliente->create();
        //Correos_controller::EmailBienvenida($email, $empresa);
    }

    public function Mostrar() {
        $data = array(
            'id_empresa' => Session::getValue('EMPRESA' . NOMBRE_SESSION),
        );
        $clientes = Clientes::whereVNull($data, 'and', 'id_usuario_asignado');
        $datos = array();
        foreach ($clientes as $value) {
            $ubigeo = Ubigeo_controller::ubigeo_completo($value['id_ubigeo']);
            array_push($datos, array(
                'id' => $value['id'],
                'origen' => '<a href="'.$value['origen'].'">Link</a>',
                'fecha_hora' => '<small><b>Fecha : </b>' . $value['fecha'] . '<br><b>Hora : </b>' . $value['hora'] . '</small>',
                'empresa' => $value['empresa'],
                'email' => $value['email'],
                'telefono' => $value['telefono'],
                'id_ubigeo' => $ubigeo,
                'mensaje' => $value['mensaje'],
            ));
        }
        echo json_encode($datos, JSON_PRETTY_PRINT);
    }

    public function MostrarPorUsuario() {
        $data = array(
            'id_usuario_asignado' => Session::getValue('ID' . NOMBRE_SESSION),
            'id_empresa' => Session::getValue('EMPRESA' . NOMBRE_SESSION),
        );
        $clientes = Clientes::whereV($data, 'and');
        $datos = array();
        foreach ($clientes as $value) {
            $ubigeo = Ubigeo_controller::ubigeo_completo($value['id_ubigeo']);
            array_push($datos, array(
                'id' => $value['id'],
                'origen' => '<a href="'.$value['origen'].'">Link</a>',
                'fecha_hora' => '<small><b>Fecha : </b>' . $value['fecha'] . '<br><b>Hora : </b>' . $value['hora'] . '</small>',
                'empresa' => $value['empresa'],
                'email' =>'<img src="'.URL.URLIMG.'envelope.svg" alt="">',
                'telefono' => $value['telefono'],
                'id_ubigeo' => $ubigeo,
                'mensaje' => $value['mensaje'],
                'id_usuario_asignado' => $value['id_usuario_asignado'],
            ));
        }
        echo json_encode($datos, JSON_PRETTY_PRINT);
    }

    public function AceptarCliente($id) {
        $cliente = Clientes::getById($id);
        $cliente->setId_usuario_asignado(Session::getValue('ID' . NOMBRE_SESSION));
        $cliente->update();
    }

}
