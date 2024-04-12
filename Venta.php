<?php

class Venta{

    private $numero;
    private $fecha;
    private $objCliente;
    private $colObjMotos; #coleccion de motos a la venta
    private $precioFinal;

    public function __construct($numero, $fecha, $objCliente, $colObjMotos, $precioFinal)
    {
        $this->numero = $numero;
        $this->fecha = $fecha;
        $this->objCliente = $objCliente;
        $this->colObjMotos = $colObjMotos;
        $this->precioFinal = $precioFinal;
    }

    /* GETTERS  */

    public function getNumero(){
        return $this->numero;
    }
    public function getFecha(){
        return $this->fecha;
    }
    public function getObjCliente(){
        return $this->objCliente;
    }
    public function getcolObjMotos(){
        return $this->colObjMotos;
    }
    public function getPrecioFinal(){
        return $this->precioFinal;
    }

    /* SETTERS */

    public function setNumero($newNumero){
        $this->numero = $newNumero;
    }
    public function setFecha($newFecha){
        $this->fecha = $newFecha;
    }
    public function setObjCliente($newObjCliente){
        $this->objCliente = $newObjCliente;
    }
    public function setcolObjMotos($newcolObjMotos){
        $this->colObjMotos = $newcolObjMotos;
    }
    public function setPrecioFinal($newPrecioFinal){
        $this->precioFinal = $newPrecioFinal;
    }

    /*
    recibe por parámetro un objeto moto y lo incorpora a la colección de motos de la venta, 
    siempre y cuando sea posible la venta. El método cada vez que incorpora una moto a la venta, 
    debe actualizar la variable instancia precio final de la venta.
    Utilizar el método que calcula el precio de venta de la moto donde crea necesario
    */
    public function incorporarMoto($objMoto){
        $motoIncorporada = 0;
        $precioFinal = $this->getPrecioFinal();
        if($objMoto->getActivaVenta()){#si la moto está activa (posible la venta)
            
            $colMotos = $this->getcolObjMotos();
            $colMotos[] = $objMoto;
            $this->setcolObjMotos($colMotos); #incorporo la moto a la coleccion de motos a la venta
            $precioFinal += $objMoto->darPrecioVenta(); 
            $this->setPrecioFinal($precioFinal);
            $motoIncorporada = $this->getcolObjMotos();
        }
        return $motoIncorporada;
    }


    public function motosArrayToString(){
        $motos = $this->getcolObjMotos();
        $stringMotos = "";
        foreach($motos as $moto){
            $stringMotos .= $moto."\n";
        }
        return $stringMotos;
        
    }

    public function __toString()
    {
        return "numero de venta: ".$this->getNumero()."\n".
        "fecha de venta: ".$this->getFecha()."\n".
        "cliente: \n".$this->getObjCliente()."\n".
        "motos en venta: \n".$this->motosArrayToString()."\n".
        "precio final: ".$this->getPrecioFinal();
    }

}