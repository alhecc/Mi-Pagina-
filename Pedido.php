<?php
class Pedido {
    public $descripcion;
    public $tipo;
    public $producto;
    public $unidades;
    public $observaciones;

    public function __construct($descripcion, $tipo, $producto, $unidades, $observaciones) {
        $this->descripcion = $descripcion;
        $this->tipo = $tipo;
        $this->producto = $producto;
        $this->unidades = $unidades;
        $this->observaciones = $observaciones;
    }

    public function mostrarPedido() {
        return "Descripción: $this->descripcion, Tipo: $this->tipo, Producto: $this->producto, Unidades: $this->unidades, Observaciones: $this->observaciones";
    }
}
?>

