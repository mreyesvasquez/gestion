<?php
include('../Conexion/conexion.php');
$cn = Conectarse();
session_start();
$pag = $_POST["pagina"];
$codigo = $_POST["codigo"];
$codigo2 = $_POST["codigo2"];
$tipo = $_POST["tipo"];
$idorigen = $_POST["idorigen"];
$idorigen2 = $_POST["idorigen2"];
$iddestino = $_POST["iddestino"];
$RegistrosAMostrarr = 10;
$PaginasIntervalo = 3;
if ($_POST['pagina'] == null || $_POST['pagina'] == "") {
    $RegistrosAEmpezar = 0;
    $PagAct = 1;
    //caso contrario los iniciamos
} else {
    $RegistrosAEmpezar = ($_POST['pagina'] - 1) * $RegistrosAMostrarr;
    $PagAct = $_POST['pagina'];
}
if ($tipo == "areas") {


    $rsestado = "SELECT `areascodigo`,`areasdescripcion`,`areasestado` FROM areas 
    where areasdescripcion like '$codigo%'
    limit $RegistrosAEmpezar,$RegistrosAMostrarr";
    $estado = mysql_query($rsestado);

    $rstotal = "select count(*) as total FROM areas 
    where areasdescripcion like '$codigo%'";
    $total = mysql_query($rstotal);
    $rstotal = mysql_fetch_array($total);
    $NroRegistros = $rstotal['total'];
    echo "<div style='height:300px;'><table class='datagrid'>";
    echo "
    <tr>
	<th style='width: 40px;'>CODIGO</th>
        <th style='width: 70px;'>DESCRIPCION</th>
        <th style='width: 70px;'>ESTADO</th>
    </tr>
    <tbody>";
} else if ($tipo == "subareas") {

    $rsestado = "SELECT s.`subareascodigo`, s.`subareasdescripcion`, a.`areasdescripcion`, a.`areascodigo`,
    s.`subareasestado` FROM subareas s,areas a where s.areascodigo=a.areascodigo and subareasdescripcion like '$codigo%' 
    order by subareascodigo desc
    limit $RegistrosAEmpezar,$RegistrosAMostrarr";
    $estado = mysql_query($rsestado);

    $rstotal = "select count(*) as total  FROM subareas 
    where subareasdescripcion like '$codigo%'";
    $total = mysql_query($rstotal);
    $rstotal = mysql_fetch_array($total);
    $NroRegistros = $rstotal['total'];
    echo "<div style='height:300px;'><table class='datagrid'>";
    echo "
    <tr>
	<th style='width: 10%;'>CODIGO</th>
	<th style='width: 40%;'>SUBGERENCIA</th>
        <th style='width: 40%;'>GERENCIA</th>
  	<th style='width: 30%;'>ESTADO</th>
      </tr>
    <tbody>";
} else if ($tipo == "personal") {
    $rsestado = "select p.`personalcodigo`, p.`personaldni`, p.`personalnombres`,p.`personalpaterno`,p.`personalmaterno`,
    p.`personalsexo`, p.`personalcelular`, p.`personalemail`, p.`personalfechanac`, p.`personalestadocivil`, p.`personaldireccion`, p.`personalestado`,
    p.`departamentocodigo`, p.`distritocodigo`, p.`provinciacodigo`, p.`distritocodigo`, p.`cargocodigo`, p.`areascodigo`, p.`subareascodigo`
    from personal p, departamento d, provincia pr, distrito di, cargo c, areas a, subareas s
    where p.departamentocodigo=d.departamentocodigo and p.provinciacodigo=pr.provinciacodigo and p.distritocodigo=di.distritocodigo
    and p.cargocodigo=c.cargocodigo and p.areascodigo=a.areascodigo and p.subareascodigo=s.subareascodigo
    and personalnombres like '$codigo%'
    limit $RegistrosAEmpezar,$RegistrosAMostrarr";
    $estado = mysql_query($rsestado);
    $rstotal = "select count(*) as total  FROM personal
       
    where personalnombres like '$codigo%'";
    $total = mysql_query($rstotal);
    $rstotal = mysql_fetch_array($total);
    $NroRegistros = $rstotal['total'];
    echo "<div style='height:300px;'><table class='datagrid'>";
    echo "
    <tr>
	<th style='width: 10%;'>CODIGO</th>
	<th style='width: 30%;'>PERSONAL</th>
	<th style='width: 30%;'>ESTADO</th>	
      </tr>
    <tbody>";
} else if ($tipo == "categorias") {
    $rsestado = "SELECT `categoriascodigo`,`categoriasdescripcion`,`categoriasestado` FROM categorias
    where categoriasdescripcion like '$codigo%'
    limit $RegistrosAEmpezar,$RegistrosAMostrarr";
    $estado = mysql_query($rsestado);
    $rstotal = "select count(*) as total  FROM categorias
    where categoriasdescripcion like '$codigo%'";
    $total = mysql_query($rstotal);
    $rstotal = mysql_fetch_array($total);
    $NroRegistros = $rstotal['total'];
    echo "<div style='height:300px;'><table class='datagrid'>";
    echo "
    <tr>
	<th style='width: 20%;'>CODIGO</th>
        <th style='width: 50%;'>TIPO DE INCIDENCIAS</th>
	<th style='width: 50%;'>ESTADO</th>   	
    </tr>
<tbody>";
}else if ($tipo == "usuarios") {

    $rsestado = "SELECT p.`personalcodigo`,p.`personalnombres`,p.`personalpaterno`,p.`personalmaterno`,p.`personalestado` FROM personal p, usuario u
    where u.personalcodigo=p.personalcodigo and p.personalnombres like '$codigo%'
    limit $RegistrosAEmpezar,$RegistrosAMostrarr";
    $estado = mysql_query($rsestado);

    $rstotal = "select count(*) as total  FROM personal
    where personalnombres like '$codigo%'";
    $total = mysql_query($rstotal);
    $rstotal = mysql_fetch_array($total);
    $NroRegistros = $rstotal['total'];
    echo "<div style='height:300px;'><table class='datagrid'>";
    echo "
    <tr>
	<th style='width: 20%;'>CODIGO</th>
	<th style='width: 40%;'>PERSONAL</th>
        <th style='width: 40%;'>ESTADO</th>
    </tr>
<tbody>";
}

