 
<? include "i/mysql.php";  include "i18n/index.php";  include "c/index.php"; ?> 

<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

<html><head>
<title><?= $__['Alfabeto en Colores, lenguaje en colores, libros con colores']?></title>

	<link rel="icon" href="favicon.jpg" type="image/jpg"/>
	 <link rel="shortcut icon" href="favicon.jpg" type="image/jpg" />
	
	<meta name="description" content="<?= $__['Alfabeto en colores entrega una coleccion de libros en un lenguaje de colores']?>">
<meta name="keywords" content="<?= $__['alfabeto en colores,abecedario colores, leer en colores, dislexia, libros en colores']?>">

	<link rel="stylesheet" type="text/css" href="v/css/index.css">
	<script type="text/javascript" src="js/util.js"></script>

<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
	 
	<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
  <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>


</head>

<body style="background-color: rgb(174,183,175);" onload="cerrar();">


<div style="margin-left: 100px;">

<? include "v/header.php"; ?> <br>


<? if(isset($_GET["action"])){ 

	if($_GET["action"]=="registrar")
		include "v/registro.php";
	if($_GET["action"]=="subirLibro")
		include "v/subir.php";
	if($_GET["action"]=="crearAlfa")
		include "v/crearAlfa.php";
	if($_GET["action"]=="listar")
		include "v/listarAlfa.php";

}else{

	if( $bienvenida ){ include "v/index.php"; }else{ include "v/libro.php"; } 
}



?>

</div>

<script>document.title = "<?= $__['Alfabeto en Colores, lenguaje en colores, libros con colores']?>";</script>
<? include "chromaconator.php"; ?>

</body></html>
<? mysql_close($e); ?>