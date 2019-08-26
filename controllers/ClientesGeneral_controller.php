<?php

class ClientesGeneral_controller extends Controller {

    public function Agregar() {
        $id = null;
        $origen = "http://hardmachineaqp.com/";
        $fecha = fecha_mysql;
        $hora = hora_mysql;
        $empresa = "pepitos";
        $correo_principal = "alejandrakassandra@gmail.com";
        $correo_secundario =$this->GenerarCorreo($correo_principal);
        $telefono = "959304050";
        $id_ubigeo = "10101";
        $mensaje = "Deseo saber mas de sus productos";
        $id_usuario_asignado = NULL;
        $id_empresa = Session::getValue('EMPRESA' . NOMBRE_SESSION);
        $cliente = new Clientes($id, $origen, $fecha, $hora, $empresa, $correo_principal, $correo_secundario, $telefono, $id_ubigeo, $mensaje, $id_usuario_asignado, $id_empresa);
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
                'origen' => '<a href="' . $value['origen'] . '">Link</a>',
                'fecha_hora' => '<small><b>Fecha : </b>' . $value['fecha'] . '<br><b>Hora : </b>' . $value['hora'] . '</small>',
                'empresa' => $value['empresa'],
                'correos' => $value['correo_principal'] . '<br>' . $value['correo_secundario'],
                'telefono' => $value['telefono'],
                'id_ubigeo' => $ubigeo,
                'mensaje' => $value['mensaje'],
            ));
        }
        echo json_encode($datos, JSON_PRETTY_PRINT);
    }   

    public function AceptarCliente($id) {
        $cliente = Clientes::getById($id);
        $cliente->setId_usuario_asignado(Session::getValue('ID' . NOMBRE_SESSION));
        $cliente->update();
    }
    public function GenerarCorreo($correo_principal){
        $correo_principal = explode("@", $correo_principal);
        $correo = trim($correo_principal[0]);
        $correo = Hash::create(ALGORITMO_CORREO, $correo, HASHKEY);
        Cpanel::Iniciar($correo,"kassandra@2015");
        return $correo.'@gingercat.ml';  

    }
  
   
}
