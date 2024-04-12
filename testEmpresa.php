<?php

include 'Cliente.php';
include 'Empresa.php';
include 'Venta.php';
include 'Moto.php';

$objCliente1 = new Cliente("jorge", "rodriguez", "alta", "DNI", 42123123);

$objCliente2 = new Cliente("juan", "suarez", "alta", "DNI", 43321321);
$obMoto1 = new Moto(11,2230000,2022,"Benelli Imperiale 400",0.85,true);
// echo $moto1->darPrecioVenta(); 
$obMoto2 = new Moto(12,584000,2021,"Zanella Zr 150 Ohc", 0.7,true);
// echo $moto2->darPrecioVenta();

$obMoto3 = new Moto(13,999900,2023,"Zanella Patagonian Eagle 250", 0.55,false);
/* 
$moto10 = new Moto(3334,4000,2016,"zanella ceccato", 0.032,true);
$moto11 = new Moto(8879,15000,2021,"indian scout", 0.025,false);
$moto12 = new Moto(2031,10000,2022,"royal enfield meteor", 0.3,true);
$cliente3 = new Cliente("blas","parera","alta","DNI",41303030);
$precioFinal = $moto10->darPrecioVenta() + $moto12->darPrecioVenta();
$venta1 = new Venta(123,'11-04-2024',$cliente1,[$moto1, $moto2],$precioFinal);

*/

$empresa = new Empresa("Alta Gama","Av argentina 123",[$objCliente1,$objCliente2],[$obMoto1,$obMoto2,$obMoto3],[]);

# 5) invocar al metodo registrarVenta()
$empresa->registrarVenta([11,12,13],$objCliente2); #retorna 7831400


# 6) invocar al metodo registrarVenta()
$empresa->registrarVenta([0],$objCliente2); #retorna 0
/* 
    if($empresa->registrarVenta([0],$objCliente2) == 0){
        echo "no se registro ninguna venta porque el codigo correspondiente a esa moto no se encontro";
    };
 */

 
# 7) invocar al metodo registrarVenta() 
$empresa->registrarVenta([2],$objCliente2)."\n";
/* 
if($empresa->registrarVenta([2],$objCliente2) == 0){
    echo "no se registro ninguna venta porque el codigo correspondiente a esa moto no se encontro";
}; 
*/

#7) invocar al metodo registrarVenta() con una moto no disponible
// $empresa->registrarVenta([13],$objCliente2);
/* 
if($empresa->registrarVenta([13],$objCliente2) == -1){
    echo "no se registro ninguna venta porque la moto con ese codigo no esta disponible";
};  */

# 8) retornarVentasXcliente();
// print_r($empresa->retornarVentasXCliente("DNI",42123123)); #retorna 0

# 9) retornarVentasXcliente();

// print_r($empresa->retornarVentasXCliente("DNI",43321321));


echo $empresa;
