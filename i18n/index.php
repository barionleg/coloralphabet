<?php
session_start();

function idiomas(){
	$path="i18n/flag/";
	$r="<ul id=\"navlist\">";
    // Abrimos la carpeta que nos pasan como parámetro
    $dir = opendir($path);
    // Leo todos los ficheros de la carpeta
    while ($elemento = readdir($dir)){
        // Tratamos los elementos . y .. que tienen todas las carpetas
        if( $elemento != "." && $elemento != ".."){
            // Si es una carpeta
            if( !is_dir($path.$elemento)){
            	$x=explode(".", $elemento);
            	$l=$x[0];
            	if($x[1]=="db") break;
            	$r.= "<li><a href=\"index.php?idioma=$l\"><img src=\"$path/$elemento\" width=\"20\" height=\"20\" ></a></li>";  
            } 
            
        }
    }
    $r.="</ul>";
    echo $r;
}


$idioma='es';

if(isset($_GET["idioma"])){

	$idioma=$_GET["idioma"];
	$_SESSION['idioma']=$idioma;

}

if(isset($_SESSION['idioma'])){

	$idioma=$_SESSION['idioma'];
    
}else{ $idioma="es";}


$i=0; $file1 = "i18n/es.txt"; $lines = file($file1);

foreach($lines as $line_num => $line){ $palabras[$i] = $line; $i++; }


$i=0; $file1 = "i18n/$idioma.txt"; $lines = file($file1);


foreach($lines as $line_num => $line)
{ 
	$__[trim($palabras[$i])]= utf8_encode(utf8_decode(trim($line)));
	$i++; }

?>
