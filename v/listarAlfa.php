<br><br><br><br>
<?
	//busca los alfabetos primero del usuario
	//luego los favoritos y luego los otros
	
	define("usuario", "0", true);
	define("todo", "1", true);

	$j=0;
	$id=-1;
	$mostrar="";

	for($i=0;$i<3;$i++){

		if($i==usuario){
		
			$q="select * from alfabeto 
			inner join particula on alfabeto.alfabeto_id=particula.alfabeto_id
			inner join usr on usr.usr_id=alfabeto.usr_id
			where alfabeto.usr_id=$usrIdMostrar
			order by alfabeto.alfabeto_id, particula.particula_id asc"; 
		} 

		if($i==todo){
		
			$q="select * from alfabeto 
			inner join particula on alfabeto.alfabeto_id=particula.alfabeto_id
			inner join usr on usr.usr_id=alfabeto.usr_id
			where alfabeto.usr_id!=$usrIdMostrar
			order by alfabeto.alfabeto_id, particula.particula_id asc"; 
		}

		$res=mysql_query($q);	

		while ($row = mysql_fetch_array($res, MYSQL_ASSOC)) {

			if($id!=$row["alfabeto_id"]){

				$id=$row["alfabeto_id"];
				if($j!=0){$mostrar.="</div>";}
				$mostrar.="<div style=\"color:red\">".$row["alfabeto"]."<div>
				&nbsp;&nbsp;<a href=\"index.php?alfa=$id\">(Usar)</a>&nbsp;&nbsp;<a href=\"index.php?fav=$id\">(Enviar a favoritos)</a>
				<br><div style=\"color:green\">";
			}

			if(stristr($row["valor"], "rgb")!=FALSE || stristr($row["valor"], "#")!=FALSE){

				$mostrar.="<div width=\"10px\" id=\"output\" style=\"background-color:".$row["valor"]."; width: 10px; float: left;\">".$row["simbolo"]."</div>";				
			}
		

			$j++;
 	 }

	}
	echo $mostrar;
	
?>