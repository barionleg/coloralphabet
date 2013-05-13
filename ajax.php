<?

if(isset($_GET["nombre"])){
	include "i18n/index.php";

	if(strlen($_GET["nombre"])<4){ 
		echo "<div id=\"cartel\"></div>" . $__['inténtalo con otro'] . "<br><span style=\"color: red;\">".$__['nombre de usuario inválido']."</span>"; die;}

	$pos = strpos($_GET["nombre"], " "); 
	if($pos!=false){ echo "<div id=\"cartel\"></div>" . $__['inténtalo con otro'] . "<br><span style=\"color: red;\">".$__['nombre de usuario inválido']."</span>"; die;}

	include "i/mysql.php";	

	$nombre=mysql_real_escape_string($_GET["nombre"]);
	$q="select count(*) from usr where nombre like '$nombre'"; 

	$res=mysql_query($q);

	$fila = mysql_fetch_row($res); $txt=$fila[0];

	if($txt=="0"){
	echo "<div id=\"cartel1\"></div>" . $__['¡disponible!'] .""; 
	}else{ echo "<div id=\"cartel\"></div>" . $__['inténtalo con otro'] . ""; }

	mysql_close($e); die;

}

?>
