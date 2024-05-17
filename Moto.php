<?php

class Moto{

    private $codigo;
    private $costo;
    private $añoFab;
    private $descripcion;
    private $porcentaje;
    private $activaVenta; # true si la moto está disponible para la venta

    public function __construct($codigo, $costo, $añoFab, $descripcion, $porcentaje, $activaVenta){

        $this->codigo = $codigo;
        $this->costo = $costo;
        $this->añoFab = $añoFab;
        $this->descripcion = $descripcion; 
        $this->porcentaje = $porcentaje;
        $this->activaVenta = $activaVenta;
        
    }

    /* GETTERS */
    public function getCodigo(){
        return $this->codigo;
    }
    public function getCosto(){
        return $this->costo;
    }
    public function getAñoFab(){
        return $this->añoFab;
    }
    public function getDescripcion(){
        return $this->descripcion;
    }
    public function getPorcentaje(){
        return $this->porcentaje;
    }
    public function getActivaVenta(){
        return $this->activaVenta;
    }

    /* SETTERS */

    public function setCodigo($newCodigo){
        $this->codigo = $newCodigo;
    }
    public function setCosto($newCosto){
        $this->costo = $newCosto;
    }
    public function setDescripcion($newDescripcion){
        $this->descripcion = $newDescripcion;
    }
    public function setPorcentaje($newPorcentaje){
        $this->porcentaje = $newPorcentaje;
    }
    public function setActivaVenta($newActivaVenta){
        $this->activaVenta = $newActivaVenta;
    }
    public function setAñoFab($newAñoFab){
        $this->añoFab = $newAñoFab;
    }
    
    public function darPrecioVenta(){
        $venta = 0;
        $añosTranscurridos = 2024 - $this->getAñoFab();
        if($this->getActivaVenta() == true){
            $venta = $this->getCosto()  + ($this->getCosto() *($añosTranscurridos*$this->getPorcentaje()));
        }else{
            $venta = -1;
        }
        return $venta;
    }

    public function motoDisponible(){
        $estado = $this->getActivaVenta() ? "disponible" : "no disponible";
        return $estado;
    }

    public function __toString()
    {
        return "codigo de la moto: ".$this->getCodigo()."\n".
        "costo de fabricacion: ".$this->getCosto()."\n".
        "año de fabricacion: ".$this->getAñoFab()."\n".
        "descripcion de la moto: ".$this->getDescripcion()."\n".
        "porcentaje de incremento anual: ".$this->getPorcentaje()."\n".
        "la moto actualmente se encuentra: ".$this->motoDisponible();
    }
}
