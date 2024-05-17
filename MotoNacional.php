<?php


class MotoNacional extends Moto{

    private $porcentajeDescuento; #por defecto 15%

    public function __construct($codigo, $costo, $añoFab, $descripcion, $porcentaje, $activaVenta, $porcentajeDescuento)
    {
        parent::__construct($codigo, $costo, $añoFab, $descripcion, $porcentaje, $activaVenta);
        $this->porcentajeDescuento = $porcentajeDescuento;
    }

    /**
     * Get the value of porcentajeDescuento
     */ 
    public function getPorcentajeDescuento()
    {
        return $this->porcentajeDescuento;
    }

    /**
     * Set the value of porcentajeDescuento
     *
     * @return  self
     */ 
    public function setPorcentajeDescuento($porcentajeDescuento)
    {
        $this->porcentajeDescuento = $porcentajeDescuento;

    }

    /* aplique el porcentaje de descuento sobre el valor calculado */
    public function darPrecioVenta()
    {
        $precioVta = parent::darPrecioVenta();
        $precioVta = $precioVta - ($precioVta * $this->getPorcentajeDescuento());
        return $precioVta;
    }

    public function __toString()
    {
        return parent::__toString()."\n porcentaje de descuento: ".$this->getPorcentajeDescuento();
    }
}