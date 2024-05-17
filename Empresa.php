<?php

class Empresa{
    
    private $denominacion;
    private $direccion;
    private $colObjClientes;
    private $colObjMotos;
    private $colObjVentas;

    public function __construct($denominacion, $direccion, $colObjClientes, $colObjMotos, $colObjVentas)
    {
    
        $this->denominacion = $denominacion;
        $this->direccion = $direccion;
        $this->colObjClientes = $colObjClientes;
        $this->colObjMotos = $colObjMotos;
        $this->colObjVentas = $colObjVentas;
    }


    public function getDenominacion()
    {
        return $this->denominacion;
    }

    public function setDenominacion($denominacion)
    {
        $this->denominacion = $denominacion;
    }

    public function getDireccion()
    {
        return $this->direccion;
    }

    public function setDireccion($direccion)
    {
        $this->direccion = $direccion;
    }

    public function getColObjClientes()
    {
        return $this->colObjClientes;
    }

    public function setColObjClientes($colObjClientes)
    {
        $this->colObjClientes = $colObjClientes;
    }


    public function getColObjMotos()
    {
        return $this->colObjMotos;
    }


    public function setColObjMotos($colObjMotos)
    {
        $this->colObjMotos = $colObjMotos;
    }

    
    public function getColObjVentas()
    {
        return $this->colObjVentas;
    }

    public function setColObjVentas($colObjVentas)
    {
        $this->colObjVentas = $colObjVentas;
    }
    
    public function retornarMoto($codigoMoto){
        $motoEncontrada = null;
        $i = 0;
        $motosCant = count($this->getColObjMotos());
        while(($i < $motosCant) && ($motoEncontrada ==null)){
            if($this->getColObjMotos()[$i]->getCodigo()== $codigoMoto){
                $motoEncontrada = $this->getColObjMotos()[$i];
            }
            $i++;
        }    
        return $motoEncontrada;    
    }
    

    public function registrarVenta($colCodigosMoto, $objCliente){
        $precioVenta = 0;
        $colObjMotos = [];
        $fechaVenta = date('Y-m-d');
        $nroVenta = $this->getColObjVentas() == null ? 1 : count($this->getColObjVentas())+1;  
        
        $venta = new Venta($nroVenta,$fechaVenta,$objCliente,$colObjMotos, $precioVenta);
        foreach($colCodigosMoto as $codigo){
            
            $moto = $this->retornarMoto($codigo);
            $venta->incorporarMoto($moto);
        }
        
        $colVentas = $this->getColObjVentas(); 
        if($venta->getPrecioFinal() > 0){
            $colVentas[] = $venta;
            $this->setColObjVentas($colVentas); 
        }
        
        
        return $precioVenta;
    }


    public function retornarVentasXCliente($tipo, $nroDoc){
        $i = 0;
        $j = 0;
        $colVentas = 0;
        $clienteEncontrado = false;
        $ventaEncontrada = false;
        while($i < count($this->getColObjClientes()) && ($clienteEncontrado == false)){

            if($this->getColObjClientes()[$i]->getTipoDoc() == $tipo && $this->getColObjClientes()[$i]->getNroDoc() == $nroDoc){
                $clienteEncontrado = true;

                while ($j < count($this->getColObjVentas()) && ($ventaEncontrada ==false)){
                    if($this->getColObjVentas()[$j]->getObjCliente()->getTipoDoc() == $tipo &&
                    $this->getColObjVentas()[$j]->getObjCliente()->getNroDoc() == $nroDoc){
                        $ventaEncontrada = true;
                        $colVentas = $this->getColObjVentas()[$j]->getcolObjMotos();
                    }
                    $j++;
                }
            }
            $i++;
        }
        return $colVentas;
    }

    /* recorre la coleccion de ventas realizadas por la empresa
    y retorna el importe total de ventas Nacionales  */
    public function informarSumaVentasNacionales(){
        $vtasNacionales = 0;
        foreach($this->getColObjVentas() as $venta){
            $vtasNacionales += $venta->retornarTotalVentaNacional();
        }
        return $vtasNacionales;
    }

    /* recorre la coleccion de ventas realizadas por la empresa
    retorna una coleccion de ventas de motos importadas.
    Si una de las motos es importada la venta debe ser informada(incorporada) */
    public function informarVentasImportadas(){

        $colVtasImportadas = [];
        foreach($this->getColObjVentas() as $venta){
            if(count($venta->retornarMotosImportadas()) > 0){
                $colVtasImportadas[] = $venta;
            }
        }
        return $colVtasImportadas;
    }



    public function arrayToString($coleccion){
        $stringObjetos = "";
        foreach($coleccion as $elementos){
            $stringObjetos .= $elementos . "\n";
        }
        return $stringObjetos;
    }

    public function __toString()
    {
        return "denominacion de la empresa: ".$this->getDenominacion()."\n".
        "direccion de la empresa: ".$this->getDireccion()."\n".
        "clientes de la empresa: ".$this->arrayToString($this->getColObjClientes())."\n".
        "motos de la empresa: ".$this->arrayToString($this->getColObjMotos())."\n".
        "ventas de la empresa: ".$this->arrayToString($this->getColObjVentas());
    }
}