else if ($tipo == "tipopieza") {

    $rsestado = "SELECT `nTpCodigo`,`cTpDescripcion`,`cTpEstado` FROM tipopieza 
                 where cTpDescripcion like '$codigo%'
                 limit $RegistrosAEmpezar,$RegistrosAMostrarr";

    $estado = mysql_query($rsestado);
    $rstotal = "select count(*) as total  FROM tipopieza 
     
        where cTpDescripcion like '$codigo%'";
    $total = mysql_query($rstotal);
    $rstotal = mysql_fetch_array($total);
    $NroRegistros = $rstotal['total'];
    echo "<div style='height:300px;'><table class='datagrid'>";
    echo "
<tr>
	<th style='width: 30%;'>CODIGO</th>
	<th style='width: 50%;'>DESCRIPICON</th>
        <th style='width: 50%;'>ESTADO</th>
	
      </tr>
<tbody>";
}else if ($tipo == "rpieza") {

    $rsestado = "SELECT tp.`nTpCodigo`,concat(tp.`cTpDescripcion`,' ',ma.cMarDescripcion,' ',mo.cMoDescripcion) as componente,tp.`cTpEstado`,pi.nPiCodigo,r.`nReCodigo`, r.`nPiCodigo`, r.`nPerCodigo`, r.`cReSerie`, r.`cRePatrimonio`,
r.`dReFecha`, r.`cReEstado`, r.`cReObservacion`, r.`cReCapacidad`  FROM tipopieza tp
inner join pieza pi on pi.nTpCodigo=tp.nTpCodigo
inner join registro_pieza r on r.nPiCodigo=pi.nPiCodigo
inner join marca ma on ma.nMaCodigo=pi.nMaCodigo
inner join modelo mo on mo.nMoCodigo=pi.nMoCodigo 
                 where tp.cTpDescripcion like '$codigo%'
                 limit $RegistrosAEmpezar,$RegistrosAMostrarr";

    $estado = mysql_query($rsestado);
    $rstotal = "select count(*) as total FROM tipopieza tp
inner join pieza pi on pi.nTpCodigo=tp.nTpCodigo
inner join registro_pieza r on r.nPiCodigo=pi.nPiCodigo
inner join marca ma on ma.nMaCodigo=pi.nMaCodigo
inner join modelo mo on mo.nMoCodigo=pi.nMoCodigo 
     
        where cTpDescripcion like '$codigo%'";
    $total = mysql_query($rstotal);
    $rstotal = mysql_fetch_array($total);
    $NroRegistros = $rstotal['total'];
    echo "<div style='height:300px;'><table class='datagrid'>";
    echo "
<tr>
	<th style='width: 30%;'>CODIGO</th>
	<th style='width: 50%;'>COMPONENTE</th>
        <th style='width: 50%;'>SERIE</th>
	   <th style='width: 50%;'>PATRIMONIO</th>
              <th style='width: 50%;'>ESTADO</th>
      </tr>
<tbody>";
}
else if ($tipo == "busqueda_pieza") {

    $rsestado = "SELECT tp.`nTpCodigo`,concat(tp.`cTpDescripcion`,' ',ma.cMarDescripcion,' ',mo.cMoDescripcion) as componente,
        tp.`cTpEstado`,pi.nPiCodigo,r.`nReCodigo`, r.`nPiCodigo`, r.`nPerCodigo`, r.`cReSerie`, r.`cRePatrimonio`,
r.`dReFecha`, r.`cReEstado`, r.`cReObservacion`, r.`cReCapacidad`  FROM tipopieza tp
inner join pieza pi on pi.nTpCodigo=tp.nTpCodigo
inner join registro_pieza r on r.nPiCodigo=pi.nPiCodigo
inner join marca ma on ma.nMaCodigo=pi.nMaCodigo
inner join modelo mo on mo.nMoCodigo=pi.nMoCodigo 
                 where  r.`nReCodigo` not in(select nReCodigo from equipo_pieza) and tp.cTpDescripcion like '$codigo%'
                 limit $RegistrosAEmpezar,$RegistrosAMostrarr";

    $estado = mysql_query($rsestado);
    $rstotal = "select count(*) as total FROM tipopieza tp
inner join pieza pi on pi.nTpCodigo=tp.nTpCodigo
inner join registro_pieza r on r.nPiCodigo=pi.nPiCodigo
inner join marca ma on ma.nMaCodigo=pi.nMaCodigo
inner join modelo mo on mo.nMoCodigo=pi.nMoCodigo 
     
        where cTpDescripcion like '$codigo%'";
    $total = mysql_query($rstotal);
    $rstotal = mysql_fetch_array($total);
    $NroRegistros = $rstotal['total'];
    echo "<div style='height:300px;'><table class='datagrid'>";
    echo "
<tr>
	<th style='width: 30%;'>CODIGO</th>
	<th style='width: 50%;'>COMPONENTE</th>
        <th style='width: 50%;'>SERIE</th>
	   <th style='width: 50%;'>PATRIMONIO</th>
              <th style='width: 50%;'>ESTADO</th>
      </tr>
<tbody>";
}

