<?

header('Content-Type: text/html; charset=UTF-8');
	
	session_start();

 // Procesa la extraccion de texto puro de la pagina y env�a a color
 
 include "i/i18n.php"; 
 include "i/txtTools.php";	
 include "i/vUtils.php";	
 	
 $paginar=0;
 $bienvenida=1;
 $letterColors=colorTxtPalette("");
 $mensajeLog="";

 
	if(isset($_GET["unlog"])){ $_SESSION["log"]=0; }

	if(isset($_POST["login"])){

		$nombre=mysql_real_escape_string($_POST["nombre"]);
		
		$pass=mysql_real_escape_string($_POST["pass"]);

		$q="select count(*),usr_id from usr where nombre like '$nombre' and password like '$pass'"; 

		$res=mysql_query($q);

		$fila = mysql_fetch_row($res); $txt=$fila[0]; $usr_id=$fila[1]; 

		if($txt=="1"){
			$_SESSION["log"]=1; $_SESSION["usr_id"]=$usr_id; $_SESSION["nombre"]=$nombre;		 
		}else{
			$mensajeLog="<span style=\"color:red;\">".$__['Contraseña inválida']."</span>";
			$_SESSION["log"]=0;	 $_SESSION["usr_id"]=-1; $_SESSION["nombre"]=$nombre;
		}

	}else{

		//Crear usuario
	 if(isset($_POST["procesar"])){ 

	 	if (!($_POST['captcha'] == $_SESSION['cap_code'])){
	 		echo "check captcha"; die; 
	 	}
				


		$nombre=mysql_real_escape_string($_POST["nombre"]);
		$pass=mysql_real_escape_string($_POST["passwd"]);
		$email=mysql_real_escape_string($_POST["email"]);

		$q="insert into usr (nombre,password,email,fecha) values ('$nombre','$pass','$email',NOW())"; 

		$res=mysql_query($q);

		$_SESSION["log"]=1; $nombreMostrar=$nombre;
	 }

 }

	//Subir libros//
	////////////////////////////////////////////////////////////	

	if(isset($_POST["subir"]) && $_SESSION["log"]==1){

	//	if (!($_POST['captcha'] == $_SESSION['cap_code']))
		//	die;	

		$usrIdMostrar=$_SESSION["usr_id"];
		$nombreMostrar=$_SESSION["nombre"];

		//datos del arhivo 
		$nombre_archivo = $_FILES['userfile']['name']; 
		$tipo_archivo = $_FILES['userfile']['type']; 
		$tamano_archivo = $_FILES['userfile']['size']; 

		$nombre=mysql_real_escape_string($_POST["nombre"]);
		$nombreMostrar=$nombre;
		$pass=mysql_real_escape_string($_POST["pass"]);


		//compruebo si las características del archivo son las que deseo 
		if (!((strpos($tipo_archivo, "html") || strpos($tipo_archivo, "HTML")) && ($tamano_archivo < 11500000))) { 
		  
		   	echo "<center><span style=\"color:red\"> Se permiten archivos .html o .HTML<br>se permiten archivos de 1500 Kb máximo. </span></center>"; 
		}else{ 

		   	if (move_uploaded_file($_FILES['userfile']['tmp_name'], "libros/".mysql_real_escape_string($nombre_archivo))){ 
  				
  				$test=limpiarCadena(file_get_contents("libros/".mysql_real_escape_string($nombre_archivo)));
					$tamano_archivo=strlen($test);	
					$nombre_archivo=mysql_real_escape_string($nombre_archivo);
					$q="insert into  libro (usr_id,nombre,fecha,tamano) values ($usrIdMostrar,'$nombre_archivo',NOW(),'0')"; 
					$res=mysql_query($q);  	
				
	      	echo "<center><span style=\"color:green\"> El archivo ha sido cargado correctamente</span></center>"; 


		   	}else{ 
		      	 echo "<center><span style=\"color:red\"> Ocurrió algún error al subir el fichero. No pudo guardarse</span></center>"; 
		   	} 
		} 

	}

	$usrIdMostrar=$_SESSION["usr_id"];
	$nombreMostrar=$_SESSION["nombre"];


	//Nuevo alfabeto
	if(isset($_POST["alfabeto"])){

		$input=$_POST["input"];

		$particulas=explode("\n", $input);
		
		$i=0;
		$trabajo = array();
		
	
		foreach ($particulas as $key => $value ) {
			$trabajo[$key]=explode("=",$value);	
		}


		$nombre=mysql_real_escape_string($_POST["nombre"]);
		

		$q="insert into alfabeto (usr_id,alfabeto,fecha) values ($usrIdMostrar,'$nombre',NOW())"; 
		$res=mysql_query($q);

		//echo $q.'<br>';

		$q="select alfabeto_id from alfabeto where alfabeto like '$nombre' order by alfabeto_id DESC limit 0,1"; 
		$res=mysql_query($q);
		
		//echo $q.'<br>';


		$fila = mysql_fetch_row($res); $txt=$fila[0]; 

		foreach ($trabajo as $key => $value) {
			$a=trim($value[0]); $b=trim($value[1]);	
			$q="insert into particula (alfabeto_id,simbolo,valor) values ($txt,'$a','$b')"; 
			$res=mysql_query($q);			 		
			//echo $q.'<br>';
		} 		

		echo "<br><br><br><br><span style=\"color:green\">OK!</span>";

	}

	if(isset($_GET["fav"]) && $usrIdMostrar!=-1){

		$alfa=mysql_real_escape_string($_GET["alfa"]);
		

		$q="insert into favorito (usr_id,alfabeto_id) values ($usrIdMostrar,$alfa)"; 
		$res=mysql_query($q);

	}

