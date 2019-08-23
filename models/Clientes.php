<?php

class Clientes extends Model {

    protected static $table = "t_clientes";
    private $id;
    private $origen;
    private $fecha;
    private $hora;
    private $empresa;
    private $email;
    private $telefono;
    private $id_ubigeo;
    private $mensaje;
    private $id_usuario_asignado;
    private $id_empresa;

    function __construct($id, $origen, $fecha, $hora, $empresa, $email, $telefono, $id_ubigeo, $mensaje, $id_usuario_asignado, $id_empresa) {
        $this->id = $id;
        $this->origen = $origen;
        $this->fecha = $fecha;
        $this->hora = $hora;
        $this->empresa = $empresa;
        $this->email = $email;
        $this->telefono = $telefono;
        $this->id_ubigeo = $id_ubigeo;
        $this->mensaje = $mensaje;
        $this->id_usuario_asignado = $id_usuario_asignado;
        $this->id_empresa = $id_empresa;
    }

    function getId() {
        return $this->id;
    }

    function getOrigen() {
        return $this->origen;
    }

    function getFecha() {
        return $this->fecha;
    }

    function getHora() {
        return $this->hora;
    }

    function getEmpresa() {
        return $this->empresa;
    }

    function getEmail() {
        return $this->email;
    }

    function getTelefono() {
        return $this->telefono;
    }

    function getId_ubigeo() {
        return $this->id_ubigeo;
    }

    function getMensaje() {
        return $this->mensaje;
    }

    function getId_usuario_asignado() {
        return $this->id_usuario_asignado;
    }

    function getId_empresa() {
        return $this->id_empresa;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setOrigen($origen) {
        $this->origen = $origen;
    }

    function setFecha($fecha) {
        $this->fecha = $fecha;
    }

    function setHora($hora) {
        $this->hora = $hora;
    }

    function setEmpresa($empresa) {
        $this->empresa = $empresa;
    }

    function setEmail($email) {
        $this->email = $email;
    }

    function setTelefono($telefono) {
        $this->telefono = $telefono;
    }

    function setId_ubigeo($id_ubigeo) {
        $this->id_ubigeo = $id_ubigeo;
    }

    function setMensaje($mensaje) {
        $this->mensaje = $mensaje;
    }

    function setId_usuario_asignado($id_usuario_asignado) {
        $this->id_usuario_asignado = $id_usuario_asignado;
    }

    function setId_empresa($id_empresa) {
        $this->id_empresa = $id_empresa;
    }

    public function getMyVars() {
        return get_object_vars($this);
    }

}