else if ($tipo == "equipo") {

    $rsestado = "SELECT  distinct  e.nEqCodigo,e.`nAmCodigo`, e.`cEqNombreEquipo`,a.`cAmDescripcion`,
e.`nEqEstado`, e.`nEqPatrimonio`, e.`dEqFecha`, e.`dEqRnd`  FROM  equipo e
inner join ambiente a on a.nAmCodigo=e.nAmCodigo
                 where a.cAmDescripcion like '$codigo%'
                 limit $RegistrosAEmpezar,$RegistrosAMostrarr";

    $estado = mysql_query($rsestado);
    $rstotal = "select count(*) as total  FROM  equipo e
inner join ambiente a on a.nAmCodigo=e.nAmCodigo

                 where a.cAmDescripcion like '$codigo%'";
    $total = mysql_query($rstotal);
    $rstotal = mysql_fetch_array($total);
    $NroRegistros = $rstotal['total'];
    echo "<div style='height:300px;'><table class='datagrid'>";
    echo "
<tr>
	<th style='width: 10%;'>CODIGO</th>
         <th style='width: 30%;'>NOMBRE</th>
	<th style='width: 50%;'>AREA</th>       
	   <th style='width: 50%;'>PATRIMONIO</th>
              <th style='width: 30%;'>ESTADO</th>
      </tr>
<tbody>";
}
while ($rsestado = mysql_fetch_array($estado)) {
    if ($tipo == "areas") {

        $id = "";
        $cod1 = $rsestado["areascodigo"];
        $cod2 = $rsestado["areasdescripcion"];
        $cod3 = $rsestado["areasestado"];
        $cod4 = "";
        $cod5 = "";
        $cod6 = "";
        $cod7 = "";
        $cod8 = "";
        $cod9 = "";
        $cod10 = "";
        $cod11 = "";
        $cod12 = "";
        $cod13 = "";
        $cod14 = "";
        $cod15 = "";
        $cod16 = "";
        $cod17 = "";
        $cod18 = "";
        echo "<tr id='grid' >";
        
        echo "<td style='text-align:left;' onclick=\"sendDatosOperaciones('$id','$cod1','$cod2','$cod3','$cod4','$cod5','$cod6','$cod7','$cod8','$cod9','$cod10','$cod11','$cod12','$cod13','$cod14','$cod15','$cod16','$cod17','$cod18','$tipo');\"    align='center' style='width: 10px;' id='formnuevo' >" . $rsestado["areascodigo"] . " </td>";
        echo "<td  style='text-align:left;' onclick=\"sendDatosOperaciones('$id','$cod1','$cod2','$cod3','$cod4','$cod5','$cod6','$cod7','$cod8','$cod9','$cod10','$cod11','$cod12','$cod13','$cod14','$cod15','$cod16','$cod17','$cod18','$tipo');\"    align='center' style='width: 10px;' id='formnuevo' >" . $rsestado["areasdescripcion"] . " </td>";
        echo "<td  style='text-align:left;' onclick=\"sendDatosOperaciones('$id','$cod1','$cod2','$cod3','$cod4','$cod5','$cod6','$cod7','$cod8','$cod9','$cod10','$cod11','$cod12','$cod13','$cod14','$cod15','$cod16','$cod17','$cod18','$tipo');\"    align='center' style='width: 10px;' id='formnuevo' >" . $rsestado["areasestado"] . " </td>";
        echo "</tr>";
    } 
    else if ($tipo == "subareas") {

        $id = "";
        $cod1 = $rsestado["subareascodigo"];
        $cod2 = $rsestado["subareasdescripcion"];
        $cod3 = $rsestado["areasdescripcion"];
        $cod4 = $rsestado["subareasestado"];
        $cod5 = $rsestado["areascodigo"];
        $cod6 = "";
        $cod7 = "";
        $cod8 = "";
        $cod9 = "";
        $cod10 = "";
        $cod11 = "";
        $cod12 = "";
        $cod13 = "";
        $cod14 = "";
        $cod15 = "";
        $cod16 = "";
        $cod17 = "";
        $cod18 = "";
        echo "<tr id='grid' >";
        echo "<td style='text-align:left;' onclick=\"sendDatosOperaciones('$id','$cod1','$cod2','$cod3','$cod4','$cod5','$cod6','$cod7','$cod8','$cod9','$cod10','$cod11','$cod12','$cod13','$cod14','$cod15','$cod16','$cod17','$cod18','$tipo');\"    align='center' style='width: 10px;' id='formnuevo' >" . $rsestado["subareascodigo"] . " </td>";
        echo "<td style='text-align:left;' onclick=\"sendDatosOperaciones('$id','$cod1','$cod2','$cod3','$cod4','$cod5','$cod6','$cod7','$cod8','$cod9','$cod10','$cod11','$cod12','$cod13','$cod14','$cod15','$cod16','$cod17','$cod18','$tipo');\"    align='center' style='width: 10px;' id='formnuevo' >" . $rsestado["subareasdescripcion"] . " </td>";
        echo "<td style='text-align:left;' onclick=\"sendDatosOperaciones('$id','$cod1','$cod2','$cod3','$cod4','$cod5','$cod6','$cod7','$cod8','$cod9','$cod10','$cod11','$cod12','$cod13','$cod14','$cod15','$cod16','$cod17','$cod18','$tipo');\"    align='center' style='width: 10px;' id='formnuevo' >" . $rsestado["areasdescripcion"] . " </td>";
        echo "<td style='text-align:left;' onclick=\"sendDatosOperaciones('$id','$cod1','$cod2','$cod3','$cod4','$cod5','$cod6','$cod7','$cod8','$cod9','$cod10','$cod11','$cod12','$cod13','$cod14','$cod15','$cod16','$cod17','$cod18','$tipo');\"    align='center' style='width: 10px;' id='formnuevo' >" . $rsestado["subareasestado"] . " </td>";

        echo "</tr>";
    } 
    else if ($tipo == "personal") {

        $id = "";
        $cod1 = $rsestado["personalcodigo"];
        $cod2 = $rsestado["personaldni"];
        $cod3 = $rsestado["personalnombres"];
        $cod4 = $rsestado["personalpaterno"];
        $cod5 = $rsestado["personalmaterno"];
        $cod6 = $rsestado["personalsexo"];
        $cod7 = $rsestado["personalcelular"];
        $cod8 = $rsestado["personalemail"];
        $cod9 = $rsestado["personalfechanac"];
        $cod10 = $rsestado["personalestadocivil"];
        $cod11 = $rsestado["personaldireccion"];
        $cod12 = $rsestado["personalestado"];
        $cod13 = $rsestado["departamentocodigo"];
        $cod14 = $rsestado["provinciacodigo"];
        $cod15 = $rsestado["distritocodigo"];
        $cod16 = $rsestado["cargocodigo"];
        $cod17 = $rsestado["areascodigo"];
        $cod18 = $rsestado["subareascodigo"];
        echo "<tr id='grid' >";
        echo "<td style='text-align:left;' onclick=\"sendDatosOperaciones('$id','$cod1','$cod2','$cod3','$cod4','$cod5','$cod6','$cod7','$cod8','$cod9','$cod10','$cod11','$cod12','$cod13','$cod14','$cod15','$cod16','$cod17','$cod18',$tipo');\"    align='center' style='width: 10px;' id='formnuevo' >" . $rsestado["personalcodigo"] . " </td>";
        echo "<td style='text-align:left;' onclick=\"sendDatosOperaciones('$id','$cod1','$cod2','$cod3','$cod4','$cod5','$cod6','$cod7','$cod8','$cod9','$cod10','$cod11','$cod12','$cod13','$cod14','$cod15','$cod16','$cod17','$cod18','$tipo');\"    align='center' style='width: 10px;' id='formnuevo' >" . $rsestado["personalnombres"] . " " . $rsestado["personalpaterno"] . " " . $rsestado["personalmaterno"] . " </td>";
        echo "<td style='text-align:left;' onclick=\"sendDatosOperaciones('$id','$cod1','$cod2','$cod3','$cod4','$cod5','$cod6','$cod7','$cod8','$cod9','$cod10','$cod11','$cod12','$cod13','$cod14','$cod15','$cod16','$cod17','$cod18','$tipo');\"    align='center' style='width: 10px;' id='formnuevo' >" . $rsestado["personalestado"] . " </td>";

        echo "</tr>";
    }
    else if  ($tipo == "categorias") {
        $id = "";
        $cod1 = $rsestado["categoriascodigo"];
        $cod2 = $rsestado["categoriasdescripcion"];
        $cod3 = $rsestado["categoriasestado"];
        $cod4 = "";
        $cod5 = "";
        $cod6 = "";
        $cod7 = "";
        $cod8 = "";
        $cod9 = "";
        $cod10 = "";
        $cod11 = "";
        $cod12 = "";
        $cod13 = "";
        $cod14 = "";
        $cod15 = "";
        $cod16 = "";
        $cod17 = "";
        $cod18 = "";
        echo "<tr id='grid'>";
        echo "<td style='text-align:left;' onclick=\"sendDatosOperaciones('$id','$cod1','$cod2','$cod3','$cod4','$cod5','$cod6','$cod7','$cod8','$cod9','$cod10','$cod11','$cod12','$cod13','$cod14','$cod15','$cod16','$cod17','$cod18','$tipo');\"    align='center' style='width: 10px;' id='formnuevo' >" . $rsestado["categoriascodigo"] . " </td>";
        echo "<td style='text-align:left;' onclick=\"sendDatosOperaciones('$id','$cod1','$cod2','$cod3','$cod4','$cod5','$cod6','$cod7','$cod8','$cod9','$cod10','$cod11','$cod12','$cod13','$cod14','$cod15','$cod16','$cod17','$cod18','$tipo');\"    align='center' style='width: 10px;' id='formnuevo' >" . $rsestado["categoriasdescripcion"] . " </td>";
        echo "<td style='text-align:left;' onclick=\"sendDatosOperaciones('$id','$cod1','$cod2','$cod3','$cod4','$cod5','$cod6','$cod7','$cod8','$cod9','$cod10','$cod11','$cod12','$cod13','$cod14','$cod15','$cod16','$cod17','$cod18','$tipo');\"    align='center' style='width: 10px;' id='formnuevo' >" . $rsestado["categoriasestado"] . " </td>";
        echo "</tr>";
    }
    else if  ($tipo == "usuarios") {
        $id = "";
        $cod1 = $rsestado["personalcodigo"];
        $cod2 = $rsestado["personalnombres"];
        $cod3 = $rsestado["personalpaterno"];
        $cod4 = $rsestado["personalmaterno"];
        $cod5 = $rsestado["personalestado"];
        $cod6 = "";
        $cod7 = "";
        $cod8 = "";
        $cod9 = "";
        $cod10 = "";
        $cod11 = "";
        $cod12 = "";
        $cod13 = "";
        $cod14 = "";
        $cod15 = "";
        $cod16 = "";
        $cod17 = "";
        $cod18 = "";
        echo "<tr id='grid'>";
        echo "<td style='text-align:left;' onclick=\"sendDatosOperaciones('$id','$cod1','$cod2','$cod3','$cod4','$cod5','$cod6','$cod7','$cod8','$cod9','$cod10','$cod11','$cod12','$cod13','$cod14','$cod15','$cod16','$cod17','$cod18','$tipo');\"    align='center' style='width: 10px;' id='formnuevo' >" . $rsestado["personalcodigo"] . " </td>";
        echo "<td style='text-align:left;' onclick=\"sendDatosOperaciones('$id','$cod1','$cod2','$cod3','$cod4','$cod5','$cod6','$cod7','$cod8','$cod9','$cod10','$cod11','$cod12','$cod13','$cod14','$cod15','$cod16','$cod17','$cod18','$tipo');\"    align='center' style='width: 10px;' id='formnuevo' >" . $rsestado["personalnombres"] . " " . $rsestado["personalpaterno"] . " " . $rsestado["personalmaterno"] . " </td>";
        echo "<td style='text-align:left;' onclick=\"sendDatosOperaciones('$id','$cod1','$cod2','$cod3','$cod4','$cod5','$cod6','$cod7','$cod8','$cod9','$cod10','$cod11','$cod12','$cod13','$cod14','$cod15','$cod16','$cod17','$cod18','$tipo');\"    align='center' style='width: 10px;' id='formnuevo' >" . $rsestado["personalestado"] . " </td>";
        echo "</tr>";
    }
}
$PagAnt = $PagAct - 1;
$PagSig = $PagAct + 1;
$PagUlt = $NroRegistros / $RegistrosAMostrarr;
//verificamos residuo para ver si llevarÃ¯Â¿Â½ decimales
$Res = $NroRegistros % $RegistrosAMostrarr;
// si hay residuo usamos funcion floor para que me
// devuelva la parte entera, SIN REDONDEAR, y le sumamos
// una unidad para obtener la ultima pagina



