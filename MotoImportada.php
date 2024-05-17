<?php


class MotoImportada extends Moto{
    private $paisOrigen;
    private $impuestoImportacion; 

    public function __construct($codigo, $costo, $añoFab, $descripcion, $porcentaje, $activaVenta, $paisOrigen, $impuestoImportacion)
    {
        parent::__construct($codigo, $costo, $añoFab, $descripcion, $porcentaje, $activaVenta);
        $this->paisOrigen = $paisOrigen;
        $this->impuestoImportacion = $impuestoImportacion;
    }

    /* GETTERS Y SETTERS */
    

    /**
     * Get the value of paisOrigen
     */ 
    public function getPaisOrigen()
    {
        return $this->paisOrigen;
    }

    /**
     * Set the value of paisOrigen
     *
     * @return  self
     */ 
    public function setPaisOrigen($paisOrigen)
    {
        $this->paisOrigen = $paisOrigen;
    }

    /**
     * Get the value of impuestosImportacion
     */ 
    public function getImpuestosImportacion()
    {
        return $this->impuestoImportacion;
    }

    /**
     * Set the value of impuestosImportacion
     *
     * @return  self
     */ 
    public function setImpuestosImportacion($impuestoImportacion)
    {
        $this->impuestoImportacion = $impuestoImportacion;

    }

    /* el valor calculado se le debe sumar el importe por el impuesto pagado por la empresa. */
    public function darPrecioVenta(){
        /* $venta = 0;
        $añosTranscurridos = 2024 - $this->getAñoFab();
        if($this->getActivaVenta() == true){
            $venta = $this->getCosto()  + ($this->getCosto() *($añosTranscurridos*$this->getPorcentaje()));
        }
        return $venta; */
        $precioVta = parent::darPrecioVenta();
        $precioVta = $precioVta + $this->getImpuestosImportacion();
        return $precioVta;
    }

    public function __toString()
    {
        return parent::__toString()."\n pais de origen: ".$this->getPaisOrigen()."\n".
        "impuestos de importacion: ".$this->getImpuestosImportacion();
    }
}