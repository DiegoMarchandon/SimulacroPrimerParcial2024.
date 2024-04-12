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
    /* recorre la colección de motos de la Empresa y
    retorna la referencia al objeto moto cuyo código 
    coincide con el recibido por parámetro.
    */
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
        /* Implementar el método registrarVenta($colCodigosMoto, $objCliente) método que recibe por
    parámetro una colección de códigos de motos, la cual es recorrida, y por cada elemento de la colección
    se busca el objeto moto correspondiente al código y se incorpora a la colección de motos de la instancia
    Venta que debe ser creada. Recordar que no todos los clientes ni todas las motos, están disponibles
    para registrar una venta en un momento determinado.
    El método debe setear los variables instancias de venta que corresponda y retornar el importe final de la
    venta. */

    #funcion auxiliar para verificar si existe al menos un codigo ingresado dentro de las motos que tiene la empresa.
    /* public function existeUnCodigo($colCodigosMoto){
        $coleccionMotos = $this->getColObjMotos();
        foreach($coleccionMotos as $moto){
            if($moto->)
        }
    } */
    public function registrarVenta($colCodigosMoto, $objCliente){
        $precioVenta = 0;
        $colObjMotos = [];
        $fechaVenta = date('Y-m-d');
        $venta = new Venta(null,$fechaVenta,$objCliente,$colObjMotos, $precioVenta);
        
        foreach($colCodigosMoto as $codigo){
            if($this->retornarMoto($codigo) != null){
                
                $precioVenta += $this->retornarMoto($codigo)->darPrecioVenta(); #voy sumando los precios de venta de las motos
                $venta->incorporarMoto($this->retornarMoto($codigo));
                
            }
        }
        
        return $precioVenta;
    }


    /* Implementar el método retornarVentasXCliente($tipo,$numDoc) que recibe por parámetro el tipo y
    número de documento de un Cliente y retorna una colección con las ventas realizadas al cliente.
    */
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