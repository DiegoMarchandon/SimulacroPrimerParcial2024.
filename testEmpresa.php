<?php

include 'Cliente.php';
include 'Empresa.php';
include 'Venta.php';
include 'Moto.php';
include 'MotoNacional.php';
include 'MotoImportada.php';

# Cree 2 instancias de la clase Cliente: $objCliente1, $objCliente2
$objCliente1 = new Cliente("jorge", "rodriguez", "alta", "DNI", 42123123);
$objCliente2 = new Cliente("juan", "suarez", "alta", "DNI", 43321321);

# Cree 4 objetos Motos con la información visualizada en las siguientes tablas: 
# código, costo, año fabricación, descripción, porcentaje incremento anual, activo entre otros.
$obMoto1 = new MotoNacional(11,2230000,2022,"Benelli Imperiale 400",0.85,true, 0.1);
$obMoto2 = new MotoNacional(12,584000,2021,"Zanella Zr 150 Ohc", 0.7,true, 0.1);
$obMoto3 = new MotoNacional(13,999900,2023,"Zanella Patagonian Eagle 250", 0.55,false, 0.15);
$obMoto4 = new MotoImportada(14, 12499900, 2020, "Pitbike Enduro Motocross Apollo Aiii 190cc Plr", 1, true, "Francia", 6244400);

#Se crea un objeto Empresa con la siguiente información: denominación =” Alta Gama”, dirección= “Av
#Argenetina 123”, colección de motos= [$obMoto11, $obMoto12, $obMoto13, $obMoto14] , colección de clientes
#= [$objCliente1, $objCliente2 ], la colección de ventas realizadas=[].

$empresa = new Empresa("Alta Gama","Av argentina 123",[$objCliente1,$objCliente2],[$obMoto1,$obMoto2,$obMoto3,$obMoto4],[]);

# 4) invocar al metodo registrarVenta()
$empresa->registrarVenta([11, 12, 13, 14],$objCliente2); #retorna 7831400

# 5) invocar al método registrarVenta()
$empresa->registrarVenta([13, 14], $objCliente2);

# 6) invocar al metodo registrarVenta()
$empresa->registrarVenta([14, 2],$objCliente2); #retorna 0


# 7) invocar al metodo registrarVenta() 
$empresa->registrarVenta([2],$objCliente2);
# 7) invocar al método informarVentasImportadas(). Visualizar el resultado obtenido
$empresa->informarSumaVentasNacionales();

# 8) invocar al método informarSumaVentasNacionales(). Visualizar el resultado obtenido

# 9) realizar un echo de la variable empresa creada en 2. 

# 8) retornarVentasXcliente();
// print_r($empresa->retornarVentasXCliente("DNI",42123123));

# 9) retornarVentasXcliente();

// print_r($empresa->retornarVentasXCliente("DNI",43321321));

#10)
echo $empresa;

