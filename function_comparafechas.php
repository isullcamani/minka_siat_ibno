<?php
function compara_fechas($fecha1,$fecha2)
{     
//echo "ingreso compara fechas";
	if (preg_match("/[0-9]{1,2}\/[0-9]{1,2}\/([0-9][0-9]){1,2}/",$fecha1))
            
 
              
			  list($dia1,$mes1,$a�o1)=explode("/",$fecha1);
            
 
      if (preg_match("/[0-9]{1,2}-[0-9]{1,2}-([0-9][0-9]){1,2}/",$fecha1))
            
 
        list($dia1,$mes1,$a�o1)=explode("-",$fecha1);
        if (preg_match("/[0-9]{1,2}\/[0-9]{1,2}\/([0-9][0-9]){1,2}/",$fecha2))
            
 
              list($dia2,$mes2,$a�o2)=explode("/",$fecha2);
            
 
      if (preg_match("/[0-9]{1,2}-[0-9]{1,2}-([0-9][0-9]){1,2}/",$fecha2))
            
 
        list($dia2,$mes2,$a�o2)=explode("-",$fecha2);
        //$dif = mktime(0,0,0,$mes1,$dia1,$a�o1) - mktime(0,0,0, $mes2,$dia2,$a�o2);
		//echo "fecha1=".$dia1."y".$mes1."y".$a�o1;
		//echo "fecha2=".$dia2."y".$mes2."y".$a�o2;
        $dif = mktime(0,0,0,$mes1,$a�o1,$dia1) - mktime(0,0,0, $mes2,$a�o2,$dia2);
		//echo "dif=".$dif;
  		return ($dif);                         
} 

/*$fecha1="2007-06-28";
$fecha2="2007-07-19";
if(compara_fechas($fecha1,$fecha2)<0)
{	echo "$fecha1 es menor a $fecha2";
}
if(compara_fechas($fecha1,$fecha2)>0)
{	echo "$fecha1 es mayor a $fecha2";
}*/
?>