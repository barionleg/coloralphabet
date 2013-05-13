<script>
function envia(){
	loadXMLDoc();
	var a=document.getElementById("myDiv").innerHTML;
	var b=document.getElementById("myDiv3").innerHTML;
	
	var bE=1;
	if(a.search("cartel1")==-1) bE=0;
	if(b.search("OK")==-1) bE=0;
	if(a.length<4) bE=0;

	if(!pass()) bE=0;
	if(!email()) bE=0;

	if(bE){
		document.regForm.submit() 
	}

}

function email() {
  var x=document.forms["regForm"]["email"].value;
  var atpos=x.indexOf("@");
	var dotpos=x.lastIndexOf(".");

  if(x.length==0){document.getElementById("myDiv2").innerHTML="<span style=\"color: green;\">Ok!</span>"; 
  	return true;} 

	if (atpos<1 || dotpos<atpos+2 || dotpos+2>=x.length)
  {
  
   	document.getElementById("myDiv2").innerHTML="<span style=\"color: red;\"><?= $__['El email es incorrecto']?></span>";
  	return false;
  }

   document.getElementById("myDiv2").innerHTML="<span style=\"color: green;\"><?= $__['El email es correcto']?></span>"; 
   return true;
}

function pass(){
	var p1 = document.getElementById("passwd").value;
	var p2 = document.getElementById("passwd1").value;

	var espacios = false;
	var cont = 0;
 
 	var bE=0;


	if (p1.length < 6 || p2.length < 6) {
	  document.getElementById("myDiv1").innerHTML="<span style=\"color: red;\"><?= $__['El password es incorrecto']?></span>";
	  return false;
	}

	if (p1 != p2) {
   	document.getElementById("myDiv1").innerHTML="<span style=\"color: red;\"><?= $__['Los password es incorrecto']?></span>";
  	return false;

	} else {
	  document.getElementById("myDiv1").innerHTML="<span style=\"color: green;\"><?= $__['Correcto']?></span>";
	  return true; 
	}
}

function loading(){
	document.getElementById("myDiv").innerHTML="<img src=\"./img/cargando.gif\">";

}

function loadXMLDoc()
{

var xmlhttp;
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("myDiv").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","ajax.php?nombre="+document.getElementById("buscar").value,true);
xmlhttp.send();
}
 
function loadXMLDocCaptcha()
{

var xmlhttp;
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("myDiv3").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","ajaxCaptcha.php?captcha="+document.getElementById("myCaptcha").value,true);
xmlhttp.send();

}
</script>
<br>
<div><center>
<form action="index.php" method="post" name="regForm" autocomplete="off">
	<h1><?= $__['Crear una nueva cuenta']?></h1><br>
	<?= $__['Sólo necesitas un nombre de usuario y una contraseña']?><br>
	<input type="hidden" name="procesar">
	<input type="text" id="buscar" name="nombre" placeholder="<?= $__['nombre de usuario']?>" style="width: 150px" size="20" onkeydown="loading(); setTimeout('loadXMLDoc()', 500);">
	<div id="myDiv"></div><br>

	<input type="text" name="email" id="mail" placeholder="<?= $__['e-mail (opcional)']?>" size="20" style="width: 150px"><br>
	<div id="myDiv2"></div><br>

	<input type="password" id="passwd" name="passwd" placeholder="<?= $__['contraseña']?>" size="20" style="width: 150px"><br>
	<input type="password" id="passwd1"  name="passwd1" placeholder="<?= $__['repetir contraseña']?>" size="20" style="width: 150px"><br>
	<div id="myDiv1"></div><br>
	<br> 
  <img src="captcha.php">
  <br>
  <input type="text" id="myCaptcha" name="captcha" value="" style="width: 50px" onchange="loadXMLDocCaptcha()"><br>
  <div id="myDiv3"></div><br>
	<input type="button" name="entrar" value="<?= $__['registrarse']?>" onclick="envia();"><br>
	¿<?= $__['nada más que eso? sólo hay una forma de averiguarlo']?>... 	<br>	<br>
	
	<u><small><?= $__['Filosofía de privacidad']?></small></u><br>
	<small><?= $__['Nos limitamos a los datos recopilados sobre usted y su uso de la plataforma']?></small><br>
	<small><?= $__['Su información personal nunca se vende']?></small><br>
	<small><?= $__['Utilizamos y divulgamos información para evitar que la gente abuse de la plataforma']?></small><br>
	<small><?= $__['pero nunca revelamos por cualquier otra razón a menos que sea requerido por la ley']?></small><br>




</form>
<center></div>