<?php

require "conexionmysqli2.inc";

if(isset($_GET['codVenta'])){
    $codSalida=$_GET['codVenta'];
}else{
    $codSalida=$codigoVenta;
}

$sqlDatosVenta="select s.siat_cuf
        from `salida_almacenes` s
        where s.`cod_salida_almacenes`='$codSalida'";
$respDatosVenta=mysqli_query($enlaceCon,$sqlDatosVenta);
$cuf="";
while($datDatosVenta=mysqli_fetch_array($respDatosVenta)){
    $cuf=$datDatosVenta['siat_cuf'];
}

if(isset($sw_correo)){
    $sw=true;
    $nombreFile="../siat_folder/Siat/temp/Facturas-XML/$cuf.pdf";
}else{
    $sw=false;
    $nombreFile="siat_folder/Siat/temp/Facturas-XML/$cuf.pdf";  
}
unlink($nombreFile);	


$urlSIAT=obtenerValorConfiguracion($enlaceCon, 50);
$url = $urlSIAT."formatoFacturaOnLine.php?codVenta=".$codSalida;
//Get content as a string. You can get local content or download it from the web.
$downloadedFile = file_get_contents($url);
//Save content from string to .html file.
file_put_contents($nombreFile, $downloadedFile);

?>




