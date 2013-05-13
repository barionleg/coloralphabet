<?php



/* EXPLORADOR DE CARPETAS Y ARCHIVOS CON PHP
 * Documento explora.php
 * Explorador de carpetas y archivos usando el sistema de ficheros de PHP.
 * Autor: Andr�s de la Paz � 2010
 * Contacto: www.wextensible.com
 */
 
//Por defecto la primera vez que abrimos este explorador toma
//como carpeta la del php actual. La constante __FILE__ es la
//ruta del archivo PHP actual. Con dirname obtenemos la carpeta.
$ruta = "/home/a3824214/public_html/";
//Para abrir archivos necesitaremos poner la codificaci�n 
//adecuada con estos valores
$array_codif = Array(
"UTF-8", 
"ISO-8859-1", 
"ISO-8859-15"
);

//Por defecto usamos esta para htmlentities (ver m�s abajo)
$codificacion = "ISO-8859-1";

//Vemos si hay algo en el GET
if (isset($_GET)){
    foreach($_GET as $campo=>$valor){
        switch ($campo) {
            //Obtenemos una ruta, carpeta o archivo
            case "una-ruta":
                $ruta = htmlspecialchars($valor, ENT_QUOTES);
                if (get_magic_quotes_gpc() == 1) $ruta = stripslashes($ruta);
                break;
            //Vemos la codificaci�n
            case "una-codificacion":
                $codificacion = htmlspecialchars($valor, ENT_QUOTES);
                if (get_magic_quotes_gpc() == 1) $codificacion = stripslashes($codificacion);
                break;                
      
        }
    }
}

//Si la ruta es vac�a, pone la del presente script
if ($ruta == "") $ruta = "/home/a3824214/public_html/x/";

//Esta variable contendr� la lista de nodos (carpetas y archivos)
$presenta_nodos = "";

//Esta variable es para el contenido del archivo
$presenta_archivo = "";

//Si la ruta es una carpeta, la exploramos. Si es un archivo
//sacamos tambi�n el contenido del archivo.
if (is_dir($ruta)){//ES UNA CARPETA
    //Con realpath convertimos los /../ y /./ en la ruta real
    $ruta = realpath($ruta)."/";
    //exploramos los nodos de la carpeta
    $presenta_nodos = explora_ruta($ruta);
} else {//ES UN ARCHIVO
    $ruta = realpath($ruta);
    //Sacamos tambi�n los nodos de la carpeta
    $presenta_nodos = explora_ruta(dirname($ruta)."/");
    //Y sacamos el contenido del archivo
    $presenta_archivo = "<br />CONTENIDO DEL ARCHIVO: ".
    $ruta."<pre>".
    explora_archivo($ruta, $codificacion).
    "</pre>";
}
//Funci�n para explorar los nodos de una carpeta
//El signo @ hace que no se muestren los errores de restricci�n cuando
//por ejemplo open_basedir restringue el acceso a alg�n sitio
function explora_ruta($ruta){
    //En esta cadena haremos una lista de nodos
    $cadena = "";
    //Para agregar una barra al final si es una carpeta
    $barra = "";
    //Este es el manejador del explorador
    $manejador = @dir($ruta);
    while ($recurso = $manejador->read()){
        //El recurso sera un archivo o una carpeta
        $nombre = "$ruta$recurso";
        if (@is_dir($nombre)) {//ES UNA CARPETA
            //Agregamos la barra al final
            $barra = "/";
           // $cadena .= "CARPETA: ";
        } else {//ES UN ARCHIVO
            //No agregamos barra
            $barra = "";
            //$cadena .= "ARCHIVO: ";
        }
        //Vemos si el recurso existe y se puede leer
		
		if(stripos($nombre,".html")>2){
			if (@is_readable($nombre)){
				$cadena .= "<a href=\"".$_SERVER["PHP_SELF"].
				"?una-ruta=$nombre$barra\">$recurso$barra</a>";
			} else {
				$cadena .= "$recurso$barra";
			}
			$cadena .= "<br />";
		}
    }
    $manejador->close();
    return $cadena;
}

//Funci�n para extraer el contenido de un archivo
function explora_archivo($ruta, $codif){
    //abrimos un buffer para leer el archivo
    ob_start();
    readfile($ruta);
    //volcamos el buffer en una variable
    $contenido = ob_get_contents();
    //limpiamos el buffer
    ob_clean();
    //retornamos el contenido despu�s de limpiarlo
    //aplicando la codificaci�n seleccionada
    return htmlentities($contenido, ENT_QUOTES, $codif);
}

if(isset($_GET["una-ruta"])){ ?>
		<script> function ir(){ window.location = "http://mistest.netne.net/?pdf=1&archivo=<?=$_GET["una-ruta"]?>"; } </script>
	
<? }else{ ?> <script> function ir(){ } </script>	<? } ?>

    <!--
    <h3>Opciones de configuraci�n PHP (restringen explorador)</h3>
    <ul>
    <?php 
        $opciones = "<li><a href=\"http://docs.php.net/manual/es/ini.sect.safe-mode.php#ini.safe-mode\">".
        "<code>safe_mode</code></a> ";
        if (ini_get("safe_mode")){
            $opciones .= ": activado";
        } else {
            $opciones .= ": desactivado";
        }
        $opciones .= "</li>".
        "<li><a href=\"http://docs.php.net/manual/es/ini.core.php#ini.open-basedir\">".
        "<code>open_basedir</code></a>: ".ini_get("open_basedir")."</li>".        
        "<li><a href=\"http://docs.php.net/manual/es/function.getmyuid.php\">".
        "<code>getmyuid()</code></a>: ".getmyuid()."</li>".
        "<li><a href=\"http://docs.php.net/manual/es/function.getmygid.php\">".
        "<code>getmygid()</code></a>: ".getmygid()."</li>";
        echo $opciones;         
    ?>
    
	</ul>
    <h3>Exploraci�n</h3>
	
    
    <form action="<?php echo $_SERVER["PHP_SELF"] ?>" method="get">
       sarse ambas barras "/" y "\")</small><textarea rows="1" cols="50" name="una-ruta"
        ><?php echo $ruta; ?></textarea><br />
        Codificaci�n para ver archivos:
       <!-- <select name="una-codificacion">
            <?php 
                foreach ($array_codif as $i=>$val){
                    echo "<option value=\"$val\"";
                    if ($codificacion == $val) echo " selected=\"selected\"";
                    echo ">$val</option>";
                }
            ?>
        
        <input type="submit" value="enviar" />
    </form>
       -->
	<a href="#" onclick="cerrar();">[x]</a><br>	
    <?php
        echo "<br />$presenta_nodos";
        echo "<br />$presenta_archivo";
    ?>
	
	<br>
	
	
   
    