if(isset($_GET["url"])){ include "c/rss.c"; die;  }
	

	$titulo="";


	//Defino los colores de las letras opc: random | Standard color palette
	if(isset($_SESSION["random"]) || isset($_GET["random"])){
	
		$titulo="Texto en alfabeto de colores aleatorio";
		$letterColors=colorTxtPalette("random");
		$pagColor="&random=1";

	}else{

		$titulo="Texto en alfabeto de colores";

		$pagColor="";
	}	

	$archivoHtml="";

	/////////////////////////////////////////
	//Abrir un libro y configurar paginador//
	///////////////////////////////////////////////////////////////////////////////////
	
	if(isset($_GET["libro"]) || isset($_POST["libro"])){

		if($_GET["libro"]=="aleatory" || $_POST["libro"]=="aleatory"){
			
			if ($handle = opendir('libros/')) {
				$elegir=array(); $i=0;  
				while (false !== ($entry = readdir($handle))) {
          
						if(stripos($entry,".html")>2){
								
							$elegir[$i]=$entry;
							$i++;
							
						
				    }
   		 }
			 
		  	$elegir1=$elegir[rand(0,count($elegir)-1)];
		  	$myCurrentBook=$elegir1;
		  	$archivoHtml=$elegir1;
			}
			
		}else{

	    if(isset($_GET["libro"]))
	    	$myCurrentBook=mysql_real_escape_string($_GET["libro"]);

	    if(isset($_POST["libro"]))
	    	$myCurrentBook=mysql_real_escape_string($_POST["libro"]);

			if(isset($_GET["libro"]))
			
				$archivoHtml=$_GET["libro"];
			else
				$archivoHtml=$_POST["libro"];
			
		}
  	

    $q="select tamano from libro where nombre like '$myCurrentBook'"; 
		$res=mysql_query($q);
		$fila = mysql_fetch_row($res); $txt=$fila[0]; 
		$num_rows = mysql_num_rows($res);

    $bienvenida=0; //variable para luego ajustar la vista y bienvenida=0 muestra el libro
    /*
    if($txt=="0"){
    	$test=limpiarCadena(file_get_contents("libros/".$nombre_archivo));
			$tamano_archivo=strlen($test);	
			$q="update libro set tamano='$tamano_archivo' where nombre like='$myCurrentBook'"; 
			$res=mysql_query($q); 
    }  
*/
		if($txt=="0" || $txt==0){
    	$test=limpiarCadena(file_get_contents("libros/".$archivoHtml));
			$txt=$tamano_archivo=strlen($test);	
    }  

		$limit=400;
		$txtLimit=0;
		$paginas=$txt/$limit;
		
		//trabajo con el paginador//
		/////////////////////////////////////////////////////

		if(isset($_GET["cPage"])){ 
			if($_GET["cPage"]=="aleatory"){

					$cPage=rand(1,$paginas);


			}else{ $cPage=$_GET["cPage"];  }
			

		}else{ $cPage=1; }
	
		if(($cPage+1)<$paginas) $nextPage=$cPage+1; else $nextPage=$cPage;
	
		if($cPage>1) $lastPage=$cPage-1; else $lastPage=1;
	
		$comienzoBuffer=($cPage-1)*$limit;
			 
		$test=limpiarCadena(file_get_contents("libros/".$archivoHtml, NULL, NULL, $comienzoBuffer, $limit));
	
		
	}else{
		if(isset($_POST["PastedText"])){ 
			$bienvenida=0;	$test=limpiarCadena($_POST["PastedText"]); 
			
		}
			
	}

	//En el caso de que se pida el texto simplificado
	if(isset($_SESSION["simplified"]) || $_GET["simplified"]){

		$titulo.=" en modo dactilografico";
		$test=simplifiedTxt($test);
		$pagSimplified="&simplified=1";	
		
	}else{
	
		$pagSimplified="";
	
	}
  
 	
 ?>
