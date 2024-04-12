<?php

/* 
Una importante empresa de la región que vende motos, desea implementar una aplicación que le permita
gestionar la información de sus clientes, de las motos y de las ventas realizadas. Para ello se almacena
información de todos sus clientes, de cada unas de las motos disponibles en el local y de todas las ventas
realizadas.
*/

class Cliente{
    
    private $nombre;
    private $apellido;
    private $baja;
    private $tipoDoc;
    private $nroDoc;

    public function __construct($nombre, $apellido, $baja, $tipoDoc, $nroDoc)
    {
        $this->nombre = $nombre;        
        $this->apellido = $apellido;
        $this->baja = $baja;
        $this->tipoDoc = $tipoDoc;
        $this->nroDoc = $nroDoc;
    }    
        /* GETTERS */
        public function getNombre(){
            return $this->nombre;
        }
        public function getApellido(){
            return $this->apellido;
        }
        /* Si un cliente está dado de baja, no puede registrar 
        compras desde el momento de su baja.*/
        public function getBaja(){
            return $this->baja;
        }
        public function getTipoDoc(){
            return $this->tipoDoc;
        }
        public function getNroDoc(){
            return $this->nroDoc;
        }

        /* SETTERS */
        public function setNombre($newNombre){
            $this->nombre = $newNombre;
        }
        public function setApellido($newApellido){
            $this->apellido = $newApellido;
        }
        public function setBaja($newBaja){
            $this->baja = $newBaja;
        }
        public function setTipoDoc($newTipoDoc){
            $this->tipoDoc = $newTipoDoc;
        }
        public function setNroDoc($newNroDoc){
            $this->nroDoc = $newNroDoc;
        }

        public function __toString()
        {
            return "nombre: ".$this->getNombre()."\n".
            "apellido: ".$this->getApellido()."\n".
            "actualmente, el cliente se encuentra dado de: ".$this->getBaja()."\n".
            "su tipo de documento es: ".$this->getTipoDoc()."\n".
            "su numero de documento es: ".$this->getNroDoc();
        }

}