if ($Res > 0)
    $PagUlt = floor($PagUlt) + 1;

echo "</tbody>
</table></div><br/>";


if ($PagAct > ($PaginasIntervalo + 1)) {
    echo "<a onclick=\"listarDatosModal('','$idorigen','$idorigen2','$iddestino','$tipo');\" class='paginador'><< Primero </a>";
    echo "&nbsp;";
}
for ($i = ($PagAct - $PaginasIntervalo); $i <= ($PagAct - 1); $i++) {
    if ($i == 1) {
        echo "<a onclick=\"listarDatosModal('','$idorigen','$idorigen2','$iddestino','$tipo')\" class='paginador'>" . $i . "</a>";
        echo "&nbsp;";
    } else if ($i > 1) {
        echo "<a onclick=\"listarDatosModal('$i','$idorigen','$idorigen2','$iddestino','$tipo')\" class='paginador'>" . $i . "</a>";
        echo "&nbsp;";
    }
}

echo "<span class='paginadoractivo'>" . $PagAct . "</span>";
echo "&nbsp;";

for ($j = ($PagAct + 1); $j <= ($PagAct + $PaginasIntervalo); $j++) {

    if ($j <= $PagUlt) {
        echo "<a onclick=\"listarDatosModal('$j' ,'$idorigen ','$idorigen2','$iddestino','$tipo')\" class='paginador'>" . $j . "</a>";
        echo "&nbsp;";
    }
}


if ($PagAct < ($PagUlt - $PaginasIntervalo)) {
    echo "<a onclick=\"listarDatosModal( '$PagUlt','$idorigen','$idorigen2','$iddestino','$tipo')\" class='paginador'>Ãšltimo >></a>";
}
?>