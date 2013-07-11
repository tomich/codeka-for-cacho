<?php
header('Cache-Control: no-cache');
header('Pragma: no-cache'); 
?>
<html>
<head>
<link href="../estilos/estilos.css" type="text/css" rel="stylesheet">
</head>
<script language="javascript">

function pon_prefijo(codarticulo) {
		
	var busq
	busq='<?php $busq = $_GET['busq']; echo $busq ; ?>';	
	opener.document.form_busqueda.codarticulo.value=codarticulo;
	opener.document.form_busqueda.referencia.value="";
	opener.document.form_busqueda.descripcion.value="";
	opener.document.form_busqueda.cboFamilias.options[0].selected = true;
	opener.document.form_busqueda.cboProveedores.options[0].selected = true;
	opener.document.form_busqueda.cboUbicacion.options[0].selected = true;
	if (busq=="si"){
	window.opener.buscar();
	}
	//self.close ();
	
}
function pon_error() {
	limpiar();
	alert ("No existe ningun articulo con ese codigo de barras");
	//opener.document.form_busqueda.codarticulo.value="-1";
	//self.close ();
}

function limpiar() {
	opener.document.form_busqueda.codarticulo.value="";
	opener.document.form_busqueda.referencia.value="";
	opener.document.form_busqueda.descripcion.value="";
	opener.document.form_busqueda.cboFamilias.options[0].selected = true;
	opener.document.form_busqueda.cboProveedores.options[0].selected = true;
	opener.document.form_busqueda.cboUbicacion.options[0].selected = true;
	opener.document.form_busqueda.codbarras.value="";
	opener.document.form_busqueda.codbarras.focus();
}

 
</script>
<? include ("../conectar.php"); ?>
<body>
<?
	$codbarras=$_GET["codbarras"];
	$consulta="SELECT * FROM articulos WHERE codigobarras='$codbarras' AND borrado=0";
	$rs_tabla = mysql_query($consulta);
	if (mysql_num_rows($rs_tabla)>0) {
		?>
		<script languaje="javascript">
		pon_prefijo('<? echo mysql_result($rs_tabla,0,codarticulo) ?>');
		</script>
		<? 
	} else { ?>
	<script>
	pon_error();
	</script>
	<? }
?>
</div>
</body>
</html>
