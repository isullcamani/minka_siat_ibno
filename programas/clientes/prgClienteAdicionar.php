<?php

require("../../conexionmysqli2.inc");

$nomCli = $_GET["nomcli"];
$apCli = $_GET["apcli"];
$nit = $_GET["nit"];
$dir = $_GET["dir"];
$tel1 = $_GET["tel1"];
$mail = $_GET["mail"];
$area = $_GET["area"];
$fact = $_GET["fact"];
$edad = $_GET["edad"];
$genero = $_GET["genero"];
$tipoPrecio=$_GET["tipoPrecio"];

$nomCli = str_replace("'", "''", $nomCli);
$apCli = str_replace("'", "''", $apCli);
$nit = str_replace("'", "''", $nit);
$dir = str_replace("'", "''", $dir);
$tel1 = str_replace("'", "''", $tel1);
$mail = str_replace("'", "''", $mail);
$area = $area;
$fact = str_replace("'", "''", $fact);

$sql = "select IFNULL(MAX(cod_cliente)+1,1) from clientes order by cod_cliente desc";
$resp = mysqli_query($enlaceCon,$sql);
$dat=mysqli_fetch_array($resp);
$codigoCliente=$dat[0];//$codigoCliente=mysqli_result($resp,0,0);

$consulta="
INSERT INTO clientes (cod_cliente, nombre_cliente,paterno, nit_cliente, dir_cliente, telf1_cliente, email_cliente, cod_area_empresa, nombre_factura, cod_tipo_precio,cod_tipo_edad,ci_cliente,cod_genero)
VALUES ('$codigoCliente', '$nomCli','$apCli', '$nit', '$dir', '$tel1', '$mail', $area, '$fact', '$tipoPrecio','$edad','$ci','$genero')
";
if(isset($_GET["dv"])){
  $resp=mysqli_query($enlaceCon,$consulta);
  if($resp) {
    echo "#####".$codigoCliente;
  } else {
    echo "#####0";
  }
}else{

$resp=mysqli_query($enlaceCon,$consulta);
if($resp) {
    echo "<script type='text/javascript' language='javascript'>alert('Se ha adicionado un nuevo cliente.');listadoClientes();</script>";
} else {
   
    echo "<script type='text/javascript' language='javascript'>alert('Error al crear cliente');</script>";
}
}
?>
