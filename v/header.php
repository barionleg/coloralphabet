<nav><!-- Menu --><div id="menu">	<!-- LISTA LAS LETRAS DEL ALFABETO -->	<?		if(isset($_GET["alfa"])){			$alfa=mysql_real_escape_string($_GET["alfa"]);		}else{$alfa=1;}					$lista="";				$q="select * from alfabeto 			inner join particula on alfabeto.alfabeto_id=particula.alfabeto_id			inner join usr on usr.usr_id=alfabeto.usr_id			where alfabeto.alfabeto_id=$alfa			order by alfabeto.alfabeto_id, particula.particula_id asc"; 				$res=mysql_query($q);			$j=0;		$jsAlfa=array();		while ($row = mysql_fetch_array($res, MYSQL_ASSOC)) {			$test1.= strtoupper($row["simbolo"]);			$jsAlfa[$j]["simbolo"]=$row["simbolo"]; $jsAlfa[$j]["valor"]=$row["valor"];			$j++;	 	 }	?>		<div id="output1"></div>	<div id="resena" style="display:none">		<textarea id="input1" rows="7" cols="120" style="font-family: monospace;">	<?="   ".$test1?></textarea></div>	<script>			addEventListener("DOMContentLoaded", function () {								var input1 = document.querySelector("#input1"),					text2color = function(input1) {	 				document.querySelector("#output1").innerHTML = chromaconate(input1.value,1);				};				 text2color(input1,1);										}, false);	</script>	<br>	<!-- OPCIONES MENUS PRINCIPAL -->	<div style="float: left; margin-left: 0px;">	<? if(isset($_GET["random"])){ ?>	|<a href="index.php?libro=<?=$archivoHtml?>&cPage=<?=$cPage?><?=$pagSimplified?>"><?= $__['Colores standard']?></a>	<? }else{ ?>	|<a href="index.php?random=1&libro=<?=$archivoHtml?>&cPage=<?=$cPage?><?=$pagSimplified?>"><?= $__['Colores aleatorios']?></a>	<? } if(isset($_GET["simplified"])){ ?>	|<a href="index.php?libro=<?=$archivoHtml?>&cPage=<?=$cPage?><?=$pagColor?>"><?= $__['Sin Dactilografía']?></a>	<? }else{ ?>	|<a href="index.php?libro=<?=$archivoHtml?>&cPage=<?=$cPage?>&simplified=1<?=$pagColor?>"><?= $__['Dactilográficamente']?></a>	<? } ?>	|<a href="#" onclick="mostrardiv();"><?= $__['Listar libros']?></a>		<?		$toUp="index.php?action=registrar";		$crearAlfa="index.php?action=registrar";		if($_SESSION["log"]==1){			$toUp="index.php?action=subirLibro";			$crearAlfa="index.php?action=crearAlfa";		}	?>	|<a href="<?=$toUp?>"><?= $__['Subir libro']?></a>	|<a href="<?=$crearAlfa?>"><?= $__['Crear Alfabeto']?></a>	|<a href="index.php?action=listar"><?= $__['Listar Alfabetos']?></a>	|<a href="Javascript:alert('Based on http://www.christianfaur.com/conceptual/colorAlphabet/ & https://github.com/mieky/chromaconator-js & programmed x Vernetit');"><?= $__['Acerca de texto en colores']?></a>	<?		//palfabetos favoritos		if($usrIdMostrar!=-1){					$lista="";						$q="select * from favorito inner join alfabeto					on favorito.alfabeto_id=alfabeto.alfabeto_id where favorito.usr_id=$usrIdMostrar"; 						$res=mysql_query($q);	$j=0;			$j=0;			while ($row = mysql_fetch_array($res, MYSQL_ASSOC)) {				$test5.= $row["simbolo"];								$j++;		 	 }	 	 if($j>0)	 		 echo "|".$test5; 		}	?>	<? if($_SESSION["log"]==1){ 			echo "".$nombreMostrar." ".$__['conectado']." <a href=\"index.php?unlog=true\">".$__['Salir']."</a>";		 }else{ ?>				<form action="index.php" method="post">			<input type="hidden" name="login" value="login">			<input type="text" name="nombre" placeholder="<?= $__['nombre de usuario']?>" style="width: 110px">			<input type="password" name="pass" placeholder="<?= $__['contraseña']?>" style="width: 80px">			<input type="submit" name="entrar" value="<?= $__['entrar']?>">&nbsp;<?= $__['o']?>&nbsp;<a href="index.php?action=registrar"><?= $__['registrarse']?></a>&nbsp;<?= $__['en segundos']." ".$mensajeLog?>		</form>		<? } ?>		</div>	<br>	<center><? idiomas(); ?></center></div><!-- FIN MENU --><br><!--MENSAJE CARGAR--><? // mensajeCondicion("libro","mensajeCargando.v"); ?>	<div id="flotante">	<br><br><br><br><br><br><br><br><?  include "v/div/navegador.v"; ?></div></div><br><div id="letter" style="color: green;"></div><br><br><br></nav>