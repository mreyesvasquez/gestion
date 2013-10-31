<?php
session_start();
if ($_SESSION['user'] == "") {
    header("Location: ../login.php");
} else {
    include('../Conexion/conexion.php');
    $cn = Conectarse();
}
$txtid = $_POST['cbocontrato'];
$RegistrosAMostrarr = 7;
$PaginasIntervalo = 3;

if ($_POST['pagina'] == null || $_POST['pagina'] == "" || $_POST['pagina'] == "0") {
    $RegistrosAEmpezar = 0;
    $RegistrosAEmpezar111 = 0;
    $PagAct = 1;

    //caso contrario los iniciamos
} else {
    $RegistrosAEmpezar111 = ($_POST['pagina'] - 1) * $RegistrosAMostrarr;
    $RegistrosAEmpezar = ($_POST['pagina'] - 1) * $RegistrosAMostrarr;
    $PagAct = $_POST['pagina'];
}
if ($txtid == '0') {
    $rstotal = "select count(*) as total FROM incidencias i

inner join personal per on per.personalcodigo=i.personalcodigo
inner join categorias cat on cat.categoriascodigo=i.categoriascodigo
inner join cargo car on car.cargocodigo=per.cargocodigo
inner join areas are on are.areascodigo=per.areascodigo
inner join subareas subare on subare.subareascodigo=per.subareascodigo";
    $rsemanas7 = "SELECT i.`incidenciascodigo`, concat( per.`Personalnombres`,' ', per.`Personalpaterno`,' ', per.`Personalmaterno`)as nombres
,car.`cargodescripcion`,are.`areasdescripcion`,subare.`subareasdescripcion`
,i.`incidenciasfecha`,i.`incidenciasdescripcion`, cat.`categoriasdescripcion`, i.`incidenciasresultado`

FROM incidencias i
inner join personal per on per.personalcodigo=i.personalcodigo
inner join categorias cat on cat.categoriascodigo=i.categoriascodigo
inner join cargo car on car.cargocodigo=per.cargocodigo
inner join areas are on are.areascodigo=per.areascodigo
inner join subareas subare on subare.subareascodigo=per.subareascodigo

  limit $RegistrosAEmpezar,$RegistrosAMostrarr ";
} else {
    $rstotal = "select count(*) as total FROM incidencias i
inner join personal per on per.personalcodigo=i.personalcodigo
inner join categorias cat on cat.categoriascodigo=i.categoriascodigo
inner join cargo car on car.cargocodigo=per.cargocodigo
inner join areas are on are.areascodigo=per.areascodigo
inner join subareas subare on subare.subareascodigo=per.subareascodigo
where i.incidenciasestado='$txtid'";
    $rsemanas7 = "SELECT i.`incidenciascodigo`, concat( per.`Personalnombres`,' ', per.`Personalpaterno`,' ', per.`Personalmaterno`)as nombres
,car.`cargodescripcion`,are.`areasdescripcion`,subare.`subareasdescripcion`
,i.`incidenciasfecha`,i.`incidenciasdescripcion`, cat.`categoriasdescripcion`, i.`incidenciasresultado`

FROM incidencias i
inner join personal per on per.personalcodigo=i.personalcodigo
inner join categorias cat on cat.categoriascodigo=i.categoriascodigo
inner join cargo car on car.cargocodigo=per.cargocodigo
inner join areas are on are.areascodigo=per.areascodigo
inner join subareas subare on subare.subareascodigo=per.subareascodigo

where i.incidenciasestado='$txtid'
  limit $RegistrosAEmpezar,$RegistrosAMostrarr ";
}

$semana7 = mysql_query($rsemanas7);
$total = mysql_query($rstotal);
$rstotal = mysql_fetch_array($total);
$NroRegistros = $rstotal['total'];



$PagAnt = $PagAct - 1;
$PagSig = $PagAct + 1;
$PagUlt = $NroRegistros / $RegistrosAMostrarr;
//verificamos residuo para ver si llevarï¿½ decimales
$Res = $NroRegistros % $RegistrosAMostrarr;
// si hay residuo usamos funcion floor para que me
// devuelva la parte entera, SIN REDONDEAR, y le sumamos
if ($Res > 0)
    $PagUlt = floor($PagUlt) + 1;
?><div  style=" text-align: left;height: 30px; font-size: 12px">Pag.&nbsp;
    <?php
    if ($PagAct > ($PaginasIntervalo + 1)) {
        echo " - <a onclick=\"listper('','$txtid');\" class='paginador'><< Primero </a>";
        echo "&nbsp;";
    }
    for ($i = ($PagAct - $PaginasIntervalo); $i <= ($PagAct - 1); $i++) {
        if ($i == 1) {
            echo " <a onclick=\"listper('','$txtid');\" class='paginador'> " . $i . "</a> - ";
            echo "&nbsp;";
        } else if ($i > 1) {
            echo "<a onclick=\"listper('$i','$txtid');\" class='paginador'> " . $i . "</a> - ";
            echo "&nbsp;";
        }
    }

    echo "<span class='paginadoractivo'>" . $PagAct . "</span>";
    echo "&nbsp;";

    for ($j = ($PagAct + 1); $j <= ($PagAct + $PaginasIntervalo); $j++) {

        if ($j <= $PagUlt) {
            echo " - <a onclick=\"listper('$j' ,'$txtid');\" class='paginador'>" . $j . "</a> ";
        }
    }


    if ($PagAct < ($PagUlt - $PaginasIntervalo)) {
        echo "<a onclick=\"listper('$PagUlt','$txtid');\" class='paginador'> Último >></a>";
    }
    ?></div>



