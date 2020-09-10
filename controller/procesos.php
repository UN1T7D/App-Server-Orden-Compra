<?php
#trae todas las ordenes de compra que estan en espera y no han iniciado etapa
$sql1="SELECT o.oc,c.ncliente,o.finicio,o.ffin,o.estado,pa.npais,e.netapas ,pe.porcentaje,o.idpais_etapa,pa.idpais
from oc as o 
INNER join clientes as c on
o.nit=c.nit 
INNER JOIN pais_etapa as pe on 
o.idpais_etapa=pe.idpais_etapa 
INNER JOIN etapas as e on 
pe.idetapa=e.idetapa 
INNER JOIN pais as pa ON 
pe.idpais=pa.idpais 
where e.netapas='EN ESPERA' 
order by finicio ASC";
  #Consulta 2 trae todas las ordenes que no estan en espera(cuando ya estan en proceso iniciado)
$sql2="SELECT o.oc,c.ncliente,o.finicio,o.ffin,o.estado,pa.npais,e.netapas, e.idetapa ,pe.porcentaje,o.idpais_etapa,pa.idpais,c.ncliente
from oc as o 
INNER join clientes as c on 
o.nit=c.nit 
INNER JOIN pais_etapa as pe on 
o.idpais_etapa=pe.idpais_etapa 
INNER JOIN etapas as e on 
pe.idetapa=e.idetapa 
INNER JOIN pais as pa ON 
pe.idpais=pa.idpais 
where e.netapas!='EN ESPERA' and o.estado!='FINALIZADO' and o.estado!='CANCELADO' 
order by finicio ASC";

//consulta para contar las ordenes en proceso no iniciado
$cont1="SELECT COUNT(o.oc)as oct,o.estado,e.netapas,e.idetapa 
from oc as o 
INNER join clientes as c on 
o.nit=c.nit 
INNER JOIN pais_etapa as pe on 
o.idpais_etapa=pe.idpais_etapa 
INNER JOIN etapas as e on 
pe.idetapa=e.idetapa 
INNER JOIN pais as pa ON 
pe.idpais=pa.idpais
where e.netapas='EN ESPERA'";

$cont2="SELECT COUNT(o.oc)as oct,o.estado,e.netapas,e.idetapa 
from oc as o 
INNER join clientes as c on 
o.nit=c.nit 
INNER JOIN pais_etapa as pe on 
o.idpais_etapa=pe.idpais_etapa 
INNER JOIN etapas as e on 
pe.idetapa=e.idetapa 
INNER JOIN pais as pa ON 
pe.idpais=pa.idpais
where e.netapas!='EN ESPERA' and o.estado!='FINALIZADO' and o.estado!='CANCELADO'";

$cont3="SELECT COUNT(o.oc)as oct
from oc as o 
where o.estado='FINALIZADO' AND o.visible = 'SI'";

//................................................//

  //Consulta 3 trae todas las ordenes Etapa Finalizado
$sql3="SELECT o.oc,c.ncliente,o.finicio,o.ffin,o.estado,pa.npais,e.netapas,pe.porcentaje
from oc as o 
INNER join clientes as c on 
o.nit=c.nit 
INNER JOIN pais_etapa as pe on 
o.idpais_etapa=pe.idpais_etapa 
INNER JOIN etapas as e on 
pe.idetapa=e.idetapa 
INNER JOIN pais as pa ON 
pe.idpais=pa.idpais  
where o.estado='FINALIZADO' and e.idetapa='2' and o.visible='SI'
order by finicio ASC";

$resultado1=mysqli_query($conexion,$sql1);
$resultado2=mysqli_query($conexion,$sql2);
$resultado3=mysqli_query($conexion,$sql3);
$r=mysqli_query($conexion,$query);
$ver1=mysqli_query($conexion,$cont1);
$ver=mysqli_query($conexion,$cont2);
$ver3=mysqli_query($conexion,$cont3);
//fecha de inicio
date_default_timezone_set('America/El_Salvador');
$año=date('Y');
$fecha=date('Y-m-d');
