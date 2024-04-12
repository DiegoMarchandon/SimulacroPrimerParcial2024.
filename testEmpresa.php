<?php

include 'Cliente.php';
include 'Empresa.php';
include 'Venta.php';
include 'Moto.php';

$objCliente1 = new Cliente("jorge", "rodriguez", "alta", "DNI", 42123123);

$objCliente2 = new Cliente("juan", "suarez", "alta", "DNI", 43321321);
$obMoto1 = new Moto(11,2230000,2022,"Benelli Imperiale 400",0.85,true);

$obMoto2 = new Moto(12,584000,2021,"Zanella Zr 150 Ohc", 0.7,true);


$obMoto3 = new Moto(13,999900,2023,"Zanella Patagonian Eagle 250", 0.55,false);

$empresa = new Empresa("Alta Gama","Av argentina 123",[$objCliente1,$objCliente2],[$obMoto1,$obMoto2,$obMoto3],[]);

# 5) invocar al metodo registrarVenta()
$empresa->registrarVenta([11,12,13],$objCliente2); #retorna 7831400


# 6) invocar al metodo registrarVenta()
$empresa->registrarVenta([0],$objCliente2); #retorna 0


# 7) invocar al metodo registrarVenta() 
$empresa->registrarVenta([2],$objCliente2);


# 8) retornarVentasXcliente();
// print_r($empresa->retornarVentasXCliente("DNI",42123123));

# 9) retornarVentasXcliente();

// print_r($empresa->retornarVentasXCliente("DNI",43321321));

#10)
echo $empresa;