<?php
echo "<div id=tabla' style='width: 130%;'><table class='datagrid'>";
echo "
<tr>
	<th style='width: 50px; border:1px #c5c5c5 solid; border:1px #c5c5c5 solid; color: #fff;
        background-color:#004275;
        padding: 4px 0;'>Codigo</th>
<th style='width: 200px; border:1px #c5c5c5 solid; border:1px #c5c5c5 solid; color: #fff;
        background-color:#004275;
        padding: 4px 0;'>Nombres</th>

        
<th style='width: 100px; border:1px #c5c5c5 solid; border:1px #c5c5c5 solid; color: #fff;
        background-color:#004275;
        padding: 4px 0;'>Fecha
        </th>
        <th style='width: 100px; border:1px #c5c5c5 solid; border:1px #c5c5c5 solid; color: #fff;
        background-color:#004275;
        padding: 4px 0;'>Area
        </th>
        <th style='width: 100px; border:1px #c5c5c5 solid; border:1px #c5c5c5 solid; color: #fff;
        background-color:#004275;
        padding: 4px 0;'>SubArea
        </th>
        
<th style='width: 100px; border:1px #c5c5c5 solid; border:1px #c5c5c5 solid; color: #fff;
        background-color:#004275;
        padding: 4px 0;'>Incidencia
        </th>
        <th style='width: 100px; border:1px #c5c5c5 solid; border:1px #c5c5c5 solid; color: #fff;
        background-color:#004275;
        padding: 4px 0;'>Categoria
        </th>
        <th style='width: 100px; border:1px #c5c5c5 solid; border:1px #c5c5c5 solid; color: #fff;
        background-color:#004275;
        padding: 4px 0;'>Resultado
        </th>

</tr>
</table> </div> ";
echo "<div id='tabla1'  style='width: 130%;height: 180px'>";
echo "<table class='datagrid'>";

echo "<tbody>";


while ($rsemanas7 = mysql_fetch_array($semana7)) {

    echo "<tr id='grid'  style='text-align:center;'>";
    echo "<td style='width: 50px;text-align:center;border-bottom-color: #c5c5c5;border-bottom-style: dotted;border-bottom-width: thin;'    align='center' style='width: 10px;' id='formnuevo' >" . $rsemanas7["incidenciascodigo"] . " </td>";
    echo "<td style='width: 200px;text-align:center;border-bottom-color: #c5c5c5;border-bottom-style: dotted;border-bottom-width: thin;'    align='center' style='width: 10px;' id='formnuevo' >" . $rsemanas7["nombres"] . " </td>";
    echo "<td  style='width: 100px;text-align:center;border-bottom-color: #c5c5c5;border-bottom-style: dotted;border-bottom-width: thin;'   align='center' style='width: 10px;' id='formnuevo' >" . $rsemanas7["incidenciasfecha"] . " </td>";
    echo "<td  style='width: 100px;text-align:center;border-bottom-color: #c5c5c5;border-bottom-style: dotted;border-bottom-width: thin;'   align='center' style='width: 10px;' id='formnuevo' >" . $rsemanas7["areasdescripcion"] . " </td>";
    echo "<td  style='width: 100px;text-align:center;border-bottom-color: #c5c5c5;border-bottom-style: dotted;border-bottom-width: thin;'   align='center' style='width: 10px;' id='formnuevo' >" . $rsemanas7["subareasdescripcion"] . " </td>";
   
    echo "<td  style='width: 100px;text-align:center;border-bottom-color: #c5c5c5;border-bottom-style: dotted;border-bottom-width: thin;'   align='center' style='width: 10px;' id='formnuevo' >" . $rsemanas7["incidenciasdescripcion"] . " </td>";
    echo "<td  style='width: 100px;text-align:center;border-bottom-color: #c5c5c5;border-bottom-style: dotted;border-bottom-width: thin;'   align='center' style='width: 10px;' id='formnuevo' >" . $rsemanas7["categoriasdescripcion"] . " </td>";
    echo "<td  style='width: 100px;text-align:center;border-bottom-color: #c5c5c5;border-bottom-style: dotted;border-bottom-width: thin;'   align='center' style='width: 10px;' id='formnuevo' >" . $rsemanas7["incidenciasresultado"] . " </td>";
  
    echo "</tr>";
}

echo "</body></table>";
echo"</div>";
?>


